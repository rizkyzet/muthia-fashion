<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">DATA PELANGGAN</h1>
    <?= $this->session->flashdata('pesan') ?>

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
            foreach ($users as $user) : ?>
                <tr>
                    <td> <?= $no++  ?> </td>
                    <td><?= $user['nama'] ?></td>
                    <td><?= $user['email'] ?></td>
                    <td><?= $user['no_tlp'] ?></td>
                    <td><?= $user['provinsi'] ?></td>
                    <td><?= $user['kota'] ?></td>
                    <td><?= $user['alamat'] ?></td>
                    <td><?= $user['kode_pos'] ?></td>
                    <!-- <td>
                        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                            <div class="btn-group mr-2" role="group" aria-label="Second group">
                                <a href="<?= base_url('admin/users/edit_users/' . $user['id']) ?>" class="btn btn-success"><i class="fas fa-edit"></i></a>
                                <a href="" class="btn btn-warning"><i class="fas fa-tshirt"></i></a>

                            </div>
                        </div>
                    </td> -->
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>
<!-- /.container-fluid -->