<?php

namespace App\Http\Controllers;

use App\Services\SearchHelper;
use App\Traits\UpdateCacheTrait;
use Edirectory\Models\CategoryPrimary;
use Edirectory\Models\Location;
use Edirectory\Models\Rating;
use App\Http\CommonModel;

class HomeController extends Controller
{
    use UpdateCacheTrait;
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(SearchHelper $searchHelper)
    {

        /**
         * Add latest entries of companies, deals, events, blogpost into cache
         */
        $this->latestEntries();
        $category_with_premium_compaines = CommonModel::getCachedCategoryWithPremiumCompanies();
        $companies = cache()->get('home.companies');
        $deals = cache()->get('home.deals')->take(5);
        $events = cache()->get('home.events')->take(5);
//		$ratings = Rating::with('company', 'company.location')->latest()->limit(12)->get();

        $company_markers = $searchHelper->mapMarkers($companies, 'listing');
        $deal_markers = $searchHelper->mapMarkers($deals, 'deal');
        $event_markers = $searchHelper->mapMarkers($events, 'event');
        $mapmarker = json_encode(array_merge(
            json_decode($company_markers, true),
            json_decode($deal_markers, true),
            json_decode($event_markers, true)
        ));
        return view('home/index', [
            'states' => Location::getCachedStates(),
            'categories' => CategoryPrimary::getCachedCategories(),
            'blogposts' => cache()->get('home.blogposts')->take(4),
            'subcategories' => CategoryPrimary::getCachedTopSubCategories(),
            'category_with_premium_compaines' =>  $category_with_premium_compaines,
            'events' => $events,
            'deals'	=> $deals,
            'companies' => $companies,
            'mapmarker' => $mapmarker,
        ]);
    }
}
