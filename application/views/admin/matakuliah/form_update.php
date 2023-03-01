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
 <form role="form" method="post" action="<?php echo base_url('admin/Matakuliah/updateAksi/'.$matkul['id_matkul']); ?>">
              <div class="box-body">
                <div class="form-group">
                  <label style="color: gray;" for="id_matkul">Kode Matkul</label>
                  <input type="text" disabled="" name="id_matkul" class="form-control" id="id_matkul" value="<?php echo $matkul['id_matkul']; ?>">
                </div>
                <div class="form-group">
                  <label style="color: gray;" for="matakuliah">Matakuliah</label>
                  <input type="text" name="matakuliah" class="form-control" id="matakuliah" placeholder="Masukan Matakuliah" value="<?php echo $matkul['matakuliah']; ?>">
                </div>

                <div class="form-group">
                  <label style="color: gray;" for="semester">Semester</label>
                  <select class="form-control" name="semester">
                  <?php $mk = $matkul['semester']; ?>
                    <option>--Pilih Semester --</option>
                    <option <?php echo ($mk == '1')? "selected" : "" ?>> 1 </option>
                    <option <?php echo ($mk == '2')? "selected" : "" ?>> 2 </option>
                    <option <?php echo ($mk == '3')? "selected" : "" ?>> 3 </option>
                    <option <?php echo ($mk == '4')? "selected" : "" ?>> 4 </option>
                    <option <?php echo ($mk == '5')? "selected" : "" ?>> 5 </option>
                    <option <?php echo ($mk == '6')? "selected" : "" ?>> 6 </option>
                    <option <?php echo ($mk == '7')? "selected" : "" ?>> 7 </option>
                    <option <?php echo ($mk == '8')? "selected" : "" ?>> 8 </option>
                  </select>
                </div>
                <div class="form-group">
                  <label style="color: gray;" for="sks">SKS</label>
                  <select class="form-control" name="sks">
                  <?php $s = $matkul['sks']; ?>
                    <option>--Pilih SKS--</option>
                    <option <?php echo ($s == '1')? "selected" : "" ?>> 1 </option>
                    <option <?php echo ($s == '2')? "selected" : "" ?>> 2 </option>
                    <option <?php echo ($s == '3')? "selected" : "" ?>> 3 </option>
                    <option <?php echo ($s == '4')? "selected" : "" ?>> 4 </option>
                    <option <?php echo ($s == '5')? "selected" : "" ?>> 5 </option>
                  </select>
                </div>
            </div>
              <!-- /.box-body -->
            
          
              </div>
              <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Update</button>
              <a class= "btn btn-warning" href="<?php echo base_url('admin/Matakuliah') ?>">Kembali</a> 
                
              </div>
              </form>
            </div>
         </div>
     </div>
    </div>
</section>
<!-- /.content -->


