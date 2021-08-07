<?php include("header.php") ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Service Centers
        <small>User Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.html"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Service Center</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
            <div class="row">
      <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Service Center</h3>

              
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
      <table class="table table-hover">
                <tr>
                  <th>Sc_Id</th>
          <th>Address</th>
          <th>Mobile Number</th>
                </tr>
                <?php
 include("connection.php");
 
  
  $query="SELECT * FROM `tbl_servicecenter`";
  $result=mysqli_query($con,$query);
  while($value=mysqli_fetch_array($result))
  {
  ?>
    
    <tr>
    <td><?php echo $value['sc_id'];?></td>
      
      <td><?php echo $value['address'];?></td>
      <td><?php echo $value['mobile'];?></td></tr>
            <?php
      }
      



?>      
        

              <td>
               <a class="btn btn-warning btn-large btn-md" href="backup.php" 
          onclick="return confirm('Sure to Move?');">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Show in Map&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></td>             </table>
            </section>
          
  </div>
  <!-- /.content-wrapper -->
 <?php include("footer.php"); ?>