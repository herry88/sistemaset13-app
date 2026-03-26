<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
            <a href="{{ route('dashboard.index') }}" class="app-brand-link">
                <span class="app-brand-logo demo">
                    <!-- SVG Logo Here -->
                </span>
                <span class="app-brand-text demo menu-text fw-bolder ms-2">Sistem Aset</span>
            </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">

        <li class="menu-item {{ request()->is('dashboard*') ? 'active' : '' }}">
            <a href="{{ route('dashboard.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Master Data</span>
        </li>
        @can('manage-kategori-aset')
        <li class="menu-item {{ request()->is('kategori-aset*') ? 'active' : '' }}">
            <a href="{{ route('kategori-aset.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-category"></i>
                <div data-i18n="Kategori Aset">Kategori Aset</div>
            </a>
        </li>
        @endcan
        @can('manage-lokasi')
        <li class="menu-item {{ request()->is('lokasi*') ? 'active' : '' }}">
            <a href="{{ route('lokasi.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-map"></i>
                <div data-i18n="Lokasi">Lokasi</div>
            </a>
        </li>
        @endcan
        @can('manage-aset')
        <li class="menu-item {{ request()->is('aset*') ? 'active' : '' }}">
            <a href="{{ route('aset.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-package"></i>
                <div data-i18n="Aset">Aset</div>
            </a>
        </li>
        @endcan

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Transaksi</span>
        </li>
        @can('manage-mutasi-aset')
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link">
                <i class="menu-icon tf-icons bx bx-refresh"></i>
                <div data-i18n="Mutasi Aset">Mutasi Aset</div>
            </a>
        </li>
        @endcan

        @can('view-laporan')
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Laporan</span>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link">
                <i class="menu-icon tf-icons bx bx-file"></i>
                <div data-i18n="Laporan">Laporan</div>
            </a>
        </li>
        @endcan

        @can('manage-users')
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Pengaturan</span>
        </li>
        <li class="menu-item {{ request()->is('user*') ? 'active' : '' }}">
            <a href="{{ route('user.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="User Management">User Management</div>
            </a>
        </li>
        @endcan
    </ul>
</aside>
