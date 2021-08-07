<?php
error_reporting(E_ERROR | E_PARSE);
include("header.php");
  include "connection.php";
  session_start();
  if(!isset($_SESSION['log']))
  {
    header("location:index.php");
  }
  else
  {
    $log = $_SESSION['log'];
    $sc=$_GET['id'];
    
    $ab = "SELECT * FROM tbl_servicecenter WHERE sc_id='$sc'";
    $aav = mysqli_query($con,$ab);
    $value2 = mysqli_fetch_array($aav);
    $add=$value2['address'];
    $mob=$value2['mobile'];

    $a = "SELECT * FROM tbl_login WHERE login_id='$log'";
    $aa = mysqli_query($con,$a);
    $value = mysqli_fetch_array($aa);
    
    $id1 = $value['login_id'];;
    
    $b = "SELECT * FROM tbl_detail WHERE login_id='$id1'";
    $bb = mysqli_query($con,$b);
    $bbb = mysqli_fetch_array($bb);
    
    $n = $bbb['name'];
    $i = $bbb['profile_pic'];
    $do = $bbb['dob'];
    
      $id = $value['login_id'];
    
      $email = $value['email_id'];
      $oldphone = $value['phone_no'];
      
      $qry = "SELECT * FROM tbl_detail WHERE login_id='$id'";
      $result1 = mysqli_query($con,$qry);
      $value1 = mysqli_fetch_array($result1);
    
      $name = $value1['name'];
      $dob = $value1['dob'];
      $address = $value1['address'];
      $sql1 = "SELECT profile_pic FROM tbl_detail WHERE login_id='$id'";
    $result2 = mysqli_query($con,$sql1);
    $value2 = mysqli_fetch_array($result2);
    $def =$value2['profile_pic'];
    
    
?>
<?php
  
  if(isset($_POST['submit']))
  {
      $address = $_POST['address'];
      $moi=$_POST['mobile'];

      $updated = mysqli_query($con,"UPDATE tbl_servicecenter SET address='$address',mobile='$moi' WHERE sc_id='$sc'");
      if($updated)
      {
       echo ("<script LANGUAGE='JavaScript'>
    window.alert('Succesfully Updated');
    window.location.href='manageservicecenter.php';
    </script>");         
      }
      else
      {
          echo "<font style='color:red'>Error...</font>";
      }
    }
      
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Service Center
        <small>Admin Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                        <li><a href="manageservicecenter.php"><i class="fa fa-key"></i> Manage Service Center</a></li>
        <li class="active">Edit Service Center</li>
      </ol>
    </section>
  
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <!-- Main row -->
      <div class="row">
    
    <div class="box box-warning">
            <div class="box-header with-border">
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form" method="post" enctype="multipart/form-data" >
                <!-- text input -->
               
                <div class="form-group">
                  <label>Address</label><br/>
    <input name="address" id="autocomplete" placeholder="Enter your address" onfocus="geolocate()" value="<?php echo $add;?>" type="text" autocomplete="off" class="form-control" required>
    <input type="hidden" id="lat" name="lat" value="" />
    <input type="hidden" id="long" name="long" value="" />
                </div>
               <div class="form-group">
                  <label>Mobile</label>
                  <input type="text" class="form-control" name="mobile" value="<?php echo $mob; ?>" required >
                </div>
              <div class="box-footer" style="float:right;">
                <button type="submit" name="submit" class="btn btn-primary">Modify</button>
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
<?php

  }

?>
<?php include("footer.php"); ?>