<!-- Cart -->

<div style="width:590px; padding:10px; margin:0px auto; font-family:'Arial',tahoma; font-size:12px;">
    <div style="width:100%; height:100px">
        <div style="margin-top:50px;float:left;  width:50%;font-family:'Dancing Script', cursive;
    font-size: 35px;">
            Muthia Fashion
        </div>

    </div>
    <div style="height:45px; clear:both;">
        <span style="font-size:20px; font-weight:bold; display:block;">ID Pesanan: 202000472</span>
    </div>

    <table class="table table-bordered table-striped table-sm">
        <thead>
            <tr style="background-color:  #20c997; color:white;">
                <th>GAMBAR</th>
                <th>ITEM</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Subtotal</th>
            </tr>
            <?php foreach ($item as $i) : ?>
                <tr>
                    <td align="center" style='border-top:2px solid #FFFFFF; background-color:#EEEEEE; padding:5px 10px; font-size:13px; font-weight:bold;'><img style="max-width: 64px;" class="img-thumbnail" src="<?= base_url('assets/upload/barang/' . $i['gambar']) ?>" alt=""></td>


                    <td align="center" style='border-top:2px solid #FFFFFF; background-color:#EEEEEE; padding:5px 10px; font-size:13px; font-weight:bold;vertical-align:middle;'>
                        <?= $i['nama_brg'] ?> - <?= ucwords($i['warna']) ?> (<?= strtoupper($i['ukuran']) ?>)
                    </td>
                    <td align="center" style='border-top:2px solid #FFFFFF; background-color:#EEEEEE; padding:5px 10px; font-size:13px; font-weight:bold;vertical-align:middle;'>
                        <?= $i['harga'] ?>
                    </td>
                    <td align="center" style='border-top:2px solid #FFFFFF; background-color:#EEEEEE; padding:5px 10px; font-size:13px; font-weight:bold;vertical-align:middle;'>
                        <?= $i['jumlah'] ?>
                    </td>
                    <td align="center" style='border-top:2px solid #FFFFFF; background-color:#EEEEEE; padding:5px 10px; font-size:13px; font-weight:bold;vertical-align:middle;'>
                        <?= $i['total_harga'] ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </thead>
    </table>


    <table style='border-collapse:collapse;' width='100%'>
        <tr>
            <td style='padding:5px 0px; text-align:right; font-size:13px; font-weight:bold;'>Total Bayar Item: </td>
            <td style='padding:5px 10px; width:123px; text-align:right; font-size:13px; font-weight:normal;'>Rp. <?= $bayar_item ?></td>
        </tr>
        <tr>
            <td style='padding:5px 0px; text-align:right; font-size:13px; font-weight:bold;'>Biaya Pengiriman: </td>
            <td style='padding:5px 10px; width:123px; text-align:right; font-size:13px; '>Rp. <?= $pesanan['ongkir'] ?></td>
        </tr>

        <tr>
            <td style='padding:5px 0px; text-align:right; font-size:13px; font-weight:bold;'>Total: </td>
            <td style='padding:5px 10px; width:123px; text-align:right; font-size:13px; font-weight:bold;'>Rp. <?= $pesanan['total_bayar'] ?></td>
        </tr>

    </table>


    <table style='border-collapse:collapse; width:100%; margin-top:15px;'>
        <tr>
            <th style='width:50%; background-color: #20c997; color:#FFFFFF; padding:5px 10px; font-size:13px; font-weight:bold; text-align:left;'>Alamat Pengiriman</th>
            <th style='width:50%; background-color: #20c997; color:#FFFFFF; padding:5px 10px; font-size:13px; font-weight:bold; text-align:left;'>Alamat Tagihan</th>
        </tr>
        <tr>
            <td style='width:50%; border-top:2px solid #FFFFFF; background-color:#EEEEEE;  padding:10px 10px; font-size:13px;'>
                <strong><?= $pengiriman['nama'] ?> </strong><br />
                <?= $pengiriman['alamat'] ?><br />
                <?= $pengiriman['kota'] ?> <?= $pengiriman['kode_pos'] ?><br />
                <?= $pengiriman['provinsi'] ?>, Indonesia<br />
                Telepon: <?= $pengiriman['no_tlp'] ?><br />
                Email: <?= $pengiriman['email'] ?><br />
            </td>
            <td style='width:50%; border-top:2px solid #FFFFFF; background-color:#EEEEEE;  padding:10px 10px; font-size:13px;'>
                <strong><?= $tagihan['nama'] ?> </strong><br />
                <?= $tagihan['alamat'] ?><br />
                <?= $tagihan['kota'] ?> <?= $tagihan['kode_pos'] ?><br />
                <?= $tagihan['provinsi'] ?>, Indonesia<br />
                Telepon: <?= $tagihan['no_tlp'] ?><br />
                Email: <?= $tagihan['email'] ?><br />
            </td>
        </tr>
    </table>
</div>