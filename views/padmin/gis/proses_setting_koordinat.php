<?php       
include "../koneksi.php";
      $idtoko = $_GET["idtoko"];
      $lat = $_GET["lat"];
      $long = $_GET["long"];
      $foradd = $_GET["foradd"];
      $str = $_GET["str"];

	  $q = mysqli_query($connect,"select * from koordinat_toko where id_toko='$idtoko'");
if (mysqli_num_rows($q) == 1) {

$cc=mysqli_query($connect,"UPDATE koordinat_toko SET street='$str',address='$foradd',latitude='$lat',longitude='$long' where id_toko='$idtoko'");

	$data="<b>Form berhasil disubmit. Berikut ini data anda:</b><br />";
	echo $data;	
}
else 
{
$dd=mysqli_query($connect,"INSERT INTO koordinat_toko (id_toko,street,address,latitude,longitude) VALUES ('$idtoko','$str','$foradd','$lat','$long')");

	$data="<b>Form berhasil disubmit. Berikut ini data anda:</b><br />";
	echo $data;	
	
} 


?>