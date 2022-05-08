<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active"><?= $title ?></li>
            </ol>
        </div>
        <!--/breadcrums-->

        <div class="checkout-options">
        </div>
        <!--/checkout-options-->

        <div class="step-one">
            <h2 class="heading"><?= $title ?></h2>
        </div>
        <!--/register-req-->

        <div class="shopper-informations">
            <div class="row">
                <div class="col-sm-3">
                    <div class="shopper-info">
                        <p>Shopper Information</p>
                        <form action="<?= base_url('chating/pesan_pelanggan') ?>" method="POST">
                            <input type="text" name="pesan" placeholder="Display Name">
                            <button type="submit" class="btn btn-primary" href="">Send</button>
                        </form>
                    </div>
                </div>
                <div class="col-sm-4">

                    <div class="order-message">
                        <?php foreach ($chat as $key => $value) {
                            if ($value->pesan != '0') {
                        ?>
                                <h6><?= $value->username ?></h6>
                                <p><?= $value->pesan ?></p>
                            <?php
                            } else if ($value->balas != '0') {
                            ?>
                                <h6>Admin</h6>
                                <p><?= $value->balas ?></p>
                        <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/#cart_items-->