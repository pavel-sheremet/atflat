<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AgentRequest extends FormRequest
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
            'agency_id' => 'required|integer',
            'user_id' => 'unique:agents'
        ];
    }

    public function messages()
    {
        return [
            'agency_id.required' => __('agent.page.create.form.errors.agency_id.required'),
            'user_id.unique' => __('agent.page.create.form.errors.user_id.unique'),
        ];
    }
}
