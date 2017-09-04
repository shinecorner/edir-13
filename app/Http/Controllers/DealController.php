<?php

namespace App\Http\Controllers;

use App\Services\SearchHelper;
use App\Traits\UpdateCacheTrait;
use Edirectory\Models\BlogPost;
use Edirectory\Models\CategoryDeal;
use Edirectory\Models\Company;
use Edirectory\Models\Deal;
use Edirectory\Models\Event;

class DealController extends Controller
{
	use UpdateCacheTrait;

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('deal/index', [
            'categories' => CategoryDeal::getCachedCategories()
        ]);
    }

    /**
     * @param $slug
     * @param Deal $deal
     * @param CategoryDeal $categoryDeal
     * @param SearchHelper $searchHelper
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function listing($slug, Deal $deal, CategoryDeal $categoryDeal, SearchHelper $searchHelper)
    {
        $category = $categoryDeal->where('slug', $slug)->firstOrFail();
        $result = $deal->with('category', 'company', 'company.location')->where('category_deal_id', $category->id)->paginate(7);
        $mapMarkers = $searchHelper->mapMarkers($result, 'deal');

        $this->latestEntries();

        return view('deal/listing', [
            // page vars
            'result' => $result,
            'mapmarker' => $mapMarkers,
            'category' => $category,
            // sidebar
			'blogposts' => cache()->get('home.blogposts') ? cache()->get('home.blogposts')->take(3) : null,
			'events' => cache()->get('home.events') ? cache()->get('home.events')->take(3) : null,
			'companies' => cache()->get('home.companies') ? cache()->get('home.companies')->take(3) : null,
        ]);
    }

    /**
     * @param $slug
     * @param Deal $deal
     * @param SearchHelper $searchHelper
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function single($slug, Deal $deal, SearchHelper $searchHelper)
    {
        $listing = $deal->with('company', 'category', 'keywords', 'gallery_images')->where('slug', $slug)->firstOrFail();
        $mapMarker = $searchHelper->mapMarkers($listing, 'deal');

        return view('deal/single', [
            'listing' => $listing,
            'mapmarker' => $mapMarker
        ]);
    }

}
