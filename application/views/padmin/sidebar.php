  <aside class="main-sidebar">
    <section class="sidebar">
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url().'assets/images/'.$_SESSION['foto'];?>" class="img-circle user-image" style="width:25px;height:25px;" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['nama']; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
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
        <li><a href="<?php echo base_url() ?>padmin/"><i class="fa fa-home"></i> <span>Home</span></a></li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Proyek</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="<?php echo base_url() ?>padmin/proyek/"><i class="fa fa-circle-o"></i> Proyek</a></li>

            <?php if($_SESSION['level']=='bidang' ){ ?>
              <li class="active"><a href="<?php echo base_url() ?>padmin/penanggung_jawab/"><i class="fa fa-circle-o"></i> Pelaksana</a></li>
            <?php } else {} ?>
          </ul>
        </li>
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
          <li><a href="<?php echo base_url() ?>padmin/user/"><i class="fa fa-user"></i> <span>User</span></a></li>
        <?php } else {} ?>
        <li><a href="<?php echo base_url() ?>padmin/setting/"><i class="fa fa-gear"></i> <span>Setting</span></a></li>
      </ul>
    </section>
  </aside>

