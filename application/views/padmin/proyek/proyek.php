<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/plugins/toast/jquery.toast.min.css'?>"/>

<style type="text/css">

.gmap3{
    margin: 20px auto;
    border: 1px solid #C0C0C0;
    width: 80%;
    height: 500px;
}
.cluster{
    color: #FFFFFF;
    text-align:center;
    font-family: 'Arial, Helvetica';
    font-size:11px;
    font-weight:bold;
    cursor: pointer;
}
.cluster-1{
    background-image:url(<?php echo base_url ()?>assets/gmaps/images/m1.png);
    line-height:53px;
    width: 53px;
    height: 52px;
}
.cluster-2{
    background-image:url(<?php echo base_url ()?>assets/gmaps/images/m2.png);
    line-height:53px;
    width: 56px;
    height: 55px;
}
.cluster-3{
    background-image:url(<?php echo base_url ()?>assets/gmaps/images/m3.png);
    line-height:66px;
    width: 66px;
    height: 65px;
}
#legend {
    font-family: Arial, sans-serif;
    padding: 10px;
    margin: 10px;
}
#legend h3 {
    margin-top: 0;
}
#legend img {
    vertical-align: middle;
}
</style>


<div class="content-wrapper">
    <?php $var = $data->result_array();?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            proyek List
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url()?>padmin"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo base_url() ?>padmin/proyek">proyek</a></li>
            <li class="active">List</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12 col-xs-12">

                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab">Proyek</a></li>
                    <li><a href="#tab_2" data-toggle="tab">Lokasi</a></li>
                    <li class="pull-right">
                     <?php if($_SESSION['level']=='admin'){ ?>
                        <li class="pull-right"><a class="btn btn-success btn-flat" style="background: linear-gradient(to right, #04A9F5,#1DE9B6); color: white;" href="<?php echo base_url().'padmin/tambah_proyek'?>">Tambah Proyek Baru <span class="fa fa-plus"></span> </a></li>

                    <?php } else {} ?>

                </li>


                
            </ul>

            <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
                    <div class="box-body">

                        <?php
                        $no=0;
                        foreach ($data->result_array() as $i) :
                            $no++;
                            $proyek_id=$i['proyek_id'];
                            $pb_id=$i['pb_id'];
                            $proyek_nama=$i['proyek_nama'];
                            $proyek_tahun=$i['proyek_tahun'];
                            $proyek_keuangan=$i['proyek_keuangan'];
                            $proyek_pagu=$i['proyek_pagu'];
                            $proyek_sech_awal=$i['proyek_sech_awal'];
                            $proyek_awal_kontrak=$i['proyek_awal_kontrak'];
                            $proyek_akhir_kontrak=$i['proyek_akhir_kontrak'];
                            $koordinat_nama=$i['koordinat_nama'];
                            $pb_target=$i['pb_target'];
                            $pb_real=$i['pb_real'];
                            $pb_devisi=$i['pb_devisi'];
                            $up1=date('d-m-Y h:i:s', strtotime($i['last_update']));
                            $up2=date('d-m-Y h:i:s', strtotime($i['pb_last_update']));

                            ?>

                            <div class="col-md-6">
                                <div class="box">

                                    <div class="box-body">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <img src="">
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-md-9">
                                                <div class="col-md-8">
                                                    <h4><?php echo $proyek_nama;?></h4>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="box-tools pull-right">

                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
                                                                <i class="fa fa-plus text-primary"></i></button>
                                                                <ul class="dropdown-menu" role="menu">
                                                                    <li><a href="<?php echo base_url().'padmin/detail_proyek/'.$proyek_id;?>">Lihat Detail</a></li>
                                                                    <?php
                                                                    if ($_SESSION['level']=='bidang'){
                                                                        ?>

                                                                        <li class="divider"></li>
                                                                        <li><a href="<?php echo base_url().'padmin/edit_proyek_jadwal/'.$proyek_id;?>"><span class="fa fa-pencil"></span>Edit Jadwal</a></li>
                                                                        <li><a href="<?php echo base_url().'padmin/get_proyek_bidang/'.$pb_id;?>"><span class="fa fa-edit"></span>Progress</a></li>
                                                                        <li><a href="<?php echo base_url().'padmin/uplampiran/'.$pb_id;?>"><span class="fa fa-plus"></span>Upload</a></li>
                                                                    <?php } else {}  ?>


                                                                </ul>
                                                            </div>

                                                            <?php if($_SESSION['level']=='admin'){ ?>
                                                                <a href="<?php echo base_url().'padmin/get_edit_proyek/'.$proyek_id;?>" class="btn btn-box-tool" ><i class="fa fa-pencil text-info"></i>
                                                                </a>
                                                                <a data-toggle="modal" data-target="#ModalHapus<?php echo $proyek_id;?>" class="btn btn-box-tool"><i class="fa fa-times text-danger"></i></a>
                                                            <?php } else {} ?>



                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        Lokasi : <?php echo $i['koordinat_nama']; ?>
                                                    </div>
                                                    <div class="col-md-8">

                                                        <?php echo $proyek_tahun;?>
                                                    </div>
                                                    <div class="col-md-4">

                                                        <div class="box-tools pull-right">
                                                            Progress :

                                                            <?php
                                                            if($pb_real==0){
                                                                echo "<label class='label bg-gray'>Belum Mulai</label>";
                                                            }
                                                            else {
                                                                if($pb_target==0 || $pb_target<=70){

                                                                    if($pb_devisi>0){
                                                                        echo "<label class='label bg-blue'>".$pb_real."% (Baik)</label>";
                                                                    }
                                                                    else {
                                                                        if($pb_devisi==0 || $pb_devisi>=(-7)){
                                                                            echo "<label class='label bg-green'>".$pb_real."% (Wajar)</label>";
                                                                        }
                                                                        else if ($pb_devisi<(-7) && $pb_devisi>=(-10)){

                                                                            echo "<label class='label bg-yellow'>".$pb_real."% (Terlambat)</label>";
                                                                        }
                                                                        else {
                                                                            echo "<label class='label bg-red'>".$pb_real."% (Kritis)</label>";
                                                                        }

                                                                    }
                                                                }
                                                                else if ($pb_target>70 && $pb_target<=100){

                                                                    if($pb_devisi>0){
                                                                        echo "<label class='label bg-blue'>".$pb_real."% (Baik)</label>";
                                                                    }
                                                                    else {
                                                                        if($pb_devisi==0 || $pb_devisi>=(-4)){
                                                                            echo "<label class='label bg-green'>".$pb_real."% (Wajar)</label>";
                                                                        }
                                                                        else if ($pb_devisi<(-4) && $pb_devisi>=(-5)){

                                                                            echo "<label class='label bg-yellow'>".$pb_real."% (Terlambat)</label>";
                                                                        }
                                                                        else {

                                                                            echo "<label class='label bg-red'>".$pb_real."% (Kritis)</label>";
                                                                        }
                                                                    }
                                                                }
                                                                else {
                                                                    echo "";
                                                                }
                                                            }
                                                            ?>

                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <!-- /.row -->
                                        </div>
                                        <div class="box-footer">
                                            <div class="row">
                                                <div class="col-md-9 pull-right">
                                                    <div class="col-md-9">
                                                        <span class="description-percentage text-bold">Penanggung Jawab : <?php echo $i['pn_nama']; ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php endforeach;?>

                        </div>
                    </div>
                    <div class="tab-pane" id="tab_2">

                        <div id="legend" class="col-md-2"></div>
                        <div id="test" class="gmap3 col-md-7" style="max-width:100%;"></div>
                        <div id="right-panel" class="col-md-3" style="width: 100%;">
                            <div class="col-md-12" id="panel-content">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php foreach ($data->result_array() as $i) :
