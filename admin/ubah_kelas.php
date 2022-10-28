<?php
include "header.php";
?>

  <?php 
    include "koneksi.php";
    $qry_get_siswa=mysqli_query($conn,"select * from kelas where id_kelas = '".$_GET['id_kelas']."'");
    $dt_siswa=mysqli_fetch_array($qry_get_siswa);
    ?>
<div class="wrapper">
<div id="formContent">    
<h3 align="center">Ubah Kelas</h3><br>   
<form action="proses_ubah.php" method="post">
<input type="hidden" name="id_kelas" value= 
  "<?=$dt_siswa['id_kelas']?>">  
        Nama Kelas :<br>
        <input type="text" name="nama_kelas" value="<?=$dt_siswa['nama_kelas']?>" class="form-control"><br>
        Jurusan :<br>
        <input type="text" name="jurusan" value="<?=$dt_siswa['jurusan']?>" class="form-control"><br>
        Angkatan : <br>
        <select name="angkatan" class="form-control">
            <option></option>
            <?php 
            include "koneksi.php";
            $qry_kelas=mysqli_query($conn,"select * from angkatan");
            while($data_kelas=mysqli_fetch_array($qry_kelas)){
                if($data_kelas['id_angkatan']==$dt_siswa['id_angkatan']){
                    $selek="selected";
                } else {
                    $selek="";
                }
           echo '<option value="'.$data_kelas['id_angkatan'].'" '.$selek.'>'.$data_kelas['nama_angkatan'].'</option>';   
            }
            ?>
        </select><br>
        <input type="submit" name="kelas" value="Ubah Kelas" class="btn btn-primary">
    </form>
        </div>
        </div>