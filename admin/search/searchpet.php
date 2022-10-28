<?php
include "header.php";
      // if ($_GET) {
        $search = $_GET['cari'];
        // $search2=$_POST['cari2'];
        include "koneksi.php";
        // $ru=mysqli_query($conn, "select nama_produk from produk");

          if(isset($_GET['cari'])){
          include "koneksi.php";
          $his = mysqli_query($conn, "select * from petugas where nama_petugas like '%$search%'");
          $row = mysqli_num_rows($his);
          if ($row > 0) {
           

      ?>

<form  action="searchpet.php" method="get" class="search">
<input type="text" class="form-control" name="cari" placeholder="Cari Petugas">
</form>
                     
<!-- <h2>Responsive Table</h2> -->
<div class="table-wrapper">
    <table class="table table-hover table-striped">
        <thead>
        <tr>
        <th> No </th>
                            <th> Username </th>
                            
                            <th> Nama Petugas </th>
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
                            <td><?=$histori['nama_petugas'].$ubah.$hapus?></td>
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

      elseif($row==0){
        header('location: searchemptypet.php');
      }

    } 
        
      

?>