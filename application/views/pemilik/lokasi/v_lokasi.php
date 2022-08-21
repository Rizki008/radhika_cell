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
                                <li class="breadcrumb-item active" aria-current="page"><?= $title ?> Basic</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- Default Basic Forms Start -->
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <div class="pull-left">
                        <h4 class="text-blue h4">Default Basic Forms</h4>
                        <p class="mb-30">All bootstrap element classies</p>
                    </div>
                    <div class="pull-right">
                        <a href="#basic-form1" class="btn btn-primary btn-sm scroll-click" rel="content-y" data-toggle="collapse" role="button"><i class="fa fa-code"></i> Source Code</a>
                    </div>
                </div>
                <?php
                echo validation_errors(
                    ' <div class="alert alert-danger alert-dismissible" role="alert">',
                    '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>'
                );
                echo form_open('admin/lokasi') ?>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Nama Toko</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" type="text" placeholder="Nama Toko" name="nama_toko" value="<?= $lokasi->nama_toko ?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Provinsi</label>
                    <div class="col-sm-12 col-md-10">
                        <select class="custom-select col-12" name="provinsi" required>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Kota</label>
                    <div class="col-sm-12 col-md-10">
                        <select class="custom-select col-12" name="kota" required>
                            <option value="<?= $lokasi->lokasi ?>"><?= $lokasi->lokasi ?></option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Alamat</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" value="<?= $lokasi->alamat ?>" type="text" name="alamat" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>
    <!-- Default Basic Forms End -->