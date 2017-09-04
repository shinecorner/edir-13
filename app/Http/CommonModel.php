<?php

namespace App\Http;

use DB;
use Edirectory\Models\CategoryPrimary;
use Edirectory\Models\Company;

class CommonModel
{
    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public static function getCachedCategoryWithPremiumCompanies()
    {
        if (cache()->has('category-with-premium-companies')) {
            return cache()->get('category-with-premium-companies');
        }

        $returnArr = [];

        $result = CategoryPrimary::all()->flatMap(function ($category) use ($returnArr) {

            $non_premium = [];

            $premium = Company::where('listing_level', 'premium')
                ->leftJoin('company_categories', 'company_categories.company_id', '=', 'companies.id')
                ->where('company_categories.category_primary_id', $category->id)
                ->limit(10)->get();

            if ($premium->count() < 10) {
                $non_premium = Company::where('listing_level', 'basic')
                    ->leftJoin('company_categories', 'company_categories.company_id', '=', 'companies.id')
                    ->where('company_categories.category_primary_id', $category->id)
                    ->limit(10 - $premium->count())->get();
            }

            $returnArr[$category->id] = [
                'name'      => $category->name,
                'slug'      => $category->slug,
                'companies' => $premium->merge($non_premium)
            ];

            return $returnArr;

        });

        cache()->forever('category-with-premium-companies', $result);

        return $result;
    }
}
