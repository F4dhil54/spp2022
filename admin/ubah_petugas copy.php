<?php
include "header.php";
?>

  <?php 
    include "koneksi.php";
    $qry_get_siswa=mysqli_query($conn,"select * from petugas where id_petugas = '".$_GET['id_petugas']."'");
    $dt_siswa=mysqli_fetch_array($qry_get_siswa);
    ?>
<div class="wrapper">
<div id="formContent">      
<h3 align="center">Ubah Petugas</h3><br> 
<form action="proses_ubah.php" method="post">
<input type="hidden" name="id_petugas" value= 
  "<?=$dt_siswa['id_petugas']?>">  
        nama petugas :<br>
        <input type="text" name="nama_petugas" value="<?=$dt_siswa['nama_petugas']?>" class="form-control"><br>
        Username :<br>
        <input type="text" name="username" value="<?=$dt_siswa['username']?>" class="form-control"><br>
        Password : <br>
        <input type="text" name="password" value="" class="form-control"><br>
        Level : 
        <?php 
        $arr_gender=array('petugas','admin');
        ?>
        <select name="level" class="form-control">
            <option></option>
            <?php foreach ($arr_gender as $key_gender => $val_gender):
                if($key_gender==$dt_siswa['level']){
                    $selek="selected";
                } else {
                    $selek="";
                }
             ?>
<option value="<?=$key_gender?>" <?=$selek?>><?=$val_gender?></option>
            <?php endforeach ?>
        </select>
        <input type="submit" name="petugas" value="Ubah Petugas" class="btn btn-primary">
    </form>
        </div>
        </div>