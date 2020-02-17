@extends('layouts.app')
@section('title', __('agent.page.index.title'))

@section('content')
    <div class="container">
        <div class="row justify-content-center">
{{--            @foreach($agents as $agent)--}}
{{--                <div class="col-md-6">--}}
{{--                    <div class="card mb-2">--}}
{{--                        <a href="{{ route('agency.show', $agent->id) }}">--}}
{{--                        <div class="card-header">--}}
{{--                            {{ $agent->name }}--}}
{{--                        </div>--}}
{{--                        </a>--}}
{{--                        <div class="card-body p-2">--}}
{{--                            {{ $agent->description }}--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            @endforeach--}}
        </div>
    </div>
@endsection
