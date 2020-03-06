@extends('layouts.app')
@section('title', __('agency.page.profile.index.title'))

@section('content')
    @component('layouts.default.filter.agency', [
        'filters' => $filters,
        'order' => $order,
        'filtersNumber' => $filtersNumber,
    ])
    @endcomponent

    @component('layouts.default.profile.agency.index', [
        'agencies' => $agencies,
    ])
    @endcomponent
@endsection
