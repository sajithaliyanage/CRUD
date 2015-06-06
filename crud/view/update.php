
<html>
<head>
    <meta charset="utf-8" />
    <title>Registration form </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="../font-awesome/css/font-awesome.min.css" />

    <script type="text/javascript" src="../js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.js"></script>

    <?php
    $con=mysqli_connect("localhost","root","","crud");
    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

        $id = $_GET['id'];

    $result = mysqli_query($con,"SELECT * FROM student where id=$id");

    $student = mysqli_fetch_array($result);



    mysqli_close($con);
    ?>


</head>
<body>

<div class="container">
<!--    <a href="../index.php"><button  type="button" class="btn btn-warning" style="margin-top:30px;">Student Regegister</button></a>-->
<div class="page-header">
    <h1 style="text-align: center;">Student Update Form</h1>
</div>

<!-- Registration form - START -->
<div class="container">
    <div class="row">
        <form method="POST" action="../controller/merge_student.php">
            <input type="hidden" name="id" value="<?php echo $id?>" />
            <div class="col-lg-8 col-lg-offset-2 col-xs-12 col-xs-offset-0">
                <div class="well well-sm"><strong><span class="glyphicon glyphicon-asterisk"></span>Required Field</strong></div>
                <div class="form-group">
                    <label for="InputName">Enter Name</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="fullname" id="fullname" placeholder="Enter Name" required value="<?php echo $student['fullname']?>">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="InputEmail">Enter Telephone</label>
                    <div class="input-group">
                        <input type="telephone" class="form-control" id="InputTelephoneFirst" name="telephone" placeholder="Enter Telephone" required value="<?php echo $student['telephone']?>">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="InputEmail">Address</label>
                    <div class="input-group">
                        <input type="address" class="form-control" id="InputEmailSecond" name="address" placeholder="Enter Address" required value="<?php echo $student['address']?>">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="InputEmail">DOB</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="InputEmailSecond" name="dob" placeholder="Enter DOB" required value="<?php echo $student['dob']?>">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>

                <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-info pull-right">
            </div>
        </form>

    </div>
</div>
<!-- Registration form - END -->

</div>

</body>
</html>