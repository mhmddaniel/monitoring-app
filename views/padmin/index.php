
<style type="text/css">
.chart {
  width: 100%; 
  min-height: 450px;
}
</style>
<link rel="stylesheet" href="<?php echo base_url()?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url().'assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css'?>">

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
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
  $q=$data->row_array();
  ?>
  <section class="content">
   <div class="row">

    <div class="col-md-12">
      <div class="col-md-4">
        <div class="col-md-12">
          <div class="box box-solid" style="background: linear-gradient(to bottom right, #1DE9B6, #04A9F5); color: white">
            <div class="box-body no-padding">

              <script type="text/javascript" src="https://raw.githubusercontent.com/kylestetz/CLNDR/master/clndr.min.js"></script>
              <script type="text/javascript">
                $('#calendar').clndr({
                  daysOfTheWeek: ['S', 'M', 'T', 'W', 'T', 'F', 'S']
                  numberOfRows: 5
                  days: [
                  {
                    day: '1',
                    classes: 'day today event',
                    id: 'calendar-day-2013-09-01',
                    events: [ ],
                    date: moment('2013-09-01')
                  },
                  ...
                  ]
                  month: 'September'
                  year: '2013'
                  eventsThisMonth: [ ],
                  extras: { }

                });
              </script>
              <div id="calendar" style="width: 100%"></div>
            </div>
          </div>

        </div>
        <div class="col-md-12">
          <div class="box box-widget widget-user-2">
            <div class="box-footer" style="background: linear-gradient(to right, #5524B3, #A082D9); color: white">
              <ul class="nav nav-stacked">
                <li>
                  <h5 style="font-family:Open Sans; font-weight:lighter;">Total Pekerjaan<span class="pull-right"><?php echo $a['jumproyek']; ?></span></h5></li>
                </ul>
              </div>
              <div class="box-footer"  style="background: linear-gradient(to right, #5524B3, #A082D9); color: white">
                <ul class="nav nav-stacked">
                  <li>
                    <h5 style="font-family:Open Sans; font-weight:lighter;">Pekerjaan Sedang Dikerjakan<span class="pull-right"><?php echo $f['countkerja']; ?></span></h5></li>
                  </ul>
                </div>
                <div class="box-footer" style="background: linear-gradient(to right, #5524B3, #A082D9); color: white">
                  <ul class="nav nav-stacked">
                    <li>
                      <h5 style="font-family:Open Sans; font-weight:lighter;">Pekerjaan Selesai<span class="pull-right"><?php echo $h['countselesai']; ?></span></h5></li>
                    </ul>
                  </div>
                  <div class="box-footer" style="background: linear-gradient(to right, #5524B3, #A082D9); color: white">
                    <ul class="nav nav-stacked">
                      <li>
                        <h5 style="font-family:Open Sans; font-weight:lighter;">Pekerjaan Belum Mulai<span class="pull-right"><?php echo $g['countkerja']; ?></span></h5></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-8 col-xs-12">
                <div class="box box-solid2">
                  <div class="box-body">
                    <div class="embed-responsive embed-responsive-16by9">
                      <div id="columnchart_material" class="embed-responsive-item" style="width: 100%;"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="col-md-4">

                <div class="col-md-12">
                  <div class="info-box">
                    <span class="info-box-icon" style="background: white";><img src="<?php echo base_url().'images/iconpagu.png';?>" class="img-responsive" style="padding: 20px;"></span>

                    <div class="info-box-content">
                      <br>
                      <span class="info-box-number" style="color: #04A9F5"><?php echo "Rp ".number_format($b['sumpagu']); ?></span>
                      <span class="info-box-text">Total Pagu</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>

                <div class="col-md-12">
                  <div class="info-box">
                    <span class="info-box-icon" style="background: white";><img src="<?php echo base_url().'images/iconuangkeluar.png';?>" class="img-responsive" style="padding: 20px;"></span>

                    <div class="info-box-content">
                      <br>
                      <?php
                      $xsum=0; 
                      foreach($sumreal->result_array() as $i) :
                        $xsum+=$i['pb_ds_kontrak'];
                        ?>
                      <?php endforeach;?>

                      <span class="info-box-number" style="color: #FF4D4D"><?php echo "Rp ".number_format($xsum); ?></span>
                      <span class="info-box-text">Total Realisasi</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>

                <div class="col-md-12">
                  <div class="info-box">
                    <span class="info-box-icon" style="background: white";><img src="<?php echo base_url().'images/iconsisa.png';?>" class="img-responsive" style="padding: 20px;"></span>

                    <div class="info-box-content">
                      <br>
                      <span class="info-box-number" style="color: #1DE9B6"><?php echo "Rp ".number_format($b['sumpagu']-($xsum)); ?></span>
                      <span class="info-box-text">Total Sisa Anggaran</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>

              </div>
              <div class="col-md-8" style="font-family:Open Sans; font-weight:lighter;">
                <div class="box box-widget widget-user-2">
                  <div class="box-header bg-white">
                    <h3 class="box-title">Progress Pekerjaan</h3>
                  </div>
                  <div class="box-body">
                    <div class="table-responsive">
                      <table id="example1" class="table table-striped" style="font-size:13px; font-family:Open Sans; font-weight:lighter;">
                        <thead>
                          <tr>
                            <th>PEKERJAAN</th>
                            <th>TAHUN</th>
                            <th>PAGU</th>
                            <th>UPDATE</th>
                            <th>PROGRESS</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          foreach ($data->result_array() as $i) :
                            if($i>0){

                              $up1=date('d-m-Y h:i:s', strtotime($i['last_update']));
                              $up2=date('d-m-Y h:i:s', strtotime($i['pb_last_update']));
                              $tanggal1 = new DateTime($i['proyek_awal_kontrak']);
                              if($up1 > $up2)
                              {
                                $tanggal2 = new DateTime($up1);
                              }
                              else{
                                $tanggal2 = new DateTime($up2);
                              }



                              $perbedaan = $tanggal2->diff($tanggal1)->format("%a");


                              ?>
                              <tr>
                                <td>
                                  <a href="<?php echo base_url().'padmin/detail_proyek/'.$i['proyek_id'];?>"><?php echo $i['proyek_nama']; ?></a>
                                </td>
                                <td><?php echo $i['proyek_tahun']; ?></td>
                                <td><?php echo "Rp. ".number_format($i['proyek_pagu']); ?></td>
                              </td>
                              <td <?php if($perbedaan>6 && $perbedaan<14){  echo 'class=bg-red'; } else if($perbedaan>13){ echo "style=background:#FFFF00;"; } else {} ?>><?php

                              if($up1 > $up2)
                              {
                                echo $up1;
                              }
                              else{
                                echo $up2;
                              }

                              ?></td>
                              <td>
                                <?php

                                $cc=$this->m_padmin->get_detail_by_proyekid($i['proyek_id']);

                                if($cc['pb_real']==100 && $cc['pb_devisi']==0){
                                  echo "<label class='label bg-green'>".$cc['pb_real']."% (Selesai)</label>";
                                }
                                else if($cc['pb_real']==0){
                                  echo "<label class='label text-gray'>Belum Mulai</label>";
                                }
                                else {
                                  if($cc['pb_target']==0 || $cc['pb_target']<=70){

                                    if($cc['pb_devisi']>0){
                                      echo "<label class='label text-blue'>".$cc['pb_real']."% (Baik)</label>";
                                    }
                                    else {
                                      if($cc['pb_devisi']==0 || $cc['pb_devisi']>=(-7)){
                                        echo "<label class='label text-green'>".$cc['pb_real']."% (Wajar)</label>";
                                      }
                                      else if ($cc['pb_devisi']<(-7) && $cc['pb_devisi']>=(-10)){

                                        echo "<label class='label text-yellow'>".$cc['pb_real']."% (Terlambat)</label>";
                                      }
                                      else {
                                        echo "<label class='label text-red'>".$cc['pb_real']."% (Kritis)</label>";
                                      }

                                    }
                                  }
                                  else if ($cc['pb_target']>70 && $cc['pb_target']<=100){

                                    if($cc['pb_devisi']>0){
                                      echo "<label class='label text-blue'>".$cc['pb_real']."% (Baik)</label>";
                                    }
                                    else {
                                      if($cc['pb_devisi']==0 || $cc['pb_devisi']>=(-4)){
                                        echo "<label class='label text-green'>".$cc['pb_real']."% (Wajar)</label>";
                                      }
                                      else if ($cc['pb_devisi']<(-4) && $cc['pb_devisi']>=(-5)){

                                        echo "<label class='label text-yellow'>".$cc['pb_real']."% (Terlambat)</label>";
                                      }
                                      else {

                                        echo "<label class='label text-red'>".$cc['pb_real']."% (Kritis)</label>";
                                      }
                                    }
                                  }
                                  else {
                                    echo "";
                                  }
                                }
                                ?></td>
                              </tr>
                            <?php } else {?>

                            <?php } endforeach; ?>
                          </tbody>
                        </table>

                      </div>
                    </div>
                    <div class="box-footer no-padding">
                    </div>
                  </div>
                </div>

              </div>
            </div>

            <div class="row">    
              <div class="col-md-12">
              </div>
            </div>



          </section>
        </div>
        <!-- Sparkline -->
        <script src="<?php echo base_url().'assets/plugins/sparkline/jquery.sparkline.min.js'?>"></script>
        <!-- jvectormap -->
        <script src="<?php echo base_url().'assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'?>"></script>
        <script src="<?php echo base_url().'assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'?>"></script>
        <script src="<?php echo base_url()?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url()?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>


        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
          google.charts.load('current', {packages: ['corechart', 'bar']});
          google.charts.setOnLoadCallback(drawChart);
          $(window).on("throttledresize", function (event) {
            drawChart();
          });

          function drawChart() {
            var data = google.visualization.arrayToDataTable([
              ['Month', 'Rencana Kontrak', 'Awal Kontrak'],
              <?php 
              $max=0;
              foreach ($countjum->result_array() as $i) :
                if ($i['proyek_bulan']!=null){
                  ?>
                  ['<?php echo $i['proyek_bulan']; ?>', <?php echo $i['countsech']; ?>, <?php echo $i['countawal']; ?>],
                <?php }
                if($i['countsech']>$i['countawal']){
                  $max=$i['countsech'];
                }else {
                  $max=$i['countawal'];
                }
              endforeach; 
              ?>

              ]);

            var options = {
              colors: ['#1DC4E9', '#9265E6'],
              width: 600,
              legend: { position: 'top', maxLines: 3 },
              chart: {
                title: 'Kontrak'
              },
              vAxis: {
                viewWindow: {
                  max: <?php if($max<=5) {echo "5";} else { echo $max;} ?>,
                  min: 0,
                },
                gridlines: {
                  count: 1,
                },
              },
              pointSize: 4,
            };

            var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

            chart.draw(data, google.charts.Bar.convertOptions(options));
          }


        </script>