<?php
require_once('db.php');

$get_id=$_GET['tbl_image_id'];

// sql to delete a record
$sql = "Delete from tbl_image where tbl_image_id = '$get_id'";

// use exec() because no results are returned
$conn->exec($sql);
header('location:index.php');
?>