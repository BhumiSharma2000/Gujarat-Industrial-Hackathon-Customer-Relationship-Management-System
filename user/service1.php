<?php include("header.php");
include("connection.php"); ?>

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
         <form  method="post" role="form">
                <!-- text input -->
                  
        <div class="form-group">
          <tr>
          <td> <label>Enter Service Center Name</label>    
              <input type="text" name="service" class="form-control" placeholder="Enter City name"></td></tr>
         </div>
         <tr><td>
         <div class="box-footer">
                <input type="submit" name="submit" value="SEND" class="btn btn-primary">
              </div></td>
       </form>
       <?php
       if(isset($_POST['submit']))
       {
          $z=$_POST['service'];
          $xs="SELECT *  FROM `tbl_servicecenter` WHERE address LIKE '%$z%' ";
          $zx=mysqli_query($con,$xs);
          $count=mysqli_num_rows($zx);
          if($count!=0)
          {
            ?>
            <tr><td style=color:green;font-size:23px;><img src="1.png" height="40px" width="40px"> &nbsp;FOUND!!! Following Service Centers at Your City  :)</td></tr>
                <tr>
                  <th>Sc_Id</th>
          <th>Address</th>
          <th>Mobile Number</th>
                </tr>
                <?php
          while($value=mysqli_fetch_array($zx))
            {
       ?>
                
    <tr>
    <td><?php echo $value['sc_id'];?></td>  
      <td><?php echo $value['address'];?></td>
      <td><?php echo $value['mobile'];?></td></tr>
            
            <?php
      }
      
}
else
{
  echo "<tr><td style=color:red;font-size:23px;><img src='2.png' height='40px' width='40px'> &nbsp;OOPS! Service center not available at Your City :( </td></tr>";
}
}
?> 
     
        
              </table>
      </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 <?php include("footer.php"); ?>