<div class="form-group">
    <label>{{ __('filter.'.$code.'.select.label') }}</label>
    <select @if ($multiple) multiple @endif class="form-control" name="filter[{{ $filter_name }}][{{ $code }}][]">
        @foreach($items as $item)
            <option
                @if (isset($filters->get($filter_name)[$code]) && in_array($item->id, $filters->get($filter_name)[$code])) selected @endif
            value="{{ $item->id }}"
            >{{ $item->name }}</option>
        @endforeach
    </select>
</div>
