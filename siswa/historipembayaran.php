<?php
include "header.php";
$nisn=$_SESSION['NISN'];
?>


<?php
include "koneksi.php";
$his=mysqli_query($conn, "select * from pembayaran a join siswa b using(NISN) where keterangan like 'lunas' and NISN=$nisn ");
$row=mysqli_num_rows($his);

if($row==0){
    echo "Belum ada transaksi";
}elseif($row>0){
?>
<h2 class="title">Histori Pembayaran Anda yang Lunas</h2>
<div class="table-wrapper">
    <table class="table table-hover table-striped">
        <thead>
        <tr>
        <th>No</th>
        <th>Tanggal Bayar</th>
        <th>Bulan SPP</th>
        <th>Tahun SPP</th>                                      
        </tr>                    
        </thead>
        <tbody>
        <?php 

$no=0;

while($histori = mysqli_fetch_array($his)){
         include "koneksi.php";
    $no++;
?>
        <td><?=$no?></td>                   
        <td><?=$histori['tgl_bayar']?></td>                    
        <td><?=$histori['bulan_spp']?></td>                    
        <td><?=$histori['tahun_spp']?> </td>                 
              
        <tbody>
        <?php
      }
    
?>   
    </table>
</div>
<?php
      }
    
?>   