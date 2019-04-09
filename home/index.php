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
                Wait 
                <small>404 Page</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">404 Error</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <div id="tt-pageContent">
                <div class="tt-offset-0 container-indent">
                    <div class="tt-page404">
                        <h1 class="tt-title">THAT PAGE CAN’T BE FOUND. You are Caught honey <?php $ip =  $_SERVER['REMOTE_ADDR']; echo $ip; ?></h1>
                        <p>It looks like nothing was found at this location. Or you are trying to get to the root!</p>
                        <a href="<?php echo base_url() . "home/dashboard"; ?>" class="btn">GO TO HOME</a>

                        
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

<?php
include_once 'footer.php';
?>
