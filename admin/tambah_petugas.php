   <?php
include "header.php";
?>

<div class="wrapper">
<div id="formContent">      
<h3 align="center">Tambah Petugas</h3><br>  
<form action="proses_tambah.php" method="post">
        Nama Petugas :
        <input type="text" name="nama_petugas" value="" class="form-control"><br><br>
        Username :
        <input type="text" name="username" value="" class="form-control"><br><br>
        Password :
        <input type="text" name="password" value="" class="form-control"><br><br>
        Level :
        <select name="level" class="form-control">
            <option></option>
            <option value='petugas'>Petugas</option>
            <option value='admin'>Admin</option>
        </select>
        <input type="submit" name="petugas" value="Tambah Petugas" class="btn btn-primary">
    </form>
        </div>
        </div>
