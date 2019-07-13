<?php 
session_start();

include('BSphp/incdb.php'); 

if(!$_SESSION['username']){
    header('LOCATION: login.php');
}

$regId = $_GET['regId'];
$sql1 = "SELECT * FROM students where regId='$regId'";
$result1 = mysqli_query($con,$sql1);
?>

<?php
    if(mysqli_num_rows($result1) > 0){
        while($row = mysqli_fetch_assoc($result1)){
            if(isset($_POST['pay'])){
                $paid=$row['paid'];
                $total = $row['fee'];
                echo "<script> alert('total='.$total); </script>";
                $paid += $_POST['paid'];
                echo "<script> alert('paid='.$paid); </script>";
                $pending = $row['pFee'];
                echo "<script> alert('pending='.$pending); </script>";
                $pending = $total - $paid;
                echo "<script> alert('pending='.$pending); </script>";
                $payMethod = $_POST['payMethod'];

                $sql2 = "UPDATE students SET payMethod='$payMethod',pFee='$pending',paid='$paid' WHERE regId='$regId'";
                $result2 = mysqli_query($con,$sql2);
                if($result2){
                    echo "<script> alert('working'); </script>";
                    header('LOCATION: viewfee.php');
                    }
                else{
                    echo "<script> alert('query not working');</script>";
                    }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Payment Fees</title>
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
    }

    */
    .row{
        margin-bottom: 10px;
        margin-right: 0;
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

    .panel-heading{
        font-size: 25px;
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
            <?php 
                        ?>
                <form action="" method="post">
                <p class="Edit pull-right"><input type="submit" class="btn btn-default" style="height: 30px" name="pay" value="Pay"></p>
                <p class="back"><a href="students.php"><span class="glyphicon glyphicon-arrow-left"></span>Back to students</a></p>
                <div class="panel panel-inverse" style="box-shadow: 2px 2px 5px rgba(0,0,0,0.3)">
                    <div class="panel-heading">Fee Payment</div>
                    <div class="det">
                        <table class="table table-responsive table-striped">
                                <tr>
                                    <th>
                                        Student Name
                                    </th>
                                    <td>
                                        <input type="text" class="form-control input-sm" style="background-color: white" name="Name" id="ename" value="<?php echo $row['sName']; ?>" readonly>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Registration ID
                                    </th>
                                    <td>
                                        <input type="text" class="form-control input-sm" style="background-color: white" name="Registration" name="eregid" value="<?php echo $row['regId']; ?>" readonly>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Date of Joining
                                    </th>
                                    <td>
                                        <input type="text" class="form-control input-sm" style="background-color: white" id="datepicker" value="<?php echo $row['joinDate'];?>" readonly/>
                                        <div id="placeholder"></div>            
                                        <div style='position:fixed;bottom:0;left:0;background:lightgray;width:100%;'>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Course
                                    </th>
                                    <td>
                                            <select id="basic" class="selectpicker show-tick form-control" data-live-search="true">
                                                    <option data-subtext="option subtext">Angular JS</option>
                                                    <option value="<?php echo $row['course']; ?>"><?php echo $row['course']; ?></option>
                                                    <option value="digital marketing">Digital Marketing</option>
                                                    <option class="get-class" value="HTML & CSS">HTML & CSS</option>
                                                      <option value="JS & Jquery">JS & Jquery</option>
                                                      <option value="Web Design and Development">Web Design and Development</option>
                                                  </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Payment Method
                                    </th>
                                    <td>
                                        <select class="form-control input-sm" style="background-color: white" name="payMethod" id="epay1" style="width:180px">
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
                                                <select class="form-control input-sm" style="background-color: white" id="epay1" style="width:180px">
                                                    <option value="">Installment Number</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                </select>
                                            </td>
                                        </tr>
                                <tr>
                                    <th>
                                        Total Fee
                                    </th>
                                    <td>
                                        <input type="text" name="total" class="form-control input-sm" style="background-color: white" value="<?php echo $row['fee']; ?>" readonly>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Paying Amount
                                    </th>
                                    <td>
                                        <input type="text" class="form-control input-sm" style="background-color: white" name="paid" value="<?php $row['paid']; ?> ">
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                            Pending Amount
                                    </th>
                                    <td>
                                        <input type="text" class="form-control input-sm" style="background-color: white" name="pending" value="<?php echo $row['pFee']; ?> ">
                                    </td>
                                </tr>
                                <!-- <tr>
                                    <th>
                                        Pending
                                    </th>
                                    <td>
                                        <input type="text" class="form-control input-sm" style="background-color: white" name="epending" placeholder="Rs. 7000/-">
                                    </td>
                                </tr> -->
                        </table>
                    </div>
                </div>
                </form>
                    <?php }} ?>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="jquery-ui.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.10/dist/js/bootstrap-select.min.js"></script>
    <script>
    $(function() {
    $('#search').hide();
    $("#datepicker").datepicker();
    $("#datepicker").change(function() {
        var date = $(this).datepicker("getDate");
        $("#placeholder").text(date);
        });

    
    var d = new Date();
    var year = d.getFullYear() - 5;
    d.setFullYear(year);
    $('#BirthDate').datepicker({ changeYear: true, changeMonth: true, yearRange: '1920:' + year + '', defaultDate: d});
    });

    $('.selectpicker').selectpicker();
    </script>
</body>
</html>