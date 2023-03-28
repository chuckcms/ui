@php
    $attributes = $attributes->class([
        'nav-item',
        'me-2' => !$last,
    ]);
@endphp

<li {{ $attributes }}>
    {{ $slot }}
</li>