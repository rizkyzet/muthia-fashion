<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">INFO AKUN</h1>
    <div class="body">
        <?= $this->session->flashdata('pesan') ?>
        <?= $this->session->flashdata('pesan_upload') ?>
        <div class="row">

            <div class="col-3 text-center">
                <img style="width: 300px;height:320px;" src="<?= base_url("assets/upload/profile/" . $usr['image']) ?>" class="img-thumbnail" alt="">
                <br>
                <a href="<?= base_url("pemilik/akun/edit_akun") ?>" class="btn btn-success btn-sm mt-2">Ubah Profil</a>
            </div>
            <div class="col-8">
                <table class="table">
                    <tr>
                        <td>Nama </td>
                        <td><strong><?= $usr['nama'] ?></strong></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><strong><?= $usr['email'] ?></strong></td>
                    </tr>
                    <tr>
                        <td>Nomor Telfon</td>
                        <td><strong><?= $usr['no_tlp'] ?></strong></td>
                    </tr>
                    <tr>
                        <td>Provinsi</td>
                        <td><strong><?= $usr['provinsi'] ?></strong></td>
                    </tr>
                    <tr>
                        <td>Kota</td>
                        <td><strong><?= $usr['kota'] ?></strong></td>
                    </tr>
                    <tr>
                        <td>Kode Pos</td>
                        <td><strong><?= $usr['kode_pos'] ?></strong></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td><strong><?= $usr['alamat'] ?></strong></td>
                    </tr>

                </table>
            </div>
        </div>
    </div>
</div>

<!-- /.container-fluid -->