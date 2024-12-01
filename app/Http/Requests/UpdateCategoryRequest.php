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
    //         'slug_name' => 'required|min:3|max:255|unique:categories,slug_name,' . $this->category->id,
    //         'slug_id' => 'required',
    //         'status' => 'required',
    //         'serial' => 'required|numeric',
    //     ];
    // }


    public function rules(): array
{
    return [
        'name' => 'required|min:3|max:255',
        'slug_name' => 'required|min:3|max:255|unique:categories,slug_name,' . $this->category->id,
        'status' => 'required',
        'serial' => 'required|numeric',
    ];
}

}
