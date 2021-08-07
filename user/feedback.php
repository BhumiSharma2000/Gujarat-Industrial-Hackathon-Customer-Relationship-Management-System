<?php include("header.php");
include("connection.php");
error_reporting(E_ERROR | E_PARSE);
    $log = $_SESSION['log'];
    $z="SELECT * FROM `tbl_login` WHERE email_id='$log'";
    $q1=mysqli_query($con,$z);
    $s=mysqli_fetch_array($q1);
    $v=$s['login_id']; 
    $o=$_GET['cid'];?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Give Feedback 

        <small>User Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.html"><i class="fa fa-home"></i> Home</a></li>
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
              <?php
                 $e="SELECT * FROM manage_complaint WHERE c_id='$o'";
              $qw=mysqli_query($con,$e);
              $ql=mysqli_fetch_array($qw);
  $var1 = $ql['work_status'];
$var2='Finished';
//echo $var1;
$sk="SELECT status1 FROM manage_complaint WHERE c_id='$o'";
$sh=mysqli_query($con,$sk);
$oj=mysqli_fetch_array($sh);
$sta=$oj['status1'];
if($sta==1)
{
  echo "<font style='color:green;font-size:20px'>Already Feedbacked </font><br/><font style='color:blue;font-size:15px'>Thank you so much</font>";
}
if($var1==$var2 && $sta==0)
{
?>                    
  <form method="POST" action="">
Suggestions : 
<select name="ans" id="ans">

<option value="pick">---Select Suggestion--</option>
<?php
include("connection.php");
$q="SELECT question  FROM questioncrm";
      $c=mysqli_query($con,$q);
      $d=mysqli_num_rows($c);
      while($d=mysqli_fetch_array($c))
      {
        $m=$d['question'];
      echo"<option value='".$m."'>".$m."</option>";
      
      //echo $x;
      }
?>
    </select>
  <br/><br/>
  Comments : <input type="text" name="t1" id="t1" placeholder="Yes/no" /><br/>
  <br/>
  <br/>
  <input type="submit" name="b1" value="submit"/>
</form>
<?php
}
?>
    <?php
  //echo $que;
    $que=$_POST['ans'];
    $qb="SELECT q_id FROM questioncrm WHERE question='$que'";
    $cb=mysqli_query($con,$qb);
    while($db=mysqli_fetch_array($cb))
    {
      $qid=$db['q_id'];
      //echo $qid;
    }
    include("connection.php");
    if(isset($_POST['b1']))
    {
      $ac=$_POST['t1'];
      $qc="INSERT INTO answercrm(a_id,q_id,answer,c_id)VALUES(DEFAULT,'$qid','$ac','$o')";
      $cc=mysqli_query($con,$qc);
      $zs="UPDATE manage_complaint SET status1='1' WHERE c_id='$o'";
      $sd=mysqli_query($con,$zs);
      //$d=mysqli_num_rows($c);
      if($cc==1)
      {
        echo"Thank you :)";
      }
      else
      {
          echo"Oops !! Something went wrong";
      }
    } 
    
  ?>    
    </section>
    </center>
</form>

</section>
</div>
  <?php include("footer.php"); ?>