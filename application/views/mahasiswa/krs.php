    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-3">
                <img style="width: 170px;" src="<?php echo base_url('assets/img/uploads/'.$mhs['photo']) ?>">
            </div>
            <div class="col-md-9">
                <table>
                    <tr>
                        <th style="width: 200px;"><h3>Jurusan</h3></th>
                        <th style="width: 20px;"> : </th>
                        <th><h3><?php echo $mhs['jurusan']; ?></h3></th>
                    </tr>
                    <tr>
                        <th><h3>Nama Lengkap</h3></th>
                        <th> : </th>
                        <th><h3><?php echo $mhs['nama_kepanjangan']; ?></h3></th>
                    </tr>
                    <tr>
                        <th><h3>Semester</h3></th>
                        <th> : </th>
                        <th><h3><?php echo $mhs['semester']; ?></h3></th>
                    </tr>
                </table>
            </div>
        </div>
        <br><br>
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-xs-12">
          <?php echo $this->session->flashdata('pesan'); ?>
            <div class="box">
                <div class="box-header">
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-info">
                        <i class="fa fa-plus"></i> KRS
                </button>
                <a title="Cetak" href="<?php echo base_url('mahasiswa/krs/print/'.$mhs['id_mahasiswa']); ?>" class="btn btn-success" target="_blank"><i class="fa fa-print"></i> Cetak </a>
                </div>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped" style="font-size:13px;">
                        <thead>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Matakuliah</th>
                            <th>SKS</th>
                            <th>Ruangan</th>
                            <th>Waktu</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                          <?php $i=1;
                          foreach($krs as $row ) { ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $row->id_matkul; ?></td>
                                <td><?php echo $row->matakuliah; ?></td>
                                <td><?php echo $row->sks; ?></td>
                                <td><?php echo $row->ruangan; ?></td>
                                <td><?php echo $row->hari; ?> <?php echo $row->jam; ?></td>
                                <td>
                                    
                                    <a title="Hapus KRS" href="<?php echo base_url('mahasiswa/krs/delete/'.$row->id_krs); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin akan dihapus')"><i class="fa fa-trash"></i></a>
                      
                             </td>
                          </tr>
                          <?php } ?>
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

        <!-- Modals KRS Mahasiswa -->
        <div class="modal modal-info fade" id="modal-info">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Kartu Rencana Studi</h4>
              </div>
              <div class="modal-body">
              <div class="box box-primary">
            <!-- form start -->
            <form role="form" method="post" action="" >
              <div class="box-body">
                <table class="table table-bordered table-striped">
                  <tr style="color: grey;">
                    <th>No</th>
                    <th>Aksi</th>
                    <th>Kode</th>
                    <th>Matakuliah</th>
                    <th>Semester</th>
                    <th>SKS</th>
                  </tr>

                  <?php $i = 1;
                     foreach($getKRS as $krs) { ?>
                  <tr style="color: grey;">
                    <td><?php echo $i++;
                     ?></td>
                    <td>
                      <a href="<?php echo base_url('mahasiswa/Krs/addKrs/'.$krs->id_jadwal); ?>" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i></a>
                    </td>
                    <td><?php echo $krs->id_matkul; ?></td>
                    <td><?php echo $krs->mata_kuliah; ?></td>
                    <td><?php echo $krs->semester; ?></td>
                    <td><?php echo $krs->sks; ?></td>
                  </tr>
                  <?php } ?>
                </table>
              </div>
              <!-- /.box-body -->
            
          </div>
              </div>
              </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

    <!-- jQuery 3 -->
    <script type="text/javascript" src="<?php echo base_url()  ?>assets/bower_components/jquery/dist/jquery.min.js"></script>

    <script type="text/javascript">
        $(function () { 
            $('#example1').DataTable()
        })
    </script>





