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
                Profile
                <small>Profile Page</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Profile</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="box box-primary">
                        <div class="box-body box-profile">
                            <img class="profile-user-img img-responsive img-circle" src="../dist/img/user4-128x128.jpg" alt="User profile picture">

                            <h3 class="profile-username text-center"><?php echo $uname; ?></h3>

                            <p class="text-muted text-center">OPTOLENS NEPAL</p>

                            <ul class="list-group list-group-unbordered">
                                <li class="list-group-item">
                                    <b>Email</b> <a class="pull-right"><?php echo $email; ?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Mobile</b> <a class="pull-right"><?php echo $pro['MobileNumber']; ?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Country</b> <a class="pull-right"><?php echo $pro['Country']; ?></a>
                                </li>
                            </ul>

                            <!--<a href="manageprofile?eid=<?php //echo $_SESSION['UID']; ?>" class="btn btn-primary btn-block"><b>EDIT</b></a>-->
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>

                <div class="col-sm-9">
                    <!-- About Me Box -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">About Me & My Website</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <strong><i class="fa fa-calendar margin-r-5"></i> DOB</strong>

                            <p class="text-muted">
                                <?php echo $pro['DOB'];?>
                            </p>

                            <hr>

                            <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

                            <p class="text-muted"><?php echo $pro['City']." ,". $pro['Province']." ,". $pro['PinCode']. " ,". $pro['Country'];?></p>

                            <hr>

                            <strong><i class="fa fa-pencil margin-r-5"></i> Social Relation</strong>

                            <p>
                                <span class="label label-danger"><i class="fa fa-facebook-f"></i></span>
                                <span class="label label-success"><i class="fa fa-twitter-square"></i></span>
                                <span class="label label-info"><i class="fa fa-google-plus-circle"></i></span>
                                <span class="label label-warning"><i class="fa fa-instagram"></i></span>
                                <span class="label label-primary"><i class="fa fa-youtube-square"></i></span>
                            </p>

                            <hr>

                            <strong><i class="fa fa-weibo margin-r-5"></i> Website</strong>

                            <p><?php echo $pro['Website'];?></p>
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
