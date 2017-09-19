<?php

/**
 * Created by PhpStorm.
 * User: 7
 * Date: 15.09.2017
 * Time: 11:14
 */
namespace App\Repositories;

use App\Category;
use App\Contracts\CategoryRepositoryContract;

class CategoriesRepository implements CategoryRepositoryContract
{
    /**
     * Returns the categories with products filtered by the given request.
     *
     * @param array $request
     * @param integer $limit
     * @param mixed $columns
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function categoriesWithProducts(array $request = [], $limit = 10, $columns = '*')
    {
        $categories = Category::whereHas('products', function($query) {
            return $query->actives();
        });

        return $categories->select($columns)->filter($request)
            ->orderBy('name')
            ->take($limit)
            ->get();
    }

    /**
     * Returns the children for the given category.
     *
     * @param  Category|mixed $idOrModel $idOrModel
     * @param int $limit
     * @param array $columns
     *
     * @return \Illuminate/Database/Eloquent/Collection
     */
    public function childrenOf($category_id, int $limit = 50, $columns = '*')
    {
        return Category::select($columns)->with('childrenRecursive')
            ->where('category_id', $category_id)
            ->orderBy('updated_at', 'desc')
            ->take($limit)
            ->get();
    }
}