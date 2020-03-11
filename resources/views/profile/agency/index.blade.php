@extends('layouts.app')
@section('title', __('agency.page.profile.index.title'))

@section('content')
    @component('layouts.default.filter.agency', [
        'filters' => $filters,
        'order' => $order,
        'filters_number' => $filters_number,
    ])
    @endcomponent

    @component('layouts.default.profile.agency.index', [
        'agencies' => $agencies,
    ])
    @endcomponent
@endsection
