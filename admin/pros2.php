<?php
	include("connection.php");
	$pid=$_POST['pid'];
	$pprice=$_POST['p_price'];
	$p1y=$_POST['p1y'];
	$p2y=$_POST['p2y'];
	$p3y=$_POST['p3y'];
	$btn=$_POST['btn1'];
	$prcntg1=($pprice*($p1y/100));
	$prcntg2=($pprice*($p2y/100));
	$prcntg3=($pprice*($p3y/100));
	echo $prcntg1."<br/>";
	echo $prcntg2."<br/>";
	echo $prcntg3."<br/>";

	
	$q="INSERT INTO setlment(sid,p_id,p_price,product_1y,product_2y,product_3y
	,timestamp1)VALUES(DEFAULT,'1','$pprice','$prcntg1','$prcntg2','$prcntg3',CURRENT_TIMESTAMP())";
			$c=mysqli_query($con,$q);
			//$d=mysqli_num_rows($c);
			if($c==1)
			{
				echo"insert succesfully!!";
			}
			else
			{
					echo"insert failed";
			}
	?>