@extends('layouts.app')
@section('title', __('agent.page.index.title'))

@section('content')

    @component('layouts.default.filter.agent', [
        'filters' => $filters,
        'order' => $order,
        'filtersNumber' => $filtersNumber,
        'agencies' => $agencies
    ])
    @endcomponent

    @component('layouts.default.agent.index', [
        'agents' => $agents,
    ])
    @endcomponent



@endsection
