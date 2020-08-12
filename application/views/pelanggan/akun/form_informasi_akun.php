<div class="super_container_inner">
    <div class="super_overlay"></div>

    <!-- Home -->

    <div class="home">
        <div class="home_container d-flex flex-column align-items-center justify-content-end">
            <div class="home_content text-center">
                <div class="home_title mb-4">Informasi Akun</div>

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
                                    <a class="nav-link active" href="<?= base_url('pelanggan/akun') ?>">Informasi Akun</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="<?= base_url('pelanggan/akun/ganti_password') ?>">Ganti Password</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="<?= base_url('pelanggan/pesanan') ?>">Riwayat Pembelian</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="<?= base_url('auth/logout') ?>">Keluar</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <?= $this->session->flashdata('pesan') ?>
                            <?= $this->session->flashdata('pesan_upload') ?>
                            <div class="row">
                                <div class="col-3 text-center">
                                    <img style="width: 300px;height:320px;" src="<?= base_url("assets/upload/profile/" . $user['image']) ?>" class="img-thumbnail ">
                                    <br>
                                    <a style="background-color: #20c997; color:white;" href="<?= base_url("pelanggan/akun/edit_akun") ?>" class="btn  btn-sm mt-2">Ubah Profil</a>
                                </div>
                                <div class="col">
                                    <table class="table table-md  table-borderless">
                                        <tr>
                                            <th style="width: 150px;">Nama :</th>
                                            <td style="text-align: left;"><?= $user['nama'] ?></td>
                                        </tr>
                                        <tr>
                                            <th style="width: 150px;">Email :</th>
                                            <td style="text-align: left;"><?= $user['email'] ?></td>
                                        </tr>
                                        <tr>
                                            <th style="width: 150px;">Nomor Telepon :</th>
                                            <td style="text-align: left;"><?= $user['no_tlp'] ?></td>
                                        </tr>
                                        <tr>
                                            <th style="width: 150px;">Provinsi :</th>
                                            <td style="text-align: left;"><?= $user['provinsi'] ?></td>
                                        </tr>
                                        <tr>
                                            <th style="width: 150px;">Kota :</th>
                                            <td style="text-align: left;"><?= $user['kota'] ?></td>
                                        </tr>
                                        <tr>
                                            <th style="width: 150px;">Kode Pos :</th>
                                            <td style="text-align: left;"><?= $user['kode_pos'] ?></td>
                                        </tr>
                                        <tr>
                                            <th style="width: 150px;">Alamat :</th>
                                            <td style="text-align: left;"><?= $user['alamat'] ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>