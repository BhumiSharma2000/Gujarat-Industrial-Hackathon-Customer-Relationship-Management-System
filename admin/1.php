<?php include("header.php"); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Complain Analyis
        <small>Admin Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Staff Analyis</li>
      </ol>
    </section>

<?php
  $today = date('Y-m-d');
  //echo $today;
  $countvadmin = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(c_id) FROM `complaint` WHERE DATE(timestamp) = '$today'"));
  //echo $countvadmin[0];
  $countaadmin = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(c_id) FROM `complaint` WHERE DATE(timestamp) = '$today' AND status='1'"));
  $countkadmin = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(c_id) FROM `complaint` WHERE DATE(timestamp) = '$today' AND status='0' AND staff_person!='0'"));
 // $k="SELECT COUNT(c_id) FROM `complaint` WHERE DATE(timestamp) = '$today' AND status='0' AND staff_person!='0'";
  //echo $k;



?>

    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-gray">
            <div class="inner">
              <h3>Complain
              </h3>

              <p>Complain Details</p>
            </div>
            <div class="icon">
              <i class="ion ion-user"></i>
            </div>
          </div>
        </div>
        <!--<div class="col-lg-3 col-xs-6">
          
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $count[0];  ?></h3>

              <p>Total Staff</p>
            </div>
            <div class="icon">
              <i class="ion ion-user"></i>
            </div>
          </div>
        </div>-->
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo $countvadmin[0]; ?></h3>

              <p>Total Complain Registered Today</p>
            </div>
            <div class="icon">
              <i class="ion ion-user"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo $countaadmin[0]; ?></h3>

              <p>Total Complain Finished Today</p>
            </div>
            <div class="icon">
              <i class="ion ion-user"></i>
            </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo $countkadmin[0]; ?></h3>

              <p>Total Complain in Progress Today</p>
            </div>
            <div class="icon">
              <i class="ion ion-user"></i>
            </div>
              </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        </div>
      <!-- /.row (main row) -->

    </section>
               <?php
 
$dataPoints = array();
//Best practice is to create a separate file for handling connection to database
try{
     // Creating a new connection.
    // Replace your-hostname, your-db, your-username, your-password according to your database
    $link = new \PDO(   'mysql:host=localhost;dbname=adminxyz;charset=utf8mb4', //'mysql:host=localhost;dbname=canvasjs_db;charset=utf8mb4',
                        'root', //'root',
                        '', //'',
                        array(
                            \PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                            \PDO::ATTR_PERSISTENT => false
                        )
                    );
  
    $handle = $link->prepare('SELECT c_id,star FROM rating'); 
    $handle->execute(); 
    $result = $handle->fetchAll(\PDO::FETCH_OBJ);
    
    foreach($result as $row){
        array_push($dataPoints, array("x"=> $row->c_id, "y"=> $row->star));
    }
  $link = null;
}
catch(\PDOException $ex){
    print($ex->getMessage());
}
  
?><!--<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
  animationEnabled: true,
  exportEnabled: true,
  theme: "light1", // "light1", "light2", "dark1", "dark2"
  title:{
    text: "CRMS RATING"
  },
  axisY: {
    title: "Stars",
    includeZero: false
  },
    axisX: {
    title: "Complain_id",
    includeZero: false
  },
  data: [{
    type: "column", //change type to bar, line, area, pie, etc  
    dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
  }]
});
chart.render();
 
}
</script>
<div id="chartContainer" style="height: 300px; width: 80%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
  </div>-->
</div>
  
 
  <!-- /.content-wrapper -->
  <?php include("footer.php"); ?> 
  