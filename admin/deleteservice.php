<?php
include("connection.php");
var_dump($_GET);
$id=$_GET['del'];
$qry="SELECT * FROM tbl_servicecenter WHERE sc_id=$id";
$rs=mysqli_query($con,$qry);
$row=mysqli_fetch_array($rs);
$active=$row['status'];
if($active==1)
{
	$qry1="UPDATE `tbl_servicecenter` SET status=0 WHERE sc_id=$id";
	$rs1=mysqli_query($con,$qry1);
	echo $qry1;
	header("location:manageservicecenter.php");
}
else
{
	echo "error";
	header("location:manageservicecenter.php");
}
?>