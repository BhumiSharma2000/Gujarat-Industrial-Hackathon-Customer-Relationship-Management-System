<?php include("header.php");
 ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        FeedBack
        <small>Admin Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Manage Feedback</li>
      </ol>
        <?php
        if(isset($_GET['flag'])){
        if($_GET['flag']==1)
          {
            echo "<center><font style='color:green; text-align:center'>Question Edited Successfully</font></center><br/>";
          
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
              <h3 class="box-title">Handle Feedback</h3>

              
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>Sr.No</th>
                  <th>Question_Id</th>
				  <th>Question</th>
				  <th>Action</th>
				
				<?php
				
					$query="SELECT * FROM questioncrm WHERE status=1";;
					$result2 = mysqli_query($con,$query);
					$seq=1;
					while($value2 = mysqli_fetch_array($result2))
					{
				?>
                <tr>
                  <td><?php echo $seq;?></td>
                  <td><?php echo $value2['q_id'];?></td>
                  <td><?php echo $value2['question'];?></td>
				  <td><a class="btn btn-success btn-xs" href="editque.php?id=<?php echo $value2['q_id'];?> " 
					onclick="return confirm('Sure to Edit ?');">EDIT</a> &nbsp;&nbsp;
				  <a class="btn btn-danger btn-xs" href="deleteque.php?del=<?php echo $value2['q_id'];?>" 
					onclick="return confirm('Sure to Delete  ?');">DELETE</a>
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
          <!-- /.box -->
		 
	</div>
        </div>
 

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
    <?php include("footer.php"); ?>