$koordinat_id=$i['koordinat_id'];
$lat=$i['koordinat_lat'];
$lng=$i['koordinat_lng'];
$value=$i['koordinat_value'];
$proyek_id=$i['proyek_id'];
$proyek_nama=$i['proyek_nama'];
$proyek_tahun=$i['proyek_tahun'];
$proyek_keuangan=$i['proyek_keuangan'];
$proyek_pagu=$i['proyek_pagu'];
$proyek_sech_awal=$i['proyek_sech_awal'];
$proyek_awal_kontrak=$i['proyek_awal_kontrak'];
$proyek_akhir_kontrak=$i['proyek_akhir_kontrak'];
$koordinat_nama=$i['koordinat_nama'];
$pb_target=$i['pb_target'];
$pb_real=$i['pb_real'];
$pb_devisi=$i['pb_devisi'];
$up1=date('d-m-Y h:i:s', strtotime($i['last_update']));
$up2=date('d-m-Y h:i:s', strtotime($i['pb_last_update']));
    $proyek_id=$i['proyek_id'];
    $proyek_nama=$i['proyek_nama'];
    $proyek_pagu=$i['proyek_pagu'];
    ?>
    <div class="modal fade" id="ModalHapus<?php echo $proyek_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-sm"  role="document">
            <div class="modal-content" >

                <form class="form-horizontal" action="<?php echo base_url().'padmin/delete_proyek'?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body container-fluid text-center" >
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <div class="col-md-12">
                            <input type="hidden" name="kode" value="<?php echo $proyek_id;?>"/>
                            <h3 class="text-center"><?php echo $proyek_nama; ?></h3>
                        </div>
                        <div class="col-md-12">

                            <div class="iconcolor">
                                <i class="fa fa-warning" style="font-size:200px;"></i>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <br>
                            Apakah Anda yakin ingin menghapus proyek ini ?
                        </div>
                        <div class="col-md-6 col-md-offset-3"><br>
                            <button type="submit" class="btn btn-danger btn-round col-md-12" id="simpan">Hapus</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


