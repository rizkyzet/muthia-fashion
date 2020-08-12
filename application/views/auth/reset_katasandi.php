<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-lg-5">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row justify-content-center">

                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Atur Ulang Kata Sandi</h1>
                                </div>
                                <?= $this->session->flashdata("pesan"); ?>
                                <form class="user" action="<?= base_url("auth/reset_katasandi") ?>" method="post">
                                    <div class="form-group">
                                        <input type="password" name="kata_sandi" class="form-control form-control-user" placeholder="Masukkan Kata Sandi">
                                        <?= form_error("kata_sandi", "<div class='text-danger text-small'>", "</div>"); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="kata_sandi2" class="form-control form-control-user" placeholder="Konfirmasi Kata Sandi">
                                        <?= form_error("kata_sandi2", "<div class='text-danger text-small'>", "</div>"); ?>
                                    </div>
                                    <button type="submit" class="btn btn-success btn-user btn-block">
                                        UBAH
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>