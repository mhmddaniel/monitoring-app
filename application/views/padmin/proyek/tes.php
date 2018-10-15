<?php
 header("Content-type: application/vnd-ms-excel");
 header("Content-Disposition: attachment; filename=tes.xls");
 header("Pragma: no-cache");
 header("Expires: 0");
 ?>
<style type="text/css">
table {
	text-align: center;
	vertical-align: middle;
}
</style>

<table border="1px solid">
	<tbody>
		<tr style="">
			<td rowspan="3">No</td>
			<td rowspan="3">Uraian Kegiatan</td>
			<td rowspan="3">Total Dana Dalam DPA</td>
			<td rowspan="3">PPTK</td>
			<td colspan="5">Perkembangan Pelaksanaan</td>
			<td rowspan="3">Sisa Anggaran (Rp.)</td>
		</tr>
		<tr>
			<td colspan="3">Realisasi Fisik</td>
			<td colspan="2">Daya Serap Keuangan</td>
		</tr>
		<tr>
			<td>Target %</td>
			<td>Real %</td>
			<td>Deviasi %</td>
			<td>(Rp.)</td>
			<td>( % )</td>
		</tr>
		<tr>
			<td></td>
			<td>2</td>
			<td>3</td>
			<td>4</td>
			<td>5</td>
			<td>6</td>
			<td>7 = 6 - 5</td>
			<td>8</td>
			<td>9 = 8:3</td>
			<td>10 = 3 - 8 </td>
		</tr>
		<?php 
		$no=0;
		foreach ($data->result_array() as $i) : 
			$no++;
			?>
			<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $i['ph_judul']; ?></td>
				<td>
					<?php
					$kdph=$i['ph_id'];
					$sumpag=$this->m_padmin->sumpagu($kdph);
					$sumanggaran=$this->m_padmin->sumanggaran($kdph);
					$csumpag=$sumpag->row_array();
					echo "Rp ".number_format($csumpag['sumpagu']+$sumanggaran['angpagu'])."<br>";
					?>
				</td>
				<td><?php echo $i['user_nama']; ?></td>
				<td>0</td>
				<td>0</td>
				<td>0</td>
				<td><?php 
				$greal=$this->m_padmin->sum_realisasi_by_ph($kdph);
				$xsum=0; 
				foreach($greal->result_array() as $i) :
					$xsum+=$i['pb_ds_kontrak'];
				endforeach;
				echo "Rp ".number_format($xsum);

				?></td>
				<td>0</td>
				<td><?php echo "Rp ".number_format($csumpag['sumpagu']-($xsum)); ?></td>
			</tr>
		<?php endforeach; ?>

	</tbody>
</table>


