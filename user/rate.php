<?php include("header.php");
include("connection.php");
error_reporting(E_ERROR | E_PARSE);
    $log = $_SESSION['log'];
    $z="SELECT * FROM `tbl_login` WHERE email_id='$log'";
    $q1=mysqli_query($con,$z);
    $s=mysqli_fetch_array($q1);
    $v=$s['login_id']; ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Give Feedback 

        <small>User Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Feedback</li>
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

            <div><center>
                                     
                <!-- Add icon library -->
<?php
   $f=$_GET['id'];
   $z="SELECT c_id FROM complaint WHERE track_id='$f'";
   $sk=mysqli_query($con,$z);
   $zk=mysqli_fetch_array($sk);
   $o=$zk['c_id'];
  if(isset($_GET['id']))
  {
           
           
              $l="SELECT * FROM complaint WHERE track_id='$f'";
              $cd=mysqli_query($con,$l);
              $sx=mysqli_fetch_array($cd);
              $zx=$sx['staff_person'];
              $ed=$sx['c_id'];

              $e="SELECT * FROM manage_complaint WHERE c_id='$ed'";
              $qw=mysqli_query($con,$e);
              $ql=mysqli_fetch_array($qw);
  $var1 = $ql['work_status'];
$var2='Finished';
//echo $var1;
$sk="SELECT status FROM manage_complaint WHERE c_id='$o'";
$sh=mysqli_query($con,$sk);
$oj=mysqli_fetch_array($sh);
$sta=$oj['status'];
if($sta==1)
{
  echo "<font style='color:green;font-size:20px'>Already Rated </font><br/><font style='color:blue;font-size:15px'>Thank you so much</font>";
}
if($var1==$var2 && $sta==0)
{
?>                
  <form method="POST">
   <!--<label>Min star:</label><input type=text name="minstar" value="">
   <label>Max star:</label>
    <input type="text" name="maxstar" value="">-->
    <label>Rating</label>
    <!--<input type="text" name="rating" value="">-->
    <select name="rating">
      <option value="0">0</option>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
    </select>
    <input type="submit" name="button" value="submit">
  </form>  
<?php
if($_POST['button']){
  //$cfg_min_stars = $_POST['minstar']; //min star
  //$cfg_max_stars = $_POST['maxstar']; //max star
  $temp_stars = $_POST['rating'];
  $x="INSERT INTO rating(login_id,star,staff,track_id,c_id) VALUES($v,'$temp_stars','$zx','$f','$o')";
  $q=mysqli_query($con,$x);
  $zs="UPDATE manage_complaint SET status='1' WHERE c_id='$o'";
  $sd=mysqli_query($con,$zs);
  echo "<br/>";
   //average rating

  for($i=1; $i<=5; $i++) { // simple for loop
   
    if ($temp_stars >= 1) { // it going to check if your average rating is greater than equal to 1 or not if it is then it give you full star.
      echo '<img src="Star (Full).png" width="100"/>';
      $temp_stars--; //after getting full star it decremnt the value and contiune the loop.
    }else { // at last but not the least when value gets zero then it return empty star.
        echo '<img src="Star (Empty).png" width="100"/>';
      }
    }
  }
}

}
?>
    </section>
    </center>
</form>

</section>
</div>
  <?php include("footer.php"); ?>