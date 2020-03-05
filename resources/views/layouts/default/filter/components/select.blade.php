<div class="form-group">
    <label>{{ __('filter.'.$code.'.select.label') }}</label>
    <select @if ($multiple) multiple @endif class="form-control" name="filter[{{ $code }}][]">
        @foreach($items as $item)
            <option
                @if (isset($filters[$code]) && in_array($item->id, $filters[$code])) selected @endif
            value="{{ $item->id }}"
            >{{ $item->name }}</option>
        @endforeach
    </select>
</div>
