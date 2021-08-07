 <?php include("header.php"); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Progress
        <small>Staff Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.html"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="managecomplaint.php"><i class="fa fa-key"></i> Manage Complaint</a></li>
        <li class="active">Add Progress</li>
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
              <h3 class="box-title">Manage Complain</h3>

              
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
		$pid=$value['login_id'];
          $s=$value['c_id'];
	?>
		
		<tr><td>c_id</td>
     <?php  $cid=$value['c_id'];?>

		<td><?php echo $cid;  ?></td></tr>
		<tr><td>login_id</td><td>
			<?php 
			echo $pid;
      ?></td>
    <tr><td>Email_id</td>
     <td> <?php
			$q=mysqli_query($con,"SELECT email_id FROM tbl_login WHERE login_id='$pid' ");
			$ans=mysqli_fetch_array($q);
			echo $ans['email_id'];?></td></tr>
			<tr><td>Complain_type</td><td><?php echo $value['c_type'];?></td></tr>
			<tr><td>track_id</td><td><?php echo $value['track_id'];?></td></tr>
			
			<tr><td>Details</td><td><?php echo $value['complaint_details'];?></td></tr>
			
			<tr>
			<td>Select Staff</td>
			<td>
			<select name="sname">
			<option value="0">--SELECT--</option>
                    <option value="Reviewing">Reviewing</option>
					<option value="Initiated">Initiated</option>
					<option value="In Progress">In Progress</option>
					<option value="Finished">Finished</option>
			</select>
			</td></tr>
			<tr><td>Estimate Time</td>
				<td><input type="date" name="tdate"/></td></tr>
			<tr><td></td><td><input type="submit" name="submit" value="submit"/></td></tr>
			</form>
            <?php
			}
			
			if(isset($_POST['submit']))
			{
				$status=$_POST['sname'];
				$tdate=$_POST['tdate'];
				$query="INSERT INTO manage_complaint(c_id,login_id,work_status,tdate) VALUES('$id','$pid','$status','$tdate')";
				$exe=mysqli_query($con,$query);
        /*$s="SELECT name FROM tb1_detail WHERE login_id='$pid'";
        $m2=mysqli_query($con,$s);
        $z1=mysqli_fetch_array($m2);
        $abcd=$z1['name'];*/
				$query1="UPDATE manage_complaint SET work_status='$status' WHERE c_id='$id'";
				$exe1=mysqli_query($con,$query1);
				if($status=="Finished")
				{
					$q1=mysqli_query($con,"UPDATE complaint SET status='1' WHERE c_id='$id'");
				
				}
				if($exe)
				{
					error_reporting(E_ERROR | E_PARSE);
				echo ("<script LANGUAGE='JavaScript'>
    window.alert('Succesfully Updated');
    window.location.href='managecomplaint.php?flag=1';
    </script>"); 
				}
			
			
			}

}
?>			
				
              </table>

        
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
           
    </section>
  <?php include("footer.php"); ?>