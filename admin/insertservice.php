<?php

	include "connection.php";
		
	session_start();
	
	if(!isset($_SESSION['log']))
	{
		header("location:index.php");
	}
	
	else
	{

		$address = $_POST['address'];
		$l=$_POST['lat'];
		$lg=$_POST['long'];
		$m=$_POST['mobile'];
		
			
		$query = "INSERT INTO tbl_servicecenter(address,latitude,longtitude,status,mobile) VALUES('$address','$l','$lg',1,$m)";
		echo $query;
		
		$result = mysqli_query($con,$query);
		
			if(!$result)
			{
				echo "Not inserted...";
			}
			
			else
			{
				//echo "inserted successfully....";
				
				header("location:addservicecenter.php?flag=1");
				
			}
	}
	

?>