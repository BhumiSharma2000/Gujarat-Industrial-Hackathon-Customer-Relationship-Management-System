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
		
       $sql1 = "SELECT profile_pic FROM tbl_detail WHERE login_id='$id'";
    $result2 = mysqli_query($con,$sql1);
    $value2 = mysqli_fetch_array($result2);
    $def =$value2['profile_pic'];

		$qry = "SELECT * FROM tbl_detail WHERE login_id='$id'";
		$result1 = mysqli_query($con,$qry);
		$value1 = mysqli_fetch_array($result1);
		
		$countusers = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(login_id) FROM tbl_login WHERE type=2"));
		$n = $value1['name'];
		$i = $value1['profile_pic'];
    $email=$value['email_id'];
		$dob = $value1['dob'];

    $countadmin = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(login_id) FROM tbl_login WHERE type=1"));

    $countvadmin = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(login_id) FROM tbl_login WHERE type=1 AND status=1"));

    $countaadmin = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(login_id) FROM tbl_login WHERE type=1 AND active=1"));

    $countvusers = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(login_id) FROM tbl_login WHERE type=2 AND status=1"));

    $countausers = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(login_id) FROM tbl_login WHERE type=2 AND active=1"));
    
    $countstaff = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(login_id) FROM tbl_login WHERE type=3"));

    $countvstaff = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(login_id) FROM tbl_login WHERE type=3 AND status=1"));

    $countastaff = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(login_id) FROM tbl_login WHERE type=3 AND active=1"));

    $qry2 = "SELECT * FROM tbl_detail WHERE login_id='$id'";
    $count1 = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(login_id) FROM complaint WHERE staff_person=0"));

    $qry3 = "SELECT * FROM tbl_detail WHERE login_id='$id'";
    $count2 = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(login_id) FROM complaint WHERE staff_person!=0 AND status=0"));

    $qry6 = "SELECT * FROM tbl_product";
    $count6 = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(product_id) FROM `tbl_product`"));


    $qry4 = "SELECT * FROM tbl_detail WHERE login_id='$id'";
    $count3 = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(login_id) FROM complaint WHERE status=1"));

    $qry5 = "SELECT * FROM tbl_purchase";
    $count7 = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(purchase_id) FROM `tbl_purchase` "));

    $qry9 = "SELECT * FROM tbl_purchase";
    $count9 = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(sc_id) FROM `tbl_servicecenter` "));



}?>		
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin  | Dashboard</title>
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
      <span class="logo-mini">AP</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">Admin Panel</span>
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
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo $i; ?>" class="img-circle" alt="User Image">

                <p>
                  <?php echo $n; ?>
                  <small><?php echo $email."<br/>".$dob; ?></small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-6 text-center">
                    <a href="changepass.php">Change Password</a>
                  </div>
                  <div class="col-xs-6 text-center">
                    <a href="editprofile.php">Edit Profile</a>
                  </div>
                  
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
               
                <div class="pull-left">
                  <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
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
      <!-- search form -->
     
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="">
          <a href="dashboard.php">
            <i class="fa fa-home"></i> <span>Dashboard</span>
          </a>
         
        </li>
       
       
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i>
            <span>Users</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="adduser.php"><i class="fa fa-user-plus"></i>Add User</a></li>
            <li><a href="manageusers.php"><i class="fa fa-key"></i>Manage User</a></li>
           
          </ul>
        </li>
                <li class="treeview">
          <a href="#">
            <i class="fa fa-user-secret"></i>
            <span>Admins</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="addadmin.php"><i class="fa fa fa-user-plus"></i>Add Admin</a></li>
            <li><a href="manageadmin.php"><i class="fa fa-key"></i>Manage Admin</a></li>
           
          </ul>
        </li>
                <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Staff Members</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="addstaff.php"><i class="fa fa-user-plus"></i>Add Staff</a></li>
            <li><a href="managestaff.php"><i class="fa fa-key"></i>Manage Staff</a></li>
            <li><a href="viewstaff.php"><i class="fa fa-tv"></i>View Staff</a></li>
           
          </ul>
        </li>
		 <li class="treeview">
          <a href="#">
            <i class="fa fa-rupee"></i>
            <span>Purchases</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="addpurchase.php"><i class="fa fa-plus"></i>Add Purchase</a></li>
            <li><a href="managepurchase.php"><i class="fa fa-key"></i>Manage Purchase</a></li>
           
          </ul>
        </li>
      <li class="treeview">
          <a href="#">
            <i class="fa fa-shopping-cart"></i>
            <span>Products</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="addproduct.php"><i class="fa fa-cart-plus"></i>Add Product</a></li>
            <li><a href="manageproduct.php"><i class="fa fa-key"></i>Manage Product</a></li>
           
          </ul>
        </li>
                <li class="treeview">
          <a href="#">
            <i class="fa fa-map-marker"></i>
            <span>Service Centers</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="addservicecenter.php"><i class="fa fa-map-pin"></i>Add Service Center</a></li>
            <li><a href="manageservicecenter.php"><i class="fa fa-key"></i>Manage Service Center</a></li>
           
          </ul>
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
            <li><a href="addcomplaint.php"><i class="fa fa-plus-square-o"></i>Add Complaint</a></li>
            <li><a href="newcomplaint.php"><i class="fa fa-bell"></i>New Complaint</a></li>
			<li><a href="managecomplaint.php"><i class="fa fa-key"></i>Manage Complaint</a></li>
			<li><a href="finishcomplaint.php"><i class="fa fa-check-circle"></i>Finished Complaint</a></li>
           
          </ul>
        </li>
            <li class="treeview">
          <a href="#">
            <i class="fa fa-registered"></i>
            <span>Rating</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="viewrating.php"><i class="fa fa-tv"></i>View Rating</a></li>

          </ul>
        </li>
		<li class="treeview">
          <a href="#">
            <i class="fa  fa-book"></i>
            <span>Manage Feedback</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="addque.php"><i class="fa  fa-question"></i>Add Feedback Suggestions</a></li>
            <li><a href="manageque.php"><i class="fa fa-key"></i>Manage Feedback Suggestions</a></li>
            <li><a href="viewans.php"><i class="fa fa-tv"></i>View Feedbacks</a></li>

          </ul>
        </li>
            <li class="treeview">
          <a href="#">
            <i class="fa  fa-area-chart"></i>
            <span>Analysis</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="canalysis.php"><i class="fa fa-bar-chart-o (alias)"></i>Staff Analysis</a></li>
            <li><a href="1.php"><i class="fa fa-bar-chart-o (alias)"></i>Regular Analysis</a></li>

          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-pencil-square-o"></i>
            <span>Add New Complain</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="addmin.php"><i class="fa fa-plus-square-o"></i>Add Complain</a></li>

          </ul>
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
    <!-- /.sidebar -->
  </aside>
 