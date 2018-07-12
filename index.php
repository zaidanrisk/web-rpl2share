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
  .active{
  color:brown;
  }
  .btn{
  width:90px;
  }
  .form{
  float:left;
  }
  .jumbotron{
  padding-bottom: 30px;
  }
  .next1{
  float:right;
  margin-right:20px;
  }
  .modal-content{
	  width:400px;
  }
  .pull-right{
	  margin-top: 8px;
  }
  .navbar{
	  border-radius: 0px;
	  text-color: white;
  }
  #header {	
	background-color: white;
	background: url(img/hero-bg.jpg) no-repeat center top;
	margin-top: -20px;
	padding-top: 150px;
	background-attachment: relative;
	background-position: center center;
	min-height: 650px;
	width: 100%;
	
    background-size: 100%;

    background-size: cover;
}
.form1{
	width: 180px;
}
.form-control{
	margin-top: 10px;
}
#footer{
	height: 50px;
	background: #222222;
}
.copyright{
	color: white;
	text-align: center;
	font-size: 15px;
	margin-top: 6px;
}
.banner{
	margin-top: 60px;
	margin-bottom: 15px;
	color: #fff;
	font-size: 60px;
	font-weight: 900;
	letter-spacing: -1px;
}
.subtitle{
	color: #fff;
	font-size: 20px;
}
.alert{
	position: fixed;
	margin-top: 100px;
	margin-left: 450px;
	width: 400px;
}
.modalmasuk{
	top: 40px;
	left: 200px;
}
.modaldaftar{
	margin-left: 150px;
	margin-top: 80px;
}
.modal-header{
	text-align: center;
	font-size: 19px;
	border-top-left-radius: 5px;
	border-top-right-radius: 5px;
}
.masuk-content{
	width: 320px;
}
.daftar-content{
	width: 350px;
}
.modal-header h4{
	font-size: 20px;
}

  </style>
</head>
<body>
  <?php session_start();
if(!isset($_SESSION['username'])) { }
else { $username = $_SESSION['username']; }
require_once("koneksi.php");
if(isset($_REQUEST['salah'])){
echo "<div class=\"alert alert-warning\">
    <a href=\"index.php\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
    <strong>Peringatan!!</strong><br> Username/Password Salah
  </div>";
}
if(isset($_REQUEST['hasil'])){
	$hasil= $_REQUEST['hasil'];
	if($hasil == "gagal"){
		echo "<div class=\"alert alert-warning\">
    <a href=\"index.php\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
    <strong>Gagal Daftar!!</strong><br> Silahkan masukan data dengan benar
  </div>";
	}else{
		$hasil = $_REQUEST['hasil'];
		$bahan = explode(" ",$hasil);
		echo "<div class=\"alert alert-success\">
    <a href=\"index.php\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
    <strong>Selamat!</strong><br>Anda berhasil daftar!!<br>Nama : $bahan[0]<br>Username : $bahan[1]
  </div>";
	}
}
?>
<div class="navbar navbar-inverse navbar-fixed-top">
<div class="container">
<a class="navbar-brand" href="index.php">RPL2SHARE</a>
<div class="navbar-collapse collapse">
<ul class="nav navbar-nav">
  <li class="active"><a href="index.php">Home</a></li>
  <?php 
  if(!isset($_SESSION['username'])) {
	echo "<li><a href=\"kategori.php?jenis=tutorial\">Tutorial</a></li>
  <li><a href=\"kategori.php?jenis=artikel\">Artikel</a></li>
  <li><a href=\"#\">Ebook</a></li>";  }
else {echo "<li><a href=\"pasca login/pascalogin.php?jenis=tutorial\">Tutorial</a></li>
  <li><a href=\"pasca login/pascalogin.php?jenis=artikel\">Artikel</a></li>
  <li><a href=\"#\">Ebook</a></li>
"; }
  ?>
</ul>
</div>
</div>
</div>
  <div id="header">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<h1 class="banner">RPL2SHARE</h1>
					<h2 class="subtitle">SHARE WHAT YOU CAN IN HERE!!</h2>
					<form class="form1" action="masuk/cekuser.php" method="POST">
					  <div class="form-group">
					    <?php
	if(!isset($_SESSION['username'])){ 
	echo "
  <div class=\"row\">
  <div class=\"form col-sm-6\">
      <button type=\"button\" class=\"btn btn-primary btn-block\" data-toggle=\"modal\" data-target=\"#masuk\">Masuk</button>
    </div>
	<div class=\"form col-sm-6\">
	<button type=\"button\" class=\"btn btn-default btn-block\" data-toggle=\"modal\" data-target=\"#daftar\">Daftar</button>
	</div>
	";
	}else{
		$username = $_SESSION['username'];
  $cekuser = mysql_query("SELECT * FROM akun WHERE username = '$username'");
$hasil = mysql_fetch_array($cekuser);
$nama = $hasil['nama'];
	echo "Hii, <font color=#87CEFA size=4>$nama</font>";
	}
	?>
					  </div>
					  
					</form>					
				</div>
				<div class="col-lg-4 col-lg-offset-2">
					
				</div>
				
			</div>
		</div>
	</div>
	<div class="modalmasuk modal fade" id="masuk" role="dialog">
    <div class="modal-dialog">
    
      <div class="masuk-content modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
		 <h4 class="modal-title">Masuk</h4>
		  </div>
        <div class="modal-body">
          <div class="row">
<div class="masuk col-md-12">
<div class="form-group">
<form action="masuk/cekuser.php" method="POST">
<input type="text" name="username" class="form-control" placeholder="Username">
<input type="password" name="password" class="form-control" placeholder="Password">
<button type="submit" class="btn btn-primary pull-right">Masuk</button>
</form>
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
  <div class="modaldaftar modal fade" id="daftar" role="dialog">
    <div class="modal-dialog">
    
      <div class="daftar-content modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Daftar</h4>
        </div>
        <div class="modal-body">
          <div class="row">
<div class="masuk col-md-12" >
<div class="form-group">
<form action="daftar/berhasil.php" method="POST">
<div class="row">
<div class="col-md-6">
<input type="text" name="namadepan" class="nama form-control" placeholder="Nama Depan">
</div>
<div class="col-md-6">
<input type="text" name="namabelakang" class="nama form-control" placeholder="Nama Belakang">
</div>
</div>
<input type="text" name="username" class="form-control" placeholder="Username">
<input type="password" name="password" class="form-control" placeholder="Password">
<button type="submit" class="btn btn-primary pull-right">Daftar</button>
</form>
</div>
</div>
</div>
<div class="row">
<div class="col-md-12">
<h3>Footer</h3>
</div>
</div>
</body>
</html>
