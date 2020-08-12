<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">DATA BARANG</h1>
    <?= $this->session->flashdata('pesan') ?>
    <a href="<?= base_url("admin/barang/tambah") ?>" class="btn btn-success"> <i class="fas fa-plus-circle"></i> Tambah Barang</a>
    <table class="table table-stripped">
        <thead>
            <tr>
                <th>No </th>
                <th>Kode Barang</th>
                <th>Tanggal Masuk</th>
                <th>Nama Barang</th>
                <th>Kategori</th>
                <th>Deskripsi</th>
                <th>Harga</th>
                <th>Berat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($barang as $brg) : ?>
                <tr>
                    <td> <?= $no++  ?> </td>
                    <td> <?= $brg['kd_brg'] ?></td>
                    <td> <?= $brg['tanggal_masuk'] ?></td>
                    <td> <?= $brg['nama_brg'] ?></td>
                    <td> <?= ambil_nama_kategori($brg['kd_kategori']) ?></td>
                    <td> <?= $brg['deskripsi'] ?></td>
                    <td> <?= $brg['harga'] ?></td>
                    <td> <?= $brg['berat'] ?></td>
                    <td>
                        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                            <div class="btn-group mr-2" role="group" aria-label="Second group">
                                <a href="<?= base_url('admin/detail_barang/tampil/' . $brg['kd_brg']) ?>" class="btn btn-warning"><i class="fas fa-tshirt"></i></a>
                                <a href="<?= base_url('admin/barang/edit_barang/' . $brg['kd_brg']) ?>" class="btn btn-success"><i class="far fa-edit"></i></a>
                                <a href="<?= base_url('admin/barang/hapus_barang/' . $brg['kd_brg']) ?>" class="btn btn-danger" onclick="return confirm ('Yakin Hapus?')"><i class="fas fa-trash-alt"></i></a>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>
<!-- /.container-fluid -->