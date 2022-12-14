<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PizzaUpdateRequest extends FormRequest
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
            'name' => 'required|min:3|max:60',
            'description' => 'required|min:3|max:500',
            'small_price' => 'required|numeric',
            'medium_price' => 'required|numeric',
            'large_price' => 'required|numeric',
            'category' => 'required',
            'image' => 'mimes:png,jpeg,jpg',
        ];
    }
}
