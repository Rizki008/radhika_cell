<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Pembayaran</li>
            </ol>
        </div>
        <!--/breadcrums-->

        <div class="step-one">
            <h2 class="heading order-total">Rp. <?= number_format($pesanan->total_bayar, 0) ?>,-</h2>
        </div>
        <div class="checkout-options">
            <h3>Upload Bukti Bayar</h3>
            <p>Silahkan Lakukan pembayaran ke no rekening di bawah ini.</p>
            <?php foreach ($rekening as $key => $value) { ?>
                <ul class="nav">
                    <li>
                        <label>
                            <h5><?= $value->nama_bank ?></h5>
                        </label>
                    </li>
                    <li>
                        <label>
                            <h5><?= $value->no_rek ?></h5>
                        </label>
                    </li>
                    <li>
                        <h5><?= $value->atas_nama ?></h5>
                    </li>
                </ul>
            <?php } ?>
        </div>
        <!--/checkout-options-->

        <div class="register-req">
            <p>Silah Upload Bukti Pembayaran Dibawah Ini</p>
        </div>
        <!--/register-req-->

        <div class="shopper-informations">
            <div class="row">
                <div class="col-sm-3">
                    <div class="shopper-info">
                        <p>Upload Bukti Bayar</p>
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
                        echo form_open_multipart('pesanan_saya/bayar/' . $pesanan->id_transaksi) ?>
                        <input type="text" name="atas_nama" placeholder="Atas Nama">
                        <input type="text" name="nama_bank" placeholder="Nama Bank">
                        <input type="number" name="jml_bayar" placeholder="10000">
                        <input type="file" name="bukti_bayar" placeholder="upload">
                        <a class="btn btn-primary" href="<?= base_url('pesanan') ?>">Kembali</a>
                        <button type="submit" class="btn btn-primary" href="">Bayar</button>
                        <?php echo form_close() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<br>
<br>
<br>
<!--/#cart_items-->