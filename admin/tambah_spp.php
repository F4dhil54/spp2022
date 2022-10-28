<?php
include "header.php";
?>

<div class="wrapper">
<div id="formContent">   
<h3 align="center">Tambah SPP</h3><br>     
<form action="proses_tambah.php" method="post">
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
        Tahun :<br>
        <input type="text" name="tahun" value="" class="form-control"><br>
        Nominal : <br>
        <input type="number" name="nominal" value="" class="form-control"><br>
        <input type="submit" name="spp" value="Tambah Data SPP" class="btn btn-primary">
    </form>
        </div>
        </div>