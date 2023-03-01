    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?= $totalMhs['total'] ?></h3>

              <p>Mahasiswa</p>
            </div>
            <div class="icon">
              <i class="ion-person-stalker"></i>
            </div>
            <a href="<?= base_url('admin/Mahasiswa') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
            <h3><?= $totalDosen['total'] ?></h3>

              <p>Dosen</p>
            </div>
            <div class="icon">
              <i class="ion ion-person"></i>
            </div>
            <a href="<?= base_url('admin/Dosen') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
            <h3><?= $totalJurusan['total'] ?></h3>

              <p>Jurusan</p>
            </div>
            <div class="icon">
              <i class="ion ion-university"></i>
            </div>
            <a href="<?= base_url('admin/Jurusan') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
            <h3><?= $totalMatkul['total'] ?></h3>

              <p>Mata Kuliah</p>
            </div>
            <div class="icon">
              <i class="ion ion-bookmark"></i>
            </div>
            <a href="<?= base_url('admin/Matakuliah') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
    

    </section>
    <!-- /.content -->