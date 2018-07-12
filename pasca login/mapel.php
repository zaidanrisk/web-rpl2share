<!DOCTYPE html>
<html lang="en">
<head>
  <title>RPL2SHARE</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="/rpl/css/bootstrap.min.css">
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
	  margin-top: 33px;
  }
  body{
	  background-color: #F5F5F5;
  }
  </style>
</head>
<body>
  <?php session_start();
require_once("koneksi.php");
$mapel = $_REQUEST['mapel'];
?>
<div class="navbar navbar-inverse navbar-fixed-top">
<div class="container">
<a class="navbar-brand" href="/rpl/index.php">RPL2SHARE</a>
<div class="navbar-collapse collapse">
<ul class="nav navbar-nav">
  <li><a href="/rpl/index.php">Home</a></li>
  <?php 
  if(!isset($_SESSION['username'])) {
	echo "<li><a href=\"/rpl/kategori.php?jenis=tutorial\">Tutorial</a></li>
  <li><a href=\"/rpl/kategori.php?jenis=artikel\">Artikel</a></li>
  <li><a href=\"#\">Ebook</a></li>";  }
else {echo "<li><a href=\"/rpl/pasca login/pascalogin.php?jenis=tutorial\">Tutorial</a></li>
  <li><a href=\"/rpl/pasca login/pascalogin.php?jenis=artikel\">Artikel</a></li>
  <li><a href=\"#\">Ebook</a></li>
"; }
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
<?php
if(isset($_SESSION['username'])){
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
}else{
}
  ?>

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
include "koneksi.php";
$mapel = $_REQUEST['mapel'];
echo "<h3>$mapel</h3>";
$select = "select * from postingan where mapel = '$mapel' order by id desc";
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
if(!isset($_SESSION['username'])){
}else{
echo "<form action=/rpl/akun/pesan.php?mapel=$mapel method=POST><br>
<label for=\"comment\">Komentar:</label>
  <textarea class=\"form-control\" rows=\"2\" id=\"comment\" name=kirim></textarea><button type\"submit\" class=\"kirim btn btn-primary pull-right\">Kirim</button>
</form>
";
}
?>
</div>
</div>
</div>
</div>
</div>
</div>
   
</div>
                        <!-- Ini modal-->

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
$username = $_SESSION['username'];
  $cekuser = mysql_query("SELECT * FROM akun WHERE username = '$username'");
$hasil = mysql_fetch_array($cekuser);
$nama = $hasil['nama'];
$pilih = mysql_query("select * from postingan where nama = '$nama'");
$periksa = mysql_num_rows($pilih);
if($periksa == 0){
  echo "<h3>Tidak ada Postingan</h3>";
}else{
while($cabut = mysql_fetch_array($pilih)){
  $judul = $cabut['judul'];
  $id = $cabut['id'];
  echo "<a href=/rpl/posting/postingan.php?id=$id class=\"list-group-item\">$judul</a>
  ";
}
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
<a href=/rpl/akun/suntingimg.php?i=$i.png&jenis=tutorial><img src=/rpl/img/$i.png width=35></a>
</div>"; 
} 
?>
      </div>
      <div class="row">
      <?php
      for ($i = 10; $i <= 18; $i++) { 
echo "<div class=\"col-md-1\">
<a href=/rpl/akun/suntingimg.php?i=$i.png&jenis=tutorial><img src=/rpl/img/$i.png width=35></a>
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
                          <!-- Tutup modal -->
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
