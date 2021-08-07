<?php include("header.php"); 
include("connection.php");
//error_reporting(E_ERROR | E_PARSE);?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add complaint
        <small>Admin Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Add Complaint</li>
      </ol>
    </section>
<?php
if(isset($_POST['submit']))
{
    $q=$_POST['sno'];
    echo $q;
    $p="SELECT * FROM `tbl_purchase` WHERE  serial_no='$q'";
    echo $p;
    $qk=mysqli_query($con,$p);
    $count=mysqli_num_rows($qk);
    var_dump($count);
    echo $count;
    if($count!=0)
    {
           echo ("<script LANGUAGE='JavaScript'>
    window.location.href='pr.php?sno=$q';
    </script>"); 
    }
    else
    {
           echo ("<script LANGUAGE='JavaScript'>
    window.location.href='addpurchase.php';
    </script>"); 
    }
}
?>

    <section class="content">
       <div class="row">
      <div class="col-xs-12">
          <div class="box"> 
            <div class="box-header">
              <h3 class="box-title">Add complaint</h3>
        </div>
             <div class="login-box-body">
    <p class="login-box-msg"><font style=color:blue;font-size:20px>Enter Serial Number</font></p>

    <form method="post">
      <div class="form-group has-feedback">
        <input type="text" name="sno" class="form-control" placeholder="Serial Number" required />
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="row">
       <div class="col-xs-12">
          <button type="submit" name="submit" class="btn btn-success btn-block btn-flat">SUBMIT</button></br>
    </form>
  </div>
</div>

            </div>
            <!-- /.box-body -->
          </div>
          <div>
 
          </div>
          <!-- /.box -->
        </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
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
  