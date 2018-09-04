  <aside class="main-sidebar">
    <section class="sidebar">
      <div class="user-panel">
      </div>

      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
            </button>
          </span>
        </div>
      </form>
      
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li><a href="<?php echo base_url() ?>padmin/"><i class="fa fa-tasks" style="font-size: 20px;color: #1DE9B6;"></i> <span style="color: #1DE9B6;">Home</span></a></li>




        <?php if($_SESSION['level']=='admin'){  ?>
          <li><a href="<?php echo base_url() ?>padmin/proyek/"><i class="fa fa-file-text" style="font-size: 20px;color: #1DE9B6"></i> <span style="color: #1DE9B6;">Proyek</span></a></li>
        <?php } else {?>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-file-text" style="font-size: 20px;color: #1DE9B6;"></i> <span style="color: #1DE9B6;">Proyek</span>
              <span class="pull-right-container" style="color: #1DE9B6;">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="active"><a style="color: #1DE9B6;" href="<?php echo base_url() ?>padmin/proyek/"><i class="fa fa-circle-o"></i> Proyek</a></li>
              <?php if($_SESSION['level']=='bidang' ){ ?>
                <li class="active"><a  style="color: #1DE9B6;" href="<?php echo base_url() ?>padmin/penanggung_jawab/"><i class="fa fa-circle-o"></i> Penyedia Jasa</a></li>
              <?php } else {} ?>
            </ul>
          </li>
        <?php } ?>
<!--         <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Petugas</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="<?php echo base_url() ?>padmin/dinaspu"><i class="fa fa-circle-o"></i> Dinas PU</a></li>
            <li class="active"><a href="<?php echo base_url() ?>padmin/pelaksana"><i class="fa fa-circle-o"></i> Kontraktor / Konsultan</a></li>
          </ul>
        </li> -->
        <?php if($_SESSION['level']=='admin'){ ?>
          <li><a href="<?php echo base_url() ?>padmin/user/"><i class="fa fa-user" style="font-size: 20px;color: #1DE9B6"></i> <span style="color: #1DE9B6;">User</span></a></li>
        <?php } else {} ?>
        <li><a href="#"><i class="fa fa-gear" style="font-size: 20px;color: #1DE9B6"></i> <span style="color: #1DE9B6;">Setting</span></a></li>
      </ul>
    </section>
  </aside>

