@if($filter_name)
    @foreach(RequestHelper::getFiltersWithout($filter_name) as $filter_name => $filters)
        @foreach($filters as $input_name => $values)
            @if(is_array($values))
                @foreach($values as $value)
                    <input type="hidden" name="filter[{{ $filter_name }}][{{ $input_name }}][]" value="{{ $value }}">
                @endforeach
            @else
                <input type="hidden" name="filter[{{ $filter_name }}][{{ $input_name }}]" value="{{ $values }}">
            @endif
        @endforeach
    @endforeach

    @if(RequestHelper::getOrder()->has($filter_name))
        @foreach(RequestHelper::getOrder()->get($filter_name) as $name => $direction)
            <input type="hidden" name="order[{{ $filter_name }}][{{ $name }}]" value="{{ $direction }}">
        @endforeach
    @endif
@endif

