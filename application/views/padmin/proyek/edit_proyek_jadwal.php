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
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Edit Kontrak
      <small></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url()?>padmin"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="<?php echo base_url() ?>padmin/proyek">Pekerjaan</a></li>
      <li class="active">Kontrak</li>
    </ol>
  </section>

  <form action="<?php echo base_url()?>padmin/update_proyek_jadwal" method="POST">
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">Kontrak</h3>
            </div>

            <div class="box-body">
              <div class="row">
                <div class="col-md-12">
                  <input type="hidden" name="xproyek_id" class="form-control" value="<?php echo $b['proyek_id']; ?>" required/>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Nilai Kontrak</label>
                    <input type="number" class="form-control" name="nilaikontrak" value="<?php echo $b['proyek_awal_kontrak']; ?>">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Rencana Kontrak</label>
                    <input type="date" class="form-control" name="rencanakontrak" value="<?php echo $b['proyek_awal_kontrak']; ?>">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Awal Kontrak</label>
                    <input type="date" class="form-control" name="awalkontrak" value="<?php echo $b['proyek_awal_kontrak']; ?>">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Akhir Kontrak</label>
                    <input type="date" class="form-control" name="akhirkontrak" value="<?php echo $b['proyek_akhir_kontrak']; ?>">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-flat pull-right"><span class="fa fa-pencil"></span> Publish</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
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


<script src="<?php echo base_url() ?>assets/map/jquery-1.9.1.min.js"></script>
<script src="<?php echo base_url() ?>assets/map/jquery.addressPickerByGiro.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAogXD-AHrsmnWinZIyhRORJ84bgLwDPpg&sensor=false&language=id"></script>
<link href="<?php echo base_url() ?>assets/map/jquery.addressPickerByGiro.css" rel="stylesheet" media="screen">

</body>
</html>
