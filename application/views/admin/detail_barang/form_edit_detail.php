<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">EDIT BARANG <?= $detail_barang['nama_brg'] ?></h1>
    <div class="row">
        <div class="col-5">
            <?= $this->session->flashdata('pesan'); ?>
            <?= form_open_multipart(base_url('admin/detail_barang/edit_detail/' . $detail_barang['id_detailbrg'])); ?>
            <input type="hidden" name="kd_brg" id="kd_brg" value="<?= $detail_barang['kd_brg'] ?>">
            <div class="form-group">
                <label for="">Warna</label>
                <input value="<?= $detail_barang['warna'] ?>" type="text" name="warna" class="form-control">
                <?= form_error("warna", "<div class='text-danger text-small'>", "</div>") ?>
            </div>
            <div class="form-group">
                <label for="">Ukuran</label>
                <select name="ukuran" id="ukuran" class="form-control">
                    <option value="">Pilih Ukuran</option>
                    <option <?= $detail_barang['ukuran'] == 'allsize' ? 'selected' : '' ?> value="allsize">AllSize</option>
                    <option <?= $detail_barang['ukuran'] == 'xl' ? 'selected' : '' ?> value="xl">XL</option>
                    <option <?= $detail_barang['ukuran'] == 'l' ? 'selected' : '' ?> value="l">L</option>
                    <option <?= $detail_barang['ukuran'] == 'm' ? 'selected' : '' ?> value="m">M</option>
                    <option <?= $detail_barang['ukuran'] == 's' ? 'selected' : '' ?> value="s">S</option>
                </select>
                <?= form_error("ukuran", "<div class='text-danger text-small'>", "</div>") ?>
            </div>


            <div class="form-group">
                <label for="">Gambar</label>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-6">
                                <img class="img-preview img-thumbnail" src="<?= base_url('assets/upload/barang/' . $detail_barang['gambar']) ?>">
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