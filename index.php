<?php include 'header.php'; $pid = "";?>
<div id="tt-pageContent">
    <div class="container-indent nomargin">
        <div class="container-fluid">
            <div class="row">
                <div class="slider-revolution revolution-default">
                    <div class="tp-banner-container">
                        <div class="tp-banner revolution">
                            <ul>

                                <?php
                                $res = mysqli_query($connection, "SELECT * FROM slider WHERE IsActive = 'Active' AND ViewID = 1  ORDER BY ImgOrder ASC");
                                while ($row = mysqli_fetch_array($res)) {
                                    ?>
                                    <li data-thumb="images/slides/<?php echo $row['Image']; ?>" data-transition="fade" data-slotamount="1" data-masterspeed="1000" data-saveperformance="off"  data-title="Slide">
                                        <img src="images/slides/<?php echo $row['Image']; ?>"  alt="slide1"  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" >
                                        <div class="tp-caption tp-caption1 lft stb"
                                             data-x="center"
                                             data-y="center"
                                             data-hoffset="0"
                                             data-voffset="0"
                                             data-speed="600"
                                             data-start="900"
                                             data-easing="Power4.easeOut"
                                             data-endeasing="Power4.easeIn">
                                            <div class="tp-caption1-wd-1 tt-base-color"><?php echo $row['Caption']; ?></div>
                                            <!--                                            <div class="tp-caption1-wd-2">Premium<br>Html Template</div>-->
                                            <div class="tp-caption1-wd-3"><?php echo $row['SubCaption']; ?></div>
                                            <!--                                            <div class="tp-caption1-wd-4"><a href="#" target="_blank" class="btn btn-xl" data-text="SHOP NOW!">SHOP NOW!</a></div>-->
                                        </div>
                                    </li>
                                    <?php
                                }
                                ?>


                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="container-indent">
        <div class="container container-fluid-custom-mobile-padding">
            <div class="tt-block-title">
                <h1 class="tt-title">TRENDING</h1>
                <div class="tt-description">TOP VIEW IN THIS WEEK</div>
            </div>
            <div class="row tt-layout-product-item">
                <?php
                
                $psql = mysqli_query($connection, "select * from product where ProductStatus = 'Active' LIMIT 0,8");
                while ($prow = mysqli_fetch_array($psql)) {
                    $pid = $prow['ProductID'];
                    $ptype = $prow['Ptype'];
                    if ($ptype == 1) {
                        $ptye = "POPULAR";
                    } else {
                        $ptye = "NEW";
                    }
                    $catsql = mysqli_query($connection, "select * from category where CatID = '" . $prow['CategoryID'] . "'");
                    $rowcat = mysqli_fetch_array($catsql);
                    ?>
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="tt-product thumbprod-center product-nohover">
                            <div class="tt-image-box">
                                <a id="<?php echo $pid;?>" class="tt-btn-quickview productinfo" data-toggle="tooltip"  title="Quick View" data-tposition="left"></a>
                                <a href="#" class="tt-btn-wishlist" data-tooltip="Add to Wishlist" data-tposition="left"></a>
                                <!--<a href="#" class="tt-btn-compare" data-tooltip="Add to Compare" data-tposition="left"></a>-->
                                <a href="productsingle">
                                    <span class="tt-img"><img src="<?= base_url(); ?>images/loader.svg" data-src="<?= base_url(); ?>images/product/<?php echo $pid . '/' . $prow['Pimage1']; ?>" alt=""></span>
                                    <span class="tt-img-roll-over"><img src="<?= base_url(); ?>images/loader.svg" data-src="<?= base_url(); ?>images/product/<?php echo $pid . '/' . $prow['Pimage1']; ?>" alt=""></span>
                                    <span class="tt-label-location">
                                        <span class="tt-label-new"><?php echo $ptye; ?></span>
                                    </span>
                                </a>
                            </div>
                            <div class="tt-description">
                                <div class="tt-row">
                                    <ul class="tt-add-info">
                                        <li><a href="#"><?php echo $prow['Pname']; ?></a></li>
                                    </ul>
                                    <div class="tt-rating">
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                        <i class="icon-star-half"></i>
                                        <i class="icon-star-empty"></i>
                                    </div>
                                </div>
                                <h2 class="tt-title"><a href="<?php echo $rowcat['pages']; ?>"><?php echo $rowcat['CategoryName']; ?></a></h2>
                                <div class="tt-price">
                                    <span class="new-price"><?php echo $prow['AfterDiscount']; ?></span>
                                    <span class="old-price"><?php echo $prow['Pprice']; ?></span>
                                </div>
                                <div class="tt-option-block">
                                    <ul class="tt-options-swatch js-change-img">
                                        <li class="active"><a href="#" class="options-color-img" data-src="<?= base_url(); ?>images/product/<?php echo $pid . '/' . $prow['Pimage1']; ?>" data-src-hover="<?= base_url(); ?>images/product/<?php echo $pid . '/' . $prow['Pimage1']; ?>" data-tooltip="Blue" data-tposition="top"></a></li>
                                        <li><a href="#" class="options-color-img" data-src="<?= base_url(); ?>images/product/<?php echo $pid . '/' . $prow['Pimage2']; ?>" data-src-hover="<?= base_url(); ?>images/product/<?php echo $pid . '/' . $prow['Pimage2']; ?>" data-tooltip="Light Blue" data-tposition="top"></a></li>
                                        <li><a href="#" class="options-color-img" data-src="<?= base_url(); ?>images/product/<?php echo $pid . '/' . $prow['Pimage3']; ?>" data-src-hover="<?= base_url(); ?>images/product/<?php echo $pid . '/' . $prow['Pimage3']; ?>" data-tooltip="Green" data-tposition="top"></a></li>
                                        <li><a href="#" class="options-color-img" data-src="<?= base_url(); ?>images/product/<?php echo $pid . '/' . $prow['Pimage4']; ?>" data-src-hover="<?= base_url(); ?>images/product/<?php echo $pid . '/' . $prow['Pimage4']; ?>" data-tooltip="Pink" data-tposition="top"></a></li>
                                    </ul>
                                </div>
                                <div class="tt-product-inside-hover">
                                    <div class="tt-row-btn">
                                        <a href="#" class="tt-btn-addtocart thumbprod-button-bg" data-toggle="modal" data-target="#modalAddToCartProduct">ADD TO CART</a>
                                    </div>
                                    <!--<div class="tt-row-btn">
                                        <a href="#" class="tt-btn-quickview" data-toggle="modal" data-target="#ModalquickView"></a>
                                        <a href="#" class="tt-btn-wishlist"></a>
                                        <a href="#" class="tt-btn-compare"></a>
                                    </div>-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>






    <div class="container-indent">
        <div class="container container-fluid-custom-mobile-padding">
            <div class="tt-block-title">
                <h2 class="tt-title">BEST POPULAR</h2>
                <div class="tt-description">TOP SALE IN THIS WEEK</div>
            </div>
            <div class="row tt-layout-product-item">

                <?php
                $psql = mysqli_query($connection, "select * from product where ProductStatus = 'Active' AND Ptype = '1' LIMIT 0,8");
                while ($prow = mysqli_fetch_array($psql)) {
                    $pid = $prow['ProductID'];
                    $catsql = mysqli_query($connection, "select * from category where CatID = '" . $prow['CategoryID'] . "'");
                    $rowcat = mysqli_fetch_array($catsql);
                    ?>

                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="tt-product thumbprod-center">
                            <div class="tt-image-box">
                                <a href="#" class="tt-btn-quickview" data-toggle="modal" data-target="#ModalquickView"	data-tooltip="Quick View" data-tposition="left"></a>
                                <a href="#" class="tt-btn-wishlist" data-tooltip="Add to Wishlist" data-tposition="left"></a>
                                <!--<a href="#" class="tt-btn-compare" data-tooltip="Add to Compare" data-tposition="left"></a>-->
                                <a href="productsingle">
                                    <span class="tt-img"><img src="<?= base_url(); ?>images/loader.svg" data-src="<?= base_url(); ?>images/product/<?php echo $pid . '/' . $prow['Pimage1']; ?>" alt=""></span>
                                    <span class="tt-img-roll-over"><img src="<?= base_url(); ?>images/loader.svg" data-src="<?= base_url(); ?>images/product/<?php echo $pid . '/' . $prow['Pimage1']; ?>" alt=""></span>
                                </a>
                            </div>

                            <div class="tt-description">
                                <div class="tt-row">
                                    <ul class="tt-add-info">
                                        <li><a href="#"><?php echo $prow['Pname']; ?></a></li>
                                    </ul>
                                </div>
                                <h2 class="tt-title"><a href="<?php echo $rowcat['pages']; ?>"><?php echo $rowcat['CategoryName']; ?></a></h2>
                                <div class="tt-price">
                                    <span class="new-price"><?php echo $prow['AfterDiscount']; ?></span>
                                    <span class="old-price"><?php echo $prow['Pprice']; ?></span>

                                </div>
                                <div class="tt-product-inside-hover">
                                    <div class="tt-row-btn">
                                        <a href="#" class="tt-btn-addtocart thumbprod-button-bg" data-toggle="modal" data-target="#modalAddToCartProduct">ADD TO CART</a>
                                    </div>
                                    <div class="tt-row-btn">
                                        <a href="#" class="tt-btn-quickview" data-toggle="modal" data-target="#ModalquickView"></a>
                                        <a href="#" class="tt-btn-wishlist"></a>
                                        <a href="#" class="tt-btn-compare"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>

            </div>
        </div>
    </div>

    <!--<div class="container-indent">
        <div class="container-fluid">
            <div class="tt-block-title">
                <h2 class="tt-title"><a target="_blank" href="https://www.instagram.com/optolensnepal/">@ FOLLOW</a> US ON</h2>
                <div class="tt-description">INSTAGRAM</div>
            </div>
            <div class="row">
                <div id="instafeed" class="instafeed-fluid"
                     data-accessToken="8626857013.dd09515.0fcd8351c65140d48f5a340693af1c3f"
                     data-clientId="dd095157744c4bd0a67181fc4906e5b6"
                     data-userId="8626857013"
                     data-limitImg="6">
                </div>
            </div>
        </div>
    </div>-->
    <hr>
    <div class="container-indent">
        <div class="container">
            <div class="row tt-services-listing">
                <div class="col-xs-12 col-md-6 col-lg-4">
                    <a href="#" class="tt-services-block">
                        <div class="tt-col-icon">
                            <i class="icon-f-48"></i>
                        </div>
                        <div class="tt-col-description">
                            <h4 class="tt-title">FREE SHIPPING</h4>
                            <p>Free shipping on all order </p>
                        </div>
                    </a>
                </div>
                <div class="col-xs-12 col-md-6 col-lg-4">
                    <a href="#" class="tt-services-block">
                        <div class="tt-col-icon">
                            <i class="icon-f-35"></i>
                        </div>
                        <div class="tt-col-description">
                            <h4 class="tt-title">SUPPORT 24/7</h4>
                            <p>Contact us 24 hours a day, 7 days a week</p>
                        </div>
                    </a>
                </div>
                <div class="col-xs-12 col-md-6 col-lg-4">
                    <a href="#" class="tt-services-block">
                        <div class="tt-col-icon">
                            <i class="icon-e-09"></i>
                        </div>
                        <div class="tt-col-description">
                            <h4 class="tt-title">30 DAYS RETURN</h4>
                            <p>Simply return it within 24 days for an exchange.</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>