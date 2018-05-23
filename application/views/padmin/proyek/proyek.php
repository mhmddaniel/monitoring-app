
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/plugins/toast/jquery.toast.min.css'?>"/>

<style type="text/css">

.gmap3{
	margin: 20px auto;
	border: 1px solid #C0C0C0;
	width: 1000px;
	height: 500px;
}
.cluster{
	color: #FFFFFF;
	text-align:center;
	font-family: 'Arial, Helvetica';
	font-size:11px;
	font-weight:bold;
	cursor: pointer;
}
.cluster-1{
	background-image:url(<?php echo base_url ()?>assets/gmaps/images/m1.png);
	line-height:53px;
	width: 53px;
	height: 52px;
}
.cluster-2{
	background-image:url(<?php echo base_url ()?>assets/gmaps/images/m2.png);
	line-height:53px;
	width: 56px;
	height: 55px;
}
.cluster-3{
	background-image:url(<?php echo base_url ()?>assets/gmaps/images/m3.png);
	line-height:66px;
	width: 66px;
	height: 65px;
}
</style>


<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			proyek List
			<small></small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url()?>padmin"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="<?php echo base_url() ?>padmin/proyek">proyek</a></li>
			<li class="active">List</li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<!-- Custom Tabs -->
				<div class="nav-tabs-custom">
					<ul class="nav nav-tabs">
						<li class="active"><a href="#tab_1" data-toggle="tab">Map</a></li>
						<li><a href="#tab_2" data-toggle="tab">Table</a></li>

						<?php if($_SESSION['level']=='admin'){ ?>
							<li class="pull-right"><a class="btn btn-success btn-flat bg-olive " href="<?php echo base_url().'padmin/tambah_proyek'?>"><span class="fa fa-plus"></span> Tambah proyek</a></li>

						<?php } else {} ?>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="tab_1">
							<div id="test" class="gmap3"></div>
						</div>
						<!-- /.tab-pane -->
						<div class="tab-pane" id="tab_2">
							<div class="box-body">
								<table id="example1" class="table table-striped" style="font-size:13px;">
									<thead>
										<tr>
											<th>Nama Proyek</th>
											<th>Tahun</th>
											<th>Rencana Pelaksanaan</th>
											<th>Pagu</th>
											<th>Jadwal</th>
											<th>Awal Kontrak</th>
											<th>Akhir Kontrak</th>
											<th>Progress</th>
											<th style="text-align:right;">Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$no=0;
										foreach ($data->result_array() as $i) :
											$no++;
											$proyek_id=$i['proyek_id'];
											$proyek_nama=$i['proyek_nama'];
											$proyek_tahun=$i['proyek_tahun'];
											$proyek_keuangan=$i['proyek_keuangan'];
											$proyek_pagu=$i['proyek_pagu'];
											$proyek_sech_awal=$i['proyek_sech_awal'];
											$proyek_awal_kontrak=$i['proyek_awal_kontrak'];
											$proyek_akhir_kontrak=$i['proyek_akhir_kontrak'];
											$koordinat_nama=$i['koordinat_nama'];
											$koordinat_value=$i['koordinat_value'];

											?>
											<tr>
												<td><?php echo $proyek_nama;?></td>
												<td><?php echo $proyek_tahun;?></td>
												<td><?php echo $proyek_keuangan;?></td>
												<td><?php echo $proyek_pagu;?></td>
												<td><?php echo $proyek_sech_awal;?></td>
												<td><?php echo $proyek_awal_kontrak;?></td>
												<td><?php echo $proyek_akhir_kontrak;?></td>
												<td><label class="label bg-red"><?php echo $koordinat_value;?>%</label></td>
												<td style="text-align:right;">
													<div class="btn-group">
														<button type="button" class="btn btn-success btn-flat">Action</button>
														<button type="button" class="btn btn-success btn-flat dropdown-toggle" data-toggle="dropdown">
															<span class="caret"></span>
															<span class="sr-only">Toggle Dropdown</span>
														</button>
														<ul class="dropdown-menu" role="menu">
															<li><a href="<?php echo base_url().'padmin/detail_proyek/'.$proyek_id;?>"><span class="fa fa-expand"></span>Lihat Detail</a></li>
															<div class="divider"></div>

															<?php if($_SESSION['level']=='admin'){ ?>
																<li><a href="<?php echo base_url().'padmin/get_edit_proyek/'.$proyek_id;?>"><span class="fa fa-pencil"></span>Edit</a></li>
																<li><a data-toggle="modal" data-target="#ModalHapus<?php echo $proyek_id;?>"><span class="fa fa-trash"></span>Hapus</a></li>

															<?php }
															else if  ($_SESSION['level']=='bidang'){
																?>
																<li><a href="<?php echo base_url().'padmin/get_proyek_bidang/'.$proyek_id;?>"><span class="fa fa-pencil"></span>Edit</a></li>
																<?php
															}
															else {} ?>
														</ul>

												</div>
											</td>
										</tr>
									<?php endforeach;?>
								</tbody>
							</table>
						</div>
					</div>
					<!-- /.tab-pane -->
				</div>
				<!-- /.tab-content -->
			</div>
			<!-- nav-tabs-custom -->
		</div>
		<!-- /.col -->
	</div>
	<!-- /.row -->
