  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
        <?php if($mahasiswa['photo'] == NULL) { ?>
                <img class="img-circle" src="<?php echo base_url('assets/img/default.jpg'); ?>" alt="User profile picture">
               <?php }else{ ?> 
              <img class="img-circle" src="<?php echo base_url('assets/img/uploads/'.$mahasiswa['photo']); ?>" alt="User profile picture">
                <?php } ?>
        </div>
        <div class="pull-left info">
          <p><?php echo $this->session->userdata('nama_panjang'); ?></p>
          <p><?php echo $this->session->userdata('username'); ?></p>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU UTAMA</li>
        <li class="">
          <a href="<?php echo base_url('mahasiswa/dashboard') ?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url('mahasiswa/profile'); ?>">
            <i class="fa fa-user"></i>
            <span>Profile</span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url('mahasiswa/krs'); ?>">
          <i class="fa fa-file-text-o"></i>
            <span>KRS</span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url('mahasiswa/khs'); ?>">
          <i class="fa fa-files-o"></i>
            <span>KHS</span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url('mahasiswa/Nilai/transkrip'); ?>">
          <i class="fa fa-list-alt"></i> <span>Transkrip Nilai</span>
            
          </a>
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