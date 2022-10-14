<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="title">
                            <h4>Produk</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Beranda</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Produk</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="card-box mb-30">
                <div class="pd-20">
                    <a href="<?= base_url('transaksi_langsung/selesai') ?>" class="btn btn-primary" data-color="#265ed7"><i class="fa fa-plus"></i> Transaksi Selesai</a>
                </div>
                <div class="pb-20">
                    <table class="data-table table stripe hover nowrap">
                        <thead>
                            <tr>
                                <th class="table-plus datatable-nosort">Nama Produk</th>
                                <th>Harga Produk</th>
                                <th>Quantity</th>
                                <th>Subtotal</th>
                                <th class="datatable-nosort">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($this->cart->contents() as $key => $value) {
                            ?>
                                <tr>
                                    <td class="table-plus">
                                        <div class="name-avatar d-flex align-items-center">
                                            <div class="txt">
                                                <div class="weight-600"><?= $value['name'] ?></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td><?= $value['price'] ?></td>
                                    <td><?= $value['qty'] ?></td>
                                    <td>Rp. <?= number_format($value['qty'] * $value['price'])  ?> </td>
                                    <td>
                                        <div class="dropdown">
                                            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                                <i class="dw dw-more"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                <a class="dropdown-item" href="<?= base_url('transaksi_langsung/delete/' . $value['rowid']) ?>" data-color="#e95959"><i class="dw dw-delete-3"></i> Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <form action="<?= base_url('transaksi_langsung/pesan_langsung') ?>" method="POST">
                        <?php $no_order = date('Ymd') . strtoupper(random_string('alnum', 8));
                        ?>
                        <input type="hidden" name="total" value="<?= $this->cart->total() ?>">
                        <input type="hidden" name="no_order" value="<?= $no_order ?>">
                        <?php
                        $i = 1;
                        foreach ($this->cart->contents() as $items) {
                            echo form_hidden('qty' . $i++, $items['qty']);
                        }
                        ?>
                        <button class="btn btn-warning mb-3" type="submit">Pesan</button>
                    </form>
                </div>
            </div>
            <div class="product-wrap">
                <div class="product-list">
                    <?php
                    if ($this->session->userdata('success')) {
                    ?>
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <?= $this->session->userdata('success') ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php
                    }
                    ?>
                    <ul class="row">
                        <?php if (count($produk) > 0) : ?>
                            <?php foreach ($produk as $value) : ?>
                                <li class="col-lg-4 col-md-6 col-sm-12">
                                    <?php echo form_open('transaksi_langsung/add_to_cart');
                                    echo form_hidden('id', $value->id_produk);
                                    echo form_hidden('qty', 1);
                                    echo form_hidden('price', $value->harga - $value->harga_promo);
                                    echo form_hidden('name', $value->nama_produk);
                                    echo form_hidden('redirect_page', str_replace('index.php/', '', current_url())); ?>
                                    <div class="product-box">
                                        <div class="producct-img"><img src="<?= base_url('assets/produk/' . $value->images) ?>" alt="<?= $value->nama_produk ?>"></div>
                                        <div class="product-caption">
                                            <h4><a href="#"><?= $value->nama_produk ?></a></h4>
                                            <div class="price">
                                                <?php if ($value->harga_promo > 0) : ?>
                                                    <del>Rp. <?= number_format($value->harga, 0) ?></del><ins>Rp. <?= number_format($value->harga - $value->harga_promo, 0) ?></ins>
                                                <?php else : ?>
                                                    <ins>Rp. <?= number_format($value->harga - $value->harga_promo, 0) ?></ins>
                                                <?php endif; ?>
                                            </div>
                                            <button type="submit" class="btn btn-outline-primary">Tambah ke Keranjang</button>
                                        </div>
                                    </div>
                                    <?php echo form_close(); ?>
                                </li>
                            <?php endforeach; ?>
                        <?php else : ?>
                        <?php endif; ?>
                    </ul>
                </div>
                <!-- <div class="blog-pagination mb-30">
                    <div class="btn-toolbar justify-content-center mb-15">
                        <div class="btn-group">
                            <a href="#" class="btn btn-outline-primary prev"><i class="fa fa-angle-double-left"></i></a>
                            <a href="#" class="btn btn-outline-primary">1</a>
                            <a href="#" class="btn btn-outline-primary">2</a>
                            <span class="btn btn-primary current">3</span>
                            <a href="#" class="btn btn-outline-primary">4</a>
                            <a href="#" class="btn btn-outline-primary">5</a>
                            <a href="#" class="btn btn-outline-primary next"><i class="fa fa-angle-double-right"></i></a>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>