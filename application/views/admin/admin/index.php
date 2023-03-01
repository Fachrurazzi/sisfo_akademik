    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-xs-12">
          <?php echo $this->session->flashdata('pesan'); ?>
            <div class="box">
                <div class="box-header">
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-info">
                        <i class="fa fa-plus"></i> Add Data Admin
                    </button>   
                </div>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped" style="font-size:13px;">
                        <thead>
                            <th>Photo</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Level</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                            <?php foreach($admin as $row) { ?>
                            <tr>
                                <td>
                                <?php if($row->photo == NULL) { ?>
                                <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url('assets/img/default.jpg'); ?>" alt="User profile picture">
                                <?php }else{ ?> 
                                <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url('assets/img/uploads/'.$row->photo); ?>" alt="User profile picture">
                                <?php } ?>
                                </td>
                                <td><?php echo $row->username; ?></td>
                                <td><?php echo $row->email; ?></td>
                                <td><?php echo $row->password; ?></td>
                                <td><?php echo $row->level; ?></td>
                                <td>
                                    <a title="Detil Admin" href="<?php echo base_url('admin/Admin/detil/'.$row->id_admin); ?>" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></a>
                                    <a title="Delete Data" href="<?php echo base_url('admin/Admin/delete/'.$row->id_admin); ?>" onclick="return confirm('Yakin Akan Di Hapus??');" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
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


    <!-- Modals Data Admin -->
    <div class="modal modal-info fade" id="modal-info">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Data Admin</h4>
              </div>
              <div class="modal-body">
              <div class="box box-primary">
            <!-- form start -->
            <form role="form" method="post" action="<?php echo base_url('admin/Admin/add'); ?>">
              <div class="box-body">
                <div class="form-group">
                  <label style="color: gray;" for="username">Username</label>
                  <input type="text"  name="username" class="form-control" id="username" placeholder="Masukan Username" required="">
                </div>
                <div class="form-group">
                  <label style="color: gray;" for="email">Email</label>
                  <input type="email"  name="email" class="form-control" id="email" placeholder="Masukan Email" required="">
                </div>
                <div class="form-group">
                  <label style="color: gray;" for="password">Password</label>
                  <input type="password" name="password" class="form-control" id="password" placeholder="Masukan Password" required="">
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



