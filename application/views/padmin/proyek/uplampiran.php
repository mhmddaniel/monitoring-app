<?php $b=$data->row_array(); ?>

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
				<form action="<?php echo base_url()?>padmin/save_lampiran_foto" method="POST" enctype="multipart/form-data" >
					<div class="col-md-4 col-md-offset-1">
						<div class="col-md-12">
							<div class="box">
								<div class="boxhead">
									<h3 class="boxttle">Foto Pekerjaan</h3>
								</div>
								<div class="file-upload">
									<input type="text" name="namafile" class="form-control" placeholder="Nama Foto" required="required">
									<div class="image-upload-wrap">
										<input type="hidden" name="proyek_id" value="<?php echo $b['proyek_id']; ?>">
										<input type="hidden"  name="jenis"  value="foto" class="form-control">	
										<input class="file-upload-input" type='file' id="foto"  name="filefoto" onchange="readURL(this);" accept="image/*" required="required" />
										<div class="drag-text">

											<h3><i class="fa fa-cloud-upload"></i><br>DROP FILES HERE <p>OR CLICK TO <span class="text-primary">BROWSE</span></p></h3>
										</div>
									</div>

									<div class="file-upload-content">
										<img class="file-upload-image" src="#" alt="your image" />
										<div class="image-title-wrap" >
											<button type="button" onclick="removeUpload()" class="remove-image" >Remove <span class="image-title">Uploaded Image</span></button>
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

				<form action="<?php echo base_url()?>padmin/save_lampiran_file" method="POST" enctype="multipart/form-data" >
					<div class="col-md-4 col-md-offset-1">
						<div class="col-md-12">
							<div class="box">
								<div class="boxhead2">
									<h3 class="boxttle">Dokumen Pekerjaan</h3>
								</div>
								<div class="file-upload">
									<input type="text" name="namafile" class="form-control" placeholder="Nama File" required="required">
									<div class="image-upload-wrapss">
										<input type="hidden" name="proyek_id" value="<?php echo $b['proyek_id']; ?>">
										<input type="hidden"  name="jenis" value="file" class="form-control">
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







<!--


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">

				<link href="<?php echo base_url()?>assets/uploadcss/file/dist/css/jquery.dm-uploader.min.css" rel="stylesheet">
				<link href="<?php echo base_url()?>assets/uploadcss/file/demo/styles.css" rel="stylesheet">



				<main role="main" class="container">


					<div class="row">
						<div class="col-md-6 col-sm-12">

							 Our markup, the important part here! 
							<div id="drag-and-drop-zone" class="dm-uploader p-5">
								<h3 class="mb-5 mt-5 text-muted">Drag &amp; drop files here</h3>

								<div class="btn btn-primary btn-block mb-5">
									<span>Open the file Browser</span>

									<input type="hidden" id="proyek_id" name="proyek_id" value="<?php echo $b['proyek_id']; ?>">
									<input type="hidden"  id="jenis" name="jenis" value="file" class="form-control">
									<input type="file" id="fileat" name="fileat" title='Click to add Files' />
								</div>
							</div>

						</div>
						<div class="col-md-6 col-sm-12">
							<div class="card h-100">
								<div class="card-header">
									File List
								</div>

								<ul class="list-unstyled p-2 d-flex flex-column col" id="files">
									<li class="text-muted text-center empty">No files uploaded.</li>
								</ul>
							</div>
						</div>
					</div>



					<div class="row">
						<div class="col-12">
							<div class="card h-100">
								<div class="card-header">
									Debug Messages
								</div>

								<ul class="list-group list-group-flush" id="debug">
									<li class="list-group-item text-muted empty">Loading plugin....</li>
								</ul>
							</div>
						</div>
					</div>

				</main>


				<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
				<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>

				<script src="<?php echo base_url()?>assets/uploadcss/file/dist/js/jquery.dm-uploader.min.js"></script>
				<script src="<?php echo base_url()?>assets/uploadcss/file/demo/demo-ui.js"></script>

			
				<script type="text/html" id="files-template">
					<li class="media">
						<div class="media-body mb-1">
							<p class="mb-2">
								<strong>%%filename%%</strong> - Status: <span class="text-muted">Waiting</span>
							</p>
							<div class="progress mb-2">
								<div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" 
								role="progressbar"
								style="width: 0%" 
								aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
							</div>
						</div>
						<hr class="mt-1 mb-1" />
					</div>
				</li>
			</script>

			
			<script type="text/html" id="debug-template">
				<li class="list-group-item text-%%color%%"><strong>%%date%%</strong>: %%message%%</li>
			</script>


			<script type="text/javascript">
				$(function(){
  /*
   * For the sake keeping the code clean and the examples simple this file
   * contains only the plugin configuration & callbacks.
   * 
   * UI functions ui_* can be located in: demo-ui.js
   */
  $('#drag-and-drop-zone').dmUploader({ //
  	url: '<?php echo base_url()?>assets/uploadcss/file/demo/backend/upload.php',
    maxFileSize: 3000000, // 3 Megs 
    onDragEnter: function(){
      // Happens when dragging something over the DnD area
      this.addClass('active');
  },
  onDragLeave: function(){
      // Happens when dragging something OUT of the DnD area
      this.removeClass('active');
  },
  onInit: function(){
      // Plugin is ready to use
      ui_add_log('Penguin initialized :)', 'info');
  },
  onComplete: function(){
      // All files in the queue are processed (success or error)
      ui_add_log('All pending tranfers finished');
  },
  onNewFile: function(id, file,proyek_id,jenis){
      // When a new file is added using the file selector or the DnD area
      var proyek_id = document.getElementById('proyek_id').value;
      var jenis = document.getElementById('jenis').value;
      var fileat = document.getElementById('fileat').value;
      var newname = fileat.replace(/^C:\\fakepath\\/, "");
      ui_add_log('New file added #' + id + newname + proyek_id + jenis);
      ui_multi_add_file(id, file,proyek_id,jenis);
  },
  onBeforeUpload: function(id){
      // about tho start uploading a file
      ui_add_log('Starting the upload of #' + id);
      ui_multi_update_file_status(id, 'uploading', 'Uploading...');
      ui_multi_update_file_progress(id, 0, '', true);
  },
  onUploadCanceled: function(id) {
      // Happens when a file is directly canceled by the user.
      ui_multi_update_file_status(id, 'warning', 'Canceled by User');
      ui_multi_update_file_progress(id, 0, 'warning', false);
  },
  onUploadProgress: function(id, percent){
      // Updating file progress
      ui_multi_update_file_progress(id, percent);
  },
  onUploadSuccess: function(id, data){
      // A file was successfully uploaded
      ui_add_log('Server Response for file #' + id + ': ' + JSON.stringify(data));
      ui_add_log('Upload of file #' + id + ' COMPLETED', 'success');
      ui_multi_update_file_status(id, 'success', 'Upload Complete');
      ui_multi_update_file_progress(id, 100, 'success', false);
  },
  onUploadError: function(id, xhr, status, message){
  	ui_multi_update_file_status(id, 'danger', message);
  	ui_multi_update_file_progress(id, 0, 'danger', false);  
  },
  onFallbackMode: function(){
      // When the browser doesn't support this plugin :(
      ui_add_log('Plugin cant be used here, running Fallback callback', 'danger');
  },
  onFileSizeError: function(file){
  	ui_add_log('File \'' + file.name + '\' cannot be added: size excess limit', 'danger');
  }
});
});

</script>
-->