<?php





 /*
<html>
<head>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

	<script type="text/javascript">

		google.charts.load("current", {packages:['corechart']});
		google.charts.setOnLoadCallback(drawChart);
		function drawChart() {

			var data = google.visualization.arrayToDataTable([
				['Daily', 'Sales'],
				['Mon', 4],
				['Tue', 6],
				['Wed', 6],
				['Thu', 5],
				['Fri', 3],
				['Sat', 7],
				['Sun', 7]
				]);

			var options = {
				title: "Density of Precious Metals, in g/cm^3",
				bar: {groupWidth: '95%'},
				legend: 'none',
			};

			var chart_div = document.getElementById('chart_div');
			var chart = new google.visualization.ColumnChart(chart_div);

			google.visualization.events.addListener(chart, 'ready', function () {
				chart_div.innerHTML = '<img src="' + chart.getImageURI() + '">';
				console.log(chart_div.innerHTML);
				document.getElementById('png').outerHTML = '<a href="' + chart.getImageURI() + '" download>Print</a>';

			});

			chart.draw(data, options);
		}

	</script>

	<div id='chart_div'></div>
	<div id='png'></div>





	

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


    var columnchart_material = document.getElementById('columnchart_material');
    var chart = new google.charts.Bar(columnchart_material);
    var btnSave = document.getElementById('save_columnchart_material');

    google.visualization.events.addListener(chart, 'ready', function () {
      btnSave.disabled = false;
    });
    btnSave.addEventListener('click', function () {
      var doc = new jsPDF();
      doc.addImage(chart.getImageURI(), 0, 0);
      doc.save('chart.pdf');
    }, false);

    chart.draw(data, google.charts.Bar.convertOptions(options));
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
    var btnSave = document.getElementById('save_serapan');

    google.visualization.events.addListener(chart, 'ready', function () {
      btnSave.disabled = false;
    });
    btnSave.addEventListener('click', function () {
      var doc = new jsPDF();
      doc.addImage(chart.getImageURI(), 0, 0);
      doc.save('chart.pdf');
    }, false);

    chart.draw(dataTable, options);
  }
</script>













 




<?php 


<tbody>
 		<?php foreach ($data->result_array() as $i) : ?>

 			<tr>

 				<td class="bg-red"><?php echo $i['ph_judul']; ?></td>
 				<td><?php echo $i['pb_ds_kontrak']; ?></td>

 			</tr>

 		<?php endforeach; ?>

 	</tbody>
 header("Content-type: application/vnd-ms-excel");
 header("Content-Disposition: attachment; filename=tes.xls");
 header("Pragma: no-cache");
 header("Expires: 0");

 
 <table border="1" width="100%">
 	<thead>
 		<tr>
 			<th class="bg-red">Tanggal</th>
 			<th>Kontrak</th>
 		</tr>
 	</thead>

 	<tbody>
 		<?php foreach ($charttdk->result_array() as $i) : ?>

 			<tr>

 				<td class="bg-red"><?php echo $i['tanggal']; ?></td>
 				<td><?php echo $i['pb_ds_kontrak']; ?></td>

 			</tr>

 		<?php endforeach; ?>

 	</tbody>

 </table>


	
<form name='autoSumForm'  action="<?php echo base_url()?>padmin/upfile" method="POST" enctype="multipart/form-data" >
	<div class="form-group col-md-6">
		<label>LAMPIRAN</label>
		<input type="file"  name="fileat" class="form-control btn-success">
	</div>


	<div class="form-group pull-right">
		<button type="submit" class="btn btn-primary btn-flat pull-right"><span class="fa fa-pencil"></span> Publish</button>
	</div>
</form>


<div id="buttons" class="buttons"></div>
<hr/>
<div id="JSFiddle">
	<div id="chart_div" style="width: 1100px; height: 500px;"></div>
</div>
<script type="text/javascript" src="https://www.google.com/jsapi?autoload={%27modules%27:[{%27name%27:%27visualization%27,%27version%27:%271.1%27,%27packages%27:[%27corechart%27]}]}"></script>
<script type="text/javascript" src="http://www.cloudformatter.com/Resources/Pages/CSS2Pdf/Script/xepOnline.jqPlugin.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>


<script type="text/javascript">
	
	google.setOnLoadCallback(drawChart);
	function AddNamespace(){
		var svg = jQuery('#chart_div svg');
		svg.attr("xmlns", "http://www.w3.org/2000/svg");
		svg.css('overflow','visible');
	}
	function drawChart() {
		var data = google.visualization.arrayToDataTable([
			['Tanggal', 'Daya Serap'],
			<?php foreach ($charttdk->result_array() as $i) : ?>
				['<?php echo $i['tanggal']; ?>',  <?php echo $i['pb_ds_kontrak']; ?>],
			<?php endforeach; ?>
			]);

		var options = {
			title: 'My Daily Activities',
		};

		var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
		google.visualization.events.addListener(chart, 'ready', AddNamespace);
		chart.draw(data, options);
	}


	var click="return xepOnline.Formatter.Format('JSFiddle', {render:'download', srctype:'svg'})";
	jQuery('#buttons').append('<button onclick="'+ click +'">PDF</button>');
	click="return xepOnline.Formatter.Format('JSFiddle', {render:'newwin', mimeType:'image/png', resolution:'120', srctype:'svg'})";
	jQuery('#buttons').append('<button onclick="'+ click +'">PNG @120dpi</button>');
	click="return xepOnline.Formatter.Format('JSFiddle', {render:'newwin', mimeType:'image/jpg', resolution:'300', srctype:'svg'})";
	jQuery('#buttons').append('<button onclick="'+ click +'">JPG @300dpi</button>');

</script>
*/ ?>


