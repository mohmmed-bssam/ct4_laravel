<div>
    <div class="{{ isset($type) && $type == 'password' ? 'pass-wrapper' : '' }}">
        <label class="form-label">{{ $label }}</label>
        <input type="{{ $type ?? 'text' }}" class="form-control @error($name)
        is-invalid
    @enderror"
            id="{{ $name }}" name="{{ $name }}" value="{{ old($name) }}">
        @if (isset($type) && $type == 'password')
            <i class="fa fa-eye"></i>
        @endif
        @error($name)
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>
