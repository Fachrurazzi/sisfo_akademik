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
              <h3 class="profile-username text-center"><?php echo $mahasiswa['nama_mhs'] ?> <?php echo $mahasiswa['nama_kepanjangan']; ?></h3>

              <p class="text-muted text-center"><?php echo $mahasiswa['nim']?></p>

              
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
              <h3 class="box-title">Data Detil Mahasiswa</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-striped">
              <tr>
                  <td style="width: 150px;">NIM</td>
                  <td style="width: 25px;"> : </td>
                  <td> <?php echo $mahasiswa['nim']; ?></td>
                </tr>
                <tr>
                  <td>Nama Lengkap</td>
                  <td> : </td>
                  <td> <?php echo $mahasiswa['nama_mhs']; ?> <?php echo $mahasiswa['nama_kepanjangan']; ?></td>  
                </tr>
                <tr>
                  <td>Jenis Kelamin</td>
                  <td> : </td>
                  <td> <?php echo $mahasiswa['jk']; ?></td>  
                </tr>
                <tr>
                  <td>Tempat Lahir</td>
                  <td> : </td>
                  <td> <?php echo $mahasiswa['tempat_lahir']; ?></td>  
                </tr>
                <td>Tanggal Lahir</td>
                  <td> : </td>
                  <td> <?php echo $mahasiswa['tgl_lahir']; ?></td>  
                </tr>
                <tr>
                  <td>Alamat</td>
                  <td> : </td>
                  <td> <?php echo $mahasiswa['alamat']; ?></td>
                </tr>
                <tr>
                  <td>Email</td>
                  <td> : </td>
                  <td> <?php echo $mahasiswa['email']; ?></td>  
                </tr>
                <tr>
                  <td>No Telp/WA</td>
                  <td> : </td>
                  <td> <?php echo $mahasiswa['hp']; ?></td>  
                </tr>
                <tr>
                  <td>Nama Ayah</td>
                  <td> : </td>
                  <td> <?php echo $mahasiswa['nama_ayah']; ?></td>  
                </tr>
                <tr>
                  <td>Nama Ibu</td>
                  <td> : </td>
                  <td> <?php echo $mahasiswa['nama_ibu']; ?></td>  
                </tr>
                <tr>
                  <td>Kartu Keluarga</td>
                  <td> : </td>
                  <td> <?php echo $mahasiswa['nik_kk']; ?></td>
                </tr>
              </table>
              <br>
              <hr>
            <a href="<?php echo base_url('admin/Mahasiswa'); ?>" class="btn btn-sm btn-warning"> Kembali </a>
            </div>
            
            
            <!-- /.box-body -->
          </div><br>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>