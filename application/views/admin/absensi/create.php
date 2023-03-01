    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row justify-content-center">
        <div class="col-md-12">
          <?php echo $this->session->flashdata('pesan'); ?>
            <div class="box">
              <div class="box-body">
                <form role="form" method="post" action="<?php echo base_url('admin/Mahasiswa/laporan_data_mahasiswa_by_kelas'); ?>" target="_blank">  
                  <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                        <label>Tanggal </label>
                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control pull-right" id="datepicker"> 
                        </div>
                    </dsiv>
                  <div class="form-group">
                    <label style="color: gray;" for="ruangan">Jurusan</label>
                    <select class="form-control" name="kelas">
                      <option>--Pilih Kelas--</option>
                      <option value=""> - </option>
                    </select>
                  </div>                    
                  </div>
                  </div>

                <div class="row">

                    <div class="col-md-6">
                    <div class="form-group">
                      <label style="color: gray;" for="ruangan">Kelas</label>
                      <select class="form-control" name="kelas">
                        <option>--Pilih Kelas--</option>
                        <option value=""> - </option>
                      </select>
                    </div>                     
                    </div>
                </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-success">Cetak</button>
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
            $('#datepicker').datepicker({
                autoclose: true    
            })

            //iCheck for checkbox and radio inputs
            $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
                    checkboxClass: 'icheckbox_minimal-blue',
                    radioClass   : 'iradio_minimal-blue'
            })
            //Red color scheme for iCheck
            $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
                    checkboxClass: 'icheckbox_minimal-red',
                    radioClass   : 'iradio_minimal-red'
            })
            //Flat red color scheme for iCheck
            $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
                    checkboxClass: 'icheckbox_flat-green',
                    radioClass   : 'iradio_flat-green'
                })
            })
    </script>



