<?php
include "header.php";
?>

  <?php 
    include "koneksi.php";
    $qry_get_siswa=mysqli_query($conn,"select * from siswa where NISN = '".$_GET['NISN']."'");
    $dt_siswa=mysqli_fetch_array($qry_get_siswa);
    ?>
<div class="wrapper">
<div id="formContent">       
<h3 align="center">Ubah Siswa</h3><br>
<form action="proses_ubah.php" method="post">
    <div>
    <input type="hidden" name="id" value="<?=$dt_siswa['id']?>" >
        <label for="" class="nisn"> NISN  <input type="number" name="NISN" value="<?=$dt_siswa['NISN']?>" ></label>
   
        <label for="" class="nis">NIS  <input type="number" name="NIS" value="<?=$dt_siswa['NIS']?>"></label>

    </div> <br><br><br>  
        nama siswa :<br>
        <input type="text" name="nama_siswa" value="<?=$dt_siswa['nama']?>" class="form-control"><br>
        Alamat : <br>
        <textarea name="alamat" class="form-control" rows="4"><?=$dt_siswa['alamat']?></textarea><br>
        Nomor Telepon : <br>
        <input type="number" name="telp" value="<?=$dt_siswa['no_tlp']?>" class="form-control"><br>
        Password : <br>
        <input type="text" name="password" value="" class="form-control"><br>
        Kelas :<br>
        <select name="id_kelas" class="form-control">
            <option></option>
            <?php 
            include "koneksi.php";
            $qry_kelas=mysqli_query($conn,"select * from kelas");
            while($data_kelas=mysqli_fetch_array($qry_kelas)){
                if($data_kelas['id_kelas']==$dt_siswa['id_kelas']){
                    $selek="selected";
                } else {
                    $selek="";
                }
           echo '<option value="'.$data_kelas['id_kelas'].'" '.$selek.'>'.$data_kelas['nama_kelas'].'</option>';   
            }
            ?>
        </select><br>
        <input type="submit" name="siswa" value="Ubah Siswa" class="btn btn-primary">
    </form>
        </div>
        </div>