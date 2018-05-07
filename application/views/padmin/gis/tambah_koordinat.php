<?php 
include "../koneksi.php";
$id_toko=$_GET['id_toko'];
$id_toko;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

<script src="jquery-1.9.1.min.js"></script>
    <script src="dist/jquery.addressPickerByGiro.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA7SEthUYg--FI-dskVJKbQU-zja6pbVeI&sensor=false&language=id"></script>

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
				  <input type="text" id="region" class="region" disabled="disabled">
				</div>
			  </div>
			  <div class="control-group">
				<label class="control-label">City</label>
				<div class="controls">
				  <input type="text" id="county" class="county" disabled="disabled" >
				</div>
			  </div>
			  
			  
			  <div class="control-group">
				<label class="control-label">Toko</label>
				<div class="controls">
				  <input type="text" id="id_toko" class="<?php echo $id_toko;?>" value="<?php echo $id_toko;?>" disabled="disabled">
				</div>
			  </div>
			  
			  <div class="control-group">
				<label class="control-label">street</label>
				<div class="controls">
				  <input type="text" id="street" class="street" disabled="disabled">
				</div>
			  </div>
			  <div class="control-group">
				<label class="control-label">street number</label>
				<div class="controls">
				  <input type="text" class="street_number" id="street_number" disabled="disabled">
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
				<div class="controls">
				  <a id="calculate" class="btn btn-success" name="calculate" >Tetapkan Lokasi Anda</a>
				</div>
			  </div>
			  
			  <div class="control-group">
				<div class="controls">				
			<table>
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
<script type="text/javascript" src="jquery-1.2.3.min.js"></script>
<style type="text/css">
#result { background-color: #F0FFED; border: 1px solid #215800; padding: 10px; width: 400px; margin-bottom: 20px; }
</style>

<script type="text/javascript">
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
        var reg = $("#region").val();
        var foradd = $("#formatted_address").val();
        var str = $("#street").val();
        var stnum = $("#street_number").val();
        var cty = $("#county").val();
        var idtoko = $("#id_toko").val();
        $.ajax({
            url: "proses_setting_koordinat.php",
            data: 'lat=' + lat + '&long=' + long + '&reg=' + reg + '&foradd=' + foradd + '&cty=' + cty + '&str=' + str + '&stnum=' + stnum + '&idtoko=' + idtoko,
            cache: false,
            dataType: 'json', 
            success: function(data){
              $('#result').html(data);
            }
        });
      	});
      	
</script>
</body>
</html>