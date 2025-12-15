<?php
include 'koneksi.php';

$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM users WHERE id='$id'");
$row = mysqli_fetch_assoc($data);

if (isset($_POST['update'])) {
    $nama  = $_POST['nama'];
    $email = $_POST['email'];

    mysqli_query($koneksi, "UPDATE users SET nama='$nama', email='$email' WHERE id='$id'");
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data</title>
</head>
<body>

<h2>Edit User</h2>

<form method="post">
    Nama: <br>
    <input type="text" name="nama" value="<?= $row['nama'] ?>" required><br><br>

    Email: <br>
    <input type="email" name="email" value="<?= $row['email'] ?>" required><br><br>

    <button type="submit" name="update">Update</button>
</form>

</body>
</html>
