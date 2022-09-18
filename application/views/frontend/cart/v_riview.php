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
                    <!--/category-products-->

                    <div class="shipping text-center">
                        <!--shipping-->
                        <img src="<?= base_url() ?>eshopper/images/home/shipping.jpg" alt="" />
                    </div>
                    <!--/shipping-->
                </div>
            </div>
            <div class="col-sm-9">

                <div class="replay-box">
                    <?php foreach ($pesanan_detail as $key => $value) { ?>
                        <?php echo form_open_multipart('pesanan_saya/insert_riview') ?>
                        <div class="row">
                            <div class="response-area">
                                <h2>KRITIK & SARAN</h2>
                                <ul class="media-list">
                                    <li class="media">
                                        <a class="pull-left" href="#">
                                            <img class="media-object" src="<?= base_url('assets/produk/' . $value->images) ?>" alt="">
                                        </a>
                                        <div class="media-body">
                                            <ul class="sinlge-post-meta">
                                                <li><i class="fa fa-user"></i><?= $value->nama_produk ?></li>
                                                <li><i class="fa fa-clock-o"></i> 1:33 pm</li>
                                                <li><i class="fa fa-calendar"></i> <?= $value->tgl_order ?></li>
                                            </ul>
                                            <p><?= $value->deskripsi ?></p>
                                            <a class="btn btn-primary" href="<?= base_url() ?>"><i class="fa fa-reply"></i>Beli Lagi</a>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                            <input name="id_produk" class="form-control" cols="30" rows="10" placeholder="isi Produk" value="<?= $value->id_produk ?>" required type="hidden"></input>
                            <div class="col-sm-8">
                                <div class="text-area">
                                    <div class="blank-arrow">
                                        <label>Kritik Dan Riview</label>
                                    </div>
                                    <span>*</span>
                                    <textarea name="isi" id="isi" rows="11"></textarea>
                                    <button type="submit" class="btn btn-primary" href="">post comment</button>
                                </div>
                            </div>

                        </div>
                        <br>
                        <br>
                        <?php echo form_close() ?>
                    <?php } ?>
                </div>
                <!--/Repaly Box-->
            </div>
        </div>
    </div>
</section>
<br>
<br>
<br>