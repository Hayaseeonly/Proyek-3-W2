<?php
include "connect.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $umur = $_POST['umur'];

    // Cek nim duplikat
    $cek = mysqli_query($koneksi, "SELECT * FROM biodata WHERE nim='$nim'");
    if (mysqli_num_rows($cek) > 0) {
        $error = "NIM sudah terdaftar!";
    } else {
        mysqli_query($koneksi, "INSERT INTO biodata (nama, nim, umur) VALUES ('$nama', '$nim', '$umur')");
        header("Location: index.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Data</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Tambah Biodata Mahasiswa</h2>

    <?php if (!empty($error)): ?>
        <p style="color: red; text-align:center;"><?= $error ?></p>
    <?php endif; ?>

    <form method="POST" class="data-form">
        <label>Nama</label>
        <input type="text" name="nama" required>

        <label>NIM</label>
        <input type="text" name="nim" required>

        <label>Umur</label>
        <input type="number" name="umur" required>

        <button type="submit">Simpan</button>
        <a href="index.php">Batal</a>
    </form>
</body>
</html>
