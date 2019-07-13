<?php session_start(); 
include('BSphp/incdb.php');

if(!$_SESSION['username']){
    header('LOCATION: login.php');
}

$sql1 = "SELECT * FROM admin";
$result1 = mysqli_query($con,$sql1);
?>

<?php
            if(isset($_POST['add'])){
                $pName = $_POST['pName'];
                $comName = $_POST['comName'];
                $duration = $_POST['duration'];
                $sDate = $_POST['sDate'];
                $eDate = $_POST['eDate'];
                $payAmount = $_POST['payAmount'];
                $payMethod = $_POST['payMethod'];

                echo $pName.$comName.$duration.$sDate.$eDate.$payAmount.$payMethod; 
                $sq = "INSERT INTO projects (pName,comName, duration, sDate, eDate, payAmount, payMethod) VALUES ('$pName','$comName','$duration','$sDate','$eDate','$payAmount','$payMethod')";
                $result2 = mysqli_query($con,$sq);

                if($result2){
                    header("LOCATION: projects.php");
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
    <title>Add Project</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="jquery-ui.min.css">
    <link rel="stylesheet" href="jquery-ui.structure.min.css">
    <link rel="stylesheet" href="jquery-ui.theme.min.css">
    
    <style>
    .ui-datepicker table{
        background-color: white;
    }

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
                <p class="Edit pull-right"><a href=""><input type="submit" name="add" value="add" class="btn btn-default" style="height:30px"></a></p>
                <p class="back"><a href="students.html"><span class="glyphicon glyphicon-arrow-left"></span>Back to Projects</a></p>
                <div class="panel panel-default" style="box-shadow: 2px 2px 5px rgba(0,0,0,0.3)">
                    <div class="det">
                        <table class="table table-responsive table-striped">
                                <tr>
                                    <th>
                                        Project Name
                                    </th>
                                    <td>
                                        <input type="text" name="pName" id="cname" class="form-control input-sm" style="background-color: white">
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Company Name
                                    </th>
                                    <td>
                                        <input type="text" name="comName" class="form-control input-sm" style="background-color: white">
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Duration
                                    </th>
                                    <td>
                                        <input type="text" name="duration" class="form-control input-sm" style="background-color: white"/>

                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Start Date
                                    </th>
                                    <td>                                        
                                        <input type="text" id="startdate" name="sDate"class="form-control input-sm" style="background-color: white" />
                                        <div id="placeholder1 pull-right"></div>            
                                        <div style='position:fixed;bottom:0;left:0;background:lightgray;width:100%;'>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        End Date
                                    </th>
                                    <td>
                                        <input type="text" id="enddate" name="eDate" class="form-control input-sm" style="background-color: white"/>
                                        <div id="placeholder2 pull-right"></div>            
                                        <div style='position:fixed;bottom:0;left:0;background:lightgray;width:100%;'>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Payment Amount
                                    </th>
                                    <td>
                                        <input type="text" name="payAmount" class="form-control input-sm" style="background-color: white">
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Payment Method
                                    </th>
                                    <td>
                                        <select name="payMethod" class="form-control input-sm" style="background-color: white" id="">
                                            <option value="Online">Online</option>
                                            <option value="Cheque">Cheque</option>
                                            <option value="Bank Transfer">Bank Transfer</option>
                                            <option value="Cash">Cash</option>
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
    <script>
        $(function() {
        $('#search').hide();
        $("#startdate").datepicker();
        $("#startdate").change(function() {
            var date = $(this).datepicker("getDate");
            $("#placeholder1").text(date);
            });
        $("#enddate").datepicker();
        $("#enddate").change(function() {
            var date = $(this).datepicker("getDate");
            $("#placeholder2").text(date);
            });
        });
    </script>
</body>
</html>