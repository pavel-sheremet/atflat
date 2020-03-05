<div class="form-group">
    <label>{{ __('filter.'.$code.'.input.label') }}</label>
    <input type="text"
           class="form-control"
           aria-describedby="emailHelp"
           value="{{ isset($filters[$code]) ? $filters[$code] : '' }}"
           name="filter[{{ $code }}]"
           placeholder="{{ __('filter.'.$code.'.input.placeholder') }}"
    >
</div>
