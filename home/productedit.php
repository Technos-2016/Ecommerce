<?php
include_once 'header.php';
$pid = $_GET['pid'];

$prosql = mysqli_query($connection, "select * from product where ProductID = '$pid'");
$row = mysqli_fetch_array($prosql);
$catid = $row['CategoryID'];
$subcatid = explode(",", $row['SubCatID']);
$ptype = $row['Ptype'];
$pcode = $row['Pcode'];
$pname = $row['Pname'];
$pbrand = $row['Pbrand'];
$beforedis = $row['BeforeDiscount'];
$afterdis = $row['AfterDiscount'];
$pdesc = $row['Pdesc'];
$pship = $row['ShippingCharge'];
$instock = $row['InStock'];
$prelated = explode(",", $row['Prelated']);
?>
<script>
    document.getElementById("subcategory").selectedIndex = true;
    document.getElementById("related").selectedIndex = true;

    function getSubcat(val) {
        $.ajax({
            type: "POST",
            url: "get_subcat.php",
            data: 'cat_id=' + val,
            success: function (data) {
                $("#subcategory").html(data);
            }
        });
    }
</script>	

<div class="wrapper">
    <?php
    include_once 'sideheader.php';
    include_once 'sidebar.php';
    ?>


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Manage Product
                <small>Edit Product</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Edit Product</li>
            </ol>
        </section>

        <?php
        if (isset($_POST['submit'])) {
            $category = $_POST['category'];
            $sub = $_POST['subcategory'];
            $subcat = implode(', ', $sub);
            $productname = $_POST['productName'];
            $productcode = $_POST['productCode'];
            $productcompany = $_POST['productCompany'];
            $productprice = $_POST['productprice'];
            $productpricebd = $_POST['productpricebd'];
            $productdescription = $_POST['productDescription'];
            $productscharge = $_POST['productShippingcharge'];
            $productavailability = $_POST['productAvailability'];
            $ptype = $_POST['ptype'];
            $related = $_POST['related'];
            $prelated = implode(', ', $related);
            $netamt = $productprice;


            $sql = mysqli_query($connection, "UPDATE product SET CategoryID='$category',SubCatID='$subcat',Pcode='$productcode',Pname='$productname',Pbrand='$productcompany',Pprice='$productpricebd',Ptype='$ptype',Prelated='$prelated',Pdesc='$productdescription',InStock='$productavailability',BeforeDiscount='$productpricebd',AfterDiscount='$productprice',ShippingCharge='$productscharge',NetAmount='$netamt',ModifiedDate='$mdatetime' WHERE ProductID = '$pid'");
            if ($sql == true) {
                $response = array(
                    "type" => "success",
                    "message" => "Successfully Uploaded the product.."
                );
            } else {
                $response = array(
                    "type" => "error",
                    "message" => "Error Uploaded the product.."
                );
            }
        }
        ?>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-solid">
                        <div class="box-header bg-blue">
                            <span class="text-bold"><?php if (!empty($response)) { ?>
                                    <div class="response <?php echo $response["type"]; ?>"><?php echo "<span class='label label-primary'>" . $response['message'] . "<span><script>setTimeout(\"location.href = 'productlist';\",3000);</script>"; ?></div>
                                    <?php
                                } else {
                                    echo "Edit Product";
                                }
                                ?></span>
                        </div>
                        <div class="box-body">
                            <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">

                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="basicinput">Select Category</label>
                                    <div class="col-sm-8">
                                        <select name="category" class="form-control select2"  onChange="getSubcat(this.value);"  required>
                                            <option value="">Select Category</option> 
                                            <?php
                                            $query = mysqli_query($connection, "select * from category");
                                            while ($row = mysqli_fetch_array($query)) {
                                                ?>
                                                <option value="<?php echo $row['CatID']; ?>" <?php
                                                if ($catid == $row['CatID']) {
                                                    echo "selected";
                                                }
                                                ?>><?php echo $row['CategoryName']; ?></option>
                                                    <?php } ?>
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="basicinput">Sub Category</label>
                                    <div class="col-sm-8">
                                        <select   name="subcategory[]"  id="subcategory" class="form-control select2 multiple" multiple="" required>
                                            <option value="">Please Select Sub-Category</option>
                                            <?php
                                            $squery = mysqli_query($connection, "select * from subcategory where ParentCatID = '$catid' ");
                                            while ($sub = mysqli_fetch_array($squery)) {
                                                ?>
                                                <option value="<?php echo $sub['SID']; ?>" <?php
                                                foreach ($subcatid as $val) {
                                                    if ($sub['SID'] == $val) {
                                                        echo "selected";
                                                    }
                                                }
                                                ?>><?php echo $sub['SubCategoryName']; ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="basicinput">Product Type</label>
                                    <div class="col-sm-8">
                                        <select name="ptype" id="ptype" class="form-control select2" required>
                                            <option value="">Please Select Product Type</option>
                                            <option value="1" <?php
                                            if ($ptype == 1) {
                                                echo "selected";
                                            }
                                            ?>>LATEST</option>
                                            <option value="2" <?php
                                            if ($ptype == 2) {
                                                echo "selected";
                                            }
                                            ?>>POPULAR</option>
                                        </select> 
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="basicinput">Product Code</label>
                                    <div class="col-sm-8">
                                        <input type="text"    name="productCode"  value="<?php echo $pcode; ?>" class="form-control" >
                                        <p class="help-block">Enter Product Code in the format like ABC0123(7 Digit)</p>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="basicinput">Product Name</label>
                                    <div class="col-sm-8">
                                        <input type="text"    name="productName"  value="<?php echo $pname; ?>" class="form-control" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="basicinput">Product Brand</label>
                                    <div class="col-sm-8">
                                        <input type="text"    name="productCompany"  value="<?php echo $pbrand; ?>" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="basicinput">Product Price Before Discount</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="productpricebd"  value="<?php echo $beforedis; ?>" class="form-control" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="basicinput">Product Price After Discount(Selling Price)</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="productprice"  value="<?php echo $afterdis; ?>" class="form-control" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="basicinput">Product Description</label>
                                    <div class="col-sm-8">
                                        <textarea  name="productDescription"  value="<?php echo $pdesc; ?>" rows="3" class="form-control textarea">
                                            <?php echo $pdesc; ?>
                                        </textarea>  
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="basicinput">Product Shipping Charge</label>
                                    <div class="col-sm-8">
                                        <input type="text"    name="productShippingcharge"  value="<?php echo $pship; ?>" class="form-control" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="basicinput">Product Availability</label>
                                    <div class="col-sm-8">
                                        <select   name="productAvailability"  id="productAvailability" class="form-control" required>
                                            <option value="">Select</option>
                                            <option value="In Stock" <?php
                                            if ($instock == "In Stock") {
                                                echo "selected";
                                            }
                                            ?>>In Stock</option>
                                            <option value="Out of Stock" <?php
                                            if ($instock == "Out of Stock") {
                                                echo "selected";
                                            }
                                            ?>>Out of Stock</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="basicinput">Product Related</label>
                                    <div class="col-sm-8">
                                        <select name="related[]" id="related" class="form-control select2" multiple="true">
                                            <option value="">Select Product Related</option> 
                                            <?php
                                            $query = mysqli_query($connection, "select * from category");
                                            while ($row = mysqli_fetch_array($query)) {
                                                ?>
                                                <option value="<?php echo $row['CatID']; ?>" <?php
                                                foreach ($prelated as $p) {
                                                    if ($p == $row['CatID']) {
                                                        echo "selected";
                                                    }
                                                }
                                                ?>><?php echo $row['CategoryName']; ?></option>
                                                    <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-8">
                                        <button type="submit" name="submit" class="btn btn-sm pull-right btn-primary">Insert</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php
    include_once 'copyright.php';
    ?>

</div>
<!-- ./wrapper -->

<?php
include_once 'footer.php';
?>
<script>
    $('.select2').select2()
</script>