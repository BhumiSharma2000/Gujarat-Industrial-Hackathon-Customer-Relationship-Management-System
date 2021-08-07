 <?php include("header.php"); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manage Complaint
        <small>Admin panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.html"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Manage complaint</li>
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
              <table class="table table-hover">
                <tr>
                  <th>C_id</th>
                  <th>Email</th>
				  <th>Complaint_Type</th>
				  <th>Track_id</th>
				  <th>Detail</th>

                  <th>Action</th>
                </tr>
                <?php
 include("connection.php");
 
	
	$query="SELECT * FROM complaint WHERE staff_person='0'";
	$result=mysqli_query($con,$query);
	while($value=mysqli_fetch_array($result))
	{
	?>
		
		<tr>
		<td><?php echo $value['c_id'];?></td>
		<td><?php 
			$pid=$value['login_id'];
			$q=mysqli_query($con,"SELECT email_id FROM tbl_login WHERE login_id='$pid' ");
			$ans=mysqli_fetch_array($q);
			echo $ans['email_id'];?></td>
			<td><?php echo $value['c_type'];?></td>
			<td><?php echo $value['track_id'];?></td>
			
			<td><?php echo $value['complaint_details'];?></td>
			<td>
                  <a href="staff.php?id=<?php echo $value['c_id'];?>" onclick="return confirm('sure to edit');" class="btn btn-danger btn-xs">Assign Staff</a>			  
				  </td>
				</tr>
            <?php
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