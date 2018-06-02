<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_padmin extends CI_Model{

	function cekadminlogin($username,$password){
		$hasil=$this->db->query("SELECT * FROM user WHERE user_username='$username' AND user_password=md5('$password')");
		return $hasil;
	}

	function get_all_proyek(){
		$this->db->select('*');
		$this->db->from('proyek a');
		$this->db->join('proyek_bagian b','a.proyek_id=b.pb_proyek_id','inner');
		$this->db->join('koordinat c','a.proyek_koordinat_id=c.koordinat_id','inner');
		$this->db->join('user d','a.proyek_user_nik=d.user_nik','inner');
		$this->db->ORDER_BY('a.proyek_id','desc');	
		$this->db->GROUP_BY ('proyek_id');
		$hsl=$this->db->get();
		return $hsl;
	}
	function get_all_proyek_by_bagian($bagian){
		$hsl=$this->db->query("SELECT * FROM proyek inner join proyek_bagian on proyek.proyek_id=proyek_bagian.pb_proyek_id inner join koordinat on proyek.proyek_koordinat_id=koordinat.koordinat_id inner join user on proyek.proyek_user_nik=user.user_nik where proyek.proyek_bidang='$bagian' AND proyek_bagian.pb_id in (select max(pb_id) from proyek_bagian group by pb_proyek_id)");
		return $hsl;
	}
	function get_chart_rt($kode){
		$hsl=$this->db->query("SELECT proyek_bagian.*,DATE_FORMAT(pb_last_update,'%d %M %Y') AS tanggal FROM proyek_bagian where pb_proyek_id='$kode' ORDER BY tanggal asc");
		return $hsl;
	}
	function get_chart_tdk($kode){
		$hsl=$this->db->query("SELECT DISTINCT proyek_bagian.*,DATE_FORMAT(pb_last_update,'%d %M %Y') AS tanggal FROM proyek_bagian,proyek where pb_proyek_id='$kode' ORDER BY tanggal asc");
		return $hsl;
	}
	function sum_sisa(){
		$hsl=$this->db->query("SELECT sum(pb_sisa_anggaran) AS sumsisa FROM proyek_bagian");
		return $hsl;
	}
	function countjum(){
		$hsl=$this->db->query("SELECT DATE_FORMAT(proyek_sech_awal, '%M') as bulan,count(DATE_FORMAT(proyek_sech_awal, '%M')) as hitung_jadwal, count(DATE_FORMAT(proyek_awal_kontrak, '%M')) AS hitung_awal  FROM proyek GROUP BY proyek_sech_awal");
		return $hsl;
	}
	function sum_sisa_by_kode($bagian){
		$hsl=$this->db->query("SELECT distinct sum(pb_sisa_anggaran) AS sumsisa,proyek_bidang FROM proyek_bagian,proyek where proyek.proyek_bidang='$bagian' && proyek_bagian.pb_proyek_id=proyek.proyek_id ");
		return $hsl;
	}
	function sum_proyek(){
		$hsl=$this->db->query("SELECT COUNT(proyek_id) AS jumproyek FROM proyek");
		return $hsl;
	}
	function sum_pagu(){
		$hsl=$this->db->query("SELECT sum(proyek_pagu) AS sumpagu FROM proyek");
		return $hsl;
	}
	function tambah_lampiran_file($proyek_id,$nfile){
		$hsl=$this->db->query("INSERT INTO file (proyek_id,file_data) values ('$proyek_id','$nfile')");
		return $hsl;
	}
	function sum_pagu_by_kode($bagian){
		$hsl=$this->db->query("SELECT sum(proyek_pagu) AS sumpagu from proyek where proyek_bidang='$bagian' ");
		return $hsl;
	}

	function sum_keluar_by_kode($bagian){
		$hsl=$this->db->query("SELECT sum(pb_ds_kontrak) as suma, sum(pb_ds_ap) as sumb FROM proyek_bagian,proyek where proyek.proyek_bidang='$bagian' && proyek_bagian.pb_proyek_id=proyek.proyek_id ");
		return $hsl;
	}
	function sum_keluar(){
		$hsl=$this->db->query("SELECT sum(pb_ds_kontrak) as suma, sum(pb_ds_ap) as sumb from proyek_bagian");
		return $hsl;
	}
	function sum_prog(){
		$hsl=$this->db->query("SELECT pb_stat_proyek,count(pb_stat_proyek) as sumprog from proyek_bagian group by pb_stat_proyek");
		return $hsl;
	}

	function sum_proyek_by_kode($bagian){
		$hsl=$this->db->query("SELECT COUNT(proyek_id) AS jumproyek,proyek_bidang FROM proyek where proyek_bidang='$bagian' ");
		return $hsl;
	}
	function sum_prog_by_kode($bagian){
		$hsl=$this->db->query("SELECT proyek_bagian.pb_proyek_id, proyek_bagian.pb_stat_proyek,
			COUNT(distinct proyek_bagian.pb_stat_proyek) as sumprog
			FROM proyek_bagian
			inner JOIN proyek ON proyek_bagian.pb_proyek_id = proyek.proyek_id 
			inner JOIN user ON proyek.proyek_user_nik = user.user_nik where proyek.proyek_bidang='$bagian'
			GROUP BY proyek_bagian.pb_stat_proyek");
		return $hsl;
	}

	function save_lampiran_foto($proyek_id,$gambar,$jenis){
		$hsl=$this->db->query("INSERT into file (proyek_id,file_data,file_jenis) VALUES ('$proyek_id','$gambar','$jenis')");
		return $hsl;
	}
	function save_lampiran_file($proyek_id,$gambar,$jenis){
		$hsl=$this->db->query("INSERT into file (proyek_id,file_data,file_jenis) VALUES ('$proyek_id','$gambar','$jenis')");
		return $hsl;
	}

	function get_all_proyek_by_user($usernik){
		$this->db->select('*');
		$this->db->from('proyek a');
		$this->db->join('proyek_bagian b','a.proyek_id=b.pb_proyek_id','inner');
		$this->db->join('koordinat c','a.proyek_koordinat_id=c.koordinat_id','inner');
		$this->db->join('user d','a.proyek_user_nik=d.user_nik','inner');
		$this->db->where('user_nik',$usernik);
		$hsl=$this->db->get();
		return $hsl;
	}
	/*
	function get_all_proyek_by_bagian($bagian){
		$this->db->select('*');
		$this->db->from('proyek a');
		$this->db->join('proyek_bagian b','a.proyek_id=b.pb_proyek_id','inner');
		$this->db->join('koordinat c','a.proyek_koordinat_id=c.koordinat_id','inner');
		$this->db->join('user d','a.proyek_user_nik=d.user_nik','inner');
		$this->db->where('proyek_bidang',$bagian);
		$this->db->ORDER_BY('pb_proyek_id','asc');
		$hsl=$this->db->get();
		return $hsl;
	}*/



	function get_proyek_bidang_by_kode($kode){
		$this->db->select('*');
		$this->db->from('proyek a');
		$this->db->join('proyek_bagian b','a.proyek_id=b.pb_proyek_id','inner');
		$this->db->join('koordinat c','a.proyek_koordinat_id=c.koordinat_id','inner');
		$this->db->join('user d','a.proyek_user_nik=d.user_nik','inner');
		$this->db->where('pb_id',$kode);
		$hsl=$this->db->get();
		return $hsl;
	}
	function get_all_dinaspu(){
		$this->db->select('*');
		$this->db->from('petugas');
		$hsl=$this->db->get();
		return $hsl;
	}
	function get_all_user(){
		$this->db->select('*');
		$this->db->from('user');
		$hsl=$this->db->get();
		return $hsl;
	}
	function get_all_pelaksana(){
		$this->db->select('*');
		$this->db->from('pekerja a');
		$this->db->join('proyek b','a.proyek_id=b.proyek_id','inner');
		$hsl=$this->db->get();
		return $hsl;
	}

	function get_all_pn_by_kode($kode){
		$this->db->select('*');
		$this->db->from('pekerja a');
		$this->db->join('proyek b','a.proyek_id=b.proyek_id','inner');
		$this->db->where('pekerja_nip',$kode);
		$hsl=$this->db->get();
		return $hsl;
	}

	function get_all_pelaksana_by_user($usernik){
		$this->db->select('*');
		$this->db->from('pekerja a');
		$this->db->join('proyek b','a.proyek_id=b.proyek_id','inner');
		$this->db->join('user c','b.proyek_user_nik=c.user_nik','inner');
		$this->db->where('user_nik',$usernik);
		$hsl=$this->db->get();
		return $hsl;
	}

	function get_num_koor() {
		$query = $this->db->query("SELECT MAX(koordinat_id) as max_id FROM koordinat"); 
		$row = $query->row_array();
		$max_id = $row['max_id']; 
		$hsl = $max_id +1;
		return $hsl;
	}
	function get_num_proyek() {
		$query = $this->db->query("SELECT MAX(proyek_id) as max_id FROM proyek"); 
		$row = $query->row_array();
		$max_id = $row['max_id']; 
		$hsl = $max_id +1;
		return $hsl;
	}
	function get_proyek(){
		$hsl=$this->db->query("SELECT * FROM proyek");
		return $hsl;
	}
	function cek_user($username){
		$hsl=$this->db->query("SELECT * FROM user where user_username='$username'");
		return $hsl;
	}
	function save_user($user_nik,$nama,$username,$password,$tel,$email,$bagian,$gambar,$level){
		$hsl=$this->db->query("INSERT INTO user (user_nik,user_nama,user_username,user_password,user_email,user_telp,user_bagian,user_photo,user_level) VALUES ('$user_nik','$nama','$username',md5('$password'),'$email','$tel','$bagian','$gambar','$level')");
		return $hsl;
	}
	function save_user_proyek($nikuser,$namauser,$emailuser,$telpuser){
		$hsl=$this->db->query("INSERT INTO user (user_nik,user_nama,user_email,user_telp,user_bagian) VALUES ('$nikuser','$namauser','$emailuser','$telpuser','ppk')");
		return $hsl;
	}
	function update_user_proyek($nikuser,$namauser,$emailuser,$telpuser,$baguser){
		$hsl=$this->db->query("UPDATE user set user_nama='$namauser',user_email='$emailuser',user_telp='$telpuser',user_bagian='$baguser' where user_nik='$nikuser'");
		return $hsl;
	}

	function update_lampiran_file($file_id,$gambar){
		$hsl=$this->db->query("UPDATE file set file_data='$gambar' where file_id='$file_id'");
		return $hsl;
	}

	function tambah_proyek_bidang($proyek_id,$pbtarget,$pbreal,$pbdevisi,$dskontrak,$dsadmproyek,$totalds,$sisaanggran,$statproyek){
		$hsl=$this->db->query("INSERT INTO proyek_bagian (pb_proyek_id,pb_target,pb_real,pb_devisi,pb_ds_kontrak,pb_ds_ap,pb_ds_keuangan,pb_sisa_anggaran,pb_last_update,pb_stat_proyek) VALUES ('$proyek_id','$pbtarget','$pbreal','$pbdevisi','$dskontrak','$dsadmproyek','$totalds','$sisaanggran',NOW(),'$statproyek')");
		return $hsl;
	}
	/*
	function update_proyek_bidang($proyek_id,$pbtarget,$pbreal,$pbdevisi,$dskontrak,$dsadmproyek,$totalds,$sisaanggran,$gambar,$statproyek){
		$hsl=$this->db->query("UPDATE proyek_bagian set pb_target='$pbtarget',pb_real='$pbreal',pb_devisi='$pbdevisi',pb_ds_kontrak='$dskontrak',pb_ds_ap='$dsadmproyek',pb_ds_keuangan='$dsadmproyek',pb_sisa_anggaran='$sisaanggran',pb_foto='$gambar',pb_last_update=NOW(),pb_stat_proyek='$statproyek' where pb_proyek_id='$proyek_id'");
		return $hsl;
	}


	function update_proyek_bidang_wo_img($proyek_id,$pbtarget,$pbreal,$pbdevisi,$dskontrak,$dsadmproyek,$totalds,$sisaanggran,$statproyek){
		$hsl=$this->db->query("UPDATE proyek_bagian set pb_target='$pbtarget',pb_real='$pbreal',pb_devisi='$pbdevisi',pb_ds_kontrak='$dskontrak',pb_ds_ap='$dsadmproyek',pb_ds_keuangan='$dsadmproyek',pb_sisa_anggaran='$sisaanggran',pb_foto='$gambar',pb_last_update=NOW(),pb_stat_proyek='$statproyek' where pb_proyek_id='$proyek_id'");
		return $hsl;
	}
*/


	function save_koordinat($numkor,$namkor,$latitude,$longitude,$inputAddress){
		$hsl=$this->db->query("INSERT INTO koordinat (koordinat_id,koordinat_nama,koordinat_lat,koordinat_lng,koordinat_alamat) VALUES ('$numkor','$namkor','$latitude','$longitude','$inputAddress')");
		return $hsl;
	}
	function update_koordinat($numkor,$namkor,$latitude,$longitude,$inputAddress){
		$hsl=$this->db->query("UPDATE koordinat set koordinat_nama='$namkor',koordinat_lat='$latitude',koordinat_lng='$longitude',koordinat_alamat='$inputAddress' where koordinat_id='$numkor'");
		return $hsl;
	}
	function save_proyek($numproyek,$nikuser,$numkor,$xnama,$year,$keuangan,$pagu,$sechawal,$xbidang,$xjenis,$xvolume,$xsatuan){
		$hsl=$this->db->query("INSERT INTO proyek (proyek_id,proyek_user_nik,proyek_koordinat_id,proyek_nama,proyek_tahun,proyek_keuangan,proyek_pagu,proyek_sech_awal,proyek_bidang,proyek_jenis,proyek_volume,proyek_satuan) VALUES ('$numproyek','$nikuser','$numkor','$xnama','$year','$keuangan','$pagu','$sechawal','$xbidang','$xjenis','$xvolume','$xsatuan')");
		return $hsl;
	}

	function update_proyek($proyek_id,$numkor,$xnama,$year,$keuangan,$pagu,$sechawal,$xbidang,$jenis,$volume,$satuan){
		$hsl=$this->db->query("UPDATE proyek set proyek_koordinat_id='$numkor',proyek_nama='$xnama',proyek_tahun='$year',proyek_keuangan='$keuangan',proyek_pagu='$pagu',proyek_sech_awal='$sechawal',proyek_bidang='$xbidang',proyek_jenis='$jenis',proyek_volume='$volume',proyek_satuan='$satuan',last_update=NOW() where proyek_id='$proyek_id'");
		return $hsl;
	}

	function update_proyek_jadwal($proyek_id,$awalkontrak,$akhirkontrak){
		$hsl=$this->db->query("UPDATE proyek set proyek_awal_kontrak='$awalkontrak',proyek_akhir_kontrak='$akhirkontrak',last_update=NOW() where proyek_id='$proyek_id'");
		return $hsl;
	}
	function save_pekerja($proyek_id,$xnip,$xnampeke,$xtelpeke,$xpekjenis,$xnamdirek,$xteldirek,$xnamaperus,$xalaperus,$xtelkant){
		$hsl=$this->db->query("INSERT INTO pekerja (pekerja_nip,proyek_id,pekerja_nama,pekerja_tel,pekerja_jenis,pekerja_nama_direktur,pekerja_tel_direktur,pekerja_nama_perusahaan,pekerja_alamat_perusahaan,pekerja_tel_kantor) VALUES ('$xnip','$proyek_id','$xnampeke','$xtelpeke','$xpekjenis','$xnamdirek','$xteldirek','$xnamaperus','$xalaperus','$xtelkant')");
		return $hsl;
	}


	function update_pn($proyek_id,$xnip,$xnampeke,$xtelpeke,$xpekjenis,$xnamdirek,$xteldirek,$xnamaperus,$xalaperus,$xtelkant){
		$hsl=$this->db->query("update pekerja SET proyek_id='$proyek_id',pekerja_nama='$xnampeke',pekerja_tel='$xtelpeke',pekerja_jenis='$xpekjenis',pekerja_nama_direktur='$xnamdirek',pekerja_tel_direktur='$xteldirek',pekerja_nama_perusahaan='$xnamaperus',pekerja_alamat_perusahaan='$xalaperus',pekerja_tel_kantor='$xtelkant' where pekerja_nip='$xnip'");
		return $hsl;
	}
	function update_pekerja($numpeker,$xpekerja_nama,$xpekerja_alamat,$xpekerja_telp,$xdirektur_nama,$xdirektur_telp,$xpekerja_jenis){
		$hsl=$this->db->query("UPDATE pekerja set pekerja_nama='$xpekerja_nama',pekerja_alamat='$xpekerja_alamat',pekerja_telp_kantor='$xpekerja_telp',pekerja_direktur='$xdirektur_nama',pekerja_telp_direktur='$xdirektur_telp',pekerja_jenis='$xpekerja_jenis' where pekerja_id='$numpeker'");
		return $hsl;
	}

	
	

	function get_proyek_by_slug($slug){
		$hsl=$this->db->query("select proyek.*,user.*,DATE_FORMAT(proyek_tanggal,'%d %M %Y - %H:%i') AS proyek_tanggal from proyek inner join user on proyek.proyek_user_nik=user.user_nik  where proyek_slug='$slug'");
		return $hsl;
	}
	function get_dinaspu_by_kode($kode){
		$hsl=$this->db->query("SELECT * FROM pekerja where pekerja_id='$kode'");
		return $hsl;
	}
	function get_proyek_home(){
		$hsl=$this->db->query("SELECT proyek.*,DATE_FORMAT(proyek_tanggal,'%d %M %Y') AS tanggal FROM proyek ORDER BY proyek_id DESC limit 3");
		return $hsl;
	}
	function get_proyek_limit(){
		$hsl=$this->db->query("SELECT proyek.*,DATE_FORMAT(proyek_tanggal,'%d/%m/%Y') AS tanggal FROM proyek ORDER BY proyek_tanggal DESC");
		return $hsl;
	}	
	function save_proyek_bagian($numproyek){
		$hsl=$this->db->query("INSERT INTO proyek_bagian (pb_proyek_id) values ('$numproyek')");
		return $hsl;
	}	
	function get_all_inbox_by_kode($kode){
		$hsl=$this->db->query("SELECT inbox.*,DATE_FORMAT(inbox_tanggal,'%d/%m/%Y') AS tanggal FROM inbox where inbox_id='$kode'");
		return $hsl;
	}
	function get_penannggung_jawab($kode){	
		$this->db->select('*');
		$this->db->from('pekerja a');
		$this->db->join('proyek b','a.proyek_id=b.proyek_id','inner');
		$this->db->where('a.proyek_id',$kode);
		$hsl=$this->db->get();
		return $hsl;
	}


	function get_pj(){	
		$this->db->select('*');
		$this->db->from('pekerja a');
		$this->db->join('proyek b','a.proyek_id=b.proyek_id','inner');
		$this->db->ORDER_BY('b.proyek_id','desc');
		$hsl=$this->db->get();
		return $hsl;
	}
	function get_detail_proyek_by_kode($kode){
		$this->db->select('*');
		$this->db->from('proyek a');
		$this->db->join('proyek_bagian b','a.proyek_id=b.pb_proyek_id','inner');
		$this->db->join('koordinat c','a.proyek_koordinat_id=c.koordinat_id','inner');
		$this->db->join('user d','a.proyek_user_nik=d.user_nik','inner');
		$this->db->where('proyek_id',$kode);
		$hsl=$this->db->get();
		return $hsl;
	}

	function getDown($kode)
	{
		$this->load->helper('download');
		$this->db->select('*');
		$this->db->where('file_id',$kode);
		$query =  $this->db->get('file');
		foreach ($query->result() as $row)
		{
			$nfile = file_get_contents(base_url()."assets/filedata/".$row->file_data);
			$file_name = $row->file_data;
		}
		force_download($file_name, $nfile);
	}

	function get_data_foto($kode){
		$hsl=$this->db->query("SELECT * from file where proyek_id='$kode' && file_jenis='foto'");
		return $hsl;
	}

	function get_data_file($kode){
		$hsl=$this->db->query("SELECT * from file where proyek_id='$kode' && file_jenis='file'");
		return $hsl;
	}

	function get_detail_proyek_bag_by_kode($kode){
		$this->db->select('*');
		$this->db->from('proyek a');
		$this->db->join('proyek_bagian b','a.proyek_id=b.pb_proyek_id','inner');
		$this->db->join('koordinat c','a.proyek_koordinat_id=c.koordinat_id','inner');
		$this->db->join('user d','a.proyek_user_nik=d.user_nik','inner');
		$this->db->where('proyek_id',$kode);
		$hsl=$this->db->get();
		return $hsl;
	}
	function proyek_perpage($offset,$limit){
		$hsl=$this->db->query("SELECT proyek.*,DATE_FORMAT(proyek_tanggal,'%d') AS tanggal, DATE_FORMAT(proyek_tanggal,'%M') as bulan FROM proyek ORDER BY proyek_id DESC limit $offset,$limit");
		return $hsl;
	}

	function update_user($user_nik,$user_nama,$xusername,$user_email,$user_tel,$user_bagian,$user_level,$gambar){
		$hsl=$this->db->query("update user set user_nik,='$user_nik',user_nama='$user_nama',user_username='$xusername',user_email='$user_email',user_telp='$user_tel',user_bagian='$user_bagian',user_level='$user_level',user_photo='$gambar' where user_nik='$user_nik'");
		return $hsl;
	}
	function update_user_wo_img($user_nik,$user_nama,$xusername,$user_email,$user_tel,$user_bagian,$user_level){
		$hsl=$this->db->query("update user set user_nik='$user_nik',user_nama='$user_nama',user_username='$xusername',user_email='$user_email',user_telp='$user_tel',user_bagian='$user_bagian',user_level='$user_level' where user_nik='$user_nik'");
		return $hsl;
	}
	function update_password_user($userid,$newpass){
		$hsl=$this->db->query("update user set user_password='$newpass' where user_nik='$userid'");
		return $hsl;
	}
	function delete_user($kode){
		$hsl=$this->db->query("DELETE from user where user_nik='$kode'");
		return $hsl;
	}

	function delete_proyek($kode){
		$hsl=$this->db->query("DELETE from proyek where proyek_id='$kode'");
		return $hsl;
	}
	function get_all_proyek_by_kode($kode){
		$this->db->select('*');
		$this->db->from('proyek');
		$this->db->where('proyek_id',$kode);
		$hsl=$this->db->get();
		return $hsl;
	}function get_all_user_by_kode($kode){
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('user_nik',$kode);
		$hsl=$this->db->get();
		return $hsl;
	}
}