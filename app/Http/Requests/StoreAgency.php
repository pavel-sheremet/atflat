<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAgency extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255|unique:agencies'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => __('agency.page.create.block.form.errors.name.required'),
            'name.max' => __('agency.page.create.block.form.errors.name.max'),
            'name.unique' => __('agency.page.create.block.form.errors.name.unique'),
        ];
    }
}
