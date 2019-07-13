<?php session_start(); 
if(!$_SESSION['username']){
    header('LOCATION: login.php');
}
include('BSphp/incdb.php');
$sql1 = "SELECT * FROM courses";
$result1 = mysqli_query($con,$sql1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Students</title>
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



    .row{
        margin-right: 0%;
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

    .list{
        margin-top: 100px;
    }

    .search{
        display: none;
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

    <div class="container main">
        <div class="row">
        </div>

        <div class="row list">
            <div class="col-lg-12">
                <table class="table table-bordered table-responisve table-striped" style="box-shadow:1px 1px 20px rgba(0,0,0,0.3)">
                    <tr class="h">
                        <th>
                            S.No
                        </th>
                        <th>
                            Student Name
                        </th>
                        <th>
                            Registration ID
                        </th>
                        <th>
                            Course
                        </th>
                        <th>
                            Details
                        </th>
                        <th>
                            Edit Details
                        </th>
                    </tr>
                    <?php 
                        if(mysqli_num_rows($result1) > 0){
                        while($row = mysqli_fetch_assoc($result1)){
                    ?>
                    <tr>
                        <td><?php echo $row['sno'];?></td>
                        <td><?php echo $row['cName']; ?></td>
                        <td>Rs.<?php echo $row['fee'];?>/-</td>
                        <td><?php echo $row['duration'];?></td>
                        <td><span class="badge"><a href="cdetails.php?sno=<?php echo $row['sno']; ?>">More Details</a></span></td>
                        <td><span class="badge"><a href="cedit.php?sno=<?php echo $row['sno'];?>">Edit Details</a></span></td>
                        <?php 
                        }
                    }
                    else{
                        echo"fail";
                    }
                    ?>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="jquery-ui.min.js"></script>
    <script>
        $( function() {
            var availableTags = [
            "ActionScript",
            "AppleScript",
            "Asp",
            "BASIC",
            "C",
            "C++",
            "Clojure",
            "COBOL",
            "ColdFusion",
            "Erlang",
            "Fortran",
            "Groovy",
            "Haskell",
            "Java",
            "JavaScript",
            "Lisp",
            "Perl",
            "PHP",
            "Python",
            "Ruby",
            "Scala",
            "Scheme"
            ];
            $( "#tags" ).autocomplete({
            source: availableTags
            });
            $("#showsearch").click(function(){
                $(".search").slideToggle();
            });
        });
    </script>
</body>
</html>