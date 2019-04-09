<?php
include_once 'header.php';
?>
<div class="wrapper">
    <?php
    include_once 'sideheader.php';
    include_once 'sidebar.php';
    ?>

    <?php
    if (isset($_POST['addcontact'])) {
        $fmessage = mysqli_real_escape_string($connection, $_POST['message']);
        $city = mysqli_real_escape_string($connection, strtoupper($_POST['city']));
        $district = mysqli_real_escape_string($connection, strtoupper($_POST['district']));
        $province = mysqli_real_escape_string($connection, strtoupper($_POST['province']));
        $country = mysqli_real_escape_string($connection, strtoupper($_POST['country']));
        $email = mysqli_real_escape_string($connection, $_POST['email']);
        $phone = mysqli_real_escape_string($connection, $_POST['phone']);
        $status = mysqli_real_escape_string($connection, $_POST['status']);
        mysqli_query($connection, "INSERT INTO contact(FrontMessage,City,District,Province,Country,Email,Phone,Status)VALUES('$fmessage','$city','$district','$province','$country','$email','$phone','$status')");
        $msg = "You Have Successfully Created the Contact..";
    } else if (isset($_POST['updatecontact'])) {
        $conid = $_POST['cid'];
        $umessage = mysqli_real_escape_string($connection, $_POST['umessage']);
        $ucity = mysqli_real_escape_string($connection, strtoupper($_POST['ucity']));
        $udistrict = mysqli_real_escape_string($connection, strtoupper($_POST['udistrict']));
        $uprovince = mysqli_real_escape_string($connection, strtoupper($_POST['uprovince']));
        $ucountry = mysqli_real_escape_string($connection, strtoupper($_POST['ucountry']));
        $uemail = mysqli_real_escape_string($connection, $_POST['uemail']);
        $uphone = mysqli_real_escape_string($connection, $_POST['uphone']);
        $cstatus = mysqli_real_escape_string($connection, $_POST['cstatus']);
        mysqli_query($connection, "UPDATE contact SET FrontMessage = '$umessage',City='$ucity',District='$udistrict',Province='$uprovince',Country='$ucountry',Email='$uemail',Phone='$uphone',Status='$cstatus' WHERE ID = '$conid' ");
        $msg = "SuccessFully Updated the Contact.";
    } else if (isset($_GET['del'])) {
        $delid = $_GET['del'];
        mysqli_query($connection, "DELETE FROM contact WHERE ID = '$delid' ");
        $msg = "SuccessFully Deleted..";
    }
    ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Manage Contact
                <small>Contact Page</small>
            </h1>
            <ol class="breadcrumb">
                <?php
                if (isset($msg)) {
                    echo "<span class='label label-primary'>" . $msg . "<span><script>setTimeout(\"location.href = 'contact';\",2500);</script>";
                }
                ?>
            </ol>
        </section>


        <!-- Main content -->
        <section class="content">
            <div class="row">
                <?php
                if (isset($_GET['editcontact'])) {
                    $cid = $_GET['editcontact'];
                    $esize = mysqli_query($connection, "select * from contact where ID = '$cid'");
                    $ures = mysqli_fetch_array($esize);
                    ?>
                    <div class="col-sm-4">
                        <div class="box box-info">
                            <div class="box-header">
                                <span class="box-title">Update Contact</span>
                            </div>
                            <div class="box-body">
                                <div class="col-sm-12">
                                    <form class="form-horizontal" method="post" action="">
                                        <div class="form-group">
                                            <label>Front Message:</label>
                                            <textarea type="text" name="umessage" id="umessage" class="form-control" value="<?php echo $ures['FrontMessage']; ?>" required><?php echo $ures['FrontMessage']; ?></textarea>
                                            <input type="hidden" name="cid" id="cid" value="<?php echo $ures['ID']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>City:</label>
                                            <input type="text" name="ucity" id="ucity" class="form-control" required value="<?php echo $ures['City']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>District:</label>
                                            <input type="text" name="udistrict" id="udistrict" class="form-control" required value="<?php echo $ures['District']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Province:</label>
                                            <input type="text" name="uprovince" id="uprovince" class="form-control" required value="<?php echo $ures['Province']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Country:</label>
                                            <input type="text" name="ucountry" id="ucountry" class="form-control" required value="<?php echo $ures['Country']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Email:</label>
                                            <input type="text" name="uemail" id="uemail" class="form-control" required value="<?php echo $ures['Email']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Phone/Mobile:</label>
                                            <input type="text" name="uphone" id="uphone" class="form-control" required value="<?php echo $ures['Phone']; ?>">
                                        </div>

                                        <div class="form-group">
                                            <label>Contact:</label>
                                            <select name="cstatus" id="cstatus" class="form-control required select2" required>
                                                <option value="">Select Size Status</option>
                                                <option value="Active" <?php
                                                if ($ures['Status'] == "Active") {
                                                    echo "selected";
                                                }
                                                ?>>Active</option>
                                                <option value="InActive" <?php
                                                if ($ures['Status'] == "InActive") {
                                                    echo "selected";
                                                }
                                                ?>>InActive</option>
                                            </select>
                                        </div>

                                        <hr>
                                        <a class="btn btn-flat pull-left bg-blue" href="contact" ><i class="fa fa-angle-double-left"></i></a>
                                        <input type="submit" name="updatecontact" id="updatecontact" class="btn btn-flat bg-red pull-right" value="Update Contact">

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
                                <span class="box-title">Add Contact</span>
                            </div>
                            <div class="box-body text-sm">
                                <div class="col-sm-12">
                                    <form class="form-horizontal" method="post" action="">

                                        <div class="form-group">
                                            <label>Front Message:</label>
                                            <textarea type="text" name="message" id="message" class="form-control" placeholder="Enter Fron Message" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>City:</label>
                                            <input type="text" name="city" id="city" class="form-control" required placeholder="City Like Biratnagar, Kathmandu">
                                        </div>
                                        <div class="form-group">
                                            <label>District:</label>
                                            <input type="text" name="district" id="district" class="form-control" required placeholder="District Like Morang,Jhapa,Mechi">
                                        </div>
                                        <div class="form-group">
                                            <label>Province:</label>
                                            <input type="text" name="province" id="province" class="form-control" required placeholder="Pradesh No 1, Pradesh Not 2">
                                        </div>
                                        <div class="form-group">
                                            <label>Country:</label>
                                            <input type="text" name="country" id="country" class="form-control" required placeholder="Nepal">
                                        </div>
                                        <div class="form-group">
                                            <label>Email:</label>
                                            <input type="text" name="email" id="email" class="form-control" required placeholder="Enter Email">
                                        </div>
                                        <div class="form-group">
                                            <label>Phone/Mobile:</label>
                                            <input type="text" name="phone" id="phone" class="form-control" required placeholder="Enter up to two phone number">
                                        </div>

                                        <div class="form-group">
                                            <label>Status:</label>
                                            <select name="status" id="status" class="form-control required select2" required>
                                                <option value="">Select Status</option>
                                                <option value="Active" >Active</option>
                                                <option value="InActive" >InActive</option>
                                            </select>
                                        </div>
                                        <hr>

                                        <input type="submit" name="addcontact" id="addcontact" class="btn btn-flat bg-red pull-right" value="Add Contact">
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
                            <span class="box-title">Contact List</span>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="contact" class="table table-bordered table-striped text-sm text-center">
                                <thead class="bg-red">
                                    <tr>
                                        <th>Front Message</th>
                                        <th>Address</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sqlsize = mysqli_query($connection, "select * from contact ");
                                    while ($res = mysqli_fetch_array($sqlsize)) {
                                        $id = $res['ID'];
                                        ?>
                                        <tr>
                                            <td><?php echo $res['FrontMessage']; ?></td>
                                            <td><?php echo $res['City'] . ", " . $res['District'] . ", " . $res['Province'] . ", " . $res['Country']; ?></td>
                                            <td><?php echo $res['Email']; ?></td>
                                            <td><?php echo $res['Phone']; ?></td>
                                            <td><?php
                                                if ($res['Status'] == "Active") {
                                                    echo "<span class='label label-success'>" . $res['Status'] . "</span>";
                                                } else {
                                                    echo "<span class='label label-danger'>" . $res['Status'] . "</span>";
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <a href="contact?editcontact=<?php echo $id; ?>" data-title="Edit Contact" data-toggle="tooltip"><i class="fa  fa-edit text-black"></i></a>
                                                &nbsp; | &nbsp;
                                                <a href="contact?del=<?php echo $id; ?>" data-title="Delete Contact" data-toggle="tooltip" class="delete"><i class="fa fa-trash-o text-red"></i></a>
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
        $('#contact').DataTable({
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