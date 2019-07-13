<?php session_start(); 
include('BSphp/incdb.php');

if(!$_SESSION['username']){
    header('LOCATION: login.php');
}

if(isset($_POST['submit'])){
    $eName = $_POST['eName'];
    $Pno = $_POST['Pno'];
    $email = $_POST['email'];
    $date = $_POST['date'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    echo $eName.$Pno.$email.$date.$subject.$message; 
    $sq = "INSERT INTO enquiry (eName, Pno, email, date, subject, message) VALUES ('$eName','$Pno','$email','$date','$subject','$message')";
    $result2 = mysqli_query($con,$sq);

    if($result2){
        header("LOCATION: enquiry.php");
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
    <title>Add Enquiry</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="jquery-ui.min.css">
    <link rel="stylesheet" href="jquery-ui.structure.min.css">
    <link rel="stylesheet" href="jquery-ui.theme.min.css">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="text-editor/src/richtext.min.css">

    
    <style>
    nav > div > div > h2{
        margin-top: 10px;
    }

    .richText-toolbar > ul > li > a{
        color:black;
    }

    table  th{
        width:150px;
    }
    /*
        *{
            color:white !important;
        }
    nav{
        background-color: rgba(0, 0, 0, 0.8);
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
        background-color: rgb(38, 47, 65);
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

    /*
    .search{
        width:97.5%;
        margin-left: 13px;
    }

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

    
    table  tr  th{
        font-size: 16px;
        background-color:rgb(48, 53, 56);
    }
    table  tr  td{
        font-size: 16px;
        background-color:rgb(48, 53, 56);
    }
    table  tr  td input{
        font-size: 16px;
        background-color:rgb(193, 198, 201);
        color:black !important;
    }
    table  tr  td textarea{
        font-size: 16px;
        background-color:rgb(193, 198, 201);
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
                    <p class="Edit pull-right"><input type="submit" name="submit" class="btn btn-default" style="height: 30px" value="Add"></p>
                <p class="back"><a href="enquiry.php"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back to Enquiries</a></p>
                <div class="panel panel-inverse" style="box-shadow: 2px 2px 5px rgba(0,0,0,0.3)">
                    <div class="det">
                        <table class="table table-responsive table-striped">
                                <tr>
                                    <th>
                                        Enquiry Name
                                    </th>
                                    <td>
                                        <input type="text" name="eName" class="form-control input-sm" style="background-color: white" id="cname">
                                    </td>
                                </tr>                                
                                <tr>
                                    <th>
                                        Contact Number
                                    </th>
                                    <td>
                                        <input type="text" name="Pno" id="cname" class="form-control input-sm" style="background-color: white">
                                    </td>
                                </tr>                                
                                <tr>
                                    <th>
                                        E-Mail ID
                                    </th>
                                    <td>
                                        <input type="text" name="email" id="cname" placeholder="" class="form-control input-sm" style="background-color: white">
                                    </td>
                                </tr>                                
                                <tr>
                                    <th>
                                        Date
                                    </th>
                                    <td>                                        
                                        <input type="text" id="startdate" name="date" class="form-control input-sm" style="background-color: white" />
                                        <div id="placeholder1 pull-right"></div>            
                                        <div style='position:fixed;bottom:0;left:0;background:lightgray;width:100%;'>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Subject
                                    </th>
                                    <td>
                                        <input type="text" name="subject" class="form-control input-sm" style="background-color: white">
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Message
                                    </th>
                                    <td>
                                        <textarea class="content" style="background-color:black" name="message" row="0" col="2"></textarea>
                                    </td>
                                </tr>
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
    <script src="text-editor/src/jquery.richtext.min.js"></script>
    <script>
        $(function() {
        $('#search').hide();
        $("#startdate").datepicker();
        $("#startdate").change(function() {
            var date = $(this).datepicker("getDate");
            $("#placeholder1").text(date);
            });
            $('.content').richText({
            });

        });
    </script>
</body>
</html>