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

<div class="row">
  <div class="col-md-6">

    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header">
         <h4> 
          <i class="fa fa-chevron-left text-primary"> Proyek Jalan Tol</i>
        </h4>
      </div>

      <div class="box-body box-profile">
        <table class="table">
          <tr>
            <th>Tahun</th>
            <td class="text-right"><?php echo $b['proyek_tahun']; ?></td>
          </tr>
          <tr>
            <th>Nilai Kontrak</th>
            <td class="text-right"><?php echo "Rp ".number_format($b['proyek_keuangan']); ?></td>
          </tr>
          <tr>
            <th>Pagu</th>
            <td class="text-right"><?php echo "Rp ".number_format($b['proyek_pagu']); ?></td>
          </tr>
          <tr>
            <th>Rencana Kontrak</th>
            <td class="text-right"><?php $b['proyek_sech_awal']; ?></td>
          </tr>
          <tr>
            <th>Awal Kontrak</th>
            <td class="text-right"><?php echo dateformat('d-m-Y',$b['proyek_awal_kontrak']) ?></td>
          </tr>
          <tr>
            <th>Akhir Kontrak</th>
            <td class="text-right"><?php echo dateformat('d-m-Y',$b['proyek_akhir_kontrak']) ?></td>
          </tr>
          <tr>
            <th>Proyek Progress</th>
            <td class="text-right">
              <?php

              $pb_target=$b['pb_target'];
              $pb_real=$b['pb_real'];
              $pb_devisi=$b['pb_devisi'];
              $pb_stat_proyek=$b['pb_stat_proyek'];
              if($pb_target==0 || $pb_target<=70){
                if($pb_devisi==0 || $pb_devisi>=(-7)){
                  echo "<label class='label bg-red'>".$pb_real."% (".$pb_stat_proyek.")</label>";
                }
                else if ($pb_devisi<(-7) && $pb_devisi>=(-10)){

                  echo "<label class='label bg-red'>".$pb_real."% (".$pb_stat_proyek.")</label>";
                }
                else {
                  echo "<label class='label bg-red'>".$pb_real."% (".$pb_stat_proyek.")</label>";
                }
              }
              else if ($pb_target>70 && $pb_target<=100){
                if($pb_devisi==0 || $pb_devisi>=(-4)){
                  echo "<label class='label bg-red'>".$pb_real."% (".$pb_stat_proyek.")</label>"; 
                }
                else if ($pb_devisi<(-4) && $pb_devisi>=(-5)){

                  echo "<label class='label bg-red'>".$pb_real."% (".$pb_stat_proyek.")</label>";                         
                }
                else {

                  echo "<label class='label bg-red'>".$pb_real."% (".$pb_stat_proyek.")</label>";
                } 
              }
              else {
                echo "";
              }
              ?>
            </td>
          </tr>
        </table> 
      </div>
    </div>
  </div>


  <?php
  foreach ($bbc->result_array() as $i) :
    ?>

    <div class="col-md-12">
      <div class="box box-primary">
       <div class="box-header">
         <h4> 
          <p class="text-primary"><?php if($i['pekerja_jenis']=='kontraktor') {echo "Kontraktor"; } else {echo "Konsultan";} ?></p> 
        </h4>
      </div>

      <div class="box-body box-profile">
        <table class="table">

          <tr>
            <th>Bagian</th>
            <td class="text-right"><?php echo $i['pekerja_jenis']; ?></td>
          </tr>
          <tr>
            <th>Nama Direktur</th>
            <td class="text-right"><?php echo $i['pekerja_nama_direktur']; ?></td>
          </tr>
          <tr>
            <th>Telepon Direktur</th>
            <td class="text-right"><?php echo $i['pekerja_tel_direktur']; ?></td>
          </tr>
          <tr>
            <th>Nama Perusahaan</th>
            <td class="text-right"><?php echo $i['pekerja_nama_perusahaan']; ?></td>
          </tr>

          <tr>
            <th>Alamat Perusahaan</th>
            <td class="text-right"><?php echo $i['pekerja_alamat_perusahaan']; ?></td>
          </tr>

          <tr>
            <th>Telepon Kantor</th>
            <td class="text-right"><?php echo $i['pekerja_tel_kantor']; ?></td>
          </tr>

        </table>
      </div>
    </div>
  </div>

