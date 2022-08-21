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
                            <a href="<?= base_url('pesanan') ?>" class="btn btn-primary">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="invoice-wrap">
                <div class="invoice-box">
                    <div class="invoice-header">
                        <div class="logo text-center">
                            <img src="vendors/images/deskapp-logo.png" alt="">
                        </div>
                    </div>
                    <h4 class="text-center mb-30 weight-600">INVOICE</h4>
                    <div class="row pb-30">
                        <div class="col-md-6">
                            <?php
                            foreach ($pesanan_detail as $key => $value) { ?>
                            <?php } ?>
                            <h5 class="mb-15">Client Name</h5>
                            <p class="font-14 mb-5">Date Issued: <strong class="weight-600"><?= $value->tgl_order ?></strong></p>
                            <p class="font-14 mb-5">Invoice No: <strong class="weight-600"><?= $value->no_order ?></strong></p>
                        </div>
                        <div class="col-md-6">
                            <div class="text-right">
                                <p class="font-14 mb-5"><?= $value->nama_pelanggan ?> </strong></p>
                                <p class="font-14 mb-5"><?= $value->kota ?></p>
                                <p class="font-14 mb-5"><?= $value->alamat ?></p>
                                <p class="font-14 mb-5"><?= $value->kode_pos ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="invoice-desc pb-30">
                        <div class="invoice-desc-head clearfix">
                            <div class="invoice-sub">Nama Produk</div>
                            <div class="invoice-rate">Harga Satuan</div>
                            <div class="invoice-hours">Qty</div>
                            <div class="invoice-subtotal">Subtotal</div>
                        </div>
                        <div class="invoice-desc-body">
                            <?php
                            foreach ($pesanan_detail as $key => $value) { ?>
                                <ul>
                                    <li class="clearfix">
                                        <div class="invoice-sub"><?= $value->nama_produk ?></div>
                                        <div class="invoice-rate">Rp. <?= number_format($value->harga, 0) ?></div>
                                        <div class="invoice-hours"><?= $value->qty ?></div>
                                        <div class="invoice-subtotal"><span class="weight-600">Rp. <?= number_format($value->qty * $value->harga, 0) ?></span></div>
                                    </li>
                                </ul>
                            <?php } ?>
                        </div>
                        <div class="invoice-desc-footer">
                            <div class="invoice-desc-head clearfix">
                                <div class="invoice-sub">Bank Info</div>
                                <div class="invoice-rate">Tanggal Bayar</div>
                                <div class="invoice-subtotal">Total Bayar</div>
                            </div>
                            <?php foreach ($pesanan as $key => $value) { ?>
                                <div class="invoice-desc-body">
                                    <ul>
                                        <li class="clearfix">
                                            <div class="invoice-sub">
                                                <p class="font-14 mb-5">Name : <strong class="weight-600"><?= $value->atas_nama ?></strong></p>
                                                <p class="font-14 mb-5">Account No: <strong class="weight-600"><?= $value->no_rek ?></strong></p>
                                                <p class="font-14 mb-5">Bank: <strong class="weight-600"><?= $value->nama_bank ?></strong></p>
                                            </div>
                                            <div class="invoice-rate font-20 weight-600"><?= $value->tgl_order ?></div>
                                            <div class="invoice-subtotal"><span class="weight-600 font-20 text-danger">Rp. <?= number_format($value->jml_bayar, 0) ?></span></div>
                                        </li>
                                    </ul>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <h4 class="text-center pb-20">Thank You!!</h4>
                </div>
            </div>
        </div>
        <br>
        <br>
        <br>