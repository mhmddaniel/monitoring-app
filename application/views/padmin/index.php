
<link rel="stylesheet" href="<?php echo base_url()?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url().'assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css'?>">

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Dashboard
      <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>


  <?php 
  $a=$countproyek->row_array(); 
  $b=$sumpagu->row_array(); 
  $c=$sumkeluar->row_array(); 
  $d=$sumprog->row_array(); 
  $e=$sum_sisa->row_array(); 
  $f=$diffdateplus->row_array(); 
  $g=$diffdatemin->row_array(); 
  $h=$countselesai->row_array(); 
  ?>
  <section class="content">
   <div class="row">
    <div class="col-md-12">
      <div class="col-md-3">
        <div class="small-box bg-blue">
          <div class="inner">
            <h3><?php echo $a['jumproyek']; ?></h3>
            <p>Total Proyek</p>
          </div>
          <div class="icon">
            <i class="fa fa-shopping-cart"></i>
          </div>
          <a href="#" class="small-box-footer">
          </a>
        </div>
      </div>

      <div class="col-md-3">
        <div class="small-box bg-red">
          <div class="inner">
            <h3><?php echo "Rp ".number_format($b['sumpagu']); ?></h3>
            <p>Total Pagu</p>
          </div>
          <div class="icon">
            <i class="fa fa-shopping-cart"></i>
          </div>
          <a href="#" class="small-box-footer">
          </a>
        </div>
      </div>

      <div class="col-md-3">
        <div class="small-box bg-purple">
          <div class="inner">
            <h3><?php echo "Rp ".number_format($c['suma']+$c['sumb']); ?></h3>
            <p>Total Uang Keluar</p>
          </div>
          <div class="icon">
            <i class="fa fa-shopping-cart"></i>
          </div>
          <a href="#" class="small-box-footer">
          </a>
        </div>
      </div>
      <div class="col-md-3">
        <div class="small-box bg-aqua">
          <div class="inner">
            <h3><?php echo "Rp ".number_format($e['sumsisa']); ?></h3>
            <p>Total Sisa Uang</p>
          </div>
          <div class="icon">
            <i class="fa fa-shopping-cart"></i>
          </div>
          <a href="#" class="small-box-footer">
          </a>
        </div>
      </div>


    </div>


    <div class="col-md-12">
      <div class="col-md-7">
        <div class="box box-widget widget-user-2">
          <div class="widget-user-header bg-yellow">
            <h3 class="widget-user-username">Progress Proyek</h3>
          </div>
          <div class="box-footer no-padding">
            <ul class="nav nav-stacked">

             <?php
             foreach ($sumprog->result_array() as $i) :

              if($i['sumprog']>0){
                ?>
                <li><a href="#"><?php if($i['pb_stat_proyek'] == 'wajar') { echo "Wajar"; } else if($i['pb_stat_proyek'] == 'belummulai') { echo "Belum Mulai"; } else { echo $i['pb_stat_proyek']; } ?><span class="pull-right badge bg-blue"><?php echo $i['sumprog'];?></span></a></li>
              <?php } else {?>
                
              <?php } endforeach; ?>

            </ul>
          </div>
        </div>
      </div>
      <div class="col-md-5">
        <div class="col-md-12">
          <div class="box box-solid ">
            <div class="box-header bg-green">
              <i class="fa fa-calendar"></i>
              <h3 class="box-title">Kalender</h3>
            </div>
            <div class="box-body no-padding">
              <div id="calendar" style="width: 100%"></div>
            </div>
          </div>

        </div>
      </div>

    </div>
  </div>
  <div class="row">
    <div class="col-md-12">

      <div class="col-md-4">
        <div class="small-box bg-red">
          <div class="inner">
            <h3><?php echo $f['countkerja']; ?></h3>
            <p>Proyek sedang dikerjakan</p>
          </div>
          <div class="icon">
            <i class="fa fa-shopping-cart"></i>
          </div>
          <a href="#" class="small-box-footer">
          </a>
        </div>
      </div>

      <div class="col-md-4">
        <div class="small-box bg-purple">
          <div class="inner">
            <h3><?php echo $h['countselesai']; ?></h3>
            <p>Proyek Selesai</p>
          </div>
          <div class="icon">
            <i class="fa fa-shopping-cart"></i>
          </div>
          <a href="#" class="small-box-footer">
          </a>
        </div>
      </div>
      <div class="col-md-4">
        <div class="small-box bg-aqua">
          <div class="inner">
            <h3><?php echo $g['countkerja']; ?></h3>
            <p>Proyek belum mulai</p>
          </div>
          <div class="icon">
            <i class="fa fa-shopping-cart"></i>
          </div>
          <a href="#" class="small-box-footer">
          </a>
        </div>
      </div>
    </div>
  </div>

  <div class="row">    
    <div class="col-md-12">
      <div class="box box-solid2">
        <div class="box-header bg-green">
          <i class="fa fa-calendar"></i>
          <h3 class="box-title">Grafik</h3>
        </div>
        <div class="box-body">
          <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
          <script type="text/javascript">
            google.charts.load('current', {'packages':['bar']});
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
              var data = google.visualization.arrayToDataTable([
                ['Month', 'Rencana Awal Kontrak', 'Awal Kontrak'],
                <?php foreach ($countjum->result_array() as $i) : ?>
                  ['<?php echo $i['proyek_bulan']; ?>', <?php echo $i['countsech']; ?>, <?php echo $i['countawal']; ?>],

                <?php endforeach; ?>
                ]);

              var options = {
                chart: {
                  title: 'Kontrak',
                  subtitle: 'Jumlah Kontrak Proyek',
                }
              };

              var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

              chart.draw(data, google.charts.Bar.convertOptions(options));
            }
          </script>
          <div id="columnchart_material" style="width: 800px; height: 500px;"></div>
        </div>
      </div>
    </div>
  </div>



</section>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>


<script>
  var ctx = document.getElementById('myChart').getContext('2d');
  var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
      labels: <?php echo json_encode($bulan);?>,
      datasets: [{
        label: "Visitor",
        backgroundColor: 'rgb(255, 99, 132)',
        borderColor: 'rgb(255, 99, 132)',
        data: <?php echo json_encode($value);?>
      }]
    },

    // Configuration options go here
    options: {}
  });</script>
  <script>
    $(function () {
      $('#example1').DataTable()
      $('#example2').DataTable({
        'paging'      : true,
        'lengthChange': false,
        'searching'   : false,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false
      })
    })
  </script>
  <!-- Sparkline -->
  <script src="<?php echo base_url().'assets/plugins/sparkline/jquery.sparkline.min.js'?>"></script>
  <!-- jvectormap -->
  <script src="<?php echo base_url().'assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'?>"></script>
  <script src="<?php echo base_url().'assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'?>"></script>
  <script src="<?php echo base_url()?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url()?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>


