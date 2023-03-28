@php
    $attributes = $attributes->class([
        'nav-link' => !$dropdown,
        'dropdown-item' => $dropdown,
        'active' => $active,
    ])->merge([
        'href' => $href,
        'wire:click.prevent' => $click,
    ]);
@endphp

<a {{ $attributes }}
    @if($active) aria-current="page" @endif
><x-icon :name="$icon"/>{{ $label ?? $slot }}</a>