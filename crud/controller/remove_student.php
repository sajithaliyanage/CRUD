<?php
$con=mysqli_connect("localhost","root","","crud");
// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$id = $_GET['id'];

mysqli_query($con,"DELETE from student  where id=$id");


header("Location:../index.php");
mysqli_close($con);
?>
