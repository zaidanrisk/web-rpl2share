<?php
$host="localhost";
$username="root";
$password="";
$database="rpl2share";
$koneksi=mysql_connect($host, $username, $password);
$pilihdatabase = mysql_select_db($database, $koneksi);
?>
