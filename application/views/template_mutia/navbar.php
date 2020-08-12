<!-- Menu -->
<?php $kategori = $this->db->get('kategori')->result_array(); ?>
<div class="menu">

    <!-- Search
    <div class="menu_search">
        <form action="#" id="menu_search_form" class="menu_search_form">
            <input type="text" class="search_input" placeholder="Search Item" required="required">
            <button class="menu_search_button"><img src="<?= base_url('vendor/littlecloset/') ?>images/search.png" alt=""></button>
        </form>
    </div> -->
    <!-- Navigation -->
    <div class="menu_nav">
        <ul>
            <?php foreach ($kategori as $ktgr) : ?>
                <li><a href="<?= base_url('kategori/barang/' . $ktgr['kd_kategori']) ?>"><?= ucwords($ktgr['nama_kategori']) ?></a></li>

            <?php endforeach; ?>
        </ul>
    </div>
    <!-- Contact Info -->
    <div class="menu_contact">
        <div class="menu_social">
            <ul class="menu_social_list d-flex flex-row align-items-start justify-content-start">
                <li><a href="#"><i class="fa fa-whatsapp" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
            </ul>
        </div>
    </div>
</div>

<div class="super_container">

    <!-- Header -->

    <header class="header">
        <div class="header_overlay"></div>
        <div class="header_content d-flex flex-row align-items-center justify-content-start">
            <div class="logo">
                <a href="<?= base_url() ?>">
                    <div class="d-flex flex-row align-items-center justify-content-start">
                        <div><img src="<?= base_url('vendor/littlecloset/') ?>images/logo_1.png" alt=""></div>
                        <div>Mutia Fashion</div>
                    </div>
                </a>
            </div>
            <div class="hamburger"><i class="fa fa-bars" aria-hidden="true"></i></div>
            <nav class="main_nav">
                <ul class="d-flex flex-row align-items-start justify-content-start">
                    <?php foreach ($kategori as $ktgr) : ?>
                        <li><a href="<?= base_url('kategori/barang/' . $ktgr['kd_kategori']) ?>"><?= ucwords($ktgr['nama_kategori']) ?></a></li>

                    <?php endforeach; ?>
                </ul>
            </nav>
            <div class="header_right d-flex flex-row align-items-center justify-content-start ml-auto">

                <!-- User -->
                <div class="user">
                    <?php
                    $profil = $this->M_user->getUserByLogin();
                    if ($this->session->userdata('email')) { ?>
                        <div class="dropdown mt-1">

                            <img style="width: 40px; height:40px;" src="<?= base_url('assets/upload/profile/' . $profil['image']) ?>" class="figure-img img-fluid rounded-circle utama" alt="Testi 2 " data-toggle="dropdown">


                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                <a class="dropdown-item has-icon " href=""><span>Dashboard</span></a>
                                <div class="dropdown-divider"></div>
                                <a href="<?= base_url('auth/logout') ?>" class="dropdown-item has-icon text-danger">
                                    <i class="fas fa-sign-out-alt"></i> Logout
                                </a>
                            </div>
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
                    <a href="<?= base_url('cart') ?>">
                        <div>
                            <img class="svg" src="<?= base_url('vendor/littlecloset/') ?>images/cart.svg" alt="https://www.flaticon.com/authors/freepik">
                            <?php if ($this->cart->total_items() > 0) { ?>
                                <div><?= $this->cart->total_items(); ?></div>
                            <?php } ?>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </header>