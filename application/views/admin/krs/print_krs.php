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
    <title>Laporan KRS</title>
</head>
<body>
<center>
    <table>
        <tr>
             <td>
                <img src="<?php echo base_url('assets/img/logoumbjm.png'); ?>" style="width: 100px;">
            </td>
            <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
            <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
            <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
            <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
            <td>
                <center>
                    <h4>UNIVERSITAS MUHAMMADIYAH</h4>
                    <h4>BANJARMASIN</h4>
                    <h4>FAKULTAS KEPERAWATAN DAN ILMU KESEHATAN</h4>
                    <p>Jalan S. Parman. Kompleks RS Islam Kota Banjarmasin, Kalimantan Selatan</p>
                </center>
            </td>
            <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
            <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
            <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
            <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
            <td>
                <img src="<?php echo base_url('assets/img/logo.png'); ?>" style="width: 120px;">
            </td>        
        </tr>    
    </table>
</center>
<hr width="100%" class="mb-2" style="border: 0; height: 0; border-top: 4px solid black; border-bottom: 4px solid black;">
<br>

<div class="row">
  <div class="col-12">
    <div class="invoice-title">
      <h5 class="text-center m-b-30"><b>KARTU RENCANA STUDI (KRS)</b></h5>   
      <br>
    </div>
  </div>
</div>

<?php 
$tanggal = date('Y-m-d');
$i = 0;
?>

<div class="row">
    <?php foreach ($krs as $s) : ?>
        <?= $nama = '';
            $nim = '';
            $nama = $s['nama'];
            $nim = $s['nim'];
        ?>
    <?php if ($i == 0) : ?>
    <div class="col-12">
        <div class="float-left">
            <p class="mb-2 font-weight-bold">Nama : <?= $s['nama']; ?></p>
            <p class="mb-2 font-weight-bold">NIM : <?= $s['nim']; ?></p>
        </div>

        <div class="float-right">
            <p class="mb-2 font-weight-bold">Program Studi : <?= $s['jurusan']; ?></p>
            <p class="mb-2 font-weight-bold">Tahun Ajar : <?= $s['tahun_ajar'] ?></p>
        </div>
    </div>
    <?php endif; ?>
    <?php $i++; ?>
    <?php endforeach; ?>
</div>

<table class="table table-sm">
    <thead style="background-color: grey;" class="text-center">
        <tr>
            <th>No</th>
            <th>Kode</th>
            <th>Mata Kuliah</th>
            <th>SKS</th>
            <th>Kelas</th>
        </tr>
    </thead>
    <tbody>
    <?php $no = 1; $i = 0; $total = 0;?>
    <?php foreach($krs as $siswa) : ?>
        <?php $total += $siswa['sks']; ?>
        <tr>
            <td class="text-center"><?= $no++; ?></td>
            <td><?= $siswa['kode'];?></td>
            <td><?= $siswa['mata_kuliah'];?></td>
            <td class="text-center"><?= $siswa['sks'];?></td>
            <td><?= $siswa['kelas'];?></td>
        </tr>
    <?php endforeach; ?>
        <tr>
        <td colspan="3" class="text-center">Jumlah SKS</td>
        <td class="text-center"><?= $total; ?></td>
        <td></td>
        </tr>
    </tbody>
</table>
<br>
<div class="row">
  <div class="col-12">
    <div class="float-right">
        <p class="text-center mb-1">Banjarmasin, <?= format_hari_tanggal($tanggal) ?></p>
        <p class="text-center">Ketua Prodi</p><br><br><br>
        <p class="mb-1"><u><b><?= $ketua['nama']; ?></b></u></p>
        <p class="mb-1 text-center"><b>NIDN. <?= $ketua['nik'];?></b></p>
    </div>

    <div class="float-left">
        <p class="text-center mb-1">Banjarmasin, <?= format_hari_tanggal($tanggal) ?></p>
        <p class="text-center">Mahasiswa</p><br><br><br>
        <p class="mb-1 text-center"><u><b><?= $nama; ?></b></u></p>
        <p class="mb-1 text-center"><b><?= $nim; ?></b></p>
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