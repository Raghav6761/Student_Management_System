
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
</head>
<body>
  <?php 
  include('BSphp/incdb.php');
  
  if(!$_SESSION['username']){
      header('LOCATION: login.php');
  }else{
      echo "welcome".$_SESSION['username'];
  }
  
  $sql = "SELECT * FROM admin";
  $result = mysqli_query($con,$sql);

	echo "<header>
        <nav class='col-lg-12 col-xs-12 navbar navbar-primary navbar-fixed-top'>
            <div class='container'>
                    <div class='navbar-header'>
                            <div class='search col-lg-12 input-group input-group-lg' id='search'>
                                    <input type='text' class='pl form-control' placeholder='Enter Name' aria-describedby='sizing-addon1' id='tags' style='width: 90%'>
                                    <span class='bon input-group-addon btn-primary' style='color:white' id='sizing-addon1'>SEARCH</span>
                                </div>
                        <button type='button' class='navbar-toggle collapsed' data-toggle='collapse' data-target='#example-navbar-collapse-1' aria-expanded='false'>
                          <span class='sr-only'>Toggle navigation</span>
                          <span class='glyphicon glyphicon-th-large'></span>
                          <span class='icon-bar'></span>
                          <span class='icon-bar'></span>
                          <span class='icon-bar'></span>
                        </button>
                      </div>
                    <div class='collapse navbar-collapse' id='bs-example-navbar-collapse-1'>
                        
                            <h2 class='pull-left'>Welcome,  ";
                            echo $_SESSION['username'];         
                            // if(mysqli_num_rows($result) > 0){
                            //     while($row = mysqli_fetch_assoc($result)){
                            // echo $row['name']; 
                            //     }
                            // } 
                            echo "</h2>
                        
                        <ul class='nav navbar-nav navbar-right'>
                                <li class='dropdown'>
                                        <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>Students</a>
                                        <ul class='dropdown-menu'>
                                          <li><a href='students.php'>View Students</a></li>
                                          <li><a href='addstudent.php'>Add Student</a></li>
                                          <li><a href='viewfee.php'>View fee</a></li>
                                          <li role='separator' class='divider'></li>
                                          <li><a href='editstudent.php'>Edit Student</a></li>
                                        </ul>
                                      </li>
                          <li class='dropdown'>
                                <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>Courses</a>
                                <ul class='dropdown-menu'>
                                  <li><a href='courses.php'>View Courses</a></li>
                                  <li><a href='addcourse.php'>Add Courses</a></li>
                                  <li role='separator' class='divider'></li>
                                  <li><a href='ceditall.php'>Edit Courses</a></li>
                                </ul>
                              </li>
                          <li class='dropdown'>
                            <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>Enquiry</a>
                            <ul class='dropdown-menu'>
                              <li><a href='enquiry.php'>View Enquiry</a></li>
                              <li><a href='addenquiry.php'>Add Enquiry</a></li>
                              
                            </ul>
                          </li>
                        
                          <li class='dropdown'>
                                <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>Projects <span class='caret'></span></a>
                                <ul class='dropdown-menu'>
                                  <li><a href='projects.php'>View Projects</a></li>
                                  <li><a href='addproject.php'>Add Projects</a></li>
                                  <li role='separator' class='divider'></li>
                                  <li><a href='editprojects.php'>Edit Projects</a></li>
                                </ul>
                              </li>
                              <li><a href='#' class='glyphicon glyphicon-search pull-right btn btn-lg' id='showsearch'></a></li>
                          <li class='dropdown'>
                              <a href='login.php' class='badge text-center'>SIGN OUT</a>
                          </li>
                        </ul>
                    </div>
            </div>
        </nav>
    </header>"

	?>
</body>
</html>