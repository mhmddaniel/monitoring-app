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

	<form action="<?php echo base_url()?>padmin/save_proyek" method="POST">
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
										<button type="submit" class="btn btn-primary btn-flat pull-right"><span class="fa fa-pencil"></span> Publish</button>
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
							<li class="active"><a href="#tab_1" data-toggle="tab">Data Proyek</a></li>
							<li><a href="#tab_2" data-toggle="tab">Lokasi Proyek</a></li>
							<li><a href="#tab_3" data-toggle="tab">Penanggung Jawab</a></li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane active" id="tab_1">
								<div class="box-body">
									<div class="col-md-12">
										<div class="form-group">
											<label>Tahun</label>
											<input type="number" class="form-control" name="year">
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label>Nilai Kontrak</label>
											<input type="number" class="form-control" name="keuangan">
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label>Pagu</label>
											<input type="number" class="form-control" name="pagu">
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label>Rencana Awal Kontrak</label>
											<input type="date" class="form-control" name="sechawal">
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label>Awal Kontrak</label>
											<input type="date" class="form-control" name="awalkontrak">
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label>Akhir Kontrak</label>
											<input type="date" class="form-control" name="akhirkontrak">
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label>Bidang</label>
											<select class="form-control"  name="xbidang" >
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
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label>Jenis Pengadaan</label>
											<select class="form-control"  name="xjenis" >
												<option value="#">Semua</option>
												<option value="leum">Lelang Umum</option>
												<option value="lena">Lelang Sederhana</option>
												<option value="letas">Lelang Terbatas</option>
												<option value="selmum">Seleksi Umum</option>
												<option value="pmlangsung">Pemilihan Langsung</option>
												<option value="pnlangsung">Penunjukan Langsung</option>
												<option value="pglangsung">Pengadaan Langsung</option>
												<option value="epurchas">E-Purchasing</option>
												<option value="sayembara">Sayembara</option>
												<option value="kontes">Kontes</option>
												<option value="lelce">Lelang Cepat</option>
												<option value="selsed">Seleksi Sederhana</option>
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<label>Volume</label>
										<div class="form-group">
											<input type="number" name="xvolume" class="form-control">
										</div>
									</div>
									<div class="col-md-1">
										<label>Satuan</label>
										<div class="form-group">
											<input type="text" name="xsatuan" class="form-control">
										</div>
									</div>
								</div>
							</div>
							<!-- /.tab-pane -->
							<div class="tab-pane" id="tab_2">
								<div class="box-body">
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
							<div class="tab-pane" id="tab_3">

								<div class="box-body">

									<div class="col-md-12">

										<div class="form-group">
											<label>Nama PPK</label>
											<input type="text" class="form-control"  name="xnamauser" >
										</div>	
										<div class="form-group">
											<label>NIK PPK</label>
											<input type="text" class="form-control"  name="xnikuser" >
										</div>
										<div class="form-group">
											<label>Email</label>
											<input type="text" class="form-control"  name="xemailuser" >
										</div>	
										<div class="form-group">
											<label>Telp</label>
											<input type="text" class="form-control"  name="xtelpuser" >
										</div>	
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
