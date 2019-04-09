<?php include_once 'header.php'; ?>
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
                Add Category
                <small>Add Sub Category To List</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Sub Category Add</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <?php
            if (isset($_POST['addsubcategory'])) {
                $subcategory = mysqli_real_escape_string($connection, $_POST['subcategory']);
                $subid = mysqli_real_escape_string($connection, $_POST['subid']);
                $check = mysqli_query($connection, "select * from subcategory where SubCategoryName = '$subcategory' AND ParentCatID = '$subid'");
                if (mysqli_num_rows($check) > 0) {
                    $err = "You Have the Sub Category With this name..";
                } else if (!empty($subcategory)) {
                    $insert = mysqli_query($connection, "INSERT INTO subcategory(ParentCatID,SubCategoryName,CreatedDate,SubStatus)VALUES('$subid','$subcategory','$cdatetime','1')");
                    $suc = "You Have Successfully Created the Sub category..";
                }
            } else if (isset($_POST['editsubcategory'])) {
                $esubcategory = mysqli_real_escape_string($connection, $_POST['esubcategory']);
                $suid = mysqli_real_escape_string($connection, $_POST['sid']);
                $parid = mysqli_real_escape_string($connection, $_POST['pid']);

                $check = mysqli_query($connection, "select * from subcategory where SubCategoryName = '$esubcategory' AND ParentCatID = '$parid'");
                if (mysqli_num_rows($check) > 0) {
                    $err = "You Have the Sub Category With this name..";
                } else if (!empty($esubcategory)) {
                    $insert = mysqli_query($connection, "UPDATE subcategory SET SubCategoryName = '$esubcategory', ModifiedDate = '$mdatetime' WHERE SID = '$suid' AND ParentCatID = '$parid'");
                    $suc = "You Have Successfully Updated the Sub category..";
                }
            }
            ?>
            <!-- Horizontal Form -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Add Sub Category</h3>
                    <h4 class="pull-right">
                        <?php
                        if (isset($err)) {
                            echo "<span class='text-danger'>" . $err . "<span><script>setTimeout(\"location.href = 'categorylist';\",2500);</script>";
                        } else if (isset($suc)) {
                            echo "<span class='text-success'>" . $suc . "<span><script>setTimeout(\"location.href = 'categorylist';\",2500);</script>";
                        }
                        ?>
                    </h4>
                </div>
                <!-- /.box-header -->
                <?php
                if (isset($_GET['addsub'])) {
                    $editsubcat = $_GET['addsub'];
                    ?>
                    <!-- form start -->
                    <form class="form-horizontal" method="post" action="">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="inputCategory" class="col-sm-3 control-label">Sub Category Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="subcategory" id="subcategory" placeholder="Add Sub Category" required="true">
                                    <input type="hidden"  name="subid" id="subid" value="<?= $editsubcat; ?>">
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="reset" class="btn btn-danger">Cancel</button>
                            <button type="submit" name="addsubcategory" id="addsubcategory" class="btn btn-primary pull-right">Add Sub Category</button>
                        </div>
                        <!-- /.box-footer -->
                    </form>
                    <?php
                } else if (isset($_GET['editsub'])) {
                    $editid = $_GET['editsub'];
                    $editquery = mysqli_query($connection, "select * from subcategory where SID = '$editid'");
                    $runq = mysqli_fetch_array($editquery);
                    $pid = $runq['ParentCatID'];
                    $sid = $runq['SID'];
                    $subname = $runq['SubCategoryName'];
                    ?>
                    <!-- form start -->
                    <form class="form-horizontal" method="post" action="">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="inputCategory" class="col-sm-3 control-label">Edit Sub Category Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="esubcategory" id="esubcategory" value="<?= $subname; ?>" required="true">
                                    <input type="hidden"  name="pid" id="pid" value="<?= $pid; ?>">
                                    <input type="hidden"  name="sid" id="sid" value="<?= $sid; ?>">
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="reset" class="btn btn-danger">Cancel</button>
                            <button type="submit" name="editsubcategory" id="editsubcategory" class="btn btn-primary pull-right">Update Sub Category</button>
                        </div>
                        <!-- /.box-footer -->
                    </form>
                    <?php
                }
                ?>




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
