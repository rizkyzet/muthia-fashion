<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">LAPORAN PENJUALAN</h1>
    <?= $this->session->flashdata('pesan') ?>
    <a class="btn btn-success" href="<?= base_url('admin/laporan/cetak_stok') ?>">Cetak</a>
    <form target="__blank" class="form-inline mb-3 mt-3" method="POST" action="<?= base_url('pemilik/laporan/cetak_stok') ?>">
        <div class="input-group mb-2 mr-2">
            <div class="input-group-prepend">
                <div class="input-group-text">Barang</div>
            </div>
            <select class="form-control" name="kd_brg" id="barang_laporan_admin">
                <option value="semua">Semua</option>
                <?php foreach ($barang as $brg) : ?>
                    <option value="<?= $brg['kd_brg'] ?>"><?= $brg['nama_brg'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-success btn-md mb-2">Cetak</button>
    </form>
    <table class="table table-stripped mt-3 laporan_stok datatables">
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