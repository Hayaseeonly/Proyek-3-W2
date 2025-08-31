<?php
include "connect.php";
$query = "SELECT * FROM biodata";
$result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Daftar Biodata Mahasiswa</h2>
    <a href="biodata.php">Tambah Data</a> | 
    <a href="search.php">Cari Data</a>
    <br><br>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Umur</th>
            <th>Aksi</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
        <tr>
            <td><?= $row['id']; ?></td>
            <td><?= $row['nim']; ?></td>
            <td><?= $row['nama']; ?></td>
            <td><?= $row['umur']; ?></td>
            <td>
                <a href="update.php?id=<?= $row['id']; ?>">Update</a> | 
                <a href="delete.php?id=<?= $row['id']; ?>" onclick="return confirm('Yakin ingin menghapus?');">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
