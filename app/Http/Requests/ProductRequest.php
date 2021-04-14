<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'image'=>'required|unique:produits|image|mimes:jpeg,jpg,png,gif,svg,pdf|max:2048',
            'designation'=>'required|min:4|unique:produits',
            'price'=>'required|min:3|numeric',
            'id_categorie'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'min'=>'Please enter minimum :min characters',
        ];
    }
}
