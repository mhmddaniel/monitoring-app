
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/plugins/toast/jquery.toast.min.css'?>"/>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      user List
      <small></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url()?>padmin"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="<?php echo base_url()?>padmin/user">user</a></li>
      <li class="active">List</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">

        <div class="box">
          <div class="box-header">
            <a class="btn btn-success btn-flat " href="<?php echo base_url().'padmin/tambah_user'?>"><span class="fa fa-plus"></span> Tambah user</a>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-striped" style="font-size:13px;">
              <thead>
                <tr>
                 <th>USERNAME</th>
                 <th>EMAIL</th>
                 <th>TELEPON</th>
                 <th>Bagian</th>
                 <th>LEVEL</th>
                 <th style="text-align:right;">Aksi</th>
               </tr>
             </thead>
             <tbody>
              <?php
              $no=0;
              foreach ($data->result_array() as $i) :
                $no++;
                $user_id=$i['user_id'];
                $user_username=$i['user_username'];
                $user_password=$i['user_password'];
                $user_email=$i['user_email'];
                $user_tel=$i['user_telp'];
                $user_bagian=$i['user_bagian'];
                $user_level=$i['user_level'];
                ?>
                <tr>
                  <td><?php echo $user_username;?></td>
                  <td><?php echo $user_email;?></td>
                  <td><?php echo $user_tel;?></td>
                  <td>
                    <?php 
                    if($user_bagian=='sda'){ 
                      echo "Sumber Daya Air";
                    }
                    else if($user_bagian=='bm'){
                      echo "Bina Marga";
                    }
                    else if($user_bagian=='ciptakarya'){
                      echo "Cipta Karya";
                    }
                    else if($user_bagian=='pr'){
                      echo "Perumahan Rakyat";
                    }
                    else if($user_bagian=='sekretariat') {
                      echo "Sekretariat";
                    }
                    else if($user_bagian=='ttdp') {
                      echo "Tata Ruang dan Pertanahan";
                    }
                    else if($user_bagian=='ubp') {
                      echo "UPTD Balai Pengujian";
                    }
                    else if($user_bagian=='ubpdp'){
                      echo "UPTD Balai Peralatan dan Perbekalan";
                    }
                    else if ($user_bagian=='bkdp'){
                      echo "Bina Kontruksi dan Pengendalian";
                    }
                    else {
                      echo "-";
                    }
                    ?>

                  </td>
                  <td><?php echo $user_level;?></td>
                  <td style="text-align:right;">
                    <a class="btn" href="<?php echo base_url().'padmin/get_edit_user/'.$user_id;?>"><span class="fa fa-pencil"></span></a>
                    <a class="btn" data-toggle="modal" data-target="#ModalHapus<?php echo $user_id;?>"><span class="fa fa-trash"></span></a>
                  </td>
                </tr>
              <?php endforeach;?>
            </tbody>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->



<?php foreach ($data->result_array() as $i) :
  $user_id=$i['user_id'];
  $user_username=$i['user_username'];
  ?>
  <!--Modal Hapus Pengguna-->
  <div class="modal fade" id="ModalHapus<?php echo $user_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
          <h4 class="modal-title" id="myModalLabel">Hapus User</h4>
        </div>
        <form class="form-horizontal" action="<?php echo base_url().'padmin/delete_user'?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">       
            <input type="hidden" name="kode" value="<?php echo $user_id;?>"/> 
            <p>Apakah Anda yakin mau menghapus user <b><?php echo $user_username;?></b> ?</p>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary btn-flat" id="simpan">Hapus</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach;?>




<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url().'assets/plugins/jQuery/jquery-2.2.3.min.js'?>"></script>

<script type="text/javascript" src="<?php echo base_url().'assets/plugins/toast/jquery.toast.min.js'?>"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
<?php if($this->session->flashdata('msg')=='error'):?>
  <script type="text/javascript">
    $.toast({
      heading: 'Error',
      text: "Password dan Ulangi Password yang Anda masukan tidak sama.",
      showHideTransition: 'slide',
      icon: 'error',
      hideAfter: false,
      position: 'bottom-right',
      bgColor: '#FF4859'
    });
  </script>

  <?php elseif($this->session->flashdata('msg')=='success'):?>
    <script type="text/javascript">
      $.toast({
        heading: 'Success',
        text: "User Berhasil disimpan ke database.",
        showHideTransition: 'slide',
        icon: 'success',
        hideAfter: false,
        position: 'bottom-right',
        bgColor: '#7EC857'
      });
    </script>
    <?php elseif($this->session->flashdata('msg')=='info'):?>
      <script type="text/javascript">
        $.toast({
          heading: 'Info',
          text: "User berhasil di update",
          showHideTransition: 'slide',
          icon: 'info',
          hideAfter: false,
          position: 'bottom-right',
          bgColor: '#00C9E6'
        });
      </script>
      <?php elseif($this->session->flashdata('msg')=='success-hapus'):?>
        <script type="text/javascript">
          $.toast({
            heading: 'Success',
            text: "User Berhasil dihapus.",
            showHideTransition: 'slide',
            icon: 'success',
            hideAfter: false,
            position: 'bottom-right',
            bgColor: '#7EC857'
          });
        </script>
        <?php else:?>

        <?php endif;?>
