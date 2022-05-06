<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="title">
                            <h4>Tabs</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">UI Tabs</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 mb-30">
                    <div class="pd-20 card-box">
                        <h5 class="h4 text-blue mb-20">Icons vertical Nav Pills Tab</h5>
                        <div class="tab">
                            <div class="row clearfix">
                                <div class="col-md-3 col-sm-12">
                                    <ul class="nav flex-column nav-pills vtabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#home7" role="tab" aria-selected="true"><i class="fa fa-shopping-bag"></i></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#profile7" role="tab" aria-selected="false"><i class="icon-copy fa fa-hourglass-2" aria-hidden="true"></i></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#contact7" role="tab" aria-selected="false"><i class="icon-copy fa fa-paper-plane" aria-hidden="true"></i></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#send7" role="tab" aria-selected="false"><i class="icon-copy fa fa-tasks" aria-hidden="true"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-9 col-sm-12">
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="home7" role="tabpanel">
                                            <div class="pd-20">
                                                <table class="table">
                                                    <tr>
                                                        <th>Nama Pelanggan</th>
                                                        <th>No Order</th>
                                                        <th>Tanggal Order</th>
                                                        <th>Expedisi</th>
                                                        <th>Biaya Pengiriman</th>
                                                        <th>Total Bayar</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    <?php foreach ($pesanan as $key => $value) { ?>
                                                        <tr>
                                                            <td><?= $value->nama_pelanggan ?></td>
                                                            <td>
                                                                <?= $value->no_order ?></a>
                                                            </td>
                                                            <td><?= $value->tgl_order ?></td>
                                                            <td><?= $value->expedisi ?><br><?= $value->paket ?><br><?= $value->estimasi ?></td>
                                                            <td><b>Rp. <?= number_format($value->ongkir, 0) ?></b><br>
                                                            <td><b>Rp. <?= number_format($value->total_bayar, 0) ?></b><br>
                                                                <?php if ($value->status_bayar == 0) { ?>
                                                                    <span class="badge badge-warning">Belum bayar</span>
                                                                <?php } else { ?>
                                                                    <span class="badge badge-success">Sudah bayar</span><br>
                                                                    <span class="badge badge-primary">Menunggu Verifikasi</span>
                                                                <?php } ?>
                                                            </td>
                                                            <td>
                                                                <?php if ($value->status_bayar == 1) { ?>
                                                                    <a href="<?= base_url('pesanan/detail/' . $value->no_order) ?>" class=" btn btn-sm btn-success btn-flat">Detail Bayar</a>
                                                                    <a href=" <?= base_url('pesanan/proses/' . $value->id_transaksi) ?>" class="btn btn-sm btn-flat btn-primary">Verifikasi</a>
                                                                <?php } ?>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="profile7" role="tabpanel">
                                            <div class="pd-20">
                                                <table class="table">
                                                    <tr>
                                                        <th>Nama Pelanggan</th>
                                                        <th>No Order</th>
                                                        <th>Tanggal Order</th>
                                                        <th>Expedisi</th>
                                                        <th>Biaya Pengiriman</th>
                                                        <th>Total Bayar</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    <?php foreach ($pesanan_diproses as $key => $value) { ?>
                                                        <tr>
                                                            <td><?= $value->nama_pelanggan ?></td>
                                                            <td><a href="<?= base_url('admin/detail/' . $value->no_order) ?>"><?= $value->no_order ?></a></td>
                                                            <td><?= $value->tgl_order ?></td>
                                                            <td><?= $value->expedisi ?><br><?= $value->paket ?><br><?= $value->estimasi ?></td>
                                                            <td><b>Rp. <?= number_format($value->ongkir, 0) ?></b><br>
                                                            <td>
                                                                <b>Rp. <?= number_format($value->total_bayar, 0) ?></b><br>
                                                                <span class="badge badge-primary">Dikemas</span>
                                                            </td>
                                                            <td>
                                                                <a href="#" class=" dropdown-item" data-backdrop="static" data-toggle="modal" data-target="#kirim<?= $value->id_transaksi ?>" type="button">
                                                                    <i class="icon-copy fa fa-paper-plane" aria-hidden="true"></i>Kirim</a>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="contact7" role="tabpanel">
                                            <div class="pd-20">
                                                <table class="table">
                                                    <tr>
                                                        <th>Nama Pelanggan</th>
                                                        <th>No Order</th>
                                                        <th>Tanggal Order</th>
                                                        <th>Expedisi</th>
                                                        <th>Alamat</th>
                                                        <th>Biaya Pengiriman</th>
                                                        <th>No Resi</th>
                                                        <th>Total Bayar</th>
                                                    </tr>
                                                    <?php foreach ($pesanan_dikirim as $key => $value) { ?>
                                                        <tr>
                                                            <td><?= $value->nama_pelanggan ?></td>
                                                            <td><?= $value->no_order ?></td>
                                                            <td><?= $value->tgl_order ?></td>
                                                            <td><?= $value->expedisi ?><br><?= $value->paket ?><br><?= $value->estimasi ?></td>
                                                            <td><?= $value->alamat ?></td>
                                                            <td><b>Ongkir : Rp. <?= number_format($value->ongkir, 0) ?></b><br>
                                                            </td>
                                                            <td><?= $value->no_resi ?></td>
                                                            <td>
                                                                <b>Rp. <?= number_format($value->total_bayar, 0) ?></b><br>
                                                                <span class="badge badge-success">Dikirim</span>
                                                            </td>

                                                        </tr>
                                                    <?php } ?>

                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="send7" role="tabpanel">
                                            <div class="pd-20">
                                                <table class="table">
                                                    <tr>
                                                        <th>Nama Pelanggan</th>
                                                        <th>No Order</th>
                                                        <th>Tanggal Order</th>
                                                        <th>Expedisi</th>
                                                        <th>Alamat</th>
                                                        <th>Biaya Pengiriman</th>
                                                        <th>No Resi</th>
                                                        <th>Total Bayar</th>
                                                    </tr>
                                                    <?php foreach ($pesanan_selesai as $key => $value) { ?>
                                                        <tr>
                                                            <td><?= $value->nama_pelanggan ?></td>
                                                            <td><?= $value->no_order ?></td>
                                                            <td><?= $value->tgl_order ?></td>
                                                            <td><?= $value->expedisi ?><br><?= $value->paket ?><br><?= $value->estimasi ?></td>
                                                            <td><?= $value->alamat ?></td>
                                                            <td><b>Ongkir : Rp. <?= number_format($value->ongkir, 0) ?></b><br>
                                                            </td>
                                                            <td><?= $value->no_resi ?></td>
                                                            <td>
                                                                <b>Rp. <?= number_format($value->total_bayar, 0) ?></b><br>
                                                                <span class="badge badge-success">Diterima</span>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
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
        <?php foreach ($proses_kirim as $key => $value) { ?>
            <div class="modal fade" id="kirim<?= $value->id_transaksi ?>" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalCenterTitle">Kirim Produk <?= $value->no_order ?></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <?php echo form_open('pesanan/kirim/' . $value->id_transaksi) ?>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="nameWithTitle" class="form-label">No Resi Pengiriman</label>
                                    <input type="text" id="nameWithTitle" name="no_resi" class="form-control" placeholder="Enter No Resi" required />
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                Close
                            </button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                        <?php echo form_close() ?>
                    </div>
                </div>
            </div>
        <?php } ?>