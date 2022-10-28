<?php
include "header.php";
?>

  <div class="wrapper">
<div id="formContent">
<h3 align="center">Tambah Pembayaran</h3><br> 
 <form action="proses_tambah.php" method="post">
    NISN:<br>
    <input type="number" name="nisn" class="form-control"><br>
        Tahun SPP :<br>
        <input type="text" name="id_spp" value="" class="form-control" placeholder="ex. 2022/2023"><br>
        Angkatan :<br>
        <select name="id_ang" class="form-control">
            <option></option>
            <?php 
            include "koneksi.php";
            $qry_kelas=mysqli_query($conn,"select * from angkatan");
            while($data_kelas=mysqli_fetch_array($qry_kelas)){
                echo '<option value="'.$data_kelas['id_angkatan'].'">'.$data_kelas['nama_angkatan'].'</option>';    
            }
            ?>
        </select><br>
        <label>Jatuh Tempo</label>
        <input type="date" name="jatuh_tempo" class="form-control"><br>
        <input type="submit" name="pembayaran" value="Tambah Data Pembayaran" class="btn btn-primary">
    </form>
        </div>
        </div>
