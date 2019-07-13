<?php session_start(); 
include('BSphp/incdb.php');

if(!$_SESSION['username']){
    header('LOCATION: login.php');
}
?>

<?php

    $sno = $_GET['sno'];
    $sql2 = "SELECT * FROM projects WHERE sno = '$sno'";
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
    <title>Edit Student</title>
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

        .ui-datepicker table{
            background-color: white !important;
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
        background-color: rgb(198, 253, 243);
    }

    */
    .row{
        margin-bottom: 10px;
        margin-right: 0px;
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

    select{
        width: 180px;
    }
    .dropdown > ul li a:hover{
        color: black !important;
    }
    </style>
</head>
<body>
    <div class="row">
    <!-- <?php include('include.php') ?> -->
    </div>
    <div class="clearfix"></div>

    <div class="container">
        <div class="row sdetails">
            <div class="col-lg-push-2 col-lg-8">
                <form action="demo-process.php?sno=<?php echo $row['sno']; ?>" method="POST">
                <form action="" method="POST">
                <p class="Edit pull-right"><input type="submit" name="updatedata" class="btn btn-default" style="height: 30px" value="Update"></p>
                <p class="back"><a href="projects.php"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back to Projects</a></p>
                <div class="panel panel-inverse" style="box-shadow: 2px 2px 5px rgba(0,0,0,0.3)">
                    <div class="det">
                        <table class="table table-responsive table-striped ">
                                <tr>
                                    <th>
                                        Project Name
                                    </th>
                                    <td>
                                        <input type="text" name="pName" class="readonly form-control input-sm" style="background-color: white" id="ename" value="<?php echo $row['pName']; ?>" readonly>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Company Name
                                    </th>
                                    <td>
                                        <input type="text" name="comName" class="form-control input-sm" style="background-color: white"value="<?php echo $row['comName']; ?>" >
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Client Name
                                    </th>
                                    <td>
                                        <input type="text" name="clientname" class="form-control input-sm" style="background-color: white" value="<?php echo $row['clientname']; ?>" >
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Contact Number
                                    </th>
                                    <td> 
                                        <input type="text" name="contact" class="form-control input-sm" style="background-color: white" value="<?php echo $row['contact']; ?>" >
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        E-Mail ID
                                    </th>
                                    <td>
                                        <input type="text" name="email" class="form-control input-sm" style="background-color: white" value="<?php echo $row['email']; ?>" >
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Duration
                                    </th>
                                    <td>
                                        <input type="text" name="duration" class="form-control input-sm" style="background-color: white" value="<?php echo $row['duration']; ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Payment
                                    </th>
                                    <td>
                                        <input type="text" name="payAmount" class="form-control input-sm" style="background-color: white" value="<?php echo $row['payAmount']; ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Payment Method
                                    </th>
                                    <td>
                                        <input type="text" name="payMethod" class="form-control input-sm" style="background-color: white" value="<?php echo $row['payMethod']; ?>" readonly>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Start Date
                                    </th>
                                    <td>
                                        <input type="text" name="sDate" class="form-control input-sm" style="background-color: white" value="<?php echo $row['sDate']; ?>" readonly>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        End Date
                                    </th>
                                    <td>
                                        <input type="text" name="eDate" value="<?php echo $row['eDate']; ?>" class="form-control input-sm" style="background-color: white"/>
                                        <div id="placeholder2 pull-right"></div>            
                                        <div style='position:fixed;bottom:0;left:0;background:lightgray;width:100%;'>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Status
                                    </th>
                                    <td>
                                        <select name="status" id="" value="<?php echo $row['status']; ?>" class="form-control input-sm" style="background-color: white">
                                            <option value="In progress">In Progress</option>
                                            <option value="On hold">On Hold</option>
                                            <option value="Completed">Completed</option>
                                        </select>
                                    </td>
                                </tr>
                                <?php 
                                }}?>
                        </table>
                    </div>
                </div>
                </form>
                <?php
                   if( isset($_POST['updatedata']) ){
                        $pName = $_POST['pName'];
                        echo $pName;
                   }
                ?>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="jquery-ui.min.js"></script>
    <script>
        $(function() {
        $('#search').hide();
        $("#enddate").datepicker();
        $("#enddate").change(function() {
            var date = $(this).datepicker("getDate");
            $("#placeholder2").text(date);
            });
        });
    </script>
</body>
</html>