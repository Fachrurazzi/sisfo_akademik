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
              <h3 class="profile-username text-center"><?php echo $dosen['nama_dosen'] ?></h3>

              <p class="text-muted text-center"><?php echo $dosen['nik']?></p>
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
                    <h3 class="box-title">Data Detil Dosen</h3>
                    </div>
                    <div class="col-md-6">
                </div>
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
                  <td>Nama Lengkap</td>
                  <td> : </td>
                  <td> <?php echo $dosen['nama_dosen']; ?></td>  
                </tr>
                <tr>
                  <td>Jenis Kelamin</td>
                  <td> : </td>
                  <td> <?php echo $dosen['jk']; ?></td>  
                </tr>
                <tr>
                  <td>Tempat Lahir</td>
                  <td> : </td>
                  <td> <?php echo $dosen['tempat_lahir']; ?></td>  
                </tr>
                <td>Tanggal Lahir</td>
                  <td> : </td>
                  <td> <?php echo $dosen['tgl_lahir']; ?></td>  
                </tr>
                <tr>
                  <td>Alamat</td>
                  <td> : </td>
                  <td> <?php echo $dosen['alamat']; ?></td>
                </tr>
                <tr>
                  <td>No.Telp/WA</td>
                  <td> : </td>
                  <td> <?php echo $dosen['hp']; ?></td>  
                </tr>
                <tr>
                  <td>Pendidikan Terakhir</td>
                  <td> : </td>
                  <td> <?php echo $dosen['pendidikan_terakhir']; ?></td>
                </tr>
              </table>
              <br>
              <hr>
              <a href="<?php echo base_url('admin/Dosen'); ?>" class="btn btn-sm btn-warning"> Kembali </a>
                    </div>
            
            </div>
            
            <!-- /.box-body -->
          </div><br>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->


    </section>



        <!-- Modals Data update Dosen -->
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
            <form role="form" method="post" action="<?php echo base_url('admin/Dosen/update/'.$dosen['id_dosen']);  ?>" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label style="color: gray;" for="nim">NIK</label>
                  <input type="text"  name="nik" class="form-control" id="nik" placeholder="Masukan NIK" value="<?php echo $dosen['nik']; ?>">
                </div>
                <div class="form-group">
                  <label style="color: gray;" for="nama">Nama Lengkap</label>
                  <input type="text" name="nama_dosen" class="form-control" id="nama" placeholder="Masukan Nama Dosen" value="<?php echo $dosen['nama_dosen']; ?>"> 
                </div>

                  <div class="form-group">
                    <label style="color: gray;" for="jk">Jenis Kelamin</label>
                    <select class="form-control" name="jk">
                      <option>--Pilih Jenis Kelamin--</option>
                      <?php $j = $dosen['jk']; ?>
                      <option <?php echo ($j == 'Laki-Laki')? "selected": ""?>> Laki-Laki </option>
                      <option <?php echo ($j == 'Perempuan')? "selected": ""?>> Perempuan </option>
                    </select>
                  </div>
                <div class="form-group">
                  <label style="color: gray;" for="nama">Tempat Lahir</label>
                  <input type="text" name="tempat_lahir" class="form-control" placeholder="Kota/Kabupaten" value="<?php echo $dosen['tempat_lahir']; ?>">
                </div>       
                <div class="form-group">
                  <label style="color: gray;" for="nama">Tanggal Lahir</label>
                  <input type="date" name="tgl_lahir" class="form-control" placeholder="Masukan Tanggal Lahir" value="<?php echo $dosen['tgl_lahir']; ?>">
                </div>
                <div class="form-group">
                  <label style="color: gray;" for="nama">Alamat</label>
                  <textarea name="alamat" class="form-control"><?php echo $dosen['alamat']; ?></textarea>
                </div>
                <div class="form-group">
                  <label style="color: gray;" for="nama">No.Telp/WA</label>
                  <input type="number" name="hp" class="form-control" placeholder="Masukan No Telpon/WA" value="<?php echo $dosen['hp']; ?>">
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
                <button type="submit" class="btn btn-outline">Update</button>
              </div>
              </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->