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
			<div class="row">
				<div class="col-md-12">
					<div class="box box-default">
						<div class="box-header with-border">
							<h3 class="box-title">Nama Proyek</h3>
						</div>

						<div class="box-body">
							<div class="row">
								<div class="col-md-10">
									<input type="hidden" name="numproyek" value="<?php echo $numproyek; ?>">
									<input type="text" name="xnama" class="form-control" placeholder="Nama Proyek" required/>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<button type="submit" class="btn btn-primary btn-block pull-right bg-green-gradient"></span> Konfirmasi</button>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12">
					<!-- Custom Tabs -->
					<div class="nav-tabs-custom">
						<ul class="nav nav-tabs">
							<li class="active"><a href="#tab_1" data-toggle="tab"><h4 style="font-family:Open Sans; font-weight:lighter;">Proyek</h4></a></li>
							<li><a href="#tab_2" data-toggle="tab"><h4 style="font-family:Open Sans; font-weight:lighter;">Lokasi</h4></a></li>
							<li><a href="#tab_3" data-toggle="tab"><h4 style="font-family:Open Sans; font-weight:lighter;">Selesai</h4></a></li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane active" id="tab_1">
								<div class="box-body">
									<div class="col-md-10">
										<div class="form-group">
											<label><h5 style="font-family:Open Sans; font-weight:lighter;">NAMA PROYEK</h5></label>
											<input type="text" class="form-control" name="xnama" style="font-family:Open Sans; font-weight:lighter;">
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
							</div>
							<!-- /.tab-pane -->
							<div class="tab-pane" id="tab_2">
								<div class="box-body">
									<div class="col-md-6">
										<div class="form-group">
											<label><h5 style="font-family:Open Sans; font-weight:lighter;">NAMA PROYEK</h5></label>
											<input type="text" class="form-control" name="xnama" style="font-family:Open Sans; font-weight:lighter;">
										</div>
									</div>
									<div class="col-md-6">
										
										<div class="form-group">
											<label>Nama Lokasi</label>
											<input type="text" class="form-control"  name="namkor" >
										</div>
										<div class="form-group">
											<label>Alamat</label>
											<input type="hidden" name="numkor" value="<?php echo $numkor; ?>">
											<input type="text" class="inputAddress input-xxlarge form-control" value="Jambi, Kota Jambi, Jambi, Indonesia" name="inputAddress" autocomplete="off" placeholder="Type in your address">
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
								</div>
							</div>

							<div class="tab-pane" id="tab_3">
								<div class="box-body">
									<div class="form-group">
										<label>Nama</label>
										<input type="text" class="form-control"  name="pn_nama" >
									</div>
									<div class="form-group">
										<label>Email</label>
										<input type="text" class="form-control"  name="pn_email" >
									</div>
									<div class="form-group">
										<label>Telepon</label>
										<input type="text" class="form-control"  name="pn_tel" >
									</div>
									<div class="form-group">
										<label>Bidang</label>
										<select class="form-control"  name="pn_bagian" >
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
										<input type="file" class="form-control"  name="filefoto" >
									</div>
								</div>
							</div>
						</div>
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
