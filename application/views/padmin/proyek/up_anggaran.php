
<style type="text/css">
body {
	font-family: sans-serif;
	background-color: #eeeeee;
}

.file-upload {
	background-color: #ffffff;
	margin: 0 auto;
	padding: 20px;
	height: 530px;
}

.file-upload-btn {
	width: 100%;
	margin: 0;
	color: #fff;
	background: #1FB264;
	border: none;
	padding: 10px;
	border-radius: 4px;
	border-bottom: 4px solid #15824B;
	transition: all .2s ease;
	outline: none;
	text-transform: uppercase;
	font-weight: 700;
}

.file-upload-btn:hover {
	background: #1AA059;
	color: #ffffff;
	transition: all .2s ease;
	cursor: pointer;
}

.file-upload-btn:active {
	border: 0;
	transition: all .2s ease;
}

.file-upload-content {
	display: none;
	text-align: center;
}

.file-upload-input {
	position: absolute;
	margin: 0;
	padding: 0;
	width: 100%;
	height: 100%;
	outline: none;
	opacity: 0;
	cursor: pointer;
}

.image-upload-wrap {
	margin-top: 10px;
	border: 4px dashed #1FB264;
	position: relative;
	margin-bottom: 50px;
	height:400px;
}

.image-dropping,
.image-upload-wrap:hover {
	background-color: #1FB264;
	border: 4px dashed #ffffff;
}

.image-title-wrap {
	padding: 0 15px 15px 15px;
	color: #222;
}

.drag-text {
	text-align: center;
	bottom: 0;
}

.drag-text h3 {
	text-transform: uppercase;
	color: #15824B;
	padding-top: 300px;
	font-size:20px;
}

.file-upload-image {
	max-height: 200px;
	max-width: 200px;
	margin: auto;
	padding: -50px;
	padding: 20px;
}

.remove-image {
	width: 200px;
	margin: 0;
	color: #fff;
	background: #cd4535;
	border: none;
	padding: 10px;
	border-radius: 4px;
	border-bottom: 4px solid #b02818;
	transition: all .2s ease;
	outline: none;
	text-transform: uppercase;
	font-weight: 700;
}

.remove-image:hover {
	background: #c13b2a;
	color: #ffffff;
	transition: all .2s ease;
	cursor: pointer;
}

.remove-image:active {
	border: 0;
	transition: all .2s ease;
}

.padbtn{
	margin-top: -130px;
}
.boxhead{
	background: rgba(112,235,131,1);
	background: -moz-linear-gradient(left, rgba(112,235,131,1) 0%, rgba(39,179,230,1) 100%);
	background: -webkit-gradient(left top, right top, color-stop(0%, rgba(112,235,131,1)), color-stop(100%, rgba(39,179,230,1)));
	background: -webkit-linear-gradient(left, rgba(112,235,131,1) 0%, rgba(39,179,230,1) 100%);
	background: -o-linear-gradient(left, rgba(112,235,131,1) 0%, rgba(39,179,230,1) 100%);
	background: -ms-linear-gradient(left, rgba(112,235,131,1) 0%, rgba(39,179,230,1) 100%);
	background: linear-gradient(to right, rgba(112,235,131,1) 0%, rgba(39,179,230,1) 100%);
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#70eb83', endColorstr='#27b3e6', GradientType=1 );
	height:80px;
	padding-top:50px;
}
.boxhead2{
	background: rgba(141,112,235,1);
	background: -moz-linear-gradient(left, rgba(141,112,235,1) 0%, rgba(39,131,230,1) 100%);
	background: -webkit-gradient(left top, right top, color-stop(0%, rgba(141,112,235,1)), color-stop(100%, rgba(39,131,230,1)));
	background: -webkit-linear-gradient(left, rgba(141,112,235,1) 0%, rgba(39,131,230,1) 100%);
	background: -o-linear-gradient(left, rgba(141,112,235,1) 0%, rgba(39,131,230,1) 100%);
	background: -ms-linear-gradient(left, rgba(141,112,235,1) 0%, rgba(39,131,230,1) 100%);
	background: linear-gradient(to right, rgba(141,112,235,1) 0%, rgba(39,131,230,1) 100%);
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#8d70eb', endColorstr='#2783e6', GradientType=1 );
	height:80px;
	padding-top:50px;
}
.boxttle{
	margin-top: -20px;
	text-align: center;
	color:white;
}



.file-upload-contentss {
	display: none;
	text-align: center;
}

.file-upload-inputss {
	position: absolute;
	margin: 0;
	padding: 0;
	width: 100%;
	height: 100%;
	outline: none;
	opacity: 0;
	cursor: pointer;
}

.image-upload-wrapss {
	margin-top: 10px;
	border: 4px dashed #1FB264;
	position: relative;
	margin-bottom: 50px;
	height:400px;
}

