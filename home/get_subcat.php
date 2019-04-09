<?php
require_once '../connect.php';

function base_url() {
    return "http://localhost:81/theme/";
}

date_default_timezone_set("Asia/Kathmandu");
if (!isset($_SESSION['UID']) || $_SESSION['Member'] != '0') {
    header('Location:../login.php');
}
$ismember = $_SESSION['Member'];
$cdatetime = date('Y-m-d H:i:s');
$mdatetime = date('Y-m-d H:i:s');
if (!empty($_POST["cat_id"])) {
    $id = intval($_POST['cat_id']);
    $query = mysqli_query($connection, "SELECT * FROM subcategory WHERE ParentCatID=$id");
    while ($row = mysqli_fetch_array($query)) {
        ?>
        <option value="<?php echo htmlentities($row['SID']); ?>" ><?php echo htmlentities($row['SubCategoryName']); ?></option>
        <?php
    }
}
?>