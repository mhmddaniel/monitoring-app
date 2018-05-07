<?php  
include "../koneksi.php";
      $idcart = $_GET["idcart"];   
      $foradd = $_GET["foradd"];

	  

$ca=mysqli_query($connect,"SELECT * FROM cart_list where id_cart='$idcart'");
$ga=mysqli_fetch_array($ca);
$idtoko=$ga['id_toko'];
	  
$query=mysqli_query($connect,"SELECT * FROM koordinat_toko where id_toko='$idtoko'");	  
$cc=mysqli_fetch_array($query);

      $lat = $_GET["lat"];
      $long = $_GET["long"];
      $lat2 = $cc['latitude'];
      $long2 =$cc['longitude'];
      
      $latFrom = deg2rad($lat2);
      $lonFrom = deg2rad($long2);
      $latTo = deg2rad($lat);
      $lonTo = deg2rad($long);
      
      $lonDelta = $lonTo - $lonFrom;
      $a = pow(cos($latTo) * sin($lonDelta), 2) + pow(cos($latFrom) * sin($latTo) - sin($latFrom) * cos($latTo) * cos($lonDelta), 2);
      $b = sin($latFrom) * sin($latTo) + cos($latFrom) * cos($latTo) * cos($lonDelta);
      
      $angle = atan2(sqrt($a), $b);
      $jarak = $angle * 6371000;
      $km = ceil($jarak / 1000);
	  
	  if ($km<=5){
		  $hakir=0;
		}
	  else if ($km>5 && $km<=10){
		  $hakir=500;
	  }
	  else {
		  $hakir=1000;
	  }
      $ongkirs = ceil($km * $hakir);
      $ongkir = number_format(ceil($km * $hakir));

mysqli_query($connect,"UPDATE cart_list SET alamat_pengiriman='$foradd',biaya_pengiriman='$ongkirs' where id_cart='$idcart'");

$data = array();
$data['distance'] = "<strong>".$km." KM</strong>";
$data['shipping'] = "<strong>&nbsp;Rp.".$ongkir."</strong>";

echo json_encode($data);
exit();


?>