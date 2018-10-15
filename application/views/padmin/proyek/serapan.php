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
  <section class="content-header">
    <h1>
      Pekerjaan
      <small></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url()?>padmin"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="<?php echo base_url()?>proyek">Pekerjaan</a></li>
      <li class="active">Target Serapan</li>
    </ol>
  </section>
  <section class="content">

    <div class="row">
      <div class="col-md-4">
        <div class="box box-warning">
          <div class="box-header with-border">
            <h3 class="box-title">Target Serapan </h3>
          </div>
          <div class="box-body">
            <div class="row">
              <form name='autoSumForm'  action="<?php echo base_url()?>padmin/save_serapan" method="POST" enctype="multipart/form-data" >
                <div class="col-md-12">
                  <div class="form-group">
                    <span><b>Target Tahun</b></span>
                    <input type='text' id='trap11'  class="form-control" onFocus="startCalc();"  onBlur="stopCalc();" />
                  </div>
                </div>
                <div class="col-md-12">
                  <table class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Bulan</th>
                        <th>Target</th>
                        <th>Persen (%)</th>
                        <th>Fisik (%)</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      for($i=0;$i<12;$i++) { $namaBulan = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"); ?>
                       <tr>
                        <td><?php echo $namaBulan[$i]; ?>
                        <input type="hidden" name="bulan[<?php echo $i; ?>]" value="<?php echo $namaBulan[$i]; ?>">
                      </td>
                      <td>  <input type='number' id='tserap<?php echo $i; ?>' name="tserap[<?php echo $i; ?>]" class="form-control" onFocus="startCalc();"  onBlur="stopCalc();" /></td>
                      <td><input type='text' id='persen<?php echo $i; ?>' name="persen[<?php echo $i; ?>]" class="form-control" onFocus="startCalc();"  onBlur="stopCalc();" readonly="readonly" /></td>
                      <td><input type='text' name="fisik[<?php echo $i; ?>]" class="form-control" /></td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>

              <input type="submit" name="submit" class="btn btn-primary pull-right">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-8">
    <div class="box box-warning">
      <div class="box-header with-border">
        <h3 class="box-title">Target Serapan </h3>
      </div>
      <div class="box-body">
        <div class="row">
          <div class="col-md-12">
            <table  class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Bulan</th>
                  <th>Serapan</th>
                  <th>Persen (%)</th>
                  <th>Fisik (%)</th>
                </tr>
              </thead>
              <tbody>
                <?php
                foreach ($data->result_array() as $key) :
                  ?>
                  <tr>
                    <td><?php echo $key['serapan_bulan']; ?></td>
                    <td><?php echo "Rp ".number_format($key['serapan_target']); ?></td>
                    <td><?php echo $key['serapan_persen']." %"; ?></td>
                    <td><?php echo $key['serapan_fisik']." %"; ?></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-8">
    <div class="box box-primary">
      <div class="box-body box-profile">
       <div class="row">
        <div class="col-md-12">
          <div class="pull-right" style="margin-right: 40px"><a href="<?php echo base_url()?>padmin/print_chart/serapan" class="btn btn-primary">Download</a></div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div id="serapan" style="height: 500px"></div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

<div class="row">

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


<script src="http://afarkas.github.io/webshim/js-webshim/minified/polyfiller.js"></script>
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



<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script>
  function FormatDuit(x) {
    var tmp_num;
    var negatif = false;
    if(x<0) {
      negatif = true;
      tmp_num = Math.abs(x);
    } else {
      tmp_num = x;
    }

    var num = tmp_num.toString();
    for(var i=0; i < Math.floor((num.length-(1+i))/3); i++)
      num=num.substring(0,num.length-(4*i+3)) + ',' + num.substring(num.length-(4*i+3));
    if(negatif) { num = '-'+num; }
    return(num);
  }  

  function startCalc(){
    interval = setInterval("calc()",1);}
    function calc(){
     <?php 
     for($i=0;$i<12;$i++) {  ?>
      tserap<?php echo $i; ?> = document.getElementById("tserap<?php echo $i; ?>").value;
      trap11 = document.getElementById("trap11").value;
      document.getElementById("persen<?php echo $i; ?>").value = ((tserap<?php echo $i; ?>*1) / (trap11*1))*100  ;
    <?php } ?>
  }
  function stopCalc(){
    clearInterval(interval);}

    webshims.setOptions('forms-ext', {
      replaceUI: 'auto',
      types: 'number'
    });
    webshims.polyfill('forms forms-ext');
  </script>

  <script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      var dataTable = new google.visualization.DataTable();
      dataTable.addColumn('string', 'Year');
      dataTable.addColumn('number', 'Target');
      dataTable.addColumn({type: 'string', role: 'tooltip'});
      dataTable.addColumn('number', 'Fisik');
      dataTable.addColumn({type: 'string', role: 'tooltip'});
      dataTable.addRows([
        ['',  0,  '0',  0,'0'],
        <?php $m=0; foreach ($data->result_array() as $i) : $m++; ?>
        ['<?php echo $m; ?>',  <?php echo $i['serapan_persen'];?>,  'Rp <?php echo number_format($i['serapan_target']);?>',  <?php echo $i['serapan_fisik'];?>,'<?php echo number_format($i['serapan_fisik']);?> %'],
      <?php endforeach; ?>

      ]);

      var options = {
        title: 'Serapan Target',
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

      var serapan = document.getElementById('serapan');
      var chart = new google.visualization.LineChart(serapan);

      google.visualization.events.addListener(chart, 'ready', function () {
      });

      chart.draw(dataTable, options);

    }
  </script>

