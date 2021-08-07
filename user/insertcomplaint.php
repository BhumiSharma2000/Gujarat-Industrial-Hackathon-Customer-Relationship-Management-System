<?php
include("connection.php");
session_start();
$log = $_SESSION['log'];
echo $log;
	if(isset($_POST['submit']))
	{
		$bill=$_POST['billno'];
		$ctype=$_POST['ctype'];
		$comdetails=$_POST['comdetail'];
		$trackno=rand(000000,111111);
		$user=$_POST['user'];
		$serial=$_POST['ans'];
		echo $serial;
		$query="SELECT bill_no FROM tbl_purchase WHERE bill_no='$bill'";
		$exe=mysqli_query($con,$query);
		$count=mysqli_num_rows($exe);
	

		$sql1 = "SELECT * FROM tbl_login WHERE email_id='$log'";
		$result1 = mysqli_query($con,$sql1);
		$value1 = mysqli_fetch_array($result1);
		$id = $value1['login_id'];
				$no=$value1['phone_no'];

	
		if($count!=1)
		{
			$sql="INSERT INTO complaint(c_id,login_id,c_type,track_id,complaint_details,timestamp,status,serial_no) VALUES('','$id','$ctype','$trackno','$comdetails',CURRENT_TIMESTAMP(),'0','$serial')";
			var_dump($sql);
			$res=mysqli_query($con,$sql);

	function otpprog($trackno,$no)
	{
	$authKey = "271017APxFd625Srl5ca729ee";
	$senderId = "BHUMII";
	//$message = urlencode($msg);
	$postData = array(
    'authkey' => $authKey,
    'mobiles' => $no,
    'message' => "Dear Customer,\nYour complain has been registered successfully. Kindly Note track_id : ".$trackno,
    'sender' => $senderId,
);
		$url="http://api.msg91.com/api/sendhttp.php";
		$ch = curl_init($url);
curl_setopt_array($ch, array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => $postData
    //,CURLOPT_FOLLOWLOCATION => true
));
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

$response = curl_exec($ch);

//Print error if any
if(curl_errno($ch))
{
    echo 'error:' . curl_error($ch);
}

curl_close($ch);
}
otpprog($trackno,$no);


			header("location:addcomplaint.php?flag=$trackno");
		}
		else
		{
			//echo $count;
			header("location:addcomplaint.php?flag=1");
		
		}
	
	
	}
?>