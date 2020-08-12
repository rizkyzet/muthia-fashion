<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-5 text-gray-800">
        #<?= $pesanan['id_pesanan'] ?> <?php if ($pesanan['status_pesanan'] == 'belum dibayar') { ?>
            <span class="badge badge-secondary"><?= ucwords($pesanan['status_pesanan']) ?></span>
        <?php } elseif ($pesanan['status_pesanan'] == 'dibayar') { ?>
            <span class="badge badge-warning"><?= ucwords($pesanan['status_pesanan']) ?></span>
        <?php } elseif ($pesanan['status_pesanan'] == 'dikirim') { ?>
            <span class="badge badge-success"><?= ucwords($pesanan['status_pesanan']) ?></span>
        <?php } else { ?>
            <span class="badge badge-danger"><?= ucwords($pesanan['status_pesanan']) ?></span>
        <?php } ?>
    </h1>

    <div class="row ">
        <div class="col-sm-3">
            <table class="table table-sm table-bordered">
                <tr>
                    <th colspan="2" class="bg-success text-white"><i class="fas fa-shopping-cart"></i> Detail Pembayaran</th>
                </tr>
                <tr>
                    <th>Metode Pembayaran :</th>
                    <td><?= $pesanan['jenis_pembayaran'] ?></td>
                </tr>
                <tr>
                    <th>Bank :</th>
                    <td><?= strtoupper($pesanan['bank']) ?></td>
                </tr>
                <tr>
                    <th>Va Number :</th>
                    <td><?= $pesanan['va_number'] ?></td>
                </tr>
                <tr>
                    <th>Instruksi :</th>
                    <td><a target="_blank" href="<?= $pesanan['instruksi'] ?>" class="btn btn-success btn-sm"><i class="fas fa-download"></i></a></td>
                </tr>
                <tr>
                    <th>Tanggal Dibayar :</th>
                    <td><?= $pesanan['tgl_dibayar'] ?></td>
                </tr>
            </table>
        </div>
        <div class="col-sm-3">
            <table class="table table-sm table-bordered">
                <tr>
                    <th colspan="2" class="bg-success text-white"><i class="fas fa-user"></i> Detail Pelanggan</th>
                </tr>
                <tr>
                    <th>Nama :</th>
                    <td><?= $pelanggan['nama'] ?></td>
                </tr>
                <tr>
                    <th>Email :</th>
                    <td><?= $pelanggan['email'] ?></td>
                </tr>
                <tr>
                    <th>No Telp :</th>
                    <td><?= $pelanggan['no_tlp'] ?></td>
                </tr>
            </table>
        </div>
        <div class="col-sm-3">
            <table class="table table-sm table-bordered">
                <tr>
                    <th colspan="2" class="bg-success text-white"><i class="fas fa-shipping-fast"></i> Detail Pengiriman</th>
                </tr>
                <tr>
                    <th>Kurir :</th>
                    <td><?= strtoupper($pesanan['kurir']) ?></td>
                </tr>

                <tr>
                    <th>Layanan :</th>
                    <td><?= $pesanan['layanan'] ?></td>
                </tr>
                <tr>
                    <th>Total Berat (gram) :</th>
                    <td><?= $pesanan['total_berat'] * 1000 ?></td>
                </tr>
                <tr>
                    <th>Ongkir :</th>
                    <td><?= $pesanan['ongkir'] ?></td>
                </tr>

            </table>
        </div>
    </div>




    <div class="row">
        <div class="col-sm">
            <div class="card ">
                <div class="card-header">
                    <i class="fas fa-info-circle"></i>
                    Pesanan
                </div>
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm border">
                            <table class="table table-sm ">
                                <tr class="bg-success text-white">
                                    <th>Alamat Tagihan</th>
                                    <th>Alamat Pengiriman</th>
                                </tr>
                                <tr>
                                    <td>
                                        <strong><?= $tagihan['nama'] ?> </strong><br />
                                        <?= $tagihan['alamat'] ?><br />
                                        <?= $tagihan['kota'] ?> <?= $tagihan['kode_pos'] ?><br />
                                        <?= $tagihan['provinsi'] ?>, Indonesia<br />
                                        Telepon: <?= $tagihan['no_tlp'] ?><br />
                                        Email: <?= $tagihan['email'] ?><br />
                                    </td>
                                    <td>
                                        <strong><?= $pengiriman['nama'] ?> </strong><br />
                                        <?= $pengiriman['alamat'] ?><br />
                                        <?= $pengiriman['kota'] ?> <?= $pengiriman['kode_pos'] ?><br />
                                        <?= $pengiriman['provinsi'] ?>, Indonesia<br />
                                        Telepon: <?= $pengiriman['no_tlp'] ?><br />
                                        Email: <?= $pengiriman['email'] ?><br />
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm ">
                            <table class="table table-sm table-bordered">
                                <tr class="bg-success text-white">
                                    <th>Gambar</th>
                                    <th>Item</th>
                                    <th>Harga</th>
                                    <th>Jumlah</th>
                                    <th>Subtotal</th>
                                </tr>
                                <?php foreach ($item as $i) : ?>
                                    <tr>
                                        <td class="text-center"><img style="max-width: 64px;" class="img-thumbnail" src="<?= base_url('assets/upload/barang/' . $i['gambar']) ?>" alt=""></td>
                                        <td><?= $i['nama_brg'] ?> - <?= ucwords($i['warna']) ?> (<?= strtoupper($i['ukuran']) ?>)</td>
                                        <td><?= $i['harga'] ?></td>
                                        <td><?= $i['jumlah'] ?></td>
                                        <td><?= $i['total_harga'] ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </table>

                            <table style='border-collapse:collapse;' width='100%'>
                                <tr>
                                    <td style='padding:5px 0px; text-align:right;  font-weight:bold;'>Total Bayar Item: </td>
                                    <td style='padding:5px 10px; width:123px; text-align:right;  font-weight:normal;'>Rp. <?= $bayar_item ?></td>
                                </tr>
                                <tr>
                                    <td style='padding:5px 0px; text-align:right;  font-weight:bold;'>Biaya Pengiriman: </td>
                                    <td style='padding:5px 10px; width:123px; text-align:right;  '>Rp. <?= $pesanan['ongkir'] ?></td>
                                </tr>

                                <tr>
                                    <td style='padding:5px 0px; text-align:right;  font-weight:bold;'>Total: </td>
                                    <td style='padding:5px 10px; width:123px; text-align:right;  font-weight:bold;'>Rp. <?= $pesanan['total_bayar'] ?></td>
                                </tr>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




</div>
<!-- /.container-fluid -->