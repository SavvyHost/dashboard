<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateHotelRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'code' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'hotel_category_id' => 'required|integer|exists:hotel_categories,id',
            'destination_id' => 'required|integer|exists:destinations,id',
            'zone_id' => 'required|integer|exists:zones,id',
            'currency_id' => 'required|integer|exists:currencies,id',
            'supplier_id' => 'required|integer|exists:suppliers,id',
            'lat' => 'required|string|max:255',
            'lng' => 'required|string|max:255',
            'banner' => 'nullable|image',
            'min_rate' => 'required|numeric',
            'max_rate' => 'required|numeric|gt:min_rate',
            'images' => 'array',
            'images.*' => 'image',
        ];
    }
}
