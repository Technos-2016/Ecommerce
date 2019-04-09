<?php

error_reporting(E_ALL && E_NOTICE);
require_once '../connect.php';

function base_url() {
    return "http://localhost/theme/";
}

date_default_timezone_set("Asia/Kathmandu");
if (!isset($_SESSION['UID']) || $_SESSION['Member'] != '0') {
    header('Location:../login.php');
}

function findexts($file) {
    $file = strtolower($file);
    $exts = explode(".", $file);
    $n = count($exts) - 1;
    $exts = $exts[$n];
    return $exts;
}

$pid = $_POST['productid'];

$sqm = mysqli_query($connection, "select Pimage1,Pimage2,Pimage3,Pimage4 from product where ProductID = '$pid'");
$row = mysqli_fetch_array($sqm);

$i1 = $row['Pimage1'];
$i2 = $row['Pimage2'];
$i3 = $row['Pimage3'];
$i4 = $row['Pimage4'];


$dir = "../images/product/$pid/";
$response = 0;

$a1 = "Product_" . $pid . '_1' . '.jpg';
$pic1 = $a1;

$a2 = "Product_" . $pid . '_2' . '.jpg';
$pic2 = $a2;

$a3 = "Product_" . $pid . '_3' . '.jpg';
$pic3 = $a3;

$a4 = "Product_" . $pid . '_4' . '.jpg';
$pic4 = $a4;

if ($_FILES["Pimage1"]["name"]) {
    $ext = findexts($_FILES["Pimage1"]["name"]);
    $image1 = $pic1;
    $location = $dir . $image1;
    $uploadfile = $_FILES['Pimage1']['tmp_name'];
    $source = imagecreatefromjpeg($uploadfile);
    list($width, $height) = getimagesize($uploadfile);
    $ratio = $height / $width;
    // new width 50(this is in pixel format)
    $nw = 930;
    $nh = 1163;
    $dst = imagecreatetruecolor($nw, $nh);
    imagecopyresampled($dst, $source, 0, 0, 0, 0, $nw, $nh, $width, $height);
    if (imagejpeg($dst, $location, 100)) {
        if ($i1 != $a1) {
            unlink($dir . $i1);
        }
        $update = mysqli_query($connection, "update product set Pimage1 = '$image1' where ProductID = '$pid'");
        imagedestroy($source);
        imagedestroy($dst);
        $response = "Successfully Uploaded Product $image1";
    }
    echo $response;
} else if ($_FILES["Pimage2"]["name"]) {
    $ext = findexts($_FILES["Pimage2"]["name"]);
    $image2 = $pic2;
    $location = $dir . $image2;
    $uploadfile = $_FILES['Pimage2']['tmp_name'];
    $source = imagecreatefromjpeg($uploadfile);
    list($width, $height) = getimagesize($uploadfile);
    $ratio = $height / $width;
    // new width 50(this is in pixel format)
    $nw = 930;
    $nh = 1163;
    $dst = imagecreatetruecolor($nw, $nh);
    imagecopyresampled($dst, $source, 0, 0, 0, 0, $nw, $nh, $width, $height);
    if (imagejpeg($dst, $location, 100)) {
        if ($i2 != $a2) {
            unlink($dir . $i2);
        }
        $update = mysqli_query($connection, "update product set Pimage2 = '$image2' where ProductID = '$pid'");
        imagedestroy($source);
        imagedestroy($dst);
        $response = "Successfully Uploaded Product  $image2";
    }
    echo $response;
} else if ($_FILES["Pimage3"]["name"]) {
    $ext = findexts($_FILES["Pimage3"]["name"]);
    $image3 = $pic3;
    $location = $dir . $image3;
    $uploadfile = $_FILES['Pimage3']['tmp_name'];
    $source = imagecreatefromjpeg($uploadfile);
    list($width, $height) = getimagesize($uploadfile);
    $ratio = $height / $width;
    // new width 50(this is in pixel format)
    $nw = 930;
    $nh = 1163;
    $dst = imagecreatetruecolor($nw, $nh);
    imagecopyresampled($dst, $source, 0, 0, 0, 0, $nw, $nh, $width, $height);
    if (imagejpeg($dst, $location, 100)) {
       if ($i3 != $a3) {
            unlink($dir . $i3);
        }
        $update = mysqli_query($connection, "update product set Pimage3 = '$image3' where ProductID = '$pid'");
        imagedestroy($source);
        imagedestroy($dst);
        $response = "Successfully Uploaded Product  $image3";
    }
    echo $response;
} else if ($_FILES["Pimage4"]["name"]) {
    $ext = findexts($_FILES["Pimage4"]["name"]);
    $image4 = $pic4;
    $location = $dir . $image4;
    $uploadfile = $_FILES['Pimage4']['tmp_name'];
    $source = imagecreatefromjpeg($uploadfile);
    list($width, $height) = getimagesize($uploadfile);
    $ratio = $height / $width;
    // new width 50(this is in pixel format)
    $nw = 930;
    $nh = 1163;
    $dst = imagecreatetruecolor($nw, $nh);
    imagecopyresampled($dst, $source, 0, 0, 0, 0, $nw, $nh, $width, $height);
    if (imagejpeg($dst, $location, 100)) {
        if ($i4 != $a4) {
            unlink($dir . $i4);
        }
        $update = mysqli_query($connection, "update product set Pimage4 = '$image4' where ProductID = '$pid'");
        imagedestroy($source);
        imagedestroy($dst);
        $response = "Successfully Uploaded Product  $image4";
    }
    echo $response;
}
?>