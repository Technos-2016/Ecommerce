<?php include_once 'header.php'; ?>
<script>
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
    function selectCountry(val) {
        $("#search-box").val(val);
        $("#suggesstion-box").hide();
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
                <small>Insert Product</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Product</li>
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

            $query = mysqli_query($connection, "select max(ProductID) as pid from product");
            $result = mysqli_fetch_array($query);
            $productid = $result['pid'] + 1;

            $file_dir = "../images/product/$productid/";

            /* Check if folder not exists, then create it */
            if (!file_exists($file_dir)) {
                mkdir($file_dir, 0777, true);
            }

            /* conversi multi array */

            function diverse_array($array) {
                $result = [];
                foreach ($array as $key1 => $value1)
                    foreach ($value1 as $key2 => $value2)
                        $result[$key2][$key1] = $value2;

                return $result;
            }

            $file_multi = diverse_array($_FILES['upload']);

            for ($y = 0; $y < 4; $y++) {
                $image[$y] = '';
            }

            /* loop multi file */
            for ($x = 0; $x < count($file_multi); $x++) {

                /* loop array file $_FILES */
                foreach ($file_multi[$x] as $key => $value) {

                    $file_name = $file_multi[$x]['name'];
                    $file_size = $file_multi[$x]['size'];
                    $file_tmp = $file_multi[$x]['tmp_name'];

//                    $fileinfo = @getimagesize($file_multi[$x]["tmp_name"]);
//                    $width = $file_tmp[0];
//                    $height = $file_tmp[1];

                    $file_target = $file_dir . $file_name;

                    $errors = array();

                    /* Check current file formats with file secure */
                    $file_secure = array('jpg', 'jpeg', 'png');
                    $file_current = strtolower(pathinfo($file_name, PATHINFO_EXTENSION)); /* (end(explode('.', $file_name) */

                    if (in_array($file_current, $file_secure) === false) {
                        $errors[] = "Sorry, <strong>{$file_current}</strong> extension not allowed";
                    } else if ($file_size > 2000000) {
                        $errors[] = "Sorry, <strong>{$file_size}</strong> is greater than 2MB";
                    }
                }

                /* Check if Errors exist, then not upload. Or if Errors NOT exist, then try upload */
                if (!empty($errors)) {

                    /* display error */
                    foreach ($errors as $keyError => $valueError) {
                        echo "$keyError = $valueError <br />";
                    }
                } else {

                    if (move_uploaded_file($file_tmp, $file_target)) {

                        $image[$x] = $file_name;

                        //echo "<strong>{$file_name}</strong> has been uploaded." . "<br />";
                    } else {

                        echo "Sorry, there was an something wrong in <b>move_uploaded</b>.";
                    }
                }
            }

            /* Check for error */
            if (!empty($errors)) {

                /* Check errors and display them */
                foreach ($errors as $keyError => $valueError) {
                    echo "$keyError = $valueError <br />";
                }

                /* if everything is ok, try to upload file */
            } else {

                /* Insert Form Data into Database */
                $image1 = $image[0];
                $image2 = $image[1];
                $image3 = $image[2];
                $image4 = $image[3];
                $sql = mysqli_query($connection, "insert into product(CategoryID,SubCatID,Pcode,Pname,Pbrand,Pprice,Ptype,Pimage1,Pimage2,Pimage3,Pimage4,Prelated,Pdesc,InStock,BeforeDiscount,AfterDiscount,ShippingCharge,NetAmount,CreatedBy)"
                        . " values('$category','$subcat','$productcode','$productname','$productcompany','$productpricebd','$ptype','$image1','$image2','$image3','$image4','$prelated','$productdescription','$productavailability','$productpricebd','$productprice','$productscharge','$netamt','$ismember')");
                $response = array(
                    "type" => "success",
                    "message" => "Successfully Uploaded the product.."
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
                                    echo "Insert Product";
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
                                                <option value="<?php echo $row['CatID']; ?>"><?php echo $row['CategoryName']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="basicinput">Sub Category</label>
                                    <div class="col-sm-8">
                                        <select   name="subcategory[]"  id="subcategory" class="form-control select2 multiple" multiple="" required>
                                            <option value="">Please Select Sub-Category</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="basicinput">Product Type</label>
                                    <div class="col-sm-8">
                                        <select name="ptype" id="ptype" class="form-control select2" required>
                                            <option value="">Please Select Product Type</option>
                                            <option value="1">LATEST</option>
                                            <option value="2">POPULAR</option>
                                        </select> 
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="basicinput">Product Code</label>
                                    <div class="col-sm-8">
                                        <input type="text"    name="productCode"  placeholder="Enter Product Code" class="form-control" >
                                        <p class="help-block">Enter Product Code in the format like ABC0123(7 Digit)</p>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="basicinput">Product Name</label>
                                    <div class="col-sm-8">
                                        <input type="text"    name="productName"  placeholder="Enter Product Name" class="form-control" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="basicinput">Product Brand</label>
                                    <div class="col-sm-8">
                                        <input type="text"    name="productCompany"  placeholder="Enter Product Comapny Name" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="basicinput">Product Price Before Discount</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="productpricebd"  placeholder="Enter Product Price" class="form-control" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="basicinput">Product Price After Discount(Selling Price)</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="productprice"  placeholder="Enter Product Price" class="form-control" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="basicinput">Product Description</label>
                                    <div class="col-sm-8">
                                        <textarea  name="productDescription"  placeholder="Enter Product Description" rows="3" class="form-control textarea">
                                        </textarea>  
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="basicinput">Product Shipping Charge</label>
                                    <div class="col-sm-8">
                                        <input type="text"    name="productShippingcharge"  placeholder="Enter Product Shipping Charge" class="form-control" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="basicinput">Product Availability</label>
                                    <div class="col-sm-8">
                                        <select   name="productAvailability"  id="productAvailability" class="form-control" required>
                                            <option value="">Select</option>
                                            <option value="In Stock">In Stock</option>
                                            <option value="Out of Stock">Out of Stock</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="basicinput">Product Image</label>
                                    <div class="col-sm-8">
                                        <input type="file" name="upload[]" onchange="previewFiles()" multiple class="form-control"/>
                                        <p class="help-block">Browse Product Image here of size 930 * 1163.Upload Upto 4 Image only</p>
                                    </div>

                                </div>


                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="basicinput">Product Related</label>
                                    <div class="col-sm-8">
                                        <select name="related[]" class="form-control select2" multiple="true">
                                            <option value="">Select Product Related</option> 
                                            <?php
                                            $query = mysqli_query($connection, "select * from category");
                                            while ($row = mysqli_fetch_array($query)) {
                                                ?>
                                                <option value="<?php echo $row['CatID']; ?>"><?php echo $row['CategoryName']; ?></option>
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

    function previewFiles() {

        var preview = document.querySelector('#preview');
        var files = document.querySelector('input[type=file]').files;

        function readAndPreview(file) {

            /* Make sure `file.name` matches our extensions criteria */
            if (/\.(jpe?g|png|gif)$/i.test(file.name)) {
                var reader = new FileReader();

                reader.addEventListener("load", function () {
                    var image = new Image();

                    image.height = 100;
                    image.title = file.name;
                    image.src = this.result;

                    preview.appendChild(image);
                }, false);

                reader.readAsDataURL(file);
            }

        }

        if (files) {
            [].forEach.call(files, readAndPreview);
        }

    }
</script>