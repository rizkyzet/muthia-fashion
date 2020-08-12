<option value="">Pilih Paket</option>
<optgroup label="POS">

    <?php foreach ($ongkir_pos['rajaongkir']['results'][0]['costs'] as $ongkir) : ?>
        <option data-kurir="<?= $ongkir_pos['rajaongkir']['results'][0]['code'] ?>" data-layanan="<?= $ongkir['service'] ?>" data-ongkir="<?= $ongkir['cost'][0]['value'] ?>" value="<?= $ongkir['service'] ?>-<?= $ongkir['cost'][0]['value'] ?>"><?= $ongkir['service'] ?> - <?= $ongkir['cost'][0]['etd'] ?> - (Rp.<?= $ongkir['cost'][0]['value'] ?>)</option>
    <?php endforeach;  ?>

</optgroup>
<optgroup label="JNE">

    <?php foreach ($ongkir_jne['rajaongkir']['results'][0]['costs'] as $ongkir) : ?>
        <option data-kurir="<?= $ongkir_jne['rajaongkir']['results'][0]['code'] ?>" data-layanan="<?= $ongkir['service'] ?>" data-ongkir="<?= $ongkir['cost'][0]['value'] ?>" value="<?= $ongkir['service'] ?>-<?= $ongkir['cost'][0]['value'] ?>"><?= $ongkir['service'] ?> - <?= $ongkir['cost'][0]['etd'] ?> - (Rp.<?= $ongkir['cost'][0]['value'] ?>)</option>
    <?php endforeach;  ?>

</optgroup>
<optgroup label="TIKI">

    <?php foreach ($ongkir_tiki['rajaongkir']['results'][0]['costs'] as $ongkir) : ?>
        <option data-kurir="<?= $ongkir_tiki['rajaongkir']['results'][0]['code'] ?>" data-layanan="<?= $ongkir['service'] ?>" data-ongkir="<?= $ongkir['cost'][0]['value'] ?>" value="<?= $ongkir['service'] ?>-<?= $ongkir['cost'][0]['value'] ?>"><?= $ongkir['service'] ?> - <?= $ongkir['cost'][0]['etd'] . " HARI" ?> - (Rp.<?= $ongkir['cost'][0]['value'] ?>)</option>
    <?php endforeach;  ?>

</optgroup>