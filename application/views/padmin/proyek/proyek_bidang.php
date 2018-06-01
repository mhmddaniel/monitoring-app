<?php $b=$data->row_array(); ?>
<link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/Ionicons/css/ionicons.min.css">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/AdminLTE.min.css">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/skins/_all-skins.min.css">
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

<div class="content-wrapper">
	<section class="content-header">
		<h1>
			Proyek
			<small></small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url()?>padmin"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="<?php echo base_url()?>padmin/proyek">Proyek</a></li>
			<li class="active">Data Bagian</li>
		</ol>
	</section>
	<section class="content">

		<div class="row">
			<div class="col-md-12">
				<form name='autoSumForm'  action="<?php echo base_url()?>padmin/save_proyek_bidang" method="POST" enctype="multipart/form-data" >
					<div class="box box-warning">
						<div class="box-header with-border">
							<h3 class="box-title">Data Bagian</h3>
						</div>
						<div class="box-body">
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label>Target</label>
										<input type='text' name='pbtarget' class="form-control" onFocus="startCalc();" value="<?php echo $b['pb_target']; ?>" onBlur="stopCalc();" />
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Real</label>
										<input type='text' name='pbreal' class="form-control" onFocus="startCalc();" value="<?php echo $b['pb_real']; ?>" onBlur="stopCalc();" />
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Devisi</label>
										<input type='text' name='pbdevisi' class="form-control" onFocus="startCalc();" value="<?php echo $b['pb_devisi']; ?>" onBlur="stopCalc();" />
									</div>
								</div>
							</div>
							<?php 
							?>



							<div class="form-group">
								<label>Daya Serap Kontrak</label>
								<input type="hidden" name="proyek_id" value="<?php echo $b['proyek_id']; ?>">
								<input type='text' name='dskontrak' class="form-control" onFocus="startCalc();" value="<?php echo $b['pb_ds_kontrak']; ?>" onBlur="stopCalc();" />
							</div>
							<div class="form-group">
								<label>	Daya Serap Administrasi Proyek</label>
								<input type='text' name='dsadmproyek' class="form-control" onFocus="startCalc();" value="<?php echo $b['pb_ds_ap']; ?>" onBlur="stopCalc();" />
							</div>
							<div class="form-group">
								<label>Total Daya Serap Keuangan</label>
								<input type='text' name="totalds" class="form-control" onFocus="startCalc();" value="<?php echo $b['pb_ds_keuangan']; ?>" onBlur="stopCalc();"  />
							</div>

							<div class="form-group">
								<label>Pagu</label>
								<input type="text"  name="pagu" class="form-control" value="<?php echo $b['proyek_pagu']; ?>"  readonly>
							</div>
							<div class="form-group">
								<label>Sisa Anggaran</label>
								<input type="text" value="<?php echo $b['pb_sisa_anggaran']; ?>" name="sisaanggran" class="form-control"  readonly>
							</div>
							<div class="form-group pull-right">
								<button type="submit" class="btn btn-primary btn-flat pull-right"><span class="fa fa-pencil"></span> Publish</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</section>
</div>

<script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/bower_components/ckeditor/ckeditor.js"></script>

<script>
	$(function () {
		CKEDITOR.replace('ckeditor')
		$('.textarea').wysihtml5()
	})
</script>


<script src="<?php echo base_url() ?>assets/map/jquery-1.9.1.min.js"></script>
<script src="<?php echo base_url() ?>assets/map/jquery.addressPickerByGiro.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAogXD-AHrsmnWinZIyhRORJ84bgLwDPpg&sensor=false&language=id"></script>
<link href="<?php echo base_url() ?>assets/map/jquery.addressPickerByGiro.css" rel="stylesheet" media="screen">
<script>
	$('.inputAddress').addressPickerByGiro({
		distanceWidget: true,
		boundElements: {
			'latitude': '.latitude',
			'longitude': '.longitude',
			'formatted_address': '.formatted_address'
		}
	});
</script>
</body>
</html>



<script><!--

	function startCalc(){
		interval = setInterval("calc()",1);}
		function calc(){
			one = document.autoSumForm.dskontrak.value;
			two = document.autoSumForm.dsadmproyek.value;
			document.autoSumForm.totalds.value = (one*1) + (two*1) ;

			pbtarget = document.autoSumForm.pbtarget.value;
			pbreal = document.autoSumForm.pbreal.value;
			document.autoSumForm.pbdevisi.value = (pbreal*1) - (pbtarget*1)  ;

			three = document.autoSumForm.totalds.value;
			four = document.autoSumForm.pagu.value;
			document.autoSumForm.sisaanggran.value = (four*1) - (three*1)   ;

		}
		function stopCalc(){
			clearInterval(interval);}
		</script>