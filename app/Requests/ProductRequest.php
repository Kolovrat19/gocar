<?php

/**
 * Created by PhpStorm.
 * User: 7
 * Date: 15.09.2017
 * Time: 13:42
 */
namespace App\Requests;

use Illuminate\Foundation\Http\FormRequest;

use App\Helpers\Attributes;
use Illuminate\Validation\Rule;
use Illuminate\Support\Collection;
use App\Repositories\FeaturesRepository;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() : bool
    {
        return true;
    }

    /**
     * Validation rules.
     *
     * @return array
     */
    public function rules()
    {
        return array_merge(
            $this->rulesForBody(), $this->rulesForFeatures(), $this->forPictures()
        );
    }

    /**
     * Builds the validation rules for the product information.
     *
     * @return array
     */
    protected function rulesForBody()
    {
        return [
            'name' => 'required',
            'description' => 'required',
            'cost' => 'required|numeric|max:999999999',
            'price' => 'required|numeric|max:999999999',
            'brand' => 'required',
            'stock' => 'required|integer',
            'low_stock' => 'required|integer',
            'status' => 'required|boolean',

            'category' => [
                'required',
                Rule::exists('categories', 'id')->where('id', $this->request->get('category')),
            ],

            'condition' => [
                'required',
                Rule::in(Attributes::make('condition')->keys()),
            ],

        ];
    }

    /**
     * Builds the validation rules for the product features.
     *
     * @return array
     */
    protected function rulesForFeatures() : array
    {
        return (new FeaturesRepository)->filterableValidationRules();
    }

    /**
     * Builds the validation rules for the product pictures.
     *
     * @return array
     */
    protected function forPictures() : array
    {
        $pictures = Collection::make($this->all())->filter(function($item, $key) {
            return $key == 'pictures';
        })->get('pictures');

        if (is_null($pictures) || empty($pictures['storing'])) {
            return [];
        }

        return Collection::make($pictures['storing'])->mapWithKeys(function($item, $key) {
            return ['pictures.storing.' . $key => [
                'mimes:jpeg,png,jpg',
                Rule::dimensions()->maxWidth(1000)->maxHeight(500)
            ]];
        })->all();
    }

    /**
     * Format the pictures validation errors messages.
     *
     * @return array
     */
    public function messages() : array
    {
        return array_merge($this->picturesErrorsMessages(), [
            'condition.in' => trans('products.validation_errors.condition')
        ]);
    }

    /**
     * Returns the messages errors for given pictures inputs.
     *
     * @return array
     */
    protected function picturesErrorsMessages()
    {
        return [
            'pictures.storing.*' => trans('products.validation_errors.pictures_upload')
        ];
    }
}