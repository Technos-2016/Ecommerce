<?php

ob_start();
session_start();
$db['db_host'] = 'localhost';
$db['db_user'] = 'root';
$db['db_pass'] = '';
$db['db_name'] = 'optolens';
foreach ($db as $key => $value) {
    define(strtoupper($key), $value);
}
$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if (!$connection) {
    echo "Error Connecting Database";
    exit(0);
}



//function get_menu_tree($parent_id) {
//    $menu = "";
//    $res = mysqli_query($connection, " SELECT * FROM subcategory where SubStatus='1' and ParentID='" . $parent_id . "' ");
//
//    while ($row = mysqli_fetch_array($res)) {
//        $menu .= "<li><a href='" . $row['link'] . "'>" . $row['SubCategoryName'] . "</a>";
//
//        $menu .= "<ul>" . get_menu_tree($row['SID']) . "</ul>"; //call  recursively
//
//        $menu .= "</li>";
//    }
//
//    return $menu;
//}
?>


