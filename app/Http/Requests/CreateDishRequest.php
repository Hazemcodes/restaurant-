<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateDishRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
           'name' => 'required',
           'resturant_id' => 'required|numeric|exists:resturants,id',
           'description' => 'required',
           'price' => 'required|numeric',
           'categories' => 'nullable|sometimes|array',
           'categories.*' => 'required|exists:categories,id'
        ];
    }
}
