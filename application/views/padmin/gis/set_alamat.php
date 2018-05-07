<?php 
include "../koneksi.php";
$id_cart=$_GET['id_cart'];

$ca=mysqli_query($connect,"SELECT * FROM cart_list where id_cart='$id_cart'");
$ga=mysqli_fetch_array($ca);
$id_toko=$ga['id_toko'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

<!--        <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>-->
<script src="jquery-1.9.1.min.js"></script>
    <script src="dist/jquery.addressPickerByGiro.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA7SEthUYg--FI-dskVJKbQU-zja6pbVeI&sensor=false&language=id"></script>

    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA7SEthUYg--FI-dskVJKbQU-zja6pbVeI&sensor=false&language=id"></script> 
    <script src="googleapsmapid.js"></script>-->

    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="dist/jquery.addressPickerByGiro.css" rel="stylesheet" media="screen">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }
      .map {
        height: 300px;
      }
      .map img {
        max-width: none;
      }
      @media (max-width: 767px) {
        .affix {
          position: static;
        }
      }
      @media (min-width: 768px) and (max-width: 979px) {
        .form-horizontal .control-label {
          width: 80px;
        }
        .form-horizontal .controls {
          margin-left: 100px;
        }
      }
	  
	.typeahead.dropdown-menu {
		z-index: 1002;
	}
	
	/* fix gmap */
	.gm-style img {
		max-width: none;
	}
    </style>
</head>
<body>
    <div class="container-fluid">
      <div class="row-fluid">
        <div class="row-fluid">
			
			<form autocomplete="off" class="form-horizontal">
			<div class="row-fluid">
			  <div class="span12">
				<div class="row-fluid">
					<label class="control-label" for="inputAddress">Address</label>
					<div class="controls">
					  <input type="text" class="inputAddress input-xxlarge" value="Palembang, Palembang City, South Sumatra, Indonesia" autocomplete="off" placeholder="Type in your address">
					</div>
				</div>			  

			  <div class="control-group">
				<label class="control-label">Formatted address</label>
				<div class="controls">
				  <input type="text" id="formatted_address" class="formatted_address input-xxlarge" disabled="disabled">
				</div>
			</div>
			
			  <div class="control-group">
				<label class="control-label">Region</label>
				<div class="controls">
				  <input type="text" class="region" disabled="disabled">
				</div>
			  </div>
			  <div class="control-group">
				<label class="control-label">City</label>
				<div class="controls">
				  <input type="text" class="county" disabled="disabled">
				  <input type="hidden" id="id_toko" class="<?php echo $id_toko;?>" value="<?php echo $id_toko;?>" disabled="disabled">
				  <input type="hidden" id="id_cart" class="<?php echo $id_cart;?>" value="<?php echo $id_cart;?>" disabled="disabled">
				</div>
			  </div>
			  <div class="control-group">
				<label class="control-label">street</label>
				<div class="controls">
				  <input type="text" class="street" disabled="disabled">
				</div>
			  </div>
			  <div class="control-group">
				<label class="control-label">street number</label>
				<div class="controls">
				  <input type="text" class="street_number" disabled="disabled">
				</div>
			  </div>
			  <div class="control-group">
				<label class="control-label">Latitude</label>
				<div class="controls">
				  <input type="text" class="latitude" id="latitude" disabled="disabled">
				</div>
			  </div>
			  <div class="control-group">
				<label class="control-label">Longitude</label>
				<div class="controls">
				  <input type="text" class="longitude" id="longitude" disabled="disabled">
				</div>
			  </div>
			  
			  <div class="control-group">
				<label class="control-label">Cek Ongkos Kirim</label>
				<div class="controls">
				  <a id="calculate" class="btn btn-success" name="calculate" >Calculate Shipping</a>
				</div>
			  </div>
			  
			  <div class="control-group">
				<label class="control-label">Hasil Perhitungan Ongkos Kirim</label>
				<div class="controls">				
			<table>
			<tr>
                    		<td class="th border">Jarak Kirim </td>
                    		<td class="align-r border" id="distance"> KM</td>
                  	</tr>	  
                  	<tr>
                    		<td class="th border">Ongkos Kirim </td>
                    		<td class="align-r border" id="shipping_c"></td>
                  	</tr>
					
					<tr>
<div id="loading" style="display:none;"><img src="loading.gif" alt="loading..." /></div>
<div id="result" style="display:none;"></div>
                  	</tr>
                  	</table>
				</div>
			  </div>

			  </div>
			</div>
			</form>
          </div><!--/span-->
        <script>
            $('.inputAddress').addressPickerByGiro({
				distanceWidget: true,
                boundElements: {
                    'region': '.region',
                    'county': '.county',
                    'street': '.street',
                    'street_number': '.street_number',
                    'latitude': '.latitude',
                    'longitude': '.longitude',
                    'formatted_address': '.formatted_address'
                }
            });
        </script>
        </div><!--/span-->
      </div><!--/row-->
    </div><!--/.fluid-container-->
<script>
	$().ajaxStart(function() {
		$('#loading').show();
		$('#result').hide();
	}).ajaxStop(function() {
		$('#loading').hide();
		$('#result').fadeIn('slow');
	});
	
      	$("#calculate").click(function(){
        var lat = $("#latitude").val();
        var long = $("#longitude").val();
        var idtoko = $("#id_toko").val();
        var foradd = $("#formatted_address").val();
        var idcart = $("#id_cart").val();
        $.ajax({
            url: "proses_set_alamat.php",
            data: 'lat=' + lat + '&long=' + long + '&idtoko=' + idtoko + '&foradd=' + foradd + '&idcart=' + idcart,
            cache: false,
            dataType: 'json', 
            success: function(data){
              var d = data.distance;
              var s = data.shipping;
              $("#shipping_c").html(s);
              $("#distance").html(d);
              $('#result').html(data);
            }
        });
      	});
      	
</script>
</body>
</html>