<div class="modal fade" id="ModalDetail<?php echo $proyek_id; ?>" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel">


    <div class="modal-dialog modal-sm"  role="document">
        <div class="modal-content" >
        <div class="modal-body container-fluid text-center" >
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                    <div class="col-md-12">
                        <input type="hidden" name="kode" value="<?php echo $proyek_id;?>"/>
                        <h3 class="text-center"><?php echo $proyek_nama; ?></h3>
                        <table  class="table table-hover" style="font-size:12px;">
                            <tr>
                                <input type="hidden" id="markerindex" name="markerindex" value="<?php echo $proyek_id?>">
                                <td><span class="direct-chat-name pull-left"><?php echo $proyek_nama;?></span></td>
                                <td><span class="direct-chat-timestamp pull-right"></span></td>
                            </tr>
                            <tr>
                                <td><span class="direct-chat-name pull-left">Tahun</span></td>
                                <td><span class="direct-chat-timestamp pull-right"><?php echo $proyek_tahun;?></span></td>
                            </tr>
                            <tr>
                                <td><span class="direct-chat-name pull-left">Nilai Kontrak</span></td>
                                <td><span class="direct-chat-timestamp pull-right"><?php echo number_format($proyek_keuangan);?></span></td>
                            </tr>
                            <tr>
                                <td><span class="direct-chat-name pull-left">Pagu</span></td>
                                <td><span class="direct-chat-timestamp pull-right"><?php echo number_format($proyek_pagu);?></span></td>
                            </tr>
                            <tr>
                                <td><span class="direct-chat-name pull-left">Rencana Kontrak</span></td>
                                <td><span class="direct-chat-timestamp pull-right"><?php echo date('d-m-Y', strtotime($proyek_sech_awal));?></span></td>
                            </tr>
                            <tr>
                                <td><span class="direct-chat-name pull-left">Awal Kontrak</span></td>
                                <td><span class="direct-chat-timestamp pull-right"><?php echo date('d-m-Y', strtotime($proyek_awal_kontrak));?></span></td>
                            </tr>
                            <tr>
                                <td><span class="direct-chat-name pull-left">Akhir Kontrak</span></td>
                                <td><span class="direct-chat-timestamp pull-right"><?php echo date('d-m-Y', strtotime($proyek_akhir_kontrak));?></span></td>
                            </tr>
                            <tr>
                                <td><span class="direct-chat-name pull-left">Progress Proyek</span></td>
                                <td span class="direct-chat-timestamp pull-right">
                                    <?php
                                    if($pb_real==0){ ?>
                                        <label class="label text-navy" style="font-family:Arial; font-weight:bold;">Belum Mulai</label>
                                    <?php }
                                    else {
                                        if($pb_target==0 || $pb_target<=70){
                                            if($pb_devisi>0){ ?>
                                                <label class="label text-blue" style="font-family:Arial; font-weight:bold;"><?php echo $pb_real ?> % (Baik)</label>
                                            <?php }
                                            else {
                                                if($pb_devisi==0 || $pb_devisi>=(-7)){ ?>
                                                    <label class="label text-green" style="font-family:Arial; font-weight:bold;"><?php echo $pb_real ?> % (Wajar)</label>
                                                <?php }
                                                else if ($pb_devisi<(-7) && $pb_devisi>=(-10)){ ?>
                                                    <label class="label text-yellow" style="font-family:Arial; font-weight:bold;"><?php echo $pb_real ?> % (Terlambat)</label>
                                                <?php }
                                                else { ?>
                                                    <label class="label text-red" style="font-family:Arial; font-weight:bold;"><?php echo $pb_real ?> % (Kritis)</label>
                                                <?php }
                                            }
                                        }
                                        else if ($pb_target>70 && $pb_target<=100){
                                            if($pb_devisi>0){ ?>
                                                <label class="label text-blue" style="font-family:Arial; font-weight:bold;"><?php echo $pb_real ?> % (Baik)</label>
                                            <?php }
                                            else {
                                                if($pb_devisi==0 || $pb_devisi>=(-4)){ ?>
                                                    <label class="label text-green" style="font-family:Arial; font-weight:bold;" ><?php echo $pb_real ?> % (Wajar)</label>
                                                <?php }
                                                else if ($pb_devisi<(-4) && $pb_devisi>=(-5)){ ?>
                                                    <label class="label text-yellow" style="font-family:Arial; font-weight:bold;"><?php echo $pb_real ?> % (Terlambat)</label>
                                                <?php }
                                                else { ?>
                                                    <label class="label text-red" style="font-family:Arial; font-weight:bold;"><?php echo $pb_real ?> % (Kritis)</label>
                                                <?php }
                                            }
                                        }
                                        else { ?>

                                        <?php }
                                    }
                                    ?>
                                </td>
                            </tr>
                        </table>
                    </div>
            <div class="col-md-12 table-responsive" >
                <div class="col-md-12">
                    <div class="row margin-bottom">
                        <div id="realtarget" style="width: 100%;">
                        </div>
                        <div class="box-body box-profile">
                            <?php
                            $counter=0;
                            foreach ($foto->result_array() as $i) : ?>
                                <?php if($i['proyek_id']==$proyek_id){?>
                                    <div class="col-sm-4">
                                        <a class="btn" data-toggle="modal" data-target="#ModalView<?php echo $i['proyek_id'];?>"><img style="height:100px; width:100px;object-fit:cover;" src="<?php echo base_url().'assets/images/'.$i['file_data'];?>" alt="Photo"></a>
                                    </div>
                                    <?php $counter++; if($counter>=3){ break;}} ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php
                    if($pb_real==0){ ?>
                        <div class="text-center">
                            <a class="btn btn-flat bg-gray" href="<?php echo base_url().'padmin/detail_proyek/'.$proyek_id;?>">Lihat Lebih Lanjut</a>
                        </div>
                    <?php }
                    else {
                        if($pb_target==0 || $pb_target<=70){
                            if($pb_devisi>0){ ?>
                                <div class="text-center">
                                    <a class="btn btn-flat bg-blue" href="<?php echo base_url().'padmin/detail_proyek/'.$proyek_id;?>">Lihat Lebih Lanjut</a>
                                </div>
                            <?php }
                            else {
                                if($pb_devisi==0 || $pb_devisi>=(-7)){ ?>
                                    <div class="text-center">
                                        <a class="btn btn-flat bg-green" href="<?php echo base_url().'padmin/detail_proyek/'.$proyek_id;?>">Lihat Lebih Lanjut</a>
                                    </div>
                                <?php }
                                else if ($pb_devisi<(-7) && $pb_devisi>=(-10)){ ?>
                                    <div class="text-center">
                                        <a class="btn btn-flat bg-yellow" href="<?php echo base_url().'padmin/detail_proyek/'.$proyek_id;?>">Lihat Lebih Lanjut</a>
                                    </div>
                                <?php }
                                else { ?>
                                    <div class="text-center">
                                        <a class="btn btn-flat bg-red" href="<?php echo base_url().'padmin/detail_proyek/'.$proyek_id;?>">Lihat Lebih Lanjut</a>
                                    </div>
                                <?php }
                            }
                        }
                        else if ($pb_target>70 && $pb_target<=100){
                            if($pb_devisi>0){ ?>
                                <div class="text-center">
                                    <a class="btn btn-flat bg-blue" href="<?php echo base_url().'padmin/detail_proyek/'.$proyek_id;?>">Lihat Lebih Lanjut</a>
                                </div>
                            <?php }
                            else {
                                if($pb_devisi==0 || $pb_devisi>=(-4)){ ?>
                                    <div class="text-center">
                                        <a class="btn btn-flat bg-green" href="<?php echo base_url().'padmin/detail_proyek/'.$proyek_id;?>">Lihat Lebih Lanjut</a>
                                    </div>
                                <?php }
                                else if ($pb_devisi<(-4) && $pb_devisi>=(-5)){ ?>
                                    <div class="text-center">
                                        <a class="btn btn-flat bg-yellow" href="<?php echo base_url().'padmin/detail_proyek/'.$proyek_id;?>">Lihat Lebih Lanjut</a>
                                    </div>
                                <?php }
                                else { ?>
                                    <div class="text-center">
                                        <a class="btn btn-flat bg-red" href="<?php echo base_url().'padmin/detail_proyek/'.$proyek_id;?>">Lihat Lebih Lanjut</a>
                                    </div>
                                <?php }
                            }
                        }
                        else { ?>

                        <?php }
                    }
                    ?>
                </div></div>

        </div>
        </div>
    </div>
    </div>
