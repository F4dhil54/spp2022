<?php
include "header.php";
$nisn=$_SESSION['NISN'];
?>


<?php
include "koneksi.php";
$sql=mysqli_query($conn, "select sum(a.nominal), b.* 
from spp as a 
join pembayaran as b 
USING(id_spp) 
where b.keterangan like 'belum lunas' 
and 
b.jatuh_tempo in (
    SELECT jatuh_tempo 
    FROM pembayaran 
    WHERE 
    month(jatuh_tempo)<=month(now()) 
    AND 
    YEAR(jatuh_tempo) = year(now())) 
    and b.NISN=$nisn ");

$qu=mysqli_query($conn,"select sum(a.nominal), b.* 
from spp as a 
join pembayaran as b 
USING(id_spp) 
where b.keterangan like 'belum lunas' 
and 
b.jatuh_tempo in (
    SELECT jatuh_tempo 
    FROM pembayaran 
    WHERE 
    month(jatuh_tempo)=month(now()) 
    AND 
    YEAR(jatuh_tempo) = year(now())) 
    and b.NISN=$nisn  ");    

$bul=mysqli_fetch_array($qu);
if($bul['sum(a.nominal)']==0){
  $po="Tidak ada tunggakan";
}elseif($bul['sum(a.nominal)']>0){
  $po=$bul['sum(a.nominal)'];
}


$n=mysqli_fetch_array($sql);
if($n['sum(a.nominal)']==0){
  $p="Tidak ada tunggakan";
}elseif($n['sum(a.nominal)']>0){
  $p=$n['sum(a.nominal)'];
}
?>

<div class="data">
<div class="card">
  <!-- <img src="img_avatar.png" alt="Avatar" style="width:100%"> -->
  <div class="in-card">
    <div class="box">
    <div class="nemu">
    <h2 ><b>SPP(Bulan Ini)</b></h2>
    <p class="tungg"><?php echo"Rp ".$po?></p>
     </div>
     <div class="op">
     <i class="fa-solid fa-dollar-sign fa-3x"></i>
    </div>
    </div>
  </div>
</div>

<div class="card">
  <!-- <img src="img_avatar.png" alt="Avatar" style="width:100%"> -->
  <div class="in-card">
    <div class="box">
    <div class="nemu">
    <h2 ><b>Total Tunggakan</b></h2>
    <p class="tungg"><?php echo"Rp ".$p?></p>
     </div>
     <div class="op">
     <i class="fa-solid fa-chart-simple fa-3x"></i>
    </div>
    </div>
  </div>
</div>
</div>

