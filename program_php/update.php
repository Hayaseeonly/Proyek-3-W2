<?php
include "connect.php";

$id = $_GET['id'];
$result = mysqli_query($koneksi, "SELECT * FROM biodata WHERE id=$id");
$data = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $umur = $_POST['umur'];

    // Cek nim duplikat (kecuali dirinya sendiri)
    $cek = mysqli_query($koneksi, "SELECT * FROM biodata WHERE nim='$nim' AND id!=$id");
    if (mysqli_num_rows($cek) > 0) {
        $error = "NIM sudah digunakan mahasiswa lain!";
    } else {
        mysqli_query($koneksi, "UPDATE biodata SET nama='$nama', nim='$nim', umur='$umur' WHERE id=$id");
        header("Location: index.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Update Data</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Update Biodata Mahasiswa</h2>

    <?php if (!empty($error)): ?>
        <p style="color: red; text-align:center;"><?= $error ?></p>
    <?php endif; ?>

    <form method="POST" class="data-form">
        <label>Nama</label>
        <input type="text" name="nama" value="<?= $data['NAMA'] ?>" required>

        <label>NIM</label>
        <input type="text" name="nim" value="<?= $data['NIM'] ?>" required>

        <label>Umur</label>
        <input type="number" name="umur" value="<?= $data['UMUR'] ?>" required>

        <button type="submit">Update</button>
        <a href="index.php">Batal</a>
    </form>
</body>
</html>
