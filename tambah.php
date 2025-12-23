<?php
include 'koneksi.php';

if (isset($_POST['simpan'])) {
    $nama  = $_POST['nama'];
    $email = $_POST['email'];

    $fileName = null;

    if (!empty($_FILES['file']['name'])) {
        $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
        $fileName = time() . '_' . uniqid() . '.' . $ext;
        $target = "uploads/" . $fileName;

        move_uploaded_file($_FILES['file']['tmp_name'], $target);
    }

    mysqli_query(
        $koneksi,
        "INSERT INTO users (nama, email, file)
         VALUES ('$nama','$email','$fileName')"
    );

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

<form method="post" enctype="multipart/form-data">
    Nama:<br>
    <input type="text" name="nama" required><br><br>

    Email:<br>
    <input type="email" name="email" required><br><br>

    Upload File (Gambar / Video):<br>
    <input type="file" name="file"><br><br>

    <button type="submit" name="simpan">Simpan</button>
</form>

</body>
</html>
