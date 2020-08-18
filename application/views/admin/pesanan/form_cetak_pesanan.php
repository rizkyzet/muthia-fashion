<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Pesanan <?= $pesanan['id_pesanan'] ?></title>
    <style>
        body {
            font-size: 11px;
        }

        .container {
            width: 1000px;
            height: 450px;

        }

        .container .pembayaran {
            float: left;
            width: 33%;


        }

        .container .pelanggan {
            float: left;
            width: 33%;


        }

        .container .pengiriman {
            float: left;
            width: 33%;


        }


        .kurir {
            float: right;
        }

        th,
        td {
            text-align: left;
        }

        .tagihan {
            width: 100%;
            border: 1px solid black;
        }

        .tagihan table {
            width: 100%;
        }

        .detail-pesanan {
            margin-top: 30px;
            width: 100%;

        }

        .detail-pesanan table {
            width: 100%;
        }
    </style>
</head>

<body>

    <h2>ID Pesanan <?= $pesanan['id_pesanan'] ?></h2>
    <div class="container">

        <div class="pelanggan">
            <table class="table_1" cellspacing=0 cellpadding=5>
                <tr>
                    <th colspan="2" style="border-bottom:1px solid black;"> Detail Pelanggan</th>
                </tr>
                <tr>
                    <th>Nama</th>
                    <td><?= $pelanggan['nama'] ?></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><?= $pelanggan['email'] ?></td>
                </tr>
                <tr>
                    <th>No. Telepon</th>
                    <td><?= $pelanggan['no_tlp'] ?></td>
                </tr>
            </table>
        </div>

        <div class="pembayaran">
            <table cellspacing=0 cellpadding=5>
                <tr>
                    <th colspan="2" style="border-bottom:1px solid black;"> Detail Pembayaran</th>
                </tr>
                <tr>
                    <th>Metode Pembayaran :</th>
                    <td><?= $pesanan['jenis_pembayaran'] ?></td>
                </tr>
                <tr>
                    <th>Bank :</th>
                    <td><?= strtoupper($pesanan['bank']) ?></td>
                </tr>
                <tr>
                    <th>Va Number :</th>
                    <td><?= $pesanan['va_number'] ?></td>
                </tr>

                <tr>
                    <th>Tanggal Dibayar :</th>
                    <td><?= $pesanan['tgl_dibayar'] ?></td>
                </tr>
            </table>
        </div>


        <div class="pengiriman">
            <table cellspacing=0 cellpadding=5>
                <tr>
                    <th colspan="2" style="border-bottom:1px solid black;"> Detail Pengiriman</th>
                </tr>
                <tr>
                    <th>Kurir :</th>
                    <td><?= strtoupper($pesanan['kurir']) ?></td>
                </tr>

                <tr>
                    <th>Layanan :</th>
                    <td><?= $pesanan['layanan'] ?></td>
                </tr>
                <tr>
                    <th>Total Berat (gram) :</th>
                    <td><?= $pesanan['total_berat'] * 1000 ?></td>
                </tr>
                <tr>
                    <th>Ongkir :</th>
                    <td><?= $pesanan['ongkir'] ?></td>
                </tr>
            </table>
        </div>
        <hr>


        <div class="tagihan">
            <table cellspacing=0 cellpadding=5 border=1>
                <tr>
                    <th>Alamat Tagihan</th>
                    <th>Alamat Pengiriman</th>
                </tr>
                <tr>
                    <td>
                        <strong><?= $tagihan['nama'] ?> </strong><br />
                        <?= $tagihan['alamat'] ?><br />
                        <?= $tagihan['kota'] ?> <?= $tagihan['kode_pos'] ?><br />
                        <?= $tagihan['provinsi'] ?>, Indonesia<br />
                        Telepon: <?= $tagihan['no_tlp'] ?><br />
                        Email: <?= $tagihan['email'] ?><br />
                    </td>
                    <td>
                        <strong><?= $pengiriman['nama'] ?> </strong><br />
                        <?= $pengiriman['alamat'] ?><br />
                        <?= $pengiriman['kota'] ?> <?= $pengiriman['kode_pos'] ?><br />
                        <?= $pengiriman['provinsi'] ?>, Indonesia<br />
                        Telepon: <?= $pengiriman['no_tlp'] ?><br />
                        Email: <?= $pengiriman['email'] ?><br />
                    </td>
                </tr>
            </table>
        </div>



        <div class="detail-pesanan">
            <table cellpadding=5 cellspacing=0 border="1">
                <tr>

                    <th>Nama Item</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Subtotal</th>
                </tr>
                <?php foreach ($item as $i) : ?>
                    <tr>

                        <td><?= $i['nama_brg'] ?> - <?= ucwords($i['warna']) ?> (<?= strtoupper($i['ukuran']) ?>)</td>
                        <td><?= $i['harga'] ?></td>
                        <td><?= $i['jumlah'] ?></td>
                        <td><?= $i['total_harga'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <table style='border-collapse:collapse;margin-top:10px;' width='100%'>
                <tr>
                    <td style='padding:5px 0px; text-align:right;  font-weight:bold;'>Total Bayar Item: </td>
                    <td style='padding:5px 10px; width:123px; text-align:right;  font-weight:normal;'>Rp. <?= $bayar_item ?></td>
                </tr>
                <tr>
                    <td style='padding:5px 0px; text-align:right;  font-weight:bold;'>Biaya Pengiriman: </td>
                    <td style='padding:5px 10px; width:123px; text-align:right;  '>Rp. <?= $pesanan['ongkir'] ?></td>
                </tr>

                <tr>
                    <td style='padding:5px 0px; text-align:right;  font-weight:bold;'>Total: </td>
                    <td style='padding:5px 10px; width:123px; text-align:right;  font-weight:bold;'>Rp. <?= $pesanan['total_bayar'] ?></td>
                </tr>

            </table>
        </div>
    </div>



</body>

</html>