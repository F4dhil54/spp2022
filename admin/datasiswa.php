<?php
    include "header.php";
?>

<form  action="search/searchsis.php" method="get" class="search">
                  <input type="text"  name="cari" placeholder="Cari siswa" class="form-control">
                </form>
  <?php
        include "koneksi.php";
       $his=mysqli_query($conn, "select * from siswa a join kelas b on b.id_kelas=a.id_kelas order by b.nama_kelas asc limit 20");
       $row = mysqli_num_rows($his);
      // var_dump($row);
       if($row==0){
        echo "<h3 style='color:black;text-align:center;' >  Tidak ada Data Siswa</h3>";
        echo "<a href='tambah_siswa.php' class='button-tambah2'>+Tambah Siswa</a>";
      }elseif($row >0){
?>
                     
<!-- <h2>Responsive Table</h2> -->
<div class="table-wrapper">
<h3 align="center">Data Siswa</h3><br>
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




$no=0;
$tahun=date('Y');
$bulan=date('m');
while($histori = mysqli_fetch_array($his)){
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
        // $sql = mysqli_query($conn, "SELECT A.nama_kelas FROM kelas A JOIN siswa B ON A.id_kelas=B.id_kelas ");
    $no++;
    // $hapus="<td>"."<a href='hapus.php?NISN=".$histori['NISN']."' onclick='return confirm(Apakah anda yakin menghapus data ini?)' class='button-hapus'>Hapus</a>"."</td>";
    $ubah="<td>"."<a href='ubah_siswa.php?NISN=".$histori['NISN']."'  class='btn btn-success'>Ubah</a>"."</td>";
    $hapus="<td><a href='hapus.php?NISN=$histori[NISN]' onclick='return confirm(\"Apakah anda yakin menghapus data ini?\")' class='btn btn-danger'>Hapus</a></td>";
?>
        <td><?=$no?></td>
        <td><?=$histori['NISN']?></td>
        <td><?=$histori['NIS']?> </td>                    
        <td><?=$histori['nama']?></td>                    
        <td><?=$histori['alamat']?></td>                    
        <td><?=$histori['no_tlp']?> </td>
        <td><?=$histori['nama_kelas']?> </td>                    
        <td><?=$p.$ubah.$hapus?> </td>                    
              
        <tbody>
        <?php
      }
    
?>   
    </table>
</div>
<a href="tambah_siswa.php" class="btn btn-primary">+ Tambah Siswa</a>
<?php
      }
?>       