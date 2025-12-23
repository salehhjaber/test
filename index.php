<?php
include 'koneksi.php';
$data = mysqli_query($koneksi, "SELECT * FROM users");
?>

<!DOCTYPE html>
<html>
<head>
    <title>CRUD PHP</title>
</head>
<body>

<h2>Data Users</h2>
<a href="tambah.php">+ Tambah Data</a>
<br><br>

<table border="1" cellpadding="10">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Email</th>
        <th>File</th>
        <th>Aksi</th>
    </tr>

<?php $no = 1; ?>
<?php while ($row = mysqli_fetch_assoc($data)) { ?>
<tr>
    <td><?= $no++ ?></td>
    <td><?= $row['nama'] ?></td>
    <td><?= $row['email'] ?></td>
    <td>
        <?php if ($row['file']) { ?>
            <a href="uploads/<?= $row['file'] ?>" target="_blank">Lihat</a>
        <?php } else { ?>
            -
        <?php } ?>
    </td>
    <td>
        <a href="edit.php?id=<?= $row['id'] ?>">Edit</a> |
        <a href="hapus.php?id=<?= $row['id'] ?>" onclick="return confirm('Hapus data?')">Hapus</a>
    </td>
</tr>
<?php } ?>

</table>

</body>
</html>
