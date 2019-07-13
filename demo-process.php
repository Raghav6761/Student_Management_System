<?php 
include 'BSphp/incdb.php';
$con = mysqli_connect('localhost','root','','project');
$sno = $_GET['sno'];
$pName = $_POST['pName'];
$comName = $_POST['comName'];
$clientname = $_POST['clientname'];
$contact = $_POST['contact'];
$email = $_POST['email'];
$duration = $_POST['duration'];
$sDate = $_POST['sDate'];
$eDate = $_POST['eDate'];
$payAmount = $_POST['payAmount'];
$payMethod = $_POST['payMethod'];
$status = $_POST['status'];
echo $sno.$pName.$comName.$clientname.$contact.$email.$sDate.$eDate.$payAmount.$payMethod.$duration.$status;
$sql4 = "UPDATE projects SET pName='$pName',comName='$comName',clientname='$clientname', contact='$contact', email=$email, duration='$duration',sDate='$sDate',eDate='$eDate', payAmount='$payAmount',payMethod='$payMethod', c_status='$status' WHERE sno='$sno'";
$sql5 = "UPDATE `projects` SET `pName`='$pName',`comName`='$comName',`clientname`='$clientname',`contact`='$contact',`email`='$email',`duration`='$duration',`sDate`='$sDate',`eDate`='$eDate',`payAmount`='$payAmount',`payMethod`='$payMethod',`c_status`='$status' WHERE sno='$sno'";
if($sql5){
    echo "<script> alert(' sql command is working '); </script>";
}
$result4 = mysqli_query($con,$sql5);
if($result4){
    echo "<script> alert('working');</script>";
    header('LOCATION: projects.php');
}else{
    echo "<script>alert('Failure');</script>";
}

?>