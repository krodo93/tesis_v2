<div class="sidebar">
    <nav class="sidebar-nav ps ps--active-y">

        <ul class="nav">
            <li class="nav-item">
                <a href="{{ route("admin.home") }}" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt">

                    </i>
                    PANEL
                </a>
            </li>
           
            <li class="nav-item">
                <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                    <i class="fas fa-users nav-icon">

                    </i>
                    USUARIOS
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route("admin.marcas.index") }}" class="nav-link {{ request()->is('admin/marcas') || request()->is('admin/marcas/*') ? 'active' : '' }}">
                    <i class="fas fa-tags nav-icon">

                    </i>
                    MARCAS
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route("admin.camiones.index") }}" class="nav-link {{ request()->is('admin/camiones') || request()->is('admin/camiones/*') ? 'active' : '' }}">
                    <i class="fas fa-truck nav-icon">

                    </i>
                    CAMIONES
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route("admin.conductores.index") }}" class="nav-link {{ request()->is('admin/conductores') || request()->is('admin/conductores/*') ? 'active' : '' }}">
                    <i class="fas fa-id-card nav-icon">

                    </i>
                    CONDUCTORES
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route("admin.tarifas.index") }}" class="nav-link {{ request()->is('admin/tarifas') || request()->is('admin/tarifas/*') ? 'active' : '' }}">
                    <i class="fas fa-usd nav-icon">

                    </i>
                    TARIFAS
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route("admin.boletas.index") }}" class="nav-link {{ request()->is('admin/boletas') || request()->is('admin/boletas/*') ? 'active' : '' }}">
                    <i class="fas fa-file-text nav-icon">

                    </i>
                    BOLETAS
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route("admin.empresas.index") }}" class="nav-link {{ request()->is('admin/empresas') || request()->is('admin/empresas/*') ? 'active' : '' }}">
                    <i class="fas fa-home nav-icon">

                    </i>
                    EMPRESAS
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="nav-icon fas fa-sign-out-alt">

                    </i>
                    SALIR
                </a>
            </li>
        </ul>

        <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
            <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
        </div>
        <div class="ps__rail-y" style="top: 0px; height: 869px; right: 0px;">
            <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 415px;"></div>
        </div>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>