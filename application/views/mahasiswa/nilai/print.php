<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <style>
            table.table {
                border:1px solid black;
            }
            table.table > thead > tr > th{
                border:1px solid black;
            }
            table.table > tbody > tr > td{
                border:1px solid black;
            }
            @page { size: portrait; }
    </style>       
    <title>Transkrip Nilai</title>
</head>
<body>
<center>
    <table>
        <tr>
             <td>
                <img src="<?php echo base_url('assets/img/logoumbjm.png'); ?>" style="width: 100px;">
            </td>      
        </tr>    
    </table>
</center>
<br>

<div class="row">
  <div class="col-12">
    <div class="invoice-title">
        <u><h5 class="text-center m-b-30"><b>TRANSKRIP NILAI</b></h5> </u>
      <br>
    </div>
  </div>
</div>

<?php 
$tanggal = date('Y-m-d');
$i = 0;
?>

<div class="row">
    <div class="col-12">
        <div class="float-left">
            <p class="mb-2 font-weight-bold">NAMA : <?= $mahasiswa['nama_kepanjangan']; ?></p>
            <p class="mb-2 font-weight-bold">TEMPAT, TANGGAL LAHIR : <?= $mahasiswa['tempat_lahir'].', '.format_hari_tanggal($mahasiswa['tgl_lahir']); ?></p>
            <p class="mb-2 font-weight-bold">NIM : <?= $mahasiswa['nim']; ?></p>
        </div>

        <div class="float-right">
            <p class="mb-2 font-weight-bold">PROGRAM PENDIDIKAN : <?= $mahasiswa['jenjang']; ?></p>
            <p class="mb-2 font-weight-bold">PROGRAM STUDI : <?= $mahasiswa['jurusan'] ?></p>
            <p class="mb-2 font-weight-bold">TANGGAL LULUS/KELUAR : </p>
        </div>
    </div>
</div>

<table class="table table-sm">
    <thead style="background-color: grey;" class="text-center">
        <tr>
            <th>No</th>
            <th>Kode</th>
            <th>Mata Kuliah</th>
            <th>SKS</th>
            <th>Nilai</th>
            <th>Bobot</th>
        </tr>
    </thead>
    <tbody>
    <?php $no = 1; $i = 0; $total_bobot = 0; $sks = 0; $total_all = 0;
    ?>
    <?php foreach($getKhs as $row) : ?>
        <?php 
        $sks += $row->sks; 

        ?>
        <tr>
            <td class="text-center"><?= $no++; ?></td>
            <td><?= $row->id_matkul;?></td>
            <td><?= $row->matakuliah;?></td>
            <td class="text-center"><?= $row->sks;?></td>
            <td><?= $row->nilai;?></td>
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
                    
                ?>
            </td>
        </tr>
    <?php 
    $total_bobot = $row->sks * $bobot;
    $total_all += $total_bobot;
    $ipk = $total_all / $sks;
    endforeach; 
        

    ?>
        <tr>
            <td colspan="3" class="text-center">Jumlah SKS</td>
            <td class="text-center"><?= $sks; ?></td>
            <td colspan="2" class="text-center"><?= $total_all; ?></td>
        </tr>
        <tr>
                    <td colspan="3">INDEKS PRESTASI KOMULATIF</td>
                    <td colspan="3"><?= number_format($ipk, 2) ?></td>
                </tr>
    </tbody>
</table>
<div class="row">
    <div class="container">
        <p>
            <b>Total SKS : <?php echo $sks; ?></b>
        </p>
        <p>
            <b>IPK : <?= number_format($ipk, 2) ?></b>
        </p>
    </div>
</div>
<br>
<div class="row">
  <div class="col-12">
    <div class="float-right">
        <p class="text-center mb-1">Banjarmasin, <?= format_hari_tanggal($tanggal) ?></p>
        <p class="text-center">Ketua Prodi</p><br><br><br>
        <p class="mb-1"><u><b><?= $ketua['nama']; ?></b></u></p>
        <p class="mb-1 text-center"><b>NIDN. <?= $ketua['nik'];?></b></p>
    </div>
</div>
<script>
    window.print();
</script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>