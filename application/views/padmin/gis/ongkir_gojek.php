<?php  
include "../koneksi.php";
      $idtoko = $_GET["idtoko"];   

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

$data = array();
$data['distance'] = "<strong>".$km." KM</strong>";
$data['shipping'] = "<strong>&nbsp;Rp.".$ongkir."</strong>";

echo json_encode($data);
exit();


?>