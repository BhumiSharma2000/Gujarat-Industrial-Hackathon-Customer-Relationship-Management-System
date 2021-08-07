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
                    <option value="Reviewing">Reviewing</option>
					<option value="Initiated">Initiated</option>
					<option value="In Progress">In Progress</option>
					<option value="Finished">Finished</option>
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
	  <div class="row">
        <div class="col-md-12">
			<form role="form">
			<div class="input-group input-group-lg">
                <input type="text" class="form-control" placeholder="write your comments...">
                    <span class="input-group-btn">
                      <button type="button" class="btn btn-info btn-flat">Go!</button>
                    </span>
              </div>
			  </form>
		</div>
		</div>
	  <div class="clearfix"></div> <br/>
 <div class="row">
        <div class="col-md-12">
          <!-- The time line -->
          <ul class="timeline">
            
            <!-- timeline item -->
            <li>
              <i class="fa fa-envelope bg-blue"></i>

              <div class="timeline-item">
                <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                <h3 class="timeline-header"><a href="#">Support Team</a> </h3>

                <div class="timeline-body">
                  Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                  weebly ning heekya handango imeem plugg dopplr jibjab, movity
                  jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                  quora plaxo ideeli hulu weebly balihoo...
                </div>
                
              </div>
            </li>
            <!-- END timeline item -->
            <!-- timeline item -->
            <li>
              <i class="fa fa-envelope bg-blue"></i>

              <div class="timeline-item">
                <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                <h3 class="timeline-header"><a href="#">Support Team</a> </h3>

                <div class="timeline-body">
                  Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                  weebly ning heekya handango imeem plugg dopplr jibjab, movity
                  jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                  quora plaxo ideeli hulu weebly balihoo...
                </div>
                
              </div>
            </li>
            <!-- END timeline item -->
            <!-- timeline item -->
             <li>
              <i class="fa fa-envelope bg-blue"></i>

              <div class="timeline-item">
                <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                <h3 class="timeline-header"><a href="#">Support Team</a> </h3>

                <div class="timeline-body">
                  Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                  weebly ning heekya handango imeem plugg dopplr jibjab, movity
                  jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                  quora plaxo ideeli hulu weebly balihoo...
                </div>
                
              </div>
            </li>
         
            <!-- END timeline item -->
            <li>
              <i class="fa fa-clock-o bg-gray"></i>
            </li>
          </ul>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include("footer.php"); ?>