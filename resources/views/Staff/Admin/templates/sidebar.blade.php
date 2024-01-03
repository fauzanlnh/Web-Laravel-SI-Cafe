<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link text-center">
        <span class="brand-text font-weight-light">Hayyu Coffee</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                {{-- Sidebar item Dashboard --}}
                <li class="nav-item ">
                    <a href="{{ url('admin') }}" class="nav-link {{ request()->is('admin/') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                {{-- End of sidebar item dashboard --}}

                {{--  Sidebar item Menu --}}
                <li class="nav-item has-treeview {{ request()->is('admin/menu*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->is('admin/menu*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-plus-circle"></i>
                        <p>
                            Menu
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('admin/menu/') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Menu</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('admin/menu/create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tambah Menu</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- End of sidebar item menu --}}

                {{--  Sidebar item staff --}}
                <li class="nav-item has-treeview {{ request()->is('admin/staff*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->is('admin/staff*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Pegawai
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('admin/staff/') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Pegawai</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('admin/staff/create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tambah Pegawai</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- End of sidebar item staff --}}

                {{-- Sidebar item laporan --}}
                <li class="nav-item ">
                    <a href="{{ url('admin/transaksi') }}"
                        class="nav-link {{ request()->is('admin/transaksi') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-book"></i>
                        <p>Laporan</p>
                    </a>
                </li>
                {{-- End of sidebar item laporan --}}
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
