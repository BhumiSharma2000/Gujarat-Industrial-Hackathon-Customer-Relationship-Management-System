<?php include("header.php"); ?>
<?php
error_reporting(E_ERROR | E_PARSE);
session_start();
//$bill=$_SESSION['serial_no'];

$bill=$_GET['id'];
$qry="SELECT * FROM tbl_purchase WHERE serial_no='$bill'";
  $rs=mysqli_query($con,$qry);
  $row=mysqli_fetch_array($rs);
  $prid=$row['product_id'];
  //$bill=$row['bill_no'];

 $qry1="SELECT * FROM tbl_product WHERE product_id='$prid'"; 
 $rs1=mysqli_query($con,$qry1);
  $row1=mysqli_fetch_array($rs1);
  $pname=$row1['product_name'];
  
  
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add complaint

        <small>User Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.html"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Add complaint</li>
      </ol>
    </section>
<?php
    if(isset($_GET['o'])){
  if($_GET['o']==1)
  {
    echo "<center><font style='color:red; text-align:center'>We Have Registerd Your Complaint </font></center><br/>";
    $tid=$_GET['track'];
     echo "<center><font style='color:blue; text-align:center'>you are out of warranty period</font></center><br/>";
  
  }
  }?>
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
       <div class="row">
	   <div class="box box-warning">
            <div class="box-header with-border">
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <?php
  if(isset($_GET['flag'])){
  if($_GET['flag']==1)
  {
    echo "<center><font style='color:red; text-align:center'>We Have Registerd Your Complaint </font></center><br/>";
    $tid=$_GET['track'];
     echo "<center><font style='color:blue; text-align:center'>Your Track Id is :  ".$tid." </font></center><br/>";
  
  }
  }

?>  
              <form action="insertcom.php?id=<?php echo $bill ?>" method="post" role="form">
                <!-- text input -->
				<div class="form-group">
           <label>Name</label>
          <?php

          $un=$_SESSION['log'];
          ?>    
                <input type="text" name="user" class="form-control" placeholder="Enter name ..." value="<?php echo"$un"?>">
                </div>
				<div class="form-group">
                  <label>Complaint_Type</label>
				   <select name="ctype" class="form-control">
				   <option value="technical">Technical</option>
				   <option value="xyz">xyz</option>
				   </select>
                </div>
				<div class="form-group">
                  <label>Complaint_Detail</label>
                  <input type="text" name="comdetail" class="form-control"/>
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