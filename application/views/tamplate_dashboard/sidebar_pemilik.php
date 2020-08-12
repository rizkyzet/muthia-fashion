<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('beranda') ?>">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-shopping-cart"></i>
            </div>
            <div class="sidebar-brand-text mx-2">Mutia Fashion</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">



        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            AKUN
        </div>

        <!-- Nav Item - Charts -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url("pemilik/akun") ?>">
                <i class="fas fa-fw fa-user"></i>
                <span>Info Akun</span></a>
        </li>

        <!-- Nav Item - Charts -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('pemilik/akun/gantisandi') ?>">
                <i class="fas fa-fw fa-key"></i>
                <span>Ubah Kata Sandi</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">



        <!-- Heading -->
        <div class="sidebar-heading">
            LAPORAN
        </div>

        <!-- Nav Item - Charts -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('pemilik/laporan/penjualan') ?>">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Laporan Penjualan</span></a>
            <a class="nav-link" href="<?= base_url('pemilik/laporan/stok') ?>">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Laporan Stok</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->