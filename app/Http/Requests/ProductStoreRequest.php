<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
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
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'description' => 'required',
            'price' => 'required|numeric|min:0',
            'stock_count' => 'required|numeric|min:0',
            'min_stock' => 'required|numeric|min:0',
        ];
    }
    public function messages(): array
    {
        return [
            'category_id.required' => 'The category field is required.',
            'category_id.exists' => 'The category id is invalid.',
            'name.required' => 'The product name field is required.',
            'name.string' => 'The product name must be a string.',
            'name.max' => 'The product name must be less than 255 characters.',
            'description.required' => 'The product description field is required.',
            'price.required' => 'The product price field is required.',
            'price.numeric' => 'The product price must be a number.',
            'price.min' => 'The product price must be at least 0.',
            'stock_count.required' => 'The product stock count field is required.',
            'stock_count.min' => 'The product stock count must be at least 0.',
            'stock_count.numeric' => 'The product stock count must be a number.',
            'min_stock.required' => 'The product min stock field is required.',
            'min_stock.min' => 'The product min stock must be at least 0.',
        ];
    }
}
