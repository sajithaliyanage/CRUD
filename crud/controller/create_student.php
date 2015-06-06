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


mysqli_query($con,"INSERT INTO student (fullname, telephone, dob,address)
VALUES ('$name', '$telephone','$dob','$address')");

header("Location:../index.php");
mysqli_close($con);
?>

