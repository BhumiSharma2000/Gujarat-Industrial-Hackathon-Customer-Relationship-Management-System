<?php 
if(isset($_POST['submit']))
{
  $a=$_POST['sno'];
$qry="SELECT * FROM tbl_purchase WHERE serial_no='$a'";
$res=mysqli_query($con,$qry);
$row=mysqli_fetch_assoc($res);
$d=$row['bill_date'];
$date2 = date(time());
$date3=date('Y-m-d H:i:s',$date2);//current date
echo $date3=date('Y-m-d H:i:s',$date2);  
$diff = abs(strtotime($date3)-strtotime($d));  
$years = floor($diff/(365*60*60*24));
$months = floor(($diff - $years * 365*60*60*24)/(30*60*60*24));  
$days = floor(($diff - $years * 365*60*60*24 -  
             $months*30*60*60*24)/ (60*60*24)); 
$hours = floor(($diff - $years * 365*60*60*24  
       - $months*30*60*60*24 - $days*60*60*24) 
                                   / (60*60));  
$minutes = floor(($diff - $years * 365*60*60*24  
         - $months*30*60*60*24 - $days*60*60*24  
                          - $hours*60*60)/ 60);  
$seconds = floor(($diff - $years * 365*60*60*24  
         - $months*30*60*60*24 - $days*60*60*24 
                - $hours*60*60 - $minutes*60));  
echo "<br/>"; 
printf("%d years, %d months, %d days, %d hours, "
     . "%d minutes, %d seconds", $years, $months, 
             $days, $hours, $minutes, $seconds);  
}
?> 
