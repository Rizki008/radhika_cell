<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4><?= $title ?></h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-md-6 col-sm-12 text-right">
                        <div class="dropdown">
                            <a class="btn btn-primary" href="<?= base_url('transaksi_langsung') ?>" role="button">
                                Kembali
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="invoice-wrap">
                <div class="invoice-box">
                    <div class="invoice-header">
                        <div class="logo text-center">
                            <img src="<?= base_url() ?>deskapp-master/vendors/images/deskapp-logo.png" alt="">
                        </div>
                    </div>
                    <h4 class="text-center mb-30 weight-600">INVOICE</h4>
                    <div class="row pb-30">
                        <div class="col-md-6">
                            <?php
                            foreach ($detail['pesanan'] as $key => $value) { ?>
                            <?php } ?>
                            <h5 class="mb-15">Nama Petugas</h5>
                            <p class="font-14 mb-5">Date Issued: <strong class="weight-600"><?= $value->tgl_order ?></strong></p>
                            <p class="font-14 mb-5">Invoice No: <strong class="weight-600"><?= $value->no_order ?></strong></p>
                        </div>
                        <div class="col-md-6">
                            <div class="text-right">
                                <p class="font-14 mb-5">Admin </strong></p>
                                <!-- <p class="font-14 mb-5">Your Address</p>
                                <p class="font-14 mb-5">City</p>
                                <p class="font-14 mb-5">Postcode</p> -->
                            </div>
                        </div>
                    </div>
                    <div class="invoice-desc pb-30">
                        <div class="invoice-desc-head clearfix">
                            <div class="invoice-sub">Nama Produk</div>
                            <div class="invoice-rate">Harga</div>
                            <div class="invoice-hours">Diskon</div>
                            <div class="invoice-subtotal">Subtotal</div>
                        </div>
                        <div class="invoice-desc-body">
                            <?php
                            foreach ($detail['pesanan'] as $key => $value) {
                            ?>
                                <ul>
                                    <li class="clearfix">
                                        <div class="invoice-sub"><?= $value->nama_produk ?></div>
                                        <div class="invoice-rate">Rp. <?= number_format($value->harga, 0)  ?></div>
                                        <div class="invoice-hours">Rp. <?= number_format($value->harga_promo) ?></div>
                                        <div class="invoice-subtotal"><span class="weight-600">Rp. <?= number_format($value->total_bayar)  ?></span></div>
                                    </li>
                                </ul>
                            <?php
                            }
                            ?>
                        </div>
                        <!-- <div class="invoice-desc-footer">
                            <div class="invoice-desc-head clearfix">
                                <div class="invoice-sub">Bank Info</div>
                                <div class="invoice-rate">Due By</div>
                                <div class="invoice-subtotal">Total Due</div>
                            </div>
                            <div class="invoice-desc-body">
                                <ul>
                                    <li class="clearfix">
                                        <div class="invoice-sub">
                                            <p class="font-14 mb-5">Account No: <strong class="weight-600">123 456 789</strong></p>
                                            <p class="font-14 mb-5">Code: <strong class="weight-600">4556</strong></p>
                                        </div>
                                        <div class="invoice-rate font-20 weight-600">10 Jan 2018</div>
                                        <div class="invoice-subtotal"><span class="weight-600 font-24 text-danger">$8000</span></div>
                                    </li>
                                </ul>
                            </div>
                        </div> -->
                    </div>
                    <h4 class="text-center pb-20">Thank You!!</h4>
                </div>
            </div>
        </div>