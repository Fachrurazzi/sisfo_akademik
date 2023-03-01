<section class="content">

      <div class="row">
        <div class="col-md-3">
          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
                <form method="post" action="<?php echo base_url('admin/Admin/updatePhoto/'.$admin['id_admin']); ?>" enctype="multipart/form-data">
              <?php if($admin['photo'] == NULL) { ?>
                <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url('assets/img/default.jpg'); ?>" alt="User profile picture">
               <?php }else{ ?> 
              <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url('assets/img/uploads/'.$admin['photo']); ?>" alt="User profile picture">
                <?php } ?>
              <h3 class="profile-username text-center"><?php echo $admin['username'] ?></h3>

              <p class="text-muted text-center"><?php echo $admin['email']?></p>

              <input type="file" name="photo" class="form-control" placeholder="Update Photo" required="">
              <button type="sumbit" class="btn btn-primary btn-block">Update Photo</button>
              </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
                <div class="row">
                    <div class="col-md-6">
                    <h3 class="box-title">Data Detil Admin</h3>
                    </div>
                    <div class="col-md-6">
                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal-info"> Update Username
                        </button>
                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal-pass"> Update Password
                        </button>
                        <a href="<?php echo base_url('admin/Admin'); ?>" class="btn btn-sm btn-warning"> Kembali </a>
                    </div>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-striped">
              <tr>
                  <td style="width: 150px;">Username</td>
                  <td style="width: 25px;"> : </td>
                  <td> <?php echo $admin['username']; ?></td>
                </tr>
                <tr>
                  <td>Email</td>
                  <td> : </td>
                  <td> <?php echo $admin['email']; ?></td>  
                </tr>
                <tr>
                  <td>Password</td>
                  <td> : </td>
                  <td> <?php echo $admin['password']; ?></td>  
                </tr>
                <tr>
                  <td>Level</td>
                  <td> : </td>
                  <td> <?php echo $admin['level']; ?></td>  
                </tr>
                <td>Tanggal Registrasi</td>
                  <td> : </td>
                  <td> <?php echo $admin['created_at']; ?></td>
                </tr>
              </table>
              <br>
              <hr>
            
            </div>
            
            <!-- /.box-body -->
          </div><br>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->


    </section>

    <!-- Modals Data update Admin -->
        <div class="modal modal-info fade" id="modal-info">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Update Data Admin</h4>
              </div>
              <div class="modal-body">
              <div class="box box-primary">
            <!-- form start -->
            <form role="form" method="post" action="<?php echo base_url('admin/Admin/updateUser/'. $admin['id_admin']); ?>" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label style="color: gray;" for="username">Username</label>
                  <input type="text"  name="username" class="form-control" id="username" placeholder="Masukan Username" value="<?php echo $admin['username']; ?>">
                </div>
                <div class="form-group">
                  <label style="color: gray;" for="email">Email</label>
                  <input type="email" name="email" class="form-control" id="email" placeholder="Masukan Email" value="<?php echo $admin['email']; ?>"> 
                </div>
            </div>
              <!-- /.box-body -->
            
          </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-outline">Update</button>
              </div>
              </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

    <!-- Modals Data update Password -->
    <div class="modal modal-info fade" id="modal-pass">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Update Password Admin</h4>
              </div>
              <div class="modal-body">
              <div class="box box-primary">
            <!-- form start -->
            <form role="form" method="post" action="<?php echo base_url('admin/Admin/updatePass/'. $admin['id_admin']); ?>" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label style="color: gray;" for="password">Password</label>
                  <input type="password"  name="password" class="form-control" id="password" placeholder="Masukan Password Baru">
                </div>
            </div>
              <!-- /.box-body -->
            
          </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-outline">Update</button>
              </div>
              </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->