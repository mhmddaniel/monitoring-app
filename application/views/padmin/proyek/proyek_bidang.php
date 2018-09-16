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

							<div class="form-group">
								<label>Daya Serap Kontrak</label>
								<input type="hidden" name="proyek_id" value="<?php echo $b['proyek_id']; ?>">
								<input type='number' name='dskontrak' class="form-control currency" onFocus="startCalc();" value="<?php echo $b['pb_ds_kontrak']; ?>" onBlur="stopCalc();" />
								<input type='hidden' name='nondskontrak' class="form-control currency" onFocus="startCalc();" value="<?php echo $b['pb_ds_kontrak']; ?>" onBlur="stopCalc();" />
							</div>

							<?php /*
							<div class="form-group">
							<label>	Daya Serap Administrasi Pekerjaan</label>
							<input type='number' name='dsadmproyek' class="form-control" onFocus="startCalc();" value="<?php echo $b['pb_ds_ap']; ?>" onBlur="stopCalc();" />
							<input type='hidden' name='nondsadmproyek' class="form-control" onFocus="startCalc();" value="<?php echo $b['pb_ds_ap']; ?>" onBlur="stopCalc();" />
							</div>
							<div class="form-group">
							<label>Total Daya Serap Keuangan</label>
							<input type='text' name="totalds" class="form-control" onFocus="startCalc();" value="<?php echo $b['pb_ds_keuangan']; ?>" onBlur="stopCalc();"  />
							<input type='hidden' name="nonfortotalads" class="form-control" onFocus="startCalc();" value="<?php echo $b['pb_ds_keuangan']; ?>" onBlur="stopCalc();"  />


							</div>
							*/ ?>
							<div class="form-group">
								<label>Pagu</label>
								<input type="number"  name="pagu" class="form-control" value="<?php echo $b['proyek_pagu']; ?>"  readonly>
								<input type="hidden"  name="nonformatpagu" class="form-control" value="<?php echo $b['proyek_pagu']; ?>"  readonly>
							</div>
							
							<div class="form-group">
								<label>Nilai Kontrak</label>
								<input type="number"  name="nilaikontrak" class="form-control" value="<?php echo $b['proyek_keuangan']; ?>"  readonly>
								<input type="hidden"  name="nonformatnilaikontrak" class="form-control" value="<?php echo $b['proyek_keuangan']; ?>"  readonly>
							</div>


							<div class="form-group">
								<label>Sisa Kontrak</label>
								<input type="text" value="<?php echo $b['pb_sisa_anggaran']; ?>" name="sisakontrak" class="form-control"  readonly>
								<input type="hidden" value="<?php echo $b['pb_sisa_anggaran']; ?>" name="nonformatsisakontrak" class="form-control"  readonly>
							</div>

							<div class="form-group">
								<label>Sisa Anggaran</label>
								<input type="text" value="<?php echo $b['pb_sisa_anggaran']; ?>" name="sisaanggran" class="form-control"  readonly>
								<input type="hidden" value="<?php echo $b['pb_sisa_anggaran']; ?>" name="nonformatsisaanggran" class="form-control"  readonly>
							</div>

							<div class="form-group pull-right">
								<button type="submit" class="btn btn-primary btn-flat pull-right"><span class="fa fa-pencil"></span> Publish</button>
							</div>
						</div>
					</div>
				</form>
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
										</tr>
									</thead>
									<tbody>
										<?php
										$id=$this->uri->segment(3);
										$cek=$this->m_padmin->cek_data($id);
										$proyek_id=$cek['pb_proyek_id'];
										$getdata=$this->m_padmin->get_all_data_by_id($proyek_id);
										foreach ($getdata->result_array() as $key) :
											?>
											<tr>
												<th><?php echo $key['pb_target']; ?></th>
												<th><?php echo $key['pb_real']; ?></th>
												<th><?php echo $key['pb_devisi']; ?></th>
												<th><?php echo date('d-m-Y H:i:s',strtotime($key['pb_last_update'])); ?></th>
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
                <input type="hidden" name="proyek_id" value="<?php echo $proyek_id;?>">
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

			pbtarget = document.autoSumForm.pbtarget.value;
			pbreal = document.autoSumForm.pbreal.value;
			document.autoSumForm.pbdevisi.value = (pbreal*1) - (pbtarget*1)  ;

			one = document.autoSumForm.dskontrak.value;
			document.autoSumForm.nondskontrak.value = (one) ;
			four = document.autoSumForm.nonformatpagu.value;
			document.autoSumForm.sisaanggran.value = FormatDuit((four*1) - (one*1))   ;
			document.autoSumForm.nonformatsisaanggran.value = (four*1) - (one*1)   ;


			xone = document.autoSumForm.dskontrak.value;
			document.autoSumForm.nondskontrak.value = (xone) ;
			xfour = document.autoSumForm.nonformatnilaikontrak.value;
			document.autoSumForm.sisakontrak.value = FormatDuit((xfour*1) - (xone*1))   ;
			document.autoSumForm.nonformatsisakontrak.value = (xfour*1) - (xone*1)   ;

		}
		function stopCalc(){
			clearInterval(interval);}

			webshims.setOptions('forms-ext', {
				replaceUI: 'auto',
				types: 'number'
			});
			webshims.polyfill('forms forms-ext');
		</script>