<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Ubah Kategori</h1>
    <div class="row">
        <div class="col-4">
            <?= $this->session->flashdata('pesan'); ?>
            <form action="" method="POST">
                <div class="form-group">
                    <label for="">Kode Kategori</label>
                    <input value="<?= $kategori['kd_kategori'] ?>" type="text" name="kd_kategori" class="form-control">
                    <?= form_error("kd_kategori", "<div class='text-danger text-small'>", "</div>") ?>
                </div>
                <div class="form-group">
                    <label for="">Nama Kategori</label>
                    <input value="<?= $kategori['nama_kategori'] ?>" type="text" name="nama_kategori" class="form-control">
                    <?= form_error("nama_kategori", "<div class='text-danger text-small'>", "</div>") ?>
                </div>
                <button type="submit" class="btn btn-success">Tambah</button>
        </div>
        </form>
    </div>
</div>
<!-- /.container-fluid -->