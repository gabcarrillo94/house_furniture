@if ($errors->has($inputName))
    <span class="help-block">
        <strong class="text-danger">{{ $errors->first($inputName) }}</strong>
    </span>
@endif
