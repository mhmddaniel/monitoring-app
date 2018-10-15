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
    <li><a href="#">Pekerjaan</a></li>
    <li class="active">Detail Pekerjaan</li>
  </ol>
</section>

<div class="row"  style="font-family:Open Sans; font-weight:lighter;">
  <div class="col-md-6">

    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header">
         <h4 style="font-family:Open Sans; font-weight:lighter;" class="text-primary">
          <a href="<?php echo base_url()?>proyek"><i class="fa fa-chevron-left text-primary"></i></a> <?php echo $b['proyek_nama']; ?>
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
            <td class="text-right"><?php echo dateformat('d-m-Y',$b['proyek_sech_awal']); ?></td>
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
            <th>Pekerjaan Progress</th>
            <td class="text-right">
              <?php
              $cc=$this->m_padmin->get_detail_by_proyekid($b['proyek_id']);

              if($cc['pb_real']==100 && $cc['pb_devisi']==0){
                echo "<label class='label bg-green'>".$cc['pb_real']."% (Selesai)</label>";
              }
              else if($cc['pb_real']==0){
                echo "<label class='label bg-gray'>Belum Mulai</label>";
              }
              else {
                if($cc['pb_target']==0 || $cc['pb_target']<=70){

                  if($cc['pb_devisi']>0){
                    echo "<label class='label bg-blue'>".$cc['pb_real']."% (Baik)</label>";
                  }
                  else {
                    if($cc['pb_devisi']==0 || $cc['pb_devisi']>=(-7)){
                      echo "<label class='label bg-green'>".$cc['pb_real']."% (Wajar)</label>";
                    }
                    else if ($cc['pb_devisi']<(-7) && $cc['pb_devisi']>=(-10)){

                      echo "<label class='label bg-yellow'>".$cc['pb_real']."% (Terlambat)</label>";
                    }
                    else {
                      echo "<label class='label bg-red'>".$cc['pb_real']."% (Kritis)</label>";
                    }

                  }
                }
                else if ($cc['pb_target']>70 && $cc['pb_target']<=100){

                  if($cc['pb_devisi']>0){
                    echo "<label class='label bg-blue'>".$cc['pb_real']."% (Baik)</label>";
                  }
                  else {
                    if($cc['pb_devisi']==0 || $cc['pb_devisi']>=(-4)){
                      echo "<label class='label bg-green'>".$cc['pb_real']."% (Wajar)</label>"; 
                    }
                    else if ($cc['pb_devisi']<(-4) && $cc['pb_devisi']>=(-5)){

                      echo "<label class='label bg-yellow'>".$cc['pb_real']."% (Terlambat)</label>";                          
                    }
                    else {

                      echo "<label class='label bg-red'>".$cc['pb_real']."% (Kritis)</label>";
                    } 
                  } 
                }
                else {
                  echo "";
                }
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
          <p class="text-primary"  style="font-family:Open Sans; font-weight:lighter;">Penyedia Jasa</p> 
        </h4>
      </div>

      <div class="box-body box-profile">
        <table class="table">

          <tr>
            <th>Nama Perusahaan</th>
            <td class="text-right"><?php echo $i['pekerja_nama_perusahaan']; ?></td>
          </tr>
          <tr>
            <th>Jenis</th>
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
     <h4 class="text-primary"  style="font-family:Open Sans; font-weight:lighter;">Gallery <a href="<?php echo base_url()?>padmin/downloadImage/<?php echo $b['proyek_id'];?>" class="pull-right"> <i class="fa fa-download"></i></a></h4>
   </div>

   <div class="box-body box-profile">
     <?php foreach ($foto->result_array() as $i) : ?>
      <div class="col-sm-4">
        <a class="btn" data-toggle="modal" data-target="#ModalView<?php echo $i['file_id'];?>"><img class="img-responsive" src="<?php echo base_url().'assets/images/'.$i['file_data'];?>" alt="Photo"></a>
      </div>
    <?php endforeach; ?>
    <div class="row">

      <div class="col-md-6 col-md-offset-3">
        <a href="<?php echo base_url() ?>gallery/<?php echo $this->uri->segment(3);?>" class="btn btn-primary text-center form-control" >View More</a>
      </div>
    </div>
  </div>
</div>
</div>
<div class="col-md-12">
  <div class="box box-primary">
   <div class="box-header">
    <h4 class="text-primary"  style="font-family:Open Sans; font-weight:lighter;">Berkas Pekerjaan</h4>
  </div>
  <div class="box-body box-profile">
    <div class="table-responsive">
      <table class="table  table-hovered">
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
            <td><?php echo $i['file_nama']; ?></td>
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
    <div class="row">

      <div class="col-md-6 col-md-offset-3">
        <a href="<?php echo base_url() ?>lampiran/<?php echo $this->uri->segment(3);?>" class="btn btn-primary text-center form-control" >View More</a>
      </div>
    </div>
  </div>
</div>
</div>

<div class="col-md-12">
  <div class="box box-primary">
   <div class="box-header">
    <h4 class="text-primary"  style="font-family:Open Sans; font-weight:lighter;">Catatan</h4>
  </div>
  <div class="box-body box-profile">
    <div class="table-responsive">
      <table class="table  table-hovered">
        <tr>
          <th class="col-md-1">No</th>
          <th class="col-md-8">Catatan</th>
          <th class="col-md-3">Tanggal</th>
        </tr>
        <?php 
        $no=0;
        foreach ($catatan->result_array() as $i) : 
          $no++;
          ?>
          <tr>
            <td class="col-md-1"><?php echo $no; ?></td>
            <td class="col-md-8"><?php echo $i['catatan_isi']; ?></td>
            <td class="col-md-3"><?php echo date('d-m-Y H:i:s',strtotime($i['catatan_tanggal'])); ?></td>
          </tr>
        <?php endforeach;  ?>
      </table>
    </div>
    <div class="row">

      <div class="col-md-6 col-md-offset-3">
        <a href="<?php echo base_url() ?>catatan/<?php echo $this->uri->segment(3);?>" class="btn btn-primary text-center form-control" >View More</a>
      </div>
    </div>
  </div>
</div>
</div>


<div class="col-md-12">
  <div class="box box-primary">
    <div class="box-body box-profile">
     <div class="row">
      <div class="col-md-12">
        <div class="pull-right" style="margin-right: 40px"><a href="<?php echo base_url()?>padmin/print_chart/dataawal/<?php echo $this->uri->segment(3);?>" class="btn btn-primary">Download</a></div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div id="data_awal" style="height: 500px"></div>
      </div>
    </div>
  </div>
</div>
</div>

</div>

<div class="col-md-6">

  <div class="col-md-12">
    <div class="box box-primary">
     <div class="box-header">
      <h4 class="text-primary"  style="font-family:Open Sans; font-weight:lighter;"> Penanggung Jawab </h4>
    </div>
    <div class="box-body box-profile">
      <table class="table">

        <tr>
          <th>Nama</th>
          <td class="text-right"><?php echo $b['user_nama'];  ?></td>
        </tr>
        <tr>
          <th>Email</th>
          <td class="text-right"><?php echo $b['user_email']; ?></td>
        </tr>
        <tr>
          <th>Telepon</th>
          <td class="text-right"><?php echo $b['user_telp'];  ?></td>
        </tr>
        <tr>
          <th>Bidang</th>
          <td class="text-right"><?php  echo strtoupper($b['user_bagian']); ?></td>
        </tr>


      </table>


    </div>
  </div>
</div>

<div class="col-md-12">
  <div class="box box-primary">
    <div class="box-header">
      <small class="pull-right">Jadwal Pekerjaan : <b><?php echo dateFormat('d-m-Y',$b['proyek_sech_awal']) ?></b></small>
    </div>
    <div class="box-body box-profile">
      <table class="table table-responsive">
        <tr>
          <th>Target</th>
          <th>Real</th>
          <th>Dev</th>
        </tr>
        <tr>
          <td><?php echo $prd['pb_target']; ?></td>
          <td><?php echo $prd['pb_real']; ?></td>
          <td><?php echo $prd['pb_devisi']; ?></td>
        </tr>

      </table>

      <table class="table">
        <tr>
          <th>Daya Serap Kontrak</th>
          <td><?php echo "Rp ".number_format($b['pb_ds_kontrak']); ?></td>
        </tr>
        <tr>
          <th>Sisa Kontrak</th>
          <td><?php echo  "Rp ".number_format($b['proyek_keuangan']-$b['pb_ds_kontrak']); ?></td>
        </tr>
        <tr>
          <th>Sisa Anggaran</th>
          <td><?php echo "Rp ".number_format($b['proyek_pagu']-$b['pb_ds_kontrak']); ?></td>
        </tr>
      </table> 

      <div id="test" class="gmap3" style="width:500px;height: 300px;max-width: 100%;"></div>
      <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
        <span><b><?php echo $b['koordinat_nama']; ?></b></span><br>
        <?php echo $b['koordinat_alamat']; ?><br>
        Progress proyek saat ini adalah
        <?php
        $cc=$this->m_padmin->get_detail_by_proyekid($b['proyek_id']);


        if($cc['pb_real']==100 && $cc['pb_devisi']==0){
          echo "<label class='label bg-green'>".$cc['pb_real']."% (Selesai)</label>";
        }
        else if($cc['pb_real']==0){
          echo "<label class='label bg-gray'>Belum Mulai</label>";
        }
        else {


          if($cc['pb_target']==0 || $cc['pb_target']<=70){

            if($cc['pb_devisi']>0){
              echo "<label class='label bg-blue'>".$cc['pb_real']."% (Baik)</label>";
            }
            else {
              if($cc['pb_devisi']==0 || $cc['pb_devisi']>=(-7)){
                echo "<label class='label bg-green'>".$cc['pb_real']."% (Wajar)</label>";
              }
              else if ($cc['pb_devisi']<(-7) && $cc['pb_devisi']>=(-10)){

                echo "<label class='label bg-yellow'>".$cc['pb_real']."% (Terlambat)</label>";
              }
              else {
                echo "<label class='label bg-red'>".$cc['pb_real']."% (Kritis)</label>";
              }

            }
          }
          else if ($cc['pb_target']>70 && $cc['pb_target']<=100){

            if($cc['pb_devisi']>0){
              echo "<label class='label bg-blue'>".$cc['pb_real']."% (Baik)</label>";
            }
            else {
              if($cc['pb_devisi']==0 || $cc['pb_devisi']>=(-4)){
                echo "<label class='label bg-green'>".$cc['pb_real']."% (Wajar)</label>"; 
              }
              else if ($cc['pb_devisi']<(-4) && $cc['pb_devisi']>=(-5)){

                echo "<label class='label bg-yellow'>".$cc['pb_real']."% (Terlambat)</label>";                          
              }
              else {

                echo "<label class='label bg-red'>".$cc['pb_real']."% (Kritis)</label>";
              } 
            } 
          }
          else {
            echo "";
          }
        }
        ?>
      </p>
    </div>
  </div>
</div>

<div class="col-md-12">
  <div class="box box-primary">
    <div class="box-body box-profile">
      <div class="row">
        <div class="col-md-12">
          <div class="pull-right" style="margin-right: 40px"><a href="<?php echo base_url()?>padmin/print_chart/realtarget/<?php echo $this->uri->segment(3);?>" class="btn btn-primary">Download</a></div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div id="realtarget" style="height: 500px"></div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="col-md-12">
  <div class="box box-primary">
    <div class="box-body box-profile">
      <div class="row">
        <div class="col-md-12">
          <div class="pull-right" style="margin-right: 40px"><a href="<?php echo base_url()?>padmin/print_chart/curve/<?php echo $this->uri->segment(3);?>" class="btn btn-primary">Download</a></div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div id="curve_chart" style="height: 500px"></div>
        </div>
      </div>
    </div>
  </div>
</div>

</div>
</div>
</div>






<?php foreach ($foto->result_array() as $i) : ?>
  <!--Modal Hapus Pengguna-->
  <div class="modal fade" id="ModalView<?php echo $i['file_id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
                <h3 class="box-title">Lampiran Pekerjaan</h3>
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
      {position: [<?php echo $b['koordinat_lat'];?>, <?php echo $b['koordinat_lng'];?>], icon: "<?php 

      $cc=$this->m_padmin->get_detail_by_proyekid($b['proyek_id']);
      if($cc['pb_real']==0){
        echo base_url('assets/gmaps/images/grey.png');
      }
      else {
        if($cc['pb_target']==0 || $cc['pb_target']<=70){

          if($cc['pb_devisi']>0){
            echo base_url('assets/gmaps/images/blue.png');
          }
          else {
            if($cc['pb_devisi']==0 || $cc['pb_devisi']>=(-7)){
              echo base_url('assets/gmaps/images/green.png');
            }
            else if ($cc['pb_devisi']<(-7) && $cc['pb_devisi']>=(-10)){
              echo base_url('assets/gmaps/images/yellow.png');
            }
            else {
              echo base_url('assets/gmaps/images/red.png');
            }

          }
        }
        else if ($cc['pb_target']>70 && $cc['pb_target']<=100){

          if($cc['pb_devisi']>0){
            echo base_url('assets/gmaps/images/blue.png');
          }
          else {
            if($cc['pb_devisi']==0 || $cc['pb_devisi']>=(-4)){
              echo base_url('assets/gmaps/images/green.png'); 
            }
            else if ($cc['pb_devisi']<(-4) && $cc['pb_devisi']>=(-5)){
              echo base_url('assets/gmaps/images/yellow.png');                  
            }
            else {
              echo base_url('assets/gmaps/images/red.png');
            } 
          } 
        }
        else {
          echo "";
        }
      }
      ?>"},
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Tanggal', 'Realisasi', 'Target'],
      [null, 0, 0],
      <?php foreach ($chartrt->result_array() as $i) : ?>
        ['<?php echo $i['tanggal']; ?>',  <?php echo $i['pb_real']; ?>, <?php echo $i['pb_target']; ?>],
      <?php endforeach; ?>
      ]);

    var options = {
      title: 'Kurva S',
      curveType: 'none',
      fontName: 'Open Sans',
      legend: { position: 'top' },
      hAxis: {
        title: 'Tanggal',
      },
      vAxis: { 
        title: 'Progress (%)',
        ticks: [0, 10, 20, 30, 40 ,50 ,60 ,70 ,80 ,90 ,100]
      } ,
      pointSize: 4,
    };


    var realtarget = document.getElementById('realtarget');
    var chart = new google.visualization.LineChart(realtarget);

    google.visualization.events.addListener(chart, 'ready', function () {
    });
    chart.draw(data, options);
  }

