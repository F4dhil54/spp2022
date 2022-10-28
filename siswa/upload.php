<?php
include "header.php";
?>


<div class="formulir">      
<!-- <form action="proses_upload.php" method="post"  enctype="multipart/form-data"> -->
    
    <!-- // $years = range(2015, strftime("%Y", time()));  -->
    <!-- // $date = date('M'); -->
  
   <!-- <input type="file" name="foto">
<select name="year">
  <option>Select Year</option> -->
 


		<!-- <div class="card-image">	 -->
			<!-- <h2 class="card-heading">
				Get started
				<small>Let us create your account</small>
			</h2> -->
		<!-- </div> -->
    <h3 class="judul">UPLOAD BUKTI PEMBAYARAN</h3>
  <div class="cont">
    
      <div class="button-wrap">
        <form action="proses_upload.php" method="post"  enctype="multipart/form-data" class="upload">
        
        
        <label class="button" for="upload">Upload Foto</label>
        <input id="upload" name="foto" type="file" class="form-control">
        <br>

        <label class="button" for="upload">Pilih Tahun</label>
        <select name="year" class="form-control">
<?php 
// $ang=$_SESSION['tahun_masuk'];
echo "<option>Pilih Tahun</option>";
// if($ang=='30'){
   for($i =$_SESSION['tahun_masuk'] ; $i <= date('Y'); $i++){
      echo "<option>$i</option>";
   }
  // }elseif($ang=='31'){
  //   for($i = 2021 ; $i <= date('Y'); $i++){
  //     echo "<option>$i</option>";
  //  }
  // }
?>
</select><br>

<label class="button" for="upload">Pilih Bulan</label>
<select name= "month" class="form-control">
                          <option>Pilih Bulan</option>
                          <option value="1">Januari</option>
                          <option value="2">Februari</option>
                          <option value="3">Maret</option>
                          <option value="4">April</option>
                          <option value="5">Mei</option>
                          <option value="6">Juni</option>
                          <option value="7">Juli</option>
                          <option value="8">Agustus</option>
                          <option value="9">September</option>
                          <option value="10">Oktober</option>
                          <option value="11">November</option>
                          <option value="12">Desember</option>
                        </select>
                        <input type="submit" value="upload" class="btn btn-primary">
  </form>
      </div>


