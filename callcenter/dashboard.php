
<?php include("header.php"); 
      include("connection.php");?>
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Call Center
        <small>View Stats</small>
      </h1>
    </section>
<div class="login-box-body">
    <p class="login-box-msg">Enter Mobile Number to continue</p>
    <form method="post">
      <div class="form-group has-feedback">
        <input type="text" name="mobile" class="form-control" placeholder="Email or mobile phone number" required />
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="row">
       <div class="col-xs-12">
          <button type="submit" name="submit" class="btn btn-success btn-block btn-flat">Submit</button>
    </form>
  </div>
</div>
</div>

 <div class="box-body table-responsive no-padding">
         <table class="table table-hover">
                <tr>
                    <th>Sr No</th>
                  <th>Serial Number</th>
                  <th>Buyer Name</th>
          <th>Invoice Number</th>
          <th>Invoice Date</th>
          <th>Product Id</th>
          <th>Gst Number</th>
          <th>Price</th>
          <th>Action</th>
                </tr>
                <tr>
<?php
if(isset($_POST['submit']))
{
  $q=$_POST['mobile'];
  $a="SELECT * FROM `tbl_login` WHERE phone_no='$q'";
  $r=mysqli_query($con,$a);
  $o=mysqli_fetch_array($r);
  $log=$o['login_id'];
  //echo $log;
$seq=1;

  $l="SELECT * FROM `tbl_purchase` WHERE  login_id='$log'";
  $g=mysqli_query($con,$l);
  while($p=mysqli_fetch_array($g))
  {
?>
  <tr><td><?php echo $seq; ?></td>
    <td><?php echo $p['serial_no'];?></td>
    <td><?php echo $p['buyer_name'];?></td>
    <td><?php echo $p['bill_no'];?></td>
    <td><?php echo $p['bill_date'];?></td>
     <td><?php echo $p['product_id'];?></td>
   <td><?php echo $p['buyer_gstno'];?></td>
   <td><?php echo $p['price'];?></td>
   <td><a class="btn btn-danger btn-xs" href="makecom.php?id=<?php echo $p['bill_no'];?> " 
          onclick="return confirm('Sure to Complain ?');">Make Complain</a></td></tr>
<?php
$seq++;
}
}
?>
</table>
</div>
</form>
</div>
</div>

  <?php include("footer.php"); ?>