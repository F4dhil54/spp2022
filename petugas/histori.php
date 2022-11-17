<?php
include "header.php";
$id=$_SESSION['id_petugas'];
?>

  <?php
        include "koneksi.php";
       $his=mysqli_query($conn, "select p.*,s.*, t.nama_petugas from pembayaran p join petugas t on t.id_petugas=p.id_petugas join siswa s on s.NISN=p.NISN  order by id_pembayaran desc");
       $row = mysqli_num_rows($his);
      // var_dump($row);
       if($row==0){
        echo "<h3 style='color:black;text-align:center;margin-top:50px;' > Belum ada data Pembayaran yang anda lakukan</h3>";
        // echo "<a href='tambah_petugas.php' class='button-tambah2'>+Tambah Petugas</a>";
      }elseif($row >0){
?>
                     
<!-- <h2>Pembayaran yang anda lakukan</h2> -->
<div class="table-wrapper">
<h3>Pembayaran yang anda lakukan</h3>

    <table class="table table-hover table-striped">
        <thead>
        <tr>
                            <th> No </th>
                        
                            <th> NISN </th>                            
                            <th> Tanggal Bayar </th>
                            <th> Bulan SPP </th>
                            <th> Tahun SPP </th>                                     
        </tr>                    
        </thead>
        <tbody>
        <?php 
        // include "koneksi.php";
        // $sql = mysqli_query($conn, "SELECT A.nama_kelas FROM kelas A JOIN siswa B ON A.id_kelas=B.id_kelas ");



$no=0;

while($histori = mysqli_fetch_array($his)){
    $no++;
    $hapus="<td>"."<a href='hapus.php?id_pembayaran=".$histori['id_pembayaran']."' onclick='return confirm(Apakah anda yakin menghapus data ini?)' class='btn btn-danger'>Hapus</a>"."</td>";
    $ubah="<td>"."<a href='ubah_kelas.php?id_pembayaran=".$histori['id_pembayaran']."' onclick='return confirm(Apakah anda yakin menghapus data ini?)' class='btn btn-success'>Ubah</a>"."</td>";

    // while($dt_buku=mysqli_fetch_array($sql)){
    //     $kelas=$dt_buku['nama_kelas'];
    // }
?>
                          <tr>
                            <td><?=$no?></td>
                           
                            <td><?=$histori['NISN']?></td>
                            <td><?=$histori['tgl_bayar']?></td>
                            <td><?=$histori['bulan_spp']?></td>
                            <td><?=$histori['tahun_spp']?></td>
                          </tr>

                          <?php
}
                          ?>
                        </tbody>
                      </table>
                     

</div>
<!-- <a href="tambah_kelas.php" class="button-tambah">+ Tambah Kelas</a> -->
<?php
      }
?>       