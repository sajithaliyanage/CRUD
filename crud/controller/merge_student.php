<?php
$con=mysqli_connect("localhost","root","","crud");
// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$name = $_POST['fullname'];
$telephone = $_POST['telephone'];
$dob = $_POST['dob'];
$address = $_POST['address'];
$id = $_POST['id'];

mysqli_query($con,"UPDATE student set fullname='$name', telephone='$telephone', dob='$dob', address='$address' where id=$id");


header("Location:../index.php");
mysqli_close($con);
?>
