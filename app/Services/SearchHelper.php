<?php namespace App\Services;


use Edirectory\Elastic\CustomPaginator;
use Edirectory\Elastic\ElasticFilterFiller;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class SearchHelper
{

    /**
     * @param $searchQuery
     * @param $size
     *
     * @return array
     */
    public function getFilterValues($searchQuery, $size, $page)
    {
        $size = $size > 10000 ? 10000 : $size;

        // pagination limit = 10
        $from = 10 * ($page - 1);

        // Fetch from Elasicsearch directly
        $searchQuery->setModelFiller(new ElasticFilterFiller());
        $resultQuery = $searchQuery->from($from)->size($size - $from)->get()->hits();

        $cities = $resultQuery->map(function ($data) {
            return $data['city'];
        })->unique()->sort();

        $categories = $resultQuery->map(function ($data) {
            return collect($data['category_secondary'])->map(function ($category) {
                return $category;
            });
        })->unique()->flatten()->sort();

        return [
            'cities' => $cities,
            'categories' => $categories
        ];
    }

    /**
     * @param $result
     *
     * @return mixed
     */
    public function mapMarkers($result, $type)
    {
        if($result){
            if ($result instanceof CustomPaginator or $result instanceof LengthAwarePaginator or $result instanceof Collection) {
                return $result->map(function ($addr) use ($type) {
                    return self::markerArray($addr, $type);
                })->toJson();
            }

            // single marker
            return '[' . collect(self::markerArray($result, $type))->toJson() . ']';
        }
        return '[]';
    }

    /**
     * @param $addr
     *
     * @return array
     */
    private function markerArray($addr, $type)
    {
        if ($type == "listing") {
            return [
                'title' => str_limit($addr->name, 35),
                'address' => $addr->address_line,
                'lat' => $addr->location->latitude,
                'lng' => $addr->location->longitude,
                'img' => $addr->image('220x100'),
                'category' => $addr->categories->first()->name,
                'icon' => $addr->listing_level == "premium" ? 'star.png' : 'apartment.png',
                'featText' => $addr->user_id ? 'Verifiziert' : '',
                'rating' => $addr->ratings->avg('rating') ? round($addr->ratings->avg('rating'), 1) : 0,
                'link' => $addr->listing_level == "premium" ? route('listing.single', $addr->slug) : '#'
            ];
        }

        if ($type == "event") {
            return [
                'title' => str_limit($addr->name, 35),
                'address' => $addr->address_line,
                'lat' => $addr->location->latitude,
                'lng' => $addr->location->longitude,
                'img' => $addr->image('220x100'),
                'category' => $addr->category->name,
                'icon' => 'coffee.png',
                'featText' => $addr->user_id ? 'Verifiziert' : '',
                'rating' => '-',
                'link' => route('event.single', $addr->slug)
            ];
        }

        if ($type == "deal") {
            return [
                'title' => str_limit($addr->name, 35),
                'address' => $addr->company->address_line,
                'lat' => $addr->company->location->latitude,
                'lng' => $addr->company->location->longitude,
                'img' => $addr->image('220x100'),
                'category' => $addr->category->name,
                'icon' => 'agency.png',
                'featText' => $addr->user_id ? 'Verifiziert' : '',
                'rating' => '-',
                'link' => route('deal.single', $addr->slug)
            ];
        }
    }

}