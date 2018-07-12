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
  <?php session_start();
if(!isset($_SESSION['username'])) { }
else { $username = $_SESSION['username']; }
require_once("koneksi.php");
?>
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="col-md-8">
<div class="row">
<div class="col-md-12">
<div class="list-group">
<?php
$username = $_SESSION['username'];
$select = mysql_query("select * from akun where username = '$username'");
$ambil = mysql_fetch_array($select);
$nama = $ambil['nama'];
$img = $ambil['img'];
echo "<h3 class=\"list-group-item\"><img src=/rpl/img/$img width=25 class=\"pull-right\">$nama</h3>
<h3 class=\"list-group-item\">Posting :</h3>";
$pilih = mysql_query("select * from postingan where nama = '$nama'");
while($cabut = mysql_fetch_array($pilih)){
	$judul = $cabut['judul'];
	$id = $cabut['id'];
	echo "<a href=postingan.php?id=$id class=\"list-group-item\">$judul</a>
	";
}
?>
<a href="posting.html" class="list-group-item"><span class="badge">+</span>Tambah Posting</a>
</div>
</div>
</div>
</div>
<div class="col-md-4">
</div>
</div>
</div>
</div>
</body>
</html>