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
$id = $_REQUEST['id'];
$select = mysql_query("select * from akun where id='$id'");
$ambil = mysql_fetch_array($select);
$nama = $ambil['nama'];
$img = $ambil['img'];
echo "<h3 class=\"list-group-item\"><img src=/rpl/img/$img width=25 class=\"pull-right\" data-toggle=\"modal\" data-target=\"#myModal\">$nama </h3>
<h3 class=\"list-group-item\">Username : $username</h3>
<h3 class=\"list-group-item\">Posting :</h3>";
$pilih = mysql_query("select * from postingan where nama = '$nama'");
while($cabut = mysql_fetch_array($pilih)){
	$judul = $cabut['judul'];
	$id = $cabut['id'];
	echo "<a href=postingan.php?id=$id class=\"list-group-item\">$judul</a>
	";
}
?>
<a href="/rpl/posting/posting.html" class="list-group-item"><span class="badge">+</span>Tambah Posting</a>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Pilih Avatarmu !!!</h4>
        </div>
        <div class="modal-body">
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
		  for ($i = 10; $i <= 18; $i++) { 
echo "<div class=\"col-md-1\">
<a href=/rpl/akun/suntingimg.php?i=$i.png><img src=/rpl/img/$i.png width=35></a>
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