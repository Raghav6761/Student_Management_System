<?php
session_start();
include('BSphp/incdb.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="jquery-ui.min.css">
    <link rel="stylesheet" href="jquery-ui.structure.min.css">
    <link rel="stylesheet" href="jquery-ui.theme.min.css">

    <style>
        *{
            font-family: sans-serif;
        }
        .login{
            padding:0;
            margin-top: 15%;
        }

        .panel-heading{
            padding-left: 40px;
            font-size: 30px;
        }

        a{
            text-decoration: none;
            color:white;
        }

        a:hover{
            text-decoration: none;
            color: white;
        }
    </style>
</head>
<body>
    
<div class="container-fluid">
    <!-- <div class="row">
        <header>

        </header>
    </div> -->

    <div class="row">
        <div class="container">
                <div class="login col-lg-7 col-lg-push-2 panel panel-primary">
                    <div class="panel-heading">
                        Login
                    </div>

                    <div class="panel-body">
                        <form class="form-horizontal" action="" method="post">
                                <div class="form-group">
                                  <label for="inputEmail3" class="col-sm-2 control-label">Username</label>
                                  <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputEmail3" name="username" placeholder="">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                                  <div class="col-sm-10">
                                    <input type="password" class="form-control" id="inputPassword3" name="password" placeholder="">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <div class="col-sm-offset-2 col-sm-10">
                                    <div class="checkbox">
                                      <label>
                                        <input type="checkbox"> Remember me
                                      </label>
                                    </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                  <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="signin btn btn-primary" name="submit"><a href="" name="submit">Sign in</a></button>
                                  </div>
                                </div>
                              </form>
      </div>

                            <?php
                            if(isset($_POST['submit'])){
                                
                                $sql = "SELECT * FROM admin";
                                $result = mysqli_query($con,$sql);
                                $username = $_POST['username'];
                                $password = md5($_POST['password']);

                                if(mysqli_num_rows($result) > 0){
                                    while($row = mysqli_fetch_assoc($result)){
                                        if ($username == $row['username'] && $password == $row['password']) {
                                        $_SESSION['username'] = $username;
                                        $_SESSION['name'] = $row['name'];
                                        header("LOCATION: dashboard.php ");        
                                        }
                                        else{
                                            echo "Please Check your details";
                                        }
                                    }
                                }
                            }
                            ?>
                </div>
        </section>
    </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>