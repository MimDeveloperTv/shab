<?php

namespace App\Http\Requests\API;

use App\Rules\isUlid;
use Illuminate\Foundation\Http\FormRequest;

class ImageRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'product_id' => ['required', 'exists:products,id', new isUlid],
            'image' => 'required|image|mimes:jpg,png',
        ];
    }

    public function getId()
    {
        return $this->input('product_id');
    }

    public function getImage()
    {
        return $this->file('image');
    }
}
