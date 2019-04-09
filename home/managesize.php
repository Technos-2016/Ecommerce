<?php
include_once 'header.php';
?>
<div class="wrapper">
    <?php
    include_once 'sideheader.php';
    include_once 'sidebar.php';
    ?>

    <?php
    if (isset($_POST['addsize'])) {
        $sizename = mysqli_real_escape_string($connection, strtoupper($_POST['sizename']));
        $sizecode = mysqli_real_escape_string($connection, strtoupper($_POST['sizecode']));
        $sizestatus = mysqli_real_escape_string($connection, $_POST['sizestatus']);
        $checksize = mysqli_query($connection, "select * from size where SizeName = '$sizename' AND SizeCode='$sizecode'");
        if (mysqli_num_rows($checksize) > 0) {
            $msg = "Size Name Already Exist..";
        } else if (!empty($sizename or $sizecode)) {
            mysqli_query($connection, "INSERT INTO size(SizeName,SizeCode,CreatedDate,SizeStatus,CreatedBy)VALUES('$sizename','$sizecode','$cdatetime','$sizestatus','$ismember')");
            $msg = "You Have Successfully Created the Size..";
        }
    } else if (isset($_POST['updatesize'])) {
        $sizeid = $_POST['sid'];
        $usizename = $_POST['usizename'];
        $usizecode = $_POST['usizecode'];
        $cstatus = $_POST['cstatus'];
        $uchecksize = mysqli_query($connection, "select * from size where SizeName = '$usizename' AND SizeCode='$usizecode' AND SizeStatus = '$cstatus'");
        if (mysqli_num_rows($uchecksize) > 0) {
            $msg = "Size Name Already Exist..";
        } else {
            mysqli_query($connection, "UPDATE size SET SizeName = '$usizename',ModifiedDate='$mdatetime',SizeCode='$usizecode',SizeStatus='$cstatus' WHERE SizeID = '$sizeid' ");
            $msg = "SuccessFully Updated the Size.";
        }
    } else if (isset($_GET['del'])) {
        $delid = $_GET['del'];
        mysqli_query($connection, "DELETE FROM size WHERE SizeID = '$delid' ");
        $msg = "SuccessFully Deleted..";
    }
    ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Manage Size
                <small>Size List</small>
            </h1>
            <ol class="breadcrumb">
                <?php
                if (isset($msg)) {
                    echo "<span class='label label-primary'>" . $msg . "<span><script>setTimeout(\"location.href = 'managesize';\",2500);</script>";
                }
                ?>
            </ol>
        </section>


        <!-- Main content -->
        <section class="content">

            <div class="row">

                <?php
                if (isset($_GET['editsize'])) {
                    $sid = $_GET['editsize'];
                    $esize = mysqli_query($connection, "select SizeName,SizeCode,SizeStatus from size where SizeID = '$sid'");
                    $ures = mysqli_fetch_array($esize);
                    ?>
                    <div class="col-sm-4">
                        <div class="box box-info">
                            <div class="box-header">
                                <span class="box-title">Update Size</span>
                            </div>
                            <div class="box-body">
                                <div class="col-sm-12">
                                    <form class="form-horizontal" method="post" action="">

                                        <div class="form-group">
                                            <label>Size Name:</label>
                                            <input type="text" name="usizename" id="usizename" class="form-control" value="<?php echo $ures['SizeName']; ?>" required>
                                            <input type="hidden" name="sid" id="sid"  value="<?php echo $sid; ?>" >

                                        </div>
                                        <div class="form-group">
                                            <label>Set Code:</label>
                                            <input type="text" name="usizecode" id="usizecode" class="form-control" required value="<?php echo $ures['SizeCode']; ?>">
                                        </div>

                                        <div class="form-group">
                                            <label>Color Status:</label>
                                            <select name="cstatus" id="cstatus" class="form-control required select2" required>
                                                <option value="">Select Size Status</option>
                                                <option value="Active" <?php
                                                if ($ures['SizeStatus'] == "Active") {
                                                    echo "selected";
                                                }
                                                ?>>Active</option>
                                                <option value="InActive" <?php
                                                if ($ures['SizeStatus'] == "InActive") {
                                                    echo "selected";
                                                }
                                                ?>>InActive</option>
                                            </select>
                                        </div>

                                        <hr>
                                        <a class="btn btn-flat pull-left bg-blue" href="managesize" ><i class="fa fa-angle-double-left"></i></a>
                                        <input type="submit" name="updatesize" id="updatesize" class="btn btn-flat bg-red pull-right" value="Update Size">

                                    </form>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <?php
                } else {
                    ?>
                    <div class="col-sm-4">
                        <div class="box box-info">
                            <div class="box-header">
                                <span class="box-title">Add Size</span>
                            </div>
                            <div class="box-body">
                                <div class="col-sm-12">
                                    <form class="form-horizontal" method="post" action="">

                                        <div class="form-group">
                                            <label>Size Name:</label>
                                            <input type="text" name="sizename" id="sizename" class="form-control" placeholder="Like Small, Medium, Large" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Pick Size:</label>
                                            <input type="text" name="sizecode" id="sizecode" class="form-control" required placeholder="Like SM,XL,L,XXL">
                                        </div>
                                        <div class="form-group">
                                            <label>Color Status:</label>
                                            <select name="sizestatus" id="sizestatus" class="form-control required select2" required>
                                                <option value="">Select Size Status</option>
                                                <option value="Active" >Active</option>
                                                <option value="InActive" >InActive</option>
                                            </select>
                                        </div>
                                        <hr>

                                        <input type="submit" name="addsize" id="addsize" class="btn btn-flat bg-red pull-right" value="Add Size">
                                    </form>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <?php
                }
                ?>




                <div class="col-sm-8">
                    <div class="box box-primary">
                        <div class="box-header">
                            <span class="box-title">Size List</span>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="size" class="table table-bordered table-striped text-sm text-center">
                                <thead class="bg-red">
                                    <tr>
                                        <th>Size Name</th>
                                        <th>Size Code</th>
                                        <th>Created Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sqlsize = mysqli_query($connection, "select * from size ");
                                    while ($res = mysqli_fetch_array($sqlsize)) {
                                        $sizeid = $res['SizeID'];
                                        ?>
                                        <tr>
                                            <td><?php echo $res['SizeName']; ?></td>
                                            <td><?php echo $res['SizeCode']; ?></td>
                                            <td><?php echo $res['CreatedDate']; ?></td>
                                            <td><?php
                                                if ($res['SizeStatus'] == "Active") {
                                                    echo "<span class='label label-success'>" . $res['SizeStatus'] . "</span>";
                                                } else {
                                                    echo "<span class='label label-danger'>" . $res['SizeStatus'] . "</span>";
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <a href="managesize?editsize=<?php echo $sizeid; ?>" data-title="Edit Size" data-toggle="tooltip"><i class="fa  fa-edit text-black"></i></a>
                                                &nbsp; | &nbsp;
                                                <a href="managesize?del=<?php echo $sizeid; ?>" data-title="Delete Size" data-toggle="tooltip" class="delete"><i class="fa fa-trash-o text-red"></i></a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
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
        $('#size').DataTable({
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
</script>