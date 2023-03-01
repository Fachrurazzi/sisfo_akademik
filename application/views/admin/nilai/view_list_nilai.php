    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-3">
                <img style="width: 170px;" src="">
            </div>
            <div class="col-md-9">
                <table>
                    <tr>
                        <th style="width: 200px;"><h3>Jurusan</h3></th>
                        <th style="width: 20px;"> : </th>
                        <th><h3><?php echo $detil['jurusan']; ?></h3></th>
                    </tr>
                    <tr>
                        <th><h3>Semester</h3></th>
                        <th> : </th>
                        <th><h3><?php echo $detil['semester']; ?></h3></th>
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

                </div>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped" style="font-size:13px;">
                        <thead>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Matakuliah</th>
                            <th>SKS</th>
                            <th>Dosen</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                          <?php $i=1;
                          foreach($matkul as $row ) { ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $row->id_matkul; ?></td>
                                <td><?php echo $row->matakuliah; ?></td>
                                <td><?php echo $row->sks; ?></td>
                                <td><?php echo $row->nama_dosen; ?></td>
                                <td>
                                    <a title="Input Nilai" href="<?php echo base_url('admin/nilai/input/'.$row->id_matkul); ?>" class="btn btn-sm btn-primary" ><i class="fa fa-edit"></i></a>
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





