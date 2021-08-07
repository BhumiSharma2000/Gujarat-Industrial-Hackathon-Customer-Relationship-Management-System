<?php
	include("connection.php");
?>

<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Map Of India</title>
    <style type="text/css">
      #map {
        height: 60%;
        width:50%;
      }
      html, body {
        height: 100%;
      }
   }
    </style>
  </head>
  <body>
    <div id="map"></div>
  <?php
        $a="SELECT * FROM `tbl_servicecenter`";
        $v=mysqli_query($con,$a);
        while($df=mysqli_fetch_array($v))
        {
        echo $df["latitude"]."<br/>".$df["longtitude"]."<br/>";
      ?>
          <script>
           
      var citymap = {
        Ahmedabad: {
          center: {lat:<?php echo $df["latitude"];?>, lng: <?php echo $df["longtitude"]; ?>},
          name:'AHMEDABAD BRANCH'
        }
      };
    </script>
        <?php
      
  }
  ?>
    <script>
      function initMap() {
        // Create the map.
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 7,
          center: {lat: 22.2587, lng: 71.1924},
          mapTypeId: 'terrain'
        });
        for (var city in citymap) {
                  var marker = new google.maps.Marker({
                    map: map,
                       draggable: true,
                    center: citymap[city].center,
                    animation: google.maps.Animation.DROP,
                    position: citymap[city].center,         
                    label: {
                      color: 'magneta', // <= HERE
                      fontSize: '15px',
                      fontWeight: '850',
                      text: citymap[city].name
                    }
                  });
                }
           }
    </script>
          

                    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC96m1QCMXwfjaBie9X-iJB8zBnfqffahg&callback=initMap">
    </script>

  </body>
</html>
