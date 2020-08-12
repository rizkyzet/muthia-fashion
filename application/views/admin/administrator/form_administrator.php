<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">DATA PELANGGAN</h1>
    <?= $this->session->flashdata('pesan') ?>
    <a href="<?= base_url('admin/administrator/tambah_admin') ?>" class="btn btn-success">Tambah Admin</a>
    <table class="table table-stripped">
        <thead>
            <tr>
                <th>No </th>
                <th>Nama</th>
                <th>Email</th>
                <th>No Telepon</th>
                <th>Provinsi</th>
                <th>Kota</th>
                <th>Alamat</th>
                <th>Kode Pos</th>
                <!-- <th>Aksi</th> -->
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($admin as $a) : ?>
                <tr>
                    <td> <?= $no++  ?> </td>
                    <td><?= $a['nama'] ?></td>
                    <td><?= $a['email'] ?></td>
                    <td><?= $a['no_tlp'] ?></td>
                    <td><?= $a['provinsi'] ?></td>
                    <td><?= $a['kota'] ?></td>
                    <td><?= $a['alamat'] ?></td>
                    <td><?= $a['kode_pos'] ?></td>
                    <td>
                        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                            <div class="btn-group mr-2" role="group" aria-label="Second group">
                                <a href="<?= base_url('admin/administrator/edit_admin/' . $a['id']) ?>" class="btn btn-success"><i class="fas fa-edit"></i></a>
                                <a href="<?= base_url('admin/administrator/hapus_admin/' . $a['id']) ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>

                            </div>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>
<!-- /.container-fluid -->