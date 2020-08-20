<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Penjualan</title>
    <style>
        body {
            font-size: 13px;
        }

        table {
            margin-bottom: 10px;
        }

        table.penjualan {
            width: 100%;
        }

        table.penjualan tbody tr:nth-child(odd) {
            background-color: #dddddd;
        }

        h1 {
            text-align: center;
        }

        table.penjualan tfoot tr td {
            font-weight: bold;
            text-align: center;

        }
    </style>
</head>

<body>
    <h1>Laporan Penjualan</h1>

    <table>
        <tr>
            <th>Tanggal :</th>
            <td><?= $tanggal_awal ?> &mdash; <?= $tanggal_akhir ?></td>
        </tr>
    </table>


    <table class="penjualan" cellspacing="0" cellpadding="10" border="1">
        <thead>
            <tr>
                <th>No</th>
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
                    <td><?= formatHarga($jual['total_bayar']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="7">Total</td>
                <td align="left"><?= formatHarga($total) ?></td>
            </tr>
        </tfoot>
    </table>
</body>

</html>