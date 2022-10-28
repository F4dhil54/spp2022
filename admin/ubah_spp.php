<?php
include "header.php";
?>

  <?php 
    include "koneksi.php";
    $qry_get_siswa=mysqli_query($conn,"select * from spp where id_spp = '".$_GET['id_spp']."'");
    $dt_siswa=mysqli_fetch_array($qry_get_siswa);
    ?>
<div class="wrapper">
<div id="formContent">       
<h3 align="center">Ubah SPP</h3><br>
<form action="proses_ubah.php" method="post">
<input type="hidden" name="id_spp" value= 
  "<?=$dt_siswa['id_spp']?>">  
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
        Tahun :<br>
        <input type="text" name="tahun" value="<?=$dt_siswa['tahun']?>" class="form-control"><br>
        Nominal : <br>
        <input type="number" name="nominal" value="<?=$dt_siswa['nominal']?>" class="form-control"><br>
        <input type="submit" name="spp" value="Ubah Data SPP" class="btn btn-primary">
    </form>
        </div>
        </div>