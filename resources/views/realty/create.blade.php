@extends('layouts.app')
@section('title', __('realty.nav'))

@section('content')

    <yandex-map-component
        v-bind:init_start_coords="true"
    ></yandex-map-component>

    <realty-create-form-component
        v-bind:data_url="'{{ route('api.realty.create') }}'"
        v-bind:save_url="'{{ route('api.realty.store') }}'"
    ></realty-create-form-component>

@endsection
