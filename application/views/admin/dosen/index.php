    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-xs-12">
          <?php echo $this->session->flashdata('pesan'); ?>
            <div class="box">
                <div class="box-header">
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-info">
                        <i class="fa fa-plus"></i> Add Dosen
                    </button>   
                </div>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped" style="font-size:13px;">
                        <thead>
                            <th>No</th>
                            <th>NIK</th>
                            <th>Nama Lengkap</th>
                            <th>Jenis Kelamin</th>
                            <th>No.Telp/WhatsApp</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                            <?php $i=1;
                            foreach($dosen as $row) { ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $row->nik; ?></td>
                                <td><?php echo $row->nama_dosen; ?></td>
                                <td><?php echo $row->jk; ?></td>
                                <td><?php echo $row->hp; ?></td>
                                <td>
                                    <a title="Detil Dosen" href="<?php echo base_url('admin/Dosen/detil/'.$row->id_dosen); ?>" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></a>
                                    <a title="Delete Data" href="<?php echo base_url('admin/Dosen/delete/'.$row->id_dosen); ?>" onclick="return confirm('Yakin Akan Di Hapus??');" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                    <a title="Print Data Dosen" href="<?php echo base_url('admin/Dosen/print/'.$row->id_dosen); ?>" class="btn btn-sm btn-success"><i class="fa fa-print"></i></a>
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


    <!-- Modals Data Dosen -->
    <div class="modal modal-info fade" id="modal-info">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Data Dosen</h4>
              </div>
              <div class="modal-body">
              <div class="box box-primary">
            <!-- form start -->
            <form role="form" method="post" action="<?php echo base_url('admin/Dosen/add');  ?>" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label style="color: gray;" for="nim">NIK</label>
                  <input type="text"  name="nik" class="form-control" id="nik" placeholder="Masukan NIK">
                </div>
                <div class="form-group">
                  <label style="color: gray;" for="nama">Nama Dosen</label>
                  <input type="text" name="nama_dosen" class="form-control" id="nama_dosen" placeholder="Masukan Nama Dosen">
                </div>

                <div class="form-group">
                  <label style="color: gray;" for="password">Password</label>
                  <input class="form-control" type="password" name="password" placeholder="masukan password" required="">
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



