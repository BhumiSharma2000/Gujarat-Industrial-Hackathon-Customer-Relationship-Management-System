<?php 
include("header.php");
include("connection.php");

if(isset($_GET['id']))
	{
		$id=$_GET['id'];
	if(isset($_POST['update']))
	{
		$pname=$_POST['pname'];
		$price=$_POST['pprice'];
		//$quantity=$_POST['quantity'];
		
		//$getprice=mysqli_query($con,"SELECT price,gst_slab FROM tbl_purchase WHERE purchase_id='$id'");
		//$getans=mysqli_fetch_array($getprice);
		//$price=$getans['price'];
		//$slab=$getans['gst_slab'];
		//$total=$price*$quantity;
		
		//$newtotal = ($slab / 100) * $total;
		//$ntotal=$total+$newtotal;
		
		$updated=mysqli_query($con,"UPDATE tbl_product SET product_name='$pname',product_price='$price' WHERE product_id='$id'");
		
		if($updated)
		{ 
    error_reporting(E_ERROR | E_PARSE);
      //header("location:manageproduct.php?flag=1");	
      //echo "<script> alert('Product updated Successfully...');</script>";	
      echo ("<script LANGUAGE='JavaScript'>
    window.alert('Succesfully Updated');
    window.location.href='manageproduct.php?flag=1';
    </script>");


    }
		
	}
	}

    if(isset($_GET['id']))
	{
		$id=$_GET['id'];
	}
	$getselect=mysqli_query($con,"SELECT * FROM tbl_product WHERE product_id='$id'");
	while($viewdata=mysqli_fetch_array($getselect))
	{
		$name=$viewdata['product_name'];
		$price=$viewdata['product_price'];
	//	$quantity=$viewdata['quantity'];
	}




 ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Products
        <small>Admin Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.html"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="manageproduct.php"><i class="fa fa-key"></i> Manage Product</a></li>
        <li class="active"> Edit Product</li>
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
                  <label>Product Name</label>
                  <textarea class="form-control" name="pname" rows="3" required ><?php echo $name; ?></textarea>
                </div>
				<div class="form-group">
                  <label>Product Price</label>
                  <input type="text" value=<?php
                  echo $price?> name="pprice" class="form-control" placeholder="Enter price">
                </div>
				<!--<div class="form-group">
                  <label>Quantity</label>
                  <input type="text" name="quantity"  class="form-control" placeholder="Re BUYER GST no ...">
                </div>-->
			  
              <div class="box-footer">
                <input type="submit" name="update" value="Update" class="btn btn-primary">
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