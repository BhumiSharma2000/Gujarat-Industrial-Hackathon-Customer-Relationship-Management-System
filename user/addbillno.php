<?php include("header.php") ?>

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
        <li class="active"><i class="fa fa-pencil-square-o"></i> Add Complain</li>
      </ol>
    </section>
<?php

include("connection.php");
$log = $_SESSION['log'];
$x="SELECT `login_id` FROM `tbl_login` WHERE email_id='$log'";
$qu=mysqli_query($con,$x);
$f=mysqli_fetch_array($qu);
$id=$f['login_id'];
  if(isset($_POST['submit']))
  {
    
    $bill=$_POST['billno'];
    $query="SELECT bill_no FROM tbl_purchase WHERE bill_no='$bill' AND login_id='$id'";
    $exe=mysqli_query($con,$query);
    $count=mysqli_num_rows($exe);
    if($count!=0)
    {

                  echo ("<script LANGUAGE='JavaScript'>
    window.location.href='addcomplaint.php?bno=$bill';
    </script>");      
      
    }
    else
    {

                  echo ("<script LANGUAGE='JavaScript'>
    window.script='incorrect Bill_no'
    window.location.href='addbillno.php?flag=0';
    </script>");  
    }
  }
?>
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->

       <div class="row">
	   <div class="box box-warning">

            <div class="box-header with-border">

            </div>
            <!-- /.box-header -->
                  <?php if(isset($_GET['flag']))
      {
        if($_GET['flag']==0)
        {
          echo "<center><font color='red'>Incorrect Bill Number</font></center>";
        }
      }
      ?>
      <br/>
            <div class="box-body">
              <form method="POST" role="form">
                <!-- text input -->
                <div class="form-group">
                  <label>Enter Bill Number</label>
				          <input type="text" name="billno" class="form-control" placeholder="Enter bill number ...">
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