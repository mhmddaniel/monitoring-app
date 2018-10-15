<link href='https://fonts.googleapis.com/css?family=Roboto+Mono:400,300' rel='stylesheet' type='text/css'>

<div class="content-wrapper">
  <section class="content-header">
    <h1>
      <small> </small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="<?php echo base_url()?>proyek">Pekerjaan</a></li>
      <li class="active">Catatan</li>
    </ol>
  </section>

  <section class="content">

    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Catatan</h3>
      </div>
      <div class="box-body">
        <div class="table-responsive">
          <table id="example1" class="table table-hovered">
           <tr>
            <th>No</th>
            <th>Catatan</th>
            <th>Tanggal</th>
          </tr>
          <?php
          $no=0;
          foreach ($data->result_array() as $i) :
            $no++;
            ?>
            <tr>
            <td class="col-md-1"><?php echo $no; ?></td>
            <td class="col-md-8"><?php echo $i['catatan_isi']; ?></td>
            <td class="col-md-3"><?php echo date('d-m-Y H:i:s',strtotime($i['catatan_tanggal'])); ?></td>
            </tr>
          <?php endforeach; ?>  
        </table>
      </div>
    </div>
  </div>

</section>
</div>



