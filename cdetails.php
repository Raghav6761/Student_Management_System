<?php
session_start();
include('BSphp/incdb.php');

if(!$_SESSION['username']){
    header('LOCATION: login.php');
}else{
    echo "welcome".$_SESSION['username'];
}

$sno=$_GET['sno'];
$sql2 = "SELECT * FROM courses WHERE sno='$sno'";
$result2 = mysqli_query($con,$sql2);
if(mysqli_num_rows($result2) > 0){
    while($row = mysqli_fetch_assoc($result2)){
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
        /*
            *{
                color: white !important;
            }
        
            .nav li{
                background-color: rgba(0, 0, 0, 0.8);
            }
        
            nav{
                background-color: rgba(0, 0, 0, 0.8);
            }
        
            table{
                background-color: rgb(7,27,63);
            }
        
            .h > th{
                font-size: 16px;
                background-color:rgb(7, 27, 63);
                color:white;
            }
            table  tr  td{
                font-size: 16px;
                background-color:rgb(48, 53, 56);
                color:black;
            }
            table  tr  th{
                font-size: 16px;
                background-color:rgb(48, 53, 56);
                color:black;
            }
        
            body{
                background-color: rgb(38, 47, 65);
            }
        */
    nav > div > div > h2{
        margin-top: 10px;
    }
    /*body{
        background-color: rgb(255, 199, 167);
        background-color: rgba(255, 182, 182, 0.8);
    }*/

    .sdetails{
        margin-top: 100px;
    }
    /*
    .sdetails > div >div{
        box-shadow: 15px 15px 30px rgba(0,0,0,0.3);
    }
    

    .det > table th {
        width:400px;
    }*/
    .dropdown > ul li a:hover{
        color: black !important;
    }
    </style>
</head>
<body>
<div class="container">
        <div class="row">
    <?php include('include.php') ?>
            </div>

            <div class="container">
                <div class="row sdetails">
                    <div class="col-lg-push-2 col-lg-8">
                        <form action="cedit.php?sno=<?php echo $row['sno']; ?>" method="post">
                        <p class="Edit pull-right"><input type="submit" class="btn btn-default" style="height:30px" value="Update"></p>
                        <p class="back"><a href="courses.php"><span class="glyphicon glyphicon-arrow-left"></span>Back to Courses</a></p>
                        <div class="panel panel-default">
                            <div class="det">
                                <table class="table table-responsive table-striped">
                                        <tr>
                                            <th>
                                                Course Name
                                            </th>
                                            <td>
                                                <?php echo $row['cName']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                Fees
                                            </th>
                                            <td>
                                                Rs. <?php echo $row['fee']; ?>/-
                                            </td>
                                        </tr>
                                        <!-- <tr>
                                            <th>
                                                Syllabus
                                            </th>
                                            <td>
                                                <?php echo $row['syllabus']; ?>
                                            </td>
                                        </tr> -->
                                        <tr>
                                            <th>
                                                Duration
                                            </th>
                                            <td>
                                                <?php echo $row['duration']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                Prerequisites
                                            </th>
                                            <td>
                                                <?php echo $row['prerequisites']; }}?>
                                            </td>
                                        </tr>
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
        
</body>

<script>
    $(document).ready(function(){
        $('#search').hide();
    });
</script>
</html>