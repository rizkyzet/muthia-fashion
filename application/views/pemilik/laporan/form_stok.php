<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">LAPORAN PENJUALAN</h1>
    <?= $this->session->flashdata('pesan') ?>
    <a class="btn btn-success" href="<?= base_url('pemilik/laporan/cetak_stok') ?>">Cetak</a>
    <table class="table table-stripped mt-3 laporan_penjualan datatables">
        <thead>
            <tr>
                <th>No </th>
                <th>Nama Barang</th>
                <th>Warna</th>
                <th>Ukuran</th>
                <th>Stok</th>

            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($stok as $index => $stok) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $stok['nama_brg'] ?></td>
                    <td><?= $stok['warna'] ?></td>
                    <td><?= $stok['ukuran'] ?></td>
                    <td><?= $stok['stok'] ?></td>

                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>

</div>
<!-- /.container-fluid -->