<?php endforeach;?>



<div class="col-md-12">
  <div class="box box-primary">
    <div class="box-header">
     <h4 class="text-primary">Gallery</h4>
   </div>

   <div class="box-body box-profile">
     <?php foreach ($foto->result_array() as $i) : ?>
      <div class="col-sm-4">
        <a class="btn" data-toggle="modal" data-target="#ModalView<?php echo $i['proyek_id'];?>"><img class="img-responsive" src="<?php echo base_url().'assets/images/'.$i['file_data'];?>" alt="Photo"></a>
      </div>
    <?php endforeach; ?>
  </div>
</div>
</div>
<div class="col-md-12">
  <div class="box box-primary">
   <div class="box-header">
    <h4 class="text-primary">Berkas Proyek</h4>
  </div>
  <div class="box-body box-profile">
    <table class="table table-responsive table-hovered">
      <tr>
        <th>No</th>
        <th>File</th>
        <th>Aksi</th>
      </tr>
      <?php 
      $no=0;
      foreach ($file->result_array() as $i) : 
        $no++;
        ?>
        <tr>
          <td><?php echo $no; ?></td>
          <td><?php echo $i['file_data']; ?></td>
          <td>
            <a href="<?php echo base_url()?>padmin/download/<?php echo $i['file_id'];?>">
              <i class="fa fa-download"></i>
            </a>
            &nbsp;&nbsp;
            <a class="btn" data-toggle="modal" data-target="#EditFile<?php echo $i['file_id'];?>"><i class="fa fa-edit"></i></a>
          </td>
        </tr>
      <?php endforeach;  ?>
    </table>
  </div>
</div>
</div>


</div>

<div class="col-md-6">

  <div class="col-md-12">
    <div class="box box-primary">
     <div class="box-header">
      <h4 class="text-primary"> Penanggung Jawab </h4>
    </div>
    <div class="box-body box-profile">
      <table class="table">

        <tr>
          <th>Nama Penanggung Jawab</th>
          <td class="text-right"><?php echo $b['pn_nama'];  ?></td>
        </tr>
        <tr>
          <th>Email</th>
          <td class="text-right"><?php echo $b['pn_email']; ?></td>
        </tr>
        <tr>
          <th>Telepon</th>
          <td class="text-right"><?php echo $b['pn_tel'];  ?></td>
        </tr>
        <tr>
          <th>Nama Perusahaan</th>
          <td class="text-right"><?php  echo strtoupper($b['pn_bagian']); ?></td>
        </tr>


      </table>


    </div>
  </div>
</div>

<div class="col-md-12">
  <div class="box box-primary">
    <div class="box-header">
      <small class="pull-right">Jadwal Proyek : <b><?php echo dateFormat('d-m-Y',$b['proyek_sech_awal']) ?></b></small>
    </div>
    <div class="box-body box-profile">
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

      <div id="test" class="gmap3" style="width:500px;height: 300px;max-width: 500px;"></div>
      <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
        <span><b><?php echo $b['koordinat_nama']; ?></b></span><br>
        <?php echo $b['koordinat_alamat']; ?><br>
        Progress proyek saat ini adalah
        <?php
        $pb_target=$b['pb_target'];
        $pb_real=$b['pb_real'];
        $pb_devisi=$b['pb_devisi'];
        if($pb_target==0 || $pb_target<=70){
          if($pb_devisi==0 || $pb_devisi>=(-7)){
            echo "<label class='label bg-red'>".$pb_real."% (Wajar)</label>";
          }
          else if ($pb_devisi<(-7) && $pb_devisi>=(-10)){

            echo "<label class='label bg-red'>".$pb_real."% (Terlambat)</label>";
          }
          else {
            echo "<label class='label bg-red'>".$pb_real."% (Kritis)</label>";
          }
        }
        else if ($pb_target>70 && $pb_target<=100){
          if($pb_devisi==0 || $pb_devisi>=(-4)){
            echo "<label class='label bg-red'>".$pb_real."% (Wajar)</label>"; 
          }
          else if ($pb_devisi<(-4) && $pb_devisi>=(-5)){

            echo "<label class='label bg-red'>".$pb_real."% (Terlambat)</label>";                         
          }
          else {

            echo "<label class='label bg-red'>".$pb_real."% (Kritis)</label>";
          } 
        }
        else {
          echo "a";
        }
        ?>
      </p>
    </div>
  </div>
