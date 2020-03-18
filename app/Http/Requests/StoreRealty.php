<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRealty extends FormRequest
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

    protected function prepareForValidation()
    {
        $this->merge([
            'user_id' => \Auth::id(),
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'type' => 'required',
            'rooms_number' => 'required',
            'price' => 'required|numeric',
            'sub_price' => 'numeric|nullable',
        ];
    }

    public function messages()
    {
        return [
            'type.required' => __('validation.required', ['attribute' => __('realty.create.input.type.label')]),
            'rooms_number.required' => __('validation.required', ['attribute' => __('realty.create.input.rooms_number.label')]),
            'price.required' => __('validation.required', ['attribute' => __('realty.create.input.price.label')]),
            'price.numeric' => __('validation.numeric', ['attribute' => __('realty.create.input.price.label')]),
            'sub_price.numeric' => __('validation.numeric', ['attribute' => __('realty.create.input.sub_price.label')]),
        ];
    }
}
