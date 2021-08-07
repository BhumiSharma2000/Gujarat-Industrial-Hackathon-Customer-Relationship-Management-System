<?php include("header.php"); ?>
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
        <li class="active">Manage Product</li>
      </ol>
      <?php
      if(isset($_GET['flag']))
            {
            if($_GET['flag']==1)
            {
              echo "<center><font style='color:green; text-align:center'><b>product Updated successfully</b></font></center><br/>";
                            error_reporting(E_ERROR | E_PARSE);
              header("Refresh:2;url=addcomplaint.php");
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
              <h3 class="box-title">Manage Product</h3>

              
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>Sr.No</th>
                  <th>Product_id</th>
          <th>Product Name</th>
          <th>Product Price</th>
           <th>Action</th>
                </tr>
                <?php
 include("connection.php");
 
  
  $query="SELECT * FROM `tbl_product` WHERE status=1";
  $result=mysqli_query($con,$query);
  $seq=1;
  while($value=mysqli_fetch_array($result))
  {
  ?>
    
    <tr>
    <td><?php echo $seq; ?></td>
      <td><?php echo $value['product_id'];?></td>
      <td><?php echo $value['product_name'];?></td>
      <td><?php echo $value['product_price'];?></td>
      <td>
                  <a class="btn btn-success btn-xs" href="editproduct.php?id=<?php echo $value['product_id'];?>" onclick="return confirm('Sure to Edit');" class="btn btn-danger btn-xs">EDIT</a>&nbsp; &nbsp;
    <a class="btn btn-danger btn-xs" href="deleteproduct.php?del=<?php echo $value['product_id'];?>" 
          onclick="return confirm('Sure to Delete ?');" class="btn btn-danger btn-xs">DELETE</a>
          </td>
        </tr>
            <?php
            $seq++;
      }
      if(isset($_GET['del']))
       {
      $id=$_GET['del'];
$qry="SELECT * FROM `tbl_product` WHERE product_id=$id";
$rs=mysqli_query($con,$qry);
$row=mysqli_fetch_array($rs);
$active=$row['status'];
error_reporting(E_ERROR | E_PARSE);
if($active==1)
{
  $qry1="UPDATE `tbl_product` SET status=0 WHERE product_id=$id";
  $rs1=mysqli_query($con,$qry1);
  header("location:manageproduct.php");
}
else
{
  header("location:manageproduct.php");
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
