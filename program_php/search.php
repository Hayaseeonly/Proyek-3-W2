<?php
include 'connect.php';

// Default query
$query = "SELECT * FROM biodata";


if (isset($_GET['cari'])) {
    $nim = $_GET['cari'];
    $query = "SELECT * FROM biodata WHERE NIM LIKE '%$nim%'";
}

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

    <a href="create_data.php">+ Tambah Data</a>
    <br><br>

    <!-- Form Pencarian -->
    <form method="GET" action="index.php">
        <label for="cari">Cari berdasarkan NIM:</label>
        <input type="text" name="cari" id="cari" placeholder="Masukkan NIM..." value="<?= isset($_GET['cari']) ? $_GET['cari'] : '' ?>">
        <button type="submit">Cari</button>
        <a href="index.php">Reset</a>
    </form>
    <br>

    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>Umur</th>
            <th>Aksi</th>
        </tr>

        <?php if(mysqli_num_rows($result) > 0): ?>
            <?php while($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?= $row['ID']; ?></td>
                    <td><?= $row['NAMA']; ?></td>
                    <td><?= $row['NIM']; ?></td>
                    <td><?= $row['UMUR']; ?></td>
                    <td>
                        <a href="delete.php?id=<?= $row['ID']; ?>" onclick="return confirm('Yakin hapus data ini?')">Hapus</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="5">Data tidak ditemukan</td>
            </tr>
        <?php endif; ?>
    </table>
</body>
</html>
