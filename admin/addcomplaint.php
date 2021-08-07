


<?php include("header.php") ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Complains
        <small>Admin panel control</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.html"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Add complains</li>
      </ol>
       <?php 
            if(isset($_GET['flag']))
            {
            if($_GET['flag']==1)
            {
              echo "<center><font style='color:red; text-align:center'>Incorrect Bill Number</font></center><br/>";
                            error_reporting(E_ERROR | E_PARSE);
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
               error_reporting(E_ERROR | E_PARSE);
              header("location:addcomplaint.php");
            }
            }
          ?>
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
                   <label>Enter Serial no</label>
                    <input type="text" name="serialno" class="form-control" placeholder="Enter serial_no">
                  </div>
			<!--	<div class="form-group">
                  <label>Select User</label>
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
				-->
				<div class="form-group">
                  <label>Complain_Type</label>
				   <select name="ctype" class="form-control">
				   <option value="Black Exhaust">Black Exhaust</option>
           <option value="Oxidized Oil">Oxidized Oil</option>
           <option value="Lack of Power">Lack of Power</option>
				   </select>
                </div>
				<div class="form-group">
                  <label>Complain_Details</label>
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
 <?php include("footer.php"); ?>