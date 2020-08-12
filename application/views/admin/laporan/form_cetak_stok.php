<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Stok</title>
    <style>
        body {
            font-size: 13px;
        }

        table {
            margin-bottom: 10px;
        }

        table.stok {
            width: 100%;
        }

        table.stok tbody tr:nth-child(odd) {
            background-color: #dddddd;
        }

        h1 {
            text-align: center;
        }

        table.stok tfoot tr td {
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
            <td><?= date('Y-m-d') ?></td>
        </tr>
    </table>


    <table class="stok" cellspacing="0" cellpadding="10" border="1">
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

    </table>
</body>

</html>