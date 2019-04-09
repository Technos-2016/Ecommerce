<?php

include_once 'header.php';
?>
<div class="wrapper">
    <?php
    include_once 'sideheader.php';
    include_once 'sidebar.php';
    $pid = $_GET['pid'];
    ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Images
                <small>Your Product Images</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Images</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row container-fluid">
                <div class="col-sm-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <span class="text-bold">Edit Images</span>
                        </div>
                        <div class="box-body">
                            <form method="post" enctype="multipart/form-data">
                                <table class="table table-bordered text-sm text-center">
                                    <thead class="bg-red">
                                        <tr>
                                            <th>Product Name</th>
                                            <th>Image1</th>
                                            <th>Image2</th>
                                            <th>Image3</th>
                                            <th>Image4</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sqli = mysqli_query($connection, "select Pname,Pimage1,Pimage2,Pimage3,Pimage4 from product where ProductID = '$pid' ");
                                        $irow = mysqli_fetch_array($sqli);
                                        ?>
                                        <tr>
                                            <td><?php echo $irow['Pname']; ?></td>
                                            <td>
                                                <a href="#pimage<?php echo $pid; ?>" data-target="#pimage<?php echo $pid; ?>" data-toggle="modal" >
                                                    <img  src="../images/product/<?php echo $pid . "/" . $irow['Pimage1']; ?>" width="100px" id="Pimage1"/>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="#pimage2<?php echo $pid; ?>" data-target="#pimage2<?php echo $pid; ?>" data-toggle="modal" >
                                                    <img src="../images/product/<?php echo $pid . "/" . $irow['Pimage2']; ?>" width="100px" id="Pimage2"/>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="#pimage3<?php echo $pid; ?>" data-target="#pimage3<?php echo $pid; ?>" data-toggle="modal" >
                                                    <img src="../images/product/<?php echo $pid . "/" . $irow['Pimage3']; ?>" width="100px" id="Pimage3"/>
                                                </a>
                                            <td>
                                                <a href="#pimage4<?php echo $pid; ?>" data-target="#pimage4<?php echo $pid; ?>" data-toggle="modal" >
                                                    <img src="../images/product/<?php echo $pid . "/" . $irow['Pimage4']; ?>" width="100px" id="Pimage4"/>
                                                </a>
                                            </td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
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


<div class="modal fade" id="pimage<?php echo $pid; ?>" tabindex="-1" role="dialog" aria-labelledby="enlarged" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header bg-red">
                <div id="e1" class="pull-left"></div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form method='post' action='' enctype="multipart/form-data">
                    <input type='hidden' name='productid' id='productid' value="<?php echo $pid; ?>">
                    <input type='file' name='Pimage1' id='imageone' class='form-control pull-left' onchange='image1(event)' style="width:70%;" accept="image/x-png,image/jpg,image/jpeg" >
                    <input type='button' class='btn-sm btn-info pull-right' value='Upload' id='uploadone'>
                </form>
                <img src="../images/product/<?php echo $pid . "/" . $irow['Pimage1']; ?>" id="image1"  class="enlargeImageModalSource" style="width: 100%;">
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="pimage2<?php echo $pid; ?>" tabindex="-1" role="dialog" aria-labelledby="enlarged" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header bg-red">
                <div id="e2" class="pull-left"></div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form method='post' action='' enctype="multipart/form-data">
                    <input type='hidden' name='productid' id='productid' value="<?php echo $pid; ?>">
                    <input type='file' name='Pimage2' id='imagetwo' class='form-control pull-left' onchange='image2(event)' style="width:70%;" accept="image/x-png,image/jpg,image/jpeg" >
                    <input type='button' class='btn-sm btn-info pull-right' value='Upload' id='uploadtwo'>
                </form>
                <img src="../images/product/<?php echo $pid . "/" . $irow['Pimage2']; ?>" id="image2"  class="enlargeImageModalSource" style="width: 100%;">
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="pimage3<?php echo $pid; ?>" tabindex="-1" role="dialog" aria-labelledby="enlarged" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header bg-red">
                <div id="e3" class="pull-left"></div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form method='post' action='' enctype="multipart/form-data">
                    <input type='hidden' name='productid' id='productid' value="<?php echo $pid; ?>">
                    <input type='file' name='Pimage3' id='imagethree' class='form-control pull-left' onchange='image3(event)' style="width:70%;" accept="image/x-png,image/jpg,image/jpeg" >
                    <input type='button' class='btn-sm btn-info pull-right' value='Upload' id='uploadthree'>
                </form>
                <img src="../images/product/<?php echo $pid . "/" . $irow['Pimage3']; ?>" id="image3"  class="enlargeImageModalSource" style="width: 100%;">
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="pimage4<?php echo $pid; ?>" tabindex="-1" role="dialog" aria-labelledby="enlarged" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header bg-red">
                <div id="e4" class="pull-left"></div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form method='post' action='' enctype="multipart/form-data">
                    <input type='hidden' name='productid' id='productid' value="<?php echo $pid; ?>">
                    <input type='file' name='Pimage4' id='imagefour' class='form-control pull-left' onchange='image4(event)' style="width:70%;" accept="image/x-png,image/jpg,image/jpeg" >
                    <input type='button' class='btn-sm btn-info pull-right' value='Upload' id='uploadfour'>
                </form>
                <img src="../images/product/<?php echo $pid . "/" . $irow['Pimage4']; ?>" id="image4"  class="enlargeImageModalSource" style="width: 100%;">
            </div>
        </div>
    </div>
