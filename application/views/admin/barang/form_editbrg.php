<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Edit Barang</h1>
    <div class="row">
        <div class="col-4">
            <?= $this->session->flashdata('pesan'); ?>
            <form action="<?= base_url("admin/barang/edit_barang/" . $barang['kd_brg']) ?>" method="POST">
                <div class="form-group">
                    <label for="">Kode Barang</label>
                    <input value="<?= $barang['kd_brg'] ?>" type="text" name="kd_brg" class="form-control">
                    <?= form_error("kd_brg", "<div class='text-danger text-small'>", "</div>") ?>
                </div>
                <div class="form-group">
                    <label for="">Nama Barang</label>
                    <input value="<?= $barang['nama_brg'] ?>" type="text" name="nama_brg" class="form-control">
                    <?= form_error("nama_brg", "<div class='text-danger text-small'>", "</div>") ?>
                </div>
                <div class="form-group">
                    <label for="">Kategori</label>
                    <select name="nama_kategori" id="" class="form-control">
                        <option value="" selected>Pilih Kategori</option>
                        <?php foreach ($kategori as $ktgr) : ?>
                            <option <?= $barang['kd_kategori'] == $ktgr['kd_kategori'] ? "selected" : "" ?> value="<?= $ktgr["kd_kategori"] ?>"><?= $ktgr["nama_kategori"] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?= form_error("nama_kategori", "<div class='text-danger text-small'>", "</div>") ?>
                </div>
                <div class="form-group">
                    <label for="tanggal">Tanggal Masuk Barang</label>
                    <input type="date" name="tanggal" id="tanggal" class="form-control" value="<?= $barang['tanggal_masuk'] ?>">
                    <?= form_error("tanggal", "<div class='text-danger text-small'>", "</div>") ?>
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" class="form-control"><?= $barang['deskripsi'] ?></textarea>
                    <?= form_error("deskripsi", "<div class='text-danger text-small'>", "</div>") ?>
                </div>
                <div class="form-group">
                    <label for="">Harga</label>
                    <input value="<?= $barang['harga'] ?>" type="text" name="harga" class="form-control" autocomplete="off">
                    <?= form_error("harga", "<div class='text-danger text-small'>", "</div>") ?>
                </div>
                <div class="form-group">
                    <label for="">Berat</label>
                    <input value="<?= $barang['berat'] ?>" type="text" name="berat" class="form-control" autocomplete="off">
                    <?= form_error("berat", "<div class='text-danger text-small'>", "</div>") ?>
                </div>
                <button type="submit" class="btn btn-success">Ubah</button>
        </div>
        </form>
    </div>
</div>
<!-- /.container-fluid -->