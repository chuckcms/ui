@php
    $attributes = $attributes->class([
        'nav-link',
        'dropdown-toggle',
    ])->merge([
        'href' => '#',
        'label' => $label,
        'data-bs-toggle' => 'dropdown',
        'aria-expanded' => 'false'
    ]);
@endphp

<li class="nav-item dropdown{{ !$last ? ' me-2' : '' }}">
    <x-nav-link :icon="$icon" {{ $attributes }}></x-nav-link>

    <ul class="dropdown-menu">
        {{ $slot }}
    </ul>
</li>