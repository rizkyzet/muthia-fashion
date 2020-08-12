<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">TAMBAH BARANG <?= strtoupper($barang['nama_brg']) ?></h1>
    <div class="row">
        <div class="col-5">
            <?= $this->session->flashdata('pesan'); ?>
            <?= form_open_multipart(base_url('admin/detail_barang/tambah/' . $kd_barang)); ?>
            <div class="form-group">
                <label for="">Warna</label>
                <input type="text" name="warna" class="form-control">
                <?= form_error("warna", "<div class='text-danger text-small'>", "</div>") ?>
            </div>
            <div class="form-group">
                <label for="">Ukuran</label>
                <select name="ukuran" id="ukuran" class="form-control">
                    <option value="">Pilih Ukuran</option>
                    <option value="allsize">ALLSIZE</option>
                    <option value="xl">XL</option>
                    <option value="l">L</option>
                    <option value="m">M</option>
                    <option value="s">S</option>
                </select>
                <?= form_error("ukuran", "<div class='text-danger text-small'>", "</div>") ?>
            </div>
            <div class="form-group">
                <label for="">Stok</label>
                <input type="number" name="stok" id="stok" class="form-control">
                <?= form_error("stok", "<div class='text-danger text-small'>", "</div>") ?>
            </div>

            <div class="form-group">
                <label for="">Gambar</label>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-6">
                                <img class="img-preview img-thumbnail" src="<?= base_url('assets/upload/barang/no_image.jpg') ?>">
                            </div>
                            <div class="col-sm-6">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="gambar" name="gambar" required>
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