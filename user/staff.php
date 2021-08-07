 <?php include("header.php"); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    

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
		
		<tr><td>c_id</td>
		<td><?php echo $value['c_id'];?></td></tr>
		<tr><td>login_id<td><?php 
			$pid=$value['login_id'];
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
				if($exe)
				{
					header("location:newcomplaint.php");
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