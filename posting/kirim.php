<?php
include "koneksi.php";
session_start();
$id = $_REQUEST['id'];
$komentar = $_POST['kirim'];
$username = $_SESSION['username'];
$cekuser = mysql_query("SELECT * FROM akun WHERE username = '$username'");
$hasil = mysql_fetch_array($cekuser);
$nama = $hasil['nama'];
$tanggal = date("Y-m-d");
$jam = date("hh:mm:ss");
$masukin = mysql_query("INSERT INTO komentar (id ,komentar ,nama ,tanggal ,jam ) values('$id', '$komentar', '$nama', '$tanggal' ,'$jam')");
if($masukin){
	header("location:/rpl/posting/postingan.php?id=$id");
}else{
	echo "gagal untuk komentar";
}
?>