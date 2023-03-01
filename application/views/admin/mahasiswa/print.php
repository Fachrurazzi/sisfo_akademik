<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- Data Tables --> 
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">


  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Profile Image -->
  <div class="box box-primary">
            <div class="box-body box-profile">
              <?php if($mahasiswa['photo'] == NULL) { ?>
                <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url('assets/img/default.jpg'); ?>" alt="User profile picture">
               <?php }else{ ?> 
              <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url('assets/img/uploads/'.$mahasiswa['photo']); ?>" alt="User profile picture">
                <?php } ?>
              <h3 class="profile-username text-center"><?php echo $mahasiswa['nama_mhs'] ?> <?php echo $mahasiswa['nama_kepanjangan']; ?></h3>

              <p class="text-muted text-center"><?php echo $mahasiswa['nim']?></p>

              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">BIODATA</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-striped">
              <tr>
                  <td style="width: 150px;">NIM</td>
                  <td style="width: 25px;"> : </td>
                  <td> <?php echo $mahasiswa['nim']; ?></td>
                </tr>
                <tr>
                  <td>Nama Lengkap</td>
                  <td> : </td>
                  <td> <?php echo $mahasiswa['nama_mhs']; ?> <?php echo $mahasiswa['nama_kepanjangan']; ?></td>  
                </tr>
                <tr>
                  <td>Jenis Kelamin</td>
                  <td> : </td>
                  <td> <?php echo $mahasiswa['jk']; ?></td>  
                </tr>
                <tr>
                  <td>Tempat Lahir</td>
                  <td> : </td>
                  <td> <?php echo $mahasiswa['tempat_lahir']; ?></td>  
                </tr>
                <td>Tanggal Lahir</td>
                  <td> : </td>
                  <td> <?php echo $mahasiswa['tgl_lahir']; ?></td>  
                </tr>
                <tr>
                  <td>Alamat</td>
                  <td> : </td>
                  <td> <?php echo $mahasiswa['alamat']; ?></td>
                </tr>
                <tr>
                  <td>Email</td>
                  <td> : </td>
                  <td> <?php echo $mahasiswa['email']; ?></td>  
                </tr>
                <tr>
                  <td>No Telp/WA</td>
                  <td> : </td>
                  <td> <?php echo $mahasiswa['hp']; ?></td>  
                </tr>
                <tr>
                  <td>Nama Ayah</td>
                  <td> : </td>
                  <td> <?php echo $mahasiswa['nama_ayah']; ?></td>  
                </tr>
                <tr>
                  <td>Nama Ibu</td>
                  <td> : </td>
                  <td> <?php echo $mahasiswa['nama_ibu']; ?></td>  
                </tr>
                <tr>
                  <td>Kartu Keluarga</td>
                  <td> : </td>
                  <td> <?php echo $mahasiswa['nik_kk']; ?></td>
                </tr>
              </table>
              <br>
              <hr>


<script type="text/javascript">
    window.print();
</script>