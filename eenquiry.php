<?php session_start(); 
include('BSphp/incdb.php');

if(!$_SESSION['username']){
    header('LOCATION: login.php');
}

$sno = $_GET['sno'];
$sql2 = "SELECT * FROM enquiry WHERE sno = '$sno'";
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
    <title>Edit Enquiry</title>
    
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
    nav > div > div > h2{
        margin-top: 10px;
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
    .row{
        margin-right: 0;
        margin-bottom: 10px;
    }

    /*
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
                <form action="updateenquiry.php?sno=<?php echo $sno; ?>" method="post">
                    <p class="Edit pull-right"><input type="submit" class="btn btn-default" style="height: 30px" value="Update"></p>
                <p class="back"><a href="enquiry.php"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back to Enquiries</a></p>
                <div class="panel panel-default" style="box-shadow: 2px 2px 5px rgba(0,0,0,0.3)">
                    <div class="det">
                        <table class="table table-responsive table-striped">
                                <tr>
                                    <th>
                                        Enquiry Name
                                    </th>
                                    <td>
                                        <input type="text" name="eName" class="form-control input-sm" style="background-color: white" id="cname" value="<?php echo $row['eName']; ?>" disabled>
                                    </td>
                                </tr>                                
                                <tr>
                                    <th>
                                        Contact Number
                                    </th>
                                    <td>
                                        <input type="text" name="Pno" id="cname" value="<?php echo $row['Pno']; ?>" class="form-control input-sm" style="background-color: white" disabled>
                                    </td>
                                </tr>                                
                                <tr>
                                    <th>
                                        E-Mail ID
                                    </th>
                                    <td>
                                        <input type="text" name="email" id="cname" value="<?php echo $row['email']; ?>" class="form-control input-sm" style="background-color: white" disabled>
                                    </td>
                                </tr>                                
                                <tr>
                                    <th>
                                        Date
                                    </th>
                                    <td>                                        
                                        <input type="text" name="date" value="<?php echo $row['date']; ?>" class="form-control input-sm" style="background-color: white" disabled/>
                                        <div id="placeholder1 pull-right"></div>            
                                        <div style='position:fixed;bottom:0;left:0;background:lightgray;width:100%;'>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Subject
                                    </th>
                                    <td>
                                        <input type="text" name="subject" value="<?php echo $row['subject']; ?>" class="form-control input-sm" style="background-color: white">
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Message
                                    </th>
                                    <td>
                                        <textarea class="content" name="message" row="0" col="2" style="width:100%"><?php echo $row['message']; ?></textarea>
                                    </td>
                                </tr>
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

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="jquery-ui.min.js"></script>
    <script src="text-editor/src/jquery.richtext.min.js"></script>
    <script>
        $(function() {
            $('#search').hide();

            $('.content').richText({
            });

        });
    </script>
</body>
</html>