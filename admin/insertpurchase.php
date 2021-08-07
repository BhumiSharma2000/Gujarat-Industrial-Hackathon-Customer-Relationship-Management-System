<?php
include("connection.php");
session_start();
	if(isset($_POST['submit']))
	{
	 $name=$_POST['bname'];
	 $gstno=$_POST['gstno'];
	 $email=$_POST['email'];
	 $phone=$_POST['phone'];
	 $product=$_POST['product'];
	 $quantity=$_POST['quantity'];
	 $slab=$_POST['slab'];
	 $passx=rand(0000,1111);
	 $pass=md5('$passx');
	 $billno=rand(1111111111,0000000000);
	 $i=1;
	 $ql="SELECT warranty FROM `tbl_product` WHERE  product_id='$product'";
	 echo $ql;
	 $qo=mysqli_query($con,$ql);
	 $kj=mysqli_fetch_array($qo);
	 $w=$kj['warranty'];
	 echo $w;
	 while($i<=$quantity)
	 {
		$query = "SELECT product_price FROM tbl_product WHERE product_id='$product'";
		echo $query;
		$ans = mysqli_query($con,$query);
		$row = mysqli_fetch_array($ans);
		$price = $row['product_price'];
		$total=$price*$quantity;
		
		$newtotal = ($slab / 100) * $total;
		$ntotal=$total+$newtotal;
		
		//$log = $_SESSION['log'];

		$sql = "SELECT login_id FROM tbl_login WHERE email_id='$email'";
		$result = mysqli_query($con,$sql);
		$value = mysqli_fetch_array($result);
		$v1=mysqli_num_rows($result);
		$id = $value['login_id'];
		echo $id;
		$i+=1;
		
		
	 $query="INSERT INTO tbl_purchase(purchase_id,product_id,login_id,buyer_name,buyer_gstno,price,quantity,gst_slab,bill_total,bill_date,bill_no,purchase_status,warranty) VALUES ('','$product','$id','$name','$gstno','$price','$quantity','$slab','$ntotal',CURRENT_TIMESTAMP(),'$billno','1','$w')";
	
	 $execute=mysqli_query($con,$query);
	 if($execute)
	 {
		header("location:addpurchase.php?flag=1&billno='$billno'");		
	 }
	 else
	 {
		echo "Data Not Inserted.!!!?flag=0";
	 }
	}
}
	if($v1==0)
		{
		
		$q1="INSERT INTO tbl_login(login_id,email_id,phone_no,password,status,type,active) VALUES('','$email','$phone','$pass','0','2','1')";
			$a1=mysqli_query($con,$q1);
			$sqlx = "SELECT MAX(login_id) AS lid FROM tbl_login";
			$resultx = mysqli_query($con,$sqlx);
			$valuex = mysqli_fetch_array($resultx);
			$id = $valuex['lid'];

			require_once 'PHPMailer-master/src/PHPMailer.php';
  		  require_once 'PHPMailer-master/src/Exception.php';
  		  require_once 'PHPMailer-master/src/SMTP.php';
		  $to=$email;
		  $subject="CRMS Login Details";
		  $msg="Hello, Our Your Email id  is ".$email." <br/>phone number is".$phone." and <br/> password is : ".$passx."<br/> Change your Password After Login ";

		  $mail = new PHPMailer\PHPMailer\PHPMailer(true);                      // Passing `true` enables exceptions

    //Server settings
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'bhumit0111@gmail.com';                 // SMTP username
    $mail->Password = 'CRMS@123';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('bhumit0111@gmail.com');

    $mail->addAddress($to);

     $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $msg;

    if(!$mail->send()) 
    {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
	}


		
		}
	
?>