</div>

<div class="col-md-12">
  <div class="box box-primary">
    <div class="box-body box-profile">
     <div id="realtarget" style="height: 500px"></div>
   </div>
 </div>
</div>

<div class="col-md-12">
  <div class="box box-primary">
    <div class="box-body box-profile">
     <div id="curve_chart" style="height: 500px"></div>
   </div>
 </div>
</div>
</div>
</div>






<?php foreach ($foto->result_array() as $i) : ?>
  <!--Modal Hapus Pengguna-->
  <div class="modal fade" id="ModalView<?php echo $i['proyek_id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
      <div class="col-md-12">  
        <div class="modal-content">
          <div class="modal-body">     
            <img class="img-responsive" src="<?php echo base_url().'assets/images/'.$i['file_data'];?>" alt="Photo">
          </div>
        </div>
      </div>
    </div>
  </div>
<?php endforeach;?>


<?php foreach ($file->result_array() as $i) : ?>
  <!--Modal Hapus Pengguna-->
  <div class="modal fade" id="EditFile<?php echo $i['file_id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
      <div class="col-md-12">  
        <div class="modal-content">
          <div class="modal-body">
            <div class="box box-warning">
              <div class="box-header with-border">
                <h3 class="box-title">Lampiran Proyek</h3>
              </div>
              <div class="box-body">
                <div class="row">
                  <form action="<?php echo base_url()?>padmin/update_lampiran_file" method="POST" enctype="multipart/form-data" >
                    <div class="form-group col-md-12">
                      <label>LAMPIRAN</label>
                      <input type="hidden" name="file_id" value="<?php echo $i['file_id']; ?>">
                      <input type="file"  name="fileat" class="form-control btn-success">
                    </div>

                    <div class="form-group col-md-12">
                      <div class="form-group pull-right">
                        <button type="submit" class="btn btn-primary btn-flat pull-right"><span class="fa fa-pencil"></span> Publish</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php endforeach;?>


<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyAogXD-AHrsmnWinZIyhRORJ84bgLwDPpg"></script>

<script type="text/javascript" src="<?php echo base_url() ?>assets/gmaps/assets/js/gmap3.js"></script>
<script>
  $(function () {
    $('#test')
    .gmap3({
      center: [<?php echo $b['koordinat_lat'];?>,<?php echo $b['koordinat_lng'];?>],
      zoom: 15,
      mapTypeControl: false
    })

    .cluster({
      size: 200,
      markers: [
      {position: [<?php echo $b['koordinat_lat'];?>, <?php echo $b['koordinat_lng'];?>], icon: "<?php if ($b['koordinat_value']>50){echo base_url('assets/gmaps/images/green.png');} else{ echo base_url('assets/gmaps/images/red.png');}?>"},
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


<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Tanggal', 'Real', 'Target'],
      [null, 0, 0],
      <?php foreach ($chartrt->result_array() as $i) : ?>
        ['<?php echo $i['tanggal']; ?>',  <?php echo $i['pb_real']; ?>, <?php echo $i['pb_target']?>],
      <?php endforeach; ?>
      ]);

    var options = {
      title: 'Real Target',
      curveType: 'function',
      legend: { position: 'bottom' },
      hAxis: {
        title: 'Tanggal',
      },
      vAxis: { 
        title: 'Progress (%)',
        ticks: [0, 10, 20, 30, 40 ,50 ,60 ,70 ,80 ,90 ,100]
      } ,
      pointSize: 4,
    };

    var chart = new google.visualization.LineChart(document.getElementById('realtarget'));

    chart.draw(data, options);
  }



</script>

<script type="text/javascript">
  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Tanggal', 'TDK'],
      <?php foreach ($charttdk->result_array() as $i) : ?>
        ['<?php echo $i['tanggal']; ?>',  <?php echo $i['pb_ds_keuangan'];?>],
      <?php endforeach; ?>
      ]);

    var options = {
      title: 'Real Target',
      curveType: 'function',
      legend: { position: 'bottom' },
      hAxis: {
        title: 'Tanggal',
      },
      vAxis: { 
        title: 'Pagu (Rp.)',
      } ,
      pointSize: 4,
    };

    var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

    chart.draw(data, options);
  }

  
</script>