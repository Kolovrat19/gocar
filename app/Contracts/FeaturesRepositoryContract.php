<?php
/**
 * Created by PhpStorm.
 * User: 7
 * Date: 15.09.2017
 * Time: 13:54
 */

namespace App\Contracts;


interface FeaturesRepositoryContract
{
    /**
     * Exposes the features allowed to be in the products filtering.
     *
     * @param  integer $limit
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function filterable($limit = 5);

    /**
     * Returns an array with the validation rules for the filterable features.
     *
     * @return array
     */
    public function filterableValidationRules() : array;
}