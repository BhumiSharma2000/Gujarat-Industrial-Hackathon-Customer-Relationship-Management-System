<?php
include "connection.php";
include "header.php";
$lo=$_GET['id'];
?>
<html>
<head>
</head>
<body>
	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Generate QR code

        <small>User Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.html"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Geneate QR code</li>
      </ol>
    </section>
    <section class="content">
    	<div class="row">
    		   <div class="box box-warning">
    		   	            <center>
            <div class="box-header with-border">
            	<font style="color:blue;font-size:20px;">Show this QR code to the Service Person
            </div>

    		<?php
		$a="SELECT * FROM complaint WHERE c_id=$lo";
		$qw=mysqli_query($con,$a);
		$we=mysqli_fetch_array($qw);
		$o=$we['c_id'];
		$p=$we['c_type'];
		$w=$we['login_id'];
		$l=$we['complaint_details'];
		include("qr/qrlib.php");
		QRcode::png("complain id: ".$o."\n\nComplaint type: ".$p."\n\nlogin_id : ".$w. "\n\nComplain : ".$l,"5.png","H","2","2");
	?>
	<img src="5.png"/>
</center>
    	</div>
    </div>
    </section>
</div>
</body>
<?php
include "footer.php";
?>
</html>
