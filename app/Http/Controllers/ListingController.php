<?php

namespace App\Http\Controllers;

use App\Services\SearchHelper;
use App\Traits\UpdateCacheTrait;
use Edirectory\Elastic\CustomPaginator;
use Edirectory\Elastic\FreshFromDbFiller;
use Edirectory\Models\CategoryPrimary;
use Edirectory\Models\Company;
use Illuminate\Http\Request;

class ListingController extends Controller
{
	use UpdateCacheTrait;
	/**
	 * @param Request $request
	 * @param SearchHelper $searchHelper
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
	 */
	public function search(Request $request, SearchHelper $searchHelper)
	{
		// limit to 1000 results per searchterm
		if ($request->has('page') && $request->get('page') > 1000) {
			return redirect()->route('home');
		}

		$catImage = null;
		$searchQuery = Company::search();

		// added custom filler for get fresh values from db instead of elasticsearch result (eager loading)
		$searchQuery->setModelFiller(new FreshFromDbFiller());

		if ($request->get('keyword')) {
            collect(explode(' ', $request->get('keyword')))->each(function($searchTerm) use ($searchQuery) {
                 $searchQuery->must()->wildcard('name', '*' . strtolower($searchTerm) . '*');
            });
			// $searchQuery->should()->match('keywords', $request->get('keyword'));
		}

		if ($request->get('location')) {
			$searchQuery->multiMatch(['city', 'county', 'township', 'zip_code'], strtolower($request->get('location')));
		}

		if ($request->get('state') && $request->get('state') != 'all') {
			$searchQuery->must()->term('state', strtolower($request->get('state')));
		}

		if ($request->get('category')) {
			$searchQuery->must()->term('category_primary', $request->get('category'));
			$catImage = CategoryPrimary::where('name', $request->get('category'))->first();
		}

		if ($request->get('subcategory')) {
			$searchQuery->must()->term('category_secondary', $request->get('subcategory'));
		}

		if ($request->get('filterCity')) {
			$searchQuery->must()->filter()->terms('city', $request->get('filterCity'));
		}

		if ($request->get('filterCategory')) {
			$searchQuery->must()->filter()->terms('category_secondary', $request->get('filterCategory'));
		}

		if ($request->get('filterSort')) {
			$searchQuery->sortBy('name.lower_case_sort', $request->get('filterSort'));
		} else {
			// premium first
			$searchQuery->sortBy('listing_level', 'desc');
		}

		$limit = 7;
		$page = $request->get('page') ? $request->get('page') : 1;
		$from = $limit * ($page - 1);
		$elasticResult = $searchQuery->from($from)->size($limit)->get();
		$result = new CustomPaginator($elasticResult, $limit, $page);

		$mapMarkers = $searchHelper->mapMarkers($result, 'listing');
		// todo this has 300ms, fix it via ajax fetch async
		$filterValues = $searchHelper->getFilterValues($searchQuery, $result->total(), $result->currentPage());
		//$filterValues = ['categories' => [], 'cities' => []];

		/**
		 * Add latest entries of companies, deals, events, blogpost into cache
		 * */
		$this->latestEntries();

		return view('listing/index', [
			// page vars
			'result' => $result,
			'mapmarker' => $mapMarkers,
			// pagination filter
			'keyword' => $request->keyword,
			'location' => $request->location,
			'state' => $request->state,
			'category' => $request->category,
			'subcategory' => $request->subcategory,
			'filterCategory' => $request->filterCategory,
			'filterCity' => $request->filtercity,
			// filter values
			'filter_values' => $filterValues,
			// sidebar
			'blogposts' => cache()->get('home.blogposts') ? cache()->get('home.blogposts')->take(3) : null,
			'events' => cache()->get('home.events') ? cache()->get('home.events')->take(3) : null,
			'deals' => cache()->get('home.deals') ? cache()->get('home.deals')->take(3) : null,
			// category object
			'catImage' => $catImage
		]);
	}

	/**
	 * @param $slug
	 * @param SearchHelper $searchHelper
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function single($slug, SearchHelper $searchHelper)
	{
		$listing = Company::with(
			'gallery_images', 'location', 'ratings', 'opening_times', 'keywords', 'files'
		)->with(['ratings' => function($query) {
			$query->latest()->limit(5);
		}])->withCount('ratings')->where('slug', $slug)->firstOrFail();

		$mapMarkers = $searchHelper->mapMarkers($listing, 'listing');
		return view('listing/single', [
			'listing' => $listing,
			'mapmarker' => $mapMarkers,
			//'related_listing' => null,
		]);
	}

}
