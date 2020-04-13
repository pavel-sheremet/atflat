<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class ImageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Auth::id();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'file' => 'mimes:jpg,jpeg,png|max_mb:2'
        ];
    }

    public function messages()
    {
        return [
            'file.mimes' => __('validation.mimes.multiple.images'),
            'file.max_mb' => __('validation.max.file.multiple.mb'),
        ];
    }
}
