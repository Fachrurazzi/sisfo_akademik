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


                <div class="col-md-12">
                  <table id='data-table' class='table table-bordered table-sm'> 
                    <thead> 
                      <tr> 
                        <th colspan='1' class='text-center'>Nama</th> 
                        <th colspan='2' class='text-center'>Absensi</th> 
                      </tr> 

                      <tr> 
                        <th class='text-center'></th> 
                        <th class='text-center'>Hadir</th> 
                        <th class='text-center'>Tidak Hadir</th> 
                      </tr> 
                    </thead> 
                    
                    <tbody id="add_form"></tbody>
                  </table>
                </div>

                <input type="hidden" id="jumlah_form" value="1">
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-success">Simpan Absensi</button>
                  </div>
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
      $("#add_form").append("<b>Mahasiswa " + nextform + " :</b>" +
        "<tr>" +
        "<td class='text-center'><input type='text' name='nama[]' class='form-control' readonly></td>" +
        "<td class='text-center'><input type='radio' name='nama[]' class='form-check-input'></td>" +
        "<td class='text-center'><input type='radio' name='nama[]' class='form-check-input'></td>" +
        "</tr>");
      
      $("#jumlah_form").val(nextform);         
            })
    </script>



