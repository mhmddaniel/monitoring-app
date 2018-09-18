
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
      User
      <small></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url()?>padmin"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="<?php echo base_url()?>padmin/user">user</a></li>
      <li class="active">Tambah User</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <form action="<?php echo base_url().'padmin/save_user'?>" method="post" enctype="multipart/form-data">
      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default ">
        <div class="box-header with-border">
          <h3 class="box-title">Tambah User</h3>
        </div>
        
        
        <!-- /.box-header -->
        <div class="box-body ">
          <div class="row">
            <div class="col-md-8 col-md-offset-2">
              <div class="form-group">  

                <div class="form-group"> 
                  <label>USERNAME</label>
                  <input type="text" name="xusername" class="form-control" required/>
                </div>
                <div class="form-group"> 
                  <label>PASSWORD</label>
                  <input type="password" name="xpassword" class="form-control" required/>
                </div>
                <div class="form-group"> 
                  <label>RE-PASSWORD</label>
                  <input type="password" name="xrepassword" class="form-control" required/>
                </div>
                <div class="form-group"> 
                  <label>EMAIL</label>
                  <input type="email" name="xemail" class="form-control" required/>
                </div>
                <div class="form-group">  
                  <label>TELEPON</label>
                  <input type="tel" name="xtel" class="form-control" required/>
                </div>
                <div class="form-group">  
                  <label>Bagian</label>
                  <select class="form-control"  name="xbagian" >
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
                  <label>Role / Level</label>
                  <select name="xlevel" class="form-control" required>
                    <option value="admin">ADMIN</option>
                    <option value="bidang">BIDANG</option>
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

