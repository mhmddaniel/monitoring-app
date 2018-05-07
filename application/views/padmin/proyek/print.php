<?php $b=$data->row_array() ; ?>
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
   <!-- Morris chart -->
   <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/morris.js/morris.css">
   <!-- jvectormap -->
   <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/jvectormap/jquery-jvectormap.css">
   <!-- Date Picker -->
   <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
   <!-- Daterange picker -->
   <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">
   <!-- bootstrap wysihtml5 - text editor -->
   <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

   <link rel="stylesheet" href="<?php echo base_url()?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
   <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
   <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- Google Font -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
<style type="text/css">

.gmap3{
  margin: 20px auto;
  border: 1px solid #C0C0C0;
  width: 1000px;
  height: 500px;
}
.cluster{
  color: #FFFFFF;
  text-align:center;
  font-family: 'Arial, Helvetica';
  font-size:11px;
  font-weight:bold;
  cursor: pointer;
}
.cluster-1{
  background-image:url(<?php echo base_url ()?>assets/gmaps/images/m1.png);
  line-height:53px;
  width: 53px;
  height: 52px;
}
.cluster-2{
  background-image:url(<?php echo base_url ()?>assets/gmaps/images/m2.png);
  line-height:53px;
  width: 56px;
  height: 55px;
}
.cluster-3{
  background-image:url(<?php echo base_url ()?>assets/gmaps/images/m3.png);
  line-height:66px;
  width: 66px;
  height: 65px;
}
</style>

<body onload="window.print();">
  <div class="wrapper">
    <!-- Main content -->
    <section class="invoice">
     <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
          <i class="fa fa-briefcase"></i> <?php echo $b['proyek_nama']; ?>
          <small class="pull-right">Jadwal Proyek : <b><?php echo dateFormat('d-m-Y',$b['proyek_sech_awal']) ?></b></small>
        </h2>
      </div>
    </div>

    <div class="row invoice-info">
      <div class="col-sm-4 invoice-col">
        <strong>Proyek</strong>
        <address>
          <table class="table">
            <tr>
              <th>Tahun</th>
              <td><?php echo $b['proyek_tahun']; ?></td>
            </tr>
            <tr>
              <th>Keuangan</th>
              <td><?php echo $b['proyek_keuangan']; ?></td>
            </tr>
            <tr>
              <th>Pagu</th>
              <td><?php echo $b['proyek_pagu']; ?></td>
            </tr>
            <tr>
              <th>Kontrak</th>
              <td><?php echo dateformat('d-m-Y',$b['proyek_kontrak']) ?></td>
            </tr>
            <tr>
              <th>Kategori</th>
              <td><?php echo $b['kategori_nama']; ?></td>
            </tr>
            <tr>
              <th>Proyek Progress</th>
              <td><?php echo $b['koordinat_value']; ?>%</td>
            </tr>
          </table> 
        </address>
      </div>

      <div class="col-sm-4 invoice-col">
        <div class="box box-primary">
          <div class="box-body box-profile">
            <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url().'assets/images/'.$b['user_photo'];?>" alt="User profile picture">
            <h3 class="profile-username text-center"><?php echo $b['user_nama']; ?></h3>
            <p class="text-muted text-center"><?php echo $b['user_email']; ?></p>
            <ul class="list-group list-group-unbordered">
              <li class="list-group-item">
                <?php echo $b['user_telp']; ?>
              </li>
              <li class="list-group-item">
                <?php echo strtoupper($b['user_bagian']); ?>
              </li>
            </ul>
            <a href="#" class="btn btn-primary btn-block"><b>Bagian Penanggung Jawab</b></a>
          </div>
        </div>
      </div>

      <div class="col-sm-4 invoice-col">
        <strong>Pekerja</strong>
        <address>
          <table class="table">
            <tr>
              <th>Nama</th>
              <td><?php echo $b['pekerja_nama']; ?></td>
            </tr>
            <tr>
              <th>Alamat</th>
              <td><?php echo $b['pekerja_alamat']; ?></td>
            </tr>
            <tr>
              <th>Direktur</th>
              <td><?php echo $b['pekerja_telp_kantor']; ?></td>
            </tr>
            <tr>
              <th>Telepon Direktur</th>
              <td><?php echo $b['pekerja_direktur']; ?></td>
            </tr>
            <tr>
              <th>Bagian</th>
              <td><?php echo $b['pekerja_jenis']; ?></td>
            </tr>
            <tr>
              <th>Bagian</th>
              <td><?php echo $b['pekerja_telp_direktur']; ?></td>
            </tr>
            
          </table>
        </address>
      </div>
    </div>

    <div class="row">
      <div class="col-xs-12 table-responsive">
        <div id="test" class="gmap3"></div>
        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
          <span><b><?php echo $b['koordinat_nama']; ?></b></span><br>
          <?php echo $b['koordinat_alamat']; ?><br>
          Progress proyek saat ini adalah <span class="label <?php if($b['koordinat_value']>50) { echo "bg-green"; } else { echo "bg-red"; } ?>"><?php echo $b['koordinat_value']; ?>%</span>
        </p>
      </div>
    </div>
  </section>
  <div class="clearfix"></div>
</div>
</body>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyAogXD-AHrsmnWinZIyhRORJ84bgLwDPpg"></script>

<script type="text/javascript" src="<?php echo base_url() ?>assets/gmaps/assets/js/gmap3.js"></script>
<script>
  $(function () {
    $('#test')
    .gmap3({
      center: [<?php echo $b['koordinat_lat'];?>,<?php echo $b['koordinat_lng'];?>],
      zoom: 15
    })

    .cluster({
      size: 200,
      markers: [
      {position: [<?php echo $b['koordinat_lat'];?>, <?php echo $b['koordinat_lng'];?>], icon: <?php if ($b['koordinat_value']>50){echo "'https://png.icons8.com/color/50/000000/green-flag.png'";} else{ echo "'https://png.icons8.com/color/50/000000/filled-flag.png'";}?>},
      ],
      cb: function (markers) {
        if (markers.length > 1) { 
          if (markers.length < 20) {
            return {
              content: "<div class='cluster cluster-1'>" + markers.length + "</div>",
              x: -26,
              y: -26
            };
          }
          if (markers.length < 50) {
            return {
              content: "<div class='cluster cluster-2'>" + markers.length + "</div>",
              x: -26,
              y: -26
            };
          }
          return {
            content: "<div class='cluster cluster-3'>" + markers.length + "</div>",
            x: -33,
            y: -33
          };
        }
      }
    })
    ;
  });
</script>