@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        @if (!Auth::user()->isAgent())
            <div class="col-md-12">
                <div class="card mb-2">
                    <div class="card-body">
                        <p class="card-text">
                            {!! __('agent.page.profile.show.block.register.description') !!}
                        </p>
                    </div>
                </div>
            </div>
        @endif

    </div>
</div>
@endsection
