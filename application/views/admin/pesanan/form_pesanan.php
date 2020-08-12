<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">DATA PESANAN</h1>
    <?= $this->session->flashdata('pesan') ?>

    <a href="<?= base_url('admin/pesanan/update_midtrans') ?>" class="btn btn-success mb-3 ml-4">Update Status</a>
    <table class="table table-stripped datatables">
        <thead>
            <tr>
                <th>No</th>
                <th>ID Pesanan </th>
                <th>Tanggal</th>
                <th>Nama Pelanggan</th>
                <th>Total Bayar</th>
                <th>Status</th>
                <th>Resi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($pesanan as $p) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $p['id_pesanan'] ?></td>
                    <td><?= $p['tgl_dibuat'] ?></td>
                    <td><?= $p['nama_user'] ?></td>
                    <td><?= $p['total_bayar'] ?></td>

                    <td>
                        <?php if ($p['status_pesanan'] == 'belum dibayar') { ?>
                            <span class="badge badge-secondary"><?= ucwords($p['status_pesanan']) ?></span>
                        <?php } elseif ($p['status_pesanan'] == 'dibayar') { ?>
                            <span class="badge badge-warning"><?= ucwords($p['status_pesanan']) ?></span>
                        <?php } elseif ($p['status_pesanan'] == 'dikirim') { ?>
                            <span class="badge badge-success"><?= ucwords($p['status_pesanan']) ?></span>
                        <?php } else { ?>
                            <span class="badge badge-danger"><?= ucwords($p['status_pesanan']) ?></span>
                        <?php } ?>
                    </td>
                    <td> <a href="<?= base_url('admin/pesanan/resi/' . $p['id_pesanan']) ?>" class="btn btn-sm <?= $p['resi'] == '' ? 'btn-danger' : 'btn-success' ?> <?= ($p['status_pesanan'] == 'belum dibayar') ? "disabled" : ($p['status_pesanan'] == 'expired' ? "disabled" : '')  ?>"><i class="fas <?= $p['resi'] == '' ? 'fa-times' : 'fa-check' ?> "></i> Resi</a></td>
                    <td>
                        <a href="<?= base_url('admin/pesanan/detail/' . $p['id_pesanan']) ?>" class="btn btn-sm btn-primary">Detail Pesanan</a>



                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>
<!-- /.container-fluid -->