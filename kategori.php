<!DOCTYPE html>
<html lang="en">
<head>
  <title>RPL2SHARE</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
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
  .btn-default{
	  margin-top:20px;
  }
  .hal{
	  margin-top: 40px;
  }
  #footer{
  height: 50px;
  background: #222222;
  margin-top: 20px;
}
.copyright{
  color: white;
  text-align: center;
  font-size: 15px;
  margin-top: 6px;
}
  body{
	  background-color: #F5F5F5;
  }
  </style>
</head>
<body>
    
    <div class="navbar navbar-inverse navbar-fixed-top">
<div class="container">
<a class="navbar-brand" href="index.php">RPL2SHARE</a>
<div class="navbar-collapse collapse">
<ul class="nav navbar-nav">
  <li><a href="index.php">Home</a></li>
  <?php 
  $jenis = $_REQUEST['jenis'];
  if($jenis == "tutorial"){
	  echo "<li class=\"active\"><a href=\"kategori.php?jenis=tutorial\">Tutorial</a></li>
  <li><a href=\"kategori.php?jenis=artikel\">Artikel</a></li>
  <li><a href=\"kategori.php?jenis=ebook\">Ebook</a></li>
	  ";
  }
  if($jenis == "artikel"){
	  echo "<li><a href=\"kategori.php?jenis=tutorial\">Tutorial</a></li>
  <li class=\"active\"><a href=\"kategori.php?jenis=artikel\">Artikel</a></li>
  <li><a href=\"kategori.php?jenis=ebook\">Ebook</a></li>
	  ";
  }
  if($jenis == "ebook"){
	  echo "<li><a href=\"kategori.php?jenis=tutorial\">Tutorial</a></li>
  <li><a href=\"kategori.php?jenis=artikel\">Artikel</a></li>
  <li class=\"active\"><a href=\"kategori.php?jenis=ebook\">Ebook</a></li>
	  ";
  }
  ?>
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
 <div class="list-group">
 <h4 class="list-group-item">Kategori</h4>
    <a href="pasca login/mapel.php?mapel=pemrograman dasar" class="list-group-item">Pemrograman Dasar</a>
  <a href="pasca login/mapel.php?mapel=sistem komputer" class="list-group-item">Sistem Komputer</a>
  <a href="pasca login/mapel.php?mapel=simulasi digital" class="list-group-item">Simulasi Digital</a>
  <a href="pasca login/mapel.php?mapel=perakitan komputer" class="list-group-item">Perakitan Komputer</a>
  <a href="pasca login/mapel.php?mapel=sistem operasi" class="list-group-item">Sistem Operasi</a>
  <a href="pasca login/mapel.php?mapel=jaringan dasar" class="list-group-item">Jaringan Dasar</a>
  <a href="pasca login/mapel.php?mapel=pemrograman web" class="list-group-item">pemrograman Web</a>
  <a href="pasca login/mapel.php?mapel=lainnya" class="list-group-item">Lainnya</a>
</div>
</div>
</div>
</div>
<div class="col-md-6">
<?php
include "koneksi.php";
$jenis = $_REQUEST['jenis'];
if($jenis == "ebook"){

}else{
$select = "select * from postingan where jenis = '$jenis' order by id desc";
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
	<td><h4><a href=posting/postingan.php?id=$id>$judul</a></h4></td>
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
}
?>
</div>
<div class="col-md-3">
<div class="row">
<div class="col-md-12">
<div class="list-group">
<h4>Saran & Pesan</h4>
<?php
include "koneksi.php";
$select = mysql_query("select * from komentar where id='0' order by jam desc");
$banyak = 1;
while($banyak <= 5){
$ambil = mysql_fetch_array($select);
$komentar = $ambil['komentar'];
$nama = $ambil['nama'];
$query = mysql_query("select * from akun where nama='$nama'");
$cabut = mysql_fetch_array($query);
$img = $cabut['img'];
$tanggal = $ambil['tanggal'];
$tanggalasli = explode("-", $tanggal);
$jamawal = $ambil['jam'];
$jam = explode(":", $jamawal);
$jam0 = $jam[0] + 5;
echo "<table width=200>
<tr>
<td rowspan=3><img src=img/$img></td><td><font color=#1E90FF><b>$nama</b></font></td>
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
?>
</div>
</div>
</div>
</div>
</div>
</div>
   
</div>
<div id="footer">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-lg-offset-3 fixed-top">
          <p class="copyright">Copyright &copy; 2016 - RPL2SHARE</p>
      </div>
    </div>    
  </div>  
  </div>


</body>
</html>
