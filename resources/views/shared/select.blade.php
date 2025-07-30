@php
    $label ??= ucfirst($name);
    $type ??= 'text';
    $name ??= null;
    $class = ($class ?? '') . (($multiple ?? false) || $name === 'options' ? ' select2' : '');
    $value = $value ?? [];
    if (!is_array($value)) {
        $value = collect($value)->toArray();
    }
    $isMultiple = ($multiple ?? false) || $name === 'options';
@endphp

<div @class(["form-group", $class])>
    <label for="{{ $name }}">{{ $label }}</label>
    <select
        class="form-select @error($name) is-invalid @enderror{{ $isMultiple ? ' select2' : '' }}"
        name="{{ $name }}{{ $isMultiple ? '[]' : '' }}"
        id="{{ $id ?? $name }}"
        {{ $isMultiple ? 'multiple' : '' }}
    >
        @if (isset($placeholder))
            <option value="" disabled>{{ $placeholder }}</option>
        @endif
        @if ($name === 'category_id' && isset($categories))
            @foreach ($categories as $k => $v)
                <option
                    value="{{ $k }}"
                    {{ (old($name, is_array($value) && count($value) === 1 ? $value[0] : $value) == $k) ? 'selected' : '' }}
                >
                    {{ $v }}
                </option>
            @endforeach
        @elseif ($name === 'options' && isset($options))
            @foreach ($options as $k => $v)
                <option
                    value="{{ $k }}"
                    {{ in_array($k, old($name, $value)) ? 'selected' : '' }}
                >
                    {{ $v }}
                </option>
            @endforeach
        @endif
    </select>

    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
