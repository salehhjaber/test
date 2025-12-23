<?php
include 'koneksi.php';

$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM users WHERE id='$id'");
$row = mysqli_fetch_assoc($data);

if (isset($_POST['update'])) {
    $nama  = $_POST['nama'];
    $email = $_POST['email'];
    $fileName = $row['file'];

    if (!empty($_FILES['file']['name'])) {
        if ($row['file']) {
            unlink("uploads/" . $row['file']);
        }

        $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
        $fileName = time() . '_' . uniqid() . '.' . $ext;
        move_uploaded_file($_FILES['file']['tmp_name'], "uploads/" . $fileName);
    }

    mysqli_query(
        $koneksi,
        "UPDATE users SET
            nama='$nama',
            email='$email',
            file='$fileName'
         WHERE id='$id'"
    );

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

<form method="post" enctype="multipart/form-data">
    Nama:<br>
    <input type="text" name="nama" value="<?= $row['nama'] ?>" required><br><br>

    Email:<br>
    <input type="email" name="email" value="<?= $row['email'] ?>" required><br><br>

    File Saat Ini:<br>
    <?php if ($row['file']) { ?>
        <a href="uploads/<?= $row['file'] ?>" target="_blank">Lihat</a><br><br>
    <?php } else { ?>
        Tidak ada<br><br>
    <?php } ?>

    Ganti File:<br>
    <input type="file" name="file"><br><br>

    <button type="submit" name="update">Update</button>
</form>

</body>
</html>
