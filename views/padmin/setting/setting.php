<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/plugins/toast/jquery.toast.min.css'?>"/>
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
    
    <section class="content">
      <div class="row">  
        <div class="col-md-6">
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">PK Header Logo</h3>
            </div>
            
            <div class="box-body">
              <?php $cc=$gsite->row_array(); ?>
              <form action="<?php echo base_url().'padmin/update_pkhlogo'?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <span class="mailbox-attachment-icon has-img"><img src="<?php echo base_url().'assets/images/'.$cc['site_hlogo'];?>" alt="Attachment"></span>
                  <div class="input-group">
                    <input type="hidden" name="siteid" class="form-control" value="<?php echo $cc['site_id'];?>">
                    <input type="file" class="form-control" name="filefoto" required>
                    <span class="input-group-btn">
                      <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-check"></i> Change</button>
                    </span>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>  
        
        <div class="col-md-6">
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">PK Icon</h3>
            </div>
            <div class="box-body">
              <form action="<?php echo base_url().'padmin/update_pkicon'?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <span class="mailbox-attachment-icon has-img">
                    <img src="<?php echo base_url().'assets/images/'.$cc['site_icon'];?>" alt="Header Logo">
                  </span>
                  <div class="input-group">
                    <input type="hidden" name="siteid" class="form-control" value="<?php echo $cc['site_id'];?>">
                    <input type="file" class="form-control" name="filefoto" required>
                    <span class="input-group-btn">
                      <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-check"></i> Change</button>
                    </span>
                  </div>
                </div>
              </form>
            </div>
          </div>
      </div>
      
      <div class="col-md-6">
        <div class="box box-warning">
          <div class="box-header with-border">
            <h3 class="box-title">PK Contact</h3>
          </div>
          <div class="box-body">
            <?php $bb=$gcont->row_array(); ?>
            <form action="<?php echo base_url().'padmin/update_contactus'?>" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label>Website</label>
                <input type="hidden" class="form-control" name="contid" value="<?php echo $bb['contactus_id'];?>">
                <input type="text" class="form-control" name="web" value="<?php echo $bb['contactus_web'];?>">
              </div>
              <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="email" value="<?php echo $bb['contactus_email'];?>">
              </div>
              <div class="form-group">
                <label>Telpon</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-phone"></i>
                  </div>
                  <input type="text" name="telp" value="<?php echo $bb['contactus_tel'];?>" class="form-control" data-inputmask="'mask': ['9999-9999-9999', '+62 999 9999 9999']" data-mask>
                </div>
              </div>
              <div class="form-group">
                <label>Alamat</label>
                <textarea class="form-control" name="alamat" ><?php echo $bb['contactus_alamat'];?></textarea>
              </div>
              <div class="form-group">
                <label>Facebook</label>
                <input type="text" class="form-control" name="fb" value="<?php echo $bb['contactus_fb'];?>">
              </div>
              <div class="form-group">
                <label>Twitter</label>
                <input type="text" class="form-control" name="tw" value="<?php echo $bb['contactus_tw'];?>">
              </div>
              <div class="form-group">
                <label>G+</label>
                <input type="text" class="form-control" name="gpls" value="<?php echo $bb['contactus_gplus'];?>">
              </div>
              <button type="submit" class="btn btn-primary btn-flat pull-right"><span class="fa fa-pencil"></span> Update</button>
            </form>
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="box box-danger">
          <div class="box-header with-border">
            <h3 class="box-title">PK Site</h3>
          </div>
          <div class="box-body">
            <form action="<?php echo base_url().'padmin/update_site'?>" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label>Title</label>
                <input type="hidden" name="siteid" class="form-control" value="<?php echo $cc['site_id'];?>">
                <input type="text" name="title" class="form-control" value="<?php echo $cc['site_tittle'];?>">
              </div>
              <div class="form-group">
                <label>Deskripsi</label>
                <textarea class="form-control" name="deskripsi"><?php echo $cc['site_deskripsi'];?></textarea>
              </div>
              <button type="submit" class="btn btn-primary btn-flat pull-right"><span class="fa fa-pencil"></span> Update</button>
            </form>
          </div>
        </div>
      </div>
    </section>
  </div>

 
<!-- Sparkline -->
<script src="<?php echo base_url().'assets/plugins/sparkline/jquery.sparkline.min.js'?>"></script>
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
    <?php elseif($this->session->flashdata('msg')=='info'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Info',
                    text: "Settingan anda berhasil di update",
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
                    text: "Settingan anda gagal di update.",
                    showHideTransition: 'slide',
                    icon: 'success',
                    hideAfter: false,
                    position: 'bottom-right',
                    bgColor: '#7EC857'
                });
        </script>
    <?php else:?>

    <?php endif;?>
