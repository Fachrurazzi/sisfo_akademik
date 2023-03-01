    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row justify-content-center">
        <div class="col-md-12">
          <?php echo $this->session->flashdata('pesan'); ?>
            <div class="box">
              <div class="box-body">
                <form role="form" method="post" action="<?php echo base_url('dosen/Absensi/add_absen'); ?>">  
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                          <label>Tanggal </label>
                          <div class="input-group date">
                              <div class="input-group-addon">
                                  <i class="fa fa-calendar"></i>
                              </div>
                              <input type="text" class="form-control pull-right" name="tanggal[]" id="tanggal"> 
                          </div>
                      </div>
                      <div class="form-group">
                        <label style="color: gray;" for="mata_kuliah">Mata Kuliah</label>

                        <select class="form-control" id="mata_kuliah" name="mata_kuliah[]">
                          <option>--Pilih mata Kuliah--</option>
                          <?php foreach ($matkul as $mk) : ?>
                            <option value="<?= $mk->id_matkul ?>" id="kode-<?= $mk->id_matkul ?>" data-dosen="<?= $mk->nama_dosen; ?>"><?= $mk->mata_kuliah ?></option>
                          <?php endforeach ; ?>
                        </select>
                      </div>                    
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label style="color: gray;" for="dosen">Dosen</label>
                        <input type="text" class="form-control" id="dosen" name="dosen[]" readonly>
                      </div>                     
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label style="color: gray;" for="kelas">Kelas</label>
                        <select class="form-control" name="kelas" id="kelas">
                          <option>--Pilih Kelas--</option>
                          <option>--Pilih mata Kuliah--</option>
                          <?php foreach ($kelas as $k) : ?>
                            <option value="<?= $k->kelas ?>" id="kode-<?= $k->kelas ?>" data-total="<?= $k->kelas; ?>"><?= $k->kelas ?></option>
                          <?php endforeach ; ?>
                        </select>
                      </div>                     
                    </div>
                </div>

                  <div class="form-group text-center">
                    <button type="submit" class="btn btn-success">Absensi Kehadiran</button>
                  </div>


                <div class="col-md-12" id="add_form">
                  <!-- <table id="example1" class="table table-bordered table-striped" style="font-size:13px;">
                    <thead>
                      <tr>
                        <th>Nama</th>
                        <th>Absen</th>
                      </tr>
                    </thead>
                  </table> -->
                </div>

                <input type="hidden" id="jumlah_form" value="1">
              </form>
            </div>
              <!-- /.box-body -->
        </div>
      </div>
        </div>
    </section>
    <!-- /.content -->      

    <!-- jQuery 3 -->
    <script type="text/javascript" src="<?php echo base_url()  ?>assets/bower_components/jquery/dist/jquery.min.js"></script>

    <script type="text/javascript">
        $(function () { 
            $('#example1').DataTable()
            $('#tanggal').datepicker({
                autoclose: true    
              })
            })

            $('#mata_kuliah').change(function() {
              nama_dosen = $('#kode-'+this.value).data('dosen');
              $('#dosen').val(nama_dosen);
            });

            $('#kelas').change(function() {
              var jumlah = parseInt($("#jumlah_form").val());
              var nextform = jumlah + 1; // Tambah 1 untuk jumlah form nya
      $("#add_form").append("<b>Data ke " + nextform + " :</b>" +
        "<table>" +
        "<tr>" +
        "<td>NIS</td>" +
        "<td><input type='text' name='nis[]' required></td>" +
        "</tr>" +
        "<tr>" +
        "<td>Nama</td>" +
        "<td><input type='text' name='nama[]' required></td>" +
        "</tr>" +
        "<tr>" +
        "<td>Telepon</td>" +
        "<td><input type='text' name='telp[]' required></td>" +
        "</tr>" +
        "<tr>" +
        "<td>Alamat</td>" +
        "<td><textarea name='alamat[]' required></textarea></td>" +
        "</tr>" +
        "</table>" +
        "<br><br>");
      
      $("#jumlah_form").val(nextform);         
            })
    </script>



