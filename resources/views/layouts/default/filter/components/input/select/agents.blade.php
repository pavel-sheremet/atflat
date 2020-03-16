<div class="form-group">
    <label>{{ __('filter.'.$code.'.select.label') }}</label>
    <select @if ($multiple) multiple @endif class="form-control" name="filter[{{ $filter_name }}][{{ $code }}][]">
        @foreach($agents as $agent)
            <option
                @if (isset($filters->get($filter_name)[$code]) && in_array($agent->user->id, $filters->get($filter_name)[$code])) selected @endif
                value="{{ $agent->user->id }}"
            >{{ $agent->user->fullName }}</option>
        @endforeach
    </select>
</div>
