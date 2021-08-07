<?php include("header.php");
include("connection.php");
error_reporting(E_ERROR | E_PARSE);
    $log = $_SESSION['log'];
    $a=$_GET['tid'];
    $z="SELECT * FROM `tbl_login` WHERE email_id='$log'";
    $q1=mysqli_query($con,$z);
    $s=mysqli_fetch_array($q1);
    $v=$s['login_id']; ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Track Complaint

        <small>User Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.html"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Track Complaint</li>
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
              <form  action="track.php" method="post" role="form">
                <!-- text input -->
                <div class="form-group">
                  
				<div class="form-group">
           <label>enter your Track_Id</label>    
                <input type="text" name="trid" class="form-control" placeholder="Enter track id" value="<?php echo $a ?>">
                </div>
         
              <div class="box-footer">
               
  
              
                <input type="submit" name="submit" value="SEND" class="btn btn-primary">
              </div>

              </form>

              <?php 
              error_reporting(E_ERROR | E_PARSE);

              $var = $_GET['flag'];
              error_reporting(E_ERROR | E_PARSE);
              echo "<center><font style='color:blue; text-align:center;font-size:30px'>Your Current Complain Status is :  
              </font> <font style='color:green; text-align:center;font-size:30px'>  " .$var."</font></center><br/>";
             // echo "<center><font style='color:green; text-align:center;font-size:30px'>".$var."</font></center><br/>";
              
                       ?>
                                     <div><center>
                                      <style>.checked {
  color: orange;
}</style>
                <!-- Add icon library -->
<?php
   $f=$_GET['tr_id'];
   $z="SELECT c_id FROM complaint WHERE track_id='$f'";
   $sk=mysqli_query($con,$z);
   $zk=mysqli_fetch_array($sk);
   $o=$zk['c_id'];
      //var_dump($f);
if(isset($_GET['flag']))
{
           
           
              $l="SELECT staff_person FROM complaint WHERE track_id='$f'";
              $cd=mysqli_query($con,$l);
              $sx=mysqli_fetch_array($cd);
              $zx=$sx['staff_person'];
  $var1 = $_GET['flag'];
$var2='Finished';
//echo $var1;
$sk="SELECT status FROM manage_complaint WHERE c_id='$o'";
$sh=mysqli_query($con,$sk);
$oj=mysqli_fetch_array($sh);
$sta=$oj['status'];
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
    <input type="submit" name="button" value="button">
  </form>
  <br/>
  <br/>
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

<?php
$a="SELECT * FROM manage_complaint WHERE c_id='$o'";
$zp=mysqli_query($con,$a);
$sd=mysqli_fetch_array($zp);
$msg=$sd['message'];
$t=$sd['tdate'];
$v= $t;/*"April 31,2019 2:00 PM";*/
//echo $t;
$st=$sd['work_status'];
if($st=='Reviewing'|| $st=='Initiated' || $st=='In Progress')
{
?>
           <br/><p style=font-size:20px;><b>Will Be Solved within :</b> </p>    
            <p id="demo"></p>
            <script>
                var a="<?php echo $t; ?>";
                document.getElementById("demo").innerHTML = a;
                // Set the date we're counting down to
                var countDownDate = new Date(a).getTime();
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
                document.getElementById("demo").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";

  // If the count down is finished, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);
</script>
<?php
}
?>  
    <div class="clearfix"></div> <br/>
 <div class="row">
        <div class="col-md-12">
          <!-- The time line -->
          <ul class="timeline">
            <?php
              $count="SELECT COUNT['c_id'] FROM complaint_chat";
              while($count!=0)
              {
                ?>
             <li>
              <i class="fa fa-envelope bg-blue"></i>

              <div class="timeline-item">
                <span class="time"><i class="fa fa-clock-o"></i>12:05</span>

                <h3 class="timeline-header"><a href="#"><?php echo $abcd; ?> </a> </h3>

                <div class="timeline-body">
                    <?php echo $msg;?>
                </div>
                
              </div>
            </li>
            <li>
              <i class="fa fa-clock-o bg-gray"></i>
            </li>
            <?php
          }
          ?>
          </ul>
        </div>
      </div>
    </section>
    </center>
</form>

</section>
</div>


   <?php 
              $msg=$_POST['name'];
              $ab=$m['c_id'];
              $a=$_POST['trid'];
              $qu="SELECT c_id FROM complaint WHERE track_id='$a'";
              $query=mysqli_query($con,$qu);
              $m=mysqli_fetch_array($query);
              //echo $qu;

              $x="SELECT login_id FROM complaint WHERE c_id='$ab'";
              $m1=mysqli_query($con,$x);
              $z=mysqli_fetch_array($m1);
              $abc=$z['login_id'];

              $s="SELECT name FROM tb1_detail WHERE login_id='$abc'";
              $m2=mysqli_query($con,$s);
              $z1=mysqli_fetch_array($m2);
              $abcd=$z1['name'];

              header("location:trackcomplaint.php");
    ?>
  <?php
    if(isset($_POST['chat']))
    {
        $a=$_POST['msg'];
        $x="INSERT INTO `complaint_chat`(`c_id`, `login_id`, `message`) VALUES ('$o','$v','$a')";
        $qw=mysqli_query($con,$x);
    }
    ?>
  
  <?php include("footer.php"); ?>