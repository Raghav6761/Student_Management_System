<?php
session_start();
include('BSphp/incdb.php');

if(!$_SESSION['username']){
    header('LOCATION: login.php');
}

$sql1 = "SELECT * FROM admin";
$result1 = mysqli_query($con,$sql1);
?>

<?php
            if(isset($_POST['submit'])){
                $joinDate = $_POST['joinDate'];
                $sName = $_POST['sName'];
                $BirthDate = $_POST['BirthDate'];
                $Pno = $_POST['Pno'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $regId = $_POST['regId'];
                $course = $_POST['course'];
                $fee = $_POST['fee'];
                $payMethod = $_POST['payMethod'];
                $installments = $_POST['installments'];

                echo $joinDate.$sName.$BirthDate.$Pno.$email.$address.$regId.$course.$fee.$payMethod.$installments; 
                $sq = "INSERT INTO students (joinDate,sName, BirthDate, Pno, email, home, regId, course, fee, payMethod, installments,pFee) VALUES ('$joinDate','$sName','$BirthDate','$Pno','$email','$address','$regId','$course','$fee','$payMethod','$installments','$fee')";
                $result2 = mysqli_query($con,$sq);

                if($result2){
                    header("LOCATION: details.php?regId=$regId");
                }
                else{
                    echo "<script>alert('upload failed');</script>";
                    echo "Error: ". $sq . "<br>" . mysqli_error($con);
                }
            }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Student</title>
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="jquery-ui.min.css">
    <link rel="stylesheet" href="jquery-ui.structure.min.css">
    <link rel="stylesheet" href="jquery-ui.theme.min.css">
    <!-- <link rel="stylesheet" href="bootstrap-select-master/dist/css/bootstrap-select.min.css"> -->
    <!-- <link rel="stylesheet" href="selectize/selectize.bootstrap3.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.10/dist/css/bootstrap-select.min.css">
    
    <style>
    /*
    nav{
        background-color: rgba(255, 255, 255, 0.8);
    }
    */
    nav > div > div > h2{
        margin-top: 10px;
    }

    /*

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
        margin-right: 0;
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
    .ui-datepicker table {
    background-color: white;
    width: 100%;
    font-size: .9em;
    border-collapse: collapse;
    margin: 0 0 .4em;
    }
    .dropdown > ul li a:hover{
        color: black !important;
    }
    </style>
</head>
<body>
    <div class="row">
        <header>
            <nav class="col-lg-12 col-xs-12 navbar navbar-primary navbar-fixed-top">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="glyphicon glyphicon-th-large"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        
                        <h2 class="pull-left">Welcome, <?php 
                                        echo $_SESSION['username'];
                                        // if(mysqli_num_rows($result1) > 0){
                                        //     while($row = mysqli_fetch_assoc($result1)){
                                        // echo $row['name']; 
                                        //     }
                                        // }?></h2>
                        
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Students</a>
                                <ul class="dropdown-menu">
                                    <li><a href="students.php">View Students</a></li>
                                    <li><a href="addstudent.php">Add Student</a></li>
                                    <!-- <li><a href="payfee.php">Pay fee</a></li> -->
                                    <li><a href="viewfee.php">View fee</a></li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="editstudent.php">Edit Student</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Courses</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="courses.php">View Courses</a></li>
                                        <li><a href="addcourse.php">Add Courses</a></li>
                                        <li role="separator" class="divider"></li>
                                  <li><a href="ceditall.php">Edit Courses</a></li>
                                </ul>
                              </li>
                              <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Enquiry</a>
                            <ul class="dropdown-menu">
                              <li><a href="enquiry.php">View Enquiry</a></li>
                              <li><a href="addenquiry.php">Add Enquiry</a></li>
                              <!-- <li role="separator" class="divider"></li> -->
                              <!-- <li><a href="eenquiry.php">Edit Enquiry</a></li> -->
                            </ul>
                          </li>
                          
                          <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Projects <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                  <li><a href="projects.php">View Projects</a></li>
                                  <li><a href="addproject.php">Add Projects</a></li>
                                  <li role="separator" class="divider"></li>
                                  <li><a href="editprojects.php">Edit Projects</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                              <a href="login.php" class="badge text-center">SIGN OUT</a>
                            </li>
                        </ul>
                    </div>
                </div>
        </nav>
    </header>
</div>
    <div class="clearfix"></div>
    
    <div class="container">
        <div class="row sdetails">
            <div class="col-lg-push-2 col-lg-8">
                <form action="" method="POST">
                    <p class="Edit pull-right"><input type="submit" class="btn btn-default" value="Add" name="submit" style="background-color: darkgray;height: 30px"></p>
                    <p class="back"><a href="students.php"><span class="glyphicon glyphicon-arrow-left"></span>Back to students</a></p>
                    <div class="panel panel-default" style="box-shadow: 2px 2px 5px rgba(0,0,0,0.3)">
                    <div class="det">
                        <table class="table table-responsive table-striped">
                            <tr>
                                <th>
                                    Date of Joining
                                </th>
                                <td>
                                    <input type="text" class="input-sm form-control" id="datepicker" placeholder="Date" name="joinDate">
                                    <div id="placeholder"></div>            
                                    <div style='position:fixed;bottom:0;left:0;background:lightgray;width:100%;'>
                                    </td>
                            </tr>
                            <tr>
                                <th>
                                    Student Name
                                </th>
                                <td>
                                        <input type="text" class="input-sm form-control" name="sName" id="sName" placeholder="Name">
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        D.O.B.
                                    </th>
                                    <td>
                                        <input type="text" placeholder="Date of Birth" class="input-sm form-control datepicker minimumSize" name="BirthDate" id="BirthDate" />

                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Phone Number
                                    </th>
                                    <td>
                                        <input type="number" name="Pno" class="input-sm form-control" placeholder="Contact Number">
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        E-Mail ID
                                    </th>
                                    <td>
                                        <input type="email" name="email" class="input-sm form-control" placeholder="E-Mail ID">
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Address
                                    </th>
                                    <td>
                                        <input type="text" name="address" class="input-sm form-control" placeholder="Address">
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Registration ID
                                    </th>
                                    <td>
                                        <input type="text" class="input-sm form-control" name="regId" placeholder="Registration ID">
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Course
                                    </th>
                                    <td>

                                            <select id="basic" class="selectpicker show-tick form-control" data-live-search="true" name="course">
                                                    <optgroup>
                                                    <option data-subtext="option subtext" value="Angular JS">Angular JS</option>
                                                    <option value="Digital Marketing">Digital Marketing</option>
                                                    <option class="get-class" value="HTML & CSS">HTML & CSS</option>
                                                    <option value="JS & Jquery">JS & Jquery</option>
                                                    <option value="Web Design and Development">Web Design and Development</option>
                                                    </optgroup>
                                                  </select>
                                        
                                        
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Fee
                                    </th>
                                    <td>
                                        <input type="text" class="input-sm form-control" name="fee" placeholder="Course fee">
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Payment Method
                                    </th>
                                    <td>
                                            <select name="payMethod" class="form-control input-sm" style="background-color: white" id="epay1" style="width:180px">
                                                    <option value="">Payment Method</option>
                                                    <option value="Online">Online</option>
                                                    <option value="Cash">Cash</option>
                                                    <option value="Bank Transfer">Bank Transfer</option>
                                                </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Installments
                                    </th>
                                    <td>
                                            <select name="installments" class="form-control input-sm" style="background-color: white" id="epay1" style="width:180px">
                                                    <option value="">Number of Installments</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                </select>
                                    </td>
                                </tr>
                        </table>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="jquery-ui.min.js"></script>
<!-- <script src="chosen/chosen.jquery.min.js"></script> -->
<!-- <script src="bootstrap-select-master/dist/js/bootstrap-select.min.js"></script> -->
<!-- <script src="selectize/selectize.min.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.10/dist/js/bootstrap-select.min.js"></script>

<script>
    $(document).ready(function(){
    $("#datepicker").datepicker();
    $("#datepicker").change(function() {
        var date = $(this).datepicker("getDate");
        $("#placeholder").text(date);
        });

    
    var d = new Date();
    var year = d.getFullYear() - 5;
    d.setFullYear(year);
    $('#BirthDate').datepicker({ changeYear: true, changeMonth: true, yearRange: '1920:' + year + '', defaultDate: d});

    $('.selectpicker').selectpicker();

    });
    </script>
    
</body>
</html>