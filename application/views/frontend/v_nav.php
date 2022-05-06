<div class="header-middle">
    <!--header-middle-->
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="logo pull-left">
                    <a href="index.html"><img src="<?= base_url() ?>eshopper/images/home/logo.png" alt="" /></a>
                </div>
                <div class="btn-group pull-right">
                    <div class="btn-group">
                    </div>

                    <div class="btn-group">
                    </div>
                </div>
            </div>
            <?php $keranjang = $this->cart->contents();
            $jml_item = 0;
            foreach ($keranjang as $key => $value) {
                $jml_item = $jml_item + $value['qty'];
            } ?>
            <div class="col-sm-8">
                <div class="shop-menu pull-right">
                    <ul class="nav navbar-nav">
                        <?php if ($this->session->userdata('email') == "") { ?>
                            <li><a href="#"><i class="fa fa-user"></i> Account</a></li>
                        <?php } else { ?>
                            <li><a href="#"><i class="fa fa-user"></i> <?= $this->session->userdata('username'); ?></a></li>
                            <li><a href="<?= base_url('pesanan_saya') ?>"><i class="fa fa-magnet"></i> Pesanan</a></li>
                        <?php } ?>

                        <li><a href="<?= base_url('belanja') ?>"><i class="fa fa-shopping-cart"></i> Cart[<?= $jml_item ?>]</a></li>
                        <?php if ($this->session->userdata('email') == "") { ?>
                            <li><a href="<?= base_url('pelanggan/login') ?>"><i class="fa fa-lock"></i> Login</a></li>
                        <?php } else { ?>
                            <li><a href="<?= base_url('pelanggan/logout') ?>"><i class="fa fa-lock"></i> Logout</a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/header-middle-->

<div class="header-bottom">
    <!--header-bottom-->
    <div class="container">
        <div class="row">
            <div class="col-sm-9">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="mainmenu pull-left">
                    <ul class="nav navbar-nav collapse navbar-collapse">
                        <li><a href="<?= base_url() ?>" class="active">Home</a></li>
                        <li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                            <ul role="menu" class="sub-menu">
                                <li><a href="shop.html">Products</a></li>
                                <li><a href="product-details.html">Product Details</a></li>
                                <li><a href="checkout.html">Checkout</a></li>
                                <li><a href="cart.html">Cart</a></li>
                                <li><a href="login.html">Login</a></li>
                            </ul>
                        </li>
                        <li class="dropdown"><a href="#">Blog<i class="fa fa-angle-down"></i></a>
                            <ul role="menu" class="sub-menu">
                                <li><a href="blog.html">Blog List</a></li>
                                <li><a href="blog-single.html">Blog Single</a></li>
                            </ul>
                        </li>
                        <li><a href="404.html">404</a></li>
                        <li><a href="contact-us.html">Contact</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="search_box pull-right">
                    <input type="text" placeholder="Search" />
                </div>
            </div>
        </div>
    </div>
</div>
<!--/header-bottom-->
</header>
<!--/header-->