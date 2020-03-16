<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12 pb-2">

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#filter-modal-agent">
                {{ __('main.button.filter.toggle_btn') }} {{ $filters_number->get($filter_name) }}
            </button>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#sort-modal-agent">
                {{ __('main.button.sort.toggle_btn') }}
            </button>

            <!-- Modal -->
            <form action="{{ url()->full() }}" method="get">

                <div class="modal fade" id="filter-modal-agent" tabindex="-1" role="dialog" aria-labelledby="filter-modalTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    {{ __('agent.page.index.filter.modal.title') }}
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">
                                @component('layouts.default.filter.components.input.select.agents', [
                                    'filters' => $filters,
                                    'filter_name' => $filter_name,
                                    'code' => 'user_id',
                                    'multiple' => true,
                                    'agents' => $agents
                                ])
                                @endcomponent
                            </div>

                            @component('layouts.default.filter.components.input.exclude', ['filter_name' => $filter_name])
                            @endcomponent

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('main.button.close') }}</button>
                                <button type="submit" class="btn btn-primary">{{ __('main.button.filter.submit') }}</button>
                                <button type="submit" name="filter[clear]" value="realty" class="btn btn-primary">{{ __('main.button.clear') }}</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="sort-modal-agent" tabindex="-1" role="dialog" aria-labelledby="filter-modalTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
{{--                            <div class="modal-header">--}}
{{--                                <h5 class="modal-title" id="exampleModalLongTitle">--}}
{{--                                    {{ __('agent.page.index.order.modal.title') }}--}}
{{--                                </h5>--}}
{{--                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                                    <span aria-hidden="true">&times;</span>--}}
{{--                                </button>--}}
{{--                            </div>--}}
{{--                            <div class="modal-body">--}}
{{--                                <div class="form-group">--}}
{{--                                    <div class="form-check">--}}
{{--                                        <label class="form-check-label">--}}
{{--                                            <input class="form-check-input"--}}
{{--                                                   type="radio"--}}
{{--                                                   name="order[{{ $filter_name }}][user_name]"--}}
{{--                                                   value="asc"--}}
{{--                                                   @if ($order->get($filter_name)['user_name'] == 'asc') checked @endif--}}
{{--                                            >--}}
{{--                                            {{ __('order.agent.user.name.asc') }}--}}
{{--                                        </label>--}}
{{--                                    </div>--}}
{{--                                    <div class="form-check">--}}
{{--                                        <label class="form-check-label">--}}
{{--                                            <input class="form-check-input"--}}
{{--                                                   type="radio"--}}
{{--                                                   name="order[{{ $filter_name }}][user_name]"--}}
{{--                                                   value="desc"--}}
{{--                                                   @if ($order->get($filter_name)['user_name'] == 'desc') checked @endif--}}
{{--                                            >--}}
{{--                                            {{ __('order.agent.user.name.desc') }}--}}
{{--                                        </label>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="modal-footer">--}}
{{--                                <button type="button" class="btn btn-secondary" data-dismiss="modal">--}}
{{--                                    {{ __('main.button.close') }}--}}
{{--                                </button>--}}
{{--                                <button type="submit" class="btn btn-primary">--}}
{{--                                    {{ __('main.button.sort.submit') }}--}}
{{--                                </button>--}}
{{--                            </div>--}}
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
