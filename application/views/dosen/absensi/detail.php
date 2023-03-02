    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-3">
            <img style="width: 170px;" src="">
        </div>
        <div class="col-md-9">
            <table>
                <?php $i = 0; foreach($dataMahasiswa as $dm) : ?>
                    <?php if ($i == 0) : ?>
                <tr>
                    <th style="width: 200px;"><h3>Kelas</h3></th>
                    <th style="width: 20px;"> : </th>
                    <th><h3><?php echo $dm->kelas; ?></h3></th>
                </tr>
                <tr>
                    <th style="width: 200px;"><h3>Tanggal</h3></th>
                    <th style="width: 20px;"> : </th>
                    <th><h3><?php echo format_hari_tanggal($dm->tanggal); ?></h3></th>
                </tr>
                <?php endif; ?>
                <?php $i++; ?>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
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
                            <th>Nama</th>
                            <th>Absensi</th>
                        </thead>
                        <tbody>
                            <?php $no = 1; foreach($dataMahasiswa as $dm) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $dm->nama; ?></td>
                                <td><?= $dm->absen == 1 ? 'Hadir' : 'Tidak Hadir'; ?></td>
                            </tr>
                            <?php endforeach; ?>
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



