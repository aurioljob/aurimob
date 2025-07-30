@php
    $type = $type ?? 'text';
    $name = $name ?? '';
    $value = $value ?? '';
    $placeholder = $placeholder ?? '';
    $class = $class ?? '';
    $id = $id ?? '';
    $label = $label ?? '';
@endphp

<div @class(["form-group",$class])>
    @if($label)
        <label for="{{ $id }}">{{ $label }}</label>
    @endif
    @if($type==='textarea')
        <textarea class="form-control @error($name) is-invalid @enderror"
        name="{{ $name }}"
        placeholder="{{ $placeholder }}"
        id="{{ $name }}"
        rows="3">{{ old($name, $value) }}</textarea>
    @else    
    <input class="form-control @error($name) is-invalid @enderror"
     type="{{ $type }}" name="{{ $name }}" 
     value="{{ old($name, $value) }}"
     placeholder="{{ $placeholder }}"
     id="{{ $id }}">
    @endif

    @error($name)
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>
