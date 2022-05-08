<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | E-Shopper</title>
    <link href="<?= base_url() ?>eshopper/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>eshopper/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>eshopper/css/prettyPhoto.css" rel="stylesheet">
    <link href="<?= base_url() ?>eshopper/css/price-range.css" rel="stylesheet">
    <link href="<?= base_url() ?>eshopper/css/animate.css" rel="stylesheet">
    <link href="<?= base_url() ?>eshopper/css/main.css" rel="stylesheet">
    <link href="<?= base_url() ?>eshopper/css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="<?= base_url() ?>eshopper/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?= base_url() ?>eshopper/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?= base_url() ?>eshopper/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?= base_url() ?>eshopper/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?= base_url() ?>eshopper/images/ico/apple-touch-icon-57-precomposed.png">
</head>
<!--/head-->

<body>
    <header id="header">
        <!--header-->
        <div class="header_top">
            <!--header_top-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="contactinfo">
                            <ul class="nav nav-pills">
                                <li><a href="#"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i> info@domain.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="social-icons pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/header_top-->

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

    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Check out</li>
                </ol>
            </div>
            <!--/breadcrums-->

            <div class="register-req">
                <p>Please use Register And Checkout to easily get access to your order history, or use Checkout as Guest</p>
            </div>
            <!--/register-req-->
            <?php
            echo validation_errors(
                ' <div class="alert alert-danger alert-dismissible" role="alert">',
                '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>'
            );
            if (isset($error_upload)) {
                echo ' <div class="alert alert-danger alert-dismissible" role="alert">
				' . $error_upload . '
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>';
            }
            echo form_open('belanja/cekout');
            $no_order = date('Ymd') . strtoupper(random_string('alnum', 8)); ?>
            <div class="shopper-informations">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="shopper-info">
                            <p>Shopper Information</p>
                            <!-- <form> -->
                            <input type="text" name="nama_pelanggan" placeholder="Nama Penerima" class="form-control"><br>
                            <input type="number" name="no_tlpn" placeholder="No Telphone" class="form-control"><br>
                            <input type="text" name="kode_pos" placeholder="Kode Post" class="form-control"><br>
                            <input type="text" name="alamat" placeholder="Alamat lengkap" class="form-control">
                            <!-- </form> -->
                            <a class="btn btn-primary" href="<?= base_url('belanja') ?>">Back</a>
                            <button type="submit" class="btn btn-default update">Cekout</button>
                        </div>
                    </div>
                    <div class="col-sm-5 clearfix">
                        <div class="bill-to">
                            <p>Bill To</p>
                            <div class="form-one">
                                <select name="provinsi" class="form-control">
                                </select><br>
                                <select name="kota" class="form-control">
                                </select><br>
                                <select name="expedisi" class="form-control">
                                </select><br>
                                <select name="paket" class="form-control">
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="order-message">
                            <?php $i = 1; ?>
                            <?php $total_berat = 0;
                            $total = 0;
                            foreach ($this->cart->contents() as $items) {
                                $produk = $this->m_home->detail_produk($items['id']);
                                $berat = $items['qty'] * $produk->berat;
                                $total_berat =  $total_berat + $berat;
                            ?>
                                <?php $i++; ?>
                            <?php } ?>
                            <div class="total_area">
                                <ul>
                                    <li>Cart Sub Total <span>Rp. <?= number_format($this->cart->total(), 0) ?></span></li>
                                    <li>Total Berat <span><?= $berat ?> GR Gr</span></li>
                                    <li>Quantity <span><?php echo $items['qty'] ?></span></li>
                                    <li>Ongkir <span id="ongkir"></span></li>
                                    <li>Total <span class="order-total" id="total_bayar"></span></li>
                                </ul>
                            </div>
                            <input name="no_order" value="<?= $no_order ?>" hidden>
                            <input name="estimasi" hidden>
                            <input name="ongkir" hidden>
                            <input name="berat" value="<?= $total_berat ?>" hidden>
                            <input name="grand_total" value="<?= $this->cart->total() ?>" hidden>
                            <input name="total_bayar" hidden>
                            <?php
                            $i = 1;
                            foreach ($this->cart->contents() as $items) {
                                echo form_hidden('qty' . $i++, $items['qty']);
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="review-payment">
                <h2>Review & Payment</h2>
            </div>
            <?php echo form_close() ?>
            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                            <td class="image">Item</td>
                            <td class="description"></td>
                            <td class="price">Price</td>
                            <td class="quantity">Quantity</td>
                            <td class="total">Total</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php $total_berat = 0;
                        $total = 0;
                        foreach ($this->cart->contents() as $items) {
                            $produk = $this->m_home->detail_produk($items['id']);
                            $berat = $items['qty'] * $produk->berat;
                            $total_berat = $total_berat + $berat;
                        ?>
                            <tr>
                                <td class="cart_product">
                                    <a href=""><img src="<?= base_url('assets/produk/' . $produk->images) ?>" alt="" width="150px"></a>
                                </td>
                                <td class="cart_description">
                                    <h4><a href=""><?php echo $items['name']; ?></a></h4>
                                    <p>Web ID: 1089772</p>
                                </td>
                                <td class="cart_price">
                                    <p>Rp. <?= number_format($items['price']); ?></p>
                                </td>
                                <td class="cart_quantity">
                                    <div class="cart_quantity_button">
                                        <?php echo form_input(
                                            array(
                                                'name' => $i . '[qty]',
                                                'value' => $items['qty'],
                                                'maxlength' => '3',
                                                'min' => '0',
                                                'max' => 'stock',
                                                'size' => '5',
                                                'type' => 'number',
                                                'class' => 'form-control'
                                            )
                                        ); ?>
                                    </div>
                                </td>
                                <td class="cart_total">
                                    <p class="cart_total_price">Rp. <?= number_format($items['subtotal']) ?></p>
                                </td>
                                <!-- <td class="cart_delete">
                                    <a class="cart_quantity_delete" href="<?= base_url('belanja/delete/') . $items['rowid'] ?>"><i class="fa fa-times"></i></a>
                                </td> -->
                            </tr>
                            <?php $i++; ?>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="payment-options">
            </div>
        </div>
    </section>
    <!--/#cart_items-->


    <footer id="footer">
        <!--Footer-->
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="companyinfo">
                            <h2><span>e</span>-shopper</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,sed do eiusmod tempor</p>
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="col-sm-3">
                            <div class="video-gallery text-center">
                                <a href="#">
                                    <div class="iframe-img">
                                        <img src="<?= base_url() ?>eshopper/images/home/iframe1.png" alt="" />
                                    </div>
                                    <div class="overlay-icon">
                                        <i class="fa fa-play-circle-o"></i>
                                    </div>
                                </a>
                                <p>Circle of Hands</p>
                                <h2>24 DEC 2014</h2>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="video-gallery text-center">
                                <a href="#">
                                    <div class="iframe-img">
                                        <img src="<?= base_url() ?>eshopper/images/home/iframe2.png" alt="" />
                                    </div>
                                    <div class="overlay-icon">
                                        <i class="fa fa-play-circle-o"></i>
                                    </div>
                                </a>
                                <p>Circle of Hands</p>
                                <h2>24 DEC 2014</h2>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="video-gallery text-center">
                                <a href="#">
                                    <div class="iframe-img">
                                        <img src="<?= base_url() ?>eshopper/images/home/iframe3.png" alt="" />
                                    </div>
                                    <div class="overlay-icon">
                                        <i class="fa fa-play-circle-o"></i>
                                    </div>
                                </a>
                                <p>Circle of Hands</p>
                                <h2>24 DEC 2014</h2>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="video-gallery text-center">
                                <a href="#">
                                    <div class="iframe-img">
                                        <img src="<?= base_url() ?>eshopper/images/home/iframe4.png" alt="" />
                                    </div>
                                    <div class="overlay-icon">
                                        <i class="fa fa-play-circle-o"></i>
                                    </div>
                                </a>
                                <p>Circle of Hands</p>
                                <h2>24 DEC 2014</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="address">
                            <img src="<?= base_url() ?>eshopper/images/home/map.png" alt="" />
                            <p>505 S Atlantic Ave Virginia Beach, VA(Virginia)</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-widget">
            <div class="container">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>Service</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Online Help</a></li>
                                <li><a href="#">Contact Us</a></li>
                                <li><a href="#">Order Status</a></li>
                                <li><a href="#">Change Location</a></li>
                                <li><a href="#">FAQ’s</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>Quock Shop</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">T-Shirt</a></li>
                                <li><a href="#">Mens</a></li>
                                <li><a href="#">Womens</a></li>
                                <li><a href="#">Gift Cards</a></li>
                                <li><a href="#">Shoes</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>Policies</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Terms of Use</a></li>
                                <li><a href="#">Privecy Policy</a></li>
                                <li><a href="#">Refund Policy</a></li>
                                <li><a href="#">Billing System</a></li>
                                <li><a href="#">Ticket System</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>About Shopper</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Company Information</a></li>
                                <li><a href="#">Careers</a></li>
                                <li><a href="#">Store Location</a></li>
                                <li><a href="#">Affillate Program</a></li>
                                <li><a href="#">Copyright</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3 col-sm-offset-1">
                        <div class="single-widget">
                            <h2>About Shopper</h2>
                            <form action="#" class="searchform">
                                <input type="text" placeholder="Your email address" />
                                <button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
                                <p>Get the most recent updates from <br />our site and be updated your self...</p>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <p class="pull-left">Copyright © 2013 E-SHOPPER Inc. All rights reserved.</p>
                    <p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p>
                </div>
            </div>
        </div>

    </footer>
    <!--/Footer-->
    <script src="<?= base_url() ?>eshopper/js/jquery.js"></script>
    <script src="<?= base_url() ?>eshopper/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>eshopper/js/jquery.scrollUp.min.js"></script>
    <script src="<?= base_url() ?>eshopper/js/price-range.js"></script>
    <script src="<?= base_url() ?>eshopper/js/jquery.prettyPhoto.js"></script>
    <script src="<?= base_url() ?>eshopper/js/main.js"></script>
    <script>
        $(document).ready(function() {
            $.ajax({
                type: "POST",
                url: "<?= base_url('lokasi/provinsi') ?>",
                success: function(hasil_provinsi) {
                    // console.log(hasil_provinsi);
                    $("select[name=provinsi]").html(hasil_provinsi);
                }
            });
            $("select[name=provinsi]").on("change", function() {
                var id_provinsi_terpilih = $("option:selected", this).attr("id_provinsi");

                $.ajax({
                    type: "POST",
                    url: "<?= base_url('lokasi/kota') ?>",
                    data: 'id_provinsi=' + id_provinsi_terpilih,
                    success: function(hasil_kota) {
                        // console.log(hasil_kota);
                        $("select[name=kota]").html(hasil_kota);
                    }
                });
            });

            $("select[name=kota]").on("change", function() {
                $.ajax({
                    type: "POST",
                    url: "<?= base_url('lokasi/expedisi') ?>",
                    success: function(hasil_expedisi) {
                        $("select[name=expedisi]").html(hasil_expedisi);
                    }
                });
            });

            $("select[name=expedisi]").on("change", function() {
                var expedisi_terpilih = $("select[name = expedisi]").val()
                var id_kota_tujuan_terpilih = $("option:selected", "select[name = kota]").attr('id_kota');
                var tot_berat = <?= $total_berat ?>;

                $.ajax({
                    type: "POST",
                    url: "<?= base_url('lokasi/paket') ?>",
                    data: 'expedisi=' + expedisi_terpilih + '&id_kota=' + id_kota_tujuan_terpilih + '&berat=' + tot_berat,
                    success: function(hasil_paket) {
                        console.log(hasil_paket);
                        $("select[name=paket]").html(hasil_paket);
                    }
                });
            });

            $("select[name=paket]").on("change", function() {
                var dataongkir = $("option:selected", this).attr('ongkir');
                var reverse = dataongkir.toString().split('').reverse().join(''),
                    ribuan_ongkir = reverse.match(/\d{1,3}/g);
                ribuan_ongkir = ribuan_ongkir.join(',').split('').reverse().join('');
                $("#ongkir").html("Rp. " + ribuan_ongkir);

                var data_total_bayar = parseInt(dataongkir) + parseInt(<?= $this->cart->total() ?>);
                var reverse2 = data_total_bayar.toString().split('').reverse().join(''),
                    ribuan_bayar = reverse2.match(/\d{1,3}/g);
                ribuan_bayar = ribuan_bayar.join(',').split('').reverse().join('');
                $("#total_bayar").html("Rp. " + ribuan_bayar);

                var estimasi = $("option:selected", this).attr('estimasi');
                $("input[name=estimasi]").val(estimasi);
                $("input[name=ongkir]").val(dataongkir);
                $("input[name=total_bayar]").val(data_total_bayar);
            });
        });
    </script>
</body>

</html>