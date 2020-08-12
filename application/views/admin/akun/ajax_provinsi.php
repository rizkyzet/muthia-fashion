<option>Pilih Kota/Kabupaten</option>
<?php foreach ($kota as $kota) : ?>
    <option name="id_kota" value="<?= $kota['id_kota'] ?>"><?= $kota['kota'] ?> (<?= $kota["tipe"] ?>)</option>
<?php endforeach;  ?>