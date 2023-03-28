<nav {{ $attributes->class(
    [
        'navbar navbar-expand-'.$expand, 
        'navbar-dark bg-dark' => isset($darkMode), 
        'navbar-light bg-light' => !isset($darkMode)
    ]) 
}}>
    <div class="container-fluid">
        @if(!$brand)
        <a class="navbar-brand" href="{{ $brandUrl }}">
            @isset($logo)
            <img src="{{ $logo }}" alt="{{ $brand }}" width="30" height="24">
            @endisset
            {{ $logoText ?? null }}
        </a>
        @endif

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#{{ $id }}" aria-controls="{{ $id }}" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="{{ $id }}">
            {{ $slot }}
        </div>
    </div>
</nav>