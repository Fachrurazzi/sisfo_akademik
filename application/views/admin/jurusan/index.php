    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-xs-12">
          <?php echo $this->session->flashdata('pesan'); ?>
            <div class="box">
                <div class="box-header">
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-info">
                        <i class="fa fa-plus"></i> Add Jurusan
                    </button>   
                </div>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped" style="font-size:13px;">
                        <thead>
                            <th>No</th>
                            <th>Kode Jurusan</th>
                            <th>Jurusan</th>
                            <th>Jenjang</th>
                            <th>Akreditasi</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                          <?php $i = 1;
                          foreach($jurusan as $row ) { ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $row->id_jurusan; ?></td>
                                <td><?php echo $row->jurusan; ?></td>
                                <td><?php echo $row->jenjang; ?></td>
                                <td><?php echo $row->akreditasi; ?></td>
                                <td>
                                    <a title="Update Jurusan" href="<?php echo base_url('admin/Jurusan/update/'.$row->id_jurusan); ?>" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                    <a title="Delete Data" href="<?php echo base_url('admin/Jurusan/delete/'.$row->id_jurusan); ?>" onclick="return confirm('Yakin Akan Di Hapus??');" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
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


    <!-- Modals Data Jurusan -->
    <div class="modal modal-info fade" id="modal-info">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Data Jurusan</h4>
              </div>
              <div class="modal-body">
              <div class="box box-primary">
            <!-- form start -->
            <form role="form" method="post" action="<?php echo base_url('admin/Jurusan/add') ?>">
              <div class="box-body">
                <div class="form-group">
                  <label style="color: gray;" for="kd_jurusan">Kode Jurusan</label>
                  <input type="text" name="id_jurusan" class="form-control" id="kd_jurusan" placeholder="Masukan Kode Jurusan">
                </div>
                <div class="form-group">
                  <label style="color: gray;" for="jurusan">Jurusan</label>
                  <input type="text" name="jurusan" class="form-control" id="jurusan" placeholder="ex : Teknik Informatika">
                </div>

                <div class="form-group">
                  <label style="color: gray;">Singkatan</label>
                  <input type="text" name="singkatan" class="form-control" placeholder="ex : TI">
                </div>
                <div class="form-group">
                  <label style="color: gray;" for="jenjang">Jenjang</label>
                  <select class="form-control" name="jenjang">
                    <option>--Pilih Jenjang Pendidikan--</option>
                    <option value="D3"> D3 </option>
                    <option value="S1"> S1 </option>
                    <option value="S2"> S2 </option>
                    <option value="S3"> S3 </option>
                  </select>
                </div>
                <div class="form-group">
                  <label style="color: gray;" for="akreditasi">Akreditasi</label>
                  <select class="form-control" name="akreditasi">
                    <option>--Pilih Akreditasi--</option>
                    <option value="A"> A </option>
                    <option value="B"> B </option>
                    <option value="C"> C </option>
                  </select>
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



