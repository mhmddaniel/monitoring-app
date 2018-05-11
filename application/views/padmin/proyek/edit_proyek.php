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
      proyek List
      <small></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url()?>padmin"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="<?php echo base_url() ?>padmin/proyek">proyek</a></li>
      <li class="active">List</li>
    </ol>
  </section>

  <form action="<?php echo base_url()?>padmin/update_proyek" method="POST">
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">Nama Proyek</h3>
            </div>

            <div class="box-body">
              <div class="row">
                <div class="col-md-10">
                  <input type="hidden" name="xproyek_id" class="form-control" value="<?php echo $b['proyek_id']; ?>" required/>
                  <input type="text" name="xnama" class="form-control" placeholder="Nama Proyek" value="<?php echo $b['proyek_nama']; ?>" required/>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-flat pull-right"><span class="fa fa-pencil"></span> Publish</button>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">Data Proyek</a></li>
              <li><a href="#tab_2" data-toggle="tab">Lokasi Proyek</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                <div class="box-body">
                  <div class="form-group">
                    <label>Tahun</label>
                    <input type="number" class="form-control" name="year" value="<?php echo $b['proyek_tahun']; ?>" >
                  </div>
                  <div class="form-group">
                    <label>Nilai Kontrak</label>
                    <input type="number" class="form-control" name="keuangan" value="<?php echo $b['proyek_keuangan']; ?>">
                  </div>
                  <div class="form-group">
                    <label>Pagu</label>
                    <input type="number" class="form-control" name="pagu" value="<?php echo $b['proyek_pagu']; ?>">
                  </div>
                  <div class="form-group">
                    <label>Kontrak</label>
                    <input type="date" class="form-control" name="kontrak" value="<?php echo $b['proyek_kontrak']; ?>">
                  </div>
                  <div class="form-group">
                    <label>Kategori</label>
                    <select class="form-control select" name="xkategori" required>
                      <option value="">-Pilih-</option>
                      <?php
                      foreach ($datak->result_array() as $i) :
                        $kategori_id=$i['kategori_id'];
                        $kategori_nama=$i['kategori_nama'];
                        ?>
                        <option value="<?php echo $kategori_id; ?>" <?php if($b['proyek_kategori_id']==$kategori_id){ echo "selected"; } else {} ?> ><?php echo $kategori_nama;?></option>
                      <?php endforeach;?>
                    </select>
                  </div>

                  <div class="form-group">
                    <label>Sech Awal</label>
                    <input type="date" class="form-control" name="sech1" value="<?php echo $b['proyek_sech_awal']; ?>">
                  </div>
                </div>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
                <div class="box-body">
                  <div class="form-group">
                    <label>Nama Lokasi</label>
                    <input type="text" class="form-control"  name="namkor"  value="<?php echo $b['koordinat_nama']; ?>">
                  </div>
                  <div class="form-group">
                    <label>Alamat</label>
                    <input type="hidden" name="numkor" value="<?php echo $b['koordinat_id']; ?>">
                    <input type="text" class="inputAddress input-xxlarge form-control" value="<?php echo $b['koordinat_alamat']; ?>" name="inputAddress" autocomplete="off" placeholder="Type in your address">
                  </div>    
                  <div class="form-group">
                    <label>Latitude</label>
                    <input type="text" class="latitude form-control" value="latitude" name="latitude" readonly="readonly">
                  </div>
                  <div class="form-group">
                    <label>Longitude</label>
                    <input type="text" class="longitude form-control" value="longitude" name="longitude" readonly="readonly">
                  </div>
                </div>
              </div>
              
            </div>
          </div>
        </div>
      </form>
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
