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
                                    <h1 class="h4 text-gray-900 mb-4">Lupa Kata Sandi</h1>
                                </div>
                                <?= $this->session->flashdata("pesan"); ?>
                                <form class="user" action="<?= base_url("auth/lupasandi") ?>" method="post">
                                    <div class="form-group">
                                        <input type="text" name="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Masukkan Email">
                                        <?= form_error("email", "<div class='text-danger text-small'>", "</div>"); ?>
                                    </div>
                                    <button type="submit" class="btn btn-success btn-user btn-block">
                                        Kirim
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