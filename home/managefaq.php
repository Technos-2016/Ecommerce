<?php include_once 'header.php'; ?>
<div class="wrapper">
    <?php
    include_once 'sideheader.php';
    include_once 'sidebar.php';
    ?>

    <?php
    if (isset($_POST['addfaq'])) {
        $faqtitle = mysqli_real_escape_string($connection, strtoupper($_POST['faqtitle']));
        $faqquestion = mysqli_real_escape_string($connection, strtoupper($_POST['faqquestion']));
        $faqanswer = mysqli_real_escape_string($connection, strtoupper($_POST['faqanswer']));
        $faqstatus = mysqli_real_escape_string($connection, $_POST['isactive']);
        $checkfaq = mysqli_query($connection, "select * from faq where FaqQuestion = '$faqquestion' AND FaqAnswer='$faqanswer'");
        if (mysqli_num_rows($checkfaq) > 0) {
            $msg = "FAQ Already Exist..";
        } else if (!empty($faqtitle or $faqquestion or $faqanswer)) {
            mysqli_query($connection, "INSERT INTO faq(FaqTitle,FaqQuestion,FaqAnswer,IsActive)VALUES('$faqtitle','$faqquestion','$faqanswer','$faqstatus')");
            $msg = "You Have Successfully Created the FAQ..";
        }
    }else if (isset($_POST['updatefaq'])) {
        $ufid = $_POST['fid'];
        $ufaqtitle = mysqli_real_escape_string($connection, strtoupper($_POST['ufaqtitle']));
        $ufaqquestion = mysqli_real_escape_string($connection, strtoupper($_POST['ufaqquestion']));
        $ufaqanswer = mysqli_real_escape_string($connection, strtoupper($_POST['ufaqanswer']));
        $uisactive = $_POST['uisactive'];
        $ucheck = mysqli_query($connection, "select * from faq where FaqQuestion = '$ufaqquestion' AND FaqAnswer='$ufaqanswer' AND FaqTitle = '$ufaqtitle' AND IsActive = '$uisactive'");
        if (mysqli_num_rows($ucheck) > 0) {
            $msg = "FAQ Already Exist..";
        } else {
            mysqli_query($connection, "UPDATE faq SET FaqTitle = '$ufaqtitle',FaqQuestion='$ufaqquestion',FaqAnswer='$ufaqanswer',IsActive='$uisactive' WHERE FID = '$ufid' ");
            $msg = "SuccessFully Updated..";
        }
    } else if (isset($_GET['del'])) {
        $delid = $_GET['del'];
        mysqli_query($connection, "DELETE FROM faq WHERE FID = '$delid' ");
        $msg = "SuccessFully Deleted..";
    }
    ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                FAQ
                <small>Manage You FAQ</small>
            </h1>
            <ol class="breadcrumb">
                <?php
                if (isset($msg)) {
                    echo "<span class='label label-primary'>" . $msg . "<span><script>setTimeout(\"location.href = 'managefaq';\",2500);</script>";
                }
                ?>
            </ol>
        </section>



        <!-- Main content -->
        <section class="content">

            <div class="row">
                <div class="col-md-6">
                    <!-- Horizontal Form -->
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">FAQ Form</h3>
                        </div>

                        <?php
                        if (isset($_GET['edit'])) {
                            $editid = $_GET['edit'];
                            $sqledit = mysqli_query($connection, "select * from faq where FID = '$editid'");
                            $rowedit = mysqli_fetch_array($sqledit);
                            ?>
                            <!-- form start -->
                            <form class="form-horizontal" method="post" action="">
                                <div class="box-body">

                                    <div class="form-group">
                                        <label for="faq" class="col-sm-2 control-label">FAQ Title</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="ufaqtitle"  value="<?php echo $rowedit['FaqTitle']; ?>">
                                             <input type="hidden" id="fid"  name="fid" value="<?php echo $editid; ?>" >
                                        </div>
                                    </div>

                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Enter Question</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" rows="3" name="ufaqquestion" value="<?php echo $rowedit['FaqQuestion']; ?>"><?php echo $rowedit['FaqQuestion']; ?></textarea>
                                        </div>
                                    </div>

                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Enter Answer</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control textarea" rows="3" name="ufaqanswer" value="<?php echo $rowedit['FaqAnswer']; ?>"><?php echo $rowedit['FaqAnswer']; ?></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">IsActive:</label>
                                        <div class="col-sm-10">
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
                                    </div>


                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <button type="reset" class="btn btn-default">Cancel</button>
                                    <button type="submit" name="updatefaq" id="updatefaq" class="btn btn-primary pull-right">Update FAQ</button>
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
                                        <label for="faq" class="col-sm-2 control-label">FAQ Title</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="faqtitle" id="faqtitle" placeholder="Enter Title">
                                        </div>
                                    </div>

                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Enter Question</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" rows="3" name="faqquestion" placeholder="Enter Question?"></textarea>
                                        </div>
                                    </div>

                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Enter Answer</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control textarea" rows="3" name="faqanswer" placeholder="Enter Answer..." style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">IsActive:</label>
                                        <div class="col-sm-10">
                                            <select name="isactive" id="isactive" class="form-control required select2" required>
                                                <option value="">Select Status</option>
                                                <option value="Active" >Active</option>
                                                <option value="InActive" >InActive</option>
                                            </select>
                                        </div>
                                    </div>


                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <button type="reset" class="btn btn-default">Cancel</button>
                                    <button type="submit" name="addfaq" id="addfaq" class="btn btn-primary pull-right">Add FAQ</button>
                                </div>
                                <!-- /.box-footer -->
                            </form>
                            <?php
                        }
                        ?>


                    </div>
                    <!-- /.box -->
                </div>

                <div class="col-sm-6">

                    <div class="box box-primary">
                        <div class="box-header">
                            <span class="box-title">Faq List</span>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="faq" class="table table-bordered table-striped text-sm text-center">
                                <thead class="bg-red">
                                    <tr>
                                        <th>FAQ Title</th>
                                        <th>Question</th>
                                        <th>Answer</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sqlfaq = mysqli_query($connection, "select * from faq Order By FID DESC ");
                                    while ($res = mysqli_fetch_array($sqlfaq)) {
                                        $faqid = $res['FID'];
                                        ?>
                                        <tr>
                                            <td><?php echo $res['FaqTitle']; ?></td>
                                            <td><?php echo $res['FaqQuestion']; ?></td>
                                            <td><?php echo $res['FaqAnswer']; ?></td>
                                            <td><?php
                                                if ($res['IsActive'] == "Active") {
                                                    echo "<span class='label label-success'>" . $res['IsActive'] . "</span>";
                                                } else {
                                                    echo "<span class='label label-danger'>" . $res['IsActive'] . "</span>";
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <a href="managefaq?edit=<?php echo $faqid; ?>" data-title="Edit FAQ" data-toggle="tooltip"><i class="fa  fa-edit text-black"></i></a>
                                                &nbsp; | &nbsp;
                                                <a href="managefaq?del=<?php echo $faqid; ?>" data-title="Delete FAQ" data-toggle="tooltip" class="delete"><i class="fa fa-trash-o text-red"></i></a>
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
        $('#faq').DataTable({
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
    
    $('.textarea').wysihtml5()

    $("a.delete").click(function (e) {
        if (!confirm('Are you sure?')) {
            e.preventDefault();
            return false;
        }
        return true;
    });



</script>