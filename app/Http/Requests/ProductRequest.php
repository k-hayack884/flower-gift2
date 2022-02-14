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
            'category' => ['required', 'exists:secondary_categories,id',],
            'name' => ['required', 'string', 'max:50'],
            'comment' => ['required', 'string', 'max:200'],
            'status' => ['required', 'between:1,3'],
            'image' => ['image', 'mimes:jpg,jpeg,png', 'max:2048'],
            'address' => ['string', 'max:50'],
            'trade_type' => ['required', 'between:1,3'],
        ];
    }
}
