@extends('layouts.app')
@section('title', __('agency.page.profile.index.title'))

@section('content')

    @component('layouts.default.filter.profile.agency.realty', [
        'filters' => $filter['data'],
        'filters_number' => $filter['number'],
        'filter_name' => 'realty',
        'agents' => $agents
    ])
    @endcomponent

    @component('layouts.default.profile.agency.realty.index', [
        'realty' => $realty,
        'agency' => $agency
    ])
    @endcomponent

@endsection
