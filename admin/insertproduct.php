<?php

	include "connection.php";
		
	session_start();
	
	if(!isset($_SESSION['log']))
	{
		header("location:index.php");
	}
	
	else
	{
		
		$name = $_POST['bname'];
		$price = $_POST['pprice'];
		$p1y=$_POST['p1y'];
		$p2y=$_POST['p2y'];
		$p3y=$_POST['p3y'];
		$l=$_POST['warranty'];
		$query = "INSERT INTO `tbl_product`(`product_name`, `product_price`, `status`,product_1y,product_2y,product_3y,warranty) VALUES ('$name','$price',1,'$p1y','$p2y','$p3y',$l)";
		
		$result = mysqli_query($con,$query);
				
			if(!$result)
			{
				echo "Not inserted...";
				header("location:addproduct.php?flag=0");
				
			}
			
			else
			{
				echo "inserted successfully....";
				
				header("location:addproduct.php?flag=1");
				
			}
	}
	

?>