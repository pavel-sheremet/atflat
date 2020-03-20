@extends('layouts.app')
@section('title', __('realty.nav'))

@section('content')

    <yandex-map-component></yandex-map-component>

    <realty-create-form-component></realty-create-form-component>

@endsection
