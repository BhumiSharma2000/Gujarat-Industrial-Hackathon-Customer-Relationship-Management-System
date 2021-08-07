<?php
include("connection.php");
var_dump($_GET);
$id=$_GET['del'];
$qry="SELECT * FROM `tbl_purchase` WHERE serial_no=$id";
echo $qry;
$rs=mysqli_query($con,$qry);
$row=mysqli_fetch_array($rs);
$active=$row['purchase_status'];
if($active==1)
{
	$qry1="UPDATE `tbl_purchase` SET purchase_status=0 WHERE serial_no=$id";
	$rs1=mysqli_query($con,$qry1);
	echo $qry1;
	header("location:managepurchase.php");
}
else
{
	echo "error";
	header("location:managepurchase.php");
}
?>