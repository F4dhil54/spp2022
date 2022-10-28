<?php
include "header.php";
?>

<div class="wrapper">
<div id="formContent">      
<h3 align="center">Tambah Siswa</h3><br>  
<form action="proses_tambah.php" method="post">
    <div>
        
        <label for="" class="nisn"> NISN  <input type="number" name="NISN"></label>
   
        <label for="" class="nis">NIS  <input type="number" name="NIS"></label>

    </div> <br><br><br>  
        nama siswa :<br>
        <input type="text" name="nama_siswa" value="" class="form-control"><br>
        Alamat : <br>
        <textarea name="alamat" class="form-control" rows="4"></textarea><br>
        Nomor Telepon : <br>
        <input type="number" name="telp" value="" class="form-control"><br>
        Password : <br>
        <input type="password" name="password" value="" class="pass"><br>
        Kelas :<br>
        <select name="id_kelas" class="form-control">
            <option></option>
            <?php 
            include "koneksi.php";
            $qry_kelas=mysqli_query($conn,"select * from kelas");
            while($data_kelas=mysqli_fetch_array($qry_kelas)){
                echo '<option value="'.$data_kelas['id_kelas'].'">'.$data_kelas['nama_kelas'].'</option>';    
            }
            ?>
        </select><br>
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
        <input type="submit" name="siswa" value="Tambah Siswa" class="btn btn-primary">
    </form>
        </div>
        </div>