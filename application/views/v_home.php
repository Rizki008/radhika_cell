<section id="slider">
    <!--slider-->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#slider-carousel" data-slide-to="1"></li>
                        <li data-target="#slider-carousel" data-slide-to="2"></li>
                    </ol>

                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="col-sm-6">
                                <h1><span>E</span>-SHOPPER</h1>
                                <h2>Free E-Commerce Template</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                <button type="button" class="btn btn-default get">Get it now</button>
                            </div>
                            <div class="col-sm-6">
                                <img src="images/home/girl1.jpg" class="girl img-responsive" alt="" />
                                <img src="images/home/pricing.png" class="pricing" alt="" />
                            </div>
                        </div>
                        <div class="item">
                            <div class="col-sm-6">
                                <h1><span>E</span>-SHOPPER</h1>
                                <h2>100% Responsive Design</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                <button type="button" class="btn btn-default get">Get it now</button>
                            </div>
                            <div class="col-sm-6">
                                <img src="images/home/girl2.jpg" class="girl img-responsive" alt="" />
                                <img src="images/home/pricing.png" class="pricing" alt="" />
                            </div>
                        </div>

                        <div class="item">
                            <div class="col-sm-6">
                                <h1><span>E</span>-SHOPPER</h1>
                                <h2>Free Ecommerce Template</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                <button type="button" class="btn btn-default get">Get it now</button>
                            </div>
                            <div class="col-sm-6">
                                <img src="images/home/girl3.jpg" class="girl img-responsive" alt="" />
                                <img src="images/home/pricing.png" class="pricing" alt="" />
                            </div>
                        </div>

                    </div>

                    <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>
</section>
<!--/slider-->

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Category</h2>
                    <div class="panel-group category-products" id="accordian">
                        <!--category-productsr-->
                        <?php $kategori = $this->m_home->kategori_produk(); ?>
                        <div class="panel panel-default">
                            <?php foreach ($kategori as $key => $value) { ?>
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a href="<?= base_url('/home/kategori/' . $value->id_kategori) ?>"><?= $value->nama_kategori ?></a></h4>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <!--/category-products-->

                    <div class="brands_products">
                    </div>
                    <!--/brands_products-->

                    <div class="shipping text-center">
                        <!--shipping-->
                        <img src="<?= base_url() ?>eshopper/images/home/shipping.jpg" alt="" />
                    </div>
                    <!--/shipping-->

                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="features_items">
                    <!--features_items-->
                    <h2 class="title text-center">Features Items</h2>
                    <?php if (count($produk) > 0) : ?>
                        <?php foreach ($produk as $value) : ?>
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <?php echo form_open('belanja/add');
                                    echo form_hidden('id', $value->id_produk);
                                    echo form_hidden('qty', 1);
                                    echo form_hidden('price', $value->harga - $value->harga_promo);
                                    echo form_hidden('name', $value->nama_produk);
                                    echo form_hidden('redirect_page', str_replace('index.php/', '', current_url())); ?>
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="<?= base_url('assets/produk/' . $value->images) ?>" alt="" />
                                            <h2>Rp. <?= number_format($value->harga) ?></h2>
                                            <p><?= $value->nama_produk ?></p>
                                            <button href="#" class="btn btn-default add-to-cart" type="submit" data-name="<?= $value->nama_produk ?>" data-price="<?= ($value->harga_promo > 0) ? ($value->harga - $value->harga_promo) : $value->harga ?>" data-id="<?= $value->id_produk ?>"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                        </div>
                                        <div class="product-overlay">
                                            <div class="overlay-content">
                                                <h2>Rp. <?= number_format($value->harga, 0) ?></h2>
                                                <p><?= $value->nama_produk ?></p>
                                                <button href="#" class="btn btn-default add-to-cart" type="submit" data-name="<?= $value->nama_produk ?>" data-price="<?= ($value->harga_promo > 0) ? ($value->harga - $value->harga_promo) : $value->harga ?>" data-id="<?= $value->id_produk ?>"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="choose">
                                        <ul class="nav nav-pills nav-justified">
                                            <li><a href="<?= base_url('/home/detail_produk/' . $value->id_produk) ?>"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                        </ul>
                                    </div>
                                    <?php echo form_close(); ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else : ?>
                    <?php endif; ?>
                </div>
                <!--features_items-->

                <div class="category-tab">
                    <!--category-tab-->
                    <div class="col-sm-12">
                        <ul class="nav nav-tabs">
                            <li><a href="#">Diskon Produk</a></li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade active in" id="tshirt">
                            <?php foreach ($diskon as $key => $value) { ?>
                                <div class="col-sm-3">
                                    <?php echo form_open('belanja/add');
                                    echo form_hidden('id', $value->id_produk);
                                    echo form_hidden('qty', 1);
                                    echo form_hidden('price', $value->harga - $value->harga_promo);
                                    echo form_hidden('name', $value->nama_produk);
                                    echo form_hidden('redirect_page', str_replace('index.php/', '', current_url())); ?>
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="<?= base_url('assets/produk/' . $value->images) ?>" alt="" />
                                                <h2>Rp. <?= number_format($value->harga - $value->harga_promo, 0) ?></h2>
                                                <p><?= $value->nama_produk ?></p>
                                                <button href="#" class="btn btn-default add-to-cart" type="submit" data-name="<?= $value->nama_produk ?>" data-price="<?= ($value->harga_promo > 0) ? ($value->harga - $value->harga_promo) : $value->harga ?>" data-id="<?= $value->id_produk ?>"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                            </div>
                                        </div>
                                    </div>
                                    <?php echo form_close() ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <!--/category-tab-->

                <div class="recommended_items">
                    <!--recommended_items-->
                    <h2 class="title text-center">recommended items</h2>

                    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="item active">
                                <div class="col-sm-4">
                                    <?php if (count($best_produk) > 0) : ?>
                                        <?php foreach ($best_produk as $key => $value) { ?>
                                            <div class="product-image-wrapper">
                                                <?php echo form_open('belanja/add');
                                                echo form_hidden('id', $value->id_produk);
                                                echo form_hidden('qty', 1);
                                                echo form_hidden('price', $value->harga - $value->harga_promo);
                                                echo form_hidden('name', $value->nama_produk);
                                                echo form_hidden('redirect_page', str_replace('index.php/', '', current_url())); ?>
                                                <div class="single-products">
                                                    <div class="productinfo text-center">
                                                        <img src="<?= base_url('assets/produk/' . $value->images) ?>" alt="" />
                                                        <h2><?= $value->harga - $value->harga_promo ?></h2>
                                                        <p><?= $value->nama_produk ?></p>
                                                        <button href="#" class="btn btn-default add-to-cart" type="submit" data-name="<?= $value->nama_produk ?>" data-price="<?= ($value->harga_promo > 0) ? ($value->harga - $value->harga_promo) : $value->harga ?>" data-id="<?= $value->id_produk ?>"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                                    </div>
                                                </div>
                                                <?php echo form_close() ?>
                                            </div>
                                        <?php } ?>
                                    <?php else : ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                </div>
                <!--/recommended_items-->

            </div>
        </div>
    </div>
</section>