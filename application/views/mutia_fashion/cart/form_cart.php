<div class="super_container_inner">
    <div class="super_overlay"></div>

    <!-- Home -->

    <div class="home">
        <div class="home_container d-flex flex-column align-items-center justify-content-end">
            <div class="home_content text-center">
                <div class="home_title mb-4">Keranjang Belanja</div>

            </div>
        </div>
    </div>

    <!-- Cart -->

    <div class="cart_section">
        <div class="container">
            <div class="row">
                <div class="col">
                    <?= $this->session->flashdata('pesan') ?>
                    <div class="cart_container">

                        <!-- Cart Bar -->
                        <div class="cart_bar">
                            <ul class="cart_bar_list item_list d-flex flex-row align-items-center justify-content-end">
                                <li class="mr-auto"> Produk </li>
                                <li>Warna</li>
                                <li>Ukuran</li>
                                <li>Harga</li>
                                <li>Berat</li>
                                <li>Jumlah</li>
                                <li>Subtotal</li>
                                <li>Aksi</li>
                            </ul>
                        </div>

                        <!-- Cart Items -->

                        <div class="cart_items">
                            <ul class="cart_items_list">
                                <?php $no = 1;
                                $id = 1;
                                foreach ($this->cart->contents() as $index => $keranjang) :  ?>

                                    <!-- Cart Item -->
                                    <li class="cart_item item_list d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-lg-end justify-content-start">
                                        <div class="product d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start mr-auto">
                                            <div>
                                                <div class="product_number"><?= $no++ ?></div>
                                            </div>
                                            <div>
                                                <div class="product_image"><img src="<?= base_url('assets/upload/barang/' . $keranjang['options']['Gambar']) ?>" alt=""></div>
                                            </div>
                                            <div class="product_name_container">
                                                <div class="product_name"><a href="product.html"><?= $keranjang['name'] ?></a></div>

                                            </div>
                                        </div>
                                        <div class="product_color product_text"><span>Warna: </span><?= $keranjang['options']['Color'] ?></div>
                                        <div class="product_size product_text"><span>Ukuran: </span><?= $keranjang['options']['Size'] ?></div>
                                        <div class="product_price product_text"><span>Harga: </span><?= $keranjang['price'] ?></div>
                                        <div class="product_weight product_text"><span>Berat: </span><?= $keranjang['qty'] * $keranjang['options']['Weight'] ?></div>
                                        <div class="product_quantity_container">

                                            <input type="number" class="form-control qty" value="<?= $keranjang['qty'] ?>" id="<?= $keranjang['rowid'] ?>">


                                        </div>
                                        <div class="product_total product_text"><span>Subtotal: </span><?= $keranjang['subtotal'] ?></div>
                                        <div class=" product_text"><span>Aksi: </span><button id="<?= $keranjang['rowid'] ?>" class="btn btn-danger hapus_cart"><i class="fas fa-times"></i></button></div>
                                    </li>
                                    <?php $id++ ?>
                                <?php endforeach; ?>
                            </ul>
                            <div class="d-flex flex-row-reverse ">

                                <div class="ml-3 mr-5" style="font-weight: bold;font-size:20px"><?= $this->cart->total() ?></div>
                                <div class="ml-3" style="font-weight: bold;font-size:20px">TOTAL BAYAR : </div>
                            </div>
                        </div>

                        <!-- Cart Buttons -->
                        <div class="cart_buttons d-flex flex-row align-items-start justify-content-start">
                            <div class="cart_buttons_inner ml-sm-auto d-flex flex-row align-items-start justify-content-start flex-wrap">
                                <div class="button button_clear trans_200"><a href="<?= base_url('cart/hapus_keranjang') ?>">Hapus Semua Keranjang</a></div>
                                <div class="button button_continue trans_200"><a href="<?= base_url() ?>">Lanjutkan Belanja</a></div>
                                <div class="button button_continue trans_200"><a href="<?= base_url('cart/checkout') ?>">Checkout</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="row cart_extra_row">

                <div class="col-lg cart_extra_col">
                    <div class="cart_extra cart_extra_2">
                        <div class="cart_extra_content cart_extra_total">
                            <div class="cart_extra_title">Total Keranjang</div>
                            <ul class="cart_extra_total_list">
                                <li class="d-flex flex-row align-items-center justify-content-start">
                                    <div class="cart_extra_total_title">Total</div>
                                    <div class="cart_extra_total_value ml-auto"><?= $this->cart->total() ?></div>
                                </li>
                            </ul>
                            <div class="checkout_button trans_200"><a href="<?= base_url('cart/checkout/') ?>">Checkout</a></div>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </div>