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
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <?php
              if(empty($tes[8])){
                //if(empty($tes[5])){
            ?>
                    <a href="#" class="nav-link active">
                        <?php
              }else{
            ?>
                        <a href="{{ url('Admin') }}" class="nav-link">
                            <?php
              } 
            ?>
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                </li>

                <?php
            if(!empty($tes[8])){
              //if(!empty($tes[5])){
              if($tes[8] == 'Menu'){
              //if($tes[5] == 'Menu'){
            ?>
                <li class="nav-item has-treeview menu-open">
                    <a href="#" class="nav-link active">
                        <?php
              }else{
            ?>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <?php
              }
            }else{
            ?>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <?php
              } 
            ?>
                        <i class="nav-icon fas fa-plus-circle"></i>
                        <p>
                            Menu
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('Admin/Menu/Tambah') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tambah Menu</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('Admin/Menu/') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Menu</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <?php
            if(!empty($tes[8])){
              if($tes[8] == 'Pegawai'){
                //if(!empty($tes[5])){
              //if($tes[5] == 'Pegawai'){
            ?>
                <li class="nav-item has-treeview menu-open">
                    <a href="#" class="nav-link active">
                        <?php
              }else{
            ?>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <?php
              }
            }else{
            ?>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <?php
              } 
            ?>
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Pegawai
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('Admin/Pegawai/Tambah') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Form Pegawai</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('Admin/Pegawai/') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Pegawai</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <?php
              if(!empty($tes[8])){
                if($tes[8] == 'Transaksi'){
              //if(!empty($tes[5])){
                //if($tes[5] == 'Transaksi'){
            ?>
                    <a href="#" class="nav-link active">
                        <?php
                }else{
            ?>
                        <a href="{{ url('Admin/Transaksi') }}" class="nav-link">
                            <?php                  
                }
              }else{
            ?>
                            <a href="{{ url('Admin/Transaksi') }}" class="nav-link">
                                <?php
              } 
            ?>
                                <i class="nav-icon fas fa-book"></i>
                                <p>Laporan</p>
                            </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{ url('/') }}" class="nav-link" onclick="return confirm('Anda Akan Logout')">
                        <i class="nav-icon fas fa-lock"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
