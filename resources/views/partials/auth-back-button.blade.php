@php
    $fallbackUrl = $fallbackUrl ?? route('login');
@endphp

<a href="{{ $fallbackUrl }}" class="login-back-button" aria-label="Kembali" onclick="if (window.history.length > 1) { event.preventDefault(); window.history.back(); }">
    <img src="{{ asset('images/icon_back.svg') }}" alt="Kembali">
</a>