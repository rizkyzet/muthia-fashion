<div class="container">

    <!-- Outer Row -->



    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">

                <div class="col-lg">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Daftar Akun</h1>
                        </div>
                        <?= $this->session->flashdata("pesan"); ?>
                        <form class="user" action="<?= base_url("auth/register") ?>" method="post">
                            <div class="form-group">
                                <input type="text" name="nama" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Nama Lengkap">
                                <?= form_error("nama", "<div class='text-danger text-small'>", "</div>"); ?>
                            </div>
                            <div class="form-group">
                                <input type="text" name="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Email">
                                <?= form_error("email", "<div class='text-danger text-small'>", "</div>"); ?>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" name="kata_sandi" class=" form-control form-control-user" id="exampleInputPassword" placeholder="Kata Sandi">
                                    <?= form_error("kata_sandi", "<div class='text-danger text-small'>", "</div>"); ?>
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" name="kata_sandi2" class=" form-control form-control-user" id="exampleInputPassword" placeholder="Konfirmasi Kata Sandi ">
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" name="no_tlp" class=" form-control form-control-user" id="exampleInputPassword" placeholder="Masukkan Nomor Telepon">
                                <?= form_error("no_tlp", "<div class='text-danger text-small'>", "</div>"); ?>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <select name="provinsi" id="provinsi_auth" class="form-control">
                                        <option value="" selected>Pilih Provinsi</option>
                                        <?php foreach ($provinsi as $prov) : ?>
                                            <option value="<?= $prov["id_provinsi"] ?>"><?= $prov["provinsi"] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <select name="kota" id="kota_auth" class="form-control">
                                        <option value="" selected>Pilih Kota/Kabupaten</option>
                                        <!-- <?php foreach ($kota as $kota) : ?>
                                            <option value="<?= $kota["id_kota"] ?>"><?= $kota["kota"] ?></option>
                                        <?php endforeach; ?> -->

                                    </select>
                                    <?= form_error("kota", "<div class='text-danger text-small'>", "</div>"); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" name="kode_pos" class=" form-control form-control-user" id="exampleInputPassword" placeholder="Kode Pos">
                                <?= form_error("kode_pos", "<div class='text-danger text-small'>", "</div>"); ?>
                            </div>
                            <div class="form-group">
                                <input type="text" name="alamat" class=" form-control form-control-user" id="exampleInputPassword" placeholder="Alamat">
                                <?= form_error("alamat", "<div class='text-danger text-small'>", "</div>"); ?>
                            </div>

                            <button type="submit" class="btn btn-success btn-user btn-block">
                                Daftar
                            </button>


                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="<?= base_url('auth') ?>">Sudah Punya Akun</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>