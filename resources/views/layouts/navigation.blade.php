<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('dashboard') }}">SIGIET</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                @if (auth()->user()->rol->nombre == 'Administrador')
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('usuarios.*') ? 'active' : '' }}" href="{{ route('usuarios.index') }}">Usuarios</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('bodegas.*') ? 'active' : '' }}" href="{{ route('bodegas.index') }}">Bodegas</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('activos.*') ? 'active' : '' }}" href="{{ route('activos.index') }}">Activos</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('inventarios.*') ? 'active' : '' }}" href="{{ route('inventarios.index') }}">Inventarios</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('movimientos.*') ? 'active' : '' }}" href="{{ route('movimientos.index') }}">Movimientos</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('reportes.*') ? 'active' : '' }}" href="{{ route('reportes.index') }}">Reportes</a></li>
                @endif

                @if (auth()->user()->rol->nombre == 'Gerente')
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('resumen') ? 'active' : '' }}" href="{{ route('resumen') }}">Resumen</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('bodegas.*') ? 'active' : '' }}" href="{{ route('bodegas.index') }}">Bodegas</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('reportes.*') ? 'active' : '' }}" href="{{ route('reportes.index') }}">Reportes</a></li>
                @endif

                @if (auth()->user()->rol->nombre == 'Almacenista')
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('mi-bodega') ? 'active' : '' }}" href="{{ route('mi-bodega') }}">Mi Bodega</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('movimientos.*') ? 'active' : '' }}" href="{{ route('movimientos.index') }}">Movimientos</a></li>
                @endif

                @if (auth()->user()->rol->nombre == 'Auditor')
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('resumen') ? 'active' : '' }}" href="{{ route('resumen') }}">Resumen</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('reportes.*') ? 'active' : '' }}" href="{{ route('reportes.index') }}">Reportes</a></li>
                @endif

            </ul>

            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('profile.edit') ? 'active' : '' }}" href="{{ route('profile.edit') }}">Perfil</a>
                </li>
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="btn btn-link nav-link" type="submit">Cerrar sesión</button>
                    </form>
                </li>
            </ul>

        </div>
    </div>
</nav>
