<?php
include "header.php";
?>

<div class="wrapper">
<div id="formContent">     
<h3 align="center">Tambah Kelas</h3><br>   
<form action="proses_tambah.php" method="post">
        Nama Kelas :<br>
        <input type="text" name="nama_kelas" value="" class="form-control"><br>
        Jurusan :<br>
        <input type="text" name="jurusan" value="" class="form-control"><br>
        Angkatan :<br>
        <select name="angkatan" class="form-control">
            <option></option>
            <?php 
            include "koneksi.php";
            $qry_kelas=mysqli_query($conn,"select * from angkatan");
            while($data_kelas=mysqli_fetch_array($qry_kelas)){
                echo '<option value="'.$data_kelas['id_angkatan'].'">'.$data_kelas['nama_angkatan'].'</option>';    
            }
            ?>
        </select><br>
        <input type="submit" name="kelas" value="Tambah Kelas" class="btn btn-primary">
    </form>
        </div>
        </div>