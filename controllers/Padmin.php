<?php
class Padmin extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!isset($_SESSION['logged_in'])){
			$url=base_url('loginadmin');
			redirect($url);
		};
		$this->load->model('m_padmin');
	}
	public function index(){
		$y['title']='Dashboard';
		if($_SESSION['level']=='admin'){
			$x['sumprog']=$this->m_padmin->sum_prog();
			$x['sum_sisa']=$this->m_padmin->sum_sisa();
			$x['countproyek']=$this->m_padmin->sum_proyek();
			$x['sumpagu']=$this->m_padmin->sum_pagu();
			$x['sumkeluar']=$this->m_padmin->sum_keluar();
			$x['countjum']=$this->m_padmin->countjum();
			$x['diffdateplus']=$this->m_padmin->diffdateplus();
			$x['diffdatemin']=$this->m_padmin->diffdatemin();
			$x['countselesai']=$this->m_padmin->countselesai();
			$x['data']=$this->m_padmin->get_all_proyek();
			$x['sumreal']=$this->m_padmin->sum_realisasi();


		}
		else {
			$bagian=$_SESSION['bagian'];
			$x['ph']=$this->m_padmin->get_ph_by_bagian($bagian);
			$cc=$x['ph']->row_array();
			$phid=$cc['ph_id'];
			$x['countproyek']=$this->m_padmin->sum_proyek_by_kode($phid);
			$x['sumprog']=$this->m_padmin->sum_prog_by_kode($phid);
			$x['sum_sisa']=$this->m_padmin->sum_sisa_by_kode($phid);
			$x['sumpagu']=$this->m_padmin->sum_pagu_by_kode($phid);
			$x['sumkeluar']=$this->m_padmin->sum_keluar_by_kode($phid);
			$x['countjum']=$this->m_padmin->countjum_by_kode($phid);
			$x['diffdateplus']=$this->m_padmin->diffdateplus_by_kode($phid);
			$x['diffdatemin']=$this->m_padmin->diffdatemin_by_kode($phid);
			$x['countselesai']=$this->m_padmin->countselesai_by_kode($phid);
			$x['data']=$this->m_padmin->get_all_proyek_by_bagian($phid);
			$x['sumreal']=$this->m_padmin->sum_realisasi_by_bagian($phid);
		}
		$this->load->view('padmin/header',$y);
		$this->load->view('padmin/sidebar');
		$this->load->view('padmin/index',$x);
		$this->load->view('padmin/footer');
	}
	public function proyek(){
		if($_SESSION['level']=='admin'){
			$x['data']=$this->m_padmin->get_all_proyek();
			$x['anggaran']=$this->m_padmin->get_all_anggaran();
			$x['ph']=$this->m_padmin->get_all_ph();
			$x['chartrt']=$this->m_padmin->get_chart_rt_all();
			$x['foto']=$this->m_padmin->get_data_foto_all();
			$x['serapan']=$this->m_padmin->get_serapan();

		}
		else{
			$bagian=$_SESSION['bagian'];
			$x['anggaran']=$this->m_padmin->get_all_anggaran();
			$x['ph']=$this->m_padmin->get_ph_by_bagian($bagian);
			$cc=$x['ph']->row_array();
			$phid=$cc['ph_id'];
			$x['data']=$this->m_padmin->get_all_proyek_by_bagian($phid);
			$x['chartrt']=$this->m_padmin->get_chart_rt_all_by_bagian($bagian);
			$x['foto']=$this->m_padmin->get_data_foto_all();
		}

		$g['xc']='cc';
		$y['title']='DATA PROYEK';
		$this->load->view('padmin/header',$y);
		$this->load->view('padmin/sidebar');
		$this->load->view('padmin/proyek/proyek',$x);
		$this->load->view('padmin/footer',$g);
	}

	public function data_awal(){
		$kode=$this->uri->segment(3);
		$x['data']=$this->m_padmin->get_data_awal_by_kode($kode);
		$y['title']='Data Awal';
		$this->load->view('padmin/header',$y);
		$this->load->view('padmin/sidebar');
		$this->load->view('padmin/proyek/data_awal',$x);
		$this->load->view('padmin/footer');
	}

	public function dinaspu(){
		$x['data']=$this->m_padmin->get_all_dinaspu();
		$y['title']='Data User';
		$this->load->view('padmin/header',$y);
		$this->load->view('padmin/sidebar');
		$this->load->view('padmin/petugas/dinaspu',$x);
		$this->load->view('padmin/footer');
	}
	public function get_proyek_bidang(){
		$y['title']='Data Bagian';
		$kode=$this->uri->segment(3);
		$x['data']=$this->m_padmin->get_pb_by_proyekid($kode);
		$x['charttdk']=$this->m_padmin->get_chart_tdk($kode);
		$this->load->view('padmin/header',$y);
		$this->load->view('padmin/sidebar');
		$this->load->view('padmin/proyek/proyek_bidang',$x);
		$this->load->view('padmin/footer');
	}
	
	public function proyek_anggaran(){
		$y['title']='Data User';
		$kode=$this->uri->segment(3);
		$x['data']=$this->m_padmin->get_anggaran_by_kode_id($kode);
		$this->load->view('padmin/header',$y);
		$this->load->view('padmin/sidebar');
		$this->load->view('padmin/proyek/proyek_anggaran',$x);
		$this->load->view('padmin/footer');
	}

	public function gallery(){
		$y['title']='Gallery';
		$kode=$this->uri->segment(2);
		$x['data']=$this->m_padmin->get_all_gallery($kode);
		$this->load->view('padmin/header',$y);
		$this->load->view('padmin/sidebar');
		$this->load->view('padmin/proyek/gallery',$x);
		$this->load->view('padmin/footer');
	}

	public function lampiran(){
		$y['title']='Lampiran';
		$kode=$this->uri->segment(2);
		$x['data']=$this->m_padmin->get_data_file($kode);
		$this->load->view('padmin/header',$y);
		$this->load->view('padmin/sidebar');
		$this->load->view('padmin/proyek/lampiran',$x);
		$this->load->view('padmin/footer');
	}
	public function catatan(){
		$y['title']='Lampiran';
		$kode=$this->uri->segment(2);
		$x['data']=$this->m_padmin->get_catatan_by_kode($kode);
		$this->load->view('padmin/header',$y);
		$this->load->view('padmin/sidebar');
		$this->load->view('padmin/proyek/catatan',$x);
		$this->load->view('padmin/footer');
	}

	public function user(){
		$x['data']=$this->m_padmin->get_all_user();
		$y['title']='Data User';
		$this->load->view('padmin/header',$y);
		$this->load->view('padmin/sidebar');
		if ($_SESSION['level']=='admin'){
			$this->load->view('padmin/user/user',$x);
		}
		else {
			$this->load->view('padmin/404',$x);
		}
		$this->load->view('padmin/footer');
	}

	public function penanggung_jawab(){
		if ($_SESSION['level']=='bidang'){
			$bagian=$_SESSION['bagian'];
			$x['ph']=$this->m_padmin->get_ph_by_bagian($bagian);
			$cc=$x['ph']->row_array();
			$phid=$cc['ph_id'];
			$x['data']=$this->m_padmin->get_pekerja_bagian($phid);	
		//	$x['data']=$this->m_padmin->get_pn_by_bagian($bagian);	
		}
		else {

		}
		$y['title']='Penanggung Jawab';
		$this->load->view('padmin/header',$y);
		$this->load->view('padmin/sidebar');
		if ($_SESSION['level']=='bidang'){
			$this->load->view('padmin/proyek/penanggung_jawab',$x);
		}
		else {
			$this->load->view('padmin/404',$x);
		}
		$this->load->view('padmin/footer');
	}

	public function tambah_penanggung_jawab(){
		$y['title']='Tambah Penanggung Jawab';
		$this->load->view('padmin/header',$y);
		$this->load->view('padmin/sidebar');
		if ($_SESSION['level']=='bidang'){
			$bagian=$_SESSION['bagian'];
			$x['ph']=$this->m_padmin->get_ph_by_bagian($bagian);
			$cc=$x['ph']->row_array();
			$phid=$cc['ph_id'];
			$x['data']=$this->m_padmin->get_proyek_by_bag($phid);

			$this->load->view('padmin/proyek/tambah_penanggung_jawab',$x);
		}
		else {
			$this->load->view('padmin/404',$x);
		}
		$this->load->view('padmin/footer');
	}



	public function uplampiran(){
		$y['title']='Upload Lampiran';
		$z['xc']='cc';
		$kode=$this->uri->segment(3);
		$x['data']=$this->m_padmin->get_proyek_bidang_by_kode($kode);
		$this->load->view('padmin/header',$y);
		$this->load->view('padmin/sidebar');
		$this->load->view('padmin/proyek/uplampiran',$x);
		$this->load->view('padmin/footer',$z);
	}

	public function upanggaran(){
		$y['title']='Upload Anggaran';
		$z['xc']='cc';
		$kode=$this->uri->segment(3);
		$this->load->view('padmin/header',$y);
		$this->load->view('padmin/sidebar');
		$this->load->view('padmin/proyek/up_anggaran');
		$this->load->view('padmin/footer',$z);
	}


	public function tes(){
		$this->load->view('padmin/proyek/tes');
	}

	public function download(){

		$kode = $this->uri->segment(3);
		$this->m_padmin->getDown($kode);
	}


	public function downloadImage(){
		$kode = $this->uri->segment(3);
		$this->m_padmin->getDownImage($kode);
	}

	public function detail_proyek(){
		$g['xc']='cc';
		$kode=$this->uri->segment(3);
		$gc=$this->db->query("SELECT pb_proyek_id FROM proyek_bagian where pb_id='$kode'");
		$b=$gc->row_array();
		$nk=$b['pb_proyek_id']; 
		if ($_SESSION['level']=='bidang'){
			$x['data']=$this->m_padmin->get_detail_proyek_bag_by_kode($kode);
		}
		else {
			$x['data']=$this->m_padmin->get_detail_proyek_by_kode($kode);
		}
		$x['file']=$this->m_padmin->get_data_file_limit_10($kode);
		$x['foto']=$this->m_padmin->get_data_foto($kode);
		$x['chartrt']=$this->m_padmin->get_chart_rt($kode);
		$x['charttdk']=$this->m_padmin->get_chart_tdk($kode);
		$x['bbc']=$this->m_padmin->get_penannggung_jawab($kode);
		$x['da']=$this->m_padmin->get_data_awal_by_kode($kode);
		$x['prd']=$this->m_padmin->get_last_prd($kode);

		$x['catatan']=$this->m_padmin->get_catatan_by_kode_limit_5($kode);
		$y['title']='Detail Pekerjaan';
		$this->load->view('padmin/header',$y);
		$this->load->view('padmin/sidebar');		
		$this->load->view('padmin/proyek/detail_proyek',$x);
		$this->load->view('padmin/footer',$g);
	}  
	public function print(){
		$g['xc']='cc';
		$kode=$this->uri->segment(3);
		$x['data']=$this->m_padmin->get_detail_proyek_by_kode($kode);
		$this->load->view('padmin/proyek/print',$x);
	}  

	public function tambah_proyek(){
		$x['numkor']=$this->m_padmin->get_num_koor();
		$x['numproyek']=$this->m_padmin->get_num_proyek();
		$x['user']=$this->m_padmin->get_user_by_id_ppjk();
		$y['title']='Tambah Pekerjaan';
		$this->load->view('padmin/header',$y);
		$this->load->view('padmin/sidebar');
		$this->load->view('padmin/proyek/tambah_proyek',$x);
		$this->load->view('padmin/footer');
	}
	public function tambah_dinaspu(){
		$y['title']='Tambah Dinas PU';
		$this->load->view('padmin/header',$y);
		$this->load->view('padmin/sidebar');
		$this->load->view('padmin/petugas/tambah_dinaspu');
		$this->load->view('padmin/footer');
	}
	public function tambah_user(){
		$y['title']='Tambah User';
		$this->load->view('padmin/header',$y);
		$this->load->view('padmin/sidebar');
		$this->load->view('padmin/user/tambah_user');
		$this->load->view('padmin/footer');
	}
	public function tambah_pelaksana(){
		$y['title']='Tambah User';
		$this->load->view('padmin/header',$y);
		$this->load->view('padmin/sidebar');
		$this->load->view('padmin/petugas/tambah_pelaksana');
		$this->load->view('padmin/footer');
	}

	
	function save_ph(){
		$judulph=$this->input->post('judulph');
		$ph_bidang=$this->input->post('ph_bidang');
		$this->m_padmin->save_ph($judulph,$ph_bidang);
		echo $this->session->set_flashdata('msg','success');
		redirect('padmin/proyek');
	}
	function save_data_awal(){
		$proyek_id=$this->input->post('proyek_id');
		$newtanggal=$this->input->post('tanggal');
		$prg=$this->input->post('progres');
		
		$count= count($this->input->post('tanggal'));
		for($i=0;$i<$count;$i++){   
			$arrtanggal=$newtanggal[$i];   
			$arrprg=$prg[$i];   
			$rr=$this->m_padmin->save_data_awal($arrtanggal,$arrprg,$proyek_id);
		}   
		if($rr){
			echo $this->session->set_flashdata('msg','info');
			header("Location: {$_SERVER['HTTP_REFERER']}");
			exit;
		}	
		
	}

	function save_anggaran(){
		$phid=$this->input->post('phid');
		$anggaran=$this->input->post('anggaran');
		$tahun=$this->input->post('tahun');
		$pagu=$this->input->post('pagu');
		$pag = str_replace( ',', '', $pagu );
		if( is_numeric( $pag ) ) {
			$pagu = $pag;
		}
		$cc=$this->m_padmin->get_ph_by_kode($phid);	
		$dd=$cc->row_array();
		$newanggaran=$pagu+$dd['ph_anggaran'];
		$gdd=$this->m_padmin->save_anggaran($phid,$anggaran,$tahun,$pagu);
		if($gdd){
			$this->m_padmin->update_anggaran_ph($phid,$newanggaran);		
			echo $this->session->set_flashdata('msg','success');
			redirect('padmin/proyek');
		}
		else {
			echo $this->session->set_flashdata('msg','error');
			redirect('padmin/proyek');
		}

	}

	function update_anggaran(){
		$anggaran_id=$this->input->post('anggaran_id');
		$newanggaran=$this->input->post('anggaran');
		$this->m_padmin->update_anggaran($anggaran_id,$newanggaran);		
		echo $this->session->set_flashdata('msg','success');
		redirect('padmin/proyek');
	}

	function update_anggaran_detail(){
		$kode=$this->input->post('kode');
		$anggaran=$this->input->post('anggaran');
		$tahun=$this->input->post('tahun');
		$pagu=$this->input->post('pagu');
		$this->m_padmin->update_anggaran_detail($kode,$anggaran,$tahun,$pagu);		
		echo $this->session->set_flashdata('msg','success');
		redirect('padmin/proyek');
	}

	function save_catatan(){
		$proyek_id=$this->input->post('proyek_id');
		$catatan_isi=$this->input->post('catatan_isi');
		$this->m_padmin->save_catatan($proyek_id,$catatan_isi);
		echo $this->session->set_flashdata('msg','success');
		redirect('padmin/proyek');
	}
	
	function update_anggaran_ph(){
		$phid=$this->input->post('phid');
		$newanggaran=$this->input->post('anggaran');
		$this->m_padmin->update_anggaran_ph($phid,$newanggaran);		
		echo $this->session->set_flashdata('msg','success');
		redirect('padmin/proyek');
	}

	function save_penanggung_jawab(){
		$proyek_id=$this->input->post('proyek');
		$xpekjenis=$this->input->post('xjenis');
		$xnamdirek=$this->input->post('xnama_direk');
		$xteldirek=$this->input->post('xtel_direk');
		$xnamaperus=$this->input->post('xnama_perus');
		$xalaperus=$this->input->post('xalamat_perus');
		$xtelkant=$this->input->post('xtel_kant');
		$pekerja=$this->m_padmin->save_pekerja($proyek_id,$xpekjenis,$xnamdirek,$xteldirek,$xnamaperus,$xalaperus,$xtelkant);

		echo $this->session->set_flashdata('msg','success');
		redirect('padmin/penanggung_jawab');		
		
	}

	function save_proyek(){

		$numproyek=$this->input->post('numproyek');
		$xnama=$this->input->post('xnama');
		$year=$this->input->post('year');
		//$keuangan=str_replace(".", "", $this->input->post('keuangan'));
		$pagu=str_replace(".", "", $this->input->post('pagu'));
		//$sechawal=$this->input->post('sechawal');
		//$awalkontrak=$this->input->post('awalkontrak');
		//$akhirkontrak=$this->input->post('akhirkontrak');
		//$xbidang=$this->input->post('xbidang');
		$xjenis=$this->input->post('xjenis');
		$xvolume=$this->input->post('xvolume');
		$xsatuan=$this->input->post('xsatuan');
		$phid=$this->input->post('phid');

		$numkor=$this->input->post('numkor');
		$inputAddress=$this->input->post('inputAddress');
		$namkor=$this->input->post('namkor');
		$latitude=$this->input->post('latitude');
		$longitude=$this->input->post('longitude');

		$pn_nama=$this->input->post('pn_nama');
		$pn_email=$this->input->post('pn_email');
		$pn_tel=$this->input->post('pn_tel');
		$pn_bagian=$this->input->post('pn_bagian');
		$username=$this->input->post('username');
		$password=$this->input->post('password');
		$repassword=$this->input->post('repassword');
		$group1=$this->input->post('group1');
		$level='ppjk';
		$cuser=$this->m_padmin->cek_user($username);

		if($group1=='new')
		{
			if($cuser->num_rows() > 0){
				echo $this->session->set_flashdata('msg','warning');
				redirect('padmin/tambah_proyek');

			} else {

				if($password==$repassword){

					$gg=$this->m_padmin->cek_last_id_user();
					$user_id=$gg['user_id']+1;
					$pw=$this->m_padmin->save_user_n($username,$password,$pn_tel,$pn_email,$pn_bagian,$level);
					if($pw){
						$svkoor=$this->m_padmin->save_koordinat($numkor,$namkor,$latitude,$longitude,$inputAddress);
						if ($svkoor){
							$svpro=$this->m_padmin->save_proyek($numproyek,$numkor,$xnama,$year,$pagu,$xjenis,$xvolume,$xsatuan,$phid);
							if($svpro){
								$svpp=$this->m_padmin->save_pn($numproyek,$user_id,$pn_nama,$pn_email,$pn_tel,$pn_bagian);
								if($svpp){
									echo $this->session->set_flashdata('msg','success');
									redirect('padmin/proyek');
								} else{
									echo $this->session->set_flashdata('msg','warning');
									redirect('padmin/tambah_proyek');
								}
							}
							else {
								echo $this->session->set_flashdata('msg','warning');
								redirect('padmin/tambah_proyek');
							}
						}
						else{
							echo $this->session->set_flashdata('msg','warning');
							redirect('padmin/tambah_proyek');
						}
					}
					else {
						echo $this->session->set_flashdata('msg','warning');
						redirect('padmin/tambah_proyek');
					}
				}
				else {
					echo $this->session->set_flashdata('msg','warning');
					redirect('padmin/tambah_proyek');
				}
			}

		}
		else {
			$user_id=$this->input->post('user');
			$cekuser=$this->m_padmin->cek_user_id($user_id);
			$guser=$cekuser->row_array();
			$pn_nama=$this->input->post('pn_namax');
			$pn_tel=$guser['user_tel'];
			$pn_email=$guser['user_email'];
			$pn_bagian=$guser['user_bagian'];
			$svkoor=$this->m_padmin->save_koordinat($numkor,$namkor,$latitude,$longitude,$inputAddress);
			if ($svkoor){
				$svpro=$this->m_padmin->save_proyek($numproyek,$numkor,$xnama,$year,$pagu,$xjenis,$xvolume,$xsatuan,$phid);
				if($svpro){
					$svpp=$this->m_padmin->save_pn($numproyek,$user_id,$pn_nama,$pn_email,$pn_tel,$pn_bagian);
					if($svpp){
						echo $this->session->set_flashdata('msg','success');
						redirect('padmin/proyek');
					} else{
						echo $this->session->set_flashdata('msg','warning');
						redirect('padmin/tambah_proyek');
					}
				}
				else {
					echo $this->session->set_flashdata('msg','warning');
					redirect('padmin/tambah_proyek');
				}
			}
			else{
				echo $this->session->set_flashdata('msg','warning');
				redirect('padmin/tambah_proyek');
			}

		}
	}



	function save_user(){
		$username=$this->input->post('xusername');
		$password=$this->input->post('xpassword');
		$repassword=$this->input->post('xrepassword');
		$tel=$this->input->post('xtel');
		$email=$this->input->post('xemail');
		$bagian=$this->input->post('xbagian');
		$level=$this->input->post('xlevel');
		$cuser=$this->m_padmin->cek_user($username);
		if($cuser->num_rows() > 0){
			echo $this->session->set_flashdata('msg','warning');
			redirect('padmin/tambah_user');

		} else {
			if($password==$repassword){
				$this->m_padmin->save_user($username,$password,$tel,$email,$bagian,$level);
				echo $this->session->set_flashdata('msg','success');
				redirect('padmin/user');	
			}
			else {
				echo $this->session->set_flashdata('msg','warning');
				redirect('padmin/tambah_user');
			}
		}




	}
	function save_dinaspu(){

		$user_id=$this->input->post('xuser_id');
		$nama=$this->input->post('xnama');
		$tel=$this->input->post('xtel');
		$bag=$this->input->post('xbag');
		$this->m_padmin->save_dinaspu($user_id,$nama,$tel,$bag);
		echo $this->session->set_flashdata('msg','success');
		redirect('padmin/dinaspu');
	}

	function save_pelaksana(){

		$nama=$this->input->post('xnama');
		$alamat=$this->input->post('xalamat');
		$tel=$this->input->post('xtel');
		$direktur=$this->input->post('xdirektur');
		$teldirek=$this->input->post('xteldirek');
		$jenis=$this->input->post('xjenis');
		$this->m_padmin->save_pelaksana($nama,$alamat,$tel,$direktur,$teldirek,$jenis);
		echo $this->session->set_flashdata('msg','success');
		redirect('padmin/pelaksana');
	}


	function get_edit_proyek(){
		$kode=$this->uri->segment(3);
		$y['title']='Edit Proyek';
		$x['user']=$this->m_padmin->get_user_by_id_ppjk();
		$x['data']=$this->m_padmin->get_detail_proyek_by_kode($kode);
		$this->load->view('padmin/header',$y);
		$this->load->view('padmin/sidebar');
		$this->load->view('padmin/proyek/edit_proyek',$x);
		$this->load->view('padmin/footer');
	}  
	function edit_proyek_jadwal(){
		$kode=$this->uri->segment(3);
		$y['title']='Edit Kegiatan';
		$x['data']=$this->m_padmin->get_detail_proyek_by_kode($kode);
		$this->load->view('padmin/header',$y);
		$this->load->view('padmin/sidebar');
		$this->load->view('padmin/proyek/edit_proyek_jadwal',$x);
		$this->load->view('padmin/footer');
	}  
	function serapan(){
		$kode=$this->uri->segment(3);
		$y['title']='Rencana Proyek Serapan';
		$x['data']=$this->m_padmin->get_serapan($kode);
		$this->load->view('padmin/header',$y);
		$this->load->view('padmin/sidebar');
		$this->load->view('padmin/proyek/serapan',$x);
		$this->load->view('padmin/footer');
	}  

	function get_edit_file(){
		$kode=$this->uri->segment(3);
		$x['data']=$this->m_padmin->get_edit_file_by_kode($kode);
		$this->load->view('padmin/header');
		$this->load->view('padmin/sidebar');		
		$this->load->view('padmin/proyek/edit_file',$x);
		$this->load->view('padmin/footer');
	}  
	function get_edit_pn(){
		$kode=$this->uri->segment(3);
		$x['data']=$this->m_padmin->get_all_pn_by_kode($kode);
		$bagian=$_SESSION['bagian'];
		$x['ph']=$this->m_padmin->get_ph_by_bagian($bagian);
		$cc=$x['ph']->row_array();
		$phid=$cc['ph_id'];
		$x['datak']=$this->m_padmin->get_pekerja_bagian($phid);	

		$this->load->view('padmin/header');
		$this->load->view('padmin/sidebar');		
		$this->load->view('padmin/proyek/edit_pn',$x);
		$this->load->view('padmin/footer');
	}  

	function get_edit_user(){
		$kode=$this->uri->segment(3);
		$y['title']='Edit User';
		$x['data']=$this->m_padmin->get_all_user_by_kode($kode);
		$this->load->view('padmin/header',$y);
		$this->load->view('padmin/sidebar');		
		$this->load->view('padmin/user/edit_user',$x);
		$this->load->view('padmin/footer');
	}  
	function get_edit_dinaspu(){
		$kode=$this->uri->segment(3);
		$x['data']=$this->m_padmin->get_dinaspu_bykode($kode);
		$this->load->view('padmin/header');
		$this->load->view('padmin/sidebar');		
		$this->load->view('padmin/petugas/edit_dinaspu',$x);
		$this->load->view('padmin/footer');
	}  

	function update_ph(){
		$phid=$this->input->post('phid');
		$judulph=$this->input->post('judulph');
		$ph_bidang=$this->input->post('ph_bidang');
		$this->m_padmin->update_ph($phid,$judulph,$ph_bidang);
		echo $this->session->set_flashdata('msg','success');
		redirect('padmin/proyek');

	}
	function update_proyek(){


		$proyek_id=$this->input->post('xproyek_id');
		$xnama=$this->input->post('xnama');
		$year=$this->input->post('year');
		//$keuangan=str_replace(".", "", $this->input->post('keuangan'));
		$pagu=str_replace(".", "", $this->input->post('pagu'));
		//$sech_awal=$this->input->post('sech_awal');
		//$xbidang=$this->input->post('xbidang');
		$xjenis=$this->input->post('xjenis');
		$xvolume=$this->input->post('xvolume');
		$xsatuan=$this->input->post('xsatuan');

		$numkor=$this->input->post('numkor');
		$inputAddress=$this->input->post('inputAddress');
		$namkor=$this->input->post('namkor');
		$latitude=$this->input->post('latitude');
		$longitude=$this->input->post('longitude');

		$pn_nama=$this->input->post('pn_nama');
		$pn_email=$this->input->post('pn_email');
		$pn_tel=$this->input->post('pn_tel');
		$pn_bagian=$this->input->post('pn_bagian');
		$username=$this->input->post('username');
		$password=$this->input->post('password');
		$repassword=$this->input->post('repassword');
		$group1=$this->input->post('group1');
		$level='ppjk';
		$cuser=$this->m_padmin->cek_user($username);

		if($group1=='new')
		{
			if($cuser->num_rows() > 0){
				echo $this->session->set_flashdata('msg','warning');
				redirect('padmin/tambah_proyek');
			} else {
				if($password==$repassword){
					$gg=$this->m_padmin->cek_last_id_user();
					$user_id=$gg['user_id']+1;
					$pw=$this->m_padmin->save_user_n($username,$password,$pn_tel,$pn_email,$pn_bagian,$level);
					if($pw){
						$svkoor=$this->m_padmin->update_koordinat($numkor,$namkor,$latitude,$longitude,$inputAddress);
						if ($svkoor){
							$gc=$this->m_padmin->update_proyek($proyek_id,$numkor,$xnama,$year,$pagu,$xjenis,$xvolume,$xsatuan);
							if($gc){
								$svpp=$this->m_padmin->update_penanggung_jawab($proyek_id,$user_id,$pn_nama,$pn_email,$pn_tel,$pn_bagian);
								if($svpp){
									echo $this->session->set_flashdata('msg','success');
									redirect('padmin/proyek');
								} else{
									echo $this->session->set_flashdata('msg','warning');
									header("Location: {$_SERVER['HTTP_REFERER']}");
								}
							}
							else {
								echo $this->session->set_flashdata('msg','warning');
								header("Location: {$_SERVER['HTTP_REFERER']}");
							}
						}
						else{
							echo $this->session->set_flashdata('msg','warning');
							header("Location: {$_SERVER['HTTP_REFERER']}");
						}
					}
					else {
						echo $this->session->set_flashdata('msg','warning');
						header("Location: {$_SERVER['HTTP_REFERER']}");
					}
				}
				else {
					echo $this->session->set_flashdata('msg','warning');
					header("Location: {$_SERVER['HTTP_REFERER']}");
				}
			}

		}
		else {
			$user_id=$this->input->post('user');
			$cekuser=$this->m_padmin->cek_user_id($user_id);
			$guser=$cekuser->row_array();
			$pn_nama=$this->input->post('pn_namax');
			$svkoor=$this->m_padmin->update_koordinat($numkor,$namkor,$latitude,$longitude,$inputAddress);
			if ($svkoor){
				$gc=$this->m_padmin->update_proyek($proyek_id,$numkor,$xnama,$year,$pagu,$xjenis,$xvolume,$xsatuan);
				if($gc){
					$svpp=$this->m_padmin->update_penanggung_jawab_old($proyek_id,$user_id,$pn_nama);
					if($svpp){
						echo $this->session->set_flashdata('msg','success');
						redirect('padmin/proyek');
					} else{
						echo $this->session->set_flashdata('msg','warning');
						header("Location: {$_SERVER['HTTP_REFERER']}");
					}
				}
				else {
					echo $this->session->set_flashdata('msg','warning');
					header("Location: {$_SERVER['HTTP_REFERER']}");
				}
			}
			else{
				echo $this->session->set_flashdata('msg','warning');
				header("Location: {$_SERVER['HTTP_REFERER']}");
			}

		}
	}



	function update_proyek_jadwal(){
		$proyek_id=$this->input->post('xproyek_id');
		$nilaikontrak=$this->input->post('nilaikontrak');
		$rencanakontrak=$this->input->post('rencanakontrak');
		$awalkontrak=$this->input->post('awalkontrak');
		$akhirkontrak=$this->input->post('akhirkontrak');
		$svkoor=$this->m_padmin->update_proyek_jadwal($proyek_id,$nilaikontrak,$rencanakontrak,$awalkontrak,$akhirkontrak);
		echo $this->session->set_flashdata('msg','success');
		redirect('padmin/proyek');

	}
	function update_pn(){
		$proyek_id=$this->input->post('proyek');
		$xnip=$this->input->post('xnip');
		$xpekjenis=$this->input->post('xjenis');
		$xnamdirek=$this->input->post('xnama_direk');
		$xteldirek=$this->input->post('xtel_direk');
		$xnamaperus=$this->input->post('xnama_perus');
		$xalaperus=$this->input->post('xalamat_perus');
		$xtelkant=$this->input->post('xtel_kant');
		$pekerja=$this->m_padmin->update_pn($proyek_id,$xnip,$xpekjenis,$xnamdirek,$xteldirek,$xnamaperus,$xalaperus,$xtelkant);

		echo $this->session->set_flashdata('msg','success');
		redirect('padmin/penanggung_jawab');		

	} 

	function update_user(){

		$config['upload_path'] = './assets/images/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
		$config['encrypt_name'] = TRUE;

		$this->upload->initialize($config);
		if(!empty($_FILES['filefoto']['name']))
		{
			if ($this->upload->do_upload('filefoto'))
			{
				$gbr = $this->upload->data();

				$config['image_library']='gd2';
				$config['source_image']='./assets/images/'.$gbr['file_name'];
				$config['create_thumb']= FALSE;
				$config['maintain_ratio']= FALSE;
				$config['quality']= '60%';
				$config['width']= 840;
				$config['height']= 450;
				$config['new_image']= './assets/images/'.$gbr['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();

				$gambar=$gbr['file_name'];
				$user_id=$this->input->post('user_id');
				$user_username=$this->input->post('user_username');
				$user_email=$this->input->post('user_email');
				$user_tel=$this->input->post('user_tel');
				$user_bagian=$this->input->post('user_bagian');
				$user_level=$this->input->post('user_level');
				$this->m_padmin->update_user($user_id,$user_username,$user_email,$user_tel,$user_bagian,$user_level,$gambar);
				echo $this->session->set_flashdata('msg','info');
				redirect('padmin/user');
			}else{
				echo $this->session->set_flashdata('msg','warning');
				redirect('padmin/user');
			}

		}else{
			$user_id=$this->input->post('user_id');
			$user_username=$this->input->post('user_username');
			$user_email=$this->input->post('user_email');
			$user_tel=$this->input->post('user_tel');
			$user_bagian=$this->input->post('user_bagian');
			$user_level=$this->input->post('user_level');
			$this->m_padmin->update_user_wo_img($user_id,$user_username,$user_email,$user_tel,$user_bagian,$user_level);
			echo $this->session->set_flashdata('msg','info');
			redirect('padmin/user');
		} 

	}

	function save_serapan(){
		$tserap=$this->input->post('tserap');
		$persen=$this->input->post('persen');
		$bulan=$this->input->post('bulan');

		$cek=$this->m_padmin->get_serapan()->num_rows();
		if($cek<1){
			for($i=0;$i<12;$i++){
				$gtserap=$tserap[$i];
				$gpersen=$persen[$i];
				$gbulan=$bulan[$i];
				$rr=$this->m_padmin->save_serap($gtserap,$gpersen,$gbulan);
			}

			if($rr){
				echo $this->session->set_flashdata('msg','info');
				header("Location: {$_SERVER['HTTP_REFERER']}");
				exit;
			}
		}else {
			for($i=0;$i<12;$i++){
				$gtserap=$tserap[$i];
				$gpersen=$persen[$i];
				$gbulan=$bulan[$i];
				$rr=$this->m_padmin->update_serap($gtserap,$gpersen,$gbulan);
			}

			if($rr){
				echo $this->session->set_flashdata('msg','info');
				header("Location: {$_SERVER['HTTP_REFERER']}");
				exit;
			}
		}
	}

	function save_proyek_bidang(){

		$proyek_id=$this->input->post('proyek_id');
		$pbtarget=$this->input->post('pbtarget');
		$pbreal=$this->input->post('pbreal');
		$pbdevisi=$this->input->post('pbdevisi');
		$tanggal_prog=$this->input->post('tanggal_prog');
		$jenis=$this->input->post('jenis');
		$dskontrak=$this->input->post('nondskontrak');
		$sisakontrak=$this->input->post('nonformatsisakontrak');
		$sisaanggran=$this->input->post('nonformatsisaanggran');

		if($jenis=='fisik'){
			if($pbtarget==0 || $pbtarget<=70){
				if($pbdevisi>0){
					$statproyek='baik';
				}
				else {
					if($pbdevisi==0 || $pbdevisi>=(-7)){
						$statproyek='wajar';
					}
					else if ($pbdevisi<(-7) && $pbdevisi>=(-10)){
						$statproyek='terlambat';
					}
					else {
						$statproyek='kritis';
					}
				}
			}
			else if ($pbtarget>70 && $pbtarget<=100){
				if($pbdevisi>0){
					$statproyek='baik';
				}
				else {
					if($pbdevisi==0 || $pbdevisi>=(-4)){
						$statproyek='wajar';
					}
					else if ($pbdevisi<(-4) && $pbdevisi>=(-5)){
						$statproyek='terlambat';                     
					}
					else {
						$statproyek='kritis';
					} 
				}
			}
			else {
				$statproyek='baik';
			} 
			$ggc=$this->m_padmin->tambah_data_fisik($proyek_id,$pbtarget,$pbreal,$pbdevisi,$tanggal_prog,$statproyek,$jenis);
			echo $this->session->set_flashdata('msg','info');
			header("Location: {$_SERVER['HTTP_REFERER']}");
		}else {
			$ggc=$this->m_padmin->tambah_data_keuangan($proyek_id,$dskontrak,$sisakontrak,$sisaanggran,$jenis,$tanggal_prog);
			echo $this->session->set_flashdata('msg','info');
			header("Location: {$_SERVER['HTTP_REFERER']}");
		}
	}


	function save_lampiran_foto(){

		$config['upload_path'] = './assets/images/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
		$config['encrypt_name'] = TRUE;

		$this->upload->initialize($config);
		if(!empty($_FILES['filefoto']['name']))
		{
			if ($this->upload->do_upload('filefoto'))
			{
				$gbr = $this->upload->data();

				$config['image_library']='gd2';
				$config['source_image']='./assets/images/'.$gbr['file_name'];
				$config['create_thumb']= FALSE;
				$config['maintain_ratio']= FALSE;
				$config['quality']= '60%';
				$config['width']= 840;
				$config['height']= 840;
				$config['new_image']= './assets/images/'.$gbr['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();

				$gambar=$gbr['file_name'];
				$proyek_id=$this->input->post('proyek_id');
				$namafile=$this->input->post('namafile');
				$jenis=$this->input->post('jenis');
				$ggc=$this->m_padmin->save_lampiran_foto($proyek_id,$namafile,$gambar,$jenis);
				echo $this->session->set_flashdata('msg','berhasil');
				header("Location: {$_SERVER['HTTP_REFERER']}");
			} 
			else{
				echo $this->session->set_flashdata('msg','warning');
				header("Location: {$_SERVER['HTTP_REFERER']}");
			} 
		}	
		else{
			echo $this->session->set_flashdata('msg','warning');
			header("Location: {$_SERVER['HTTP_REFERER']}");
		}

	}
	function save_lampiran_file(){

		$config['upload_path'] = './assets/filedata/';
		$config['allowed_types'] = 'doc|docx|pdf|xls|xlsx|ppt|ppt|zip|rar';
		$config['encrypt_name'] = TRUE;

		$this->upload->initialize($config);
		if(!empty($_FILES['fileat']['name']))
		{
			if ($this->upload->do_upload('fileat'))
			{
				$gbr = $this->upload->data();

				$config['image_library']='gd2';
				$config['source_image']='./assets/filedata/'.$gbr['file_name'];
				$config['create_thumb']= FALSE;
				$config['maintain_ratio']= FALSE;
				$config['quality']= '60%';
				$config['width']= 840;
				$config['height']= 450;
				$config['new_image']= './assets/filedata/'.$gbr['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();

				$gambar=$gbr['file_name'];
				$proyek_id=$this->input->post('proyek_id');
				$namafile=$this->input->post('namafile');
				$jenis=$this->input->post('jenis');
				$ggc=$this->m_padmin->save_lampiran_file($proyek_id,$namafile,$gambar,$jenis);
				echo $this->session->set_flashdata('msg','berhasil');
				header("Location: {$_SERVER['HTTP_REFERER']}");
			} 
			else{
				echo $this->session->set_flashdata('msg','warning');
				header("Location: {$_SERVER['HTTP_REFERER']}");
			} 
		}	
		else{
			echo $this->session->set_flashdata('msg','warning');
			header("Location: {$_SERVER['HTTP_REFERER']}");
		}

	}

	function save_lampiran_anggaran(){

		$config['upload_path'] = './assets/filedata/';
		$config['allowed_types'] = 'doc|docx|pdf|xls|xlsx|ppt|ppt|zip|rar';
		$config['encrypt_name'] = TRUE;

		$this->upload->initialize($config);
		if(!empty($_FILES['fileat']['name']))
		{
			if ($this->upload->do_upload('fileat'))
			{
				$gbr = $this->upload->data();

				$config['image_library']='gd2';
				$config['source_image']='./assets/filedata/'.$gbr['file_name'];
				$config['create_thumb']= FALSE;
				$config['maintain_ratio']= FALSE;
				$config['quality']= '60%';
				$config['width']= 840;
				$config['height']= 450;
				$config['new_image']= './assets/filedata/'.$gbr['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();

				$gambar=$gbr['file_name'];
				$anggaran_id=$this->input->post('anggaran_id');
				$namafile=$this->input->post('namafile');
				$ggc=$this->m_padmin->save_lampiran_anggaran($anggaran_id,$namafile,$gambar);
				echo $this->session->set_flashdata('msg','info');
				header("Location: {$_SERVER['HTTP_REFERER']}");
			} 
			else{
				echo $this->session->set_flashdata('msg','warning');
				header("Location: {$_SERVER['HTTP_REFERER']}");
			} 
		}	
		else{
			echo $this->session->set_flashdata('msg','warning');
			header("Location: {$_SERVER['HTTP_REFERER']}");
		}

	}

	function update_lampiran_file(){

		$config['upload_path'] = './assets/filedata/';
		$config['allowed_types'] = 'doc|docx|pdf|xls|xlsx|ppt|ppt|zip|rar';
		$config['encrypt_name'] = TRUE;

		$this->upload->initialize($config);
		if(!empty($_FILES['fileat']['name']))
		{
			if ($this->upload->do_upload('fileat'))
			{
				$gbr = $this->upload->data();

				$config['image_library']='gd2';
				$config['source_image']='./assets/filedata/'.$gbr['file_name'];
				$config['create_thumb']= FALSE;
				$config['maintain_ratio']= FALSE;
				$config['quality']= '60%';
				$config['width']= 840;
				$config['height']= 450;
				$config['new_image']= './assets/filedata/'.$gbr['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();

				$gambar=$gbr['file_name'];
				$file_id=$this->input->post('file_id');
				$ggc=$this->m_padmin->update_lampiran_file($file_id,$gambar);
				echo $this->session->set_flashdata('msg','info');
				redirect('padmin/proyek');
			} 
			else{
				echo $this->session->set_flashdata('msg','warning');
				redirect('padmin/proyek');
			} 
		}	
		else{
			echo $this->session->set_flashdata('msg','warning');
			redirect('padmin/proyek');
		}

	}

	function update_password_user(){

		$xhp=$this->input->post('xhp');
		$oldpass=md5($this->input->post('xoldpas'));
		$newpass=md5($this->input->post('xnewpas'));
		$newrepass=md5($this->input->post('xnewrepas'));
		$user_id=$this->input->post('user_id');

		if($xhp==$oldpass)
		{
			if($newpass==$newrepass){
				$this->m_padmin->update_password_user($user_id,$newpass);
				echo $this->session->set_flashdata('msg','info');
				redirect('padmin/user');
			}
			else {
				redirect('padmin/user1');
				echo $this->session->set_flashdata('msg','error');
			}	
		}
		else {
			redirect('padmin/user2');
			echo $this->session->set_flashdata('msg','error');
		}
	}

	function delete_pn(){
		$kode=$this->input->post('kode');
		$this->m_padmin->delete_pn($kode);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('padmin/proyek');
	}
	function delete_da(){
		$kode=$this->input->post('kode');
		$this->m_padmin->delete_da($kode);
		echo $this->session->set_flashdata('msg','success-hapus');
		header("Location: {$_SERVER['HTTP_REFERER']}");
	}
	function delete_anggaran_detail(){
		$kode=$this->input->post('kode');
		$this->m_padmin->delete_anggaran_detail($kode);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('padmin/proyek');
	}

	function delete_ph(){
		$kode=$this->input->post('kode');
		$this->m_padmin->delete_ph($kode);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('padmin/proyek');
	}

	function delete_proyek(){
		$kode=$this->input->post('kode');
		$gambar=$this->input->post('gambar');
		unlink($path);
		$this->m_padmin->delete_proyek($kode);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('padmin/proyek');
	}
	function delete_user(){
		$kode=$this->input->post('kode');
		unlink($path);
		$this->m_padmin->delete_user($kode);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('padmin/user');
	}




}		