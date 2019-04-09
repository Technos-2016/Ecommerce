<?php

require_once '../connect.php';

function base_url() {
    return "http://localhost/theme/";
}

date_default_timezone_set("Asia/Kathmandu");
if (!isset($_SESSION['UID']) || $_SESSION['Member'] != '0') {
    header('Location:../login.php');
}
$ismember = $_SESSION['Member'];
$cdatetime = date('Y-m-d H:i:s');
$mdatetime = date('Y-m-d H:i:s');
$data = [];
if (!empty($_POST["product_id"])) {
    $id = intval($_POST['product_id']);
    $query = mysqli_query($connection, "SELECT * FROM product WHERE ProductID=$id");
    $row = mysqli_fetch_array($query);
    $data['Pcode'] = $row['Pcode'];
    $data['Pname'] = $row['Pname'];
    $data['Pdesc'] = $row['Pdesc'];
    
    $catsql = mysqli_query($connection, "select CategoryName from category where CatID = '" . $row['CategoryID'] . "'");
    $catrow = mysqli_fetch_array($catsql);
    $data['CategoryName'] = $catrow['CategoryName'];
    $subcat = explode(",", $row['SubCatID']);
    $value = array();
    $c = "";
    foreach ($subcat as $sub) {
        $subsql = mysqli_query($connection, "select SubCategoryName from subcategory where ParentCatID = '" . $row['CategoryID'] . "' AND SID = '$sub'");
        while ($rowsub = mysqli_fetch_array($subsql)) {
            $value[] =$rowsub['SubCategoryName'];
        }
        $c = implode(", ", $value);
    }
     $data['sub'] = $c;
     
     $data['image1'] = base_url()."images/product/".$id."/".$row['Pimage1'];
     $data['image2'] = base_url()."images/product/".$id."/".$row['Pimage2'];
     $data['image3'] = base_url()."images/product/".$id."/".$row['Pimage3'];
     $data['image4'] = base_url()."images/product/".$id."/".$row['Pimage4'];
     
}
echo json_encode($data);
?>