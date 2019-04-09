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
                <small>Add Category To List</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Category Add</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <?php
            if (isset($_POST['addcategory'])) {
                $catname = mysqli_real_escape_string($connection, $_POST['category']);
                $check = mysqli_query($connection, "select * from category where CategoryName = '$catname'");
                if (mysqli_num_rows($check) > 0) {
                    $err = "You Have the Category With this name..";
                } else if (!empty($catname)) {
                    mysqli_query($connection, "INSERT INTO category(CategoryName,CreatedBy,CatStatus)VALUES('$catname','$ismember','1')");
                    $suc = "You Have Successfully Created the category..";
                }
            } else if (isset($_POST['updatecategory'])) {
                $ucatname = mysqli_real_escape_string($connection, $_POST['ucategory']);
                $ucatid = mysqli_real_escape_string($connection, $_POST['ucatid']);
                $check = mysqli_query($connection, "select * from category where CategoryName = '$ucatname'");
                if (mysqli_num_rows($check) > 0) {
                    $err = "You Have the Category With this name..";
                } else if (!empty($ucatname)) {
                    mysqli_query($connection, "UPDATE category SET CategoryName='$ucatname',ModifiedBY = '0' WHERE CatID = '$ucatid'");
                    $suc = "You Have Successfully Updated the category..";
                }
            }
            ?>
            <!-- Horizontal Form -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Add Category</h3>
                    <h4 class="pull-right">
                        <?php
                        if (isset($err)) {
                            echo "<span class='text-danger'>" . $err . "<span><script>setTimeout(\"location.href = 'addcategory';\",2500);</script>";
                        } else if (isset($suc)) {
                            echo "<span class='text-success'>" . $suc . "<span><script>setTimeout(\"location.href = 'categorylist';\",2500);</script>";
                        }
                        ?>
                    </h4>
                </div>
                <!-- /.box-header -->

                <?php
                if (isset($_GET['edit'])) {
                    $editcat = $_GET['edit'];
                    $getcat = mysqli_query($connection, "select * from category where CatID = '$editcat'");
                    $runcat = mysqli_fetch_array($getcat);
                    $categoryname = $runcat['CategoryName'];
                    ?>
                    <!-- form start -->
                    <form class="form-horizontal" method="post" action="">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="inputCategory" class="col-sm-3 control-label">Category Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="ucategory" id="ucategory" value="<?= $categoryname; ?>" required="true">
                                    <input type="hidden"  name="ucatid" id="ucatid" value="<?= $editcat; ?>">
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="reset" class="btn btn-danger">Cancel</button>
                            <button type="submit" name="updatecategory" id="updatecategory" class="btn btn-primary pull-right">Update Category</button>
                        </div>
                        <!-- /.box-footer -->
                    </form>
                    <?php
                } else {
                    ?>
                    <!-- form start -->
                    <form class="form-horizontal" method="post" action="">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="inputCategory" class="col-sm-3 control-label">Category Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="category" id="category" placeholder="Add Category" required="true">
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="reset" class="btn btn-danger">Cancel</button>
                            <button type="submit" name="addcategory" id="addcategory" class="btn btn-primary pull-right">Add Category</button>
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
