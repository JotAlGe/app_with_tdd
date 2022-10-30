<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCartRequest extends FormRequest
{
    /**
     */
    public function authorize(): bool
    {
        return $this->user()->can('update', $this->cart);
    }

    /**
     */
    public function rules(): array
    {
        return [
            'food_id' => ['integer', 'required']
        ];
    }
}
