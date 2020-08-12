<thead>
    <tr>
        <th>No </th>
        <th>Tanggal</th>
        <th>ID Pesanan</th>
        <th>Nama Pelanggan</th>
        <th>Email</th>
        <th>Barang</th>
        <th>Jenis Pembayaran</th>
        <th>Total Bayar</th>
    </tr>
</thead>
<tbody>
    <?php $no = 1;
    foreach ($penjualan as $index => $jual) : ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $jual['tgl_dibuat'] ?></td>
            <td><?= $jual['id_pesanan'] ?></td>
            <td><?= $jual['nama'] ?></td>
            <td><?= $jual['email'] ?></td>
            <td>

                <ul style="list-style-type:disc !important;   padding-left: 1.5em;">
                    <?php foreach ($detail_penjualan[$index] as $p) : ?>
                        <li><?= $p['nama_brg'] ?> - <?= ucwords($p['warna']) ?> (<?= strtoupper($p['ukuran']) ?>) x<?= $p['jumlah'] ?></li>

                    <?php endforeach; ?>
                </ul>
            </td>
            <td><?= ucwords(str_replace('_', ' ', $jual['jenis_pembayaran'])) ?></td>
            <td><?= $jual['total_bayar'] ?></td>
        </tr>
    <?php endforeach; ?>
    <tr>
        <td colspan="5" class="text-center font-weight-bold">Total</td>
        <td><?= $total ?></td>
    </tr>
</tbody>