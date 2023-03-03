    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row justify-content-center">
        <div class="col-md-12">
          <?php echo $this->session->flashdata('pesan'); ?>
            <div class="box">
              <div class="box-body">
                <form role="form" method="post" action="<?php echo base_url('dosen/AbsensiDosen/save'); ?>">  
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                          <label>Tanggal </label>
                          <div class="input-group date">
                              <div class="input-group-addon">
                                  <i class="fa fa-calendar"></i>
                              </div>
                              <input type="text" class="form-control pull-right" name="tanggal" id="tanggal"> 
                          </div>
                      </div>
                      <div class="form-group">
                        <label for="mata_kuliah">Mata Kuliah</label>

                        <select class="form-control" id="mata_kuliah" name="id_matkul">
                          <option>--Pilih mata Kuliah--</option>
                          <?php foreach ($matkul as $mk) : ?>
                            <option value="<?= $mk->id_matkul ?>" id="kode-<?= $mk->id_matkul ?>" data-id="<?= $mk->id_dosen ?>" data-dosen="<?= $mk->nama_dosen; ?>"><?= $mk->mata_kuliah ?></option>
                          <?php endforeach ; ?>
                        </select>
                      </div>          

                      <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title">
                      </div>    
                      
   
                    </div>

                   

                    <div class="col-md-6">
                    <div class="form-group">
                        <label for="dosen">Dosen</label>
                        <input type="text" class="form-control" id="dosen" name="dosen" readonly>
                        <input type="hidden" class="form-control" id="id_dosen" name="id_dosen">
                      </div>  
                      <div class="form-group">
                        <label for="kelas">Kelas</label>
                        <select class="form-control" name="kelas" id="kelas">
                          <option>--Pilih Kelas--</option>
                          <?php foreach ($kelas as $k) : ?>
                            <option value="<?= $k->kelas ?>" id="kode-<?= $k->kelas ?>" data-total="<?= $k->kelas; ?>"><?= $k->kelas ?></option>
                          <?php endforeach ; ?>
                        </select>
                      </div>        

                      <div class="form-group">
                      <label >Absen</label>
                        <div class="radio">
                          <label>
                            <input type="radio" name="kehadiran" id="optionsRadios1" value="1">
                              Hadir
                          </label>
                        </div>

                        <div class="radio">
                          <label>
                            <input type="radio" name="kehadiran" id="optionsRadios2" value="0">
                              Tidak Hadir
                          </label>
                        </div>
                      </div>
                      
                               
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="">Keterangan</label>
                        <textarea name="keterangan" id="" cols="30" rows="10" class="form-control"></textarea>
                      </div>
                    </div>

                    
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-success"><i class="fa fa-plus-circle"> Simpan Absensi</i></button>
                  </div>
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
              id_dosen = $('#kode-'+this.value).data('id');
              $('#dosen').val(nama_dosen);
              $('#id_dosen').val(id_dosen);
            });
    </script>



