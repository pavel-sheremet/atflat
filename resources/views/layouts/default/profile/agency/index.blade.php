<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mb-2">
                <div class="card-body pb-0">
                    <p class="card-text">
                        @if (count($agencies))
                            {!! __('agency.page.profile.index.block.list.description.exist_agencies') !!}
                        @else
                            {!! __('agency.page.profile.index.block.list.description.not_exist_agencies') !!}
                        @endif
                    </p>
                </div>

                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        @foreach ($agencies as $agency)
                            <li class="list-group-item px-0">
                                <a href="{{ route('profile.agency.show', ['agency' => $agency->id]) }}">{{ $agency->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-12">
            {{ $agencies->appends(request()->all())->onEachSide(1)->links('layouts.default.paginate') }}
        </div>
    </div>
</div>






