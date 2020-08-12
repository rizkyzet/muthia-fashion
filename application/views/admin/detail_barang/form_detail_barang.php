<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">LIST BARANG <?= strtoupper($barang['nama_brg']) ?></h1>
    <?= $this->session->flashdata('pesan') ?>
    <?= $this->session->flashdata('pesan_upload'); ?>
    <a href="<?= base_url("admin/detail_barang/tambah/" . $kd_barang) ?>" class="btn btn-success"> <i class="fas fa-plus-circle"></i> Tambah Barang</a>

    <table class="table table-striped mt-3">
        <thead>
            <tr>
                <th>No</th>
                <th>Gambar</th>
                <th>Nama</th>
                <th>Warna</th>
                <th>Ukuran</th>
                <th>Stok</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($detail_barang as $detail) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><img style="width:100px; height:140px;" src="<?= base_url('assets/upload/barang/' . $detail['gambar']) ?>" class="img-thumbnail" alt=""></td>
                    <td><?= $barang['nama_brg'] ?></td>
                    <td><?= $detail['warna'] ?></td>
                    <td><?= strtoupper($detail['ukuran']) ?></td>
                    <td><input disabled style="width: 80px;" type="number" name="stok" id="<?= $detail['id_detailbrg'] ?>" class="form-control update_stok" value="<?= $detail['stok']  ?>" data-kd_brg="<?= $detail['kd_brg']; ?>"> <button style="font-size: 12px;" id="<?= $detail['id_detailbrg'] ?>" class="update_stok btn btn-link text-small">Edit Stok</button></td>
                    <td>
                        <a class="btn btn-success" href="<?= base_url('admin/detail_barang/edit_detail/' . $detail['id_detailbrg']) ?>"><i class="fas fa-edit"></i></a>
                        <a class="btn btn-danger" href="<?= base_url('admin/detail_barang/hapus_detailbrg/' . $detail['id_detailbrg'] . '/' . $detail['kd_brg']) ?>"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>
<!-- /.container-fluid -->