<?php include("header.php");
      include("connection.php");
      error_reporting(E_ERROR | E_PARSE);
      session_start(); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Insert Complain
      </h1>
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
              <form action="insertcom.php" method="post" role="form">
                <!-- text input -->
                
          <?php 
            if(isset($_GET['flag']))
            {
            if($_GET['flag']==1)
            {

                  echo ("<script LANGUAGE='JavaScript'>
    window.location.href='makecom.php?bno=$bill';
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
            
              header("Refresh:15;url=makecom.php");
            }
            }
          ?>
          <?php
          $b=$_GET['id'];

        $qry="SELECT * FROM tbl_purchase WHERE bill_no='$b'";
  $rs=mysqli_query($con,$qry);
  $row=mysqli_fetch_array($rs);
  //$name=$row['serial_no'];
  $bgst=$row['buyer_gstno'];
  $btotal=$row['bill_total'];
  $prid=$row['product_id'];
  $log = $row['serial_no'];
  $k=$row['login_id'];
  $_SESSION['log'] = $row['serial_no'];

 $qry1="SELECT * FROM tbl_product WHERE product_id=$prid"; 
 $rs1=mysqli_query($con,$qry1);
  $row1=mysqli_fetch_array($rs1);
  $pname=$row1['product_name'];
  
  
          ?><div class="form-group">
                  <?php error_reporting(E_ERROR | E_PARSE)?>
                  <label>Serial Number</label>
                  <input type="text" name="billno" class="form-control" placeholder="Enter bill number ..." 
                  value="<?php echo "$log"?>">
                </div>

           <div class="form-group">
             <label>your product name</label>
                <input type="text" name="bgst" class="form-control" placeholder="Enter name ..." value="<?php echo"$pname"?>">
                <input type="hidden" name="x" class="form-control" placeholder="Enter name ..." value="<?php echo"$k"?>">
                </div>
               
           <div class="form-group">
             <label>your bill amout</label>
                <input type="text" name="btotal" class="form-control" placeholder="Enter name ..." value="<?php echo"$btotal"?>">
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