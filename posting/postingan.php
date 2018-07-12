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
  .pos{
	  background-color: #DCDCDC;
	  padding-bottom: 20px;
  }
  .tanggal{
	  margin-top: 10px;
	  margin-bottom : 10px;
  }
  .tengah,.well{
	  margin-top: 20px;
  }
  .pos table p{
	  text-align: justify;
	  margin: 0px;
	  }
  .hal{
	  margin-top:40px;
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
  <?php session_start();
if(!isset($_SESSION['username'])) { }
else { $username = $_SESSION['username']; }
require_once("koneksi.php");
?>
<div class="navbar navbar-inverse navbar-fixed-top">
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
</div>
  <div class="hal container">
</ul>
  <div class="row">
  <div class="col-md-12">
  <div class="tengah col-md-8">
  <div class="row">
  <div class="pos col-md-12">
 <?php
require_once("koneksi.php");
$id = $_REQUEST['id'];
$detail = "select * from postingan where id='$id'";
$detail_query = mysql_query($detail);
$hasil = mysql_fetch_array($detail_query);
$judul = $hasil['judul'];
$isi = $hasil['isi'];
$tanggal = $hasil['tanggal'];
$tanggalasli = explode("-", $tanggal);
$nama = $hasil['nama'];
echo "
<table>
<tr>
<td><h2>$judul</h2></td>
</tr>
<tr>
<td><div class=\"row\">
<div class=\"tanggal col-md-12 bg-primary\">
Oleh $nama pada tanggal $tanggalasli[2]-$tanggalasli[1]-$tanggalasli[0]
</div>
</div>
</td>
</tr>
<tr>
<td><p>$isi</p></td>
</tr>
</table>
";
?>
  </div>
  </div>
  <div class="row">
  <div class="col-md-12">
  <div class="list-group">
<h4 class="list-group-item">Komentar & Diskusi</h4>
  <?php
include "koneksi.php";
$select = mysql_query("select * from komentar where id='$id'");
while($ambil = mysql_fetch_array($select))
{
$komentar = $ambil['komentar'];
$nama = $ambil['nama'];
$tanggal = $ambil['tanggal'];
$tanggalasli = explode("-", $tanggal);
$jamawal = $ambil['jam'];
$jam = explode(":", $jamawal);
$jam0 = $jam[0] + 5;
echo "<table width=200>
<tr>
<td rowspan=3><img src=/rpl/img/avatar.png></td><td><font color=#1E90FF><b>$nama</b></font></td>
</tr>
<tr>
<td>$komentar</td>
</tr>
<tr>
<td><i>$jam0:$jam[1] $tanggalasli[2]-$tanggalasli[1]-$tanggalasli[0]<i></td><hr>
</tr>
</table>";
}
  if(!isset($_SESSION['username'])){
	echo "<p class=\"pull-right\"><kbd>login untuk berkomentar</kbd></p>";  
  }else{
	  echo "
  <form action=\"kirim.php?id=$id\" method=\"POST\"><br>
<label for=\"comment\">Komentar:</label>
  <textarea class=\"form-control\" rows=\"2\" id=\"comment\" name=kirim></textarea><br><button type=\"submit\" class=\"btn btn-primary pull-right\">Kirim</button>
  </form>";
  }
?>
</div>
  </div>
  </div>
  <div class="col-md-3">
  </div>
  </div>
  <div class="col-md-4">
  <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /.row -->
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