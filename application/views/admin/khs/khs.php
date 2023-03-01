    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-xs-12">
          <?php echo $this->session->flashdata('pesan'); ?>
            <div class="box">
                <div class="box-header">
                </div>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped" style="font-size:13px;">
                        <thead>
                            <th>No</th>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Program Studi</th>
                            <th>Tahun Ajar</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                          <?php $i=1;
                          foreach($getAllKHS as $row ) { ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $row['nim']; ?></td>
                                <td><?php echo $row['nama_mhs']; ?></td>
                                <td><?php echo $row['jurusan']; ?></td>
                                <td><?php echo $row['tahun_ajar']; ?></td>
                                <td>
                                    
                                <a title="Hapus KRS" href="<?php echo base_url('admin/khs/print/').$row['id_mahasiswa']; ?>" class="btn btn-sm btn-success" target="_blank"><i class="fa fa-print"></i></a>

                                </td>
                          </tr>
                          <?php } ?>
                     </tbody>
                </table>
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





