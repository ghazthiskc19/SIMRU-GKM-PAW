@php
    $active = $active ?? '';

    $renderNavIcon = function (string $filename): string {
        $path = public_path('images/' . $filename);

        if (!file_exists($path)) {
            return '';
        }

        $svg = file_get_contents($path) ?: '';

        if ($svg === '') {
            return '';
        }

        // Inject class untuk styling warna currentColor
        return str_replace('<svg ', '<svg class="nav-icon nav-icon-svg" aria-hidden="true" ', $svg);
    };
@endphp

<div class="bottom-nav">
    <a href="{{ url('/home') }}" class="nav-item {{ $active === 'home' ? 'active' : '' }}">
        {!! $renderNavIcon('icon_home.svg') !!}
        <span class="nav-label">Home</span>
    </a>

    <a href="{{ url('/menu_mahasiswa') }}" class="nav-item {{ $active === 'menu' ? 'active' : '' }}">
        {!! $renderNavIcon('icon_menu.svg') !!}
        <span class="nav-label">Menu</span>
    </a>

    <a href="{{ url('/profil_mahasiswa') }}" class="nav-item {{ $active === 'profil' ? 'active' : '' }}">
        {!! $renderNavIcon('icon_profile.svg') !!}
        <span class="nav-label">Profil</span>
    </a>
</div>