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
				<form name='autoSumForm'  action="<?php echo base_url()?>padmin/update_anggaran" method="POST" enctype="multipart/form-data" >
					<div class="box box-warning">
						<div class="box-header with-border">
							<h3 class="box-title">Administrasi Proyek</h3>
						</div>
						<div class="box-body">
				
							<div class="form-group">
								<label>Daya Serap Kontrak</label>
								<input type="hidden" name="anggaran_id" value="<?php echo $b['anggaran_id']; ?>">
								<input type='number' name='dayaserap' class="form-control currency" onFocus="startCalc();"  onBlur="stopCalc();" />
								<input type='hidden' name='nondayaserap' class="form-control" onFocus="startCalc();"  onBlur="stopCalc();" />
							</div>
							<div class="form-group">
								<label>Pagu</label>
								<input type="number"  name="pagu" class="form-control" value="<?php echo $b['anggaran_pagu']; ?>"  readonly>
								<input type="hidden"  name="nonformatpagu" class="form-control" value="<?php echo $b['anggaran_pagu']; ?>"  readonly>
							</div>
							<div class="form-group">
								<label>Sisa Anggaran</label>
								<input type="text" value="<?php echo $b['anggaran_pagu']; ?>" name="formatanggaran" class="form-control currency"  readonly>
								<input type="hidden" value="<?php echo $b['anggaran_pagu']; ?>" name="anggaran" class="form-control"  readonly>
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


<script src="http://afarkas.github.io/webshim/js-webshim/minified/polyfiller.js"></script>
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



<script>
	function FormatDuit(x) {
		var tmp_num;
		var negatif = false;
		if(x<0) {
			negatif = true;
			tmp_num = Math.abs(x);
		} else {
			tmp_num = x;
		}

		var num = tmp_num.toString();
		for(var i=0; i < Math.floor((num.length-(1+i))/3); i++)
			num=num.substring(0,num.length-(4*i+3)) + ',' + num.substring(num.length-(4*i+3));
		if(negatif) { num = '-'+num; }
		return(num);
	}  

	function startCalc(){
		interval = setInterval("calc()",1);}
		function calc(){


			one = document.autoSumForm.dayaserap.value;
			document.autoSumForm.nondayaserap.value = (one) ;
			four = document.autoSumForm.nonformatpagu.value;
			document.autoSumForm.formatanggaran.value = FormatDuit((four*1) - (one*1))   ;
			document.autoSumForm.anggaran.value = (four*1) - (one*1)   ;

		}
		function stopCalc(){
			clearInterval(interval);}

			webshims.setOptions('forms-ext', {
				replaceUI: 'auto',
				types: 'number'
			});
			webshims.polyfill('forms forms-ext');
		</script>