 <?php include("header.php"); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
        <section class="content-header">
      <h1>
        Complains
        <small>Admin Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.html"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="newcomplaint.php"><i class="fa fa-bell"></i>New Complaint</a></li>
        <li class="active">Assign staff</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <!-- Main row -->
      <div class="row">
	    <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Manage Users</h3>

              
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
			<form method="post">
              <table class="table table-hover">
                
                <?php
 include("connection.php");
 
 if(isset($_GET['id']))
	{
		$id=$_GET['id'];
	
	$query="SELECT * FROM complaint WHERE c_id='$id'";
	$result=mysqli_query($con,$query);
	while($value=mysqli_fetch_array($result))
	{
	?>
		
		<tr><td>Complain_id</td>
		<td><?php 
		$x=$value['c_id'];
		echo $value['c_id'];?></td></tr>
		<tr><td>Email_id<td><?php 
			$pid=$value['login_id'];
			$q=mysqli_query($con,"SELECT email_id FROM tbl_login WHERE login_id='$pid' ");
			$ans=mysqli_fetch_array($q);
			echo $ans['email_id'];?></td></tr>
			<tr><td>Complain_Type</td><td><?php echo $value['c_type'];?></td></tr>
			<tr><td>Track_id</td><td><?php echo $value['track_id'];?></td></tr>
			
			<tr><td>Details</td><td><?php echo $value['complaint_details'];?></td></tr>
			
			<tr>
			<td>Select Staff</td>
			<td>
			<select name="sname">
			<option value="0">--SELECT--</option>
                    <?php
						
						 include("connection.php"); 
 
						 $que="SELECT * FROM tbl_login WHERE type='3'";
						 $sql=mysqli_query($con,$que);
						 while($row=mysqli_fetch_array($sql))
						 {
						 
							echo "<option value=".$row[0].">".$row[1]."</option>";

						  }

					
					
					?>

			</select>
			</td></tr>
			<tr><td></td><td><input type="submit" name="submit" value="submit"/></td></tr>
			</form>
            <?php
			}
			
			if(isset($_POST['submit']))
			{
				$staff=$_POST['sname'];
				$query="UPDATE complaint SET staff_person='$staff' WHERE c_id='$id'";
				$exe=mysqli_query($con,$query);

				$zx="SELECT * FROM complaint WHERE c_id='$x'";
				$xd=mysqli_query($con,$zx);
				$sd=mysqli_fetch_array($xd);
				$g=$sd['login_id'];
				$p=$sd['staff_person'];

				$xu="SELECT * FROM `tbl_detail` WHERE login_id='$p'";
				$xl=mysqli_query($con,$xu);
				$xp=mysqli_fetch_array($xl);
				$n=$xp['name'];
				$cd=$xp['profile_pic'];

				$xq="SELECT * FROM `tbl_login` WHERE login_id='$p'";
				$xw=mysqli_query($con,$xq);
				$xe=mysqli_fetch_array($xw);
				$r=$xe['phone_no'];
				$cy=$xe['email_id'];


				$xd="SELECT * FROM `tbl_login` WHERE login_id='$g'";
				$xf=mysqli_query($con,$xd);
				$xg=mysqli_fetch_array($xf);
				$k=$xg['email_id'];


		  require_once 'PHPMailer-master/src/PHPMailer.php';
  		  require_once 'PHPMailer-master/src/Exception.php';
  		  require_once 'PHPMailer-master/src/SMTP.php';
		  $to=$k;
		  $subject="CRMS STAFF DETAILS";
		  $msg="Hello, Our Service Person Name is ".$n." <br/>phone number is".$r." and <br/> email id is : ".$cy;

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

    if(!$mail->send()) 
    {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
	}


				if($exe)
				{
					error_reporting(E_ERROR | E_PARSE);
      			echo ("<script LANGUAGE='JavaScript'>
   					 window.alert('Succesfully Staff allocated');
   				 window.location.href='newcomplaint.php?flag=1';
    </script>");


				}
			
			
			}
		}

?>			
				
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include("footer.php"); ?>