.image-droppingss,
.image-upload-wrapss:hover {
	background-color: #1FB264;
	border: 4px dashed #ffffff;
}

.file-upload-imagess {
	max-height: 200px;
	max-width: 200px;
	margin: auto;
	padding: 20px;
}

.remove-imagess {
	width: 200px;
	margin: 0;
	color: #fff;
	background: #cd4535;
	border: none;
	padding: 10px;
	border-radius: 4px;
	border-bottom: 4px solid #b02818;
	transition: all .2s ease;
	outline: none;
	text-transform: uppercase;
	font-weight: 700;
}

.remove-imagess:hover {
	background: #c13b2a;
	color: #ffffff;
	transition: all .2s ease;
	cursor: pointer;
}

.remove-imagess:active {
	border: 0;
	transition: all .2s ease;
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
	<section class="content-header">
		<h1 style="margin-left:50px">
			<i class="fa fa-chevron-left"></i> Tambah Berkas
			<small></small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url()?>padmin"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="<?php echo base_url()?>padmin/proyek">Pekerjaan</a></li>
			<li class="active">Tambah Berkas</li>
		</ol>
	</section>

	<section class="content">
		<div class="row">
			<div class="col-md-12" style="margin-top:50px">
				<form action="<?php echo base_url()?>padmin/save_lampiran_anggaran" method="POST" enctype="multipart/form-data" >
					<div class="col-md-4 col-md-offset-4">
						<div class="col-md-12">
							<div class="box">
								<div class="boxhead2">
									<h3 class="boxttle">Dokumen Anggaran</h3>
								</div>
								<div class="file-upload">
									<input type="text" name="namafile" class="form-control" placeholder="Nama File" required="required">
									<div class="image-upload-wrapss">
										<?php $kode=$this->uri->segment(3);?>
										<input type="hidden" name="anggaran_id" value="<?php echo $kode; ?>">
										<input class="file-upload-inputss" type='file'  name="fileat" onchange="readFile(this);" accept="application/pdf,application/x-rar-compressed, application/octet-stream,application/zip, application/octet-stream, application/x-zip-compressed, multipart/x-zip" required="required" />
										<div class="drag-text">

											<h3><i class="fa fa-cloud-upload"></i><br>DROP FILES HERE <p>OR CLICK TO <span class="text-primary">BROWSE</span></p></h3>
										</div>
									</div>
									<div class="file-upload-contentss">
										<div class="image-titless-wrap">
											<button type="button" onclick="removeUploadss()" class="remove-imagess" style="margin-top:50px">Remove <span class="image-titless">Uploaded Image</span></button>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 col-md-offset-3 col-xs-6 col-xs-offset-3">
								<input type="submit" class="form-control btn btn-round btn-success padbtn" value="Simpan">
							</div>
						</div>
					</div>
				</form>
				
			</div>
		</div>
	</section>
</div>


</body>
</html>
<script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script type="text/javascript">
	function readURL(input) {
		if (input.files && input.files[0]) {

			var reader = new FileReader();

			reader.onload = function(e) {
				$('.image-upload-wrap').hide();

				$('.file-upload-image').attr('src', e.target.result);
				$('.file-upload-content').show();

				$('.image-title').html(input.files[0].name);
			};

			reader.readAsDataURL(input.files[0]);

		} else {
			removeUpload();
		}
	}

	function removeUpload() {
		$('.file-upload-input').replaceWith($('.file-upload-input').clone());
		$('.file-upload-content').hide();
		$('.image-upload-wrap').show();
	}
	$('.image-upload-wrap').bind('dragover', function () {
		$('.image-upload-wrap').addClass('image-dropping');
	});
	$('.image-upload-wrap').bind('dragleave', function () {
		$('.image-upload-wrap').removeClass('image-dropping');
	});

</script>
<script type="text/javascript">
	function readFile(input) {
		if (input.files && input.files[0]) {

			var reader = new FileReader();

			reader.onload = function(e) {
				$('.image-upload-wrapss').hide();

				$('.file-upload-imagess').attr('src', e.target.result);
				$('.file-upload-contentss').show();

				$('.image-titless').html(input.files[0].name);
			};

			reader.readAsDataURL(input.files[0]);

		} else {
			removeUploadss();
		}
	}

	function removeUploadss() {
		$('.file-upload-inputss').replaceWith($('.file-upload-inputss').clone());
		$('.file-upload-contentss').hide();
		$('.image-upload-wrapss').show();
	}
	$('.image-upload-wrapss').bind('dragover', function () {
		$('.image-upload-wrapss').addClass('image-droppingss');
	});
	$('.image-upload-wrapss').bind('dragleave', function () {
		$('.image-upload-wrapss').removeClass('image-droppingss');
	});

</script>

