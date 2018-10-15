<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/plugins/toast/jquery.toast.min.css'?>"/>
<div class="content-wrapper">
	<section class="content-header">
		<div class="row">
			<?php if($_SESSION['level']=='bidang'){ ?>
				<div class="col-md-12 ">
					<a class="btn btn-success btn-flat pull-right" href="<?php echo base_url().'padmin/tambah_penanggung_jawab'?>"><span class="fa fa-plus"></span> Tambah Penyedia Jasa</a>
				</div>
			<?php } else {} ?>
		</div>
	</section>

	<div class="row" style="margin-top: 50px;">
		<div class="col-md-12">
			<?php
			$no=0;
			foreach ($data->result_array() as $i) :
				$no++;
				$pekerja_id=$i['pekerja_id'];
				$proyek_nama=$i['proyek_nama'];
				$pekerja_jenis=$i['pekerja_jenis'];
				$pekerja_nama_direktur=$i['pekerja_nama_direktur'];
				$pekerja_tel_direktur=$i['pekerja_tel_direktur'];
				$pekerja_nama_perusahaan=$i['pekerja_nama_perusahaan'];
				$pekerja_tel_kantor=$i['pekerja_tel_kantor'];

				?>

				<div class="col-md-6">
					<div class="box">

						<div class="box-body">
							<div class="row">
								<div class="col-md-3">
									<img class="img-responsive" src="<?php echo base_url().'assets/images/user_blank.png';?>" alt="Photo" style="border:1px solid; border-radius:90px;height:100px;width:100px;margin:0 auto;">
								</div>
								<!-- /.col -->
								<div class="col-md-9">
									<div class="col-md-8">
										<h4><?php echo $pekerja_nama_perusahaan;?></h4>
									</div>
									<div class="col-md-4">
										<div class="box-tools pull-right">


											<a href="<?php echo base_url().'padmin/get_edit_pn/'.$pekerja_id;?>" class="btn btn-box-tool" ><i class="fa fa-pencil text-info"></i>
											</a>
											<a data-toggle="modal" data-target="#ModalHapus<?php echo $pekerja_id;?>" class="btn btn-box-tool"><i class="fa fa-times text-danger"></i></a>




										</div>
									</div>
									<div class="col-md-12">

										<?php echo $pekerja_jenis;?>
									</div>
									<div class="col-md-8">

										<?php echo $pekerja_tel_kantor;?>
									</div>
									<div class="col-md-4">

										<div class="box-tools pull-right">
											<?php echo $proyek_nama;?>


										</div>
									</div>
								</div>

							</div>
							<!-- /.row -->
						</div>
						<div class="box-footer">
							<div class="row">
								<div class="col-md-9 pull-right">
									<div class="col-md-9">
										<span class="description-percentage text-bold"><?php echo $pekerja_nama_direktur;?> - <?php echo $pekerja_tel_direktur;?></span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach;?>
		</div>
	</div>
</div>

<?php foreach ($data->result_array() as $i) :
	$pekerja_id=$i['pekerja_id'];
	$pekerja_nama=$i['pekerja_nama_direktur'];
	?>
	<div class="modal fade" id="ModalHapus<?php echo $pekerja_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

		<div class="modal-dialog modal-sm"  role="document">
			<div class="modal-content text-center" >

				<form class="form-horizontal" action="<?php echo base_url().'padmin/delete_pn'?>" method="post" enctype="multipart/form-data">
					<div class="modal-body container-fluid text-center" >   
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>    
						<div class="col-md-12">
							<input type="hidden" name="kode" value="<?php echo $pekerja_id;?>"/> 
							<h3 class="text-center"><?php echo $pekerja_nama; ?></h3>
						</div>  
						<div class="col-md-12">
							<div class="iconcolor">
								<i class="fa fa-warning" style="font-size:128px;color:red"></i>
							</div>
						</div>
						<div class="col-md-12">
							<br>
							Apakah Anda yakin ingin menghapus data ini ?
						</div>
						<div class="col-md-12"><br>
							<button type="submit" class="btn btn-primary btn-round col-md-12" id="simpan">Hapus</button>
						</div>
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
