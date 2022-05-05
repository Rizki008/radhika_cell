<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Shopping Cart</li>
            </ol>
        </div>
        <?php echo form_open('belanja/update'); ?>
        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Item</td>
                        <td class="description"></td>
                        <td class="price">Price</td>
                        <td class="quantity">Quantity</td>
                        <td class="total">Total</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php $total_berat = 0;
                    $total = 0;
                    foreach ($this->cart->contents() as $items) {
                        $produk = $this->m_home->detail_produk($items['id']);
                        $berat = $items['qty'] * $produk->berat;
                        $total_berat = $total_berat + $berat;
                    ?>
                        <tr>
                            <td class="cart_product">
                                <a href=""><img src="<?= base_url('assets/produk/' . $produk->images) ?>" alt="" width="150px"></a>
                            </td>
                            <td class="cart_description">
                                <h4><a href=""><?php echo $items['name']; ?></a></h4>
                                <p>Web ID: 1089772</p>
                            </td>
                            <td class="cart_price">
                                <p>Rp. <?= number_format($items['price']); ?></p>
                            </td>
                            <td class="cart_quantity">
                                <div class="cart_quantity_button">
                                    <?php echo form_input(
                                        array(
                                            'name' => $i . '[qty]',
                                            'value' => $items['qty'],
                                            'maxlength' => '3',
                                            'min' => '0',
                                            'max' => 'stock',
                                            'size' => '5',
                                            'type' => 'number',
                                            'class' => 'form-control'
                                        )
                                    ); ?>
                                </div>
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price">Rp. <?= number_format($items['subtotal']) ?></p>
                            </td>
                            <td class="cart_delete">
                                <a class="cart_quantity_delete" href="<?= base_url('belanja/delete/') . $items['rowid'] ?>"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <?php echo form_close(); ?>
    </div>
</section>
<!--/#cart_items-->

<section id="do_action">
    <div class="container">
        <div class="heading">
            <h3>Apa yang ingin Anda lakukan selanjutnya?</h3>
            <p>Apakah Anda ingin memperkirakan biaya pengiriman Anda.</p>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="chose_area">
                    <ul class="user_info">
                        <li class="single_field">
                            <label>Country:</label>
                            <select>
                                <option>United States</option>
                                <option>Bangladesh</option>
                                <option>UK</option>
                                <option>India</option>
                                <option>Pakistan</option>
                                <option>Ucrane</option>
                                <option>Canada</option>
                                <option>Dubai</option>
                            </select>

                        </li>
                        <li class="single_field">
                            <label>Region / State:</label>
                            <select>
                                <option>Select</option>
                                <option>Dhaka</option>
                                <option>London</option>
                                <option>Dillih</option>
                                <option>Lahore</option>
                                <option>Alaska</option>
                                <option>Canada</option>
                                <option>Dubai</option>
                            </select>

                        </li>
                        <li class="single_field zip-field">
                            <label>Zip Code:</label>
                            <input type="text">
                        </li>
                    </ul>
                    <a class="btn btn-default update" href="">Get Quotes</a>
                    <a class="btn btn-default check_out" href="">Continue</a>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="total_area">
                    <ul>
                        <li>Cart Sub Total <span>$59</span></li>
                        <li>Eco Tax <span>$2</span></li>
                        <li>Shipping Cost <span>Free</span></li>
                        <li>Total <span>$61</span></li>
                    </ul>
                    <a class="btn btn-default update" href="">Update</a>
                    <a class="btn btn-default check_out" href="">Check Out</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/#do_action-->