@extends('layouts.app')
@section('title', __('agent.page.index.title'))

@section('content')

    @component('layouts.default.filter.agent', [
        'filters' => $filters,
        'order' => $order,
        'filters_number' => $filters_number,
        'filter_name' => 'agent',
        'agencies' => $agencies_filter
    ])
    @endcomponent

    @component('layouts.default.agent.index', [
        'agents' => $agents,
    ])
    @endcomponent


    @component('layouts.default.filter.agency', [
        'filters' => $filters,
        'filter_name' => 'agency',
        'order' => $order,
        'filters_number' => $filters_number,
    ])
    @endcomponent

    @component('layouts.default.agency.index', [
        'agencies' => $agencies,
    ])
    @endcomponent

@endsection
