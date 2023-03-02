    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-xs-6">
            <table class="table">
                <tbody>
                    <tr>
                        <th>Kode Jurusan</th>
                        <td> : </td>
                        <td><?php echo $detil['id_jurusan']; ?></td>
                    </tr>
                    <tr>
                        <th>Jurusan</th>
                        <td> : </td>
                        <td><?php echo $detil['jurusan']; ?></td>
                    </tr>
                    <tr>
                        <th>Tahun Akademik</th>
                        <td> : </td>
                        <td><?php echo date('Y', strtotime('-1 years')).'/'.date('Y') ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <?php echo $this->session->flashdata('pesan'); ?>
            <div class="box">
                <div class="box-header">
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-info">
                        <i class="fa fa-plus"></i> Add Jadwal Mata kuliah
                    </button>
                    <a class="btn btn-warning" href="<?php echo base_url('admin/Jadwal'); ?>">Kembali</a>
                </div>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped" style="font-size:13px;">
                        <thead>
                            <th>No</th>
                            <th>Matakuliah</th>
                            <th>Semester</th>
                            <th>SKS</th>
                            <th>Dosen</th>
                            <th>Jam</th>
                            <th>Ruangan</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                          <?php $i = 1;
                           foreach($matkul as $row) { 
                            if($row->soft_delete == 1) {?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $row->matakuliah; ?></td>
                                <td><?php echo $row->semester; ?></td>
                                <td><?php echo $row->sks; ?></td>
                                <td><?php echo $row->nama_dosen; ?></td>
                                <td><?php echo $row->jam; ?></td>
                                <td><?php echo $row->ruangan; ?></td>
                                <td>
                                    <a title="Delete Data" href="<?php echo base_url('admin/Jadwal/softDelete/'.$row->id_jadwal); ?>" onclick="return confirm('Yakin Akan Di Hapus??');" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                             </td>
                          </tr>
                          <?php }} ?>
                     </tbody>
                </table>
            </div>
         </div>
     </div>
      </div>
    </section>
    <!-- /.content -->


    <!-- Modals Data Jadwal -->
    <div class="modal modal-info fade" id="modal-info">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Jadwal Kuliah</h4>
              </div>
              <div class="modal-body">
              <div class="box box-primary">
            <!-- form start -->
            <form role="form" method="post" action="<?php echo base_url('admin/Jadwal/insert/'.$detil['id_jurusan']); ?>">
              <div class="box-body">
                <div class="form-group">
                  <label style="color: gray;" for="matakuliah">Matakuliah</label>
                  <select name="matakuliah" id="matakuliah" class="form-control" required="">
                    <option> --Pilih Matakuliah-- </option>
                    <?php foreach($jrsMatkul as $j) { ?>
                    <option value="<?php echo $j->id_matkul; ?>">Semester <?php echo $j->semester; ?> - <?php echo $j->matakuliah; ?> - SKS <?php echo $j->sks; ?> </option>
                   <?php } ?>
                  </select>
                </div>

                <div class="form-group">
                  <label style="color: gray;" for="ta">Tahun Ajaran</label>
                  <select name="ta" id="ta" class="form-control" required="">
                    <option> --Pilih Tahun Ajaran-- </option>
                    <?php ;
                    foreach($ta as $t) { ?>
                    <option value="<?php echo $t->id_ta; ?>"><?php echo $t->ta.' '.$t->smt; ?></option>
                   <?php } ?>
                  </select>
                </div>

                <div class="form-group">
                  <label style="color: gray;" for="dosen">Dosen</label>
                  <select name="dosen" id="dosen" class="form-control" required="">
                    <option> --Pilih Dosen-- </option>
                    <?php $dosen = $this->M_dosen->getData()->result();
                    foreach($dosen as $d) { ?>
                    <option value="<?php echo $d->id_dosen; ?>"><?php echo $d->nama_dosen; ?></option>
                   <?php } ?>
                  </select>
                </div>
                

                <div class="form-group">
                  <label style="color: gray;" for="hari">Hari</label>
                  <select class="form-control" name="hari" required="">
                    <option>--Pilih Hari--</option>
                    <option value="Senin"> Senin </option>
                    <option value="Selasa"> Selasa </option>
                    <option value="Rabu"> Rabu </option>
                    <option value="Kamis"> Kamis </option>
                    <option value="Jumat"> Jumat </option>
                    <option value="Sabtu"> Sabtu </option>
                    <option value="Minggu"> Minggu </option>
                  </select>
                </div>
                
                <div class="form-group">
                  <label style="color: gray;" for="jam">Jam</label>
                  <input type="text" name="jam" id="jam" class="form-control" placeholder="ex: 08.00 - 10.00" required="">
                </div>

                <div class="form-group">
                  <label style="color: gray;" for="ruangan">Ruangan</label>
                  <input type="text" name="ruangan" id="ruangan" class="form-control" placeholder="ex: Lab 001" required="">
                </div>
            </div>
              <!-- /.box-body -->
            
          </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-outline">Save changes</button>
              </div>
              </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
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



