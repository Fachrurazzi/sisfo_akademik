    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-xs-12">
          <?php echo $this->session->flashdata('pesan'); ?>
            <div class="box">
                <div class="box-header">
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-info">
                        <i class="fa fa-plus"></i> Add Tahun Akademik
                    </button>   
                </div>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped" style="font-size:13px;">
                        <thead>
                            <th>No</th>
                            <th>Tahun Akademik</th>
                            <th>Semester</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                        <?php $i = 1 ;
                            foreach($ta as $row) { ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $row->ta; ?></td>
                                <td><?php echo $row->smt; ?></td>
                                <td>
                                    <a title="Delete Data" href="<?php echo base_url('admin/Ta/delete/'.$row->id_ta); ?>" onclick="return confirm('Yakin Akan Di Hapus??');" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
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


    <!-- Modals Data Ta -->
    <div class="modal modal-info fade" id="modal-info">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Data Tahun Akademik</h4>
              </div>
              <div class="modal-body">
              <div class="box box-primary">
            <!-- form start -->
            <form role="form" method="post" action="<?php echo base_url('admin/Ta/add') ?>">
              <div class="box-body">
                <div class="form-group">
                  <label style="color: gray;" for="ta">Tahun Akademik</label>
                  <input type="text" name="ta" class="form-control" id="ta" placeholder="2022/2023" required="">
                </div>
                <div class="form-group">
                  <label style="color: gray;" for="smt">Semester</label>
                  <select class="form-control" name="smt">
                    <option>--Pilih Semester--</option>
                    <option value="Ganjil"> Ganjil </option>
                    <option value="Genap"> Genap </option>
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



