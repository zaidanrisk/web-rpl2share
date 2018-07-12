<!DOCTYPE html>
<html lang="en">
<head>
  <title>RPL2SHARE</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css">
  <script src="/rpl/jquery.js"></script>
  <script src="/rpl/js/bootstrap.min.js"></script>
  <style>
  .isi{
	  background-color: #DCDCDC;
	  margin-top: 20px;
  }
  .isi h4{
	  color:#1E90FF;
  }
  .btn{
	  width: 200px;
	  margin-top: 10px;
  }
  .list-group{
	  margin-top:40px;
  }
  .kirim{
	  width:100px;
  }
  .saran{
	  margin-left:20px;
  }
  .saran table i{
      font-size: 11px;
  }
  .hal{
	  margin-top: 40px;
  }
  .keluar{
	  width: 400px;
  }
  .kel{
	margin-left: 30px;
  }
  .isikel{
	  margin-left: 30px;
  }
  </style>
</head>
<body>
  <?php session_start();
  $username = $_SESSION['username'];
$admin = "zaidan21";
if($username == $admin){
$username = $admin; }
else{
header('location:/rpl/index.php'); }
require_once("koneksi.php");
?>
<div class="navbar navbar-inverse navbar-fixed-top">
<div class="container">
<a class="navbar-brand" href="/rpl/index.php">RPL2SHARE</a>
<div class="navbar-collapse collapse">
<ul class="nav navbar-nav">
  <li><a href="/rpl/index.php">Home</a></li>
</ul>
</div>
  </div>
  </div>
  <div class="hal container">
<div class="row">
<div class="col-md-12">
<div class="col-md-3">
<div class="row">
<div class="col-md-12">
<?php
  $username = $_SESSION['username'];
  $cekuser = mysql_query("SELECT * FROM akun WHERE username = '$username'");
$hasil = mysql_fetch_array($cekuser);
$nama = $hasil['nama'];
$img = $hasil['img'];
$id = $hasil['id'];
$komensql = mysql_query("select * from postingan where nama = '$nama'");
$banyak = mysql_num_rows($komensql);
  echo " <ul class=\"list-group\">
  <button class=\"list-group-item\" data-toggle=\"modal\" data-target=\"#profil\"><img src=/rpl/img/$img width=23 class=\"pull-right\">$nama</button>
  <button class=\"list-group-item\" data-toggle=\"modal\" data-target=\"#posting\"><span class=\"badge\">$banyak</span>Posting</button>
  <button data-toggle=\"modal\" data-target=\"#keluar\" class=\"list-group-item\">Keluar</button>
</ul>";
  ?>
  <div class="modal fade" id="posting" role="dialog">
    <div class="modal-dialog">
    
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
		 <h4 class="modal-title">Postinganmu</h4>
		  </div>
        <div class="modal-body">
          <div class="row">
<div class="col-md-12">
<div class="list-group">
<?php
$pilih = mysql_query("select * from postingan where nama = '$nama'");
while($cabut = mysql_fetch_array($pilih)){
	$judul = $cabut['judul'];
	$id = $cabut['id'];
	echo "<a href=/rpl/posting/postingan.php?id=$id class=\"list-group-item\">$judul</a>
	";
}
?>
<a href="/rpl/posting/posting.html" class="list-group-item active"><span class="badge">+</span><center>Tambah Posting</center></a>
</div>
<div class="col-md-4">
</div>
</div>
</div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        </div>
      </div>
      
    </div>
  </div>
  <div class="modal fade" id="profil" role="dialog">
    <div class="modal-dialog">
    
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><?php echo "$nama <i>($username)</i>";?></h4>
        </div>
        <div class="modal-body">
		<div class="row">
		<div class="col-md-12">
		<h4>Pilih Avatarmu!!</h4>
		</div>
		</div>
          <div class="row">
		  <?php
		  for ($i = 1; $i <= 9; $i++) { 
echo "<div class=\"col-md-1\">
<a href=/rpl/akun/suntingimg.php?i=$i.png><img src=/rpl/img/$i.png width=35></a>
</div>"; 
} 
?>
		  </div>
		  <div class="row">
		  <?php
		    $jenis = $_REQUEST['jenis'];
		  for ($i = 10; $i <= 18; $i++) { 
echo "<div class=\"col-md-1\">
<a href=/rpl/akun/suntingimg.php?i=$i.png&jenis=$jenis><img src=/rpl/img/$i.png width=35></a>
</div>"; 
} 
?>
		  </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        </div>
      </div>
      
    </div>
  </div>
  <div class="modal fade" id="keluar" role="dialog">
    <div class="modal-dialog">
    
      <div class="keluar modal-content">
        <div class="isikel modal-body">
         <div class="row">
		 <div class="col-md-12">
		 <h4>Apakah anda yakin ingin keluar ?</h4>
		 </div>
		 </div>
		 <div class="row">
		 <div class="col-md-12">
		 <a href="/rpl/akun/keluar.php"><button type="button" class="kel btn btn-default">Ya</button></a>
		 </div>
		 </div>
		 <div class="row">
		 <div class="col-md-12">
		 <button type="button" class="kel btn btn-primary" data-dismiss="modal">Tidak</button>
		 </div>
		 </div>
        </div>
        
      </div>
      
    </div>
  </div>
