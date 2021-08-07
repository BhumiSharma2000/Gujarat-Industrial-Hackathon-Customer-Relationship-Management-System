    <?php 
    include("header.php");
    include("connection.php");
    error_reporting(E_ERROR | E_PARSE);

    ?>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
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
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
    Complain Chat
        <small>Staff Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Chat </li>
      </ol>
    </section>
  
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <!-- Main row -->
      <div class="row">
    
    <div class="box box-warning">
            <div class="box-header with-border">
            </div>     <?php
        ?>

            <!-- /.box-header -->
            <div class="box-body">
              <form role="form" method="post" action="insertchat.php" >
                <!-- text input -->
                <input type="hidden" name="cid" value="<?php echo $a ?>"/>
                   <label>Enter msg</label>
                 <input type="text" name="msg" class="form-control" placeholder="Enter Message ..." required /><br/>
                  <button type="submit" name="submit" class="btn btn-primary">Go!</button>
                </div>
          </div>  
        </form>
              <?php
              $ab=$_GET['id'];
                    //echo $ab;
                session_start();
          $_SESSION['cid'] =$ab;
          ?>
        <?php

                    
                        session_start();

     $a = $_SESSION['cid'];


            $k="SELECT * FROM complaint_chat WHERE c_id='$ab' ORDER BY timestamp DESC  ";
            //var_dump($k);
            $az=mysqli_query($con,$k);
            while($za=mysqli_fetch_array($az))
            {  
              $a=$za['login_id'];
              $t=$za['timestamp'];
              $ol="SELECT * FROM `tbl_detail` WHERE login_id='$a'";
              //var_dump($ol);
              $qw=mysqli_query($con,$ol);
              $kj=mysqli_fetch_array($qw);
              //var_dump($kj);
              $login=$kj['name'];
             // echo $login;
              $fd="SELECT type FROM tbl_login WHERE login_id='$a'";
              $fl=mysqli_query($con,$fd);
              $kp=mysqli_fetch_array($fl);
              $a=$kp['type'];
              //echo $a;
              if($a=='2')
              {
          ?>
           <ul class="timeline">
 <li>
              <i class="fa fa-envelope bg-blue"></i>

              <div class="timeline-item">
                <span class="time"><i class="fa fa-clock-o"></i><?php echo $t; ?></span>

                <h3 class="timeline-header"style="background-color:lightblue " ><a href="#"><?php echo $login; ?></a> </h3>

                <div class="timeline-body" style="font-size:25px;">
<?php echo $za['message']; ?>
                </div>
                
              </div>
            </li>
          </ul>
            <?php
          }
          else
          {
          ?>
           <ul class="timeline">
 <li>
              <i class="fa fa-envelope bg-blue"></i>

              <div class="timeline-item">
                <span class="time"><i class="fa fa-clock-o"></i><?php echo $t; ?></span>

                <h3 class="timeline-header" style="background-color:lightgray "><a href="#"><?php echo $login; ?></a> </h3>

                <div class="timeline-body" style="font-size:25px; ">
<?php echo $za['message']; ?>
                </div>
                
              </div>
            </li>
          </ul>     
      <!-- /.row (main row) -->
<?php
}
}

?>
    </section>

    <!-- /.content -->
  
  <!-- /.content-wrapper -->

  <!-- Add the sidebar's background. This div must be placed

      <?php
      include("footer.php");
      ?>