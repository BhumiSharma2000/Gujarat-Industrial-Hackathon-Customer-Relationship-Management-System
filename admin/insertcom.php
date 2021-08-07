<?php
include("connection.php");
session_start();
$log = $_SESSION['log'];
  if(isset($_POST['submit']))
  {
   // $bill=$_POST['billno'];
    $ctype=$_POST['ctype'];
    $q=$_POST['x'];
    $comdetails=$_POST['comdetail'];
    $trackno=rand(000000,111111);
      $sql="INSERT INTO complaint(c_id,login_id,c_type,track_id,complaint_details,timestamp,status,serial_no) VALUES('','$q','$ctype','$trackno','$comdetails',CURRENT_TIMESTAMP(),'0','$log')";
      var_dump($sql);
      $res=mysqli_query($con,$sql);
      header("location:pr.php?flag=$trackno");

      //echo $count;
      //header("location:makecom.php?flag=1");
  
  }
?>