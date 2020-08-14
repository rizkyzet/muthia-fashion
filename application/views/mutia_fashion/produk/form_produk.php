<div class="super_container_inner">
    <div class="super_overlay"></div>

    <!-- Home -->

    <div class="home">
        <div class="home_container d-flex flex-column align-items-center justify-content-end">
            <div class="home_content text-center mb-3">
                <div class="home_title">Product Page</div>
            </div>
        </div>
    </div>

    <!-- Product -->
    <form action="<?= base_url('cart/tambah') ?>" method="post">
        <div class="product">
            <div class="container">
                <?= $this->session->flashdata('pesan') ?>
                <div class="row">

                    <!-- Product Image -->
                    <div class="col-lg-6">
                        <div class="product_image_slider_container">
                            <div id="slider" class="flexslider">
                                <ul class="slides">
                                    <?php foreach ($detail as $dtl) : ?>
                                        <li>
                                            <img class="img_produk" style="width: 540px; height:600px;" src="<?= base_url("assets/upload/barang/" . $dtl['gambar']) ?>" />

                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>

                        </div>
                    </div>

                    <!-- Product Info -->
                    <div class="col-lg-6 product_col">
                        <div class="product_info">
                            <div class="product_name"><?= ucwords($barang['nama_brg']) ?> - <span class="product_detail"><?= ucwords($detail[0]['warna']) ?> - <?= strtoupper($detail[0]['ukuran']) ?></span></div>
                            <div class="product_category"> Kategori <a href="category.html"><?= ambil_nama_kategori($barang['kd_kategori']) ?></a></div>
                            <hr>
                            <input type="hidden" name="kd" id="kd" value="<?= $kd_brg ?>">
                            <div class="mt-3 row">
                                <div class="col-3">
                                    <label style="color: black; font-weight:bold;" for="">Warna</label>
                                    <select style="color: black;" name="warna" id="warna" class="form-control">
                                        <?php foreach ($warna as $wrn) : ?>
                                            <option value="<?= $wrn ?>"><?= ucwords($wrn) ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="mt-3 row">
                                <div class="col-2">
                                    <label style="color: black; font-weight:bold;" for="">Ukuran</label>
                                    <select style="color: black;" name="ukuran" id="ukuran" class="form-control">
                                        <?php foreach ($ukuran as $uk) : ?>
                                            <option value="<?= $uk ?>"><?= strtoupper($uk) ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="mt-3 row">
                                <div class="col-2">
                                    <label style="color: black;font-weight:bold;" for="">Jumlah</label>
                                    <input style="color:black;" type="number" name="jumlah" id="jumlah" min="1" value="1" class="form-control">
                                </div>
                            </div>

                            <div class="product_price">Rp.<span><?= $barang['harga'] ?></span></div>

                            <div class="product_text">
                                <p><?= $barang['deskripsi'] ?></p>
                            </div>
                            <div class="mt-3">
                                <div class="text-right d-flex flex-row align-items-start justify-content-start">

                                    <div class="product_button product_cart text-center d-flex flex-fill align-items-center justify-content-center">
                                        <button style="background-color: #20c997;" class="btn  btn-block text-white" type="submit" <?= $this->session->userdata('role_id') == 1 ? 'disabled' : ($this->session->userdata('role_id') == 2 ? 'disabled' : '') ?>><i class="fas fa-shopping-cart"></i> Tambah ke keranjang</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </form>