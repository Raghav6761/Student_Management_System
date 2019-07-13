<?php
            $con = mysqli_connect('localhost','root','','project');
            $sno = $_GET['sno'];
            $subject = $_POST['subject'];
            $message = $_POST['message'];
            $sql3 = "UPDATE enquiry SET subject='$subject',message='$message' WHERE sno='$sno'";
            $result3 = mysqli_query($con,$sql3);

            if($result3){
                header('LOCATION: enquiry.php');
            }
            else{
                echo "<script>alert('Failure');</script>";
            }
        
?>