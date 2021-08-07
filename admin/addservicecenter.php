<?php include("header.php"); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Service Centers
        <small>Admin Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Add Service center</li>
      </ol>

            <?php
        if(isset($_GET['flag'])){
        if($_GET['flag']==1)
          {
            echo "<center><font style='color:green; text-align:center'>Service Center  Added Successfully</font></center><br/>";
          
          }
        }

      ?>  
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
       <div class="row">
	   <div class="box box-warning">
            <div class="box-header with-border">
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form" method="POST" action="insertservice.php" enctype="multipart/form-data" >
                <!-- text input -->
                <!--<div class="form-group">
                  <label>City name</label>
                  <input type="text" name="city" class="form-control" placeholder="Enter  city name ..." required />
                </div>
				<div class="form-group">
                  <label>Area name</label>
                  <input type="text" name="area" class="form-control" placeholder="Enter area name" required />
                </div>-->
<div class="form-group">
    <label for="address">Address:  <div class="tooltip">?<span class="tooltiptext">Connect Address with app</span></div></label>
    <input name="address" id="autocomplete" placeholder="Enter your address" onfocus="geolocate()" value="" type="text" autocomplete="off" size="151" required><br/><br/>
    <input type="hidden" id="lat" name="lat" value="" />
    <input type="hidden" id="long" name="long" value="" />
     <label for="Mobile">Mobile:&nbsp;&nbsp;<div class="tooltip">?<span class="tooltiptext"></span></div></label>
    <input type="text" name="mobile" size="151" placeholder="Enter your Number"/>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC96m1QCMXwfjaBie9X-iJB8zBnfqffahg&libraries=places&callback=initAutocomplete" async defer></script>
<script>
    <?php 
error_reporting(E_PARSE | E_ERROR);
    ?>
        jQuery(document).ready(function () {
            jQuery('#autocomplete').on('focus', function () {
                $("#lat").val("");
                $("#long").val("");
            });
        });
        var placeSearch, autocomplete;
        function initAutocomplete() {
            autocomplete = new google.maps.places.Autocomplete(
                    document.getElementById('autocomplete'), {types: ['geocode']});

            //autocomplete.setFields('address_components');
            autocomplete.addListener('place_changed', fillInAddress);
        }

        function fillInAddress() {
            var place = autocomplete.getPlace();
            var lat = place.geometry.location.lat();
            var long = place.geometry.location.lng();
            $('#lat').val(lat);
            $('#long').val(long);

        }
        function geolocate() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function (position) {
                    var geolocation = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };


                    var circle = new google.maps.Circle(
                            {center: geolocation, radius: position.coords.accuracy});
                    autocomplete.setBounds(circle.getBounds());
                });
            }
        }
</script>
<?php
?>
								
              <div class="box-footer" style="float:right;">
                <input type="submit" name="submit" value="ADD" class="btn btn-primary">
              </div>
			  
              </form>
			 
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  
 
  <!-- /.content-wrapper -->
  <?php include("footer.php"); ?> 