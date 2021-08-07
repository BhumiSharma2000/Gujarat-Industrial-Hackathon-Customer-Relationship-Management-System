<?php
include("connection.php");
session_start();
	if(isset($_POST['submit']))
	{
		
		$serialno=$_POST['serialno'];
		$ctype=$_POST['ctype'];
		$comdetails=$_POST['comdetail'];
		$trackno=rand(000000,111111);
		//$user=$_POST['user'];
		$query="SELECT * FROM tbl_purchase WHERE serial_no='$serialno'";
		$exe=mysqli_query($con,$query);
		$count=mysqli_num_rows($exe);
		$mo=mysqli_fetch_array($exe);
		$re=$mo['login_id'];
		echo $re;
	
		$log = $_SESSION['log'];
		$sql1 = "SELECT login_id FROM tbl_login WHERE email_id='$log'";
		$result1 = mysqli_query($con,$sql1);
		$value1 = mysqli_fetch_array($result1);
		$id = $value1['login_id'];
	
		if($count==1)
		{
			$sql="INSERT INTO complaint(c_id,login_id,c_type,track_id,complaint_details,timestamp,status,serial_no) VALUES('','$re','$ctype','$trackno','$comdetails',CURRENT_TIMESTAMP(),'0',$serialno)";
			$res=mysqli_query($con,$sql);
			header("location:addcomplaint.php?flag=$re");
			
		}
		else
		{
			//echo $count;
			header("location:addcomplaint.php?flag=1");
		
		}
	
	
	}
?>