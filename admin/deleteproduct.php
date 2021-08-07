<?php
include("connection.php");
var_dump($_GET);
$id=$_GET['del'];
$qry="SELECT * FROM `tbl_product` WHERE product_id=$id";
echo $qry;
$rs=mysqli_query($con,$qry);
$row=mysqli_fetch_array($rs);
$active=$row['status'];
if($active==1)
{
	$qry1="UPDATE `tbl_product` SET status=0 WHERE product_id=$id";
	$rs1=mysqli_query($con,$qry1);
	echo $qry1;
	header("location:manageproduct.php");
}
else
{
	echo "error";
	header("location:manageproduct.php");
}
?>