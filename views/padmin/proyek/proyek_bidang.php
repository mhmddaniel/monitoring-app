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
			Pekerjaan
			<small></small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url()?>padmin"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="<?php echo base_url()?>padmin/proyek">Pekerjaan</a></li>
			<li class="active">Data Bagian</li>
		</ol>
	</section>
	<section class="content">

		<div class="row">
			<div class="col-md-3">
				<div class="box box-warning">
					<div class="box-header with-border">
						<h3 class="box-title">Data Fisik</h3>
					</div>
					<div class="box-body">
						<div class="row">
							<form name=''  action="<?php echo base_url()?>padmin/save_proyek_bidang" method="POST" enctype="multipart/form-data" >
								<div class="col-md-4">
									<div class="form-group">
										<label>Target</label>
										<input type="hidden" name="proyek_id" value="<?php echo $this->uri->segment(3); ?>">
										<input type='text' name='pbtarget' id="pbtarget" class="form-control" onFocus="startCalc();" value="<?php echo $b['pb_target']; ?>" onBlur="stopCalc();" />
										<input type="hidden" name="jenis" value="fisik">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Real</label>
										<input type='text' name='pbreal' id="pbreal" class="form-control" onFocus="startCalc();" value="<?php echo $b['pb_real']; ?>" onBlur="stopCalc();" />
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Devisi</label>
										<input type='text' name='pbdevisi' id="pbdevisi" class="form-control" onFocus="startCalc();" value="<?php echo $b['pb_devisi']; ?>" onBlur="stopCalc();" />
									</div>
								</div>

								<div class="col-md-12">
									<div class="form-group">
										<label>Tanggal Progress</label>
										<input type="date" name="tanggal_prog" class="form-control">
									</div>
								</div>
								<div class="col-md-12">
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
						<h3 class="box-title">Data Keuangan</h3>
					</div><br>
					<div class="box-body">
						<form name=''  action="<?php echo base_url()?>padmin/save_proyek_bidang" method="POST" enctype="multipart/form-data" >

							<div class="form-group">
								<label>Daya Serap Kontrak</label>
								<input type="hidden" name="proyek_id" value="<?php echo $b['proyek_id']; ?>">
								<input type='number' id="dskontrak" name='dskontrak' class="form-control currency" onFocus="startCalc();" value="<?php echo $b['pb_ds_kontrak']; ?>" onBlur="stopCalc();" />
								<input type='hidden' id="nondskontrak" name='nondskontrak' class="form-control currency" onFocus="startCalc();" value="<?php echo $b['pb_ds_kontrak']; ?>" onBlur="stopCalc();" />
								<input type="hidden" name="jenis" value="keuangan">
							</div>

							<div class="form-group">
								<label>Pagu</label>
								<input type="number" id="pagu"  name="pagu" class="form-control" value="<?php echo $b['proyek_pagu']; ?>"  readonly>
								<input type="hidden" id="nonformatpagu"  name="nonformatpagu" class="form-control" value="<?php echo $b['proyek_pagu']; ?>"  readonly>
							</div>

							<div class="form-group">
								<label>Nilai Kontrak</label>
								<input type="number"  id="nilaikontrak" name="nilaikontrak" class="form-control" value="<?php echo $b['proyek_keuangan']; ?>"  readonly>
								<input type="hidden"  id="nonformatnilaikontrak" name="nonformatnilaikontrak" class="form-control" value="<?php echo $b['proyek_keuangan']; ?>"  readonly>
							</div>


							<div class="form-group">
								<label>Sisa Kontrak</label>
								<input type="text"  id="sisakontrak" name="sisakontrak" class="form-control"  readonly>
								<input type="hidden" id="nonformatsisakontrak" name="nonformatsisakontrak" class="form-control"  readonly>
							</div>

							<div class="form-group">
								<label>Sisa Anggaran</label>
								<input type="text"  id="sisaanggran" name="sisaanggran" class="form-control"  readonly>
								<input type="hidden"  id="nonformatsisaanggran" name="nonformatsisaanggran" class="form-control"  readonly>
							</div>


							<div class="form-group">
								<label>Tanggal Progress</label>
								<input type="date" name="tanggal_prog" class="form-control">
							</div>

							<div class="form-group pull-right">
								<button type="submit" class="btn btn-primary btn-flat pull-right"><span class="fa fa-pencil"></span> Publish</button>
							</div>
						</form>
					</div>
				</div>
			</div>

			<div class="col-md-9">
				<div class="box box-warning">
					<div class="box-header with-border">
						<h3 class="box-title">Recent Update </h3>
						<a href="" class="pull-right btn btn-primary" data-toggle="modal" data-target="#ModalTambahph">Tambah Catatan</a>
					</div>
					<div class="box-body">
						<div class="row">
							<div class="col-md-12">
								<table id="example1" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th>Target</th>
											<th>Real</th>
											<th>Devisi</th>
											<th>Tanggal</th>
											<th>Last Update</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$id=$this->uri->segment(3);
										$getdata=$this->m_padmin->get_all_data_by_id($id);
										foreach ($getdata->result_array() as $key) :
											?>
											<tr>
												<td><?php echo $key['pb_target']; ?></td>
												<td><?php echo $key['pb_real']; ?></td>
												<td><?php echo $key['pb_devisi']; ?></td>
												<td><?php echo date('d-m-Y',strtotime($key['pb_tanggal_prog'])); ?></td>
												<td><?php echo date('d-m-Y H:i:s',strtotime($key['pb_last_update'])); ?></td>
											</tr>
										<?php endforeach; ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-9">
				<div class="box box-warning">
					<div class="box-header with-border">
						<h3 class="box-title">Keuangan </h3>
					</div>
					<div class="box-body">
						<div class="row">
							<div class="col-md-12">
								<table id="example2" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th>Jumlah</th>
											<th>Tanggal</th>
											<th>Last Update</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$id=$this->uri->segment(3);
										foreach ($charttdk->result_array() as $key) :
											?>
											<tr>
												<td><?php echo "Rp ".number_format($key['pb_ds_kontrak']); ?></td>
												<td><?php echo $key['tanggal']; ?></td>
												<td><?php echo $key['pb_last_update']; ?></td>
											</tr>
										<?php endforeach; ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</section>
