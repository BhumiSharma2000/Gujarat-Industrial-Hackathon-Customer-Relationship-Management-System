<?php

	include "connection.php";
	
	session_start();
	
	if(!isset($_SESSION['email_id']))
	{
		header("location:index.php");
	}
	
	else
	{
	
		$req = $_SESSION['email_id'];
		
		$qry = "SELECT login_id FROM tbl_login WHERE email_id='$req' OR phone_no='$req'";
		$result = mysqli_query($con,$qry);
		$value = mysqli_fetch_array($result);
		$id = $value['login_id'];

		$sql = "SELECT otp FROM otp_tbl WHERE otp_id = (SELECT MAX(otp_id) FROM otp_tbl WHERE login_id='$id' )";
		$result1 = mysqli_query($con,$sql);
		$value1 = mysqli_fetch_array($result1);
		
		$otp = $value1['otp'];

?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin| OTP page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="">Change Password</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
	<h3> Your otp is : <?php echo $otp; ?> </h3>
    <p class="login-box-msg">Enter six digit OTP to generate new password</p>

    <form  method="post">
      <div class="form-group has-feedback">
        <input type="text" name="otp_num" class="form-control" placeholder="Enter OTP" required /> 
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="pass1" id="pass1" class="form-control" placeholder="Enter New Password" required />
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
	  <div class="form-group has-feedback">
        <input type="password" name="pass2" id="pass2" class="form-control" placeholder="Re Enter New Password" oninput="check(this)" required />
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
		<script language='javascript' type='text/javascript'>
						function check(input) {
							if (input.value != document.getElementById('pass1').value) {
								input.setCustomValidity('Password Must be Matching.');
							} else {
								// input is valid -- reset the error message
								input.setCustomValidity('');
							}
						}
					</script>
      </div>
      <div class="row">
       <div class="col-xs-4">
          <button type="submit" name="submit" class="btn btn-primary btn-block btn-flat">Change</button>
        </div>
        <!-- /.col -->
        
        <!-- /.col -->
      </div>
	  
<?php
	  
	  if(isset($_POST['submit']))
	  {
		  $otp_num = $_POST['otp_num'];
		  $passw1 = $_POST['pass1'];
		  $passw2 = $_POST['pass2'];
	
		if($otp==$otp_num)
		{
			if($passw1==$passw2)
			{
			  $update = "UPDATE tbl_login SET password='$passw1' WHERE login_id='$id'";
			  $up = mysqli_query($con,$update);
			  
			  if($up)
			  {
				echo "<font style='color:green'>password changed successfully....</font>";
				
				unset($_SESSION['email_id']);
	
				session_destroy();
			  
				header("refresh:2; url=index.php");
			  }
			
			}		
		}

		else
		{
			echo "<font style='color:red'>otp doesn't match...</font>";
		}
		
	  }
?>
	  
    </form>

    
    <!-- /.social-auth-links -->
<br/>
    
    

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>


<?php

	}

?>
