 <?php include("header.php"); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Complaint
        <small>User Panel</small>
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
          <th>Complaint_Type</th>
          <th>Track_id</th>
          <th>Detail</th>
          <th>staff</th>
                  <!--<th>Chat</th>-->
                </tr>
                <?php
 include("connection.php");

  $log = $_SESSION['log'];
  $sqlx = "SELECT login_id FROM tbl_login WHERE email_id='$log'";
    $resultx = mysqli_query($con,$sqlx);
    $valuex = mysqli_fetch_array($resultx);
    $id = $valuex['login_id'];

  $query="SELECT * FROM `complaint` WHERE staff_person!='0' AND status!='1'";
  $result=mysqli_query($con,$query);
  while($value=mysqli_fetch_array($result))
  {
    $l=$value['staff_person'];
  ?>
    
    <tr>
    <td><?php echo $value['c_id'];?></td>
      
      <td><?php echo $value['c_type'];?></td>


      <td><?php echo $value['track_id'];?></td>
      
      <td><?php echo $value['complaint_details'];?></td>
      <?php 
        $w="SELECT * FROM `tbl_detail` WHERE login_id='$l'";
        $e=mysqli_query($con,$w);
        $p=mysqli_fetch_array($e);
      ?>
            <td><?php echo $p['name']?></td>

        <td><a href="chat.php?id=<?php echo $value['c_id'];?>" onclick="return confirm('sure to chat');" class="btn btn-success btn-xs">Chat</a>&nbsp;&nbsp;&nbsp;
        <a href="generate.php?id=<?php echo $value['c_id'];?>" onclick="return confirm('sure to chat');" class="btn btn-danger btn-xs">Generate QR code</a></form></td>
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
  