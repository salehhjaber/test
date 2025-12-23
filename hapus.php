<?php
include 'koneksi.php';

$id = $_GET['id'];

$data = mysqli_query($koneksi, "SELECT file FROM users WHERE id='$id'");
$row = mysqli_fetch_assoc($data);

if ($row['file']) {
    unlink("uploads/" . $row['file']);
}

mysqli_query($koneksi, "DELETE FROM users WHERE id='$id'");
header("Location: index.php");
