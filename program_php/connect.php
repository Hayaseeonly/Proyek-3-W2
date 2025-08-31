<?php
$host = "localhost";
$user = "root";   
$pass = "";          
$db   = "proyek3-w2";    

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
