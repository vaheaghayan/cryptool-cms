<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rules\File;
use Illuminate\Foundation\Http\FormRequest;

class AlgorithmRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'data.name' => 'string|required',
            'data.description' => 'string|required',
            'data.img.icon' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
            'data.img.image_1' => 'image',
            'data.img.image_2' => 'image',
            'data.img.image_3' => 'image',
            'data.show_status' => 'required|in:1,0',
            'ml.en.title' => 'required|string',
            'ml.am.title' => 'required|string',
        ];
    }
}