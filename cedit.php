<?php session_start(); 
include('BSphp/incdb.php');

if(!$_SESSION['username']){
    header('LOCATION: login.php');
}
?>

<?php

    $sno = $_GET['sno'];
    $sql2 = "SELECT * FROM courses WHERE sno = '$sno'";
    $result2 = mysqli_query($con,$sql2);

    if(mysqli_num_rows($result2) > 0){
        while($row = mysqli_fetch_assoc($result2)){
            
?>

<?php
            if(isset($_POST['update'])){
                $fee = $_POST['fee'];
                $duration = $_POST['duration'];
                // $syllabus = $_POST['syllabus'];
                $prerequisites = $_POST['prerequisites'];
                $sql3 = "UPDATE courses SET fee='$fee',duration='$duration' WHERE sno='$sno'";
                $result3 = mysqli_query($con,$sql3);

                if($result3){
                    header('LOCATION: courses.php');
                }
                else{
                    echo "<script>alert('Failure');</script>";
                }
            }
            else{
                echo "Nothing yet";
            }
            ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Course</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="jquery-ui.min.css">
    <link rel="stylesheet" href="jquery-ui.structure.min.css">
    <link rel="stylesheet" href="jquery-ui.theme.min.css">
    
    <style>
        nav > div > div > h2{
            margin-top: 10px;
        }
        /*
    nav{
        background-color: rgba(255, 255, 255, 0.8);
    }


    .dropdown > .badge:hover{
        color:black;
    }

    .badge > a{
        color:white;
        text-decoration: none;
    }

    .badge > a:hover{
        color: black !important;
    }

    body{
        background-color: beige;
    }

    */
    .row{
        margin-right: 0%;
        margin-bottom: 10px;
    }
    .main{
        margin-top: 20px;
    }

    .main > .row{
        margin-bottom: 20px;
    }

    .search{
        width:97.5%;
        margin-left: 13px;
    }

    /*
    .bon{
        border:1px solid gray;
        border-radius: 0px 10px 0px 0px;
    }
    .pl{
        border:1px solid gray;
        border-radius: 10px 0px 0px 0px;
    }

    */
    .list{
        margin-top: 100px;
    }

    /*
    table{
        background-color: antiquewhite;
    }

    .h > th{
        font-size: 16px;
        background-color:rgb(59, 125, 247);
        color:white;
    }

    */
    .sdetails{
        margin-top: 120px;
    }
    .dropdown > ul li a:hover{
        color: black !important;
    }
    </style>
</head>
<body>
    <div class="row">
    <?php include('include.php') ?>
    </div>
    <div class="clearfix"></div>

    <div class="container">
        <div class="row sdetails">
            <div class="col-lg-push-2 col-lg-8">
                <form action="" method="post">
                <p class="Edit pull-right"><input type="submit" class="btn btn-default" style="height: 30px" name="update" value="Update"></p>
                <p class="back"><a href="students.php"><span class="glyphicon glyphicon-arrow-left"></span>Back to students</a></p>
                <div class="panel panel-default" style="box-shadow: 2px 2px 5px rgba(0,0,0,0.3)">
                    <div class="det">
                        <table class="table table-responsive table-striped">
                                <tr>
                                    <th>
                                        Course Name
                                    </th>
                                    <td>
                                        <input type="text" class="form-control input-sm" style="background-color: white" name="cName" id="ename" value="<?php echo $row['cName'];?>" disabled>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Fees
                                    </th>
                                    <td>
                                        <input type="text" class="form-control input-sm" style="background-color: white" name="fee" value="<?php echo $row['fee'];?>">
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Duration
                                    </th>
                                    <td>
                                        <input type="text" class="form-control input-sm" style="background-color: white" name="duration" value="<?php echo $row['duration'];?>">
                                    </td>
                                </tr>
                                <!-- <tr>
                                    <th>
                                        Syllabus
                                    </th>
                                    <td>
                                        <input type="text" class="form-control input-sm" style="background-color: white" name="syllabus" value="<?php echo $row['syllabus'];?>">
                                    </td>
                                </tr> -->
                                <tr>
                                    <th>
                                        Prerequisites
                                    </th>
                                    <td>
                                        <input type="text" class="form-control input-sm" style="background-color: white" name="prerequisites" value="<?php echo $row['prerequisites'];?>">
                                    </td>
                                </tr>
                                <?php
        }
    }
                                ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="jquery-ui.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#search').hide();
        });
    </script>
</body>
</html>