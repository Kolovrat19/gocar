<?php
/**
 * Created by PhpStorm.
 * User: 7
 * Date: 15.09.2017
 * Time: 13:53
 */

namespace App\Repositories;

use App\Feature;
use App\Contracts\FeaturesRepositoryContract;

class FeaturesRepository implements FeaturesRepositoryContract
{
    /**
     * Exposes the features allowed to be in the products filtering.
     *
     * @param  integer $limit
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function filterable($limit = 5)
    {
        return Feature::filterable()->take($limit)->get();
    }

    /**
     * Returns an array with the validation rules for the filterable features.
     *
     * @return array
     */
    public function filterableValidationRules() : array
    {
        return $this->filterable()->filter(function ($item) {
            return trim($item->validation_rules) != '' && ! is_null($item->validation_rules);
        })->mapWithKeys(function ($item) {
            return ['features.' . $item->name => $item->validation_rules];
        })->all();
    }
}