<?php endforeach;?>

<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyAogXD-AHrsmnWinZIyhRORJ84bgLwDPpg"></script>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/gmaps/assets/js/gmap3.js"></script>
<script src="https://cdn.sobekrepository.org/includes/gmaps-markerwithlabel/1.9.1/gmaps-markerwithlabel-1.9.1.min.js"></script>
<script type="text/javascript">
    $(function () {



        var icons = {

            belummulai: {
                name: 'Belum Mulai',
                icon: "<?php echo base_url('assets/gmaps/images/grey.png'); ?>"
            },
            baik: {
                name: 'Baik',
                icon: "<?php echo base_url('assets/gmaps/images/blue.png'); ?>"
            },
            wajar: {
                name: 'Wajar',
                icon: "<?php echo base_url('assets/gmaps/images/green.png'); ?>"
            },
            terlambat: {
                name: 'Terlambat',
                icon: "<?php echo base_url('assets/gmaps/images/yellow.png'); ?>"
            },
            kritis: {
                name: 'Kritis',
                icon: "<?php echo base_url('assets/gmaps/images/red.png'); ?>"
            }
        };

        var legend = document.getElementById('legend');
        for (var key in icons) {
            var type = icons[key];
            var name = type.name;
            var icon = type.icon;
            var div = document.createElement('div');
            div.innerHTML = '<img style="width:20px;" src="' + icon + '"> ' +name+ '<br/><br/>';
            legend.appendChild(div);
        }

        var panel = document.getElementById('right-panel');

        var directionsDisplay = new google.maps.DirectionsRenderer;
        var directionsService = new google.maps.DirectionsService;
        directionsDisplay.setPanel(panel);


        $('#test')
        .gmap3({
            center: [-1.7333385,102.7458134],
            zoom: 8,
            mapTypeId: 'hybrid',
        }).cluster({
            size: 200,


            markers: [
            <?php
            $no=-1;
            foreach ($data->result_array() as $i) :
                $no++;
                $koordinat_id=$i['koordinat_id'];
                $lat=$i['koordinat_lat'];
                $lng=$i['koordinat_lng'];
                $value=$i['koordinat_value'];
                $proyek_id=$i['proyek_id'];
                $proyek_nama=$i['proyek_nama'];
                $proyek_tahun=$i['proyek_tahun'];
                $proyek_keuangan=$i['proyek_keuangan'];
                $proyek_pagu=$i['proyek_pagu'];
                $proyek_sech_awal=$i['proyek_sech_awal'];
                $proyek_awal_kontrak=$i['proyek_awal_kontrak'];
                $proyek_akhir_kontrak=$i['proyek_akhir_kontrak'];
                $koordinat_nama=$i['koordinat_nama'];
                $pb_target=$i['pb_target'];
                $pb_real=$i['pb_real'];
                $pb_devisi=$i['pb_devisi'];
                $up1=date('d-m-Y h:i:s', strtotime($i['last_update']));
                $up2=date('d-m-Y h:i:s', strtotime($i['pb_last_update']));
                ?>

                {
                    id : <?php echo $proyek_id;?>,
                    position: [<?php echo $lat;?>, <?php echo $lng;?>],label:{
                        fontFamily:'Arial',
                        color:'#FFFFFF',
                        text: '<?php echo $proyek_nama;?>',
                    } ,
                    icon:{labelOrigin: new google.maps.Point(80, 25),
                        url: "<?php
                        if($pb_real==0){
                            echo base_url('assets/gmaps/images/grey.png');
                        }
                        else {
                            if($pb_target==0 || $pb_target<=70){

                                if($pb_devisi>0){
                                    echo base_url('assets/gmaps/images/blue.png');
                                }
                                else {
                                    if($pb_devisi==0 || $pb_devisi>=(-7)){
                                        echo base_url('assets/gmaps/images/green.png');
                                    }
                                    else if ($pb_devisi<(-7) && $pb_devisi>=(-10)){
                                        echo base_url('assets/gmaps/images/yellow.png');
                                    }
                                    else {
                                        echo base_url('assets/gmaps/images/red.png');
                                    }

                                }
                            }
                            else if ($pb_target>70 && $pb_target<=100){

                                if($pb_devisi>0){
                                    echo base_url('assets/gmaps/images/blue.png');
                                }
                                else {
                                    if($pb_devisi==0 || $pb_devisi>=(-4)){
                                        echo base_url('assets/gmaps/images/green.png');
                                    }
                                    else if ($pb_devisi<(-4) && $pb_devisi>=(-5)){
                                        echo base_url('assets/gmaps/images/yellow.png');
                                    }
                                    else {
                                        echo base_url('assets/gmaps/images/red.png');
                                    }
                                }
                            }
                            else {
                                echo "";
                            }
                        }
                        ?>"}},
                        <?php
                    endforeach;
                    ?>
                    ],



                    cb: function (markers) {
                        if (markers.length > 1) {
                            if (markers.length < 20) {
                                return {
                                    content: "<div class='cluster cluster-1'>" + markers.length + "</div>",
                                    x: -26,
                                    y: -26
                                };
                            }
                            if (markers.length < 50) {
                                return {
                                    content: "<div class='cluster cluster-2'>" + markers.length + "</div>",
                                    x: -26,
                                    y: -26
                                };
                            }
                            return {
                                content: "<div class='cluster cluster-3'>" + markers.length + "</div>",
                                x: -33,
                                y: -33
                            };
                        }
                    }
                })
            .on('click', function (marker, clusterOverlay, cluster, event) {
    if (marker) {
        var index = (marker.id);
        $('#ModalDetail'+index).modal('show').on('shown.bs.modal', function (e) {
            drawChart(document.getElementById("markerindex").value);
        });
    }
});
});
</script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>
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
<style type="text/css">
.jconfirm.jconfirm-my-theme .jconfirm-bg {
    background-color: slategray;
    opacity: .6;
}
.jconfirm.jconfirm-my-theme .jconfirm-box {
    background:-moz-linear-gradient(top, #e72c83 0%, #a742c6 20%);
    background: -webkit-linear-gradient(top, #e72c83 0%,#a742c6 20%);
    background: linear-gradient(to bottom, #e72c83 0%,#a742c6 20%);
    -webkit-box-shadow: 0 7px 8px -4px rgba(0, 0, 0, 0.2), 0 13px 19px 2px rgba(0, 0, 0, 0.14), 0 5px 24px 4px rgba(0, 0, 0, 0.12);
    box-shadow: 0 7px 8px -4px rgba(0, 0, 0, 0.2), 0 13px 19px 2px rgba(0, 0, 0, 0.14), 0 5px 24px 4px rgba(0, 0, 0, 0.12);
    padding: 30px 30px 15px;
}
.jconfirm.jconfirm-my-theme .jconfirm-box div.jconfirm-closeIcon {
    color: rgba(0, 0, 0, 0.87);
    top: 15px;
    right: 15px;
}
.jconfirm.jconfirm-my-theme .jconfirm-box div.jconfirm-title-c {
    color: rgba(0, 0, 0, 0.87);
    font-size: 24px;
    font-weight: bold;
    text-align: center;
    margin-bottom: 10px;
}
.jconfirm.jconfirm-my-theme .jconfirm-box div.jconfirm-title-c .jconfirm-icon-c {
    -webkit-transition: -webkit-transform .5s;
    transition: -webkit-transform .5s;
    transition: transform .5s;
    transition: transform .5s, -webkit-transform .5s;
    -webkit-transform: scale(0);
    transform: scale(0);
    display: block;
    margin-right: 0px;
    margin-left: 0px;
    margin-bottom: 10px;
    font-size: 69px;
    color: white;
}
.jconfirm.jconfirm-my-theme .jconfirm-box div.jconfirm-content {
    text-align: center;
    font-size: 15px;
    color: white;
    margin-bottom: 25px;
}
.jconfirm.jconfirm-my-theme .jconfirm-box .jconfirm-buttons {
    text-align: center;
}
.jconfirm.jconfirm-my-theme .jconfirm-box .jconfirm-buttons button {
    font-weight: bold;
    text-transform: uppercase;
    -webkit-transition: background .1s;
    transition: background .1s;
    padding: 10px 20px;
}
.jconfirm.jconfirm-my-theme .jconfirm-box .jconfirm-buttons button + button {
    margin-left: 4px;
}
.jconfirm.jconfirm-my-theme.jconfirm-open .jconfirm-box .jconfirm-title-c .jconfirm-icon-c {
    -webkit-transform: scale(1);
    transform: scale(1);
}
</style>

<?php if($this->session->flashdata('msg')=='berhasil'):?>
    <script type="text/javascript">
        $.dialog({
            title: '',
            content: "Proyek berhasil ditambahkan <br><a href='<?php echo base_url()?>padmin/proyek' class='btn btn-round btn-primary'>Lihat Proyek</a>",
            icon: 'fa fa-check-circle',
            theme: 'my-theme'
        });
    </script>
    <?php else:?>
    <?php endif;?>

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
                    text: "Data berhasil disimpan.",
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
                        text: "Proyek berhasil di update",
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
                            text: "Proyek Berhasil dihapus.",
                            showHideTransition: 'slide',
                            icon: 'success',
                            hideAfter: false,
                            position: 'bottom-right',
                            bgColor: '#7EC857'
                        });
                    </script>
                    <?php else:?>

                    <?php endif;?>

                    <script>
                        google.charts.load('current', {'packages': ['corechart']});
                        function drawChart(index) {
                            <?php
                            $result = $chartrt->result_array(); ?>

                            var chart_array = <?php echo json_encode($result);?>;

                            var items = [['Tanggal', 'Real', 'Target'],
                            [null, 0, 0]];

                            var i;
                            for (i = 0; i < chart_array.length; i++) {

                                if(chart_array[i]['pb_proyek_id'] == index)
                                {
                                    items.push([chart_array[i]['tanggal'],chart_array[i]['pb_real'],chart_array[i]['pb_target']])
                                }
                            }
                            var data = google.visualization.arrayToDataTable(items);

                            var options = {
                              curveType: 'none',
                              fontName: 'Arial',
                              fontSize: '10px',
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

                          var target = document.getElementById('realtarget');

                          var chart = new google.visualization.LineChart($('#ModalDetail'+index).getElementById('realtarget'));
                            alert("masuk");
                          chart.draw(data, options);
                      }
                  </script>
