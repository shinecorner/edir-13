<?php namespace App\Traits;

use Carbon\Carbon;
use Edirectory\Models\BlogPost;
use Edirectory\Models\Company;
use Edirectory\Models\Deal;
use Edirectory\Models\Event;

trait UpdateCacheTrait
{
	public function latestEntries()
	{
		//Latest premium companies
		if (!cache()->has('home.companies')) {
			cache()->put(
				'home.companies',
				Company::latest()->premium()->with('location', 'categories', 'ratings', 'keywords')->limit(4)->get(),
				// cache for a day
				Carbon::now()->addDay(1)
			);
		}

		//latest blogposts
		if (!cache()->has('home.blogposts')) {
			cache()->put(
				'home.blogposts',
				BlogPost::latest()->directory(config('edir.directory_id'))->limit(5)->get(),
				// cache for a day
				Carbon::now()->addDay(1)
			);
		}

		//latest deals
		if (!cache()->has('home.deals')) {
			cache()->put(
				'home.deals',
				Deal::with('company', 'company.ratings', 'company.location')->latest()->limit(12)->get(),
				// cache for a day
				Carbon::now()->addDay(1)
			);
		}

		//latest events
		if (!cache()->has('home.events')) {
			cache()->put(
				'home.events',
				Event::with('company', 'location')->latest()->limit(12)->get(),
				// cache for a day
				Carbon::now()->addDay(1)
			);
		}
	}
}