</div>
</div>
<div class="row">
<div class="col-md-12">
 <div class="list-group">
 <h4 class="list-group-item">Kategori</h4>
  <a href="mapel.php?mapel=pemrograman dasar" class="list-group-item">Pemrograman Dasar</a>
  <a href="mapel.php?mapel=sistem komputer" class="list-group-item">Sistem Komputer</a>
  <a href="mapel.php?mapel=simulasi digital" class="list-group-item">Simulasi Digital</a>
  <a href="mapel.php?mapel=perakitan komputer" class="list-group-item">Perakitan Komputer</a>
  <a href="mapel.php?mapel=sistem operasi" class="list-group-item">Sistem Operasi</a>
  <a href="mapel.php?mapel=jaringan dasar" class="list-group-item">Jaringan Dasar</a>
  <a href="mapel.php?mapel=pemrograman web" class="list-group-item">pemrograman Web</a>
  <a href="mapel.php?mapel=lainnya" class="list-group-item">Lainnya</a>
</div>
</div>
</div>
</div>
<div class="col-md-6">
<?php
include "../config/koneksi.php";
$select = "select * from postingan order by id desc";
$selectlagi = mysql_query($select);
while ($ambil = mysql_fetch_array($selectlagi))
{
	$id = $ambil['id'];
	$judul = $ambil['judul'];
	$isi = $ambil['isi'];
	$tanggal = $ambil['tanggal'];
	$tanggalasli = explode("-", $tanggal);
	$nama = $ambil['nama'];
	$potong = substr($isi, 0,150);
	echo "<div class=\"row\">
	<div class=\"isi col-md-12\">
	<table width=100% height=150>
	<tr>
	<td><h4><a href=/rpl/posting/postingan.php?id=$id>$judul</a></h4></td>
	</tr>
	<tr>
	<td><p>$potong....</p></td>
	</tr>
	<tr>
	<td><div class=\"row\">
	<div class=\"col-md-12 bg-primary\">
	Oleh $nama pada $tanggalasli[2]-$tanggalasli[1]-$tanggalasli[0]
	</div>
	</div></td>
	</tr>
	</table>
	</div>
	</div>
	";
}
?>
</div>
<div class="col-md-3">
<div class="row">
<div class="saran col-md-12">
<div class="list-group">
<h4>Saran & Pesan</h4>
<?php
include "koneksi.php";
$select = mysql_query("select * from komentar where id='0' order by jam desc");
$banyak = 1;
while($banyak <=5 ){
$ambil = mysql_fetch_array($select);
$komentar = $ambil['komentar'];
$nama = $ambil['nama'];
$pilih = mysql_query("select * from akun where nama = '$nama'");
$cabut = mysql_fetch_array($pilih);
$img = $cabut['img'];
$tanggal = $ambil['tanggal'];
$tanggalasli = explode("-", $tanggal);
$jamawal = $ambil['jam'];
$jam = explode(":", $jamawal);
$jam0 = $jam[0] + 5;
echo "<table width=200>
<tr>
<td rowspan=3><img src=/rpl/img/$img></td><td><font color=#1E90FF><b>$nama</b></font></td>
</tr>
<tr>
<td>$komentar</td>
</tr>
<tr>
<td><i>$jam0:$jam[1] $tanggalasli[2]-$tanggalasli[1]-$tanggalasli[0]<i></td><hr>
</tr>
</table>
";
$banyak++;
}
echo "<form action=/rpl/akun/pesan.php?jenis=$jenis method=POST><br>
<label for=\"comment\">Komentar:</label>
  <textarea class=\"form-control\" rows=\"2\" id=\"comment\" name=kirim></textarea><button type\"submit\" class=\"kirim btn btn-primary pull-right\">Kirim</button>
</form>
";
?>
</div>
</div>
</div>
</div>
</div>
</div>
   
</div>


</body>
</html>
