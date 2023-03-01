    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-xs-12">
          <?php echo $this->session->flashdata('pesan'); ?>
            <div class="box">
                <div class="box-header"> 
                <a href="<?=  base_url('dosen/absensi/create_absen'); ?>" class="btn btn-primary"><i class="fa fa-plus"> Absensi Kehadiran</i></a>
                </div>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped" style="font-size:13px;">
                        <thead>
                            <th>No</th>
                            <th>Mata Kuliah</th>
                            <th>Tanggal</th>
                            <th>Jurusan</th>
                            <th>Kelas</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                            <tr>
                                <?php $no = 1; foreach($absensi as $ab) : ?>
                                <td><?= $no++; ?></td>
                                <td><?= $ab->mata_kuliah; ?></td>
                                <td><?= format_hari_tanggal($ab->tanggal) ?></td>
                                <td><?= $ab->nama_jurusan ?></td>
                                <td><?= $ab->kelas ?></td>
                                <td>
                                    <a href="" class="btn btn-primary"> <i class="fa fa-eye"></i></a>
                                </td>
                                <?php endforeach; ?>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </section>
    <!-- /.content -->


    <br><br><br><br><br><br>
    <br><br><br><br><br><br>
    <br><br><br><br><br><br>
    <br><br><br><br><br><br>
    <br><br><br><br><br><br>

    

    <!-- jQuery 3 -->
    <script type="text/javascript" src="<?php echo base_url()  ?>assets/bower_components/jquery/dist/jquery.min.js"></script>

    <script type="text/javascript">
        $(function () { 
            $('#example1').DataTable()
        })
    </script>



