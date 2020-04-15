<div class="container" style="max-width: 600px;">
    <div class="row justify-content-center">
        @foreach($realty as $realty_item)



            <div class="col-12">
                <div class="card mb-2">
                    <div class="row no-gutters" style="height: 150px">
                        <div class="col-4 position-relative overflow-hidden d-flex justify-content-center align-items-center h-100">
                            @if ($realty_item->main_image)
                                <img src="{{ $realty_item->main_image->full_url }}" class="card-img h-auto mw-100">
                            @endif
                        </div>
                        <div class="col-8">
                            <div class="card-body pt-1">
                                <h5 class="card-title">{{ $realty_item->title }}</h5>
                                <p class="card-text mb-0">
                                    @money_month($realty_item->price)
                                    @if ($realty_item->sub_price)
                                        <small class="text-muted">
                                            {{ __('realty.create.input.sub_price.label') }} @money($realty_item->price)
                                        </small>
                                    @endif
                                </p>
                                <p class="card-text mb-0">{{ $realty_item->street_address }}</p>
                                <p class="card-text mb-0">
                                    <small class="text-muted">
                                        {{ $realty_item->nearest_metro->name }}
                                    </small>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


{{--            <div class="col-md-6">--}}
{{--                <div class="card mb-2">--}}
{{--                    <img class="card-img-top" src="..." alt="Card image cap">--}}
{{--                    <div class="card-body">--}}
{{--                        <p>{{ $realty_item->created_at }}</p>--}}
{{--                        <p class="card-text">{{ $realty_item->description }}</p>--}}
{{--                    </div>--}}
{{--                    <a href="{{ route('realty.show', ['realty' => $realty_item->id]) }}" class="btn btn-primary">Primary</a>--}}
{{--                </div>--}}
{{--            </div>--}}

        @endforeach

    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-12">
            {{ $realty->appends(request()->all())->onEachSide(2)->links('layouts.default.paginate') }}
        </div>
    </div>
</div>
