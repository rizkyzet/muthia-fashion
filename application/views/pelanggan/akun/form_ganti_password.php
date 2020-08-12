<div class="super_container_inner">
    <div class="super_overlay"></div>

    <!-- Home -->

    <div class="home">
        <div class="home_container d-flex flex-column align-items-center justify-content-end">
            <div class="home_content text-center">
                <div class="home_title mb-4">Ganti Password</div>

            </div>
        </div>
    </div>

    <!-- Cart -->

    <div class="cart_section">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card ">
                        <div class="card-header">
                            <ul class="nav nav-pills card-header-pills">
                                <li class="nav-item">
                                    <a class="nav-link " href="<?= base_url('pelanggan/akun') ?>">Informasi Akun</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" href="<?= base_url('pelanggan/akun/ganti_password') ?>">Ganti Password</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="<?= base_url('pelanggan/pesanan') ?>">Riwayat Pembelian</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="<?= base_url('auth/logout') ?>">Keluar</a>
                                </li>
                            </ul>
                        </div>
                        <form action="<?= base_url('pelanggan/akun/ganti_password') ?>" method="POST">
                            <div class="card-body">
                                <?= $this->session->flashdata('pesan') ?>
                                <?= $this->session->flashdata('pesan_upload') ?>
                                <div class="row">

                                    <div class="col-md-6">
                                        <table class="table table-md  table-borderless">
                                            <tr>
                                                <th style="width: 200px;">Password Lama :</th>
                                                <td style="text-align: left;"><input class="form-control" type="password" name="password_lama" id="password_lama">
                                                    <?= form_error('password_lama', '<div class="text-danger text-small ml-2">', '</div>') ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th style="width: 200px;">Password Baru :</th>
                                                <td style="text-align: left;"><input class="form-control" type="password" name="password_baru" id="password_baru">
                                                    <?= form_error('password_baru', '<div class="text-danger text-small ml-2">', '</div>') ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th style="width: 200px;">Konfirmasi Password :</th>
                                                <td style="text-align: left;"><input class="form-control" type="password" name="konfirmasi_password" id="konfirmasi_password">
                                                    <?= form_error('konfirmasi_password', '<div class="text-danger text-small ml-2">', '</div>') ?>
                                                </td>
                                            </tr>

                                        </table>
                                        <button style="background-color: #20c997; color:white;" type="submit" class="btn float-right">Ubah</button>
                                    </div>
                                </div>

                            </div>
                    </div>
                    </form>
                </div>
            </div>

        </div>
    </div>