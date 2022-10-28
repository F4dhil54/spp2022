<?php
include "header.php";
      // if ($_GET) {
        $search = $_GET['cari'];
        // $search2=$_POST['cari2'];
        include "koneksi.php";
        // $ru=mysqli_query($conn, "select nama_produk from produk");

          if(isset($_GET['cari'])){
          include "koneksi.php";
          $his=mysqli_query($conn, "select * from siswa a join kelas b on b.id_kelas=a.id_kelas where a.nama like '%$search%' order by b.nama_kelas asc limit 20");
       $row = mysqli_num_rows($his);
          $row = mysqli_num_rows($his);
          if ($row > 0) {
           

      ?>

<form  action="searchsis.php" method="get" class="search">
<input type="text" class="form-control" name="cari" placeholder="Cari Siswa">
</form>
                     
<!-- <h2>Responsive Table</h2> -->
<div class="table-wrapper">
    <table class="table table-hover table-striped">
        <thead>
        <tr>
        <th>No</th>
        <th>NISN</th>
        <th>NIS</th>
        <th>Nama Siswa</th>
        <th>Alamat</th>
        <th>Nomor Telepon</th>                   
        <th>Kelas</th>                     
        <th>Tunggakan</th>                     
        <th>Ubah</th>
        <th>Hapus</th>                                        
        </tr>                    
        </thead>
        <tbody>
        <?php 
        include "koneksi.php";
        // $sql = mysqli_query($conn, "SELECT A.nama_kelas FROM kelas A JOIN siswa B ON A.id_kelas=B.id_kelas ");



$no=0;

while($histori = mysqli_fetch_array($his)){
    $no++;
    $tahun=date('Y');
$bulan=date('m');
         include "koneksi.php";
         $que=mysqli_query($conn, "select sum(a.nominal), b.* from spp a 
join pembayaran b 
on b.id_spp=a.id_spp
where 
b.keterangan like 'belum lunas' 
and month(b.jatuh_tempo) <= $bulan and year(b.jatuh_tempo)=$tahun and NISN=$histori[NISN]");
while($rd=mysqli_fetch_array($que)){
  $jum=$rd['sum(a.nominal)'];
  
  if($jum==0){
    $p="Tidak ada ";
  }elseif($jum>0){
    $p="Rp ".$rd['sum(a.nominal)'] ;
  } 
}
    // $hapus="<td>"."<a href='hapus.php?NISN=".$histori['NISN']."' onclick='return confirm(Apakah anda yakin menghapus data ini?)' class='button-hapus'>Hapus</a>"."</td>";
    $ubah="<td>"."<a href='ubah_siswa.php?NISN=".$histori['NISN']."'  class='btn btn-succes'>Ubah</a>"."</td>";
    $hapus="<td><a href='hapus.php?NISN=$histori[NISN]' onclick='return confirm(\"Apakah anda yakin menghapus data ini?\")' class='btn btn-danger'>Hapus</a></td>";

    // while($dt_buku=mysqli_fetch_array($sql)){
        // $kelas=$dt_buku['nama_kelas'];
    // }
?>
        <td><?=$no?></td>
        <td><?=$histori['NISN']?></td>
        <td><?=$histori['NIS']?> </td>                    
        <td><?=$histori['nama']?></td>                    
        <td><?=$histori['alamat']?></td>                    
        <td><?=$histori['no_tlp']?> </td>                    
         <td><?=$histori['nama_kelas']?></td>  
         <td><?=$p.$ubah.$hapus?></td>  
              
        <tbody>
        <?php
      }
    
?>   
    </table>
</div>
<a href="tambah_siswa.php" class="btn btn-primary">+ Tambah Siswa</a>

<?php
      }elseif($row==0){
        header('location: searchemptysis.php');
      }

            }
        
      

?>