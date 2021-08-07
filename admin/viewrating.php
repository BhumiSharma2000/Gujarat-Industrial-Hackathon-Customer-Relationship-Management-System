<?php 
include("connection.php");
include("header.php");
//error_reporting(E_ERROR | E_PARSE);
 ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        View Answer
        <small>Admin Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">View Answer</li>
      </ol>
    </section>


    <section class="content">
       <div class="row">
      <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">View Answer</h3>
            </div>
        <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>Sr No</th>
                  <th>Complain_id</th>
          <th>Track_id</th>
          <th>Star</th>
        </tr>
             
             <?php
                    include("connection.php");
                    $q="SELECT * FROM rating";
                    $a=mysqli_query($con,$q);
                     $i=1;
                    while($c=mysqli_fetch_array($a) )
                    {

                 ?>
 <tr>
                <td><?php echo $i;?></td>
                <td>
                 <?php 
                 $x=$c['c_id'];
                 echo $x;
                  ?>

                </td>
                <td><?php echo $c['track_id'];?></td>
                <td><?php echo $c['star'];?></td>

              </tr>
              <?php
            $i++;}
            ?>        
              </table>
			  </div>
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
  