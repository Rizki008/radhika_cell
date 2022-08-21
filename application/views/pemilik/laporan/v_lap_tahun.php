<!-- Export Datatable start -->
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
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-box mb-30">
                <div class="pd-20">
                    <h4 class="text-blue h4"><?= $title ?></h4>
                </div>
                <div class="pb-20">
                    <table class="table hover multiple-select-row data-table-export nowrap">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Produk</th>
                                <th>No Transaksi</th>
                                <th>Tanggal</th>
                                <th>Harga</th>
                                <th>Qty</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            $grand_total = 0;
                            foreach ($laporan as $key => $value) {
                                $tot_harga = $value->qty * $value->harga;
                                $grand_total = $grand_total + $value->grand_total;
                            ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $value->nama_produk ?></td>
                                    <td><?= $value->no_order ?></td>
                                    <td><?= $value->tgl_order ?></td>
                                    <td>Rp. <?= number_format($value->harga, 0) ?>,-</td>
                                    <td><?= $value->qty ?></td>
                                    <td>Rp. <?= number_format($value->grand_total, 0) ?>,-</td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <h3>Grand Total : Rp. <?= number_format($grand_total, 0) ?> </h3>
            </div>
            <!-- Export Datatable End -->