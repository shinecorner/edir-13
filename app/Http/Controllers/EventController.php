<?php

namespace App\Http\Controllers;

use App\Services\SearchHelper;
use App\Traits\UpdateCacheTrait;
use Edirectory\Models\BlogPost;
use Edirectory\Models\CategoryEvent;
use Edirectory\Models\Company;
use Edirectory\Models\Deal;
use Edirectory\Models\Event;

class EventController extends Controller
{
	use UpdateCacheTrait;

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('event/index', [
            'categories' => CategoryEvent::getCachedCategories()
        ]);
    }

    /**
     * @param $slug
     * @param Event $event
     * @param CategoryEvent $categoryEvent
     * @param SearchHelper $searchHelper
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function listing($slug, Event $event, CategoryEvent $categoryEvent, SearchHelper $searchHelper)
    {
        $category = $categoryEvent->where('slug', $slug)->firstOrFail();
        $result = $event->with('location', 'category')->where('category_event_id', $category->id)->paginate(7);
        $mapMarkers = $searchHelper->mapMarkers($result, 'event');

        $this->latestEntries();

        return view('event/listing', [
            // page vars
            'result' => $result,
            'mapmarker' => $mapMarkers,
            'category' => $category,

            // sidebar
			'blogposts' => cache()->get('home.blogposts') ? cache()->get('home.blogposts')->take(3) : null,
			'deals' => cache()->get('home.deals') ? cache()->get('home.deals')->take(3) : null,
			'companies' => cache()->get('home.companies') ? cache()->get('home.companies')->take(3) : null,
        ]);
    }

    /**
     * @param $slug
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function single($slug, SearchHelper $searchHelper)
    {
        $listing = Event::with('company', 'location', 'category', 'keywords', 'gallery_images')->where('slug', $slug)->firstOrFail();
        $mapMarker = $searchHelper->mapMarkers($listing, 'event');

        return view('event/single', [
            'listing' => $listing,
            'mapmarker' => $mapMarker
        ]);
    }

}
