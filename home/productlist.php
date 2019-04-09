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
                Product
                <small>Your List</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Product List</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="row container-fluid">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <span class="text-bold">Your Product List</span>
                        </div>
                        <div class="box-body">
                            <table class="table table-responsive table-bordered text-sm">
                                <thead class="bg-red">
                                    <tr>
                                        <th>Category</th>
                                        <th>Code</th>
                                        <th>Name</th>
                                        <th>Act Price</th>
                                        <th>Selling Price</th>
                                        <th>Status</th>
                                        <th>Primary Image</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $psql = mysqli_query($connection, "select * from product where ProductStatus = 'Active'");
                                    while ($prow = mysqli_fetch_array($psql)) {
                                        $pid = $prow['ProductID'];
                                        ?>
                                        <tr>
                                            <td>
                                                <?php
                                                $csql = mysqli_query($connection, "select CategoryName from category where CatID = '" . $prow['CategoryID'] . "'");
                                                $crow = mysqli_fetch_array($csql);
                                                echo $crow['CategoryName'];
                                                ?>
                                            </td>
                                            <td><?php echo $prow['Pcode']; ?></td>
                                            <td><?php echo $prow['Pname']; ?></td>
                                            <td><?php echo $prow['BeforeDiscount']; ?></td>
                                            <td><?php echo $prow['AfterDiscount']; ?></td>
                                            <td><?php echo "<span class='label label-sm label-success'>" . $prow['ProductStatus'] . "</span>"; ?></td>
                                            <td class="text-center pop">
                                                <img  src="../images/product/<?php echo $prow['ProductID'] . "/" . $prow['Pimage1'] ?>" width="20px" height="20px" class="img img-circle"></td>
                                            <td>
                                                <button class="bg-green product_detail" id="<?= $pid ?>"  data-toggle="tooltip" title="View Product" ><span title="View Product Details" class="fa fa-eye"></span></button>
                                                &nbsp; | &nbsp;
                                                <button class="bg-red"><a href="productedit?pid=<?= $pid ?>"  data-toggle="tooltip" title="Edit Product" style="color:#fff;" target="_new"><span title="Edit Product" class="fa fa-edit"></span></a></button>
                                                &nbsp; | &nbsp;
                                                <button class="bg-primary"><a href="imageedit?pid=<?= $pid ?>"  data-toggle="tooltip" title="Edit Image" style="color:#fff;" target="_new"><span title="Edit Image" class="fa fa-picture-o"></span></a></button>

                                            </td>

                                        </tr>


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

<div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-small" data-dismiss="modal">
        <div class="modal-content"  >              
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <img src="" class="imagepreview" style="width: 100%;" >
            </div> 
            <div class="modal-footer"></div>
        </div>
    </div>
</div>

<div class="modal fade" id="header-modal" aria-hidden="true"></div>
<?php
include_once 'footer.php';
?>
<script>
    $('body').delegate('.product_detail', 'click', function () {
        var product_id = $(this).attr('id');
        $.ajax({
            type: "POST",
            url: "getprlist",
            data: {product_id: product_id},
            dataType: "json",
            success: function (data) {
                $("#header-modal").html("<div class='modal-dialog modal-lg'>" +
                        "<div class='modal-content'>" +
                        "<div class='modal-header bg-red'>" +
                        "<button type='' class='close' data-dismiss='modal' aria-hidden='true'><i class='icons-office-52'>Close</i></button>" +
                        "<h4 class='modal-title'><strong>Product Detail</strong></h4>" +
                        "</div>" +
                        "<div class='modal-body' id='modal_body'>" +
                        "<div class='row'>" +
                        "<div class='col-md-4'><label class='control-label'>Product Code</label></div>" +
                        "<div class='col-md-8'>" + data.Pcode + "</div>" +
                        "</div><hr>" +
                        "<div class='row'>" +
                        "<div class='col-md-4'><label class='control-label'>Product Name</label></div>" +
                        "<div class='col-md-8'>" + data.Pname + "</div>" +
                        "</div><hr>" +
                        "<div class='row'>" +
                        "<div class='col-md-4'><label class='control-label'>Product Description</label></div>" +
                        "<div class='col-md-8'>" + data.Pdesc + "</div>" +
                        "</div><hr>" +
                        "<div class='row'>" +
                        "<div class='col-md-4'><label class='control-label'>Category Name</label></div>" +
                        "<div class='col-md-8'>" + data.CategoryName + "</div>" +
                        "</div><hr>" +
                        "<div class='row'>" +
                        "<div class='col-md-4'><label class='control-label'>Sub-Category Name</label></div>" +
                        "<div class='col-md-8'>" + data.sub + "</div>" +
                        "</div><hr>" +
                        "<div class='row'>" +
                        "<div class='col-md-4'><label class='control-label'>Product Images</label></div>" +
                        "<div class='col-md-8'><img src=" + data.image1 + " width='50px' height='50px'> <img src=" + data.image2 + " width='50px' height='50px'> <img src=" + data.image3 + " width='50px' height='50px'> <img src=" + data.image4 + " width='50px' height='50px'></div>" +
                        "</div>" +
                        "</div>" +
                        "<div class='modal-footer bg-red'> " +
                        "<button type='button' class='btn btn-danger  btn-embossed bnt-square' data-dismiss='modal'>Cancle</button>" +
                        "</div>" +
                        "</div>" +
                        "</div>"
                        );
                $('#header-modal').modal('show');
            }
        });

    });
</script>

<script>
    $(function () {
        $('.pop').on('click', function () {
            $('.imagepreview').attr('src', $(this).find('img').attr('src'));
            $('#imagemodal').modal('show');
        });
    });
</script>