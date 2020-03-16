<div class="container">
    <div class="row justify-content-center">
        @foreach($realty as $realty_item)

            <div class="col-md-6">
                <div class="card mb-2">
                    <img class="card-img-top" src="..." alt="Card image cap">
                    <div class="card-body">
                        <p class="card-text">{{ $realty_item->description }}</p>
                    </div>
                    <a href="{{ route('realty.show', ['realty' => $realty_item->id]) }}" class="btn btn-primary">Primary</a>
                </div>
            </div>

        @endforeach

    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-12">
            {{ $realty->appends(request()->all())->onEachSide(1)->links('layouts.default.paginate') }}
        </div>
    </div>
</div>
