@extends('layouts.app')
@section('title', __('realty.nav'))

@section('content')
    <yandex-map-component
        v-bind:init_start_coords="false"
    ></yandex-map-component>


    <realty-create-form-component
        v-bind:data_url="'{{ route('api.realty.edit', ['realty' => $realty->id]) }}'"
        v-bind:save_url="'{{ route('api.realty.update', ['realty' => $realty->id]) }}'"
        v-bind:destroy_url="'{{ route('api.realty.destroy', ['realty' => $realty->id]) }}'"
    ></realty-create-form-component>
@endsection
