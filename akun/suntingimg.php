<?php
session_start();
include "koneksi.php";
$i = $_REQUEST['i'];
$jenis = $_REQUEST['jenis'];
$username = $_SESSION['username'];
$pilih = mysql_query("select * from akun where username='$username'");
$ambil = mysql_fetch_array($pilih);
$id = $ambil['id'];
$update = mysql_query("update akun set img='$i' where username='$username'");
if($update){
	header("location:/rpl/pasca login/pascalogin.php?id=$id&jenis=$jenis");
}else{
	echo "gagal update";
}
?>