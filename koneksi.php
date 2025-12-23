<?php
$host = "localhost";
$user = "t";
$pass = "t";
$db   = "crud_php";

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
