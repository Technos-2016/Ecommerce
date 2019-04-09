<?php include_once 'header.php'; ?>
<div class="wrapper">
    <?php
    include_once 'sideheader.php';
    include_once 'sidebar.php';
    ?>

    <?php
    if (isset($_POST['addslider'])) {
        $caption = mysqli_real_escape_string($connection, $_POST['caption']);
        $subcaption = mysqli_real_escape_string($connection, $_POST['subcaption']);
        $isactive = mysqli_real_escape_string($connection, $_POST['isactive']);
        $viewid = mysqli_real_escape_string($connection, $_POST['viewid']);
        $imgorder = mysqli_real_escape_string($connection, $_POST['imgorder']);

        $icheck = mysqli_query($connection, "select ImgOrder from slider where ViewID = '1' AND IsActive = 'Active' AND ImgOrder = '$imgorder'");
        $count = mysqli_num_rows($icheck);


        // Get Image Dimension
        $fileinfo = @getimagesize($_FILES["slider"]["tmp_name"]);
        $width = $fileinfo[0];
        $height = $fileinfo[1];

        $allowed_image_extension = array(
            "png",
            "jpg",
            "jpeg"
        );

        // Get image file extension
        $file_extension = pathinfo($_FILES["slider"]["name"], PATHINFO_EXTENSION);

        // Validate file input to check if is not empty
        if (!file_exists($_FILES["slider"]["tmp_name"])) {
            $response = array(
                "type" => "error",
                "message" => "Choose image file to upload."
            );
        }    // Validate file input to check if is with valid extension
        else if (!in_array($file_extension, $allowed_image_extension)) {
            $response = array(
                "type" => "error",
                "message" => "Upload valiid images. Only PNG and JPEG are allowed."
            );
            echo $result;
        }    // Validate image file size
        else if (($_FILES["slider"]["size"] > 2000000)) {
            $response = array(
                "type" => "error",
                "message" => "Image size exceeds 2MB"
            );
        }    // Validate image file dimension
        else if ($width > "1920" || $height > "800") {
            $response = array(
                "type" => "error",
                "message" => "Image dimension should be within 1920 X 800"
            );
        } else {
            $imgname = basename($_FILES["slider"]["name"]);
            $target = "../images/slides/" . basename($_FILES["slider"]["name"]);
            if (move_uploaded_file($_FILES["slider"]["tmp_name"], $target)) {
                if ($count > 0) {
                    unlink($target);
                    $response = array(
                        "type" => "error",
                        "message" => "You Have the slider Image With this position.."
                    );
                } else {
                    $insert = mysqli_query($connection, "INSERT INTO slider(Image,Caption,SubCaption,IsActive,ViewID,ImgOrder,CreatedBy)VALUES('$imgname','$caption','$subcaption','$isactive','$viewid','$imgorder','$ismember')");
                    $response = array(
                        "type" => "success",
                        "message" => "Slider uploaded successfully."
                    );
                }
            } else {
                $response = array(
                    "type" => "error",
                    "message" => "Problem in uploading image files."
                );
            }
        }
    } else if (isset($_POST['updateslider'])) {
        $id = mysqli_real_escape_string($connection, $_POST['slideid']);
        $sliderimage = mysqli_real_escape_string($connection, $_POST['sliderimage']);
        $ucaption = mysqli_real_escape_string($connection, $_POST['ucaption']);
        $usubcaption = mysqli_real_escape_string($connection, $_POST['usubcaption']);
        $uisactive = mysqli_real_escape_string($connection, $_POST['uisactive']);
        $uviewid = mysqli_real_escape_string($connection, $_POST['uviewid']);
        $uimgorder = mysqli_real_escape_string($connection, $_POST['uimgorder']);
        $ucheck = mysqli_query($connection, "select ImgOrder from slider where ViewID = '1' AND IsActive = 'Active' AND ImgOrder = '$uimgorder'");
        $ucount = mysqli_num_rows($ucheck);
        if ($ucount > 0) {
            $response = array(
                "type" => "error",
                "message" => "Update ImgOrder Already Active for Other Slider.."
            );
        } else {
            $update = mysqli_query($connection, "UPDATE slider SET Image = '$sliderimage',Caption='$ucaption',SubCaption='$usubcaption',IsActive='$uisactive',ViewID='$uviewid',ImgOrder='$uimgorder',ModifiedDate='$mdatetime' WHERE SliderID = '$id'");
            if ($update) {
                $response = array(
                    "type" => "success",
                    "message" => "Slider Successfully Uploaded.."
                );
            } else {
                $response = array(
                    "type" => "error",
                    "message" => "Problem in updating data."
                );
            }
        }
    } else if (isset($_GET['sid'])) {
        $delid = $_GET['sid'];
        $sqlcheck = mysqli_query($connection, "select Image from slider where SliderID = '$delid'");
        $get = mysqli_fetch_array($sqlcheck);
        $filename = $get['Image'];
        mysqli_query($connection, "DELETE FROM slider WHERE SliderID = '$delid' ");
        unlink("../images/slides/" . $filename);
        $response = array(
            "type" => "success",
            "message" => "Slider successfully Deleted."
        );
    }
    ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Manage Slider
                <small>Your Active Slider</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Slider</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-4">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <?php if (!empty($response)) { ?>
                                <div class="response <?php echo $response["type"]; ?>"><?php echo "<span class='label label-primary'>" . $response['message'] . "<span><script>setTimeout(\"location.href = 'manageslider';\",3000);</script>"; ?></div>
                            <?php } ?>
                        </div>
                        <!-- /.box-header -->

                        <?php
                        if (isset($_GET['edit'])) {
                            $editid = $_GET['edit'];
                            $sqledit = mysqli_query($connection, "select * from slider where SliderID = '$editid'");
                            $rowedit = mysqli_fetch_array($sqledit);
                            ?>
                            <!-- form start -->
                            <form class="text-sm" role="form" action="" method="post" enctype="multipart/form-data">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="Caption">Slider Caption:</label>
                                        <input type="text" class="form-control" id="ucaption"  name="ucaption" value="<?php echo $rowedit['Caption']; ?>" >
                                        <input type="hidden" id="slideid"  name="slideid" value="<?php echo $editid; ?>" >
                                    </div>
                                    <div class="form-group">
                                        <label for="SubCaption">Sub-Caption:</label>
                                        <input type="text" class="form-control" id="usubcaption"   name="usubcaption" value="<?php echo $rowedit['SubCaption']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="Image">Slider Image:</label>
                                        <input type="hidden" id="sliderimage" name="sliderimage" class="slider"  value="<?php echo $rowedit['Image']; ?>" >
                                        <img src="<?php echo base_url() . "images/slides/" . $rowedit['Image']; ?>" width="100px" height="60px" class="img img-circle">
                                    </div>

                                    <div class="form-group">
                                        <label>IsActive:</label>
                                        <select name="uisactive" id="uisactive" class="form-control required select2" required>
                                            <option value="">Select Status</option>
                                            <option value="Active" <?php
                                            if ($rowedit['IsActive'] == "Active") {
                                                echo 'selected';
                                            }
                                            ?>>Active</option>
                                            <option value="InActive" <?php
                                            if ($rowedit['IsActive'] == "InActive") {
                                                echo 'selected';
                                            }
                                            ?> >InActive</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>View Type</label>
                                        <select name="uviewid" id="uviewid" class="form-control required select2" required>
                                            <option value="">Select Status</option>
                                            <option value="1" <?php
                                            if ($rowedit['ViewID'] == 1) {
                                                echo 'selected';
                                            }
                                            ?>>Front</option>
                                            <option value="2" <?php
                                            if ($rowedit['ViewID'] == 2) {
                                                echo 'selected';
                                            }
                                            ?>>For Option</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Image Order</label>
                                        <select name="uimgorder" id="uimgorder" class="form-control required select2" required>
                                            <option value="">Select ImgOrder</option>
                                            <option value="First" <?php
                                            if ($rowedit['ImgOrder'] == "First") {
                                                echo 'selected';
                                            }
                                            ?>>First</option>
                                            <option value="Second" <?php
                                            if ($rowedit['ImgOrder'] == "Second") {
                                                echo 'selected';
                                            }
                                            ?> >Second</option>
                                            <option value="Third" <?php
                                            if ($rowedit['ImgOrder'] == "Third") {
                                                echo 'selected';
                                            }
                                            ?>>Third</option>
                                            <option value="Fourth" <?php
                                            if ($rowedit['ImgOrder'] == "Fourth") {
                                                echo 'selected';
                                            }
                                            ?>>Fourth</option>
                                            <option value="Fifth" <?php
                                            if ($rowedit['ImgOrder'] == "Fifth") {
                                                echo 'selected';
                                            }
                                            ?>>Fifth</option>
                                            <option value="Sixth" <?php
                                            if ($rowedit['ImgOrder'] == "Sixth") {
                                                echo 'selected';
                                            }
                                            ?> >Sixth</option>
                                        </select>
                                    </div>

                                </div>
                                <!-- /.box-body -->

                                <div class="box-footer">
                                    <button type="submit" name="updateslider" id="updateslider" class="btn btn-success pull-right" >Update Slider</button>
                                </div>
                            </form>
                            <?php
                        } else {
                            ?>
                            <!-- form start -->
                            <form class="text-sm" role="form" action="" method="post" enctype="multipart/form-data">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="Caption">Slider Caption:</label>
                                        <input type="text" class="form-control" id="caption"  name="caption" placeholder="Enter Slider Caption" >
                                    </div>
                                    <div class="form-group">
                                        <label for="SubCaption">Sub-Caption:</label>
                                        <input type="text" class="form-control" id="subcaption"   name="subcaption" placeholder="Enter Sub Caption">
                                    </div>
                                    <div class="form-group">
                                        <label for="Image">Slider Image:</label>
                                        <input type="file" id="slider" name="slider" class="slider"  required >
                                        <p class="help-block">Browse Slider Image here of size 1920 * 800.</p>
                                    </div>

                                    <div class="form-group">
                                        <label>IsActive:</label>
                                        <select name="isactive" id="isactive" class="form-control required select2" required>
                                            <option value="">Select Status</option>
                                            <option value="Active" >Active</option>
                                            <option value="InActive" >InActive</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>View Type</label>
                                        <select name="viewid" id="viewid" class="form-control required select2" required>
                                            <option value="">Select Status</option>
                                            <option value="1" >Front</option>
                                            <option value="2" >For Option</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Image Order</label>
                                        <select name="imgorder" id="imgorder" class="form-control required select2" required>
                                            <option value="">Select ImgOrder</option>
                                            <option value="First" >First</option>
                                            <option value="Second" >Second</option>
                                            <option value="Third" >Third</option>
                                            <option value="Fourth" >Fourth</option>
                                            <option value="Fifth" >Fifth</option>
                                            <option value="Sixth" >Sixth</option>
                                        </select>
                                    </div>

                                </div>
                                <!-- /.box-body -->

                                <div class="box-footer">
                                    <button type="submit" name="addslider" id="addslider" class="btn btn-success pull-right" >Add Slider</button>
                                </div>
                            </form>
                            <?php
                        }
                        ?>


                    </div>
                    <!-- /.box -->
                </div>

                <div class="col-md-8">

                    <div class="box box-solid">
                        <div class="box-header with-border">
                            <div class="box-title">
                                <span class="text-bold">Slider List</span>
                            </div>
                        </div>

                        <div class="box-body">
                            <table id="slide" class="table table-sm text-center text-sm table-condensed table-bordered">
                                <thead class="bg-black">
                                    <tr>
                                        <th>Slider Image</th>
                                        <th>Caption</th>
                                        <th>Sub-caption</th>
                                        <th>ImgOrder</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $slidersql = mysqli_query($connection, "select * from slider order by ViewID Desc");
                                    while ($row = mysqli_fetch_array($slidersql)) {
                                        $slideid = $row['SliderID'];
                                        $slidename = $row['Image'];
                                        ?>
                                        <tr>
                                            <td><a   href="#enlarge<?php echo $slideid ?>" data-target="#enlarge<?php echo $slideid; ?>" data-toggle="modal" data-title="Enlarge Image" ><img class="img img-circle" src="<?php echo base_url() . "images/slides/" . $slidename; ?>" width="60px" height="60px"/></a></td>
                                            <td><?php echo $row['Caption']; ?></td>
                                            <td><?php echo $row['SubCaption']; ?></td>
                                            <td><?php echo "<span class='label label-primary'>" . $row['ImgOrder'] . "</span>"; ?></td>
                                            <td><?php echo $row['IsActive']; ?></td>
                                            <td>
                                                <a class="btn btn-sm bg-primary" href="manageslider?edit=<?php echo $slideid; ?>" data-toggle="tooltip" data-title="Edit Slider" ><i class="fa fa-edge"></i></a>
                                                &nbsp; &nbsp; | &nbsp; &nbsp;
                                                <a class="btn btn-sm bg-red delete" href="manageslider?sid=<?php echo $slideid; ?>" data-toggle="tooltip" data-title="Delete Slider Image"><i class="fa fa-trash-o"></i></a>
                                            </td>
                                        </tr>

                                    <div class="modal fade" id="enlarge<?php echo $slideid ?>" tabindex="-1" role="dialog" aria-labelledby="enlarged" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bg-red-active">
                                                    <span class="text-bold"><?php echo $row['Caption'] . " - " . $row['SubCaption']; ?></span>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                </div>
                                                <div class="modal-body">
                                                    <img src="<?php echo base_url() . "images/slides/" . $slidename; ?>" class="enlargeImageModalSource img-rounded" style="width: 100%;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                }
                                ?>
                                </tbody>
                            </table>
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
    $(function () {
        //Datatable
        $('#slide').DataTable({
            'paging': true,
            'lengthChange': false,
            'searching': true,
            'ordering': true,
            'info': true,
            'autoWidth': false
        })
    })
    //select2
    $('.select2').select2()

    $("a.delete").click(function (e) {
        if (!confirm('Are you sure?')) {
            e.preventDefault();
            return false;
        }
        return true;
    });


    $("img[data-picture_id]").click(function (e) {
        //Set the value of the hidden input field
        $("input[name='sliderimage']").val($(this).data('picture_id'));
    });
</script>