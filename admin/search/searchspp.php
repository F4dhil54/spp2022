<?php
include "header.php";

      if ($_GET) {
        $search = $_GET['cari'];
        // $search2=$_POST['cari2'];
        include "koneksi.php";
        // $ru=mysqli_query($conn, "select nama_produk from produk");

          if(isset($_GET['cari'])){
          include "koneksi.php";
          $his = mysqli_query($conn, "select * from siswa where NISN like '$search'");
          $f=mysqli_fetch_array($his);
          $row = mysqli_num_rows($his);
          if ($row > 0) {
           

      ?>
<head>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<h3 align="center">Transaksi Pembayaran SPP</h3><br>
<form method="get"  action="searchspp.php">
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
	<!-- <input type="submit" name="cari" value="Cari " /> -->
</form>
<?php
$sq=mysqli_query($conn, "select * from siswa a join kelas b on b.id_kelas=a.id_kelas where a.NISN=$f[NISN] order by nama asc ");
$t=mysqli_fetch_array($sq);
?>

<h3>Biodata Siswa</h3>
<table>
	<tr>
		<td>NISN</td>
		<td>:</td>
		<td><?php echo $f['NISN']; ?></td>
	</tr>
	<tr>
		<td>Nama Siswa</td>
		<td>:</td>
		<td><?php echo $f['nama']; ?></td>
	</tr>
	<tr>
		<td>Kelas</td>
		<td>:</td>
		<td><?php echo $t['nama_kelas']; ?></td>
	</tr>
</table>
<br>
<h3 align="center">Tagihan SPP Siswa</h3><br>
<div class="table-wrapper">
  <table class="table table-hover table-striped">
      <thead>
      <tr>
      <th>No</th>
      <th>Bulan</th>                     
      <th>Tahun</th>                     
      <th>Bukti Bayar</th>                     
      <th>Nominal</th>
      <th>Bayar</th>
      </tr>                    
      </thead>
      <tbody>
	<?php
    include "koneksi.php";
	$sql = mysqli_query($conn, "SELECT *, a.* FROM pembayaran b join spp a using(id_spp)WHERE NISN='$f[NISN]' ORDER BY jatuh_tempo ASC");
  // $b=mysqli_query($conn, "select * from spp a join pembayaran b on b.id_spp=a.id_spp");
  // while($d=mysqli_fetch_array($b)){
  //   $nominal=$d['nominal'];
  
	$no=0;
	while($d=mysqli_fetch_array($sql)){
$bulan=$d['bulan_spp'];
$tahun=$d['tahun_spp'];
$nominal=$d['nominal'];

if($d['foto_bukti']==null){
 $bukti="-";
}else{
 $bukti="<span class='tampil-gambar' data-src='../../siswa/bukti/$d[foto_bukti]' alt='foto bukti'>Lihat Foto</span>";
}


    include "koneksi.php";
    $no++;
    if($d['keterangan']=='lunas'){
      $bayar="<td>"."<img src='../gambar/lunas.png' style='width:40px; heigth:40px;'>"."</td>";
    }elseif($d['keterangan']=='belum lunas'){
    $bayar="<td>"."<a href='../proses_transaksi.php?id_pembayaran=$d[id_pembayaran]&NISN=$d[NISN]'  class='btn btn-success'>Bayar</a>"."</td>";
    }
?>

        <td><?=$no?></td>
        <td><?=$bulan?></td>                    
        <td><?=$tahun?></td>
        <td><?=$bukti?></td>       
        <td><?=$nominal.$bayar?></td>  
        
  </tbody>
        <?php
  }

  
?>
</table>

<div id="myModal" class="modal">

<!-- // The Close Button  -->
<span class="close">&times;</span>

<!-- // Modal Content (The Image)  -->
<img class="modal-content" id="img01">

</div>
</body>
  
  <script src="../app.js"></script>
  <script src="app.js"></script>

    <?php
  
          }elseif($row==0){
            header('location: searchemptyspp.php');
          }
          }
}
          
        
?>


          