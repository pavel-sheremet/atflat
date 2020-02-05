@extends('layouts.app')
@section('title', __('agency.title'))

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @foreach($agencies as $agency)
                <div class="col-md-6">
                    <div class="card mb-2">
                        <a href="{{ route('agency.show', $agency->id) }}">
                        <div class="card-header">
                            {{ $agency->name }}
                        </div>
                        </a>
                        <div class="card-body p-2">
                            {{ $agency->description }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
