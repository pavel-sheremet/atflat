<div class="form-group">
    <label>{{ $label ?? __('filter.'.$code.'.input.label') }}</label>
    <input type="text"
           class="form-control"
           aria-describedby="emailHelp"
           value="{{ isset($filters[$code]) ? $filters[$code] : '' }}"
           name="filter[{{ $code }}]"
           placeholder="{{ $placeholder ?? __('filter.'.$code.'.input.placeholder') }}"
    >
</div>
