<?php
include_once 'header.php';
?>
<div class="wrapper">
    <?php
    include_once 'sideheader.php';
    include_once 'sidebar.php';
    ?>

    <?php
    if (isset($_POST['addcolor'])) {
        $colorname = mysqli_real_escape_string($connection, strtoupper($_POST['colorname']));
        $colorcode = mysqli_real_escape_string($connection, strtoupper($_POST['colorcode']));
        $colorstatus = mysqli_real_escape_string($connection, $_POST['colorstatus']);
        $checkcolor = mysqli_query($connection, "select * from color where ColorName = '$colorname' AND ColorCode='$colorcode'");
        if (mysqli_num_rows($checkcolor) > 0) {
            $msg = "Color Name Already Exist..";
        } else if (!empty($colorname or $colorcode)) {
            mysqli_query($connection, "INSERT INTO color(ColorName,ColorCode,CreatedDate,ColorStatus,CreatedBy)VALUES('$colorname','$colorcode','$cdatetime','$colorstatus','$ismember')");
            $msg = "You Have Successfully Created the Color..";
        }
    } else if (isset($_POST['updatecolor'])) {
        $colid = $_POST['colid'];
        $ucolorname = $_POST['ucolorname'];
        $ucolorcode = $_POST['ucolorcode'];
        $cstatus = $_POST['cstatus'];
        $ucheckcolor = mysqli_query($connection, "select * from color where ColorName = '$ucolorname' AND ColorCode='$ucolorcode' AND ColorStatus = '$cstatus'");
        if (mysqli_num_rows($ucheckcolor) > 0) {
            $msg = "Color Name Already Exist..";
        } else {
            mysqli_query($connection, "UPDATE color SET ColorName = '$ucolorname',ModifiedDate='$mdatetime',ColorCode='$ucolorcode',ColorStatus='$cstatus' WHERE ColorID = '$colid' ");
            $msg = "SuccessFully Updated..";
        }
    } else if (isset($_GET['del'])) {
        $delid = $_GET['del'];
        mysqli_query($connection, "DELETE FROM color WHERE ColorID = '$delid' ");
        $msg = "SuccessFully Deleted..";
    }
    ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Manage Color
                <small>Color List</small>
            </h1>
            <ol class="breadcrumb">
                <?php
                if (isset($msg)) {
                    echo "<span class='label label-primary'>" . $msg . "<span><script>setTimeout(\"location.href = 'managecolor';\",2500);</script>";
                }
                ?>
            </ol>
        </section>


        <!-- Main content -->
        <section class="content">

            <div class="row">

                <?php
                if (isset($_GET['editcolor'])) {
                    $colorid = $_GET['editcolor'];
                    $ecolor = mysqli_query($connection, "select ColorName,ColorCode,ColorStatus from color where ColorID = '$colorid'");
                    $ures = mysqli_fetch_array($ecolor);
                    ?>
                    <div class="col-sm-4">
                        <div class="box box-info">
                            <div class="box-header">
                                <span class="box-title">Update Color</span>
                            </div>
                            <div class="box-body">
                                <div class="col-sm-12">
                                    <form class="form-horizontal" method="post" action="">

                                        <div class="form-group">
                                            <label>Color Name:</label>
                                            <input type="text" name="ucolorname" id="ucolorname" class="form-control" value="<?php echo $ures['ColorName']; ?>" required>
                                            <input type="hidden" name="colid" id="colid"  value="<?php echo $colorid; ?>" >

                                        </div>
                                        <div class="form-group">
                                            <label>Pick Color:</label>
                                            <input type="text" name="ucolorcode" id="ucolorcode" class="form-control colorcode" required value="<?php echo $ures['ColorCode']; ?>">
                                        </div>

                                        <div class="form-group">
                                            <label>Color Status:</label>
                                            <select name="cstatus" id="cstatus" class="form-control required select2" required>
                                                <option value="">Select Color Status</option>
                                                <option value="Active" <?php
                                                if ($ures['ColorStatus'] == "Active") {
                                                    echo "selected";
                                                }
                                                ?>>Active</option>
                                                <option value="InActive" <?php
                                                if ($ures['ColorStatus'] == "InActive") {
                                                    echo "selected";
                                                }
                                                ?>>InActive</option>
                                            </select>
                                        </div>

                                        <hr>
                                        <a class="btn btn-flat pull-left bg-blue" href="managecolor" ><i class="fa fa-angle-double-left"></i></a>
                                        <input type="submit" name="updatecolor" id="updatecolor" class="btn btn-flat bg-red pull-right" value="Update Color">

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
                                <span class="box-title">Add Color</span>
                            </div>
                            <div class="box-body">
                                <div class="col-sm-12">
                                    <form class="form-horizontal" method="post" action="">

                                        <div class="form-group">
                                            <label>Color Name:</label>
                                            <input type="text" name="colorname" id="colorname" class="form-control" placeholder="Like Red, Green, blue" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Pick Color:</label>
                                            <input type="text" name="colorcode" id="colorcode" class="form-control colorcode" required placeholder="Choose Color">
                                        </div>
                                        <div class="form-group">
                                            <label>Color Status:</label>
                                            <select name="colorstatus" id="colorstatus" class="form-control required select2" required>
                                                <option value="">Select Color Status</option>
                                                <option value="Active" >Active</option>
                                                <option value="InActive" >InActive</option>
                                            </select>
                                        </div>
                                        <hr>

                                        <input type="submit" name="addcolor" id="addcolor" class="btn btn-flat bg-red pull-right" value="Add Color">
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
                            <span class="box-title">Color List</span>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="color" class="table table-bordered table-striped text-sm text-center">
                                <thead class="bg-red">
                                    <tr>
                                        <th>Color Name</th>
                                        <th>Color Code</th>
                                        <th>Created Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sqlcolor = mysqli_query($connection, "select * from color ");
                                    while ($res = mysqli_fetch_array($sqlcolor)) {
                                        $colorid = $res['ColorID'];
                                        ?>
                                        <tr>
                                            <td><?php echo $res['ColorName']; ?></td>
                                            <td><div style="margin-left:60px;width: 20px; height: 20px; background:<?php echo $res['ColorCode']; ?>;"></div></td>
                                            <td><?php echo $res['CreatedDate']; ?></td>
                                            <td><?php
                                                if ($res['ColorStatus'] == "Active") {
                                                    echo "<span class='label label-success'>" . $res['ColorStatus'] . "</span>";
                                                } else {
                                                    echo "<span class='label label-danger'>" . $res['ColorStatus'] . "</span>";
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <a href="managecolor?editcolor=<?php echo $colorid; ?>" data-title="Edit Color" data-toggle="tooltip"><i class="fa  fa-edit text-black"></i></a>
                                                &nbsp; | &nbsp;
                                                <a href="managecolor?del=<?php echo $colorid; ?>" data-title="Delete Color" data-toggle="tooltip" class="delete"><i class="fa fa-trash-o text-red"></i></a>
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
        $('#color').DataTable({
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
    //Colorpicker
    $('.colorcode').colorpicker()

    $("a.delete").click(function (e) {
        if (!confirm('Are you sure?')) {
            e.preventDefault();
            return false;
        }
        return true;
    });
</script>