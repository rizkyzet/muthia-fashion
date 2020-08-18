<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Tambah Barang</h1>
    <div class="row">
        <div class="col-4">
            <?= $this->session->flashdata('pesan'); ?>
            <form action="<?= base_url("admin/barang/tambah") ?>" method="POST">
                <div class="form-group">
                    <label for="">Kode Barang</label>
                    <input type="text" name="kd_brg" class="form-control">
                    <?= form_error("kd_brg", "<div class='text-danger text-small'>", "</div>") ?>
                </div>
                <div class="form-group">
                    <label for="">Nama Barang</label>
                    <input type="text" name="nama_brg" class="form-control">
                    <?= form_error("nama_brg", "<div class='text-danger text-small'>", "</div>") ?>
                </div>
                <div class="form-group">
                    <label for="">Kategori</label>
                    <select name="nama_kategori" id="" class="form-control">
                        <option value="" selected>Pilih Kategori</option>
                        <?php foreach ($kategori as $ktgr) : ?>
                            <option value="<?= $ktgr["kd_kategori"] ?>"><?= $ktgr["nama_kategori"] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?= form_error("nama_kategori", "<div class='text-danger text-small'>", "</div>") ?>
                </div>
                <div class="form-group">
                    <label for="tanggal">Tanggal Masuk Barang</label>
                    <input type="date" name="tanggal" id="tanggal" class="form-control">
                    <?= form_error("tanggal", "<div class='text-danger text-small'>", "</div>") ?>
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>


                    <textarea name="deskripsi" id="deskripsi" rows="10" cols="80">

                    </textarea>
                    <?= form_error("deskripsi", "<div class='text-danger text-small'>", "</div>") ?>

                </div>
                <div class="form-group">
                    <label for="">Harga</label>
                    <input type="text" name="harga" class="form-control" autocomplete="off">
                    <?= form_error("harga", "<div class='text-danger text-small'>", "</div>") ?>
                </div>
                <div class="form-group">
                    <label for="">Berat</label>
                    <input type="text" name="berat" class="form-control" autocomplete="off">
                    <?= form_error("berat", "<div class='text-danger text-small'>", "</div>") ?>
                </div>
                <button type="submit" class="btn btn-success">Tambah</button>
        </div>
        </form>
    </div>
</div>
<!-- /.container-fluid -->