<
<link href='https://fonts.googleapis.com/css?family=Roboto+Mono:400,300' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="<?php echo base_url()?>assets/gallery/css/style.css">


<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <small> </small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="<?php echo base_url()?>proyek">Pekerjaan</a></li>
      <li class="active">Gallery</li>
    </ol>
  </section>

  <section class="content">

    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Gallery</h3>
      </div>
      <div class="box-body">
       <div class="m-p-g">
        <div class="m-p-g__thumbs" data-google-image-layout data-max-height="350">
         <?php
         foreach ($data->result_array() as $i) :
          ?>
          <img src="<?php echo base_url().'assets/images/'.$i['file_data'];?>" data-full="<?php echo base_url().'assets/images/'.$i['file_data'];?>" class="m-p-g__thumbs-img" />
        <?php endforeach; ?>  
      </div>

      <div class="m-p-g__fullscreen"></div>
    </div>
  </div>
  <!-- /.box-body -->
  <div class="box-footer">
    Footer
  </div>
  <!-- /.box-footer-->
</div>
<!-- /.box -->

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->




<script>
  var elem = document.querySelector('.m-p-g');

  document.addEventListener('DOMContentLoaded', function() {
    var gallery = new MaterialPhotoGallery(elem);
  });
</script>
<script src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/45226/material-photo-gallery.min.js'></script>



