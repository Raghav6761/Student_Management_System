<?php session_start();
include('BSphp/incdb.php');

if(!$_SESSION['username']){
    header('LOCATION: login.php');
}
?>

<?php

    $regId = $_GET['regId'];
    $sql2 = "SELECT * FROM students WHERE regId = '$regId'";
    $result2 = mysqli_query($con,$sql2);

    if(mysqli_num_rows($result2) > 0){
        while($row = mysqli_fetch_assoc($result2)){
            
?>

<?php
            if(isset($_POST['update'])){
                $course = $_POST['course'];
                $fee = $_POST['fee'];
                $payMethod = $_POST['payMethod'];
                $installments = $_POST['installments'];
                $sql3 = "UPDATE students SET course='$course',fee='$fee',payMethod='$payMethod',installments='$installments' WHERE regId='$regId'";
                $result3 = mysqli_query($con,$sql3);

                if($result3){
                    header('LOCATION: students.php');
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
    <title>Edit Student</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="jquery-ui.min.css">
    <link rel="stylesheet" href="jquery-ui.structure.min.css">
    <link rel="stylesheet" href="jquery-ui.theme.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.10/dist/css/bootstrap-select.min.css">
    
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
    } */

    .row{
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

    /* .bon{
        border:1px solid gray;
        border-radius: 0px 10px 0px 0px;
    }
    .pl{
        border:1px solid gray;
        border-radius: 10px 0px 0px 0px;
    } */

    .list{
        margin-top: 100px;
    }

    /* table{
        background-color: antiquewhite;
    } */

    .h > th{
        font-size: 16px;
        /* background-color:rgb(59, 125, 247); */
        color:white;
    }

    .sdetails{
        margin-top: 120px;
    }
    .dropdown > ul li a:hover{
        color: black !important;
    }
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row">
    <?php include('include.php') ?>
    </div>
    <div class="clearfix"></div>

    <div class="container">
        <div class="row sdetails">
            <div class="col-lg-push-2 col-lg-8">
                <form action="" method="POST">
                <p class="Edit pull-right"><a href=""><input type="submit" class="btn btn-default" style="height: 30px" name="update" value="Update"></a></p>
                <p class="back"><a href="students.php"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back to students</a></p>
                <div class="panel panel-default" style="box-shadow: 2px 2px 5px rgba(0,0,0,0.3)">
                    <div class="det">
                        <table class="table table-responsive table-striped">
                                <tr>
                                    <th>
                                        Student Name
                                    </th>
                                    <td>
                                        <input type="text" class="form-control input-sm" style="background-color: white" name="sName" id="ename" value="<?php echo $row['sName'];?>" placeholder="<?php echo $row['sName'];?>" disabled>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Registration ID
                                    </th>
                                    <td>
                                        <input type="text" class="form-control input-sm" style="background-color: white" name="regId" value="<?php echo $row['regId'];?>" disabled>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        D.O.B.
                                    </th>
                                    <td>
                                        <input type="text" class="form-control input-sm" style="background-color: white" name="BirthDate" value="<?php echo $row['BirthDate'];?>" disabled>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Date of Joining
                                    </th>
                                    <td>
                                        <input type="text" class="form-control input-sm" style="background-color: white" name="joinDate" value="<?php echo $row['joinDate'];?>" disabled>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Course
                                    </th>
                                    <td>
                                            <select id="basic" class="selectpicker show-tick form-control" data-live-search="true" name="course" value="<?php echo $row['course'];?>">
                                                    <option data-subtext="option subtext">Angular JS</option>
                                                    <option>Digital Marketing</option>
                                                    <option class="get-class">HTML & CSS</option>
                                                      <option>JS & Jquery</option>
                                                      <option>Web Design and Development</option>
                                                    </optgroup>
                                                  </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Payment Method
                                    </th>
                                    <td>
                                            <select class="form-control input-sm" style="background-color: white" name="payMethod" id="epay1" style="width:180px" value="">
                                                    <option value="<?php echo $row['payMethod'];?>"><?php echo $row['payMethod'];?></option>
                                                    <option value="Online">Online</option>
                                                    <option value="Cash">Cash</option>
                                                    <option value="Bank Transfer">Bank Transfer</option>
                                                </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Fee
                                    </th>
                                    <td>
                                        <input type="text" class="form-control input-sm" style="background-color: white" name="fee" value="<?php echo $row['fee'];?>">
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Installments
                                    </th>
                                    <td>
                                            <select name="installments" class="form-control input-sm" style="background-color: white" id="epay1" style="width:180px" value="">
                                                    <option value="<?php echo $row['installments'];?>"><?php echo $row['installments'];?></option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                </select>
                                    </td>
                                </tr>
                                <?php 
        }
    }
    ?>
                        </table>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="jquery-ui.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.10/dist/js/bootstrap-select.min.js"></script>

    <script>
    $(document).ready(function(){
        $('#search').hide();
        $('.selectpicker').selectpicker();
    });
    </script>
</body>
</html>