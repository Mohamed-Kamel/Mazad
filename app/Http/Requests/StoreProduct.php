<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProduct extends FormRequest
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
            'name' => 'required|min:3|max:20',
            'price'=> 'required|min:1|regex:/^([0-9]*[.])?[0-9]+/',
            'details' => 'required|min:10',
            'image' => 'required|mimes:jpeg,bmp,png',
        ];
    }
}
