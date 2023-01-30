<label for="{{ $name }}" class="form-label">{{ $title }}
    @if ($required)
        <span style="color:red">*</span>
    @endif
</label>
<input type="text" class="form-control" id="{{ $name }}" name="{{ $name }}"
    value="{{ $value }}">
@error($name)
    <small class="text-danger">{{ $message }}</small>
@enderror
