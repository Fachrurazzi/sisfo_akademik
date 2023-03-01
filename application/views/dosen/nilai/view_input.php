    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-3">
                <img style="width: 170px;" src="">
            </div>
            <div class="col-md-9">
                <table>
                    <tr>
                        <th style="width: 200px;"><h3>Matakuliah</h3></th>
                        <th style="width: 20px;"> : </th>
                        <th><h3><?php echo $matkul['matakuliah'] ?></h3></th>
                    </tr>
                    <tr>
                        <th><h3>Semester</h3></th>
                        <th> : </th>
                        <th><h3><?php echo $matkul['semester'] ?></h3></th>
                    </tr>
                </table>
            </div>
        </div>
        <br><br>
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-xs-12">
          <?php echo $this->session->flashdata('pesan'); ?>
            <div class="box">
                <div class="box-header">
                    <h3>Data Input Nilai Mahasiswa</h3>
                </div>
                <div class="box-body">
                    <form method="post" action="<?php echo base_url('dosen/nilai/input_nilai_aksi/'. $matkul['id_matkul']); ?>">
                        <table id="example1" class="table table-bordered table-striped" style="font-size:13px;">
                        <thead>
                            <th>No</th>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Nilai</th>
                        </thead>
                        <tbody>
                            <?php 
                            $i = 1;
                            foreach($mahasiswa as $row) { ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $row->nim; ?></td>
                                <td><?php echo $row->nama_kepanjangan; ?></td>
                                <td>
                                    <input type="hidden" name="id_krs[]" value="<?php echo $row->id_krs; ?>">
                                    <input style="width: 40px;" name="nilai[]" value="<?php echo $row->nilai; ?>">
                                </td>
                          </tr>
                          <?php $jurusan = $row->id_jurusan; ?>
                            <?php } ?>
                        </tbody>
                        </table>
                        <br>
                        <p align="center">
                        <a  href="<?php echo base_url('dosen/Nilai/getMatkul/'.$jurusan); ?>" class="btn btn-warning"> Kembali</a>
                        <button class="btn btn-primary" type="submit">Simpan</button>
                        </p>
                    </form>
            </div>
         </div>
     </div>
      </div>
    </section>
    <!-- /.content -->


    <br><br><br><br><br><br>
    <br><br><br><br><br><br>
    <br><br><br><br><br><br>
    <br><br><br><br><br><br>
    <br><br><br><br><br><br>



    <!-- jQuery 3 -->
    <script type="text/javascript" src="<?php echo base_url()  ?>assets/bower_components/jquery/dist/jquery.min.js"></script>

    <script type="text/javascript">
        $(function () { 
            $('#example1').DataTable()
        })
    </script>





