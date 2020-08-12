<div class="super_container_inner">
    <div class="super_overlay"></div>

    <!-- Home -->

    <div class="home">
        <div class="home_container d-flex flex-column align-items-center justify-content-end">
            <div class="home_content text-center">
                <div class="home_title mb-3">Checkout</div>

            </div>
        </div>
    </div>

    <!-- Checkout -->

    <div class="checkout">
        <div class="container">
            <div class="row">

                <!-- Billing -->
                <div class="col-sm-6">
                    <div class="billing">
                        <div class="checkout_title">Selesai Belanja</div>
                        <div class="checkout_form_container">
                            <form action="<?= base_url('cart/tambah_pemesanan') ?>" id="checkout_form" class="checkout_form" method="post">
                                <input value='<?= $asal['id_kota'] ?>' type="hidden" name='asal' id='asal'>
                                <div>
                                    <label for="">Email</label>
                                    <input value="<?= $user['email'] ?>" type="phone" name="email" id="checkout_email" class="checkout_input">
                                    <label for="checkout_email" class="error text-danger mt-2"></label>
                                </div>
                                <div>
                                    <label for="">Nama</label>
                                    <input value="<?= $user['nama'] ?>" type="text" name="nama" id="checkout_name" class="checkout_input">
                                    <label for="checkout_name" class="error text-danger mt-2"></label>
                                </div>
                                <div>
                                    <label for="">No Telepon</label>
                                    <input value=" <?= $user["no_tlp"] ?>" type=" text" name="no_tlp" id="checkout_notlp" class="checkout_input">
                                    <label for="checkout_notlp" class="error text-danger mt-2"></label>
                                </div>
                                <div>
                                    <label for="">Alamat</label>
                                    <input value="<?= $user['alamat'] ?>" type="text" name="alamat" id="checkout_address" class="checkout_input">
                                    <label for="checkout_address" class="error text-danger mt-2"></label>
                                </div>
                                <div>

                                    <label for="">Provinsi</label>
                                    <select value="<?= $user['provinsi'] ?>" name="provinsi" id="checkout_provinsi" class="dropdown_item_select checkout_input">
                                        <option value="">Pilih Provinsi</option>
                                        <?php foreach ($provinsi as $prov) : ?>
                                            <option <?= $user['id_provinsi'] == $prov['id_provinsi'] ? 'selected' : '' ?> value="<?= $prov['id_provinsi'] ?>"><?= $prov['provinsi'] ?></option>
                                        <?php endforeach; ?>
                                    </select>


                                    <label for="checkout_provinsi" class="error text-danger mt-2"></label>
                                </div>
                                <div>
                                    <label for="">Kota/Kabupaten</label>
                                    <select value="<?= $user['kota'] ?>" name="kota" id="checkout_kota" class=" dropdown_item_select checkout_input">
                                        <option value="">Pilih Kota/Kabupaten</option>
                                        <?php foreach ($kota as $kota) : ?>
                                            <option <?= $user['id_kota'] == $kota['id_kota'] ? 'selected' : '' ?> value="<?= $kota['id_kota'] ?>"><?= $kota['kota'] ?> (<?= $kota["tipe"] ?>)</option>
                                        <?php endforeach;  ?>
                                    </select>
                                    <label for="checkout_kota" class="error text-danger mt-2"></label>
                                </div>
                                <div>
                                    <label for="ongkir">Ongkir</label>
                                    <div class="row" id="ajax_loader">
                                        <div class="col  text-center">
                                            <img src="<?= base_url('assets/img/ajax-loader.gif') ?>" alt="">
                                        </div>
                                    </div>
                                    <select name="harga_ongkir" id="checkout_ongkir" class=" dropdown_item_select checkout_input ">
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
                                    </select>


                                    <label for="checkout_ongkir" class="error text-danger mb-2"></label>
                                </div>

                                <div>
                                    <label for="">Kode Pos</label>
                                    <input value="<?= $user['kode_pos'] ?>" type="text" name="kode_pos" id="checkout_kodepos" class="checkout_input">
                                    <label for="checkout_kodepos" class="error text-danger mt-2"></label>
                                </div>

                                <input type="hidden" id="total_item" name="total_item" value="<?= $this->cart->total(); ?>">
                                <input type="hidden" id="kurir" name="kurir" value="">
                                <input type="hidden" id="layanan" name="layanan" value="">
                                <input type="hidden" id="ongkir" name="ongkir" value="">
                                <input type="hidden" id="total_bayar" name="total_bayar" value="">
                                <input type="hidden" name="total_berat" id="total_berat" value="<?= $total_berat ?>">
                                <input type="hidden" name="result_type" id="result_type" value="">
                                <input type="hidden" name="result_data" id="result_data" value="">

                        </div>
                    </div>
                </div>

                <!-- Cart Total -->
                <div id="ringkasan" class="col-sm-6 cart_col">
                    <div class="cart_total">
                        <div class="cart_extra_content cart_extra_total">
                            <div class="checkout_title">Ringkasan Pesanan</div>
                            <ul class="cart_extra_total_list">
                                <li class="d-flex flex-row align-items-center justify-content-start">
                                    <div class="cart_extra_total_title">Total Berat (gram)</div>
                                    <div class="cart_extra_total_value ml-auto" id="gram"><?= $total_berat; ?></div>
                                </li>
                                <li class="d-flex flex-row align-items-center justify-content-start">
                                    <div class="cart_extra_total_title">Total Item</div>
                                    <div class="cart_extra_total_value ml-auto">Rp. <?= $this->cart->total(); ?></div>
                                </li>

                                <li class="d-flex flex-row align-items-center justify-content-start">
                                    <div class="cart_extra_total_title">Pengiriman</div>
                                    <div class="cart_extra_total_value ml-auto">Rp. <span class="ongkir"></span></div>
                                </li>
                                <li class="d-flex flex-row align-items-center justify-content-start">
                                    <div class="cart_extra_total_title">Total</div>
                                    <div class="cart_extra_total_value ml-auto">Rp. <span class="total_bayar"></span></div>
                                </li>
                            </ul>

                            <!-- <div class="checkout_button trans_200"><a id="pay-button" href="">Bayar</a></div> -->

                        </div>
                        <button class="btn btn-block btn-white mt-5 text-white text-bold" style="background-color: #2fce98;" id="pay-button">Bayar</button>
                        </form>
                    </div>

                </div>

            </div>


        </div>

    </div>