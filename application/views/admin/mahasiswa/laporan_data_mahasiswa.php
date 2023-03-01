    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row justify-content-center">
        <div class="col-md-6">
          <?php echo $this->session->flashdata('pesan'); ?>
            <div class="box">
              <div class="box-body">
                <form role="form" method="post" action="<?php echo base_url('admin/Mahasiswa/laporan_data_mahasiswa_by_kelas'); ?>" target="_blank">  
                  <div class="form-group">
                    <label style="color: gray;" for="ruangan">Kelas</label>
                    <select class="form-control" name="kelas">
                      <option>--Pilih Kelas--</option>
                      <?php 
                      foreach($kelas as $row) { ?>
                      <option value="<?php echo $row->ruangan; ?>"> <?php echo $row->ruangan; ?></option>
                      <?php } ?>
                    </select>
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
        })
    </script>



