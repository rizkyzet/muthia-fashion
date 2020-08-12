<option value="">Pilih Kota/Kabupaten</option>
<?php foreach ($kota as $kota) : ?>
    <option value="<?= $kota['id_kota'] ?>"><?= $kota['kota'] ?> (<?= $kota["tipe"] ?>)</option>
<?php endforeach;  ?>