    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-xs-12">
          <?php echo $this->session->flashdata('pesan'); ?>
            <div class="box">
                <div class="box-header">
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-info">
                        <i class="fa fa-plus"></i> Add Matakuliah
                    </button>   
                </div>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped" style="font-size:13px;">
                        <thead>
                            <th>No</th>
                            <th>Kode Matkul</th>
                            <th>Matakuliah</th>
                            <th>Semester</th>
                            <th>SKS</th>
                            <th>Jurusan</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                          <?php $i = 1; 
                           foreach($matkul as $row) { ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $row->id_matkul; ?></td>
                                <td><?php echo $row->matakuliah; ?></td>
                                <td><?php echo $row->semester; ?></td>
                                <td><?php echo $row->sks; ?></td>
                                <td><?php echo $row->jurusan; ?></td>
                                <td>
                                    <a title="Update Matakuliah" href="<?php echo base_url('admin/Matakuliah/update/'.$row->id_matkul); ?>" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                    <a title="Delete Data" href="<?php echo base_url('admin/Matakuliah/delete/'.$row->id_matkul); ?>" onclick="return confirm('Yakin Akan Di Hapus??');" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
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



    <!-- Modals Data Matakuliah -->
    <div class="modal modal-info fade" id="modal-info">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Data Matakuliah</h4>
              </div>
              <div class="modal-body">
              <div class="box box-primary">
            <!-- form start -->
            <form role="form" method="post" action="<?php echo base_url('admin/Matakuliah/add'); ?>">
              <div class="box-body">
                <div class="form-group">
                  <label style="color: gray;" for="kd_matkul">Kode Matkul</label>
                  <input type="text"  name="id_matkul" class="form-control" id="id_matkul" placeholder="Masukan Kode Matkul" required="">
                </div>
                <div class="form-group">
                  <label style="color: gray;" for="matakuliah">Matakuliah</label>
                  <input type="text" name="matakuliah" class="form-control" id="matakuliah" placeholder="Masukan Nama Matakuliah" required="">
                </div>
                  <div class="form-group">
                    <label style="color: gray;" for="sks">SKS</label>
                    <select class="form-control" name="sks" required="">
                      <option>--Pilih SKS--</option>
                      <option value="1"> 1 </option>
                      <option value="2"> 2 </option>
                      <option value="3"> 3 </option>
                      <option value="4"> 4 </option>
                      <option value="5"> 5 </option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label style="color: gray;" for="semester">Semester</label>
                    <select class="form-control" name="semester" required="">
                      <option>--Pilih Semester--</option>
                      <option value="1"> 1 </option>
                      <option value="2"> 2 </option>
                      <option value="3"> 3 </option>
                      <option value="4"> 4 </option>
                      <option value="5"> 5 </option>
                      <option value="6"> 6 </option>
                      <option value="7"> 7 </option>
                      <option value="8"> 8 </option>
                    </select>
                  </div>               
                <div class="form-group">
                  <label style="color: gray;" for="jurusan">Jurusan</label>
                  <select class="form-control" name="jurusan" required="">
                    <option>--Pilih Jurusan--</option>
                    <?php $jurusan = $this->db->get('jurusan')->result(); 
                    foreach($jurusan as $jrs) { ?>
                    <option value="<?php echo $jrs->id_jurusan ?>"><?php echo $jrs-> jurusan; ?></option>
                    <?php } ?>
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



