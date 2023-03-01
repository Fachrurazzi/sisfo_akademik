    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                     
                </div>
                <div class="box-body">
 <!-- form start -->
 <form role="form" method="post" action="<?php echo base_url('admin/Jurusan/updateAksi/'.$jurusan['id_jurusan']); ?>">
              <div class="box-body">
                <div class="form-group">
                  <label style="color: gray;" for="kd_jurusan">Kode Jurusan</label>
                  <input type="text" disabled="" name="id_jurusan" class="form-control" id="kd_jurusan" placeholder="Masukan Kode Jurusan" value="<?php echo $jurusan['id_jurusan']; ?>">
                </div>
                <div class="form-group">
                  <label style="color: gray;" for="jurusan">Jurusan</label>
                  <input type="text" name="jurusan" class="form-control" id="jurusan" placeholder="ex : Teknik Informatika" value="<?php echo $jurusan['jurusan']; ?>">
                </div>

                <div class="form-group">
                  <label style="color: gray;">Singkatan</label>
                  <input type="text" name="singkatan" class="form-control" placeholder="ex : TI" value="<?php echo $jurusan['singkat']; ?>">
                </div>
                <div class="form-group">
                  <label style="color: gray;" for="jenjang">Jenjang</label>
                  <select class="form-control" name="jenjang">
                    <option>--Pilih Jenjang Pendidikan--</option>
                    <?php $p = $jurusan['jenjang']; ?>
                    <option <?php echo ($p == 'D3')? "selected" : "" ?>> D3 </option>
                    <option <?php echo ($p == 'S1')? "selected" : "" ?>> S1 </option>
                    <option <?php echo ($p == 'S2')? "selected" : "" ?>> S2 </option>
                    <option <?php echo ($p == 'S3')? "selected" : "" ?>> S3 </option>
                  </select>
                </div>
                <div class="form-group">
                  <label style="color: gray;" for="akreditasi">Akreditasi</label>
                  <select class="form-control" name="akreditasi">
                    <option>--Pilih Akreditasi--</option>
                    <?php $a = $jurusan['akreditasi'] ?>
                    <option <?php echo ($a == 'A')? "selected" : "" ?>> A </option>
                    <option <?php echo ($a == 'B')? "selected" : "" ?>> B </option>
                    <option <?php echo ($a == 'C')? "selected" : "" ?>> C </option>
                  </select>
                </div>
            </div>
              <!-- /.box-body -->
            
          
              </div>
              <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Update</button>
              <a class= "btn btn-warning" href="<?php echo base_url('admin/Jurusan') ?>">Kembali</a> 
                
              </div>
              </form>
            </div>
         </div>
     </div>
    </div>
</section>
<!-- /.content -->


