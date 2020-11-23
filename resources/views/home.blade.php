@extends('layouts.app')

@section('title', __('main.title'))
@section('title', __('main.description'))

@section('content')
    <div class="container">
        <div class="row vh-25 d-flex justify-content-center align-items-end">
            <img class="d-block mx-auto h-100" src="{{ Storage::disk('images')->url('logo_light_500x397.png') }}" alt="ATFLAT">
        </div>
        <div class="row p-4 d-flex justify-content-center">
            <div class="main-white-text">
                <p>{{ __('main.platform.welcome') }}</p>
                <p>{!! __('main.platform.slogan') !!}</p>
                <p>{!! __('main.platform.link_text') !!}</p>
            </div>
        </div>
    </div>
@endsection
