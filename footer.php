<footer>

    <div class="tt-footer-default tt-color-scheme-02">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-9">
                    <div class="tt-newsletter-layout-01">
                        <div class="tt-newsletter">
                            <div class="tt-mobile-collapse">
                                <h4 class="tt-collapse-title">
                                    BE IN TOUCH WITH US:
                                </h4>
                                <div class="tt-collapse-content">
                                    <form id="newsletterform" class="form-inline form-default" method="post" novalidate="novalidate" action="#">
                                        <div class="form-group">
                                            <input type="text" name="email" class="form-control" placeholder="Enter your e-mail">
                                            <button type="submit" class="btn">JOIN US</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-auto">
                    <ul class="tt-social-icon">
                        <li><a class="icon-g-64" target="_blank" href="https://www.facebook.com/optolensnepal"></a></li>
                        <li><a class="icon-h-58" target="_blank" href="https://www.facebook.com/optolensnepal"></a></li>
                        <li><a class="icon-g-66" target="_blank" href="https://www.facebook.com/optolensnepal"></a></li>
                        <li><a class="icon-g-67" target="_blank" href="https://www.instagram.com/optolensnepal/"></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <div class="tt-footer-col tt-color-scheme-01">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-2 col-xl-3">
                    <div class="tt-mobile-collapse">
                        <h4 class="tt-collapse-title">
                            CATEGORIES
                        </h4>
                        <div class="tt-collapse-content">
                            <ul class="tt-list">

                                <?php
                                $res = mysqli_query($connection, "SELECT * FROM category ORDER BY CatID ASC");
                                while ($row = mysqli_fetch_array($res)) {
                                    ?>
                                    <li><a href="<?php echo $row['pages']; ?>"><?php echo $row['CategoryName']; ?></a></li>
                                    <?php
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-2 col-xl-3">
                    <div class="tt-mobile-collapse">
                        <h4 class="tt-collapse-title">
                            MY ACCOUNT
                        </h4>
                        <div class="tt-collapse-content">
                            <ul class="tt-list">
                                <li><a href="cartitems">Cart Items</a></li>
                                <li><a href="wishlist">Wishlist</a></li>
                                <li><a href="login">Log In</a></li>
                                <li><a href="register">Register</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="tt-mobile-collapse">
                        <h4 class="tt-collapse-title">
                            ABOUT
                        </h4>
                        <div class="tt-collapse-content">
                            <p>
                                Freshlook, Bella and Purecon Contact lenses available with free home delivery option in Kathmandu valley.
                                Also, Sunglasses and Eyewears are available at store with eye power check up for free.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="tt-newsletter">
                        <div class="tt-mobile-collapse">
                            <h4 class="tt-collapse-title">
                                CONTACTS
                            </h4>
                            <div class="tt-collapse-content">
                                <address>
                                    <p><span>Address:</span> Optolens Nepal, Chabahil Near Helping Hands Community Hospital</p>
                                    <p><span>Phone:</span> +977 9861872583</p>
                                    <p><span>Hours:</span> 7 Days a week from 10 am to 6 pm</p>
                                    <p><span>E-mail:</span> <a href="mailto:info@optolens.com.np">info@optolens.com.np</a></p>
                                </address>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="tt-footer-custom">
        <div class="container">
            <div class="tt-row">
                <div class="tt-col-left">
                    <div class="tt-col-item tt-logo-col">
                        <!-- logo -->
                        <a class="tt-logo tt-logo-alignment" href="<?= base_url(); ?>">
                            <img  src="<?= base_url(); ?>images/custom/logo1.png" alt="">
                        </a>
                        <!-- /logo -->
                    </div>
                    <div class="tt-col-item">
                        <!-- copyright -->
                        <div class="tt-box-copyright">
                            &copy; OPTOLENS 2018. All Rights Reserved
                        </div>
                        <!-- /copyright -->
                    </div>
                </div>
                <div class="tt-col-right">
                    <div class="tt-col-item">
                        <p>Designed & Developed By - <a href="http://skgopal.com.np" target="_new">DVCEN</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<a href="#" class="tt-back-to-top">BACK TO TOP</a>

<!-- modal (AddToCartProduct) -->
<div class="modal  fade"  id="modalAddToCartProduct" tabindex="-1" role="dialog" aria-label="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content ">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="icon icon-clear"></span></button>
            </div>
            <div class="modal-body">
                <div class="tt-modal-addtocart mobile">
                    <div class="tt-modal-messages">
                        <i class="icon-f-68"></i> Added to cart successfully!
                    </div>
                    <a href="#" class="btn-link btn-close-popup">CONTINUE SHOPPING</a>
                    <a href="shopping_cart_02.html" class="btn-link">VIEW CART</a>
                    <a href="page404.html" class="btn-link">PROCEED TO CHECKOUT</a>
                </div>
                <div class="tt-modal-addtocart desctope">
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <div class="tt-modal-messages">
                                <i class="icon-f-68"></i> Added to cart successfully!
                            </div>
                            <div class="tt-modal-product">
                                <div class="tt-img">
                                    <img src="<?= base_url(); ?>images/loader.svg" data-src="<?= base_url(); ?>images/product/product-01.jpg" alt="">
                                </div>
                                <h2 class="tt-title"><a href="product.html">Flared Shift Dress</a></h2>
                                <div class="tt-qty">
                                    QTY: <span>1</span>
                                </div>
                            </div>
                            <div class="tt-product-total">
                                <div class="tt-total">
                                    TOTAL: <span class="tt-price">$324</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <a href="#" class="tt-cart-total">
                                There are 1 items in your cart
                                <div class="tt-total">
                                    TOTAL: <span class="tt-price">$324</span>
                                </div>
                            </a>
                            <a href="#" class="btn btn-border btn-close-popup">CONTINUE SHOPPING</a>
                            <a href="shopping_cart_02.html" class="btn btn-border">VIEW CART</a>
                            <a href="#" class="btn">PROCEED TO CHECKOUT</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- modal (quickViewModal) -->
<div class="modal  fade"  id="ModalquickView" tabindex="-1" role="dialog" aria-label="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content ">
            <div class="modal-header" id="ret">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="icon icon-clear"></span></button>
            </div>
            <div class="modal-body"></div>
        </div>
    </div>
</div>

<!-- modalVideoProduct -->
<!--<div class="modal fade"  id="modalVideoProduct" tabindex="-1" role="dialog" aria-label="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-video">
        <div class="modal-content ">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="icon icon-clear"></span></button>
            </div>
            <div class="modal-body">
                <div class="modal-video-content">

                </div>
            </div>
        </div>
    </div>
</div>-->

<!-- modal (ModalSubsribeGood) -->
<div class="modal  fade"  id="ModalSubsribeGood" tabindex="-1" role="dialog" aria-label="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xs">
        <div class="modal-content ">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="icon icon-clear"></span></button>
            </div>
            <div class="modal-body">
                <div class="tt-modal-subsribe-good">
                    <i class="icon-f-68"></i> You have successfully signed!
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal (newsletter) -->
<div class="modal  fade"  id="Modalnewsletter" tabindex="-1" role="dialog" aria-label="myModalLabel" aria-hidden="true"  data-pause=2000>
    <div class="modal-dialog modal-sm">
        <div class="modal-content ">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="icon icon-clear"></span></button>
            </div>
            <form>
                <div class="modal-body no-background">
                    <div class="tt-modal-newsletter">
                        <div class="tt-modal-newsletter-promo">
                            <div class="tt-title-small">BE THE FIRST<br> TO KNOW ABOUT</div>
                            <div class="tt-title-large">OPTOLENS</div>
                            <p>
                                LENS FASHION NEPAL
                            </p>
                        </div>
                        <p>
                            By subscribe, you accept the terms &amp; privacy policy<br>
                        </p>
                        <div class="subscribe-form form-default">
                            <div class="row-subscibe">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Enter your e-mail">
                                    <button type="submit" class="btn">JOIN US</button>
                                </div>
                            </div>
                            <div class="checkbox-group">
                                <input type="checkbox" id="checkBox1">
                                <label for="checkBox1">
                                    <span class="check"></span>
                                    <span class="box"></span>
                                    Don’t Show This Popup Again
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<script src="<?= base_url(); ?>external/jquery/jquery.min.js"></script>
<script src="<?= base_url(); ?>external/bootstrap/js/bootstrap.min.js"></script>
<script src="<?= base_url(); ?>external/slick/slick.min.js"></script>
<script src="<?= base_url(); ?>external/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="<?= base_url(); ?>external/panelmenu/panelmenu.js"></script>
<script src="<?= base_url(); ?>external/instafeed/instafeed.min.js"></script>
<script src="<?= base_url(); ?>external/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
<script src="<?= base_url(); ?>external/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
<script src="<?= base_url(); ?>external/countdown/jquery.plugin.min.js"></script>
<script src="<?= base_url(); ?>external/countdown/jquery.countdown.min.js"></script>
<script src="<?= base_url(); ?>external/lazyLoad/lazyload.min.js"></script>
<script src="<?= base_url(); ?>js/main.js"></script>
<!-- form validation and sending to mail -->
<script src="<?= base_url(); ?>external/form/jquery.form.js"></script>
<script src="<?= base_url(); ?>external/form/jquery.validate.min.js"></script>
<script src="<?= base_url(); ?>external/form/jquery.form-init.js"></script>
</body>
</html>


<script>
    $(document).ready(function () {
        $(".productinfo").click(function () {
            var pid = this.id;
            $('#pid').val(pid);
            $('#ModalquickView').modal('show');
            //alert(pid);
            $.ajax({
                type: "POST",
                url: "getproductinfo.php",
                data: {pid: pid},
                success: function (response) {
                    $('.modal-body').html(response);
                }
            });
        });
        
        $(".addtocart").click(function (){
            var productid = this.id;
            $.ajax({
                type: "POST",
                url: "addtocart.php",
                data: {pid: productid},
                success: function (response) {
                    $('.modal-header #ret').html(response);
                    location.reload = 'cartitems';
                }
            });
        });
        
        
    });
    
    


</script>