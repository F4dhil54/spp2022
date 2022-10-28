<?php
include "header.php";
?>

  <form  action="search/searchspp.php" method="get" class="search">
  <h3>Lakukan Pembayaran dengan mencari NISN siswa</h3>
    <!-- <input type="number" class="form-control" name="cari" placeholder="Cari NISN"> -->
    <select name="cari" value="" class="form-control">
    <option selected> Pilih nisn</option>
    <?php
    include "koneksi.php";
    $sql = mysqli_query($conn, "SELECT NISN from siswa ;");
    while ($data = mysqli_fetch_array($sql)) {
    ?>
      <option value="<?= $data['NISN'] ?>"><?= $data['NISN'] ?></option>
    <?php
    }
    ?>
  </select>
  <br>
  <center> <input type="submit" name="histori" class="btn btn-success" value="Masuk"></center>
  </form>       