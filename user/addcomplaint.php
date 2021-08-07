<?php include("header.php");
      include("connection.php");
      error_reporting(E_ERROR | E_PARSE); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Insert Complain

        <small>User Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.html"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="addbillno.php"><i class="fa fa-pencil-square-o"></i> Add complaint</a></li>
         <li class="active">Insert Complain</li>
      </ol>
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
                
				  <?php 
						if(isset($_GET['flag']))
						{
						if($_GET['flag']==1)
						{

                  echo ("<script LANGUAGE='JavaScript'>
    window.location.href='addcomplaint.php?bno=$bill';
    </script>"); 
						}
						else
						{

						
						$var = $_GET['flag'];	
            
						$q="SELECT track_id FROM complaint WHERE login_id='$var' AND status='0' ORDER BY timestamp DESC";
						$r=mysqli_query($con,$q);
						$ans=mysqli_fetch_array($r);

						echo "<center><font style='color:red; text-align:center'>We Have Registerd Your Complaint</font></center><br/>";
						echo "<center><font style='color:blue; text-align:center'>".$var."</font></center><br/>";
						
					    header("Refresh:15;url=addcomplaint.php");
						}
						}
				  ?>
          <?php
          $b=$_GET['bno'];

        $qry="SELECT * FROM tbl_purchase WHERE bill_no=$b";
  $rs=mysqli_query($con,$qry);
  $row=mysqli_fetch_array($rs);
  $name=$row['buyer_name'];
  $bgst=$row['buyer_gstno'];
  $btotal=$row['bill_total'];
  $prid=$row['product_id'];

 $qry1="SELECT * FROM tbl_product WHERE product_id=$prid"; 
 $rs1=mysqli_query($con,$qry1);
  $row1=mysqli_fetch_array($rs1);
  $pname=$row1['product_name'];
  
  
          ?><div class="form-group">
                  <?php error_reporting(E_ERROR | E_PARSE)?>
                  <label>Enter Bill Number</label>
                  <input type="text" name="billno" class="form-control" placeholder="Enter bill number ..." 
                  value="<?php echo "$b"?>">
                </div>
				<div class="form-group">
           <label>your user name</label>
          <?php

          $un=$_SESSION['log'];
          ?>    
                <input type="text" name="user" class="form-control" placeholder="Enter name ..." value="<?php echo"$un"?>">
                </div>

           <div class="form-group">
             <label>your product name</label>
                <input type="text" name="bgst" class="form-control" placeholder="Enter name ..." value="<?php echo"$pname"?>">
                </div>
               
          <div class="form-group">
             <label>your gst-number</label>
                <input type="text" name="bgst" class="form-control" placeholder="Enter name ..." value="<?php echo"$bgst"?>">
                </div>
           <div class="form-group">
             <label>your bill amout</label>
                <input type="text" name="btotal" class="form-control" placeholder="Enter name ..." value="<?php echo"$btotal"?>">
                </div>
                <label>Select Serial Number</label>
                <div class="form-group">
    <select name="ans" id="ans">
    <option value="pick">---Select Serial Number--</option>
<?php
$q="SELECT * FROM `tbl_purchase` WHERE bill_no='$b'";
      $c=mysqli_query($con,$q);
      $d=mysqli_num_rows($c);
      while($d=mysqli_fetch_array($c))
      {
        $m=$d['serial_no'];
      echo"<option value='".$m."'>".$m."</option>";
      
      //echo $x;
      }
?>
    </select>
</div>  
        

                
				
				<div class="form-group">
                  <label>Complaint_Type</label>
				   <select name="ctype" class="form-control">
				   <option value="technical">Technical</option>
				   <option value="xyz">xyz</option>
				   </select>
                </div>
				<div class="form-group">
                  <label>complaint_detail</label>
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