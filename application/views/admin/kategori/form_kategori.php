<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">KATEGORI BARANG</h1>
    <?= $this->session->flashdata('pesan') ?>
    <a href="<?= base_url("admin/kategori/tambah") ?>" class="btn btn-success"> <i class="fas fa-plus-circle"></i> Tambah Kategori</a>
    <table class="table table-stripped">
        <thead>
            <tr>
                <th>no</th>
                <th>Kode Kategori</th>
                <th>Nama Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($kategori as $ktgr) : ?>
                <tr>
                    <td> <?= $no++  ?> </td>
                    <td> <?= $ktgr['kd_kategori'] ?></td>
                    <td> <?= $ktgr['nama_kategori'] ?></td>
                    <td>
                        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                            <div class="btn-group mr-2" role="group" aria-label="Second group">
                                <a href="<?= base_url('admin/kategori/edit_kategori/' . $ktgr['kd_kategori']) ?>" class="btn btn-success"><i class="far fa-edit"></i></a>
                                <a href=" <?= base_url('admin/kategori/hapus_kategori/' . $ktgr['kd_kategori']) ?> " class="btn btn-danger" onclick="return confirm ('Yakin Hapus?')"><i class="fas fa-trash-alt"></i></a>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>
<!-- /.container-fluid -->