<?php
include_once 'header.php';
?>
<div class="wrapper">
    <?php
    include_once 'sideheader.php';
    include_once 'sidebar.php';
    ?>

    <?php
    if (isset($_GET['deactive'])) {
        $deactiveid = $_GET['deactive'];
        mysqli_query($connection, "UPDATE category SET CatStatus = '0',ModifiedBY='0' WHERE CatID = '$deactiveid' ");
        mysqli_query($connection, "UPDATE subcategory SET SubStatus = '0',ModifiedDate='$mdatetime' WHERE ParentCatID = '$deactiveid' ");
        $msg = "SuccessFully Deactivated..";
    } else if (isset($_GET['active'])) {
        $activeid = $_GET['active'];
        mysqli_query($connection, "UPDATE category SET CatStatus = '1',ModifiedBY='0' WHERE CatID = '$activeid' ");
        mysqli_query($connection, "UPDATE subcategory SET SubStatus = '1',ModifiedDate='$mdatetime' WHERE ParentCatID = '$activeid' ");
        $msg = "SuccessFully Activated..";
    } else if (isset($_GET['del'])) {
        $delid = $_GET['del'];
        mysqli_query($connection, "DELETE FROM category WHERE CatID = '$delid' ");
        $msg = "SuccessFully Deleted..";
    }
    ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                All Category
                <small>Category List</small>
            </h1>
            <ol class="breadcrumb">
                <?php
                if (isset($msg)) {
                    echo "<span class='label label-primary'>" . $msg . "<span><script>setTimeout(\"location.href = 'categorylist';\",2500);</script>";
                }
                ?>
            </ol>
        </section>


        <!-- Main content -->
        <section class="content">

            <div class="row">
                <div class="box box-primary">
                    <div class="box-header">
                        <span class="box-title">Category List</span>
                        <a href="addcategory"><span class="pull-right"><i class="fa fa-2x fa-plus-circle bg-red"></i></span></a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="category" class="table table-bordered table-striped text-sm  text-center">
                            <thead class="bg-red">
                                <tr>
                                    <th>Category Name</th>
                                    <th>Created Date</th>
                                    <th>Created By</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sqlcat = mysqli_query($connection, "select * from category ");
                                while ($res = mysqli_fetch_array($sqlcat)) {
                                    $catid = $res['CatID'];
                                    ?>
                                    <tr>
                                        <td><?php echo $res['CategoryName']; ?></td>
                                        <td><?php echo $res['CreatedDate']; ?></td>
                                        <td><?php
                                            if ($res['CreatedBy'] == 0) {
                                                echo "<span class='label label-danger'>ADMIN</span>";
                                            }
                                            ?></td>
                                        <td><?php
                                            if ($res['CatStatus'] == 1) {
                                                echo "<span class='label label-success'>ACTIVE</span>";
                                            } else {
                                                echo "<span class='label label-danger'>INACTIVE</span>";
                                            }
                                            ?></td>
                                        <td>
                                            <a href="addcategory?edit=<?php echo $catid; ?>" data-title="Edit Category" data-toggle="tooltip"><i class="fa  fa-edit text-black"></i></a>
                                            &nbsp; | &nbsp;
                                            <a href="addsubcategory?addsub=<?php echo $catid; ?>" data-title="Add Sub Category" data-toggle="tooltip"><i class="fa fa-plus-circle text-lime"></i></a>
                                            &nbsp; | &nbsp;
                                            <a href="subcatlist?view=<?php echo $catid; ?>" data-title="View Sub Category" data-toggle="tooltip"><i class="fa fa-eye"></i></a>
                                            &nbsp; | &nbsp;
                                            <?php
                                            if ($res['CatStatus'] == 1) {
                                                ?>
                                                <a href="categorylist?deactive=<?php echo $catid; ?>" data-title="Make DeActive" data-toggle="tooltip"><i class="fa fa-check-circle-o text-green"></i></a>
                                                <?php
                                            } else {
                                                ?>
                                                <a href="categorylist?active=<?php echo $catid; ?>" data-title="Make Active" data-toggle="tooltip"><i class="fa fa-calendar-check-o text-red"></i></a>
                                                <?php
                                            }
                                            ?>
                                            &nbsp; | &nbsp;
                                            <a href="categorylist?del=<?php echo $catid; ?>" data-title="Delete Category" data-toggle="tooltip"><i class="fa fa-trash-o text-red"></i></a>
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
        $('#category').DataTable({
            'paging': true,
            'lengthChange': false,
            'searching': true,
            'ordering': true,
            'info': true,
            'autoWidth': false
        })
    })
</script>