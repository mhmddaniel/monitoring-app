<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/plugins/toast/jquery.toast.min.css'?>"/>
<div class="content-wrapper">
	<section class="content-header">
		<h1>
			Pelaksana
			<small></small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url()?>padmin"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="<?php echo base_url() ?>padmin/proyek">Proyek</a></li>
			<li class="active">Pelaksana</li>
		</ol>
	</section>

	<section class="content">
		<div class="row">
			<div class="col-md-12">

				<div class="box">
					
					<?php if($_SESSION['level']=='admin'){ ?>
					<div class="box-header">
						<a class="btn btn-success btn-flat " href="<?php echo base_url().'padmin/tambah_penanggung_jawab'?>"><span class="fa fa-plus"></span> Tambah Pelaksana</a>
					</div>

					<?php } else {} ?>
					<div class="box-body">
						<table id="example1" class="table table-striped" style="font-size:13px;">
							<thead>
								<tr>
									<th>Proyek</th>
									<th>Pelaksana</th>
									<th>Posisi</th>
									<th>Telepon</th>
									<th>Nama Direktur</th>
									<th>Telepon Direktur</th>
									<th>Nama Perusahaan</th>
									<th>Telepon kantor</th>
									<th style="text-align:right;">Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$no=0;
								foreach ($data->result_array() as $i) :
									$no++;
									$pekerja_nip=$i['pekerja_nip'];
									$proyek_nama=$i['proyek_nama'];
									$pekerja_nama=$i['pekerja_nama'];
									$pekerja_tel=$i['pekerja_tel'];
									$pekerja_jenis=$i['pekerja_jenis'];
									$pekerja_nama_direktur=$i['pekerja_nama_direktur'];
									$pekerja_tel_direktur=$i['pekerja_tel_direktur'];
									$pekerja_nama_perusahaan=$i['pekerja_nama_perusahaan'];
									$pekerja_tel_kantor=$i['pekerja_tel_kantor'];

									?>
									<tr>
										<td><?php echo $proyek_nama;?></td>
										<td><?php echo $pekerja_nama;?></td>
										<td><?php echo $pekerja_jenis;?></td>
										<td><?php echo $pekerja_tel;?></td>
										<td><?php echo $pekerja_nama_direktur;?></td>
										<td><?php echo $pekerja_tel_direktur;?></td>
										<td><?php echo $pekerja_nama_perusahaan;?></td>
										<td><?php echo $pekerja_tel_kantor;?></td>
										<td style="text-align:right;">
											<div class="btn-group">
												<button type="button" class="btn btn-success btn-flat">Action</button>
												<button type="button" class="btn btn-success btn-flat dropdown-toggle" data-toggle="dropdown">
													<span class="caret"></span>
													<span class="sr-only">Toggle Dropdown</span>
												</button>
												<ul class="dropdown-menu" role="menu">
													<li><a href="<?php echo base_url().'padmin/get_edit_pn/'.$pekerja_nip;?>"><span class="fa fa-pencil"></span>Edit</a></li>
													<li><a data-toggle="modal" data-target="#ModalHapus<?php echo $pekerja_nip;?>"><span class="fa fa-trash"></span>Hapus</a></li>
												</ul>
											</div>
										</td>
									</tr>
								<?php endforeach;?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<?php foreach ($data->result_array() as $i) :
$pekerja_nip=$i['pekerja_nip'];
$pekerja_nama=$i['pekerja_nama'];
$pekerja_nama_direktur=$i['pekerja_nama_direktur'];
?>
<div class="modal fade" id="ModalHapus<?php echo $pekerja_nip;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
				<h4 class="modal-title" id="myModalLabel">Hapus Pelaksana</h4>
			</div>
			<form class="form-horizontal" action="<?php echo base_url().'padmin/delete_proyek'?>" method="post" enctype="multipart/form-data">
				<div class="modal-body">       
					<input type="hidden" name="kode" value="<?php echo $pekerja_nip;?>"/> 
					<input type="hidden" value="<?php echo $pekerja_nama_direktur;?>" name="gambar">
					<p>Apakah Anda yakin mau menghapus Pelaksana <b><?php echo $pekerja_nama;?></b> ?</p>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary btn-flat" id="simpan">Hapus</button>
				</div>
			</form>
		</div>
	</div>
</div>
<?php endforeach;?>

<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>

<script type="text/javascript" src="<?php echo base_url().'assets/plugins/toast/jquery.toast.min.js'?>"></script>
<!-- page script -->
<script>
	$(function () {
		$("#example1").DataTable();
		$('#example2').DataTable({
			"paging": true,
			"lengthChange": false,
			"searching": false,
			"ordering": true,
			"info": true,
			"autoWidth": false
		});
	});
</script>
<?php if($this->session->flashdata('msg')=='error'):?>
	<script type="text/javascript">
		$.toast({
			heading: 'Error',
			text: "Password dan Ulangi Password yang Anda masukan tidak sama.",
			showHideTransition: 'slide',
			icon: 'error',
			hideAfter: false,
			position: 'bottom-right',
			bgColor: '#FF4859'
		});
	</script>
	
<?php elseif($this->session->flashdata('msg')=='success'):?>
	<script type="text/javascript">
		$.toast({
			heading: 'Success',
			text: "Berita Berhasil disimpan ke database.",
			showHideTransition: 'slide',
			icon: 'success',
			hideAfter: false,
			position: 'bottom-right',
			bgColor: '#7EC857'
		});
	</script>
<?php elseif($this->session->flashdata('msg')=='info'):?>
	<script type="text/javascript">
		$.toast({
			heading: 'Info',
			text: "Berita berhasil di update",
			showHideTransition: 'slide',
			icon: 'info',
			hideAfter: false,
			position: 'bottom-right',
			bgColor: '#00C9E6'
		});
	</script>
<?php elseif($this->session->flashdata('msg')=='success-hapus'):?>
	<script type="text/javascript">
		$.toast({
			heading: 'Success',
			text: "Berita Berhasil dihapus.",
			showHideTransition: 'slide',
			icon: 'success',
			hideAfter: false,
			position: 'bottom-right',
			bgColor: '#7EC857'
		});
	</script>
<?php else:?>

<?php endif;?>
