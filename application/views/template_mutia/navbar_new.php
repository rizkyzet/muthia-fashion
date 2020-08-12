<?php $kategori = $this->db->get('kategori')->result_array(); ?>
<nav class="navbar navbar-expand-lg navbar-light fixed-top bg-light shadow">
    <a class="navbar-brand" href="<?= base_url() ?>">
        <img src="<?= base_url('vendor/littlecloset/images/logo_1.png') ?>" width="35" height="45" class="d-inline-block align-top mr-2" alt="">
        Muthia Fashion
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-center " id="main_nav">


        <ul class="navbar-nav ">
            <li class="nav-item dropdown" style="font-size: 20px;">
                <a class="nav-link  dropdown-toggle <?= $this->uri->segment(1) == 'kategori' ? 'active' : '' ?>" style="font-weight:bold;" href="#" data-toggle="dropdown"> Kategori </a>
                <ul class="dropdown-menu fade-up">
                    <?php foreach ($kategori as $ktgr) : ?>
                        <li><a class="dropdown-item" href="<?= base_url('kategori/barang/' . $ktgr['kd_kategori']) ?>"><?= ucwords($ktgr['nama_kategori']) ?></a></li>

                    <?php endforeach; ?>
                </ul>
            </li>
            <li class="nav-item  <?= ($this->uri->segment(1) == '' ? 'active' : ($this->uri->segment(1) == 'beranda' ? 'active' : ''))  ?>" style="font-size: 20px;"> <a class="nav-link " style="font-weight:bold;" href="<?= base_url() ?>">Beranda </a> </li>
            <li class="nav-item <?= $this->uri->segment(1) == 'faq' ? 'active' : '' ?> " style="font-size: 20px;"><a class="nav-link" style="font-weight:bold;" href="<?= base_url('faq') ?>"> FAQ </a></li>
            <li class="nav-item <?= $this->uri->segment(1) == 'about' ? 'active' : '' ?>" style="font-size: 20px;"><a class="nav-link" style="font-weight:bold;" href="<?= base_url('about') ?>"> About </a></li>
        </ul>


    </div> <!-- navbar-collapse.// -->
    <div class="header_right d-flex flex-row align-items-center justify-content-start ml-auto">

        <!-- User -->
        <div class="user">
            <?php
            $profil = $this->M_user->getUserByLogin();
            if ($this->session->userdata('email')) { ?>
                <div class="dropdown mt-1 dropleft">

                    <img style="width: 40px; height:40px;" src="<?= base_url('assets/upload/profile/' . $profil['image']) ?>" class="figure-img img-fluid rounded-circle utama" alt="Testi 2 " data-toggle="dropdown">

                    <?php if ($this->session->userdata('role_id') == 3) { ?>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                            <a class="dropdown-item has-icon " href="<?= base_url('pelanggan/akun') ?>"><span></span>Informasi Akun</a>
                            <a class="dropdown-item has-icon " href="<?= base_url('pelanggan/akun/ganti_password') ?>"><span>Ganti Password</span></a>
                            <a class="dropdown-item has-icon " href="<?= base_url('pelanggan/pesanan') ?>"><span>Riwayat Pembelian</span></a>
                            <div class="dropdown-divider"></div>
                            <a href="<?= base_url('auth/logout') ?>" class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </div>
                    <?php } elseif ($this->session->userdata('role_id') == 2) { ?>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item has-icon " href="<?= base_url('admin/akun') ?>"><span>Dashboard</span></a>
                            <div class="dropdown-divider"></div>
                            <a href="<?= base_url('auth/logout') ?>" class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </div>
                    <?php } elseif ($this->session->userdata('role_id') == 1) { ?>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item has-icon " href="<?= base_url('pemilik/akun') ?>"><span>Dashboard</span></a>
                            <div class="dropdown-divider"></div>
                            <a href="<?= base_url('auth/logout') ?>" class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </div>
                    <?php } ?>
                </div>
            <?php  } else { ?>
                <a href="<?= base_url('auth') ?>">
                    <div>
                        <img src="<?= base_url('vendor/littlecloset/') ?>images/login.svg" alt="https://www.flaticon.com/authors/freepik">

                    </div>
                </a>
            <?php } ?>
        </div>
        <!-- Cart -->
        <div class="cart">
            <a class="btn <?= $this->session->userdata('role_id') == 3 ? '' : 'disabled' ?>" href="<?= base_url('cart') ?>">
                <div>
                    <img class="svg" src="<?= base_url('vendor/littlecloset/') ?>images/cart.svg" alt="https://www.flaticon.com/authors/freepik">
                    <?php if ($this->cart->total_items() > 0) { ?>
                        <div><?= $this->cart->total_items(); ?></div>
                    <?php } ?>
                </div>
            </a>
        </div>
    </div>
</nav>