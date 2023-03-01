    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-3">
                <img style="width: 170px;" src="<?php echo base_url('assets/img/uploads/'.$mhs['photo']) ?>">
            </div>
            <div class="col-md-9">
                <table>
                    <tr>
                        <th style="width: 200px;"><h3>Jurusan</h3></th>
                        <th style="width: 20px;"> : </th>
                        <th><h3><?php echo $mhs['jurusan']; ?></h3></th>
                    </tr>
                    <tr>
                        <th><h3>Nama Lengkap</h3></th>
                        <th> : </th>
                        <th><h3><?php echo $mhs['nama_mhs']; ?> <?php echo $mhs['nama_kepanjangan']; ?></h3></th>
                    </tr>
                    <tr>
                        <th><h3>Semester</h3></th>
                        <th> : </th>
                        <th><h3><?php echo $mhs['semester']; ?></h3></th>
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
                <a title="" href="<?php echo base_url('mahasiswa/khs/print/'.$mhs['id_mahasiswa']); ?>" class="btn btn-success" target="_blank"><i class="fa fa-print"></i> Cetak</a>
                </div>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped" style="font-size:13px;">
                        <thead>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Matakuliah</th>
                            <th>SKS</th>
                            <th>Nilai</th>
                            <th>Bobot</th>
                        </thead>
                        <tbody>
                          <?php
                           $sks = 0;
                           $total_bobt = 0;
                           $total_all = 0;
                           $i=1;
                          foreach($khs as $row ) { 
                             $sks = $sks + $row->sks; ?>
                            <tr>

                                <td><?php echo $i++; ?></td>
                                <td><?php echo $row->id_matkul; ?></td>
                                <td><?php echo $row->matakuliah; ?></td>
                                <td><?php echo $row->sks; ?></td>
                                <td><?php echo $row->nilai; ?></td>
                                <td>
                                    <?php 
                                        if($row->nilai == 'A'){
                                            echo $bobot = 4;
                                        }elseif($row->nilai == 'B'){
                                            echo $bobot = 3;
                                        }elseif($row->nilai == 'C'){
                                            echo $bobot = 2;
                                        }elseif($row->nilai == 'D'){
                                            echo $bobot = 1;
                                        }else{
                                            echo $bobot = 0;
                                        }

                                        $total_bobot = $row->sks * $bobot;
                                        $total_all += $total_bobot;
                                        $ipk = $total_all / $sks;

                                    ?>
                                </td>
                          </tr>
                          <?php } ?>
                     </tbody>
                </table>
            </div>
            <p>
                <b>Jumlah SKS : <?php echo $sks; ?></b>
            </p>
            <p>
                <b>IP : <?php echo number_format($ipk, 2); ?></b>
            </p>
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





