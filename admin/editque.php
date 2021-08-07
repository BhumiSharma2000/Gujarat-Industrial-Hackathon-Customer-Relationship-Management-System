<?php 
include("header.php");
include("connection.php");
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Questions
        <small>Admin Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.html"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="manageque.php"><i class="fa fa-key"></i> Manage Question</a></li>
        <li class="active"> Edit Questions</li>
      </ol>
    </section>
    <?php
if(isset($_GET['id']))
  {
    $id=$_GET['id'];
  if(isset($_POST['update']))
  {
    $quee=$_POST['Que'];  
    $updated=mysqli_query($con,"UPDATE  questioncrm SET question='$quee' WHERE q_id='$id'");
    if($updated)
    { 
    error_reporting(E_ERROR | E_PARSE); 
      echo ("<script LANGUAGE='JavaScript'>
    window.alert('Succesfully Updated');
    window.location.href='manageque.php?flag=1';
    </script>");
    }
  }
  }
  if(isset($_GET['id']))
  {
    $id=$_GET['id'];
  }
  $getselect=mysqli_query($con,"SELECT * FROM  questioncrm WHERE q_id='$id'");
  //var_dump($getselect);
  while($viewdata=mysqli_fetch_array($getselect))
  {

    $question=$viewdata['question'];
  }
 ?>
    <section class="content">
       <div class="row">
	   <div class="box box-warning">
            <div class="box-header with-border">
            </div>
            <div class="box-body">
              <form method="post" role="form">
                <div class="form-group">
                  <label>Question</label>
                  <textarea class="form-control" name="Que" rows="3" required ><?php echo $question; ?></textarea>
                </div>
              <div class="box-footer">
                <input type="submit" name="update" value="Update" class="btn btn-primary">
              </div>
              </form>
            </div>
          </div>
        </div>
    </section>
  </div>
 <?php include("footer.php"); ?>