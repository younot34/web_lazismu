<header class="navbar navbar-expand-md navbar-light sticky-top d-print-none">
    <div class="container-xl">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
        <a href="{{ route('dashboard') }}">
        <img src="{{ asset('dist/img/lazismuu.png') }}" width="110" alt="Lazismu" class="navbar-brand-image">
        </a>
    </h1>
    <div class="navbar-nav flex-row order-md-last">
        <div class="row">
            <div id="time"></div>
            <div id="date"></div>
        </div>
        <div class="nav-item dropdown">
        <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
            <span class="avatar avatar-sm" style="background-image: url({{ asset('dist/img/lazismuu.png') }}); width: 50px"></span>
            <div class="d-none d-xl-block ps-2">
            <div>{{ auth()->user()->name }}</div>
            </div>
        </a>
        <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
            <a href="{{ route('profile.edit') }}" class="dropdown-item">Profile</a>
            <div class="dropdown-divider"></div>
            <a href="{{ route('logout') }}"class="dropdown-item">Logout</a>
        </div>
        </div>
    </div>
    </div>
</header>
