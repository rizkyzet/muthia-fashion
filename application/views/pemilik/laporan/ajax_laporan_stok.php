<thead>
    <tr>
        <th>No </th>
        <th>Nama Barang</th>
        <th>Warna</th>
        <th>Ukuran</th>
        <th>Stok</th>

    </tr>
</thead>
<tbody>
    <?php $no = 1;
    foreach ($stok as $index => $stok) : ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $stok['nama_brg'] ?></td>
            <td><?= $stok['warna'] ?></td>
            <td><?= $stok['ukuran'] ?></td>
            <td><?= $stok['stok'] ?></td>

        </tr>
    <?php endforeach; ?>

</tbody>