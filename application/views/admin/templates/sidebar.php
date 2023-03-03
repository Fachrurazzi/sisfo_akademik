  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url() ?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $this->session->userdata('username'); ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU UTAMA</li>
        <li><a href="<?php echo base_url('admin/dashboard'); ?>"><i class="fa fa-dashboard"></i> <span> Dashboard</span></a></li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-database"></i> <span>Data Master</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('admin/Jurusan'); ?>"><i class="fa fa-university"></i> Jurusan</a></li>
            <li><a href="<?php echo base_url('admin/Ta'); ?>"><i class="fa fa-yc-square"></i>Tahun Akademik</a></li>
            <li><a href="<?php echo base_url('admin/Matakuliah'); ?>"><i class="fa fa-book"></i> Mata kuliah</a></li>
            <li><a href="<?php echo base_url('admin/Mahasiswa'); ?>"><i class="fa fa-users"></i> Mahasiswa</a></li>
            <li><a href="<?php echo base_url('admin/Dosen'); ?>"><i class="fa fa-user"></i> Dosen</a></li>
            <li><a href="<?php echo base_url('admin/Jadwal'); ?>"><i class="fa fa-calendar"></i> Jadwal Kuliah</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-archive"></i> <span>Akademika</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
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
                    <li><a href="<?php echo base_url('admin/Nilai/index/'.$smt->semester.'/'.$smt->kelas); ?>"><i class="fa fa-circle-o"></i> <?= $smt->kelas ?></a></li>
                  </ul>
                </li>
                <?php endif ?>
                <?php endforeach; ?> 
              </ul>
            </li>
            <?php endforeach; ?>
          </ul>
        </li>
            <li><a href="<?php echo base_url('admin/krs'); ?>"><i class="fa fa-file-text-o"></i> KRS</a></li>
            <li><a href="<?php echo base_url('admin/khs'); ?>"><i class="fa fa-files-o"></i> KHS</a></li>
            <li><a href="<?php echo base_url('admin/Nilai/transkrip'); ?>"><i class="fa fa-list-alt"></i> Transkip Nilai</a></li>
            <li><a href="<?php echo base_url('admin/Mahasiswa/laporan_data_mahasiswa'); ?>"><i class="fa fa-users"></i>Laporan Data Mahasiswa</a></li>
            <li><a href="<?php echo base_url('admin/Jadwal/laporan_jadwal'); ?>"><i class="fa fa-calendar-check-o"></i>Laporan Jadwal Mata Kuliah</a></li>
          </ul>
        </li>
      
        <li class="header">PENGATURAN</li>
        <li><a href="<?php echo base_url('admin/Admin'); ?>"><i class="fa fa-user"></i> <span> Akun</span></a></li>
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