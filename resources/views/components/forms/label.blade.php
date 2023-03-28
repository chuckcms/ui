@props([
    'label' => null,
    'for' => null
])

@php
    $attributes = $attributes->class([
        'form-label',
    ])->merge([
        'for' => $for
    ]);
@endphp

@if($label || !$slot->isEmpty())
    <label {{ $attributes }}>
        {{ $label ?? $slot }}
    </label>
@endif