<?php
session_start();
require_once("koneksi.php");
$username = $_POST['username'];
$password = $_POST['password'];
$admin = "zaidan21";
$cekuser = mysql_query("SELECT * FROM akun WHERE username = '$username'");
$jumlah = mysql_num_rows($cekuser);
$hasil = mysql_fetch_array($cekuser);
$pswd = $hasil['password'];
$user = $hasil['username'];
if($jumlah == 0) {
header ('location:/rpl/index.php?salah=gaada');
} else {
if($password == $pswd && $username == $user ) {
	$_SESSION['username'] = $user;
header('location:/rpl/index.php');
} else {
header ('location:/rpl/index.php?salah=salah');
}
}
if ($username == $admin ){
	header('location:/rpl/admin/admin.php');
} else{
	echo "<a href=/rpl2share/daftar/daftar.html><font color=red>PASSWORD SALAH!</font></a>";

}
?>