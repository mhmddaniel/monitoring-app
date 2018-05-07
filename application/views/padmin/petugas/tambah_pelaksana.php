
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

<!-- Left side column. contains the logo and sidebar -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Petugas
      <small></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Petugas</a></li>
      <li class="active">Tambah Petugas</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <form action="<?php echo base_url().'padmin/save_pelaksana'?>" method="post" enctype="multipart/form-data">
      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default ">
        <div class="box-header with-border">
          <h3 class="box-title">Tambah Kontraktor / Konsultan</h3>
        </div>
        
        
        <!-- /.box-header -->
        <div class="box-body ">
          <div class="row">
            <div class="col-md-8 col-md-offset-2">
              <div class="form-group">  
                <label>NAMA KONTRAKTOR / KONSULTAN</label>
                <input type="text" name="xnama" class="form-control" required/>
              </div>
              <div class="form-group">  
                <label>ALAMAT</label>
                <textarea  name="xalamat" class="form-control" required></textarea>
              </div>
              <div class="form-group">  
                <label>TELEPON KONTRAKTOR / KONSULTAN</label>
                <input type="tel" name="xtel" class="form-control" required/>
              </div>
              <div class="form-group">  
                <label>NAMA DIREKTUR</label>
                <input type="text" name="xdirektur" class="form-control" required/>
              </div>
              <div class="form-group">  
                <label>TELEPON DIREKTUR</label>
                <input type="tel" name="xteldirek" class="form-control" required/>
              </div>
              <div class="form-group">  
                <label>Jenis</label>
                <select  name="xjenis" class="form-control">
                  <option value="kontraktor">Kontraktor</option>
                  <option value="konsultan">Konsultan</option>
                </select>
              </div>
              <div class="form-group pull-right">
                <button type="submit" class="btn btn-primary btn-flat pull-right"><span class="fa fa-pencil"></span> Publish</button>
                <!-- /.form-group -->
              </div>
              
            </div>
            <!-- /.col -->
            
            <!-- /.row -->
          </div>
          <!-- /.box-body -->
          
        </div>
      </div>
      <!-- /.box -->
    </form>

  </section>
  <!-- /.content -->
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

