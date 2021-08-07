<?php
include("connection.php");
var_dump($_GET);
$id=$_GET['del'];
$qry="SELECT * FROM `questioncrm` WHERE q_id=$id";
echo $qry;
$rs=mysqli_query($con,$qry);
$row=mysqli_fetch_array($rs);
$active=$row['status'];
if($active==1)
{
	$qry1="UPDATE `questioncrm` SET status=0 WHERE q_id=$id";
	$rs1=mysqli_query($con,$qry1);
	echo $qry1;
	header("location:manageque.php");
}
else
{
	echo "error";
	header("location:manageque.php");
}
?>