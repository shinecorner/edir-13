<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index')->name('home');
Route::get('/startseite', 'HomeController@index')->name('home');

/** Listing Companies **/

Route::get('/suche', 'ListingController@search')->name('search');
Route::get('/firma/{slug}', 'ListingController@single')->name('listing.single');

/** Listing Events */
Route::get('/veranstaltungen', 'EventController@index')->name('event');
Route::get('/veranstaltungen/{slug}', 'EventController@listing')->name('event.listing');
Route::get('/veranstaltungen/details/{slug}', 'EventController@single')->name('event.single');

/** Listing Deals */
Route::get('/angebote', 'DealController@index')->name('deal');
Route::get('/angebote/{slug}', 'DealController@listing')->name('deal.listing');
Route::get('/angebote/details/{slug}', 'DealController@single')->name('deal.single');

/** BLOG **/
Route::get('/blog', 'BlogController@index')->name('blog');
Route::get('/blog/{slug}', 'BlogController@single')->name('blog.single');

/** PAGES */
Route::get('/kontakt', 'PageController@contact')->name('contact');
Route::get('/impressum', 'PageController@imprint')->name('imprint');
Route::get('/privacy', 'PageController@privacy')->name('privacy');
Route::get('/agb', 'PageController@term')->name('term');
Route::get('/anmelden', 'PageController@register')->name('register');