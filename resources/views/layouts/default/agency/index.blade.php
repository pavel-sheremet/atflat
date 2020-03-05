<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12 pb-2">
            <div class="card">
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        @foreach($agencies as $agency)
                            <li class="list-group-item">
                                <a href="{{ route('agency.show', ['agency' => $agency->id]) }}">{{ $agency->name }}</a>
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