</div>

<?php
include_once 'footer.php';
?>
<script>

    var image1 = function (file) {
        var inputcard = file.target;
        var readercard = new FileReader();
        readercard.onload = function () {
            var dataURL = readercard.result;
            var image1 = document.getElementById('image1');
            var Pimage1 = document.getElementById('Pimage1');
            image1.src = dataURL;
            Pimage1.src = dataURL;
        };
        readercard.readAsDataURL(inputcard.files[0]);
    };
    $(document).ready(function () {
        $('#uploadone').click(function () {
            var ac = new FormData();
            var productid = $('#productid').val();
            var Pimage = $('#imageone')[0].files[0];
            ac.append('productid', productid);
            ac.append('Pimage1', Pimage);
            $.ajax({
                url: 'uploadimage',
                type: 'post',
                data: ac,
                contentType: false,
                processData: false,
                success: function (response) {
                    if (response != 0) {
                        setTimeout(function () {
                            $('.modal').modal('hide');
                        }, 1000);
                        //document.getElementById('ccz').value = response;
                        $('.modal-header #e1').html(response);
                        window.setTimeout('test1()', 1800);
                    } else {
                        setTimeout(function () {
                            $('.modal').modal('hide');
                        }, 1000);
                        $('.modal-header #e1').html("Error Uploading Image..");
                    }
                }
            });
        });
    });


    var image2 = function (file) {
        var inputcard = file.target;
        var readercard = new FileReader();
        readercard.onload = function () {
            var dataURL = readercard.result;
            var image2 = document.getElementById('image2');
            var Pimage2 = document.getElementById('Pimage2');
            image2.src = dataURL;
            Pimage2.src = dataURL;
        };
        readercard.readAsDataURL(inputcard.files[0]);
    };
    $(document).ready(function () {
        $('#uploadtwo').click(function () {
            var ac = new FormData();
            var productid = $('#productid').val();
            var Pimage = $('#imagetwo')[0].files[0];
            ac.append('productid', productid);
            ac.append('Pimage2', Pimage);
            $.ajax({
                url: 'uploadimage',
                type: 'post',
                data: ac,
                contentType: false,
                processData: false,
                success: function (response) {
                    if (response != 0) {
                        setTimeout(function () {
                            $('.modal').modal('hide');
                        }, 1000);
                        //document.getElementById('ccz').value = response;
                        $('.modal-header #e2').html(response);
                        window.setTimeout('test1()', 1800);
                    } else {
                        setTimeout(function () {
                            $('.modal').modal('hide');
                        }, 1000);
                        $('.modal-header #e2').html("Error Uploading Image..");
                    }
                }
            });
        });
    });

    var image3 = function (file) {
        var inputcard = file.target;
        var readercard = new FileReader();
        readercard.onload = function () {
            var dataURL = readercard.result;
            var image3 = document.getElementById('image3');
            var Pimage3 = document.getElementById('Pimage3');
            image3.src = dataURL;
            Pimage3.src = dataURL;
        };
        readercard.readAsDataURL(inputcard.files[0]);
    };
    $(document).ready(function () {
        $('#uploadthree').click(function () {
            var ac = new FormData();
            var productid = $('#productid').val();
            var Pimage = $('#imagethree')[0].files[0];
            ac.append('productid', productid);
            ac.append('Pimage3', Pimage);
            $.ajax({
                url: 'uploadimage',
                type: 'post',
                data: ac,
                contentType: false,
                processData: false,
                success: function (response) {
                    if (response != 0) {
                        setTimeout(function () {
                            $('.modal').modal('hide');
                        }, 1000);
                        //document.getElementById('ccz').value = response;
                        $('.modal-header #e3').html(response);
                        window.setTimeout('test1()', 1800);
                    } else {
                        setTimeout(function () {
                            $('.modal').modal('hide');
                        }, 1000);
                        $('.modal-header #e3').html("Error Uploading Images..");
                    }
                }
            });
        });
    });

    var image4 = function (file) {
        var inputcard = file.target;
        var readercard = new FileReader();
        readercard.onload = function () {
            var dataURL = readercard.result;
            var image4 = document.getElementById('image4');
            var Pimage4 = document.getElementById('Pimage4');
            image4.src = dataURL;
            Pimage4.src = dataURL;
        };
        readercard.readAsDataURL(inputcard.files[0]);
    };
    $(document).ready(function () {
        $('#uploadfour').click(function () {
            var ac = new FormData();
            var productid = $('#productid').val();
            var Pimage = $('#imagefour')[0].files[0];
            ac.append('productid', productid);
            ac.append('Pimage4', Pimage);
            $.ajax({
                url: 'uploadimage',
                type: 'post',
                data: ac,
                contentType: false,
                processData: false,
                success: function (response) {
                    if (response != 0) {
                        setTimeout(function () {
                            $('.modal').modal('hide');
                        }, 1000);
                        //document.getElementById('ccz').value = response;
                        $('.modal-header #e4').html(response);
                        window.setTimeout('test1()', 1800);
                        //alert(response);
                    } else {
                        setTimeout(function () {
                            $('.modal').modal('hide');
                        }, 1000);
                        $('.modal-header #e4').html("Error Uploading Images..");
                    }
                }
            });
        });
    });

    function test1() {
        location.reload();
    }

</script>