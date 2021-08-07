<?php
include("connection.php"); 
include("header.php");

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Claim Settlement Form
        <small>User Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.html"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Product Registration</li>
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
                <table>
				        <?php
                $a=$_POST['sno'];
                $b="SELECT product_id FROM `tbl_purchase` WHERE serial_no='$a'";
                $o=mysqli_query($con,$b);
                $f=mysqli_fetch_array($o);
                  $pid=$f['product_id']; 
                  $a="SELECT * FROM st1 WHERE p_id='$pid'";
                  $gf=mysqli_query($con,$a);
                  while($ad=mysqli_fetch_array($gf))
                  {
                ?>
                <tr>
                  <td><input type='checkbox' name='parts'/><?php echo $ad['name'] ?></td>
                </tr>
                <?php
              }
              ?>
              <tr><td><input type="submit" name='submit' value="submit"/></td></tr>
              </table>
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