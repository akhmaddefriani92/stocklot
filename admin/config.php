<?php
$server = "localhost";
$username = "root";
$password = "mcojaya";
$database = "dbcommerce";

// disable error message level E_NOTICE
//error_reporting(E_ALL);



// Koneksi dan memilih database di server
mysql_connect($server,$username,$password) or die("Koneksi gagal");

mysql_select_db($database) or die("Database tidak bisa dibuka");







// ================= STOP KONFIGURASI ==========================



?>
