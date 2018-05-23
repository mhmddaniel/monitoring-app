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

<div class="content-wrapper ">
  <section class="content-header">
    <h1>
      User
      <small></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url()?>padmin"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="<?php echo base_url()?>padmin/user">user</a></li>
      <li class="active">Edit User</li>
    </ol>
  </section>
  <section class="content">


    <div class="row">
      <div class="col-md-6">
        <form action="<?php echo base_url().'padmin/update_user'?>" method="post" enctype="multipart/form-data">
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Data User</h3>
            </div>
            <div class="box-body">
              <div class="form-group"> 
                <label>NIK</label>
                <input type="text" name="xnik" class="form-control" value="<?php echo $b['user_nik']; ?>" readonly/>
              </div>
              <div class="form-group"> 
                <label>USERNAME</label>
                <input type="text" name="xusername" class="form-control" value="<?php echo $b['user_username']; ?>"/>
              </div>
              <div class="form-group">
                <label>NAMA</label>
                <input type="text" name="xnama" class="form-control" value="<?php echo $b['user_nama']; ?>"/>
              </div>
              <div class="form-group"> 
                <label>EMAIL</label>
                <input type="email" name="xemail" class="form-control" value="<?php echo $b['user_email']; ?>"/>
              </div>
              <div class="form-group">  
                <label>TELEPON</label>
                <input type="tel" name="xtel" class="form-control"  value="<?php echo $b['user_telp']; ?>" />
              </div>

              <div class="form-group">  
                <label>Bagian</label>
                <select name="xbagian" class="form-control" required>
                  <option value="ppk" <?php if($b['user_bagian']=='ppk'){ echo "selected"; } else {} ?>>PPK</option>
                  <option value="kabid" <?php if($b['user_bagian']=='kabid'){ echo "selected"; } else {} ?>>KABID</option>
                  <option value="kasubid" <?php if($b['user_bagian']=='kasubid'){ echo "selected"; } else {} ?>>KASUBID</option>
                </select>
              </div>
              <div class="form-group">  
                <label>Role / Level</label>
                <select name="xlevel" class="form-control" required>
                  <option value="admin" <?php if($b['user_bagian']=='admin'){ echo "selected"; } else {} ?>>ADMIN</option>
                  <option value="petugas" <?php if($b['user_bagian']=='petugas'){ echo "selected"; } else {} ?>>PETUGAS</option>
                  <option value="user" <?php if($b['user_bagian']=='user'){ echo "selected"; } else {} ?>>USER</option>
                </select>
              </div>
              <div class="form-group"> 
                <label>FOTO</label>
                <input type="file" name="filefoto" class="form-control btn-primary"/>
              </div>
              <div class="form-group pull-right">
                <button type="submit" class="btn btn-primary btn-flat pull-right"><span class="fa fa-pencil"></span> Publish</button>
              </div>
            </div>
          </div>
        </form>
      </div>

      <div class="col-md-6">
       <form action="<?php echo base_url().'padmin/update_password_user'?>" method="post" enctype="multipart/form-data">
        <div class="box box-danger">
          <div class="box-header with-border">
            <h3 class="box-title">Password</h3>

          </div>
          <div class="box-body">
           <div class="form-group">
            <label>Password Lama</label>
            <input type="hidden" name="userid" value="<?php echo $b['user_nik']; ?>" class="form-control" />
            <input type="hidden" name="xhp" value="<?php echo $b['user_password']; ?>" class="form-control" />
            <input type="password" name="xoldpas" class="form-control" />
          </div>
          <div class="form-group"> 
            <label>Password Baru</label>
            <input type="password" name="xnewpas" class="form-control" />
          </div>
          <div class="form-group"> 
            <label>Ulangi Password</label>
            <input type="password" name="xnewrepas" class="form-control"/>
          </div>
          <div class="form-group pull-right">
            <button type="submit" class="btn btn-primary btn-flat pull-right"><span class="fa fa-pencil"></span> Publish</button>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
</section>
</div>

<script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/bower_components/ckeditor/ckeditor.js"></script>

<script>
  $(function () {
    CKEDITOR.replace('ckeditor')
    $('.textarea').wysihtml5()
  })
</script>

