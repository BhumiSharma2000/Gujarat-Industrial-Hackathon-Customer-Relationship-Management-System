<?php include("header.php") ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Product Registration
        <small>Admin panel control</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.html"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Product Registration</li>
      </ol>
                    <?php
              if(isset($_GET['flag'])){
              if($_GET['flag']==1)
              {
                  $x=$_GET['billno'];
                  echo "<br/><br/><center><font style='color:green; text-align:center'>Purchase Added Successfully</font></center><br/>";
                  echo "<center><font style='color:blue';> your bill no is :".$x."</font></center><br/>";
          
              }
              else
              {
                  echo "<center><font style='color:red; text-align:center'>Purchase not Added Successfully</font></center><br/>";

              }
             }
?>
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
              <form action="insertpurchase.php" method="post" role="form">
                <!-- text input -->
                <div class="form-group">
                  <label>Buyer name</label>
                  <input type="text" name="bname" class="form-control" placeholder="Enter name ... "required>
                </div>
				<div class="form-group">
                  <label>Buyer GST no</label>
                  <input type="text" name="gstno" class="form-control" placeholder="Enter buyer GST no ..." required>
                </div>
				<div class="form-group">
                  <label>Email</label>
                  <input type="email" name="email" class="form-control" placeholder="Enter Email ..."" required>
                </div>
				<div class="form-group">
                  <label>Phone No</label>
                  <input type="text" name="phone" class="form-control" placeholder="Enter Phone no ..."pattern="[6789][0-9]{9}" oninput="setCustomValidity('')" title='Enter 10 Digit mobile
number starting with 6 or 7 or 8 or 9' required >
                </div>
				<div class="form-group">
                  <label>Select Product</label>
                    <select name="product" class="form-control">
					<option value="0">--SELECT--</option>
                    <?php
						
						 include("connection.php"); 
 
						 $que="SELECT * FROM tbl_product";
						 $sql=mysqli_query($con,$que);
						 while($row=mysqli_fetch_array($sql))
						 {
						 
							echo "<option value=".$row[0].">".$row[1]."</option>";

						  }

					
					
					?>
                  </select>
                </div>
				<div class="form-group">
                  <label>Quantity</label>
                  <input type="text" name="quantity" class="form-control" placeholder="Quantity" required>
                </div>
				
				<div class="form-group">
				<label>Select GST slab</label>
                   <select name="slab" class="form-control">
                    <option value="0">0%</option> 
					<option value="5">5%</option>
					<option value="12">12%</option>
					<option value="18">18%</option>
                   <option value="28">28%</option>
                  </select>
               
                </div>
				
     
               
              <div class="box-footer">
                <input type="submit" name="submit" value="Add Purchase" class="btn btn-primary">
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