</div>

<div class="modal fade" id="ModalTambahph" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-md"  role="document">
		<div class="modal-content" >

			<form class="form-horizontal" action="<?php echo base_url().'padmin/save_catatan'?>" method="post" enctype="multipart/form-data">
				<div class="modal-body container-fluid text-center" >
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
					<div class="col-md-12">
						<div class="form-group">
							<label>Tambah Catatan</label>
							<input type="hidden" name="proyek_id" value="<?php echo $this->uri->segment(3);?>">
							<textarea class="form-control" name="catatan_isi"></textarea>
						</div>
					</div>
					<div class="col-md-6 col-md-offset-3"><br>
						<button type="submit" class="btn btn-success btn-round col-md-12" id="simpan">Save</button>
					</div>
				</div>
			</form>
		</div>
	</div>
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
<script src="http://afarkas.github.io/webshim/js-webshim/minified/polyfiller.js"></script>

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

			pbtarget = document.getElementById("pbtarget").value;
			pbreal = document.getElementById("pbreal").value;
			document.getElementById("pbdevisi").value = (pbreal*1) - (pbtarget*1)  ;

			one = document.getElementById("dskontrak").value;
			document.getElementById("nondskontrak").value = (one) ;
			four = document.getElementById("nonformatpagu").value;
			document.getElementById("sisaanggran").value = FormatDuit((four*1) - (one*1))   ;
			document.getElementById("nonformatsisaanggran").value = (four*1) - (one*1)   ;


			xone = document.getElementById("dskontrak").value;
			document.getElementById("nondskontrak").value = (xone) ;
			xfour = document.getElementById("nonformatnilaikontrak").value;
			document.getElementById("sisakontrak").value = FormatDuit((xfour*1) - (xone*1))   ;
			document.getElementById("nonformatsisakontrak").value = (xfour*1) - (xone*1)   ;

		}
		function stopCalc(){
			clearInterval(interval);}

			webshims.setOptions('forms-ext', {
				replaceUI: 'auto',
				types: 'number'
			});
			webshims.polyfill('forms forms-ext');
		</script>