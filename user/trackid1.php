<?php include("header.php");
error_reporting(E_ERROR | E_PARSE);
session_start();
$log = $_SESSION['log']; 
$i="SELECT login_id FROM `tbl_login` WHERE  email_id='$log'";
$lk=mysqli_query($con,$i);
$ol=mysqli_fetch_array($lk);
$r=$ol['login_id'];
//echo $r;
?>

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
        <li class="active">Tracking Id's</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
            <div class="row">
      <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Tracking Id's</h3>

              
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
      <table class="table table-hover">
                <tr>
                  <th>Complain_id</th>
          <th>Tracking_id</th>
          <th>Time of Registrating </th>
          <th>Action</th>
                </tr>
                <?php
 include("connection.php");
 
  
  $query="SELECT * FROM complaint WHERE login_id='$r' AND status='1' and staff_person!='0'";
  $result=mysqli_query($con,$query);
  //echo $r;
  while($value=mysqli_fetch_array($result))
  {
   // var_dump($value);
  ?>
    
    <tr>
    <td><?php echo $value['c_id'];?></td>
      
      <td><?php echo $value['track_id'];?></td>
     <td><?php echo $value['timestamp'];?></td>
              <td> 
          <a class="btn btn-success btn-xs" href="rate.php?id=<?php echo $value['track_id'];?> " 
          onclick="return confirm('Sure to Rate ?');">Rate Us</a> &nbsp;&nbsp;
          <a class="btn btn-danger btn-xs" href="feedback.php?id=<?php echo $value['track_id'];?>&cid=<?php echo $value['c_id'];?>" 
          onclick="return confirm('Sure to feedback  ?');">Give Your Feedback</a>
          </td>
   </tr>
            <?php
      }
      



?>      
                     </table>
            </section>
          
  </div>
  <!-- /.content-wrapper -->
 <?php include("footer.php"); ?>