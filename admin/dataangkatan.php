<?php
include "header.php";
?>

<?php
include "koneksi.php";
$his = mysqli_query($conn, "select * from angkatan  order by nama_angkatan asc");
$row = mysqli_num_rows($his);
// var_dump($row);
if ($row == 0) {
  echo "<h3 style='color:black;text-align:center;' >  Tidak ada Data Angkatan</h3>";
  echo "<a href='tambah_angkatan.php' class='btn btn-primary>+Tambah Data</a>";
} elseif ($row > 0) {
?>

  <!-- <h2>Responsive Table</h2> -->
  <div class="table-wrapper">
    <h3 align="center">Data Angkatan</h3><br>
    <table class="table table-hover table-striped">
      <thead>
        <tr>
          <th> No </th>
          <th> Nama Angkatan </th>
          <th> Tahun Masuk </th>
          <th> Ubah </th>
          <th> Hapus </th>
        </tr>
      </thead>
      <tbody>
        <?php
        // include "koneksi.php";
        // $sql = mysqli_query($conn, "SELECT A.nama_kelas FROM kelas A JOIN siswa B ON A.id_kelas=B.id_kelas ");



        $no = 0;

        while ($histori = mysqli_fetch_array($his)) {
          $no++;
          $hapus = "<td>" . "<a href='hapus.php?id_angkatan=" . $histori['id_angkatan'] . "' onclick='return confirm(\"Apakah anda yakin menghapus data ini?\")' class='btn btn-danger'>Hapus</a>" . "</td>";
          $ubah = "<td>" . "<a href='ubah_angkatan.php?id_angkatan=" . $histori['id_angkatan'] . "'  class='btn btn-success'>Ubah</a>" . "</td>";

          // while($dt_buku=mysqli_fetch_array($sql)){
          //     $kelas=$dt_buku['nama_kelas'];
          // }
        ?>
          <tr>
            <td><?= $no ?></td>
            <td><?= $histori['nama_angkatan'] ?></td>
            <td><?= $histori['tahun_masuk'] . $ubah . $hapus ?></td>
          </tr>

        <?php
        }
        ?>
      </tbody>
    </table>


  </div>
  <a href="tambah_angkatan.php" class="btn btn-primary">+ Tambah Angkatan</a>
<?php
}
?>