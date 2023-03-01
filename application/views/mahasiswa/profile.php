<section class="content">

      <div class="row">
        
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <?php if($mahasiswa['photo'] == NULL) { ?>
                <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url('assets/img/default.jpg'); ?>" alt="User profile picture">
               <?php }else{ ?> 
              <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url('assets/img/uploads/'.$mahasiswa['photo']); ?>" alt="User profile picture">
                <?php } ?>
                <form method="post" action="<?php echo base_url('mahasiswa/profile/updatePhoto'); ?>" enctype="multipart/form-data">
                <?php if($mahasiswa['nama_kepanjangan']  == '') : ?>
                  <h3 class="profile-username text-center"><?php echo $mahasiswa['nama_mhs'] ?></h3>
                  
                  <?php else : ?>
                    <h3 class="profile-username text-center"><?php echo $mahasiswa['nama_kepanjangan']; ?></h3>
                  <?php endif; ?>
              

              <p class="text-muted text-center"><?php echo $mahasiswa['nim']?></p>
                <input type="hidden" name="id_mahasiswa" value="<?php echo $mahasiswa['id_mahasiswa']; ?>">
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
              <h3 class="box-title">Data Detil Mahasiswa</h3>
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
                  <td style="width: 150px;">Jurusan</td>
                  <td style="width: 25px;"> : </td>
                  <td> <?php echo $mahasiswa['jurusan']; ?></td>
                </tr>
                <tr>
                  <td style="width: 150px;">NIM</td>
                  <td style="width: 25px;"> : </td>
                  <td> <?php echo $mahasiswa['nim']; ?></td>
                </tr>
                <tr>
                  <td style="width: 150px;">Nama Lengkap</td>
                  <td style="width: 25px;"> : </td>
                  <td><?php echo $mahasiswa['nama_kepanjangan']; ?></td>  
                </tr>
                <tr>
                  <td style="width: 150px;">Jenis Kelamin</td>
                  <td style="width: 25px;"> : </td>
                  <td> <?php echo $mahasiswa['jk']; ?></td>  
                </tr>
                <tr>
                  <td style="width: 150px;">Tempat Lahir</td>
                  <td style="width: 25px;"> : </td>
                  <td> <?php echo $mahasiswa['tempat_lahir']; ?></td>  
                </tr>
                  <td style="width: 150px;">Tanggal Lahir</td>
                  <td style="width: 25px;"> : </td>
                  <td> <?php echo $mahasiswa['tgl_lahir']; ?></td>  
                </tr>
                <tr>
                  <td style="width: 150px;">Alamat</td>
                  <td style="width: 25px;"> : </td>
                  <td> <?php echo $mahasiswa['alamat']; ?></td>
                </tr>
                <tr>
                  <td style="width: 150px;">Email</td>
                  <td style="width: 25px;"> : </td>
                  <td> <?php echo $mahasiswa['email']; ?></td>  
                </tr>
                <tr>
                  <td style="width: 150px;">No Telp/WA</td>
                  <td style="width: 25px;"> : </td>
                  <td> <?php echo $mahasiswa['hp']; ?></td>  
                </tr>
                <tr>
                  <td style="width: 150px;">Nama Ayah</td>
                  <td style="width: 25px;"> : </td>
                  <td> <?php echo $mahasiswa['nama_ayah']; ?></td>  
                </tr>
                <tr>
                  <td style="width: 150px;">Nama Ibu</td>
                  <td style="width: 25px;"> : </td>
                  <td> <?php echo $mahasiswa['nama_ibu']; ?></td>  
                </tr>
                <tr>
                  <td style="width: 150px;">Kartu Keluarga</td>
                  <td style="width: 25px;"> : </td>
                  <td> <?php echo $mahasiswa['nik_kk']; ?></td>
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


    
    <!-- Modals Update Mahasiswa -->
     <div class="modal modal-info fade" id="modal-info">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Update Data Mahasiswa</h4>
              </div>
              <div class="modal-body">
              <div class="box box-primary">

            <!-- form start -->
            <form role="form" method="post" action="<?php echo base_url('mahasiswa/profile/updateAksi'); ?>" >
              <div class="box-body">
                <div class="form-group">

                  <input type="hidden"  name="id_mahasiswa" class="form-control" id="id_mahasiswa" value="<?php echo $mahasiswa['id_mahasiswa']; ?>">
                </div>
                
              
                <div class="form-group">
                  <label style="color: gray;" for="nama_kepanjangan">Nama Kepanjangan</label>
                  <input type="text" name="nama_kepanjangan" class="form-control" id="nama_kepanjangan" placeholder="Masukan Nama Mahasiswa" value="<?php echo $mahasiswa['nama_kepanjangan']; ?>">
                </div>

                <div class="form-group">
                  <label style="color: gray;" for="jk">Jenis Kelamin</label>
                  <select class="form-control" name="jk">
                    <?php $j = $mahasiswa['jk']; ?>
                    <option <?php echo ($j == 'Laki-Laki')? "selected": "" ?>>Laki-Laki</option>
                    <option <?php echo ($j == 'Perempuan')? "selected": "" ?>>Perempuan</option>
                  </select>
                </div>

                <div class="form-group">
                  <label style="color: gray;" for="tempat_lahir">Tempat Lahir</label>
                  <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir"  value="<?php echo $mahasiswa['tempat_lahir']; ?>">
                </div>

                <div class="form-group">
                  <label style="color: gray;" for="tgl_lahir">Tgl Lahir</label>
                  <input type="date" name="tgl_lahir" class="form-control" id="tgl_lahir"  value="<?php echo $mahasiswa['tgl_lahir']; ?>">
                </div>

                <div class="form-group">
                  <label style="color: gray;" for="email">Email</label>
                  <input type="email" name="email" class="form-control" id="email"  value="<?php echo $mahasiswa['email']; ?>">
                </div>

                <div class="form-group">
                  <label style="color: gray;" for="hp">No Telpon</label>
                  <input type="text" name="hp" class="form-control" id="hp"  value="<?php echo $mahasiswa['hp']; ?>">
                </div>

                <div class="form-group">
                  <label style="color: gray;" for="nama_ayah">Nama Ayah</label>
                  <input type="text" name="nama_ayah" class="form-control" id="nama_ayah"  value="<?php echo $mahasiswa['nama_ayah']; ?>">
                </div>

                <div class="form-group">
                  <label style="color: gray;" for="nama_ibu">Nama ibu</label>
                  <input type="text" name="nama_ibu" class="form-control" id="nama_ibu"  value="<?php echo $mahasiswa['nama_ibu']; ?>">
                </div>

                <div class="form-group">
                  <label style="color: gray;" for="nik_kk">NIK Kartu Keluarga</label>
                  <input type="text" name="nik_kk" class="form-control" id="nik_kk"  value="<?php echo $mahasiswa['nik_kk']; ?>">
                </div>

                <div class="form-group">
                  <label style="color: gray;" for="hp_ortu">No Telp Ortu</label>
                  <input type="text" name="hp_ortu" class="form-control" id="hp_ortu"  value="<?php echo $mahasiswa['hp_ortu']; ?>">
                </div>

                <div class="form-group">
                  <label style="color: gray;" for="alamat">Alamat</label>
                  <textarea class="form-control" name="alamat"><?php echo $mahasiswa['alamat']; ?></textarea>
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
                <h4 class="modal-title">Update Password Mahasiswa</h4>
              </div>
              <div class="modal-body">
              <div class="box box-primary">
             <!-- form start -->
            <form role="form" method="post" action="<?php echo base_url('mahasiswa/profile/updatePass'); ?>" >
              <div class="box-body">
                <div class="form-group">

                  <input type="hidden"  name="id_mahasiswa" class="form-control" id="id_mahasiswa" value="<?php echo $mahasiswa['id_mahasiswa']; ?>">
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