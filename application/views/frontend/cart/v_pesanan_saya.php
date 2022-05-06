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
                    <div class="brands_products">
                    </div>
                    <div class="price-range">
                    </div>
                    <div class="shipping text-center">
                        <img src="<?= base_url() ?>eshopper/images/home/shipping.jpg" alt="" />
                    </div>
                    <br>
                    <br>
                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="category-tab">
                    <!--category-tab-->
                    <div class="col-sm-12">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tshirt" data-toggle="tab">Pembayaran</a></li>
                            <li><a href="#blazers" data-toggle="tab">Proses</a></li>
                            <li><a href="#sunglass" data-toggle="tab">Pengiriman</a></li>
                            <li><a href="#kids" data-toggle="tab">Selesai</a></li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade active in" id="tshirt">
                            <div class="col-sm-12">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <table class="table">
                                                <thead class="thead-primary">
                                                    <tr>
                                                        <th>No Order</th>
                                                        <th>Tanggal Order</th>
                                                        <th>Expedisi</th>
                                                        <th>Biaya Ongkir</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($pesanan as $key => $value) { ?>
                                                        <tr>
                                                            <td><?= $value->no_order ?></td>
                                                            <td><?= $value->tgl_order ?></td>
                                                            <td><?= $value->expedisi ?><br><?= $value->paket ?><br><?= $value->estimasi ?></td>
                                                            <td class="text-warning">Rp. <?= number_format($value->ongkir, 0) ?><i class="mdi mdi-arrow-down"></i></td>
                                                            <td><b>Rp. <?= number_format($value->total_bayar, 0) ?></b><br>
                                                                <?php if ($value->status_bayar == 0) { ?>
                                                                    <span class="badge badge-danger">Belum bayar</span>
                                                                <?php } else { ?>
                                                                    <span class="badge badge-success">Sudah bayar</span><br>
                                                                    <span class="badge badge-primary">Menunggu Verifikasi</span>
                                                                <?php } ?>
                                                            </td>
                                                            <td></td>
                                                            <td>
                                                                <?php if ($value->status_bayar == 0) { ?>
                                                                    <a href="<?= base_url('pesanan_saya/bayar/' . $value->id_transaksi) ?>" class="btn btn-sm btn-primary">Bayar</a>
                                                                    <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#dibatalkan<?= $value->id_transaksi ?>">Batalkan</button>
                                                                <?php } ?>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="blazers">
                            <div class="col-sm-12">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <table class="table">
                                                <thead class="thead-primary">
                                                    <tr>
                                                        <th>No Order</th>
                                                        <th>Tanggal Order</th>
                                                        <th>Expedisi</th>
                                                        <th>Biaya Ongkir</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($diproses as $key => $value) { ?>
                                                        <tr>
                                                            <td><a href="<?= base_url('transaksi/detail/' . $value->no_order) ?>"><?= $value->no_order ?></a></td>
                                                            <td><?= $value->tgl_order ?></td>
                                                            <td><?= $value->expedisi ?><br><?= $value->paket ?><br><?= $value->estimasi ?></td>
                                                            <td class="text-warning">Rp. <?= number_format($value->ongkir, 0) ?><i class="mdi mdi-arrow-down"></i></td>
                                                            <td>Rp. <?= number_format($value->total_bayar, 0) ?><br>
                                                                <label class="badge badge-info">Diproses</label>
                                                            </td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="sunglass">
                            <div class="col-sm-12">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <table class="table">
                                                <thead class="thead-primary">
                                                    <tr>
                                                        <th>No Order</th>
                                                        <th>Tanggal Order</th>
                                                        <th>Expedisi</th>
                                                        <th>Biaya Ongkir</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($dikirim as $key => $value) { ?>
                                                        <tr>
                                                            <td><?= $value->no_order ?></td>
                                                            <td><?= $value->tgl_order ?></td>
                                                            <td><?= $value->expedisi ?><br><?= $value->paket ?><br><?= $value->estimasi ?></td>
                                                            <td class="text-warning">Rp. <?= number_format($value->ongkir, 0) ?><i class="mdi mdi-arrow-down"></i></td>
                                                            <td>Rp. <?= number_format($value->total_bayar, 0) ?>
                                                                <label class="badge badge-primary">Dikirim</label>
                                                            </td>
                                                            <td class="text-info"><?= $value->no_resi ?></td>
                                                            <td><button class="btn btn-sm btn-flat btn-success" data-toggle="modal" data-target="#diterima<?= $value->id_transaksi ?>">Diterima</button></td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="kids">
                            <div class="col-sm-12">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <table class="table">
                                                <thead class="thead-primary">
                                                    <tr>
                                                        <th>No Order</th>
                                                        <th>Tanggal Order</th>
                                                        <th>Expedisi</th>
                                                        <th>Biaya Ongkir</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($selesai as $key => $value) { ?>
                                                        <tr>
                                                            <td><?= $value->no_order ?></td>
                                                            <td><?= $value->tgl_order ?></td>
                                                            <td><?= $value->expedisi ?><br><?= $value->paket ?><br><?= $value->estimasi ?></td>
                                                            <td class="text-warning">Rp. <?= number_format($value->ongkir, 0) ?><i class="mdi mdi-arrow-down"></i></td>
                                                            <td>Rp. <?= number_format($value->total_bayar, 0) ?>
                                                                <label class="badge badge-success">Selesai</label>
                                                            </td>
                                                            <td class="text-info"><?= $value->no_resi ?></td>
                                                            <td></td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
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
</section>