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
                <input type="hidden" name="user_id" class="form-control" value="<?php echo $b['user_id']; ?>" readonly/>
              </div>
              <div class="form-group"> 
                <label>USERNAME</label>
                <input type="text" name="user_username" class="form-control" value="<?php echo $b['user_username']; ?>"/>
              </div>
              <div class="form-group"> 
                <label>EMAIL</label>
                <input type="email" name="user_email" class="form-control" value="<?php echo $b['user_email']; ?>"/>
              </div>
              <div class="form-group">  
                <label>TELEPON</label>
                <input type="tel" name="user_tel" class="form-control"  value="<?php echo $b['user_telp']; ?>" />
              </div>

              <div class="form-group">  
                <label>Bagian</label>
                <select name="user_bagian" class="form-control" required>
                  <option value="" <?php if($b['user_bagian']=='null'){ echo "selected"; } else {} ?>>Pilih Bagian</option>
                  <option value="sda" <?php if($b['user_bagian']=='sda'){ echo "selected"; } else {} ?>>Sumber Daya Air</option>
                  <option value="bm" <?php if($b['user_bagian']=='bm'){ echo "selected"; } else {} ?>>Bina Marga</option>
                  <option value="ciptakarya" <?php if($b['user_bagian']=='ciptakarya'){ echo "selected"; } else {} ?>>Cipta Karya</option>
                  <option value="pr" <?php if($b['user_bagian']=='pr'){ echo "selected"; } else {} ?>>Perumahan Rakyat</option>
                  <option value="sekretariat" <?php if($b['user_bagian']=='sekretariat'){ echo "selected"; } else {} ?>>Sekretariat</option>
                  <option value="ttdp" <?php if($b['user_bagian']=='ttdp'){ echo "selected"; } else {} ?>>Tata Ruang dan Pertanahan</option>
                  <option value="ubp" <?php if($b['user_bagian']=='ubp'){ echo "selected"; } else {} ?>>UPTD Balai Pengujian</option>
                  <option value="ubpdp" <?php if($b['user_bagian']=='ubpdp'){ echo "selected"; } else {} ?>>UPTD Balai Peralatan dan Perbekalan</option>
                  <option value="bkdp" <?php if($b['user_bagian']=='bkdp'){ echo "selected"; } else {} ?>>Bina Kontruksi dan Pengendalian</option>
                </select>
              </div>
              <div class="form-group">  
                <label>Role / Level</label>
                <select name="user_level" class="form-control" required>
                  <option value="admin" <?php if($b['user_level']=='admin'){ echo "selected"; } else {} ?>>ADMIN</option>
                  <option value="bidang" <?php if($b['user_level']=='bidang'){ echo "selected"; } else {} ?>>Bidang</option>
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
            <input type="hidden" name="user_id" value="<?php echo $b['user_id']; ?>" class="form-control" />
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

