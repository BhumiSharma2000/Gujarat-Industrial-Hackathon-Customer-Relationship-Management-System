    <?php 
    include("header.php");
    include("connection.php");
    error_reporting(E_ERROR | E_PARSE);

    ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        FeedBack
        <small>Admin Panel</small>
      </h1>
          <?php
 if(isset($_POST['b1']))
    {
      $a=$_POST['t1'];
      $q="INSERT INTO questioncrm(q_id,question,status)VALUES(DEFAULT,'$a',1)";
      $c=mysqli_query($con,$q);
      //$d=mysqli_num_rows($c);
      if($c==1)
      {
        echo"<center><font style='color:blue;font-size:15px'>insert succesfully!!</font></center>";
      }
      else
      {
          echo"insert failed";
      }
    } 
    
  ?>    

      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Add Suggestions </li>
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
              <form role="form" method="post">
                <!-- text input -->
              <label>Enter Suggestions : </label><br/>
                 <input type="text" name="t1" class="form-control" placeholder="Enter Suggestions ..." required /><br/>
                  <button type="submit" name="b1" class="btn btn-primary">Submit</button>
                </div>
          </div>  
        </form>

   
             

    <!-- /.content -->
  
  <!-- /.content-wrapper -->

  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>

</section>
</div>



      <?php
      include("footer.php");
      ?>