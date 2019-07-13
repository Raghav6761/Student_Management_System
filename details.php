<?php
session_start();
include('BSphp/incdb.php');

if(!$_SESSION['username']){
    header('LOCATION: login.php');
}else{
    echo "welcome".$_SESSION['username'];
}

$sql1 = "SELECT * FROM admin";
$result1 = mysqli_query($con,$sql1);
?>

<?php
    $regId=$_GET['regId'];
    $sql2 = "SELECT * FROM students WHERE regId='$regId'";
    $result2 = mysqli_query($con,$sql2);
    if(mysqli_num_rows($result2) > 0){
        while($row = mysqli_fetch_assoc($result2)){
            // if($regId == $row['regId']){
                
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Details</title>
    
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

    */

    body{
        /*background-color: rgb(255, 199, 167);*/
        /*background-color: rgba(255, 182, 182, 0.8);*/
    }

    .sdetails{
        margin-top: 100px;
    }

    .sdetails > div >div{
        box-shadow: 15px 15px 30px rgba(0,0,0,0.3);
    }
    
    .det > table th {
        width:400px;
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

            <div class="container">
                <div class="row sdetails">
                    <div class="col-lg-push-2 col-lg-8">
                        <p class="Edit pull-right"><a href="edit.php?regId=<?php echo $regId; ?>">Edit</a></p>
                        <p class="back"><a href="students.php"><span class="glyphicon glyphicon-arrow-left"></span>Back to students</a></p>
                        <div class="panel panel-default">
                            <div class="det">
                                <table class="table table-responsive table-striped">
                                        <tr>
                                            <th>
                                                Student Name
                                            </th>
                                            <td>
                                            <?php
                                                echo $row['sName'];
                                            ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                Registration ID
                                            </th>
                                            <td>
                                            <?php
                                                echo $regId;
                                            ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                D.O.B.
                                            </th>
                                            <td>
                                            <?php
                                                echo $row['BirthDate'];
                                            ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                Date of Joining
                                            </th>
                                            <td>
                                            <?php
                                                echo $row['joinDate'];
                                            ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                Course
                                            </th>
                                            <td>
                                            <?php
                                                echo $row['course'];
                                            ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                Payment Method
                                            </th>
                                            <td>
                                            <?php
                                                echo $row['payMethod'];
                                            ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                Fee
                                            </th>
                                            <td>
                                            <?php
                                                echo $row['fee'];
                                            ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                Installments
                                            </th>
                                            <td>
                                            <?php
                                                echo $row['installments'];
                                            ?>
                                            </td>
                                        </tr>
                                            <?php
                                                                                                                                        
                                            }
                                        }
                                    // }
                                            ?>
                                            </td>
                                        </tr>
                                </table>
                            </div>
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