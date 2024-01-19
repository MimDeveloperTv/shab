<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'title' => 'required|unique:products|max:30',
            'price' => 'required|decimal:0|max_digits:9',
        ];
    }

    public function getTitle()
    {
        return $this->input('title');
    }

    public function getPrice(): float
    {
        return (float) $this->input('price');
    }

}
