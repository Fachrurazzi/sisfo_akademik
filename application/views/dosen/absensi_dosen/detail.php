<section class="content">

      <div class="row justify-content-center">
        
        <!-- /.col -->
        <div class="col-md-8">
          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Data Detail Absen Dosen</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-striped">
                <tr>
                  <td style="width: 150px;">TANGGAL</td>
                  <td style="width: 25px;"> : </td>
                  <td> <?php echo format_hari_tanggal($absensi['tanggal']); ?></td>
                </tr>
                <tr>
                  <td style="width: 150px;">MATA KULIAH</td>
                  <td style="width: 25px;"> : </td>
                  <td> <?php echo $absensi['mata_kuliah']; ?></td>
                </tr>
                <tr>
                  <td style="width: 150px;">DOSEN PENGAMPU</td>
                  <td style="width: 25px;"> : </td>
                  <td><?php echo $absensi['nama']; ?></td>  
                </tr>
                <tr>
                  <td style="width: 150px;">KEHADIRAN</td>
                  <td style="width: 25px;"> : </td>
                  <td> <?php echo $absensi['absensi'] == 1 ? 'Hadir' : 'Tidak Hadir'; ?></td>  
                </tr>
                <tr>
                  <td style="width: 150px;">JUDUL</td>
                  <td style="width: 25px;"> : </td>
                  <td> <?php echo $absensi['title']; ?></td>  
                </tr>
                <tr>
                  <td style="width: 150px;">KETERANGAN</td>
                  <td style="width: 25px;"> : </td>
                  <td> <?php echo $absensi['keterangan']; ?></td>  
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