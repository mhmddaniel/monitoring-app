<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/iCheck/square/green.css">
</head>
<body class="hold-transition login-page">
  <div class="login-box">

    <!-- /.login-logo -->
    <div class="login-box-body">

      <div class="row">
        <div class="col-sm-12 text-center">
        <p class="login-box-msg"><h2 class="text-center" style="font-family:Open Sans; font-weight:lighter;">Selamat Datang</h2></p>
      </div>
      </div>

      <div class="row">
         <div class="col-sm-12 text-center">
          <div class="col-sm-4"></div>
        <img class="col-sm-4" src="<?php echo base_url() ?>images/logo.png">
          <div class="col-sm-4"></div>
      </div>
      </div>
      <hr/>

      <form action="<?php echo base_url().'loginadmin/auth'?>" method="post">

        <div class="row">

          <div class="col-sm-12">
           <div class="form-group has-feedback">
             <input type="text" name="username" class="form-control" placeholder="Username" required>
             <span class="glyphicon glyphicon-user form-control-feedback"></span>
           </div>
         </div>
         <div class="col-sm-12">
          <div class="form-group has-feedback">
            <input type="password" name="password" class="form-control" placeholder="Password" required>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
        </div>

      </div>
      <div class="row">
        <div class="col-sm-12">
          <div class="radio icheck">
            <label>
              <input type="radio"> Remember Me
            </label>
          </div>
        </div>
        <div>
         <p><?php echo $this->session->flashdata('msg');?></p>
       </div>
       <!-- /.col -->
     </div>
     <div class="row">
      <div class="col-sm-12 text-center">
        <button type="submit" class="btn btn-primary btn-block bg-blue-gradient"><h5 style="font-family:Open Sans; font-weight:lighter;">LOGIN</h5></button>
      </div>
      <!-- /.col -->
    </div>
    <div class="row">
      <div class="col-sm-12 text-center">
        <p><center>Lupa Password ?</center></p>
      </div>
    </div>
  </form>


  <!-- /.social-auth-links -->
  <hr/>
  <p><center>&copy; Copyright <br/> All Right Reserved</center></p>
</div>
<!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url() ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url() ?>assets/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-green',
      radioClass: 'iradio_square-green',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
