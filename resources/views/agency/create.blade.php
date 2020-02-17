@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('agency.page.create.block.form.title') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('agency.store') }}">
                            @csrf

                            @if ($errors->has('name'))
                                @foreach ($errors->get('name') as $error)
                                    <div class="alert alert-danger" role="alert">{{ $error }}</div>
                                @endforeach
                            @endif

                            <div class="form-group">
                                <label>{{ __('agency.page.create.block.form.input.name.label') }}</label>
                                <input type="text"
                                       class="form-control"
                                       name="name"
                                       placeholder="{{ __('agency.page.create.block.form.input.name.placeholder') }}"
                                       value="{{ old('name') }}"
                                >
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('main.form.create') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
