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
            'city_id' => City::firstOrCreate([
                'name' => $this->input('geo.locality'),
                'province' => $this->input('geo.province')
            ])->id,
            'district' => $this->input('geo.district'),
            'street' => $this->input('geo.street'),
            'house' => $this->input('geo.house'),
            'metro' => $this->input('geo.metro'),
            'images' => $this->input('images'),
            'main_image_id' => $this->input('main_image.id'),
            'rent_period_id' => $this->input('rent_period'),
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
            'street' => 'required_without:district',
            'district' => 'required_without:street',
            'main_image_id' => 'required_with:images',
            'rent_period_id' => 'required',
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
            'street.required_without' => __('realty.validation.street.required'),
            'district.required_without' => __('realty.validation.street.required'),
            'images.required' => __('realty.validation.images.required'),
            'main_image_id.required_with' => __('realty.validation.main_image_id.required'),
            'rent_period_id.required' => __('realty.validation.rent_period.required'),
        ];
    }
}
