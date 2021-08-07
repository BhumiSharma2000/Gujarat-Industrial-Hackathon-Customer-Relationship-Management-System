<?php
include("connection.php");
session_start();
$c = $_SESSION['cid'];
$msg=$_POST['msg'];
$log = $_SESSION['log'];
//echo $log;
 $ol="SELECT * FROM `tbl_login` WHERE email_id='$log'";
 //var_dump($ol);
 $qw=mysqli_query($con,$ol);
 $kj=mysqli_fetch_array($qw);
 $log1=$kj['login_id'];
 //echo $log1;
 $z="SELECT * FROM `tbl_detail` WHERE  login_id='$log1'";
 //var_dump($z);
 $po=mysqli_query($con,$z);
 $df=mysqli_fetch_array($po);
 $x=$df['name'];
 //echo $x;




$query1="INSERT INTO `complaint_chat`(`c_id`, `login_id`, `message`,name) VALUES ('$c','$log1','$msg','$x')";
//echo $query1;
$ans1=mysqli_query($con,$query1);

	header("Refresh:0; url=chat.php?id=$c");

?>