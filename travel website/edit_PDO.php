<?php

require_once ('db.php');

$get_id=$_REQUEST['tbl_image_id'];
$fname=$_POST['package_name'];
$lname=$_POST['package_details'];



move_uploaded_file($_FILES["image"]["tmp_name"],"uploads/" . $_FILES["image"]["name"]);			
$location1=$_FILES["image"]["name"];


$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "UPDATE tbl_image SET image_location ='$location1',package_name='$fname',package_details='$lname' WHERE tbl_image_id = '$get_id' ";

$conn->exec($sql);
echo "<script>alert('Successfully Updated!!!'); window.location='admin.php'</script>";
?>