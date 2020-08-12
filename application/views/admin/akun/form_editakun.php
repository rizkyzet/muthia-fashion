<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Ubah Akun</h1>
    <div class="row">
        <div class="col-4">
            <?= $this->session->flashdata('pesan'); ?>
            <?= form_open_multipart(base_url('admin/akun/edit_akun')) ?>
            <div class="form-group">
                <label for="">Nama</label>
                <input value="<?= $usr['nama'] ?>" type="text" name="nama" class="form-control">
                <?= form_error("nama", "<div class='text-danger text-small'>", "</div>") ?>
            </div>

            <div class="form-group">
                <label for="">Nomor Telepon</label>
                <input value="<?= $usr['no_tlp'] ?>" type="text" name="no_tlp" class="form-control">
                <?= form_error("no_tlp", "<div class='text-danger text-small'>", "</div>") ?>
            </div>
            <div class="form-group">
                <label for="">Provinsi</label>
                <select name="provinsi" id="provinsi" class="form-control">
                    <option value="">Pilih Provinsi</option>
                    <?php foreach ($provinsi as $prov) : ?>
                        <option <?= $usr['id_provinsi'] == $prov['id_provinsi'] ? 'selected' : '' ?> value="<?= $prov['id_provinsi'] ?>"><?= $prov['provinsi'] ?></option>
                    <?php endforeach; ?>
                </select>
                <?= form_error("provinsi", "<div class='text-danger text-small'>", "</div>") ?>
            </div>
            <div class="form-group">
                <label for="">Kota</label>
                <select name="id_kota" id="kota" class="form-control">
                    <option value="">Pilih Kota</option>
                    <?php foreach ($kota as $kota) : ?>
                        <option <?= $usr['id_kota'] == $kota['id_kota'] ? 'selected' : '' ?> value="<?= $kota['id_kota'] ?>"><?= $kota['kota'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="">Kode Pos</label>
                <input value="<?= $usr['kode_pos'] ?>" type="text" name="kode_pos" class="form-control">
                <?= form_error("kde_pos", "<div class='text-danger text-small'>", "</div>") ?>
            </div>
            <div class="form-group">
                <label for="">Alamat</label>
                <input value="<?= $usr['alamat'] ?>" type="text" name="alamat" class="form-control">
                <?= form_error("alamat", "<div class='text-danger text-small'>", "</div>") ?>
            </div>
            <div class="form-group">
                <label for="">Gambar</label>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-6">
                                <img class="img-preview img-thumbnail" src="<?= base_url('assets/upload/profile/' . $usr['image']) ?>">
                            </div>
                            <div class="col-sm-6">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="gambar" name="gambar">
                                    <label class="custom-file-label" for="gambar">Pilih Gambar</label>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success">Tambah</button>
        </div>
        </form>
    </div>
</div>
<!-- /.container-fluid -->