  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
        <?php if($dosen['photo'] == NULL) { ?>
                <img class="img-circle" src="<?php echo base_url('assets/img/default.jpg'); ?>" alt="User profile picture">
               <?php }else{ ?> 
              <img class="img-circle" src="<?php echo base_url('assets/img/uploads/'.$dosen['photo']); ?>" alt="User profile picture">
                <?php } ?>
        </div>
        <div class="pull-left info">
          <p><?php echo $this->session->userdata('nama_dosen'); ?></p>
          <p><?php echo $this->session->userdata('username'); ?></p>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU UTAMA</li>
        <li class="">
          <a href="<?php echo base_url('dosen/dashboard') ?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-calendar"></i> <span>Absensi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li><a href="<?php echo base_url('dosen/absensidosen'); ?>"><i class="fa fa-user"></i> <span> Dosen</span></a></li>
          <li><a href="<?php echo base_url('dosen/absensi'); ?>"><i class="fa fa-users"></i> <span> Mahasiswa</span></a></li>
          </ul>
        </li>
        <li>
          <a href="<?php echo base_url('dosen/profile'); ?>">
            <i class="fa fa-user"></i>
            <span>Profile</span>
          </a>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-archive"></i> <span>Input Nilai</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <?php foreach($tahunAjar as $ta): ?>
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i><?= $ta->tahun ?>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
              <?php foreach($semester as $smt): ?>
                <?php if ($ta->tahun == $smt->tahun_ajar) : ?>
                <li class="treeview">
                  <a href="#"><i class="fa fa-circle-o"></i>Semester <?= $smt->semester ?> <?= $smt->smt ?>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="<?php echo base_url('dosen/Nilai/index/'.$smt->semester.'/'.$smt->kelas); ?>"><i class="fa fa-circle-o"></i> <?= $smt->kelas ?></a></li>
                  </ul>
                </li>
                <?php endif ?>
                <?php endforeach; ?> 
              </ul>
            </li>
            <?php endforeach; ?>
          </ul>
        </li>

        <li><a href="<?php echo base_url('Login/logout'); ?>"><i class="fa fa-sign-out"></i> <span>Logout</span></a></li>
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $subtitle; ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> <?php echo $title; ?></a></li>
        <li class="active"><?php echo $subtitle; ?></li>
      </ol>
    </section>