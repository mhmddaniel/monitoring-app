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
			Data Bagian
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
			<div class="col-md-6 col-md-offset-3">

				<div class="box box-warning">
					<div class="box-header with-border">
						<h3 class="box-title">Foto Proyek</h3>
					</div>
					<div class="box-body">
						<div class="row">
							<form action="<?php echo base_url()?>padmin/save_lampiran_foto" method="POST" enctype="multipart/form-data" >
								<div class="form-group col-md-12">
									<label>Foto</label>
									<input type="hidden" name="proyek_id" value="<?php echo $b['proyek_id']; ?>">
									<input type="file"  name="filefoto" class="form-control btn-success">
									<input type="hidden"  name="jenis" value="foto" class="form-control">		
								</div>
								<div class="form-group col-md-12">
									<div class="form-group pull-right">
										<button type="submit" class="btn btn-primary btn-flat pull-right"><span class="fa fa-pencil"></span> Publish</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>



				<div class="box box-warning">
					<div class="box-header with-border">
						<h3 class="box-title">Lampiran Proyek</h3>
					</div>
					<div class="box-body">
						<div class="row">
							<form action="<?php echo base_url()?>padmin/save_lampiran_file" method="POST" enctype="multipart/form-data" >
								<div class="form-group col-md-12">
									<label>LAMPIRAN</label>
									<input type="hidden" name="proyek_id" value="<?php echo $b['proyek_id']; ?>">
									<input type="file"  name="fileat" class="form-control btn-success">
									<input type="hidden"  name="jenis" value="file" class="form-control">
								</div>

								<div class="form-group col-md-12">
									<div class="form-group pull-right">
										<button type="submit" class="btn btn-primary btn-flat pull-right"><span class="fa fa-pencil"></span> Publish</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>

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