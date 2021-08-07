 <?php include("header.php"); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manage Complaint
        <small>Staff Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.html"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Manage Complaint</li>
      </ol>
    </section>
<?php
  if(isset($_GET['flag'])){
  if($_GET['flag']==1)
  {
    echo "<center><font style='color:green; text-align:center'>Status Updated Successfully</font></center><br/>";
  
  }
  }
        error_reporting(E_PARSE | E_ERROR);
      

?>  
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <!-- Main row -->
      <div class="row">
	    <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Manage complaint</h3>

              
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>Complain_id</th>
                  <th>Email</th>
                  <th>Name</th>

                  <th>Phone_no</th>
				  <th>Complaint_Type</th>
				  <th>Track_id</th>
				  <th>Detail</th>
				  <th>Status</th>
                  <th>Action</th>
                  <th>Busy</th>
                  <th>Chat</th>
                </tr>
                <?php
 include("connection.php");

	$log = $_SESSION['log'];
	$sqlx = "SELECT login_id FROM tbl_login WHERE email_id='$log'";
		$resultx = mysqli_query($con,$sqlx);
		$valuex = mysqli_fetch_array($resultx);
		$id = $valuex['login_id'];
	$query="SELECT * FROM complaint WHERE staff_person='$id' AND status='0'";
	$result=mysqli_query($con,$query);
	while($value=mysqli_fetch_array($result))
	{
	?>
		
		<tr>
		<td><?php echo $value['c_id'];?></td>
		<td><?php 
			$pid=$value['login_id'];
			$q=mysqli_query($con,"SELECT * FROM tbl_login WHERE login_id='$pid' ");
			$ans=mysqli_fetch_array($q);
			echo $ans['email_id'];?></td>
     <td><?php $q1=mysqli_query($con,"SELECT * FROM tbl_detail WHERE login_id='$pid' ");
      $ans1=mysqli_fetch_array($q1);
      echo $ans1['name'];?></td>

      <td><?php echo $ans['phone_no'];?></td>
      
			<td><?php echo $value['c_type'];?></td>
			<td><?php echo $value['track_id'];?></td>
			
			<td><?php echo $value['complaint_details'];?></td>

				  <td><?php
					$id=$value['c_id'];

					$s1="SELECT work_status FROM manage_complaint WHERE c_id='$id' AND work_status!='finished'";
					$e1=mysqli_query($con,$s1);
					$a1=mysqli_fetch_array($e1);
					echo $a1['work_status'];
				
				?></td>
              <td>
                  <a href="staff1.php?id=<?php echo $id;?>" onclick="return confirm('sure to edit');" class="btn btn-danger btn-xs">Add Progress</a>        
          </td>

        <td><form method="POST"><input type="submit" name="busy" value="not available" class="btn btn-warning btn-xs"></form></td>
        <td><a href="chat.php?id=<?php echo $value['c_id'];?>" onclick="return confirm('sure to chat');" class="btn btn-success btn-xs">chat</a></form></td>
				</tr>
            <?php
			}




?>		

<?php
if(isset($_POST['busy']))
      {
        $a="UPDATE complaint SET staff_person=0 WHERE c_id='$id'";
        $z=mysqli_query($con,$a);
        echo ("<script LANGUAGE='JavaScript'>
    window.alert('Succesfully Updated');
    window.location.href='managecomplaint.php';
    </script>");
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
  