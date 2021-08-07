<?php

	include "connection.php";
	
	session_start();
	
	if(!isset($_SESSION['log']))
	{
		header("location:index.php");
	}
	
	else
	{
		$log = $_SESSION['log'];
		
		$sql = "SELECT * FROM tbl_login WHERE email_id='$log'";
		$result = mysqli_query($con,$sql);
		$value = mysqli_fetch_array($result);
		
		$id = $value['login_id'];
        $email=$value['email_id'];
		
		$qry = "SELECT * FROM tbl_detail WHERE login_id='$id'";
		$result1 = mysqli_query($con,$qry);
		$value1 = mysqli_fetch_array($result1);
		
		$count = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(login_id) FROM tbl_login WHERE type=2 AND active=1"));
		$n = $value1['name'];
		$i = $value1['profile_pic'];

		$dob = $value1['dob'];

    $qry1 = "SELECT * FROM complaint WHERE login_id='$id'";
    $result2 = mysqli_query($con,$qry);
    $value2 = mysqli_fetch_array($result2);
    
    $complain = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(c_id) FROM complaint WHERE login_id='$id'"));

     $qry2 = "SELECT * FROM tb1_purchase WHERE login_id='$id'";
    $result3 = mysqli_query($con,$qry);
    $value3 = mysqli_fetch_array($result3);
    
    $purchase = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(purchase_id) FROM `tbl_purchase` WHERE login_id='$id'"));

    $qry3 = "SELECT * FROM complaint WHERE status==1 AND staff_person!=0 AND login_id='$id'";
    $result4 = mysqli_query($con,$qry);
    $value4 = mysqli_fetch_array($result4);
    
    $finish = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(login_id) FROM complaint WHERE status=1 AND staff_person!=0 AND login_id='$id'"));

    $as="SELECT * FROM tb1_servicecenter WHERE status!=0";
    $qr=mysqli_query($con,$as);
    $service = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(sc_id) FROM `tbl_servicecenter` WHERE status!=0"));
}?>		
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>User | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <style>
	#myDiv {
	border: 2px solid lightgray;
	height:210px;
	width:210px;
	float: left;
	}
	</style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="dashboard.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">UP</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">User Panel</span>
    </a>
		
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
           <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
			
              <img src="<?php echo $i; ?>" class="user-image" alt="User Image">
              <span class="hidden-xs"> <?php echo $n; ?> </span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-header">
                <img src="<?php echo $i; ?>" class="img-circle" alt="User Image">

                <p>
                  <?php echo $n; ?>
                  <small><?php echo $email."<br/>".$dob; ?></small>
                </p>
              </li>
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-6 text-center">
                    <a href="changepass.php">Change Password</a>
                  </div>
                  <div class="col-xs-6 text-center">
                    <a href="editprofile.php">Edit Profile</a>
                  </div>
                  
                </div>
              </li>
              <li class="user-footer">
               
                <div class="pull-left">
                  <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <aside class="main-sidebar">
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo $i; ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $n; ?></p>
          </div>
      </div>
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="">
          <a href="dashboard.php">
            <i class="fa fa-home"></i> <span>Dashboard</span>
          </a>
         
        </li>
		<li class="treeview">
          <a href="#">
            <i class="fa fa-pencil-square-o"></i>
            <span>Complain Box</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="addbillno.php"><i class="fa fa-plus-square-o"></i>Add Complaint</a></li>
          </ul>
    </li>
    <li class="treeview">
          <a href="#">
            <i class="fa  fa-list"></i>
            <span>Show Complaint</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <!--<li><a href="trackcomplain.php"><i class="fa  fa-hourglass-2"></i> Track Complaint</a></li>-->
             <li><a href="trackid.php"><i class="fa  fa-hourglass-2"></i> View Tracking ID's</a></li>
             <li><a href="trackid1.php"><i class="fa  fa-hourglass-2"></i> View Finished Complain</a></li>
          </ul>
      <li class="treeview">
          <a href="#">
            <i class="fa fa-rupee"></i>
            <span>Purchases</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="totalproduct.php"><i class="fa  fa-tv"></i> View Purchases</a></li>
           
          </ul>
    </li>
          <li class="treeview">
          <a href="#">
            <i class="fa fa-map-marker"></i>
            <span>Service Center</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="service.php"><i class="fa fa-tv"></i> View Service Center</a></li>
            <li><a href="service1.php"><i class="fa fa-search-plus"></i> Check Service Center</a></li>         </ul>
            <li class="treeview">
          <a href="#">
            <i class="fa  fa-book"></i>
            <span>Complain</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="complain.php"><i class="fa fa-tv"></i>View Complain</a></li>

    </li>
    
		
       </ul>
     </li>
   </li>
 </li>

    <li class="treeview">
          <a href="#">
            <i class="fa  fa-list"></i>
            <span>Claim Settlement</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="claim.php"><i class="fa  fa-hourglass-2"></i>Claim </a></li>
          </ul>
        </li>
            <li class="treeview">
          <a href="#">
            <i class="fa fa-phone"></i>
            <span>Call Center</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../callcenter/dashboard.php"><i class="fa   fa-mobile-phone"></i>Call Center</a></li>
          </ul>
        </li>
        </li>
          <li class="treeview">
          <a href="#">
            <i class="fa  fa-key"></i>
            <span>Manage Profile</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="editprofile.php"><i class="fa  fa-question"></i>Edit Profile</a></li>
            <li><a href="changepass.php"><i class="fa fa-key"></i>Change Password</a></li>

          </ul>
        </li>
          <li class="treeview">
          <a href="#">
            <i class="fa  fa-book"></i>
            <span>Manage Account</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="logout.php"><i class="fa  fa-lock"></i>Sign Out</a></li>
          </ul>
        </li>
</ul>
    </section>
  </aside>
 