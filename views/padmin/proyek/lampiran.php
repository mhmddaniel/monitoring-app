<link href='https://fonts.googleapis.com/css?family=Roboto+Mono:400,300' rel='stylesheet' type='text/css'>

<div class="content-wrapper">
  <section class="content-header">
    <h1>
      <small> </small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="<?php echo base_url()?>proyek">Pekerjaan</a></li>
      <li class="active">Lampiran</li>
    </ol>
  </section>

  <section class="content">

    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Lampiran</h3>
      </div>
      <div class="box-body">
        <div class="table-responsive">
          <table class="table table-hovered">
           <tr>
            <th>No</th>
            <th>File</th>
            <th>Aksi</th>
          </tr>
          <?php
          $no=0;
          foreach ($data->result_array() as $i) :
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
          <?php endforeach; ?>  
        </table>
      </div>
    </div>
  </div>

</section>
</div>



