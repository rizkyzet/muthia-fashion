<!-- Home -->

<div class="home">
    <div class="home_container d-flex flex-column align-items-center justify-content-end">
        <div class="home_content text-center">
            <div class="home_title mb-4">Kategori <?= $kategori['nama_kategori'] ?></div>

        </div>
    </div>
</div>

<!-- Products -->

<div class="products">
    <div class="container">
        <br>
        <div class="row products_row products_container grid">


            <!-- Product -->
            <?php foreach ($barang as $brg) : ?>
                <div class="col-xl-4 col-md-6 grid-item new">
                    <div class="product">
                        <div class="product_image"><img style="width:350px; height:390px;" src="<?= base_url('assets/upload/barang/' . $brg['gambar']) ?>" alt=""></div>
                        <div class="product_content">
                            <div class="product_info d-flex flex-row align-items-start justify-content-start">
                                <div>
                                    <div>
                                        <div class="product_name"><a href=""><?= $brg['nama_brg'] ?></a></div>
                                        <div class="product_category">Kategori <a href="category.html"><?= ambil_nama_kategori($brg['kd_kategori']) ?></a></div>
                                    </div>
                                </div>
                                <div class="ml-auto text-right">
                                    <div class="product_price text-right">Rp.<span><?= formatHarga($brg['harga']) ?></span></div>
                                </div>
                            </div>
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
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>

        </div>
        <div class="row page_nav_row">
            <div class="col">

                <?= $this->pagination->create_links(); ?>
            </div>
        </div>
    </div>
</div>