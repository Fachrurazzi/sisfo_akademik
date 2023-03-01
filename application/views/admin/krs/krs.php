    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-xs-12">
          <?php echo $this->session->flashdata('pesan'); ?>
            <div class="box">
                <div class="box-header">
                </div>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped" style="font-size:13px;">
                        <thead>
                            <th>No</th>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Program Studi</th>
                            <th>Tahun Ajar</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                          <?php $i=1; 
                          foreach($getAllKRS as $row) { ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $row['nim']; ?></td>
                                <td><?php echo $row['nama_mhs']; ?></td>
                                <td><?php echo $row['jurusan']; ?></td>
                                <td><?php echo $row['tahun_ajar']; ?></td>
                                <td>
                                    
                                    <a title="Hapus KRS" href="<?php echo base_url('admin/krs/print/').$row['id_mahasiswa']; ?>" class="btn btn-sm btn-success" target="_blank"><i class="fa fa-print"></i></a>
                      
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
                      <a href="<?php echo base_url('admin/Krs/addKrs/'.$krs->id_jadwal); ?>" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i></a>
                    </td>
                    <td><?php echo $krs->id_matkul; ?></td>
                    <td><?php echo $krs->matakuliah; ?></td>
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





