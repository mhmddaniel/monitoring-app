<style type="text/css">
/* Latest compiled and minified CSS included as External Resource*/

/* Optional theme */

/*@import url('//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-theme.min.css');*/
body {
	margin-top:30px;
}
.stepwizard-step p {
	margin-top: 0px;
	color:#666;
}
.stepwizard-row {
	display: table-row;
}
.stepwizard {
	display: table;
	width: 100%;
	position: relative;
}
.stepwizard-step button[disabled] {
    /*opacity: 1 !important;
    filter: alpha(opacity=100) !important;*/
}
.stepwizard .btn.disabled, .stepwizard .btn[disabled], .stepwizard fieldset[disabled] .btn {
	opacity:1 !important;
	color:#bbb;
}
.stepwizard-row:before {
	top: 14px;
	bottom: 0;
	position: absolute;
	content:" ";
	width: 100%;
	height: 1px;
	background-color: #ccc;
	z-index: 0;
}
.stepwizard-step {
	display: table-cell;
	text-align: center;
	position: relative;
}
.btn-circle {
	width: 30px;
	height: 30px;
	text-align: center;
	padding: 6px 0;
	font-size: 12px;
	line-height: 1.428571429;
	border-radius: 15px;
}
</style>

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
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Tambah Proyek
			<small></small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url()?>padmin"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="<?php echo base_url() ?>padmin/proyek">Proyek</a></li>
			<li class="active">Tambah Proyek</li>
		</ol>
	</section>




	<form action="<?php echo base_url()?>padmin/save_proyek" method="POST" enctype="multipart/form-data" >
		<section class="content">
			

			<div class="container">
				<div class="stepwizard">
					<div class="stepwizard-row setup-panel">
						<div class="stepwizard-step col-xs-4"> 
							<a href="#step-1" type="button" class="btn btn-success btn-circle"></a>
							<p><small>Proyek</small></p>
						</div>
						<div class="stepwizard-step col-xs-4"> 
							<a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled"></a>
							<p><small>Lokasi</small></p>
						</div>
						<div class="stepwizard-step col-xs-4"> 
							<a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled"></a>
							<p><small>Penanggung Jawab</small></p>
						</div>
					</div>
				</div>

				<div class="panel panel-primary setup-content" id="step-1">
					<div class="panel-heading">
						<h3 class="panel-title">Proyek</h3>
					</div>
					<div class="panel-body">
						<div class="box-body">
							<div class="col-md-10">
								<div class="form-group">
									<label><h5 style="font-family:Open Sans; font-weight:lighter;">NAMA PROYEK</h5></label>
									<input type="hidden" name="numproyek" value="<?php echo $numproyek; ?>">
									<input type="text" class="form-control" name="xnama" required style="font-family:Open Sans; font-weight:lighter;">
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label><h5 style="font-family:Open Sans; font-weight:lighter;">TAHUN</h5></label>
									<input type="number" class="form-control" name="year" value="<?php echo date("Y"); ?>" style="font-family:Open Sans; font-weight:lighter;">
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label><h5 style="font-family:Open Sans; font-weight:lighter;">RENCANA AWAL KONTRAK</h5></label>
									<input type="date" class="form-control" name="sechawal" value="<?php echo date("d/m/Y"); ?>" style="font-family:Open Sans; font-weight:lighter;">
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label><h5 style="font-family:Open Sans; font-weight:lighter;">BIDANG</h5></label>
									<select class="form-control"  name="xbidang" style="font-family:Open Sans; font-weight:lighter;">
										<option value="sda" style="font-family:Open Sans; font-weight:lighter;">Sumber Daya Air</option>
										<option value="bm" style="font-family:Open Sans; font-weight:lighter;">Bina Marga</option>
										<option value="ciptakarya" style="font-family:Open Sans; font-weight:lighter;">Cipta Karya</option>
										<option value="pr" style="font-family:Open Sans; font-weight:lighter;">Perumahan Rakyat</option>
										<option value="sekretariat" style="font-family:Open Sans; font-weight:lighter;">Sekretariat</option>
										<option value="ttdp" style="font-family:Open Sans; font-weight:lighter;">Tata Ruang dan Pertanahan</option>
										<option value="ubp" style="font-family:Open Sans; font-weight:lighter;">UPTD Balai Pengujian</option>
										<option value="ubpdp" style="font-family:Open Sans; font-weight:lighter;">UPTD Balai Peralatan dan Perbekalan</option>
										<option value="bkdp style="font-family:Open Sans; font-weight:lighter;"">Bina Kontruksi dan Pengendalian</option>
									</select>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label><h5 style="font-family:Open Sans; font-weight:lighter;">JENIS PENGADAAN</h5></label>
									<select class="form-control"  name="xjenis" style="font-family:Open Sans; font-weight:lighter;">
										<option value="#" style="font-family:Open Sans; font-weight:lighter;">Semua</option>
										<option value="leum" style="font-family:Open Sans; font-weight:lighter;">Lelang Umum</option>
										<option value="lena" style="font-family:Open Sans; font-weight:lighter;">Lelang Sederhana</option>
										<option value="letas" style="font-family:Open Sans; font-weight:lighter;">Lelang Terbatas</option>
										<option value="selmum" style="font-family:Open Sans; font-weight:lighter;">Seleksi Umum</option>
										<option value="pmlangsung" style="font-family:Open Sans; font-weight:lighter;">Pemilihan Langsung</option>
										<option value="pnlangsung" style="font-family:Open Sans; font-weight:lighter;">Penunjukan Langsung</option>
										<option value="pglangsung" style="font-family:Open Sans; font-weight:lighter;">Pengadaan Langsung</option>
										<option value="epurchas" style="font-family:Open Sans; font-weight:lighter;">E-Purchasing</option>
										<option value="sayembara" style="font-family:Open Sans; font-weight:lighter;">Sayembara</option>
										<option value="kontes" style="font-family:Open Sans; font-weight:lighter;">Kontes</option>
										<option value="lelce" style="font-family:Open Sans; font-weight:lighter;">Lelang Cepat</option>
										<option value="selsed" style="font-family:Open Sans; font-weight:lighter;">Seleksi Sederhana</option>
									</select>
								</div>
							</div><div class="col-md-10">
								<label><h5 style="font-family:Open Sans; font-weight:lighter;">VOLUME</h5></label>
								<div class="form-group">
									<input type="number" name="xvolume" class="form-control" style="font-family:Open Sans; font-weight:lighter;">
								</div>
							</div>
							<div class="col-md-2">
								<label><h5 style="font-family:Open Sans; font-weight:lighter;">SATUAN</h5></label>
								<div class="form-group">
									<input type="text" name="xsatuan" class="form-control" style="font-family:Open Sans; font-weight:lighter;">
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label><h5 style="font-family:Open Sans; font-weight:lighter;">NILAI KONTRAK</h5></label>
									<input type="text" class="form-control" id="keuangan" name="keuangan" style="font-family:Open Sans; font-weight:lighter;">
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label><h5 style="font-family:Open Sans; font-weight:lighter;">PAGU</h5></label>
									<input type="text" class="form-control" id="pagu" name="pagu" style="font-family:Open Sans; font-weight:lighter;">
								</div>
							</div>

						</div>
						<button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
					</div>
				</div>

				<div class="panel panel-primary setup-content" id="step-2">
					<div class="panel-heading">
						<h3 class="panel-title">Lokasi</h3>
					</div>
					<div class="panel-body">

						<div class="col-md-6">

							
							<div class="form-group">
								<label>Alamat</label>
								<input type="hidden" name="numkor" value="<?php echo $numkor; ?>">
								<input type="text" class="inputAddress input-xxlarge form-control" value="Jambi, Kota Jambi, Jambi, Indonesia" name="inputAddress" autocomplete="off" placeholder="Type in your address">
							</div>		
						</div>
						<div class="col-md-6">

							<div class="form-group">
								<label>Nama Lokasi</label>
								<input type="text" class="form-control"  name="namkor" >
							</div>
							<div class="form-group">
								<label>Latitude</label>
								<input type="text" class="latitude form-control" value="latitude" name="latitude" readonly="readonly">
							</div>
							<div class="form-group">
								<label>Longitude</label>
								<input type="text" class="longitude form-control" value="longitude" name="longitude" readonly="readonly">
							</div>
						</div>
						<div class="col-md-12">
							<button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
						</div>
					</div>
				</div>

				<div class="panel panel-primary setup-content" id="step-3">
					<div class="panel-heading">
						<h3 class="panel-title">Penanggung Jawab</h3>
					</div>
					<div class="panel-body">
						<div class="form-group">
							<label>Nama</label>
							<input type="text" class="form-control"  name="pn_nama" required="required">
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="text" class="form-control"  name="pn_email" required="required">
						</div>
						<div class="form-group">
							<label>Telepon</label>
							<input type="text" class="form-control"  name="pn_tel"   required="required">
						</div>
						<div class="form-group">
							<label>Bidang</label>
							<select class="form-control"  name="pn_bagian"  required="required">
								<option value="sda">Sumber Daya Air</option>
								<option value="bm">Bina Marga</option>
								<option value="ciptakarya">Cipta Karya</option>
								<option value="pr">Perumahan Rakyat</option>
								<option value="sekretariat">Sekretariat</option>
								<option value="ttdp">Tata Ruang dan Pertanahan</option>
								<option value="ubp">UPTD Balai Pengujian</option>
								<option value="ubpdp">UPTD Balai Peralatan dan Perbekalan</option>
								<option value="bkdp">Bina Kontruksi dan Pengendalian</option>
							</select>
						</div>

						<div class="form-group">
							<label>Foto</label>
							<input type="file" class="form-control"  name="filefoto" required="required">
						</div>
						<button class="btn btn-success pull-right  bg-green-gradient" type="submit">Finish!</button>
					</div>
				</div>
			</div>
		</div>
	</section>
