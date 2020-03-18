@extends('layouts.app')
@section('title', __('agency.page.profile.realty.create.title'))

@section('content')

    <realty-create-form-component
        v-bind:success_route="'profile.agency.realty.show'"
    ></realty-create-form-component>

@endsection