</section>
<!-- /.content -->



</div>
<!-- /.content-wrapper -->

<?php foreach ($data->result_array() as $i) :
	$proyek_id=$i['proyek_id'];
	$proyek_nama=$i['proyek_nama'];
	$proyek_pagu=$i['proyek_pagu'];
	?>
	<!--Modal Hapus Pengguna-->
	<div class="modal fade" id="ModalHapus<?php echo $proyek_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
					<h4 class="modal-title" id="myModalLabel">Hapus Proyek</h4>
				</div>
				<form class="form-horizontal" action="<?php echo base_url().'padmin/delete_proyek'?>" method="post" enctype="multipart/form-data">
					<div class="modal-body">       
						<input type="hidden" name="kode" value="<?php echo $proyek_id;?>"/> 
						<input type="hidden" value="<?php echo $proyek_pagu;?>" name="gambar">
						<p>Apakah Anda yakin mau menghapus Posting <b><?php echo $proyek_nama;?></b> ?</p>

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
<script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyAogXD-AHrsmnWinZIyhRORJ84bgLwDPpg"></script>

<script type="text/javascript" src="<?php echo base_url() ?>assets/gmaps/assets/js/gmap3.js"></script>
<script>
	$(function () {
		$('#test')
		.gmap3({
			center: [-1.7333385,102.7458134],
			zoom: 8
		})

		.cluster({
			size: 200,
			markers: [
			<?php
			$no=0;
			foreach ($data->result_array() as $i) :
				$no++;
				$koordinat_id=$i['koordinat_id'];
				$lat=$i['koordinat_lat'];
				$lng=$i['koordinat_lng'];
				$value=$i['koordinat_value'];
				?>

				{position: [<?php echo $lat;?>, <?php echo $lng;?>], icon: <?php if ($value>50){echo "'https://png.icons8.com/color/50/000000/green-flag.png'";} else{ echo "'https://png.icons8.com/color/50/000000/filled-flag.png'";}?>},

				<?php
			endforeach;
			?> 	
			],
			cb: function (markers) {
				if (markers.length > 1) { 
					if (markers.length < 20) {
						return {
							content: "<div class='cluster cluster-1'>" + markers.length + "</div>",
							x: -26,
							y: -26
						};
					}
					if (markers.length < 50) {
						return {
							content: "<div class='cluster cluster-2'>" + markers.length + "</div>",
							x: -26,
							y: -26
						};
					}
					return {
						content: "<div class='cluster cluster-3'>" + markers.length + "</div>",
						x: -33,
						y: -33
					};
				}
			}
		})
		;
	});
</script>

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
