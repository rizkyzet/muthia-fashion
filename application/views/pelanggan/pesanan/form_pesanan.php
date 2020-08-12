<div class="super_container_inner">
    <div class="super_overlay"></div>

    <!-- Home -->

    <div class="home">
        <div class="home_container d-flex flex-column align-items-center justify-content-end">
            <div class="home_content text-center">
                <div class="home_title mb-4">Riwayat Pembelian</div>

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
                                    <a class="nav-link " href="<?= base_url('pelanggan/akun/ganti_password') ?>">Ganti Password</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" href="<?= base_url('pelanggan/pesanan') ?>">Riwayat Pembelian</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="<?= base_url('auth/logout') ?>">Keluar</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <?= $this->session->flashdata('pesan') ?>
                            <table class="table table-bordered table-sm">
                                <thead>
                                    <tr style="background-color:  #20c997; color:white;">
                                        <th>ID PESANAN</th>
                                        <th>TANGGAL</th>
                                        <th>ITEM</th>
                                        <th>TOTAL BAYAR</th>
                                        <th>KETERANGAN</th>
                                        <th>STATUS</th>
                                        <th>DETAIL</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php foreach ($pesanan as $index => $p) : ?>
                                        <tr>
                                            <td><?= $p['id_pesanan'] ?></td>
                                            <td><?= $p['tgl_dibuat'] ?></td>
                                            <td>
                                                <ul style="list-style-type:disc !important;   padding-left: 1.5em;">
                                                    <?php foreach ($item[$index] as $i) : ?>
                                                        <li><?= $i['nama_brg'] ?> - <?= ucwords($i['warna']) ?> (<?= strtoupper($i['ukuran']) ?>)</li>

                                                    <?php endforeach; ?>
                                                </ul>
                                            </td>
                                            <td>
                                                <?= $p['total_bayar'] ?>
                                            </td>
                                            <td><?= $p['keterangan'] ?></td>

                                            <td>
                                                <?php if ($p['status_pesanan'] == 'belum dibayar') { ?>
                                                    <span class="badge badge-secondary"><?= ucwords($p['status_pesanan']) ?></span>
                                                <?php } elseif ($p['status_pesanan'] == 'dibayar') { ?>
                                                    <span class="badge badge-warning"><?= ucwords($p['status_pesanan']) ?></span>
                                                <?php } elseif ($p['status_pesanan'] == 'dikirim') { ?>
                                                    <span class="badge badge-success"><?= ucwords($p['status_pesanan']) ?></span>
                                                <?php } else { ?>
                                                    <span class="badge badge-danger"><?= ucwords($p['status_pesanan']) ?></span>
                                                <?php } ?>
                                            </td>


                                            <td>
                                                <a target="_blank" href="<?= base_url('pelanggan/pesanan/detail/' . $p['id_pesanan']) ?>" class="btn btn-sm btn-warning"><i class="fas fa-tshirt"></i></a>
                                            </td>

                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>