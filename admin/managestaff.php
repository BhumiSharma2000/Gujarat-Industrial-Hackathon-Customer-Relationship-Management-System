<?php include("header.php"); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Staffs
        <small>Admin Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Manage Staff</li>
      </ol>
      <?php
        if(isset($_GET['flag'])){
        if($_GET['flag']==1)
          {
            echo "<center><font style='color:green; text-align:center'>Profile Edited Successfully</font></center><br/>";
          
          }
        }

      ?>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <!-- Main row -->
      <div class="row">
	    <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Manage Staff</h3>

              
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>Sr.No</th>
                  <th>User Name</th>
				  <th>Email</th>
				  <th>Phone</th>
                  <th>Profie Pic</th>
                  <th>Action</th>
                </tr>
				
				<?php
				
					$query="SELECT tbl_login.email_id,tbl_login.login_id,tbl_login.type,tbl_login.phone_no,tbl_detail.name,tbl_detail.profile_pic FROM tbl_login INNER JOIN tbl_detail ON tbl_login.login_id=tbl_detail.login_id WHERE (tbl_detail.login_id != '$id' AND tbl_login.type=3) AND tbl_login.active=1";
					$result2 = mysqli_query($con,$query);
					$seq=1;
					while($value2 = mysqli_fetch_array($result2))
					{
				?>
                <tr>
                  <td><?php echo $seq;?></td>
                  <td><?php echo $value2['name'];?></td>
                  <td><?php echo $value2['email_id'];?></td>
				  <td><?php echo $value2['phone_no'];?></td>
                  <td><img src="<?php echo $value2['profile_pic']; ?>" height="50" width="50" border="1px" alt="profile pic"></img></td>
					
				  <td> 
				  <a class="btn btn-success btn-xs" href="editstaff.php?id=<?php echo $value2['login_id'];?> " 
					onclick="return confirm('Sure to Edit ?');">EDIT</a> &nbsp;&nbsp;
				 <a class="btn btn-danger btn-xs" href="deletestaff.php?del=<?php echo $value2['login_id'];?>" 
					onclick="return confirm('Sure to Delete ?');">DELETE</a>
					</td>
				</tr>
				
				<?php
					$seq++;
					}
				
				?>

              </table>
            </div>
            <!-- /.box-body -->
		
			
          </div>

	</div>
        </div>
        </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  <!-- /.content-wrapper -->
    <?php include("footer.php"); ?>