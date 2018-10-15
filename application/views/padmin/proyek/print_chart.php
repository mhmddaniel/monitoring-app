<?php $link=$this->uri->segment(3);?>
<div class="content-wrapper">

  <section class="content">
   <div class="row">
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-solid">
            <div class="box-body no-padding">
              <br>
              <?php if($link=='serapan'){?>
                <div class="row">
                  <div class="col-md-12">
                    <span class="pull-right" style="margin-right: 20px">
                      <div id="save_serapan" ></div>
                    </span>
                    <div id="serapan" style="height: 500px"></div>
                  </div>
                </div>
              <?php } else if ($link=='rak'){?>
                <div class="row">
                  <div class="col-md-12">
                    <span class="pull-right" style="margin-right: 20px">
                      <div id="save_rak" ></div>
                    </span>
                    <div class="embed-responsive embed-responsive-16by9">
                      <div id="rak" class="embed-responsive-item" style="width: 100%;"></div>
                    </div>
                  </div>
                </div>
              <?php } else if ($link=='dataawal') {  ?>
                <div class="row">
                  <div class="col-md-12">
                    <span class="pull-right" style="margin-right: 20px">
                      <div id="save_data_awal" ></div>
                    </span>
                    <div id="data_awal" style="height: 500px"></div>
                  </div>
                </div>
              <?php } else if ($link=='curve') { ?>
                <div class="row">
                  <div class="col-md-12">
                    <span class="pull-right" style="margin-right: 20px">
                      <div id="save_curve_chart" ></div>
                    </span>
                    <div id="curve_chart" style="height: 500px"></div>
                  </div>
                </div>
              <?php } else if ($link=='realtarget') {  ?>
                <div class="row">
                  <div class="col-md-12">
                    <span class="pull-right" style="margin-right: 20px">
                      <div id="save_realtarget" ></div>
                    </span>
                    <div id="realtarget" style="height: 500px"></div>
                  </div>
                </div>
              <?php } else { ?>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</div>





<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
  google.charts.load("current", {packages:['corechart']});
  google.charts.setOnLoadCallback(drawChart);
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
      bar: {groupWidth: '95%'},
      legend: { position: 'top', maxLines: 3 },
      chart: {
        title: 'Kontrak'
      },
      vAxis: {
        viewWindow: {
          max: <?php if($max<=5) {echo "5";} else { echo $max;} ?>,
          min: 0,
        },
      },
      pointSize: 4,
    };


    var rak = document.getElementById('rak');
    var chart = new google.visualization.ColumnChart(rak);

    google.visualization.events.addListener(chart, 'ready', function () {
      rak.innerHTML = '<img src="' + chart.getImageURI() + '">';
      console.log(rak.innerHTML);
      document.getElementById('save_rak').outerHTML = '<a href="' + chart.getImageURI() + '" class="btn btn-primary" download="Rencana Awal Kontrak">Download</a>';

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
    dataTable.addColumn('number', 'Target');
    dataTable.addColumn({type: 'string', role: 'tooltip'});
    dataTable.addColumn('number', 'Fisik');
    dataTable.addColumn({type: 'string', role: 'tooltip'});
    dataTable.addRows([

      ['',  0,  '0',  0,'0'],
      <?php $m=0; foreach ($serapan->result_array() as $i) : $m++; ?>
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
      serapan.innerHTML = '<img src="' + chart.getImageURI() + '">';
      console.log(serapan.innerHTML);
      document.getElementById('save_serapan').outerHTML = '<a href="' + chart.getImageURI() + '" class="btn btn-primary" download="Serapan Target">Download</a>';

    });

    chart.draw(dataTable, options);


  }
</script>



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
      realtarget.innerHTML = '<img src="' + chart.getImageURI() + '">';
      console.log(realtarget.innerHTML);
      document.getElementById('save_realtarget').outerHTML = '<a href="' + chart.getImageURI() + '" class="btn btn-primary" download="Kurva S">Download</a>';

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
      curve_chart.innerHTML = '<img src="' + chart.getImageURI() + '">';
      console.log(curve_chart.innerHTML);
      document.getElementById('save_curve_chart').outerHTML = '<a href="' + chart.getImageURI() + '" class="btn btn-primary" download="Keuangan">Download</a>';

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
      data_awal.innerHTML = '<img src="' + chart.getImageURI() + '">';
      console.log(data_awal.innerHTML);
      document.getElementById('save_data_awal').outerHTML = '<a href="' + chart.getImageURI() + '" class="btn btn-primary" download="Kurva S Rencana">Download</a>';

    });
    chart.draw(dataTable, options);

  }
</script>