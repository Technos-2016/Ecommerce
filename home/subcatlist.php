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
        mysqli_query($connection, "UPDATE subcategory SET SubStatus = '0',ModifiedDate='$mdatetime' WHERE SID = '$deactiveid' ");
        $msg = "SuccessFully Deactivated..";
    } else if (isset($_GET['active'])) {
        $activeid = $_GET['active'];
        mysqli_query($connection, "UPDATE subcategory SET SubStatus = '1',ModifiedDate='$mdatetime' WHERE SID = '$activeid' ");
        $msg = "SuccessFully Activated..";
    } else if (isset($_GET['del'])) {
        $delid = $_GET['del'];
        mysqli_query($connection, "DELETE FROM subcategory WHERE SID = '$delid' ");
        $msg = "SuccessFully Deleted..";
    }
    ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Sub Category 
                <small>Sub Category List</small>
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
                        <span class="box-title">Sub Category List</span>
                        <a href="categorylist"><span class="pull-right"><i class="fa fa-2x fa-arrow-circle-left bg-red"></i></span></a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="category" class="table table-bordered table-striped text-sm  text-center">
                            <thead class="bg-red">
                                <tr>
                                    <th>Sub Category Name</th>
                                    <th>Category Name</th>
                                    <th>Created Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sqlsubcat = mysqli_query($connection, "select * from subcategory where ParentCatID = '".$_GET['view']."'");
                                while ($res = mysqli_fetch_array($sqlsubcat)) {
                                    $subcatid = $res['SID'];
                                    $parentid = $res['ParentCatID'];
                                    $catget = mysqli_query($connection, "select * from category where CatID = '$parentid'");
                                    $resp = mysqli_fetch_array($catget);
                                    ?>
                                    <tr>
                                        <td><?php echo $res['SubCategoryName']; ?></td>
                                        <td><?php echo $resp['CategoryName']; ?></td>
                                        <td><?php echo $res['CreatedDate']; ?></td>

                                        <td><?php
                                            if ($res['SubStatus'] == 1) {
                                                echo "<span class='label label-success'>ACTIVE</span>";
                                            } else {
                                                echo "<span class='label label-danger'>INACTIVE</span>";
                                            }
                                            ?></td>

                                        <td>
                                            
                                            <a href="addsubcategory?editsub=<?php echo $subcatid; ?>" data-title="Edit Sub Category" data-toggle="tooltip"><i class="fa  fa-edit"></i></a>
                                            &nbsp; | &nbsp;
                                            <?php
                                            if ($res['SubStatus'] == 1) {
                                                ?>
                                                <a href="subcatlist?deactive=<?php echo $subcatid; ?>" data-title="Make Sub DeActive" data-toggle="tooltip"><i class="fa fa-check-circle-o text-green"></i></a>
                                                <?php
                                            } else {
                                                ?>
                                                <a href="subcatlist?active=<?php echo $subcatid; ?>" data-title="Make Sub Active" data-toggle="tooltip"><i class="fa fa-calendar-check-o text-red"></i></a>
                                                <?php
                                            }
                                            ?>
                                            &nbsp; | &nbsp;
                                            <a href="subcatlist?del=<?php echo $subcatid; ?>" data-title="Delete Sub Category" data-toggle="tooltip"><i class="fa fa-trash-o"></i></a>
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