<?php 
$b=$data->row_array() ; 

?>

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
<div class="content-wrapper">
 <section class="content-header">
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Examples</a></li>
    <li class="active">Invoice</li>
  </ol>
</section>



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
  <div class="col-sm-8 col-sm-offset-2">
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
</div>

<div class="row invoice-info">

  <div class="col-sm-6 invoice-col">
    <strong>Proyek</strong>
    <address>
      <table class="table">
        <tr>
          <th>Tahun</th>
          <td><?php echo $b['proyek_tahun']; ?></td>
        </tr>
        <tr>
          <th>Nilai Kontrak</th>
          <td><?php echo "Rp ".number_format($b['proyek_keuangan']); ?></td>
        </tr>
        <tr>
          <th>Pagu</th>
          <td><?php echo "Rp ".number_format($b['proyek_pagu']); ?></td>
        </tr>
        <tr>
          <th>Awal Kontrak</th>
          <td><?php echo dateformat('d-m-Y',$b['proyek_awal_kontrak']) ?></td>
        </tr>
        <tr>
          <th>Akhir Kontrak</th>
          <td><?php echo dateformat('d-m-Y',$b['proyek_akhir_kontrak']) ?></td>
        </tr>
        <tr>
          <th>Proyek Progress</th>
          <td><?php echo $b['koordinat_value']; ?>%</td>
        </tr>
      </table> 
    </address>
  </div>


  <div class="col-sm-6 invoice-col">
    <strong>Bidang</strong>
    <address>
      <table class="table table-responsive">
        <tr>
          <th>Target</th>
          <th>Real</th>
          <th>Dev</th>
        </tr>
        <tr>
          <td><?php echo $b['pb_target']; ?></td>
          <td><?php echo $b['pb_real']; ?></td>
          <td><?php echo $b['pb_devisi']; ?></td>
        </tr>
      </table>

      <table class="table">
        <tr>
          <th>Daya Serap Kontrak</th>
          <td><?php echo "Rp ".number_format($b['pb_ds_kontrak']); ?></td>
        </tr>
        <tr>
          <th>Daya Serap Administrasi Proyek</th>
          <td><?php echo "Rp ".number_format($b['pb_ds_ap']); ?></td>
        </tr>
        <tr>
          <th>Total Biaya Serap Keuangan</th>
          <td><?php echo "Rp ".number_format($b['pb_ds_keuangan']); ?></td>
        </tr>
        <tr>
          <th>Sisa Anggaran</th>
          <td><?php echo "Rp ".number_format($b['pb_sisa_anggaran']); ?></td>
        </tr>
      </table> 
    </address>
  </div>

</div>

<div class="row invoice-info">
  <?php
  foreach ($bbc->result_array() as $i) :
    ?>
    <div class="col-sm-6 invoice-col">
      <strong><?php if($i['pekerja_jenis']=='kontraktor') {echo "Kontraktor"; } else {echo "Konsultan";} ?></strong>
      <address>
        <table class="table">
          <tr>
            <th>Nama Penanggung Jawab</th>
            <td><?php echo $i['pekerja_nama']; ?></td>
          </tr>
          <tr>
            <th>Telepon</th>
            <td><?php echo $i['pekerja_tel']; ?></td>
          </tr>

          <tr>
            <th>Bagian</th>
            <td><?php echo $i['pekerja_jenis']; ?></td>
          </tr>
          <tr>
            <th>Nama Direktur</th>
            <td><?php echo $i['pekerja_nama_direktur']; ?></td>
          </tr>
          <tr>
            <th>Telepon Direktur</th>
            <td><?php echo $i['pekerja_tel_direktur']; ?></td>
          </tr>
          <tr>
            <th>Nama Perusahaan</th>
            <td><?php echo $i['pekerja_nama_perusahaan']; ?></td>
          </tr>

          <tr>
            <th>Alamat Perusahaan</th>
            <td><?php echo $i['pekerja_alamat_perusahaan']; ?></td>
          </tr>

          <tr>
            <th>Telepon Kantor</th>
            <td><?php echo $i['pekerja_tel_kantor']; ?></td>
          </tr>

        </table>
      </address>
    </div>
  <?php endforeach;?>


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
<!--
<div class="row no-print">
  <div class="col-xs-12">
    <a href="<?php echo base_url().'padmin/print/'.$b['proyek_id'];?>" target="_blank" class="btn btn-success pull-right"><i class="fa fa-print"></i> Print</a>
  </div>
</div>
-->
</section>
<div class="clearfix"></div>
</div>
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