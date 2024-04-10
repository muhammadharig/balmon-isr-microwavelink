<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="index.html" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="{{ asset('sneat') }}/assets/img/icons/kominfo.png" alt="logo" width="40" height="40">
            </span>
            <span class="demo menu-text fw-bolder ms-2">ISR - Microwavelink</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Dashboard</span>
        </li>

        <li class="menu-item {{ Request::is('home*') ? 'active' : '' }}">
            <a href="/home" class="menu-link">
                <i class="fas fa-dashboard" style="padding-right: 10px;"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Menu</span>
        </li>

        <li class="menu-item {{ Request::is('menu/data-users*') ? 'active' : '' }}">
            <a href="/menu/data-users" class="menu-link">
                <i class="fas fa-users" style="padding-right: 10px;"></i>
                <span>Data Users</span>
            </a>
        </li>

        <li class="menu-item {{ Request::is('menu/data-microwavelink*') ? 'active' : '' }}">
            <a href="/menu/data-microwavelink" class="menu-link">
                <i class="fas fa-circle-dot" style="padding-right: 10px;"></i>
                <span>Data Microwavavelink</span>
            </a>
        </li>

        <li class="menu-item {{ Request::is('menu/statistik/statistik-isr*') ? 'active' : '' }}">
            <a href="/menu/statistik/statistik-isr" class="menu-link">
                <i class="fas fa-chart-simple" style="padding-right: 10px;"></i>
                <span>Statistik ISR</span>
            </a>
        </li>

        <li class="menu-item {{ Request::is('menu/statistik/statistik-bhp*') ? 'active' : '' }}">
            <a href="/menu/statistik/statistik-bhp" class="menu-link">
                <i class="fas fa-chart-line" style="padding-right: 10px;"></i>
                <span>Statistik BHP</span>
            </a>
        </li>

    </ul>
</aside>
