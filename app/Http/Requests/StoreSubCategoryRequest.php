<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSubCategoryRequest extends FormRequest
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
            'sub_category_name' => 'required|min:3|max:255',
            'slug' => 'required|min:3|max:255|unique:sub_categories',
            'status' => 'required',
            'serial' => 'required|numeric',
            'category_id' => 'required'
        ];
    }
}
