<?php
include 'header.php';
?>
<div class="tt-breadcrumb">
    <div class="container">
        <ul>
            <li><a href="<?= base_url(); ?>">Home</a></li>
            <li>Shopping Cart</li>
        </ul>
    </div>
</div>
<div id="tt-pageContent">
    <div class="container-indent">
        <div class="container">
            <h1 class="tt-title-subpages noborder">SHOPPING CART</h1>
            <div class="row">
                <div class="col-sm-12 col-xl-8">
                    <div class="tt-shopcart-table">
                        <table>
                            <tbody>
                                <tr>
                                    <td>
                                        <a href="#" class="tt-btn-close"></a>
                                    </td>
                                    <td>
                                        <div class="tt-product-img">
                                            <img src="<?= base_url(); ?>assets/images/loader.svg" data-src="<?= base_url(); ?>assets/images/product/product-01.jpg" alt="">
                                        </div>
                                    </td>
                                    <td>
                                        <h2 class="tt-title">
                                            <a href="#">Flared Shift Dress</a>
                                        </h2>
                                        <ul class="tt-list-parameters">
                                            <li>
                                                <div class="tt-price">
                                                    $124
                                                </div>
                                            </li>
                                            <li>
                                                <div class="detach-quantity-mobile"></div>
                                            </li>
                                            <li>
                                                <div class="tt-price subtotal">
                                                    $124
                                                </div>
                                            </li>
                                        </ul>
                                    </td>
                                    <td>
                                        <div class="tt-price">
                                            $124
                                        </div>
                                    </td>
                                    <td>
                                        <div class="detach-quantity-desctope">
                                            <div class="tt-input-counter style-01">
                                                <span class="minus-btn"></span>
                                                <input type="text" value="1" size="5">
                                                <span class="plus-btn"></span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="tt-price subtotal">
                                            $124
                                        </div>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                        <div class="tt-shopcart-btn">
                            <div class="col-left">
                                <a class="btn-link" href="<?= base_url(); ?>"><i class="icon-e-19"></i>CONTINUE SHOPPING</a>
                            </div>
                            <div class="col-right">
                                <a class="btn-link" href="cartitems?rid=<?php echo $pid; ?>"><i class="icon-h-02"></i>CLEAR SHOPPING CART</a>
                                <a class="btn-link" href="cartitems?uid=<?php echo $pid; ?>"><i class="icon-h-48"></i>UPDATE CART</a>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-sm-12 col-xl-4">
                    <div class="tt-shopcart-wrapper">
                        <div class="tt-shopcart-box">
                            <h4 class="tt-title">
                                ESTIMATE SHIPPING AND TAX
                            </h4>
                            <p>Enter your destination to get a shipping estimate.</p>
                            <form class="form-default">
                                <div class="form-group">
                                    <label for="address_country">COUNTRY <sup>*</sup></label>
                                    <select id="address_country" class="form-control">
                                        <option>Austria</option>
                                        <option>Belgium</option>
                                        <option>Cyprus</option>
                                        <option>Croatia</option>
                                        <option>Czech Republic</option>
                                        <option>Denmark</option>
                                        <option>Finland</option>
                                        <option>France</option>
                                        <option>Germany</option>
                                        <option>Greece</option>
                                        <option>Hungary</option>
                                        <option>Ireland</option>
                                        <option>France</option>
                                        <option>Italy</option>
                                        <option>Luxembourg</option>
                                        <option>Netherlands</option>
                                        <option>Poland</option>
                                        <option>Portugal</option>
                                        <option>Slovakia</option>
                                        <option>Slovenia</option>
                                        <option>Spain</option>
                                        <option>United Kingdom</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="address_province">STATE/PROVINCE <sup>*</sup></label>
                                    <select id="address_province" class="form-control">
                                        <option>State/Province</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="address_zip">ZIP/POSTAL CODE <sup>*</sup></label>
                                    <input type="text" name="name" class="form-control" id="address_zip" placeholder="Zip/Postal Code">
                                </div>
                                <a href="#" class="btn btn-border">CALCULATE SHIPPING</a>
                                <p>
                                    There is one shipping rate available for Alabama, Tanzania, United Republic Of.
                                </p>
                                <ul class="tt-list-dot list-dot-large">
                                    <li><a href="#">International Shipping at $20.00</a></li>
                                </ul>
                            </form>
                        </div>
                        <div class="tt-shopcart-box">
                            <h4 class="tt-title">
                                NOTE
                            </h4>
                            <p>Add special instructions for your order...</p>
                            <form class="form-default">
                                <textarea class="form-control" rows="7"></textarea>
                            </form>
                        </div>
                        <div class="tt-shopcart-box tt-boredr-large">
                            <table class="tt-shopcart-table01">
                                <tbody>
                                    <tr>
                                        <th>SUBTOTAL</th>
                                        <td>$324</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>GRAND TOTAL</th>
                                        <td>$324</td>
                                    </tr>
                                </tfoot>
                            </table>
                            <a href="#" class="btn btn-lg"><span class="icon icon-check_circle"></span>PROCEED TO CHECKOUT</a>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>
