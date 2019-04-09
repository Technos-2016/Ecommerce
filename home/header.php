<?php
require_once '../connect.php';

function base_url() {
    return "http://localhost/theme/";
}

$page = basename($_SERVER['PHP_SELF']); // Get script filename without any path information
$page = str_replace( array( '.php', '.htm', '.html' ), '', $page ); // Remove extensions
$page = str_replace( array('-', '_'), ' ', $page); // Change underscores/hyphens to spaces
$page = strtoupper( $page ); 

date_default_timezone_set("Asia/Kathmandu");
if (!isset($_SESSION['UID']) || $_SESSION['Member'] != '0') {
    header('Location:../login.php');
}
$fname = $_SESSION['FirstName'];
$lname = $_SESSION['LastName'];
$uname = $fname . " " . $lname;
$ismember = $_SESSION['Member'];
$email = $_SESSION['Email'];
$status = $_SESSION['Status'];
$simage = $_SESSION['Image'];
$cdatetime = date('Y-m-d H:i:s');
$mdatetime = date('Y-m-d H:i:s');

$sqlpro = mysqli_query($connection, "select * from user where UID = '".$_SESSION['UID']."'");
$pro = mysqli_fetch_array($sqlpro);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>OPTOLENS NEPAL | <?php echo $page;?></title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="favicon.ico">
        
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="../plugins/bootstrap/dist/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="../plugins/font-awesome/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="../plugins/Ionicons/css/ionicons.min.css">
        <!-- DataTables -->
        <link rel="stylesheet" href="../plugins/datatables.net-bs/css/dataTables.bootstrap.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
        <!-- Select2 -->
        <link rel="stylesheet" href="../plugins/select2/dist/css/select2.min.css">
        <!-- Morris chart -->
        <link rel="stylesheet" href="../plugins/morris.js/morris.css">
        <!-- jvectormap -->
        <link rel="stylesheet" href="../plugins/jvectormap/jquery-jvectormap.css">
        <!-- Date Picker -->
        <link rel="stylesheet" href="../plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="../plugins/bootstrap-daterangepicker/daterangepicker.css">
        <!-- bootstrap wysihtml5 - text editor -->
        <link rel="stylesheet" href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
        <!-- Bootstrap Color Picker -->
        <link rel="stylesheet" href="../plugins/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        <style>
            /* Paste this css to your style sheet file or under head tag */
            /* This only works with JavaScript, 
            if it's not present, don't show loader */
            .no-js #loader { display: none;  }
            .js #loader { display: block; position: absolute; left: 100px; top: 0; }
            .se-pre-con {
                position: fixed;
                left: 0px;
                top: 0px;
                width: 100%;
                height: 100%;
                z-index: 9999;
                background: url(../images/Preloader_1.gif) center no-repeat #fff;
            }
        </style>

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
        <script>
            //paste this code under head tag or in a seperate js file.
            // Wait for window load
            $(window).load(function () {
                // Animate loader off screen
                $(".se-pre-con").delay(1500).fadeOut("slow");
                ;
            });
        </script>
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <?php
        if ($_SERVER['REQUEST_URI'] == 'theme/home/dashboard') {
            echo "<div class='se-pre-con'>Logging You In..</div>";
        } else {
            echo "<div class='se-pre-con'>Please Wait..</div>";
        }
        ?>