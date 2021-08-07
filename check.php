<?php

		include "connection.php";
			
		session_start();
	
		$log = $_POST['email'];
		
		$passx = $_POST['pass'];
		$pass=md5($passx);
		
		
		$qry = "SELECT * FROM tbl_login WHERE (email_id='$log' AND password='$pass') OR (phone_no='$log' AND password='$pass')";

		$result = mysqli_query($con,$qry);
		
		$value = mysqli_fetch_array($result);
	
		$count = mysqli_num_rows($result);
		$id=$value['login_id'];
		
		if($count==1 && $value['password']==$pass)
		{
			if($value['active']==1 && $value['type']==1 )
			{
					$_SESSION['log'] = $value['email_id'];
					$_SESSION['utype'] = $value['type'];
					
					$status = $value['status'];
				
					if($status==0)
					{
						
		  require_once 'PHPMailer-master/src/PHPMailer.php';
  		  require_once 'PHPMailer-master/src/Exception.php';
  		  require_once 'PHPMailer-master/src/SMTP.php';
		  $otp = rand(100000,999999);
		  $qry="INSERT INTO otp_tbl(otp_id,login_id,otp) VALUES('','$id','$otp')";
		  $rs=mysqli_query($con,$qry);
		  echo $qry;
		  $to=$log;
		  $subject="CRMS OTP MAIL";
		  $msg="Hi, your one time password for first time verfication is <b>".$otp."</b>";

		  $mail = new PHPMailer\PHPMailer\PHPMailer(true);                      // Passing `true` enables exceptions

    //Server settings
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'bhumit0111@gmail.com';                 // SMTP username
    $mail->Password = 'CRMS@123';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('bhumit0111@gmail.com');

    $mail->addAddress($to);

     $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $msg;

    if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}
 else {
   echo "success";
   header("location:verification.php");
 }

	}
	else
	{
		header("location:admin/dashboard.php");
	}

}
			if($value['active']==1 && $value['type']==2 )
			{
					$_SESSION['log'] = $value['email_id'];
					$_SESSION['utype'] = $value['type'];
					
					$status = $value['status'];
				
					if($status==0)
					{
						
		  require_once 'PHPMailer-master/src/PHPMailer.php';
  		  require_once 'PHPMailer-master/src/Exception.php';
  		  require_once 'PHPMailer-master/src/SMTP.php';
		  $otp = rand(100000,999999);
		  $qry="INSERT INTO otp_tbl(otp_id,login_id,otp) VALUES('','$id','$otp')";
		  $rs=mysqli_query($con,$qry);
		  echo $qry;
		  $to=$log;
		  $subject="CRM OTP MAIL";
		  $msg="Hi, your one time password for first time verfication is ".$otp;

		  $mail = new PHPMailer\PHPMailer\PHPMailer(true);                      // Passing `true` enables exceptions

    //Server settings
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'bhumit0111@gmail.com';                 // SMTP username
    $mail->Password = 'CRMS@123';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('bhumit0111@gmail.com');

    $mail->addAddress($to);

     $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $msg;

    if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}
 else {
   echo "success";
   header("location:verification.php");
 }

	}
	else
	{
		header("location:user/dashboard.php");
	}
	

}
if($value['active']==1 && $value['type']==3 )
			{
					$_SESSION['log'] = $value['email_id'];
					$_SESSION['utype'] = $value['type'];
					
					$status = $value['status'];
				
					if($status==0)
					{
						
		  require_once 'PHPMailer-master/src/PHPMailer.php';
  		  require_once 'PHPMailer-master/src/Exception.php';
  		  require_once 'PHPMailer-master/src/SMTP.php';
		  $otp = rand(100000,999999);
		  $qry="INSERT INTO otp_tbl(otp_id,login_id,otp) VALUES('','$id','$otp')";
		  $rs=mysqli_query($con,$qry);
		  echo $qry;
		  $to=$log;
		  $subject="CRM OTP MAIL";
		  $msg="Hi, your one time password for first time verfication is ".$otp;

		  $mail = new PHPMailer\PHPMailer\PHPMailer(true);                      // Passing `true` enables exceptions

    //Server settings
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'bhumit0111@gmail.com';                 // SMTP username
    $mail->Password = 'CRMS@123';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('bhumit0111@gmail.com');

    $mail->addAddress($to);

     $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $msg;

    if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}
 else {
   echo "success";
   header("location:verification.php");
 }

	}
	else
	{
		header("location:staff/dashboard.php");
	}

}

}
else
{
	header("location:index.php?flag=1");
}
						
				
?>