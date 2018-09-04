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
              <h3 class="box-title">Nama Pekerjaan</h3>
            </div>

            <div class="box-body">
              <div class="row">
                <div class="col-md-10">
                  <input type="hidden" name="xproyek_id" class="form-control" value="<?php echo $b['proyek_id']; ?>" required/>
                  <input type="text" name="xnama" class="form-control" placeholder="Nama Pekerjaan" value="<?php echo $b['proyek_nama']; ?>" required/>
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
              <li class="active"><a href="#tab_1" data-toggle="tab">Data Pekerjaan</a></li>
              <li><a href="#tab_2" data-toggle="tab">Lokasi Pekerjaan</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                <div class="box-body">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Tahun</label>
                      <input type="number" class="form-control" name="year" value="<?php echo $b['proyek_tahun']; ?>" >
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Pagu</label>
                      <input type="text" class="form-control" name="pagu" id="pagu" value="<?php echo number_format($b['proyek_pagu'],0,",","."); ?>">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Jenis Pengadaan</label>
                      <select class="form-control"  name="xjenis" >
                        <option value="#">Semua</option>
                        <option value="leum" <?php if($b['proyek_jenis']=='leum') {echo "selected"; } else {}?>>Lelang Umum</option>
                        <option value="lena" <?php if($b['proyek_jenis']=='lena') {echo "selected"; } else {}?>>Lelang Sederhana</option>
                        <option value="letas" <?php if($b['proyek_jenis']=='letas') {echo "selected"; } else {}?>>Lelang Terbatas</option>
                        <option value="selmum" <?php if($b['proyek_jenis']=='selmum') {echo "selected"; } else {}?>>Seleksi Umum</option>
                        <option value="pmlangsung" <?php if($b['proyek_jenis']=='pmlangsung') {echo "selected"; } else {}?>>Pemilihan Langsung</option>
                        <option value="pnlangsung" <?php if($b['proyek_jenis']=='pnlangsung') {echo "selected"; } else {}?>>Penunjukan Langsung</option>
                        <option value="pglangsung" <?php if($b['proyek_jenis']=='pglangsung') {echo "selected"; } else {}?>>Pengadaan Langsung</option>
                        <option value="epurchas" <?php if($b['proyek_jenis']=='epurchas' ){echo "selected"; } else {}?>>E-Purchasing</option>
                        <option value="sayembara" <?php if($b['proyek_jenis']=='sayembara' ){echo "selected"; } else {}?>>Sayembara</option>
                        <option value="kontes" <?php if($b['proyek_jenis']=='kontes') {echo "selected"; } else {}?>>Kontes</option>
                        <option value="lelce" <?php if($b['proyek_jenis']=='lelce') {echo "selected"; } else {}?>>Lelang Cepat</option>
                        <option value="selsed" <?php if($b['proyek_jenis']=='selsed' ){echo "selected"; } else {}?>>Seleksi Sederhana</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label>Volume</label>
                    <div class="form-group">
                      <input type="number" name="xvolume" value="<?php echo $b['proyek_volume']; ?>" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-1">
                    <label>Satuan</label>
                    <div class="form-group">
                      <input type="text" name="xsatuan" value="<?php echo $b['proyek_satuan']; ?>" class="form-control">
                    </div>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"></script>
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
<script type="text/javascript">
  var pagu = document.getElementById('pagu');
  pagu.addEventListener('keyup', function(e)
  {
    pagu.value = formatRupiah(this.value);
  });
  var keuangan = document.getElementById('keuangan');
  keuangan.addEventListener('keyup', function(e)
  {
    keuangan.value = formatRupiah(this.value);
  });
  function formatRupiah(angka, prefix)
  {
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
    split    = number_string.split(','),
    sisa     = split[0].length % 3,
    rupiah     = split[0].substr(0, sisa),
    ribuan     = split[0].substr(sisa).match(/\d{3}/gi);

    if (ribuan) {
      separator = sisa ? '.' : '';
      rupiah += separator + ribuan.join('.');
    }

    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
  }
</script>
