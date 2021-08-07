<?php include("header.php"); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Staff Analyis
        <small>Admin Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Staff Analyis</li>
      </ol>
    </section>


    <section class="content">
       <div class="row">
      <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Staff Analysis</h3>
            </div>
        <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>Sr No</th>
          <th>Staff Name</th>
          <th>Average Rating</th>
        </tr>
             
                <?php
                    include("connection.php");
                    $q="SELECT tbl_detail.name,AVG(rating.star) FROM tbl_detail JOIN rating ON tbl_detail.login_id=rating.staff GROUP BY tbl_detail.name";
                    $a=mysqli_query($con,$q);
                     $i=1;
                    while($c=mysqli_fetch_array($a) )
                    {

                 ?>
 <tr>
                <td><?php echo $i;?></td>
                <td>
                 <?php 
                  echo $c['name'];
                  ?>

                </td>
                <td><?php echo $c['AVG(rating.star)'];?></td>
              </tr>
              <?php
            $i++;}
            ?>
        
              </table>
			
                

               
                
					
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
  