</script>

<script type="text/javascript">
  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Tanggal', 'Daya Serap'],
      [null, 0],
      <?php foreach ($charttdk->result_array() as $i) : ?>
        ['<?php echo $i['tanggal']; ?>',  <?php echo $i['pb_ds_kontrak']; ?>],
      <?php endforeach; ?>
      ]);

    var options = {
      title: 'Keuangan',
      curveType: 'none',
      fontName: 'Open Sans',
      legend: { position: 'top' },
      hAxis: {
        title: 'Tanggal',
      },
      vAxis: { 
        title: 'Pagu (Rp.)',
      } ,
      pointSize: 4,
    };


    var curve_chart = document.getElementById('curve_chart');
    var chart = new google.visualization.LineChart(curve_chart);

    google.visualization.events.addListener(chart, 'ready', function () {
    });
    chart.draw(data, options);


  }


</script>


<script type="text/javascript">
  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {
    var dataTable = new google.visualization.DataTable();
    dataTable.addColumn('string', 'Year');
    dataTable.addColumn('number', 'Progres');
    dataTable.addRows([
      <?php foreach($da->result_array() as $i) : ?>
        ['<?php echo date('d M Y',strtotime($i['da_tanggal'])); ?>',  <?php echo $i['da_progres'];?>],
      <?php endforeach;  ?>

      ]);

    var options = {
      title: 'Kurva S Rencana',
      curveType: 'none',
      fontName: 'Open Sans',
      legend: { position: 'top' },
      hAxis: {
        title: 'Bulan',
      },
      vAxis: { 
        viewWindowMode: 'explicit',
        viewWindow: {
          min: 0,
        },
        ticks: [0,10, 20, 30, 40, 50,60,70,80,90,100] ,
        beginAtZero: true
      } ,
      pointSize: 4,
    };


    var data_awal = document.getElementById('data_awal');
    var chart = new google.visualization.LineChart(data_awal);

    google.visualization.events.addListener(chart, 'ready', function () {
    });
    chart.draw(dataTable, options);

  }
</script>