    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row justify-content-center">
        <div class="col-xs-6">
          <?php echo $this->session->flashdata('pesan'); ?>
            <div class="box">
                <div class="box-body">
                <form role="form" method="post" action="<?php echo base_url('admin/Jadwal/print_jadwal'); ?>" target="_blank">
                    <div class="form-group">
                        <label style="color: gray;" for="jurusan">Jurusan</label>
                        <select class="form-control" name="jurusan">
                        <option>--Pilih Jurusan--</option>
                        <?php 
                        foreach($jurusan as $row) { ?>
                        <option value="<?php echo $row->id_jurusan; ?>"> <?php echo $row->jurusan; ?></option>
                        <?php } ?>
                        </select>
                    </div> 

                    <div class="form-group">
                        <label style="color: gray;" for="semester">Semester</label>
                        <select class="form-control" name="semester">
                            <option>--Pilih Semester--</option>
                            <option value="1"> Semester 1</option>
                            <option value="2"> Semester 2</option>
                            <option value="3"> Semester 3</option>
                            <option value="4"> Semester 4</option>
                            <option value="5"> Semester 5</option>
                            <option value="6"> Semester 6</option>
                            <option value="7"> Semester 7</option>
                            <option value="8"> Semester 8</option>
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
                    </div>
    </section>
    <!-- /.content -->      

    <!-- jQuery 3 -->
    <script type="text/javascript" src="<?php echo base_url()  ?>assets/bower_components/jquery/dist/jquery.min.js"></script>



