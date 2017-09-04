<?php

namespace App\Http\Controllers;

use App\Traits\UpdateCacheTrait;
use Edirectory\Models\BlogPost;

class BlogController extends Controller
{
    use UpdateCacheTrait;

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        /**
         * Add latest entries of companies, deals, events, blogpost into cache
         */
        $this->latestEntries();

        return view('blog/index', [
            'posts'     => BlogPost::latest()->directory(config('edir.directory_id'))->paginate(3),
            'events'    => cache()->get('home.events')->take(3),
            'deals'     => cache()->get('home.deals')->take(3),
            'companies' => cache()->get('home.companies')->take(3),
        ]);
    }

    /**
     * @param $slug
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function single($slug)
    {
        $blogPost = BlogPost::where('slug', $slug)->firstOrFail();

        /**
         * Add latest entries of companies, deals, events, blogpost into cache
         */
        $this->latestEntries();

        return view('blog/single', [
            'post'      => $blogPost,
            'next'      => $blogPost->nextPost(),
            'previous'  => $blogPost->previousPost(),
            'events'    => cache()->get('home.events')->take(3),
            'deals'     => cache()->get('home.deals')->take(3),
            'companies' => cache()->get('home.companies')->take(3),
        ]);
    }

}
