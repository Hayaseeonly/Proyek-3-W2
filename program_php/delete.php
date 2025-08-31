<?php
include "connect.php";

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // pastikan ID berupa angka

    // cek apakah datanya ada dulu
    $cek = mysqli_query($koneksi, "SELECT * FROM biodata WHERE ID = $id");
    if (mysqli_num_rows($cek) > 0) {
        $hapus = mysqli_query($koneksi, "DELETE FROM biodata WHERE ID = $id");

        if ($hapus) {
            echo "<script>alert('Data berhasil dihapus!'); window.location='index.php';</script>";
        } else {
            echo "<script>alert('Gagal menghapus data!'); window.location='index.php';</script>";
        }
    } else {
        echo "<script>alert('Data tidak ditemukan!'); window.location='index.php';</script>";
    }
} else {
    header("Location: index.php");
    exit;
}
?>
