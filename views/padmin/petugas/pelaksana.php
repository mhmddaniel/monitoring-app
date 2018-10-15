
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/plugins/toast/jquery.toast.min.css'?>"/>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      petugas List
      <small></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">petugas</a></li>
      <li class="active">List</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">

          <div class="box">
            <div class="box-header">
              <a class="btn btn-success btn-flat " href="<?php echo base_url().'padmin/edit_dinaspu'?>"><span class="fa fa-plus"></span> Tambah petugas</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-striped" style="font-size:13px;">
                <thead>
                  <tr>
                   <th>NAMA</th>
                   <th>ALAMAT</th>
                   <th>TELEPON</th>
                   <th>DIREKTUR</th>
                   <th>TELEPON DIREKTUR</th>
                   <th>JENIS</th>
                   <th style="text-align:right;">Aksi</th>
                 </tr>
               </thead>
               <tbody>
                <?php
                $no=0;
                foreach ($data->result_array() as $i) :
                  $no++;
                  $pekerja_id=$i['pekerja_id'];
                  $pekerja_nama=$i['pekerja_nama'];
                  $pekerja_alamat=$i['pekerja_alamat'];
                  $pekerja_telp_kantor=$i['pekerja_telp_kantor'];
                  $pekerja_direktur=$i['pekerja_direktur'];
                  $pekerja_telp_direktur=$i['pekerja_telp_direktur'];
                  $pekerja_jenis=$i['pekerja_jenis'];

                  ?>
                  <tr>
                    <td><?php echo $pekerja_nama;?></td>
                    <td><?php echo $pekerja_alamat;?></td>
                    <td><?php echo $pekerja_telp_kantor;?></td>
                    <td><?php echo $pekerja_direktur;?></td>
                    <td><?php echo $pekerja_telp_direktur;?></td>
                    <td><?php echo $pekerja_jenis;?></td>
                    <td style="text-align:right;">
                      <a class="btn" href="<?php echo base_url().'padmin/get_edit_dinaspu/'.$pekerja_id;?>"><span class="fa fa-pencil"></span></a>
                      <a class="btn" data-toggle="modal" data-target="#ModalHapus<?php echo $pekerja_id;?>"><span class="fa fa-trash"></span></a>
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
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->



<?php foreach ($data->result_array() as $i) :
$pekerja_nama=$i['pekerja_nama'];
$pekerja_alamat=$i['pekerja_alamat'];
?>
<!--Modal Hapus Pengguna-->
<div class="modal fade" id="ModalHapus<?php echo $pekerja_nama;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
        <h4 class="modal-title" id="myModalLabel">Hapus Berita</h4>
      </div>
      <form class="form-horizontal" action="<?php echo base_url().'padmin/delete_petugas'?>" method="post" enctype="multipart/form-data">
        <div class="modal-body">       
          <input type="hidden" name="kode" value="<?php echo $pekerja_nama;?>"/> 
          <p>Apakah Anda yakin mau menghapus Posting <b><?php echo $pekerja_alamat;?></b> ?</p>

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
      text: "Berita Berhasil disimpan ke database.",
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
      text: "Berita berhasil di update",
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
      text: "Berita Berhasil dihapus.",
      showHideTransition: 'slide',
      icon: 'success',
      hideAfter: false,
      position: 'bottom-right',
      bgColor: '#7EC857'
    });
  </script>
<?php else:?>

<?php endif;?>
