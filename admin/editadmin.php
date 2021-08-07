<?php
error_reporting(E_ERROR | E_PARSE);
include("header.php");
	include "connection.php";
	
	session_start();
	
	if(!isset($_SESSION['log']))
	{
		header("location:index.php");
	}
	
	else
	{
		$log = $_GET['id'];
		
		$a = "SELECT * FROM tbl_login WHERE login_id='$log'";
		$aa = mysqli_query($con,$a);
		$value = mysqli_fetch_array($aa);
		
		$id1 = $value['login_id'];
		
		$b = "SELECT * FROM tbl_detail WHERE login_id='$id1'";
		$bb = mysqli_query($con,$b);
		$bbb = mysqli_fetch_array($bb);
		
		$n = $bbb['name'];
		$i = $bbb['profile_pic'];
		$do = $bbb['dob'];
		
		
		
			$id = $value['login_id'];
		
			$email = $value['email_id'];
			$oldphone = $value['phone_no'];
			
			$qry = "SELECT * FROM tbl_detail WHERE login_id='$id'";
			$result1 = mysqli_query($con,$qry);
			$value1 = mysqli_fetch_array($result1);
		
			$name = $value1['name'];
			$dob = $value1['dob'];
			$address = $value1['address'];
			$sql1 = "SELECT profile_pic FROM tbl_detail WHERE login_id='$id'";
		$result2 = mysqli_query($con,$sql1);
		$value2 = mysqli_fetch_array($result2);
		$def =$value2['profile_pic'];
		
		
?>
<?php
	
	if(isset($_POST['submit']))
	{	
		if($_FILES["image"]["name"] != "")
		{
			$name = $_POST['name'];
			$newphone = $_POST['phn'];
			$address = $_POST['address'];
			$dob = $_POST['dob'];
			$email = $_POST['email'];
			$file=$_FILES['image']['tmp_name'];
			$image=addslashes(file_get_contents($_FILES['image']['tmp_name']));
			$image_name=addslashes($_FILES['image']['name']);
			
			move_uploaded_file($_FILES["image"]["tmp_name"],"photos/".$_FILES["image"]["name"]);
				
			$location="photos/" . $_FILES["image"]["name"];
			$updated = mysqli_query($con,"UPDATE tbl_login SET email_id='$email' WHERE login_id='$log'");
			$updated2 = mysqli_query($con,"UPDATE tbl_detail SET name='$name',profile_pic='$location',address='$address',dob='$dob' WHERE login_id='$id'");
			$updated3 = mysqli_query($con,"UPDATE tbl_login SET phone_no='$newphone' WHERE login_id='$log'");
			
			
			if($updated && $updated2)
			{
				if($updated3)
				{
					        echo ("<script LANGUAGE='JavaScript'>
    window.alert('Succesfully Updated');
    window.location.href='manageadmin.php?flag=1';
    </script>");    			
				}
				else
				{
					echo "<font style='color:red'>Error...</font>";
				}
			}
			else
			{
					echo "<font style='color:red'>Error...</font>";
			}
		}
		else
		{
			$name = $_POST['name'];
			$newphone = $_POST['phn'];
			$address = $_POST['address'];
			$dob = $_POST['dob'];
			$email = $_POST['email'];
			$updated = mysqli_query($con,"UPDATE tbl_login SET email_id='$email',phone_no='$newphone' WHERE login_id='$id'");
			$updated2 = mysqli_query($con,"UPDATE tbl_detail SET name='$name',address='$address',dob='$dob' WHERE login_id='$id'");
			
			
			if($updated && $updated2)
			{
				                  echo ("<script LANGUAGE='JavaScript'>
    window.alert('Succesfully Updated');
    window.location.href='manageadmin.php?flag=1';
    </script>");    			
			}
			else
			{
					echo "<font style='color:red'>Error...</font>";
			}
		}
		
	}
			
?>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <style>
	#myDiv {
	border: 2px solid lightgray;
	height:210px;
	width:210px;
	float: left;
	}
	</style>
<body class="hold-transition skin-blue sidebar-mini">

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Profile
        <small>Admin Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="manageadmin.php"><i class="fa fa-key"></i> Manage Admin</a></li>
        <li class="active">Edit Profile</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <!-- Main row -->
      <div class="row">
	  
	  <div class="box box-warning">
            <div class="box-header with-border">
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form" method="post" enctype="multipart/form-data" >
                <!-- text input -->
                <div class="form-group">
                  <label>Name</label>
                  <input type="text" name="name" value="<?php echo $name; ?>" class="form-control" placeholder="Enter name ..." required />
                </div>
				<div class="form-group">
                  <label>Email</label>
                  <input type="email" name="email" value="<?php echo $email; ?>" class="form-control" placeholder="Enter Email ..." required />
                </div>
				<div class="form-group">
                  <label>Phone No</label>
                  <input type="text" name="phn" class="form-control" placeholder="Enter Phone no ..." pattern="[6789][0-9]{9}" oninput="setCustomValidity('')" title='Enter 10 Digit mobile
number starting with 7 or 8 or 9' value="<?php echo $oldphone; ?>" required />
                </div>
				
				<div class="form-group">
                <label>Birth Date:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" name="dob"  value="<?php echo $dob; ?>" class="form-control pull-right" id="datepicker" autocomplete="off" required />
                </div>
                <!-- /.input group -->
              </div>
                
                

                <!-- textarea -->
                <div class="form-group">
                  <label>Address</label>
                  <textarea class="form-control" name="address" rows="3" required ><?php echo $address; ?></textarea>
                </div>
				<div class="form-group">
                  <label>Profile Pic</label>
                  <input type="file" id="profile-img" name="image" accept="image/png,image/jpg,image/jpeg" class="form-control" placeholder="">
					<div id="myDiv" align="center"> 
						<!--<p class="square"> -->
					  <img src="<?php echo $def; ?>" id="profile-img-tag" alt="Profile Pic" width="200px" height="200px" style="border:5px solid #ffffff; background-color: #ffffff;" />


						<script type="text/javascript">
							function readURL(input) {
								if (input.files && input.files[0]) {
									var reader = new FileReader();
									
									reader.onload = function (e) {
										$('#profile-img-tag').attr('src', e.target.result);
									}
									reader.readAsDataURL(input.files[0]);
								}
							}
							$("#profile-img").change(function(){
								readURL(this);
							});
						</script>
					</div>	
					
				</div>
              <div class="box-footer" style="float:right;">
                <button type="submit" name="submit" class="btn btn-primary">Modify</button>
              </div>
			  
			  </form>
			  
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
     
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
	
  <!-- /.content-wrapper -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<script>
$(document).ready(function () {
$('#datepicker').datepicker({    
    endDate: '+1d',
    autoclose: true
});  });
</script>
<!-- Bootstrap 3.3.7 -->


<?php

	}

?>
<?php include("footer.php"); ?>