</form>

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
<script type="text/javascript">
	var pagu = document.getElementById('pagu');
	pagu.addEventListener('keyup', function(e)
	{
		pagu.value = formatRupiah(this.value);
	});
	var keuangan = document.getElementById('keuangan');
	keuangan.addEventListener('keyup', function(e)
	{
		keuangan.value = formatRupiah(this.value);
	});
	function formatRupiah(angka, prefix)
	{
		var number_string = angka.replace(/[^,\d]/g, '').toString(),
		split    = number_string.split(','),
		sisa     = split[0].length % 3,
		rupiah     = split[0].substr(0, sisa),
		ribuan     = split[0].substr(sisa).match(/\d{3}/gi);

		if (ribuan) {
			separator = sisa ? '.' : '';
			rupiah += separator + ribuan.join('.');
		}

		rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
		return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
	}
</script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function () {

		var navListItems = $('div.setup-panel div a'),
		allWells = $('.setup-content'),
		allNextBtn = $('.nextBtn');

		allWells.hide();

		navListItems.click(function (e) {
			e.preventDefault();
			var $target = $($(this).attr('href')),
			$item = $(this);

			if (!$item.hasClass('disabled')) {
				navListItems.removeClass('btn-success').addClass('btn-default');
				$item.addClass('btn-success');
				allWells.hide();
				$target.show();
				$target.find('input:eq(0)').focus();
			}
		});

		allNextBtn.click(function () {
			var curStep = $(this).closest(".setup-content"),
			curStepBtn = curStep.attr("id"),
			nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
			curInputs = curStep.find("input[type='text'],input[type='url']"),
			isValid = true;

			$(".form-group").removeClass("has-error");
			for (var i = 0; i < curInputs.length; i++) {
				if (!curInputs[i].validity.valid) {
					isValid = false;
					$(curInputs[i]).closest(".form-group").addClass("has-error");
				}
			}

			if (isValid) nextStepWizard.removeAttr('disabled').trigger('click');
		});

		$('div.setup-panel div a.btn-success').trigger('click');
	});
</script>