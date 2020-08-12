<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Tambah Kategori</h1>
    <div class="row">
        <div class="col-4">
            <?= $this->session->flashdata('pesan');  ?>
            <form action="<?= base_url('admin/kategori/tambah') ?>" method='post'>
                <div class="form-group">
                    <label for="">Nama Kategori</label>
                    <input type="text" name="nama_kategori" class="form-control">
                    <?= form_error("nama_kategori", "<div class='text-danger text-small'>", "</div>") ?>
                </div>
                <button type="submit" class="btn btn-success">Tambah</button>
            </form>
        </div>
    </div>
    <!-- /.container-fluid -->