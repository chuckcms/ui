@props([
    'label' => null,
    'type' => 'text',
    'icon' => null,
    'id' => null,
    'prepend' => null,
    'append' => null,
    'size' => null,
    'help' => null,
    'model' => null,
    'debounce' => false,
    'lazy' => false,
])

@php
    if ($type == 'number') $inputmode = 'decimal';
    else if (in_array($type, ['tel', 'search', 'email', 'url'])) $inputmode = $type;
    else $inputmode = 'text';
    if ($debounce) $bind = 'debounce.' . (ctype_digit($debounce) ? $debounce : 150) . 'ms';
    else if ($lazy) $bind = 'lazy';
    else $bind = 'defer';
    $wireModel = $attributes->whereStartsWith('wire:model')->first();
    $key = $attributes->get('name', $model ?? $wireModel);
    
    $prefix = config('laravel-bootstrap-components.use_with_model_trait', false) ? 'model.' : null;
    $attributes = $attributes->class([
        'form-control',
        'form-control-' . $size => $size,
        'rounded-end' => !$append,
        'is-invalid' => $errors->has($key),
    ])->merge([
        'type' => $type,
        'inputmode' => $inputmode,
        'id' => $id,
        'wire:model.' . $bind => $model ? $prefix . $model : null,
    ]);
@endphp

<div>
    <x-label :for="$id" :label="$label"/>

    <div class="input-group">
        <x-input-addon :icon="$icon" :label="$prepend"/>

        <input {{ $attributes }}>

        <x-input-addon :label="$append" class="rounded-end"/>

        {{-- <x-bs::error :key="$key"/> --}}
    </div>

    {{-- <x-bs::help :label="$help"/> --}}
</div>


{{-- <input
    name="{{ $name }}"
    type="{{ $type }}"
    id="{{ $id }}"
    @if($value)value="{{ $value }}"@endif
    {{ $attributes }}
/> --}}