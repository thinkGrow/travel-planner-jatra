<?php
require_once('db.php');

$fname= $_POST['fname'];
$mname= $_POST['mname'];
$lname= $_POST['lname'];
$address= $_POST['address'];
$email= $_POST['email'];

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "INSERT INTO student (fname, mname, lname, address, email)
VALUES ('$fname', '$mname', '$lname', '$address', '$email')";

$conn->exec($sql);
echo "<script>alert('Account successfully added!'); window.location='admin.php'</script>";
?>