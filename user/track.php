 <?php
  require "connection.php";
  $tid=$_POST['trid'];
  //echo $tid;
  $qry="SELECT * FROM complaint WHERE track_id=$tid";
  //echo $qry."<br>";
  $rs=mysqli_query($con,$qry);
  $row=mysqli_fetch_array($rs);
  $cid=$row['c_id'];
  //echo $cid;

$qry1="SELECT * FROM manage_complaint WHERE c_id=$cid";
  //echo $qry1."<br>";
  $rs1=mysqli_query($con,$qry1);
  $row1=mysqli_fetch_array($rs1);
  $stat=$row1['work_status'];
  header("location:trackcomplain.php?flag=$stat&tr_id=$tid&id=$cid");

  ?>