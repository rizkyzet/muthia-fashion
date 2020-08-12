<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Input Resi Id Pesanan : <?= $id_pesanan ?></h1>
    <?= $this->session->flashdata('pesan') ?>

    <div class="row">
        <div class="col-md-4">
            <form action="<?= base_url('admin/pesanan/resi/' . $id_pesanan) ?>" method="POST">
                <div class="form-group">
                    <label for="resi">No.Resi</label>
                    <input type="text" name="resi" id="resi" class="form-control <?= form_error('resi') == true ? 'is-invalid' : '' ?> " value="<?= $pesanan['resi'] ?>">
                    <div class="invalid-feedback">
                        <?= form_error('resi') ?>
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Input</button>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->