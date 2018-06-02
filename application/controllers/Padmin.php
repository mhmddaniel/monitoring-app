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
		}
		else if($_SESSION['level']=='bidang'){
			$bagian=$_SESSION['bagian'];
			$x['countproyek']=$this->m_padmin->sum_proyek_by_kode($bagian);
			$x['sumprog']=$this->m_padmin->sum_prog_by_kode($bagian);
			$x['sum_sisa']=$this->m_padmin->sum_sisa_by_kode($bagian);
			$x['sumpagu']=$this->m_padmin->sum_pagu_by_kode($bagian);
			$x['sumkeluar']=$this->m_padmin->sum_keluar_by_kode($bagian);
		}
		else {
			$usernik=$_SESSION['usernik'];
			$x['data']=$this->m_padmin->get_all_proyek_by_user($usernik);
		}
		$this->load->view('padmin/header',$y);
		$this->load->view('padmin/sidebar');
		$this->load->view('padmin/index',$x);
		$this->load->view('padmin/footer');
	}

	public function proyek(){
		if($_SESSION['level']=='admin'){
			$x['data']=$this->m_padmin->get_all_proyek();
		}
		else if($_SESSION['level']=='bidang'){
			$bagian=$_SESSION['bagian'];
			$x['data']=$this->m_padmin->get_all_proyek_by_bagian($bagian);
		}
		else {
			$usernik=$_SESSION['usernik'];
			$x['data']=$this->m_padmin->get_all_proyek_by_user($usernik);
		}
		$g['xc']='cc';
		$y['title']='DATA PROYEK';
		$this->load->view('padmin/header',$y);
		$this->load->view('padmin/sidebar');
		$this->load->view('padmin/proyek/proyek',$x);
		$this->load->view('padmin/footer',$g);
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
		$y['title']='Data User';
		$kode=$this->uri->segment(3);
		$x['data']=$this->m_padmin->get_proyek_bidang_by_kode($kode);
		$this->load->view('padmin/header',$y);
		$this->load->view('padmin/sidebar');
		$this->load->view('padmin/proyek/proyek_bidang',$x);
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
		if ($_SESSION['level']=='admin'){
			$x['data']=$this->m_padmin->get_all_pelaksana();
		}
		else {
			$usernik=$_SESSION['usernik'];
			$x['data']=$this->m_padmin->get_all_pelaksana_by_user($usernik);	
		}
		$y['title']='Penanggung Jawab';
		$this->load->view('padmin/header',$y);
		$this->load->view('padmin/sidebar');
		$this->load->view('padmin/proyek/penanggung_jawab',$x);
		$this->load->view('padmin/footer');
	}
	public function tambah_penanggung_jawab(){
		$x['data']=$this->m_padmin->get_proyek();
		$y['title']='Tambah Penanggung Jawab';
		$this->load->view('padmin/header',$y);
		$this->load->view('padmin/sidebar');
		$this->load->view('padmin/proyek/tambah_penanggung_jawab',$x);
		$this->load->view('padmin/footer');
	}



	public function uplampiran(){
		$y['title']='Data User';
		$kode=$this->uri->segment(3);
		$x['data']=$this->m_padmin->get_proyek_bidang_by_kode($kode);
		$this->load->view('padmin/header',$y);
		$this->load->view('padmin/sidebar');
		$this->load->view('padmin/proyek/uplampiran',$x);
		$this->load->view('padmin/footer');
	}

	public function download(){

		$kode = $this->uri->segment(3);
		$this->m_padmin->getDown($kode);
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
		$x['file']=$this->m_padmin->get_data_file($kode);
		$x['foto']=$this->m_padmin->get_data_foto($kode);
		$x['chartrt']=$this->m_padmin->get_chart_rt($kode);
		$x['charttdk']=$this->m_padmin->get_chart_tdk($kode);
		$x['bbc']=$this->m_padmin->get_penannggung_jawab($kode);
		$y['title']='Detail Proyek';
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
		$y['title']='Tambah Proyek';
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

	

	function save_penanggung_jawab(){
		$proyek_id=$this->input->post('proyek');
		$xnip=$this->input->post('xnip');
		$xnampeke=$this->input->post('xnama_pek');
		$xtelpeke=$this->input->post('xtel_pek');
		$xpekjenis=$this->input->post('xjenis');
		$xnamdirek=$this->input->post('xnama_direk');
		$xteldirek=$this->input->post('xtel_direk');
		$xnamaperus=$this->input->post('xnama_perus');
		$xalaperus=$this->input->post('xalamat_perus');
		$xtelkant=$this->input->post('xtel_kant');
		$pekerja=$this->m_padmin->save_pekerja($proyek_id,$xnip,$xnampeke,$xtelpeke,$xpekjenis,$xnamdirek,$xteldirek,$xnamaperus,$xalaperus,$xtelkant);

		echo $this->session->set_flashdata('msg','success');
		redirect('padmin/penanggung_jawab');		
		
	}
	function save_proyek(){

		$numproyek=$this->input->post('numproyek');
		$xnama=$this->input->post('xnama');
		$year=$this->input->post('year');
		$keuangan=$this->input->post('keuangan');
		$pagu=$this->input->post('pagu');
		$sechawal=$this->input->post('sechawal');
		$awalkontrak=$this->input->post('awalkontrak');
		$akhirkontrak=$this->input->post('akhirkontrak');
		$xbidang=$this->input->post('xbidang');
		$xjenis=$this->input->post('xjenis');
		$xvolume=$this->input->post('xvolume');
		$xsatuan=$this->input->post('xsatuan');

		$numkor=$this->input->post('numkor');
		$inputAddress=$this->input->post('inputAddress');
		$namkor=$this->input->post('namkor');
		$latitude=$this->input->post('latitude');
		$longitude=$this->input->post('longitude');
		$nikuser=$this->input->post('xnikuser');
		$namauser=$this->input->post('xnamauser');
		$emailuser=$this->input->post('xemailuser');
		$telpuser=$this->input->post('xtelpuser');

		$svuser=$this->m_padmin->save_user_proyek($nikuser,$namauser,$emailuser,$telpuser);
		if($svuser){

			$svkoor=$this->m_padmin->save_koordinat($numkor,$namkor,$latitude,$longitude,$inputAddress);
		}
		else {

			echo $this->session->set_flashdata('msg','warning');
			redirect('padmin/tambah_proyek');		
		}
		if ($svkoor){

			$svpro=$this->m_padmin->save_proyek($numproyek,$nikuser,$numkor,$xnama,$year,$keuangan,$pagu,$sechawal,$awalkontrak,$akhirkontrak,$xbidang,$xjenis,$xvolume,$xsatuan);
			$svpro=$this->m_padmin->save_proyek_bagian($numproyek);
			echo $this->session->set_flashdata('msg','success');
			redirect('padmin/proyek');
		}
		else {

			echo $this->session->set_flashdata('msg','warning');
			redirect('padmin/tambah_proyek');
		}
	}
	function save_user(){
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
				$user_nik=$this->input->post('xnik');
				$nama=$this->input->post('xnama');
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
						$this->m_padmin->save_user($user_nik,$nama,$username,$password,$tel,$email,$bagian,$gambar,$level);
						echo $this->session->set_flashdata('msg','success');
						redirect('padmin/user');	
					}
					else {
						echo $this->session->set_flashdata('msg','warning');
						redirect('padmin/tambah_user');
					}
				}

			}else{
				echo $this->session->set_flashdata('msg','warning');
				redirect('padmin/tambah_user');
			}

		}else{
			redirect('padmin/tambah_user');
		}

	}
	function save_dinaspu(){

		$nik=$this->input->post('xnik');
		$nama=$this->input->post('xnama');
		$tel=$this->input->post('xtel');
		$bag=$this->input->post('xbag');
		$this->m_padmin->save_dinaspu($nik,$nama,$tel,$bag);
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
		$x['data']=$this->m_padmin->get_detail_proyek_by_kode($kode);
		$this->load->view('padmin/header');
		$this->load->view('padmin/sidebar');		
		$this->load->view('padmin/proyek/edit_proyek',$x);
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
		$x['datak']=$this->m_padmin->get_all_proyek();
		$this->load->view('padmin/header');
		$this->load->view('padmin/sidebar');		
		$this->load->view('padmin/proyek/edit_pn',$x);
		$this->load->view('padmin/footer');
	}  

	function get_edit_user(){
		$kode=$this->uri->segment(3);
		$x['data']=$this->m_padmin->get_all_user_by_kode($kode);
		$this->load->view('padmin/header');
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

	function update_proyek(){


		$proyek_id=$this->input->post('xproyek_id');
		$xnama=$this->input->post('xnama');
		$year=$this->input->post('year');
		$keuangan=$this->input->post('keuangan');
		$pagu=$this->input->post('pagu');
		$sechawal=$this->input->post('sechawal');
		$awalkontrak=$this->input->post('awalkontrak');
		$akhirkontrak=$this->input->post('akhirkontrak');
		$xbidang=$this->input->post('xbidang');
		$xjenis=$this->input->post('xjenis');
		$xvolume=$this->input->post('xvolume');
		$xsatuan=$this->input->post('xsatuan');

		$numkor=$this->input->post('numkor');
		$inputAddress=$this->input->post('inputAddress');
		$namkor=$this->input->post('namkor');
		$latitude=$this->input->post('latitude');
		$longitude=$this->input->post('longitude');
		

		$svkoor=$this->m_padmin->update_koordinat($numkor,$namkor,$latitude,$longitude,$inputAddress);
		
		if ($svkoor){

			$this->m_padmin->update_proyek($proyek_id,$numkor,$xnama,$year,$keuangan,$pagu,$sechawal,$awalkontrak,$akhirkontrak,$xbidang,$jenis,$volume,$satuan);
			echo $this->session->set_flashdata('msg','success');
			redirect('padmin/proyek');
		}
		else {

			echo $this->session->set_flashdata('msg','warning');
			redirect('padmin/tambah_proyek');
		}

	}
	function update_pn(){
		$proyek_id=$this->input->post('proyek');
		$xnip=$this->input->post('xnip');
		$xnampeke=$this->input->post('xnama_pek');
		$xtelpeke=$this->input->post('xtel_pek');
		$xpekjenis=$this->input->post('xjenis');
		$xnamdirek=$this->input->post('xnama_direk');
		$xteldirek=$this->input->post('xtel_direk');
		$xnamaperus=$this->input->post('xnama_perus');
		$xalaperus=$this->input->post('xalamat_perus');
		$xtelkant=$this->input->post('xtel_kant');
		$pekerja=$this->m_padmin->update_pn($proyek_id,$xnip,$xnampeke,$xtelpeke,$xpekjenis,$xnamdirek,$xteldirek,$xnamaperus,$xalaperus,$xtelkant);

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
				$user_nik=$this->input->post('xnik');
				$user_nama=$this->input->post('xnama');
				$xusername=$this->input->post('xusername');
				$user_email=$this->input->post('xemail');
				$user_tel=$this->input->post('xtel');
				$user_bagian=$this->input->post('xbagian');
				$user_level=$this->input->post('xlevel');
				$this->m_padmin->update_user($user_nik,$user_nama,$xusername,$user_email,$user_tel,$user_bagian,$user_level,$gambar);
				echo $this->session->set_flashdata('msg','info');
				redirect('padmin/user');
			}else{
				echo $this->session->set_flashdata('msg','warning');
				redirect('padmin/user');
			}

		}else{
			$user_nik=$this->input->post('xnik');
			$user_nama=$this->input->post('xnama');
			$xusername=$this->input->post('xusername');
			$user_email=$this->input->post('xemail');
			$user_tel=$this->input->post('xtel');
			$user_bagian=$this->input->post('xbagian');
			$user_level=$this->input->post('xlevel');
			$this->m_padmin->update_user_wo_img($user_nik,$user_nama,$xusername,$user_email,$user_tel,$user_bagian,$user_level);
			echo $this->session->set_flashdata('msg','info');
			redirect('padmin/user');
		} 

	}


	function save_proyek_bidang(){

		$pbtarget=$this->input->post('pbtarget');
		$pbreal=$this->input->post('pbreal');
		$pbdevisi=$this->input->post('pbdevisi');
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


		$proyek_id=$this->input->post('proyek_id');
		$pbtarget=$this->input->post('pbtarget');
		$pbreal=$this->input->post('pbreal');
		$pbdevisi=$this->input->post('pbdevisi');
		$dskontrak=$this->input->post('dskontrak');
		$dsadmproyek=$this->input->post('dsadmproyek');
		$totalds=$this->input->post('totalds');
		$sisaanggran=$this->input->post('sisaanggran');
		$ggc=$this->m_padmin->tambah_proyek_bidang($proyek_id,$pbtarget,$pbreal,$pbdevisi,$dskontrak,$dsadmproyek,$totalds,$sisaanggran,$statproyek);
		echo $this->session->set_flashdata('msg','info');
		redirect('padmin/proyek');


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
				$config['height']= 450;
				$config['new_image']= './assets/images/'.$gbr['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();

				$gambar=$gbr['file_name'];
				$proyek_id=$this->input->post('proyek_id');
				$jenis=$this->input->post('jenis');
				$ggc=$this->m_padmin->save_lampiran_foto($proyek_id,$gambar,$jenis);
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
				$jenis=$this->input->post('jenis');
				$ggc=$this->m_padmin->save_lampiran_file($proyek_id,$gambar,$jenis);
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
		$usernik=$this->input->post('usernik');

		if($xhp==$oldpass)
		{
			if($newpass==$newrepass){
				$this->m_padmin->update_password_user($usernik,$newpass);
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