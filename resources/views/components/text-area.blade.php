<label for="{{ $name }}" class="form-label">{{ $title }} :</label>
<textarea class="form-control" id="{{ $name }}" name="{{ $name }}"
    rows="2">{{ old($name) }} {{ $value }}</textarea>
@error($name)
    <small class="text-danger">{{ $message }}</small>
@enderror
