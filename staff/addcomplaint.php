


<?php include("header.php") ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add complaint
        <small>Admin panel control</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.html"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add complaint</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
       <div class="row">
	   <div class="box box-warning">
            <div class="box-header with-border">
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form action="insertcomplaint.php" method="post" role="form">
                <!-- text input -->
                <div class="form-group">
                  <label>Enter Bill Number</label>
				  <?php 
						if(isset($_GET['flag']))
						{
						if($_GET['flag']==1)
						{
							echo "<center><font style='color:red; text-align:center'>Incorrect Bill Number</font></center><br/>";
							header("Refresh:2;url=addcomplaint.php");
						}
						else
						{
						include("connection.php");
						
						$var = $_GET['flag'];	
						$q="SELECT track_id FROM complaint WHERE login_id='$var' AND status='0' ORDER BY timestamp DESC";
						$r=mysqli_query($con,$q);
						$ans=mysqli_fetch_array($r);

						echo "<center><font style='color:red; text-align:center'>We Have Registerd Your Complaint</font></center><br/>";
						echo "<center><font style='color:blue; text-align:center'>".$ans['track_id']."</font></center><br/>";
						
					    header("Refresh:15;url=addcomplaint.php");
						}
						}
				  ?>
                  <input type="text" name="billno" class="form-control" placeholder="Enter name ...">
                </div>
				<div class="form-group">
                  <label>Select Product</label>
                    <select name="user" class="form-control">
					<option value="0">--SELECT--</option>
                    <?php
						
						 include("connection.php"); 
 
						 $que="SELECT * FROM tbl_login WHERE type='2'";
						 $sql=mysqli_query($con,$que);
						 while($row=mysqli_fetch_array($sql))
						 {
						 
							echo "<option value=".$row[0].">".$row[1]."</option>";

						  }

					
					
					?>
                  </select>
                </div>
				
				<div class="form-group">
                  <label>Complaint_Type</label>
				   <select name="ctype" class="form-control">
				   <option value="technical">Technical</option>
				   <option value="xyz">xyz</option>
				   </select>
                </div>
				<div class="form-group">
                  <label>complaint_detail</label>
                  <textarea name="comdetail" class="form-control"></textarea>
                </div>
	
              <div class="box-footer">
                <input type="submit" name="submit" value="SEND" class="btn btn-primary">
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
  </div>
  <!-- /.content-wrapper -->
 <?php include("footer.html"); ?>