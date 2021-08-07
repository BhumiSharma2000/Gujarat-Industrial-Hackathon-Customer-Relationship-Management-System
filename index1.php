<?php
  include "connection.php";
?>
<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <script type="text/javascript" src="qrcode.js">
</script>
    <script type="text/javascript" src="html5-qrcode.js">
</script>
    <style type="text/css" media="screen">
      body { text-align:center; }
    </style>
  </head>
  <body>
    <form name="QRform" id="QRform">
      <?php
        $a="SELECT * FROM complaint WHERE c_id='150'";
        $o=mysqli_query($con,$a);
        $i=mysqli_fetch_array($o);
      ?>
      <textarea name="textField" rows="8" cols="70" onkeyup='updateQRCode(this.value)' onclick="this.focus();this.select();">complain_id: <?php echo $i['c_id']."      complain_type: ".$i['c_type']."    track_id :".$i['track_id']."      complalin_details : ".$i['complaint_details']?></textarea>
    </form>
    
    <!-- This is where our QRCode will appear in. -->
    <div id="qrcode"></div>
    
    <script type="text/javascript">
      function updateQRCode(text) {

        var element = document.getElementById("qrcode");

        var bodyElement = document.body;
        if(element.lastChild)
          element.replaceChild(showQRCode(text), element.lastChild);
        else
          element.appendChild(showQRCode(text));

      }

      updateQRCode('');
    </script>
  </body>
</html>
