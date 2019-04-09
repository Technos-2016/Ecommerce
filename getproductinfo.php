<?php

include_once 'connect.php';

function base_url() {
    return "http://localhost/theme/";
}

$pid = $_POST['pid'];
$psql = mysqli_query($connection, "select * from product where ProductID = '$pid'");
$row = mysqli_fetch_array($psql);
//$response = '';
$Pname = $row['Pname'];
$Pcode = $row['Pcode'];
$availability = $row['InStock'];
$Pdesc = $row['Pdesc'];
$beforedis = $row['BeforeDiscount'];
$afterdis = $row['AfterDiscount'];
$Pimage1 = $row['Pimage1'];
$Pimage2 = $row['Pimage2'];
$Pimage3 = $row['Pimage3'];
$Pimage4 = $row['Pimage4'];
$catid = $row['CategoryID'];


$cat = mysqli_query($connection, "select * from subcategory where ParentCatID = '$catid'");
$response = '<div class="tt-modal-quickview desctope">
                    <div class="row">
                        <div class="col-12 col-md-5 col-lg-6">
                            <div class="tt-mobile-product-slider arrow-location-center">
                                <div><img src="<?= base_url(); ?>images/loader.svg" data-src="<?= base_url(); ?>images/product/product-01.jpg" alt=""></div>
                                <div><img src="<?= base_url(); ?>images/loader.svg" data-src="<?= base_url(); ?>images/product/product-01-02.jpg" alt=""></div>
                                <div><img src="<?= base_url(); ?>images/loader.svg" data-src="<?= base_url(); ?>images/product/product-01-03.jpg" alt=""></div>
                                <div><img src="<?= base_url(); ?>images/loader.svg" data-src="<?= base_url(); ?>images/product/product-01-04.jpg" alt=""></div>
                                <div>
                                    <div class="tt-video-block">
                                        <a href="#" class="link-video"></a>
                                        <video class="movie" src="<?= base_url(); ?>video/video.mp4" poster="video/video_img.jpg"></video>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-7 col-lg-6">
                            <div class="tt-product-single-info">
                                <div class="tt-add-info">
                                    <ul>
                                        <li><span>SKU:</span> ' . $Pcode . '</li>
                                        <li><span>Availability:</span> ' . $availability . '</li>
                                    </ul>
                                </div>
                                <h2 class="tt-title">' . $Pname . '</h2>
                                <div class="tt-price">
                                    <span class="new-price">' . $afterdis . '</span>
                                    <span class="old-price">' . $beforedis . '</span>
                                </div>
                                <div class="tt-wrapper">
                                    ' . $Pdesc . '
                                </div>
                                <div class="tt-swatches-container">
                                    <div class="tt-wrapper">
                                        <div class="tt-title-options">POWER OPTION</div>
                                        <form class="form-default">
                                            <div class="form-group">
                                                <select name="type" id="type" class="form-control">';
while ($row1 = mysqli_fetch_array($cat)) {
    $response .= '<option value="' . $row1['SID'] . '">' . $row1['SubCategoryName'] . '</option>';
}
$response .= '</select>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="tt-wrapper">
                                <span class="text-danger"><i class="fa fa-asterisk"></i> For Power Please Chat With Optolens</span>
                                    <div class="tt-row-custom-01">
                                        <div  class="col-item" >
                                            <a href="https://m.me/optolensnepal" class="btn btn-lg" target="_new">Chat With US</a>
                                        </div>
                                        <div class="col-item">
                                            <a href="#" class="btn btn-lg addtocart" id="'.$pid.'"><i class="icon-f-39"></i>ADD TO CART</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';

echo $response;
?>

