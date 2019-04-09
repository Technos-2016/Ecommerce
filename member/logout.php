<?php
ob_start();
session_start();
//header('Location:../login.php');
echo "<script>window.location='http://localhost:81/theme/login'</script>";
session_destroy();
?>
