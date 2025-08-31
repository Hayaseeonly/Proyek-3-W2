<?php
include "connect.php";

if (isset($_POST['submit'])) {
    $nim  = $_POST['nim'];
    $nama = $_POST['nama'];
    $umur = $_POST['umur'];

    $sql = "INSERT INTO biodata (nim, nama, umur) VALUES ('$nim', '$nama', '$umur')";
    if (mysqli_query($koneksi, $sql)) {
        header("Location: index.php"); // balik ke tampilan utama
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Biodata</title>
</head>
<body>
    <h2>Tambah Biodata Mahasiswa</h2>
    <form action="" method="POST">
        <label>NIM:</label><br>
        <input type="text" name="nim" required><br><br>

        <label>Nama:</label><br>
        <input type="text" name="nama" required><br><br>

        <label>Umur:</label><br>
        <input type="number" name="umur" required><br><br>

        <button type="submit" name="submit">Simpan</button>
    </form>
</body>
</html>
