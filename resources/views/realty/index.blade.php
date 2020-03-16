@extends('layouts.app')
@section('title', __('realty.nav'))

@section('content')

{{--    @component('layouts.default.filter.profile.agency.realty', [--}}
{{--        'filters' => $filter['data'],--}}
{{--        'filters_number' => $filter['number'],--}}
{{--        'filter_name' => 'realty',--}}
{{--        'agents' => $agents--}}
{{--    ])--}}
{{--    @endcomponent--}}

    @component('layouts.default.realty.index', [
        'realty' => $realty,
    ])
    @endcomponent

@endsection
