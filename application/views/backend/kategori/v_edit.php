<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Form</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Form Basic</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-md-6 col-sm-12 text-right">
                        <div class="dropdown">
                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                January 2018
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#">Export List</a>
                                <a class="dropdown-item" href="#">Policies</a>
                                <a class="dropdown-item" href="#">View Assets</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 mb-30">
                <div class="pd-20 card-box mb-30">
                    <div class="clearfix">
                        <div class="pull-left">
                            <h4 class="text-blue h4">Tambah Kategori</h4>
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
                    echo form_open_multipart('masterproduk/edit/' . $kategori->id_kategori) ?>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Nama Kategori</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" name="nama_kategori" value="<?= $kategori->nama_kategori ?>" type="text" placeholder="Nama Kategori">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Gambar</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="file" name="gambar" id="preview_gambar" required placeholder="Gambar">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Gambar</label>
                        <div class="col-sm-12 col-md-10">
                            <img src="<?= base_url('assets/kategori/' . $kategori->gambar) ?>" id="gambar_load" width="200px">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah Kategori</button>
                    <?php echo form_close() ?>
                </div>
            </div>
        </div>
    </div>