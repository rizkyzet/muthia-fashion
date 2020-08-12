<div class="super_container_inner">
    <div class="super_overlay"></div>

    <!-- Home -->

    <div class="home">
        <!-- Home Slider -->
        <div class="home_slider_container">
            <div class="owl-carousel owl-theme home_slider">

                <!-- Slide -->
                <div class="owl-item">
                    <div class="background_image" style="background-color: #2fce98;"></div>
                    <div class="container fill_height">
                        <div class="row fill_height">
                            <div class="col fill_height">
                                <div class="home_container d-flex flex-column align-items-center justify-content-start">
                                    <div class="home_content">
                                        <div class="home_title">Terbaru~</div>

                                        <div class="home_items">
                                            <div class="row">
                                                <div class="col-sm-3 offset-lg-1">
                                                    <div class="home_item_side">
                                                        <div class="product_tag d-flex flex-column align-items-center justify-content-center">
                                                            <div>
                                                                <div>Mulai</div>
                                                                <div>Rp.<span><?= $terbaru[1]['harga'] ?></span></div>
                                                            </div>
                                                        </div>
                                                        <a href="<?= base_url('produk/detail/' . $terbaru[1]['kd_brg']) ?>"><img style="height: 300px;" src="<?= base_url('assets/upload/barang/' . $terbaru[1]['gambar']) ?>" alt="">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-8 offset-sm-2 offset-md-0">
                                                    <div class="product home_item_large">
                                                        <div class="product_tag d-flex flex-column align-items-center justify-content-center">
                                                            <div>
                                                                <div>Mulai</div>
                                                                <div>Rp.<span><?= $terbaru[0]['harga'] ?></span></div>
                                                            </div>
                                                        </div>
                                                        <a href="<?= base_url('produk/detail/' . $terbaru[0]['kd_brg']) ?>">
                                                            <div class="product_image"><img style="height: 450px;" src="<?= base_url('assets/upload/barang/' . $terbaru[0]['gambar']) ?>" alt=""></div>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="home_item_side">
                                                        <div class="product_tag d-flex flex-column align-items-center justify-content-center">
                                                            <div>
                                                                <div>Mulai</div>
                                                                <div>Rp.<span><?= $terbaru[2]['harga'] ?></span></div>
                                                            </div>
                                                        </div>
                                                        <a href="<?= base_url('produk/detail/' . $terbaru[2]['kd_brg']) ?>"><img style="height: 300px;" src="<?= base_url('assets/upload/barang/' . $terbaru[2]['gambar']) ?>" alt=""></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slide -->
                <div class="owl-item">
                    <div class="background_image" style="background-color: #2fce98;"></div>
                    <div class="container fill_height">
                        <div class="row fill_height">
                            <div class="col fill_height">
                                <div class="home_container d-flex flex-column align-items-center justify-content-start">
                                    <div class="home_content">
                                        <div class="home_title">Paling Laku</div>
                                        <!-- <div class="home_subtitle">Hijab Syari'i</div> -->
                                        <div class="home_items">
                                            <div class="row">
                                                <div class="col-sm-3 offset-lg-1">
                                                    <div class="home_item_side">
                                                        <div class="product_tag d-flex flex-column align-items-center justify-content-center">
                                                            <div>
                                                                <div>Mulai</div>
                                                                <div>Rp.<span><?= $terlaris[1]['harga'] ?></span></div>
                                                            </div>
                                                        </div>
                                                        <a href="<?= base_url('produk/detail/' . $terlaris[1]['kd_brg']) ?>"><img style="height: 300px;" src="<?= base_url('assets/upload/barang/' . $terlaris[1]['gambar']) ?>" alt="">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-8 offset-sm-2 offset-md-0">
                                                    <div class="product home_item_large">
                                                        <div class="product_tag d-flex flex-column align-items-center justify-content-center">
                                                            <div>
                                                                <div>Mulai</div>
                                                                <div>Rp.<span><?= $terlaris[0]['harga'] ?></span></div>
                                                            </div>
                                                        </div>
                                                        <a href="<?= base_url('produk/detail/' . $terlaris[0]['kd_brg']) ?>">
                                                            <div class="product_image"><img style="height: 450px;" src="<?= base_url('assets/upload/barang/' . $terlaris[0]['gambar']) ?>" alt=""></div>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="home_item_side">
                                                        <div class="product_tag d-flex flex-column align-items-center justify-content-center">
                                                            <div>
                                                                <div>Mulai</div>
                                                                <div>Rp.<span><?= $terlaris[2]['harga'] ?></span></div>
                                                            </div>
                                                        </div>
                                                        <a href="<?= base_url('produk/detail/' . $terlaris[2]['kd_brg']) ?>"><img style="height: 300px;" src="<?= base_url('assets/upload/barang/' . $terlaris[2]['gambar']) ?>" alt=""></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slide -->
                <div class="owl-item">
                    <div class="background_image" style="background-color: #2fce98;"></div>
                    <div class="container fill_height">
                        <div class="row fill_height">
                            <div class="col fill_height">
                                <div class="home_container d-flex flex-column align-items-center justify-content-start">
                                    <div class="home_content">
                                        <div class="home_title">Cuci Gudang</div>
                                        <div class="home_subtitle">Tunik</div>
                                        <div class="home_items">
                                            <div class="row">
                                                <div class="col-sm-3 offset-lg-1">
                                                    <div class="home_item_side">
                                                        <a href="product.html"><img src="<?= base_url('vendor/littlecloset/') ?>images/home_1.jpg" alt="">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-8 offset-sm-2 offset-md-0">
                                                    <div class="product home_item_large">
                                                        <div class="product_tag d-flex flex-column align-items-center justify-content-center">
                                                            <div>
                                                                <div>Mulai</div>
                                                                <div>Rp.<span>250.000</span></div>
                                                            </div>
                                                        </div>
                                                        <a href="tes">
                                                            <div class="product_image"><img src="<?= base_url('vendor/littlecloset/') ?>images/home_2.jpg" alt=""></div>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="home_item_side">
                                                        <a href="product.html"><img src="<?= base_url('vendor/littlecloset/') ?>images/home_3.jpg" alt=""></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
            <div class="home_slider_nav home_slider_nav_prev"><i class="fa fa-chevron-left" aria-hidden="true"></i></div>
            <div class="home_slider_nav home_slider_nav_next"><i class="fa fa-chevron-right" aria-hidden="true"></i></div>

            <!-- Home Slider Dots -->

            <div class="home_slider_dots_container">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="home_slider_dots">
                                <ul id="home_slider_custom_dots" class="home_slider_custom_dots d-flex flex-row align-items-center justify-content-center">
                                    <li class="home_slider_custom_dot active">01</li>
                                    <li class="home_slider_custom_dot">02</li>
                                    <li class="home_slider_custom_dot">03</li>
                                    <li class="home_slider_custom_dot">04</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>





    <!-- Products -->


    <div class="products ">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 mb-5">
                    <div class="section_title text-center">Featured</div>
                </div>
            </div>

            <div class=" owl-carousel owl-theme">
                <?php foreach ($barang as $brg) : ?>
                    <!-- Product -->

                    <div class="product mr-3">
                        <div class="product_image"><img style=" height:390px;" src="<?= base_url('assets/upload/barang/' . $brg['gambar']) ?>" alt=""></div>
                        <div class="product_content">
                            <div class="product_info d-flex flex-row align-items-start justify-content-start">
                                <div>
                                    <div>
                                        <!-- nama produk -->
                                        <div class="product_name">
                                            <a href="product.html"><?= $brg['nama_brg'] ?>
                                            </a>
                                        </div>
                                        <!-- nama produk -->

                                        <!-- category apa -->
                                        <div class="product_category">Kategori
                                            <a href="category.html">
                                                <?= ambil_nama_kategori($brg['kd_kategori']) ?>
                                            </a>
                                        </div>
                                        <!-- catergory apa -->

                                    </div>
                                </div>
                                <!-- harga produk -->
                                <div class="ml-auto text-right">
                                    <div class="product_price text-right">Rp.<span><?= $brg['harga'] ?></span></div>
                                </div>
                                <!-- harga produk -->
                            </div>

                            <!-- cart -->
                            <a href="<?= base_url('produk/detail/' . $brg['kd_brg']) ?>">
                                <div class="product_buttons">
                                    <div class=" d-flex flex-row  justify-content-center">

                                        <div class="product_button product_cart text-center d-flex flex-fill align-items-center justify-content-center">
                                            <div>
                                                <div><img src="<?= base_url('vendor/littlecloset/') ?>images/cart.svg" class="svg" alt="">
                                                    <div>+</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <!-- cart -->

                        </div>
                    </div>

                <?php endforeach; ?>

            </div>

            <!-- <div class="row load_more_row">
                <div class="col">
                    <div class="button load_more ml-auto mr-auto"><a href="#">load more</a></div>
                </div>
            </div> -->
        </div>
    </div>

</div>