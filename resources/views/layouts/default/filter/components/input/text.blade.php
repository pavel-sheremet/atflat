<div class="form-group">
    <label>{{ $label ?? __('filter.'.$code.'.input.label') }}</label>
    <input type="text"
           class="form-control"
           aria-describedby="emailHelp"
           value="{{ isset($filters[$filter_name][$code]) ? $filters[$filter_name][$code] : '' }}"
           name="filter[{{ $filter_name }}][{{ $code }}]"
           placeholder="{{ $placeholder ?? __('filter.'.$code.'.input.placeholder') }}"
    >
</div>
