@extends('layouts.app')
@section('title', __('agency.page.index.title'))

@section('content')

    @component('layouts.default.filter.agency', [
        'filters' => $filters,
        'order' => $order,
        'filters_number' => $filters_number,
        'filter_name' => 'agency'
    ])
    @endcomponent

    @component('layouts.default.agency.index', [
        'agencies' => $agencies,
    ])
    @endcomponent

@endsection
