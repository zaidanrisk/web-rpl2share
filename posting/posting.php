<!DOCTYPE html>
<html lang="en">
<head>
  <title>RPL2SHARE</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="/rpl/css/bootstrap.min.css">
  <script src="/rpl/jquery.js"></script>
  <script src="/rpl/js/bootstrap.min.js"></script>
  </head>
  <body>
  <div class="container">
  <div class="row">
  <div class="col-md-12">
  <div class="col-md-8">
  <div class="row">
  <div class="col-md-12">
 <?php 
  require_once("koneksi.php");
  session_start();
  $username = $_SESSION['username'];
  $ambil = mysql_query("SELECT * FROM akun where username = '$username'");
  $pilih = mysql_fetch_array($ambil);
  $nama = $pilih['nama'];
  $no = $_REQUEST['no'];
  $judul = $_POST['judul'];
  $isiawal = $_POST['isi'];
  $jenis = $_POST['jenis'];
  $mapel = $_POST['mapel'];
  $kategori = $_POST['kategori'];
  $isi = nl2br($isiawal);
  $tanggal = date("Y-m-d");
  $simpan = mysql_query("INSERT INTO postingan(judul, isi, tanggal, nama, kategori, jenis, mapel) VALUES('$judul', '$isi', '$tanggal', '$nama', '$kategori', '$jenis', '$mapel')");
  if($simpan){
	  echo "<h3>Selamat <font color=#1E90FF>$nama</font> postingan anda telah berhasil di muat<br>
	  <ul class=\"list-group\">
  <li class=\"list-group-item\"><img src=/rpl/img/avatar.png width=25 class=\"pull-right\">$nama</li>
  <label for=\"jdl\">Posting :</label><br>";
  
  $select = mysql_query("SELECT * FROM postingan where nama = '$nama'");
  while ($tarik = mysql_fetch_array($select)){
  $judul1 = $tarik['judul'];
  echo "<a href= class=\"list-group-item\" id=\"jdl\">$judul1</a><br>";
  }
  echo "<a href=/rpl/akun/keluar.php class=\"list-group-item\">Keluar</a>
</ul>";
  }
  else{
	  echo "<h3>Gagal untuk posting,silahkan cek kembali data yang anda masukan<h3>";
  }
  ?>
  </div>
  </div>
  </div>
  </div>
  </div>
  </div>
  </body>
  </html>