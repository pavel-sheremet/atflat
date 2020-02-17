@extends('layouts.app')
@section('title', __('agency.page.profile.index.title'))

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-12">
                <div class="card mb-2">
                    <div class="card-body pb-0">
                        <h5 class="card-title">{{ __('agency.page.profile.show.block.agents.title') }}</h5>
                        <p class="card-text">
                            @if (count($agency->agents))
                                {!! __('agency.page.profile.show.block.agents.description.exist_agents', ['name' => $agency->name]) !!}
                            @else
                                {!! __('agency.page.profile.show.block.agents.description.not_exist_agents') !!}
                            @endif
                        </p>
                    </div>

                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            @foreach ($agency->agents as $agent)
                                <li class="list-group-item px-0">
                                    <a href="{{ route('agent.show', $agent->id) }}">{{ $agent->user->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
