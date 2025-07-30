<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class propertyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'=>['required','string','min:4'],
            'description' => ['required','min:20'],
            'price' => ['required','integer','min:1'],
            'number_of_pieces' => ['required','integer','min:1'],
            'surface' => ['required','integer','min:10'],
            'rooms' => ['required','integer','min:1'],
            'status' => ['required','string','min:3'],
            'zone' => ['required','min:4'],
            'options'=> ['array','exists:options,id','required'],
            'category_id'=>['required','exists:categories,id'],
            'contact' => ['required','string','min:3'],
            'name_city' => ['required','string','min:3'],
            'modalite' => ['required','string','min:3'],
            'bailleur' => ['required','string','min:3'],
            'images' => ['nullable', 'array'],
            'images.*' => ['image','mimes:jpg,jpeg,png,gif' ,'max:2048','nullable'],
        ];
    }
}
