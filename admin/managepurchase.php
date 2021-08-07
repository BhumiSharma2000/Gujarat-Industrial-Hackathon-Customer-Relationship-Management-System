<?php include("header.php"); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Purchases
        <small>Admin panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.html"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Manage Purchase</li>
      </ol>
       <?php
        if(isset($_GET['flag'])){
        if($_GET['flag']==1)
          {
            echo "<center><font style='color:green; text-align:center'>Profile Edited Successfully</font></center><br/>";
          
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
              <h3 class="box-title">Manage Purchases</h3>

              
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>Sr No</th>
                  <th>Serial No</th>
                  <th>Bill No</th>
				  <th>Buyer Name</th>
				  <th>Buyer GST No</th>
				  <th>Product name</th>
				  <th>Total</th>
                  <th>Action</th>
                </tr>
                <?php
 include("connection.php");
 
	
	$query="SELECT * FROM tbl_purchase WHERE purchase_status=1 ORDER BY serial_no";
	$result=mysqli_query($con,$query);
  $seq=1;
	while($value=mysqli_fetch_array($result))
	{
	?>
		
		<tr>
      <td><?php echo $seq; ?></td>
      <td><?php echo $value['serial_no'];?></td>
			<td><?php echo $value['bill_no'];?></td>
			<td><?php echo $value['buyer_name'];?></td>
			<td><?php echo $value['buyer_gstno'];?></td>
			<td><?php 
			$pid=$value['product_id'];
			$q=mysqli_query($con,"SELECT product_name FROM tbl_product WHERE product_id='$pid' ");
			$ans=mysqli_fetch_array($q);
			echo $ans['product_name'];?></td>
			
			<td><?php echo $value['bill_total'];?></td>
			<td>
                  <a class="btn btn-success btn-xs" href="editpurchase.php?id=<?php echo $value['serial_no'];?> " 
          onclick="return confirm('Sure to Edit ?');">EDIT</a> &nbsp;&nbsp;
				    <a class="btn btn-danger btn-xs" href="deletepurchase.php?del=<?php echo $value['serial_no'];?>" 
          onclick="return confirm('Sure to Delete ?');">DELETE</a>
				  </td>
				</tr>
            <?php

          $seq++;
			}
			if(isset($_GET['del']))
		   {
			$id=$_GET['del'];
$qry="SELECT * FROM `tbl_purchase` WHERE purchase_id=$id";
$rs=mysqli_query($con,$qry);
$row=mysqli_fetch_array($rs);
$active=$row['purchase_status'];
error_reporting(E_ERROR | E_PARSE);
if($active==1)
{
  $qry1="UPDATE `tbl_purchase` SET purchase_status=0 WHERE purchase_id=$id";
  $rs1=mysqli_query($con,$qry1);
  header("refresh:0;location:managepurchase.php");
}
else
{
  //echo "error";
  header("location:managepurchase.php");
}
		
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
  <?php error_reporting(E_ERROR | E_PARSE);?>