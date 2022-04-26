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
                                <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-8 mb-30">
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
                                        <th>Tanggal Promo</th>
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
                </div>
                <div class="col-xl-4 mb-30">
                    <div class="pd-20 card-box mb-30">
                        <div class="clearfix">
                            <div class="pull-left">
                                <h4 class="text-blue h4">Tambah Promo</h4>
                            </div>
                        </div>
                        <?php //notifikasi form kosong
                        echo validation_errors('<div class="alert alert-warning alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h5><i class="icon fa fa-exclamation-triangle"></i>', '</h5></div>');

                        //notifikasi gagal upload gambar
                        if (isset($error_upload)) {
                            echo '<div class="alert alert-warning alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h5><i class="icon fa fa-exclamation-triangle"></i>' . $error_upload . '</h5></div>';
                        }
                        echo form_open_multipart('masterproduk/promo') ?>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Nama Produk</label>
                            <div class="col-sm-12 col-md-10">
                                <select class="custom-select col-12" name="id_produk" id="id_produk" required>
                                    <option selected="">Pilih Produk...</option>
                                    <?php foreach ($produk as $key => $value) { ?>
                                        <option value="<?= $value->id_produk ?>"><?= $value->nama_produk ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Nama Promo</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" name="nama_promo" type="text" placeholder="Nama Promo">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Harga Promo</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" name="harga_promo" type="number" placeholder="Harga Promo">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Tanggal Promo</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" name="tanggal" type="date" placeholder="Tanggal Promo">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah Kategori</button>
                        <?php echo form_close() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>