@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        @if (session('status'))
            <div class="col-12">
                <div class="card">
                    <div class="card-header">Dashboard</div>
                    <div class="card-body">
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if ($agencies)
            <div class="col-md-6">
                <div class="card mb-2">
                    <div class="card-header">{{ __('profile.my_agencies') }}</div>
                    <div class="card-body p-0">
                        @foreach($agencies as $agency)
                            <div id="accordion-agency-{{ $agency->id }}">
                                <div class="card-header p-2" id="heading-agency-{{ $agency->id }}">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link"
                                                data-toggle="collapse"
                                                data-target="#collapse-agency-{{ $agency->id }}"
                                                aria-expanded="true"
                                                aria-controls="collapse-agency-{{ $agency->id }}"
                                        >
                                            {{ $agency->name }}
                                        </button>
                                    </h5>
                                </div>

                                <div id="collapse-agency-{{ $agency->id }}"
                                     class="collapse"
                                     aria-labelledby="heading-agency-{{ $agency->id }}"
                                     data-parent="#accordion-agency-{{ $agency->id }}"
                                >
                                    <div class="card-body">
                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif

    </div>
</div>
@endsection
