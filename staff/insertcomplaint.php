<?php
include("connection.php");
session_start();
	if(isset($_POST['submit']))
	{
		
		$bill=$_POST['billno'];
		$ctype=$_POST['ctype'];
		$comdetails=$_POST['comdetail'];
		$trackno=rand(000000,111111);
		$user=$_POST['user'];
		$query="SELECT bill_no FROM tbl_purchase WHERE bill_no='$bill'";
		$exe=mysqli_query($con,$query);
		$count=mysqli_num_rows($exe);
	
		$log = $_SESSION['log'];
		$sql1 = "SELECT login_id FROM tbl_login WHERE email_id='$log'";
		$result1 = mysqli_query($con,$sql1);
		$value1 = mysqli_fetch_array($result1);
		$id = $value1['login_id'];
	
		if($count==1)
		{
			$sql="INSERT INTO complaint(c_id,login_id,c_type,track_id,complaint_details,timestamp,status) VALUES('','$user','$ctype','$trackno','$comdetails',CURRENT_TIMESTAMP(),'0')";
			$res=mysqli_query($con,$sql);
			header("location:addcomplaint.php?flag=$user");
			
		}
		else
		{
			//echo $count;
			header("location:addcomplaint.php?flag=1");
		
		}
	
	
	}
?>