<?php
session_start();
include('BSphp/incdb.php');

if(!$_SESSION['username']){
    header('LOCATION: login.php');
}else{
    echo "welcome".$_SESSION['username'];
}

$sql = "SELECT * FROM admin";
$result = mysqli_query($con,$sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="jquery-ui.min.css">
    <link rel="stylesheet" href="jquery-ui.structure.min.css">
    <link rel="stylesheet" href="jquery-ui.theme.min.css">


    <style>
        nav > div > div > h2{
        margin-top: 10px;
    }/*
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
    .board{
        margin-top: 100px;
    }


    .dash > div > div > button{
        margin-top: 75px;   
    }
    .dash > div > div > button > a{
        display: block;
        text-decoration: none;
        color: white;
        font-size: 20px;
        padding-left: 30px;
        text-align: left;
        margin-top: 20px;
        height:55px;
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
                                        // if(mysqli_num_rows($result) > 0){
                                        //     while($row = mysqli_fetch_assoc($result)){
                                        // echo $row['name']; 
                                        //     }
                                        // }?> </h2>
                                    
                                    <ul class="nav navbar-nav navbar-right">
                                            <li class="dropdown">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Students</a>
                                                    <ul class="dropdown-menu">
                                                      <li><a href="students.php">View Students</a></li>
                                                      <li><a href="addstudent.php">Add Student</a></li>
                                                      <li><a href="payfee.php">Pay fee</a></li>
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
                                          <li role="separator" class="divider"></li>
                                          <li><a href="eenquiry.php">Edit Enquiry</a></li>
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
            <div class="row board">
                <div class="col-lg-12 dash">
                    <div class="btn-group btn-group-lg btn-group-justified" role="group">
                        <div class="btn-group">
                            <button type="button" class="btn btn-success"><a href="students.php">Students <span class="badge pull-right">23</span> </a></button>
                        </div>
                        <div class="btn-group">                            
                            <button type="button" class="btn btn-info"><a href="projects.php">Projects <span class="badge pull-right">6</span> </a> </button>
                        </div>
                        <div class="btn-group">
                            <button type="button" class="btn btn-warning"><a href="Enquiry.php">Enquiry<span class="badge pull-right">10</span></a></button>
                        </div>
                        <div class="btn-group">
                            <button type="button" class="btn btn-danger"><a href="courses.php">Courses<span class="badge pull-right">36</span></a></button>
                        </div>
                    </div>
                </div>
            </div>


        </div>

























            <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
            <script src="jquery-ui.min.js"></script>
        
</body>
</html>