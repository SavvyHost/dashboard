<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRoomDetailRequest extends FormRequest
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
            'net' => 'required|numeric',
            'cancellation_policy' => 'nullable|json',
            'room_id' => 'required|exists:rooms,id',
            'hotel_id' => 'required|exists:hotel,id',
            'supplier_id' => 'required|exists:supplier,id'
        ];
    }
}
