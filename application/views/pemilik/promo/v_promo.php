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

                    </div>
                </div>
            </div>
            <!-- Simple Datatable start -->
            <div class="card-box mb-30">
                <div class="pd-20">
                    <h4 class="text-blue h4"><?= $title ?></h4>
                </div>
                <div class="pb-20">
                    <table class="data-table table stripe hover nowrap">
                        <thead>
                            <tr>
                                <th class="table-plus datatable-nosort">Nama Produk</th>
                                <th>Nama Promo</th>
                                <th>Harga Promo</th>
                                <th>Tanggal Selesai</th>
                                <th class="datatable-nosort">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($promo as $key => $value) { ?>
                                <tr>
                                    <td class="table-plus"><?= $value->nama_produk ?></td>
                                    <td><?= $value->nama_promo ?></td>
                                    <td><?= $value->harga_promo ?></td>
                                    <td><?= $value->tanggal ?></td>
                                    <td>
                                        <div class="dropdown">
                                            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                                <i class="dw dw-more"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                <a href="#" class=" dropdown-item" data-backdrop="static" data-toggle="modal" data-target="#login-modal<?= $value->id_diskon ?>" type="button">
                                                <i class="dw dw-edit2"></i>Update</a>
                                                <a href="<?= base_url('masterproduk/hapus_promo/' . $value->id_diskon)  ?>"" class=" dropdown-item" type="button">
                                                    <i class="dw dw-delete-3"></i> Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Simple Datatable End -->
        </div>
        <?php foreach ($promo as $key => $value) { ?>
            <div class="modal fade" id="login-modal<?= $value->id_diskon ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="login-box bg-white box-shadow border-radius-10">
                            <div class="login-title">
                                <h2 class="text-center text-primary"><?= $title ?></h2>
                            </div>
                            <?php echo
                            form_open('masterproduk/update_promo/' . $value->id_diskon);
                            ?>
                            <div class="input-group custom">
                                <input type="text" class="form-control form-control-lg" name="nama_promo" value="<?= $value->nama_promo ?>" placeholder="lebaran">
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
                                </div>
                            </div>
                            <div class="input-group custom">
                                <input type="text" class="form-control form-control-lg" name="harga_promo" value="<?= $value->harga_promo ?>" placeholder="10000">
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                                </div>
                            </div>
                            <div class="input-group custom">
                                <input type="date" class="form-control form-control-lg" name="tanggal" value="<?= $value->tanggal ?>" placeholder="10000">
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="input-group mb-0">
                                        <!-- <a class="btn btn-primary btn-lg btn-block" href="index.html">Sign In</a> -->
                                        <button type="button" class="btn btn-secondary btn-lg btn-block" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary btn-lg btn-block">Update changes</button>
                                    </div>
                                </div>
                            </div>
                            <?php echo form_close() ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>