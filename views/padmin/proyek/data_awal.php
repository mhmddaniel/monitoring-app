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
<form   action="<?php echo base_url()?>padmin/save_data_awal" method="POST" enctype="multipart/form-data" >
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Pekerjaan
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url()?>padmin"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url()?>padmin/proyek">Pekerjaan</a></li>
        <li class="active">Data Awal</li>
      </ol>
    </section>
    <section class="content">

      <div class="row">
        <div class="col-md-4">
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Data Awal </h3>
            </div>
            <div class="box-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <div class="row">
                      <input type="hidden" name="proyek_id" value="<?php echo $this->uri->segment(3); ?>">

                      <div class="text-center col-md-6">
                        Tanggal
                      </div>
                      <div class=" col-md-6 text-center">
                        Progres
                      </div>
                      <div class=" col-md-6">
                        <input type="date" id="tanggal" class="form-control col-md-6">
                      </div>
                      <div class=" col-md-6">
                        <input type="number" id="progres" class="form-control col-md-6">
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-md-12">
                        <input type="button" value="Tambah" class="add-row btn btn-primary col-md-12">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <table id="tt" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Select</th>
                        <th>Tanggal</th>
                        <th>Progres</th>
                      </tr>
                    </thead>
                    <tbody id="te">
                    </tbody>
                  </table>
                  <button type="button" class="delete-row">Delete Row</button>
                  <input type="submit" name="submit" class="btn btn-primary pull-right">
                </div>
              </div>
            </div>
          </div>


        </div>

        <div class="col-md-8">
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Data Awal </h3>
            </div>
            <div class="box-body">
              <div class="row">
                <div class="col-md-12">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Progres</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach($data->result_array() as $i) : ?>
                        <tr>
                          <td><?php echo $i['da_progres']; ?></td>
                          <td><?php echo date('d-m-Y',strtotime($i['da_tanggal'])); ?></td>
                          <td> <a data-toggle="modal" data-target="#ModalHapus<?php echo $i['da_id'];?>" class="btn btn-box-tool"><i class="fa fa-times text-danger"></i></a></td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>


      </div>

      <div class="row">
        <div class="col-md-8 pull-right">
          <div class="box box-primary">
            <div class="box-body box-profile">
             <div id="curve_chart" style="height: 500px"></div>
           </div>
         </div>
       </div>

     </div>


   </section>
 </div>

</form>



<?php foreach ($data->result_array() as $i) :
  $da_id=$i['da_id'];
  ?>
  <div class="modal fade" id="ModalHapus<?php echo $da_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm"  role="document">
      <div class="modal-content" >

        <form class="form-horizontal" action="<?php echo base_url().'padmin/delete_da'?>" method="post" enctype="multipart/form-data">
          <div class="modal-body container-fluid text-center" >
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
            <div class="col-md-12">
              <input type="hidden" name="kode" value="<?php echo $da_id;?>"/>
            </div>
            <div class="col-md-12">

              <div class="iconcolor">
                <i class="fa fa-warning" style="font-size:200px;"></i>
              </div>
            </div>
            <div class="col-md-12">
              <br>
              Apakah Anda yakin ingin menghapus data ini ?
            </div>
            <div class="col-md-6 col-md-offset-3"><br>
              <button type="submit" class="btn btn-danger btn-round col-md-12" id="simpan">Hapus</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach;?>


<script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/bower_components/ckeditor/ckeditor.js"></script>
<script src="<?php echo base_url() ?>assets/map/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


<script type="text/javascript">
  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {
    var dataTable = new google.visualization.DataTable();
    dataTable.addColumn('string', 'Year');
    dataTable.addColumn('number', 'Progres');
    dataTable.addRows([
      <?php foreach($data->result_array() as $i) : ?>
        ['<?php echo date('d-m-Y',strtotime($i['da_tanggal'])); ?>',  <?php echo $i['da_progres'];?>],
      <?php endforeach;  ?>

      ]);

    var options = {
      title: 'Data Awal',
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
    var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
    chart.draw(dataTable, options);
  }
</script>

<script type="text/javascript">
  $(document).ready(function(){
    $(".add-row").click(function(){
      var tanggal = $("#tanggal").val();
      var progres = $("#progres").val();
      var markup = "<tr><td><input type='checkbox' name='record'></td><td><input type='hidden' name='tanggal[]' value='"+tanggal+"'>" + tanggal + "</td><td><input type='hidden' name='progres[]' value='"+progres+"'>" + progres + "</td></tr>";
      $("#tt #te").append(markup);
    });

    $(".delete-row").click(function(){
      $("#tt #te").find('input[name="record"]').each(function(){
        if($(this).is(":checked")){
          $(this).parents("tr").remove();
        }
      });
    });
  });    
</script>
