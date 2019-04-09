<?php

include_once 'connect.php';

function base_url() {
    return "http://localhost/theme/";
}

$pid = $_POST['pid'];
$psql = mysqli_query($connection, "select * from product where ProductID = '$pid'");
$row = mysqli_fetch_array($psql);
$Pname = $row['Pname'];
$Pcode = $row['Pcode'];
$availability = $row['InStock'];
$Pdesc = $row['Pdesc'];
$beforedis = $row['BeforeDiscount'];
$afterdis = $row['AfterDiscount'];
$Pimage1 = $row['Pimage1'];
$catid = $row['CategoryID'];


echo $response;
?>

