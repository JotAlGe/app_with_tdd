<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFoodRequest extends FormRequest
{

    public function authorize(): bool
    {
        return $this->user()->can('update', $this->food);
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'min:5', 'max:50', 'string'],
            'description' => ['required', 'max:500', 'string'],
            'price' => ['required', 'float']
        ];
    }
}
