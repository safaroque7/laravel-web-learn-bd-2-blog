<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
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
    // public function rules(): array
    // {
    //     return [
    //         'name' => 'required|min:3|max:255',
    //         'slug' => 'required|min:3|max:255|unique:categories,slug,' . $this->category->id,
    //         'serial' => 'required',
    //         'status' => 'required',
    //         'serial' => 'required|numeric',
    //     ];
    // }


    public function rules(): array
{
    return [
        'category_name' => 'required|min:3|max:255',
        'slug' => 'required|min:3|max:255|unique:categories,slug,' . $this->category->id,
        'status' => 'required',
        'serial' => 'required|numeric|unique:categories,serial,' . $this->category->id,
    ];
}

}
