<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateResturantRequest extends FormRequest
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
            'name' => 'required|unique:resturants',
            'city_id' => 'required|numeric|exists:cities,id' . $this->city_id,
            'address' => 'required|unique:resturants',
            'phone' => 'required|unique:resturants',
            'description' => 'required'
        ];
    }
}
