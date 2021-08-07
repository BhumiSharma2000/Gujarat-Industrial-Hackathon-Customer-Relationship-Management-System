<?php

  include "connection.php";
  error_reporting(E_ERROR | E_PARSE);
  session_start();
  
  if(!isset($_SESSION['log']))
  {
    header("location:index.php");
  }
  
  else
  {
    $log = $_SESSION['log'];
    
    $sql = "SELECT login_id FROM tbl_login WHERE email_id='$log'";
    $result = mysqli_query($con,$sql);
    $value = mysqli_fetch_array($result);
    
    $id = $value['login_id'];
    
    $qry = "SELECT * FROM tbl_detail WHERE login_id='$id'";
    $result1 = mysqli_query($con,$qry);
    $value1 = mysqli_fetch_array($result1);
    
    $count = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(login_id) FROM tbl_login WHERE type=2 AND active=1"));
    $n = $value1['name'];
    $i = $value1['profile_pic'];
    $dob = $value1['dob'];

    $ap="SELECT * FROM `tbl_purchase` WHERE login_id='$id'";
    $result5=mysqli_query($con,$ap);
    $value5=mysqli_fetch_array($result5);

}?>   


<?php include("header.php") ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         List of Purchases

        <small>User Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.html"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">List of Purchase</li>
      </ol>
    </section>
    <section>
 <div class="box-body">
                
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
            <th>Serial no. </th>
            <th>Invoice Number</th>
            <th>Product name </th>
            <th>Date</th>
            <th>Warranty</th>
            <th>Action</th>
          </tr>
          <?php
            $query="SELECT * FROM `tbl_purchase` WHERE login_id='$id'";
             $result=mysqli_query($con,$query);
             while($valu=mysqli_fetch_array($result))
             {
                $e=$valu['product_id'];
                $xyz="SELECT * FROM `tbl_product` WHERE product_id='$e'";
                $qw=mysqli_query($con,$xyz);
                $kl=mysqli_fetch_array($qw);
                $wf=$valu['serial_no'];
              ?>
          <tr>

            <td><?php echo $valu['serial_no'];?></td>
            <td><?php echo $valu['bill_no'];?></td>
            <td><?php echo $kl['product_name']; ?></td>
            <td><?php echo $valu['bill_date'];?></td>
            <td><p class="demo" id  = "demo"></p></td>
            <td><a href="makecomplain.php?id=<?php echo $value5['serial_no'];?>" onclick="return confirm('sure to complain');" class="btn btn-danger btn-xs">Make Complain</a></td>
            <?php
          }
          ?>
          <?php
            $a=" SELECT * FROM `tbl_purchase`";
  //echo $a;
  $zp=mysqli_query($con,$a);
  $sd=mysqli_fetch_array($zp);
  $qk=$sd['warranty'];
  $h=5;
  //echo $sd['bill_date']."<br/>";
  $sd['bill_date']=date('Y-m-d H:i:s',strtotime("+{$qk} years",strtotime($sd['bill_date'])));
  //echo $sd['bill_date']."<br/>";
  $msg=$sd['bill_date'];
  /*echo $msg."<br/>";
  $b=strtotime('', $timestamp);
  echo date('Y-m-d H:i:s',$b);*/
 
  ?>  
              <script>
                  <?php
                  echo "var a = [";
                  echo "'$msg'";

                  while($sd=mysqli_fetch_array($zp)){

                    $qk=$sd['warranty'];

                  //echo $sd['bill_date']."<br/>";
                  $sd['bill_date']=date('Y-m-d H:i:s',strtotime("+{$qk} years",strtotime($sd['bill_date'])));
                    
                    $msg=$sd['bill_date']; 
                    echo ","."'$msg'";
                  }
                  echo "];";
                  ?>
                  var demo = document.getElementsByClassName("demo");
                  console.log(x);
                  
                  for(b in a){
                    demo[b].innerHTML = a[b];  
                  
                  // Set the date we're counting down to
                    var countDownDate = new Date(a[b]).getTime();
                  // Update the count down every 1 second
                    var x = setInterval(function() {

                  // Get todays date and time
                    var now = new Date().getTime();

                  // Find the distance between now and the count down date
                    var distance = countDownDate - now;
                  // Time calculations for days, hours, minutes and seconds
                    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                  // Display the result in the element with id="demo"
                    demo.innerHTML = days + "d " + hours + "h " + minutes + "m " + seconds + "s ";

                  // If the count down is finished, write some text 
                  if (distance < 0) {
                    clearInterval(x);
                    demo.innerHTML = "EXPIRED";
                  }
                }, 1000);
              }
              </script>
            <?php
            $_SESSION['bill_no']=$value5['serial_no'];
          ?>
          </tr>
          </table>


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