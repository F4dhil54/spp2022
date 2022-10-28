<?php
    include "header.php";
?>

  <form  action="search/searchpet.php" method="get" class="search">
                  <input type="text"  name="cari" placeholder="Cari Petugas" class="form-control">
                </form>
  <?php
        include "koneksi.php";
       $his=mysqli_query($conn, "select * from petugas");
       $row = mysqli_num_rows($his);
      // var_dump($row);
       if($row==0){
        echo "<h3 style='color:black;text-align:center;' >  Tidak ada Data Petugas</h3>";
        echo "<a href='tambah_petugas.php' class='button-tambah2'>+Tambah Petugas</a>";
      }elseif($row >0){
?>
                     
<!-- <h2>Responsive Table</h2> -->
<div class="table-wrapper">
<h3 align="center">Data Petugas</h3><br>
    <table class="table table-hover table-striped">
        <thead>
        <tr>
        <th> No </th>
                            <th> Username </th>
                            
                            <th> Nama Petugas </th>
                            <th> Level </th>
                            <th> Ubah </th>
                            <th> Hapus </th>                                     
        </tr>                    
        </thead>
        <tbody>
        <?php 
        // include "koneksi.php";
        // $sql = mysqli_query($conn, "SELECT A.nama_kelas FROM kelas A JOIN siswa B ON A.id_kelas=B.id_kelas ");



$no=0;

while($histori = mysqli_fetch_array($his)){
    $no++;
    $hapus="<td>"."<a href='hapus.php?id_petugas=".$histori['id_petugas']."' onclick='return confirm(\"Apakah anda yakin menghapus data ini?\")' class='btn btn-danger'>Hapus</a>"."</td>";
    $ubah="<td>"."<a href='ubah_petugas.php?id_petugas=".$histori['id_petugas']."'  class='btn btn-success'>Ubah</a>"."</td>";

    // while($dt_buku=mysqli_fetch_array($sql)){
    //     $kelas=$dt_buku['nama_kelas'];
    // }
?>
                          <tr>
                            <td><?=$no?></td>
                            <td><?=$histori['username']?></td>
                            <td><?=$histori['nama_petugas']?></td>
                            <td><?=$histori['level'].$ubah.$hapus?></td>
                          </tr>

                          <?php
}
                          ?>
                        </tbody>
                      </table>
                     

</div>
<a href="tambah_petugas.php" class="btn btn-primary">+ Tambah Petugas</a>
<?php
      }
      // $carrito = $_SESSION['nama_petugas'];
// echo '<script>console.log('.json_encode($carrito).')</script>';
?>         