
<link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
<!-- Font Awesome -->
<link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/Ionicons/css/ionicons.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
   folder instead of downloading all of them to reduce the load. -->
   <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/skins/_all-skins.min.css">
   <!-- bootstrap wysihtml5 - text editor -->

   <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
   <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- Google Font -->
<link rel="stylesheet"
href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Penyedia Jasa
      <small></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url()?>padmin"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="<?php echo base_url()?>padmin/user">Penyedia Jasa</a></li>
      <li class="active">Tambah Penyedia Jasa</li>
    </ol>
  </section>
  <section class="content">
    <form action="<?php echo base_url().'padmin/save_penanggung_jawab'?>" method="post" enctype="multipart/form-data">

      <div class="box box-default ">
        <div class="box-header with-border">
          <h3 class="box-title">Tambah Penyedia Jasa</h3>
        </div>
        <div class="box-body ">
          <div class="row">
            <div class="col-md-8 col-md-offset-2">
              <div class="form-group">
                <label>Pekerjaan</label>
                <select name="proyek" class="form-control">
                  <?php 
                  foreach ($data->result_array() as $i) :
                    ?>
                    <option value="<?php echo $i['proyek_id']; ?>"><?php echo $i['proyek_nama']; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group">
                <label>Posisi</label>
                <select class="form-control"  name="xjenis" >
                  <option value="kontraktor">Kontraktor</option>
                  <option value="konsultan">Konsultan</option>
                </select>
              </div>
              <div class="form-group">
                <label>Nama Direktur</label>
                <input type="text" class="form-control"  name="xnama_direk" >
              </div>
              <div class="form-group">
                <label>Telp. Direktur</label>
                <input type="tel" class="form-control"  name="xtel_direk"  >
              </div>
              <div class="form-group">
                <label>Nama Perusahaan</label>
                <input type="text" class="form-control"  name="xnama_perus">
              </div>
              <div class="form-group">
                <label>Alamat Perusahaan</label>
                <textarea  class="form-control"  name="xalamat_perus"></textarea>
              </div>
              <div class="form-group">
                <label>Telp. Kantor</label>
                <input type="tel" class="form-control"  name="xtel_kant" >
              </div>
              <div class="form-group pull-right">
                <button type="submit" class="btn btn-primary btn-flat pull-right"><span class="fa fa-pencil"></span> Publish</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </section>
</div>

<!-- jQuery 3 -->
<script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- CK Editor -->
<script src="<?php echo base_url() ?>assets/bower_components/ckeditor/ckeditor.js"></script>

<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('ckeditor')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })
</script>

