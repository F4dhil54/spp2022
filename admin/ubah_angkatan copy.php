<?php
include "header.php";
?>

  <?php 
    include "koneksi.php";
    $qry_get_siswa=mysqli_query($conn,"select * from angkatan where id_angkatan = '".$_GET['id_angkatan']."'");
    $dt_siswa=mysqli_fetch_array($qry_get_siswa);
    ?>
  <div class="wrapper">
<div id="formContent">      
<h3 align="center">Ubah Angkatan</h3><br>  
<form action="proses_ubah.php" method="post">
<input type="hidden" name="id_ang" value= 
  "<?=$dt_siswa['id_angkatan']?>"> 
        Nama Angkatan :<br>
        <input type="text" name="nama_ang" value="<?=$dt_siswa['nama_angkatan']?>" class="form-control"><br>Nama Tahun Masuk :<br>
        <input type="text" name="tahun" value="<?=$dt_siswa['tahun_masuk']?>" class="form-control"><br>
        <input type="submit" name="angkatan" value="Tambah Angkatan" class="btn btn-primary">
    </form>
        </div>
        </div>         