@extends('layouts.app')

@section('content')
    <yandex-map-component
        v-bind:init_start_coords="true"
        v-bind:kind="'locality'"
        v-bind:zoom="12"
    ></yandex-map-component>

    <realty-search-request-form-component
        v-bind:rent_period="{{ json_encode($rent_period) }}"
        v-bind:type="{{ json_encode($type) }}"
        v-bind:rooms_number="{{ json_encode($rooms_number) }}"
    ></realty-search-request-form-component>
@endsection
