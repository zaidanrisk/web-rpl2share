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
 
  </style>
</head>
<body>
<div class="container">
  <?php require_once("koneksi.php");
  $nama = $_POST['namadepan'].' '.$_POST['namabelakang'];
  $jmlnama = strlen($nama);
  $username = $_POST['username'];
  $jmluser = strlen($username);
  $password = $_POST['password'];
  $jmlpwd = strlen($password);
  $img = avatar;
  if($jmlpwd == 1){
	  header("location:/rpl/index.php?hasil=gagal");
  }
  else if($jmlnama == 0){
	  header("location:/rpl/index.php?hasil=gagal");
  }
  else if($jmluser == 0){
	  header("location:/rpl/index.php?hasil=gagal");
  }else{
  $simpan = mysql_query("INSERT INTO akun(nama, username,password,img) VALUES('$nama', '$username', '$password', '$img.png')");
  if($simpan){
	  header("location:/rpl/index.php?hasil=$nama $username");
	  $_SESSION['username']= $username;
  }else{
	  	  header("location:/rpl/index.php?hasil=gagal&jumlah=$jmluser");
  }
  }
  ?>
  </div>
</body>
</html>