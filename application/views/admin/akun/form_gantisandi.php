<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Ganti Kata Sandi</h1>
    <form action="<?= base_url('admin/akun/gantisandi') ?>" method="post">
        <div class="row">
            <div class="col-5">
                <?= $this->session->flashdata('pesan') ?>
                <div class="form-grup">
                    <label for="">Kata Sandi Lama</label>
                    <input type="password" class='form-control' name='sandi_lama' value="<?= set_value('sandi_lama') ?>">
                    <?= form_error("sandi_lama", "<div class='text-danger text-small'>", "</div>") ?>
                </div>
                <div class="form-grup">
                    <label for="">Kata Sandi Baru</label>
                    <input type="password" class='form-control' name='sandi_baru1'>
                    <?= form_error("sandi_baru1", "<div class='text-danger text-small'>", "</div>") ?>
                </div>
                <div class="form-grup">
                    <label for="">Konfirmasi Kata Sandi Baru</label>
                    <input type="password" class='form-control' name='sandi_baru2'>
                    <?= form_error("sandi_baru2", "<div class='text-danger text-small'>", "</div>") ?>
                </div>
                <button type='submit' class="btn btn-success mt-3">Ganti</button>
            </div>
        </div>
    </form>
</div>