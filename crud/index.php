

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="http://getbootstrap.com/favicon.ico">

    <title>Crud</title>

    <link href="css/bootstrap.css" rel="stylesheet">


    <?php
    $con=mysqli_connect("localhost","root","","crud");
    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $result = mysqli_query($con,"SELECT * FROM student");



    mysqli_close($con);
    ?>
  </head>

  <body>

    <div class="container" >
        <a href="view/create.php"><button  type="button" class="btn btn-warning" style="margin-top:30px;">Student Regegister</button></a>
        <table class="table table-hover"  style="margin-top:40px;">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Telephone</th>
                    <th>Address</th>
                    <th>DoB</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>

            <tbody>

            <?php
                while($row = mysqli_fetch_array($result)) {
                    echo '<tr>';
                        echo '<td>'.$row['fullname'].'</td>';
                        echo '<td>'.$row['telephone'].'</td>';
                        echo '<td>'.$row['address'].'</td>';
                        echo '<td>'.$row['dob'].'</td>';
                    echo '<td><a href="view/update.php?id='. $row['id'].'" class="btn btn-primary">Edit</a></td>';
                    echo '<td><a href="controller/remove_student.php?id='. $row['id'].'" class="btn btn-primary">Delete</a></td>';
                    echo '</tr>';
                }
            ?>
            </tbody>
        </table>
    </div>




    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>

</body>
</html>