<?php

namespace App\Http\Requests;

use App\City;
use Illuminate\Foundation\Http\FormRequest;

class RealtyRequest extends FormRequest
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
        $this->replace([
            'user_id' => \Auth::id(),
            'type_id' => $this->input('type'),
            'lat' => $this->input('geo.coords')[0],
            'long' => $this->input('geo.coords')[1],
            'rooms_number_id' => $this->input('rooms_number'),
            'description' => $this->input('description'),
            'price' => $this->input('price'),
            'sub_price' => $this->input('sub_price'),
            'province' => $this->input('geo.province'),
            'geo_area' => $this->input('geo.area'),
            'city_id' => City::firstOrCreate(['name' => $this->input('geo.locality')])->id,
            'vegetation' => $this->input('geo.vegetation'),
            'district' => $this->input('geo.district'),
            'street' => $this->input('geo.street'),
            'house' => $this->input('geo.house'),
            'metro' => $this->input('geo.metro'),
            'images' => $this->input('images')
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
            'type_id' => 'required',
            'rooms_number_id' => 'required',
            'price' => 'required|numeric',
            'sub_price' => 'numeric|nullable',
            'street' => 'required',
            'images' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'type_id.required' => __('validation.required', ['attribute' => __('realty.create.input.type.label')]),
            'rooms_number_id.required' => __('validation.required', ['attribute' => __('realty.create.input.rooms_number.label')]),
            'price.required' => __('validation.required', ['attribute' => __('realty.create.input.price.label')]),
            'price.numeric' => __('validation.numeric', ['attribute' => __('realty.create.input.price.label')]),
            'sub_price.numeric' => __('validation.numeric', ['attribute' => __('realty.create.input.sub_price.label')]),
            'street.required' => __('realty.validation.street.required'),
            'images.required' => __('realty.validation.images.required'),
        ];
    }
}
