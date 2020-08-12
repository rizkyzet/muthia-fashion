<div class="super_container_inner">
    <div class="super_overlay"></div>

    <!-- Home -->

    <div class="home">
        <div class="home_container d-flex flex-column align-items-center justify-content-end">
            <div class="home_content text-center">
                <div class="home_title mb-4">Edit Akun</div>

            </div>
        </div>
    </div>

    <!-- Cart -->

    <div class="cart_section">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card ">
                        <div class="card-header">
                            <ul class="nav nav-pills card-header-pills">
                                <li class="nav-item">
                                    <a class="nav-link active" href="<?= base_url('pelanggan/akun') ?>">Informasi Akun</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="<?= base_url('pelanggan/akun/ganti_password') ?>">Ganti Password</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="<?= base_url('pelanggan/pesanan') ?>">Riwayat Pembelian</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="<?= base_url('auth/logout') ?>">Keluar</a>
                                </li>
                            </ul>
                        </div>
                        <?= form_open_multipart(base_url('pelanggan/akun/edit_akun')) ?>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-3 text-center">
                                    <img style="width: 300px;height:320px;" src="<?= base_url("assets/upload/profile/" . $user['image']) ?>" class="img-thumbnail img-preview" alt="">
                                    <br>

                                </div>

                                <div class="col border">
                                    <table class="table table-md  table-borderless">
                                        <tr>
                                            <th style="width: 150px;">Nama :</th>
                                            <td style="text-align: left;"><input type="text" class="form-control" name="nama" id="nama" value="<?= $user['nama'] ?>">
                                                <?= form_error('nama', '<div class="text-danger text-small ml-2">', '</div>') ?>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th style="width: 150px;">Nomor Telepon :</th>
                                            <td style="text-align: left;"><input type="text" class="form-control" name="no_tlp" id="no_tlp" value="<?= $user['no_tlp'] ?>">
                                                <?= form_error('no_tlp', '<div class="text-danger text-small ml-2">', '</div>') ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th style="width: 150px;">Kota :</th>
                                            <td style="text-align: left;">
                                                <select class="form-control" name="kota" id="kota">
                                                    <?php foreach ($provinsi as $index => $p) : ?>
                                                        <optgroup label="<?= $p['provinsi'] ?>">
                                                            <?php foreach ($kota[$index] as $k) : ?>
                                                                <option value="<?= $k['id_kota'] ?>"><?= $k['kota'] ?> (<?= $k['tipe'] ?>)</option>
                                                            <?php endforeach; ?>
                                                        </optgroup>
                                                    <?php endforeach; ?>
                                                </select>
                                                <?= form_error('kota', '<div class="text-danger text-small ml-2">', '</div>') ?>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th style="width: 150px;">Kode Pos :</th>
                                            <td style="text-align: left;"><input type="text" class="form-control" name="kode_pos" value="<?= $user['kode_pos'] ?>" id="kode_pos">
                                                <?= form_error('kode_pos', '<div class="text-danger text-small ml-2">', '</div>') ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th style="width: 150px;">Alamat :</th>
                                            <td style="text-align: left;"><input type="text" class="form-control" value="<?= $user['alamat'] ?>" name="alamat" id="alamat">
                                                <?= form_error('alamat', '<div class="text-danger text-small ml-2">', '</div>') ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th style="width: 150px;">Gambar :</th>
                                            <td style="text-align: left;">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="gambar" name="gambar">
                                                    <label class="custom-file-label" for="gambar">Pilih Gambar</label>
                                                </div>

                                            </td>
                                        </tr>
                                    </table>
                                    <button style="background-color: #20c997; color:white;" type="submit" class="btn  btn-block">Ubah</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>