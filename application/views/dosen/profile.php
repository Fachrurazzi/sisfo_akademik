<section class="content">

      <div class="row">
        
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <?php if($dosen['photo'] == NULL) { ?>
                <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url('assets/img/default.jpg'); ?>" alt="User profile picture">
               <?php }else{ ?> 
              <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url('assets/img/uploads/'.$dosen['photo']); ?>" alt="User profile picture">
                <?php } ?>
                <form method="post" action="<?php echo base_url('dosen/profile/updatePhoto'); ?>" enctype="multipart/form-data">
                <?php if($dosen['nama_dosen']  == '') : ?>
                  <h3 class="profile-username text-center"><?php echo $dosen['nama_dosen'] ?></h3>
                
                  <?php else : ?>
                    <h3 class="profile-username text-center"><?php echo $dosen['nama_dosen']; ?></h3>
                  <?php endif; ?>
              

              <p class="text-muted text-center"><?php echo $dosen['nik']?></p>
                <input type="hidden" name="id_dosen" value="<?php echo $dosen['id_dosen']; ?>">
                <input type="file" class="form-control" name="photo" required="">

              <button type="submit" class="btn btn-primary btn-block">Upload</button>
               </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          
        </div>
        <!-- /.col -->
        <div class="col-md-9">
        <?php echo $this->session->flashdata('pesan'); ?>
          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Data Detil Dosen</h3>
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-info">
                        <i class="fa fa-plus"></i> Update Data
            </button>
            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#pass">
                        <i class="fa fa-plus"></i> Update Password
            </button> 
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-striped">
                <tr>
                  <td style="width: 150px;">NIK</td>
                  <td style="width: 25px;"> : </td>
                  <td> <?php echo $dosen['nik']; ?></td>
                </tr>
                <tr>
                  <td style="width: 150px;">Nama Lengkap</td>
                  <td style="width: 25px;"> : </td>
                  <td><?php echo $dosen['nama_dosen']; ?></td>  
                </tr>
                <tr>
                  <td style="width: 150px;">Jenis Kelamin</td>
                  <td style="width: 25px;"> : </td>
                  <td> <?php echo $dosen['jk']; ?></td>  
                </tr>
                <tr>
                  <td style="width: 150px;">Tempat Lahir</td>
                  <td style="width: 25px;"> : </td>
                  <td> <?php echo $dosen['tempat_lahir']; ?></td>  
                </tr>
                  <td style="width: 150px;">Tanggal Lahir</td>
                  <td style="width: 25px;"> : </td>
                  <td> <?php echo $dosen['tgl_lahir']; ?></td>  
                </tr>
                <tr>
                  <td style="width: 150px;">Alamat</td>
                  <td style="width: 25px;"> : </td>
                  <td> <?php echo $dosen['alamat']; ?></td>
                </tr>
                <tr>
                  <td style="width: 150px;">No Telp/WA</td>
                  <td style="width: 25px;"> : </td>
                  <td> <?php echo $dosen['hp']; ?></td>  
                </tr>
                <tr>
                  <td style="width: 150px;">Pendidikan Terakhir</td>
                  <td style="width: 25px;"> : </td>
                  <td> <?php echo $dosen['pendidikan_terakhir']; ?></td>
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


    
    <!-- Modals Update Dosen -->
     <div class="modal modal-info fade" id="modal-info">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Update Data Dosen</h4>
              </div>
              <div class="modal-body">
              <div class="box box-primary">

            <!-- form start -->
            <form role="form" method="post" action="<?php echo base_url('dosen/profile/updateAksi'); ?>" >
              <div class="box-body">
                <div class="form-group">

                  <input type="hidden"  name="id_dosen" class="form-control" id="id_dosen" value="<?php echo $dosen['id_dosen']; ?>">
                </div>
                <div class="form-group">
                  <label style="color: gray;" for="nik">NIK</label>
                  <input type="text" name="nik" class="form-control" id="nik" placeholder="Masukan NIK" value="<?php echo $dosen['nik']; ?>">
                </div>

                <div class="form-group">
                  <label style="color: gray;" for="nama_dosen">Nama Lengkap</label>
                  <input type="text" name="nama_dosen" class="form-control" id="nama_dosen" placeholder="Masukan Nama Dosen" value="<?php echo $dosen['nama_dosen']; ?>">
                </div>

                <div class="form-group">
                  <label style="color: gray;" for="jk">Jenis Kelamin</label>
                  <select class="form-control" name="jk">
                    <?php $j = $dosen['jk']; ?>
                    <option <?php echo ($j == 'Laki-Laki')? "selected": "" ?>>Laki-Laki</option>
                    <option <?php echo ($j == 'Perempuan')? "selected": "" ?>>Perempuan</option>
                  </select>
                </div>

                <div class="form-group">
                  <label style="color: gray;" for="tempat_lahir">Tempat Lahir</label>
                  <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir"  value="<?php echo $dosen['tempat_lahir']; ?>">
                </div>

                <div class="form-group">
                  <label style="color: gray;" for="tgl_lahir">Tgl Lahir</label>
                  <input type="date" name="tgl_lahir" class="form-control" id="tgl_lahir"  value="<?php echo $dosen['tgl_lahir']; ?>">
                </div>

                <div class="form-group">
                  <label style="color: gray;" for="alamat">Alamat</label>
                  <textarea class="form-control" name="alamat"><?php echo $dosen['alamat']; ?></textarea>
                </div>

                <div class="form-group">
                  <label style="color: gray;" for="hp">No Telpon</label>
                  <input type="text" name="hp" class="form-control" id="hp"  value="<?php echo $dosen['hp']; ?>">
                </div>

                <div class="form-group">
                  <label style="color: gray;" for="pendidikan_terakhir">Pendidikan Terakhir</label>
                  <select class="form-control" name="pendidikan_terakhir">
                    <option>--Pilih Pendidikan Terakhir--</option>
                    <?php $s = $dosen['pendidikan_terakhir']; ?>
                    <option <?php echo ($s == 'S1')? "selected": ""?>> S1 </option>
                    <option <?php echo ($s == 'S2')? "selected": ""?>> S2 </option>
                    <option <?php echo ($s == 'S3')? "selected": ""?>> S3 </option>
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

<!-- Modals Update Password -->
<div class="modal modal-info fade" id="pass">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Update Password Dosen</h4>
              </div>
              <div class="modal-body">
              <div class="box box-primary">
             <!-- form start -->
            <form role="form" method="post" action="<?php echo base_url('mahasiswa/profile/updatePass'); ?>" >
              <div class="box-body">
                <div class="form-group">

                  <input type="hidden"  name="id_dosen" class="form-control" id="id_dosen" value="<?php echo $dosen['id_dosen']; ?>">
                </div>

                <div class="form-group">
                  <label style="color: gray;" for="password">Update Password</label>
                  <input type="password" name="password" class="form-control" id="password" placeholder="Masukan Password Baru">
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