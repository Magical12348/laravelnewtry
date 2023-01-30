<label for="{{ $name }}" class="form-label">{{ $title }}
    @if ($required)
        <span style="color:red">*</span>
    @endif
</label>
<select class="form-select taggable" id="{{ $name }}" name="{{ $name }}[]" multiple data-allow-clear="1"
    data-allow-new="true" data-separator=",">
    <option selected disabled>-select-</option>
    @if (isset($selected))
        @foreach (json_decode($selected) as $item)
            <option selected value="{{ $item }}">{{ $item }}</option>
        @endforeach
    @endif
    @if (old($name))
        @foreach (old($name) as $item)
            <option selected value="{{ $item }}">{{ $item }}</option>
        @endforeach
    @endif
</select>
<small class="text-secondary" style="display:block">Press enter to have more than one tag</small>
@error($name)
    <small class="text-danger">{{ $message }}</small>
@enderror
