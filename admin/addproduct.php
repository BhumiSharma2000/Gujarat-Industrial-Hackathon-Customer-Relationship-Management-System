<?php include("header.php") ?>

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
        <li class="active">Add Product</li>
      </ol>
                    <?php
              if(isset($_GET['flag'])){
              if($_GET['flag']==1)
              {
                  echo "<center><font style='color:green; text-align:center'>Product Added Successfully</font></center><br/>";
          
              }
              else
              {
                  echo "<center><font style='color:red; text-align:center'>Product not Added Successfully</font></center><br/>";

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
 
              <form action="insertproduct.php" method="post" role="form">
                <!-- text input -->
                <div class="form-group">
                  <label>Product name</label>
                  <input type="text" name="bname" class="form-control" placeholder="Enter name ..." required>
                </div>
        <div class="form-group">
                  <label>Product Price</label>
                  <input type="text" name="pprice" class="form-control" placeholder="Enter Price" required>
                </div>
                <div class="form-group">
                  <label>First Year Claim</label>
                <input type="text" name="p1y" class="form-control" placeholder="percentage for 1 year"/>
              </div>
              <div class="form-group">
                  <label>Second Year Claim</label>
                <input type="text" name="p2y" class="form-control" placeholder="percentage for 2 year"/>
              </div>
              <div class="form-group">
                  <label>Third Year Claim</label>
                  <input type="text" name="p3y" class="form-control" placeholder="percentage for 3 year"/>
              </div>     
              <div class="form-group">
                  <label>Warranty Years</label>
                  <input type="text" name="warranty" class="form-control"placeholder="warranty" />
              </div>    
              <div class="box-footer" style="float:right;">
                <input type="submit" name="submit" value="ADD" class="btn btn-primary">
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