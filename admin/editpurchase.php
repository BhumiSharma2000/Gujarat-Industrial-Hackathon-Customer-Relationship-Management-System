<?php 
error_reporting(E_ERROR | E_PARSE);
include("header.php");
include("connection.php");

if(isset($_GET['id']))
	{
		$id=$_GET['id'];

	}

    if(isset($_GET['id']))
	{
		$id=$_GET['id'];
	}
	$getselect=mysqli_query($con,"SELECT * FROM tbl_purchase WHERE serial_no='$id'");
	while($viewdata=mysqli_fetch_array($getselect))
	{
		$name=$viewdata['buyer_name'];
		$gst=$viewdata['buyer_gstno'];
		$quantity=$viewdata['quantity'];
	}




 ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Purchase
        <small>Admin panel control</small>
      </h1>
      <ol class="breadcrumb">
                <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                <li><a href="managepurchase.php"><i class="fa fa-key"></i> Manage purchase</a></li>
        <li class="active">Edit Purchase</li>
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
              <form method="post" role="form">
                <!-- text input -->
   
                 <div class="form-group">
                  <label>Buyer name</label>
                  <textarea class="form-control" name="bname" rows="3" required ><?php echo $name; ?></textarea>
                </div>
				<div class="form-group">
                  <label>Buyer GST no</label>
                  <input type="text" name="gstno" value=<?php echo $gst; ?> class="form-control" placeholder="Enter buyer GST no ...">
                </div>
			  
              <div class="box-footer">
                <input type="submit" name="update" value="Update" class="btn btn-primary">
              </div>
              </form>
              <?php  if(isset($_POST['update']))
            {
    $bname=$_POST['bname'];
    $gstnum=$_POST['gstno'];
    
    $getprice=mysqli_query($con,"SELECT price,gst_slab FROM tbl_purchase WHERE serial_no='$id'");
    $getans=mysqli_fetch_array($getprice);
    $price=$getans['price'];
    $slab=$getans['gst_slab'];
    
    $updated=mysqli_query($con,"UPDATE tbl_purchase SET buyer_name='$bname',buyer_gstno='$gstnum' WHERE serial_no='$id'");
    
    if($updated)
    { 
      echo ("<script LANGUAGE='JavaScript'>
    window.alert('Succesfully Updated');
    window.location.href='managepurchase.php';
    </script>");  
    }
    }
    ?>
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
