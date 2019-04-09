<?php
ob_start();
session_start();
//header('Location:../login.php');
echo "<script>window.location='http://localhost/theme/login'</script>";
session_destroy();
?>
