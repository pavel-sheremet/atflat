@extends('layouts.app')
@section('title', __('agent.page.create.title'))

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('agent.page.create.form.title') }}</div>



                    <div class="card-body">
                        <form method="POST" action="{{ route('agent.store') }}">
                            @csrf

                            @if ($errors->has('user_id'))
                                @foreach ($errors->get('user_id') as $error)
                                    <div class="alert alert-danger" role="alert">{{ $error }}</div>
                                @endforeach
                            @endif

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">{{ __('agent.page.create.form.input.agency.label') }}</label>

                                <div class="col-md-6">
                                    <select class="form-control" name="agency_id">
                                        <option value="">{{ __('main.form.not_select') }}</option>
                                        @foreach($agencies as $agency)
                                            <option value="{{ $agency->id }}">{{ $agency->name }}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                            @if ($errors->has('agency_id'))
                                @foreach ($errors->get('agency_id') as $error)
                                    <div class="alert alert-danger" role="alert">{{ $error }}</div>
                                @endforeach
                            @endif

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('main.form.save') }}
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
