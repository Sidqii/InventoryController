<?php

namespace App\Http\Requests\Inventory;

use Illuminate\Foundation\Http\FormRequest;

class StockMovementRequest extends FormRequest
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
            'product_id' => 'required|exists:inven_product,id',
            'type' => 'required|in:IN,OUT,ADJUST',
            'quantity' => 'required|integer|min:1',
            'references_type' => 'nullable|string',
            'references_id' => 'nullable|integer',
            'note' => 'nullable|string',
        ];
    }
}
