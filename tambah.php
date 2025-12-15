<?php
include 'koneksi.php';

if (isset($_POST['simpan'])) {
    $nama  = $_POST['nama'];
    $email = $_POST['email'];

    mysqli_query($koneksi, "INSERT INTO users VALUES ('','$nama','$email')");
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data</title>
</head>
<body>

<h2>Tambah User</h2>

<form method="post">
    Nama: <br>
    <input type="text" name="nama" required><br><br>

    Email: <br>
    <input type="email" name="email" required><br><br>

    <button type="submit" name="simpan">Simpan</button>
</form>

</body>
</html>
