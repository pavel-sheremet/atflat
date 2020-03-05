<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12 pb-2">

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#filter-modal">
                {{ __('main.button.filter.toggle_btn') }} {{ $filtersNumber }}
            </button>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#sort-modal">
                {{ __('main.button.sort.toggle_btn') }}
            </button>

            <!-- Modal -->
            <form action="{{ route('agency') }}" method="get">

                <div class="modal fade" id="filter-modal" tabindex="-1" role="dialog" aria-labelledby="filter-modalTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    {{ __('agency.page.index.filter.modal.title') }}
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">
                                @component('layouts.default.filter.components.input.text', [
                                    'filters' => $filters,
                                    'code' => 'name',
                                    'label' => __('filter.agency.input.name.label'),
                                    'placeholder' => __('filter.agency.input.name.placeholder')
                                ])
                                @endcomponent
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('main.button.close') }}</button>
                                <button type="submit" class="btn btn-primary">{{ __('main.button.filter.submit') }}</button>
                                <button type="submit" name="filter[clear]" class="btn btn-primary">{{ __('main.button.clear') }}</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="sort-modal" tabindex="-1" role="dialog" aria-labelledby="filter-modalTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    {{ __('agency.page.index.block.order.modal.title') }}
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input"
                                                   type="radio"
                                                   name="order"
                                                   value="name:asc"
                                                   @if ($order[0] == 'name' && $order[1] == 'asc') checked @endif
                                            >
                                            {{ __('order.agency.name.asc') }}
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input"
                                                   type="radio"
                                                   name="order"
                                                   value="name:desc"
                                                   @if ($order[0] == 'name' && $order[1] == 'desc') checked @endif
                                            >
                                            {{ __('order.agency.name.desc') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                    {{ __('main.button.close') }}
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    {{ __('main.button.sort.submit') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
