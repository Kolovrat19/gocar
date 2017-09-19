<?php

/**
 * Created by PhpStorm.
 * User: 7
 * Date: 15.09.2017
 * Time: 11:10
 */
namespace App\Contracts;

interface CategoryRepositoryContract
{
    /**
     * Returns the categories with products filtered by the given request.
     *
     * @param array $request
     * @param int $limit
     * @param mixed $columns
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function categoriesWithProducts(array $request = [], $limit = 10, $columns = '*');

    /**
     * Returns the children for the given category.
     *
     * @param int $category_id
     * @param int $limit
     * @param mixed $columns
     *
     * @return \Illuminate/Database/Eloquent/Collection
     */
    public function childrenOf($category_id, int $limit = 50, $columns = 'id');
}