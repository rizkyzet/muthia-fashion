<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">LAPORAN PENJUALAN</h1>
    <?= $this->session->flashdata('pesan') ?>
    <form target="__blank" class="form-inline" method="POST" action="<?= base_url('pemilik/laporan/cetak_laporan_penjualan') ?>">

        <div class="input-group mb-2 mr-sm-2">
            <div class="input-group-prepend">
                <div class="input-group-text">Tanggal Awal</div>
            </div>
            <input type="date" class="form-control" name="tanggal_awal" id="tanggal_awal" placeholder="tanggal" value="<?= $tanggal_awal ?>">
        </div>


        <div class="input-group mb-2 mr-sm-2">
            <div class="input-group-prepend">
                <div class="input-group-text">Tanggal Akhir</div>
            </div>
            <input type="date" class="form-control" name="tanggal_akhir" id="tanggal_akhir" placeholder="tanggal" value="<?= $tanggal_akhir ?>">
        </div>



        <button type="submit" class="btn btn-success mb-2">Cetak</button>
    </form>
    <table class="table table-stripped mt-3 laporan_penjualan">
        <thead>
            <tr>
                <th>No </th>
                <th>Tanggal</th>
                <th>ID Pesanan</th>
                <th>Nama Pelanggan</th>
                <th>Email</th>
                <th>Barang</th>
                <th>Jenis Pembayaran</th>
                <th>Total Bayar</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($penjualan as $index => $jual) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $jual['tgl_dibuat'] ?></td>
                    <td><?= $jual['id_pesanan'] ?></td>
                    <td><?= $jual['nama'] ?></td>
                    <td><?= $jual['email'] ?></td>
                    <td>

                        <ul style="list-style-type:disc !important;   padding-left: 1.5em;">
                            <?php foreach ($detail_penjualan[$index] as $p) : ?>
                                <li><?= $p['nama_brg'] ?> - <?= ucwords($p['warna']) ?> (<?= strtoupper($p['ukuran']) ?>) x<?= $p['jumlah'] ?></li>

                            <?php endforeach; ?>
                        </ul>
                    </td>
                    <td><?= ucwords(str_replace('_', ' ', $jual['jenis_pembayaran'])) ?></td>
                    <td><?= $jual['total_bayar'] ?></td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan="5" class="text-center font-weight-bold">Total</td>
                <td><?= $total ?></td>
            </tr>
        </tbody>
    </table>

</div>
<!-- /.container-fluid -->