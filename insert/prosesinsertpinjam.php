<?php
session_start();
require '../koneksi.php';

$user = htmlspecialchars($_POST['id_user']);
$buku = htmlspecialchars($_POST['id_buku']);
$jumlah = htmlspecialchars($_POST['jumlah']);
$petugas = htmlspecialchars($_POST['petugas']);
$tanggal = htmlspecialchars($_POST['tanggal_p']);

$id_petugas = $_SESSION['id'];

if (empty($user) || empty($buku) || empty($jumlah) || empty($petugas) || empty($id_petugas) || empty($tanggal)){
    echo "<script> alert('Data Tidak Boleh Kosong!!!'); window.location.href = 'pinjam.php';</script> ";
} else {
    $insert = mysqli_query($koneksi, "INSERT INTO data_pinjam (id_user, id_buku, jumlah, id_petugas, tanggal, status) VALUES ('$user','$buku','$jumlah','$id_petugas', '$tanggal','Di Pinjam')");

    $insert = mysqli_query($koneksi, "INSERT INTO data_history (id_user, id_buku, jumlah, id_petugas, tanggal, status) VALUES ('$user','$buku','$jumlah','$id_petugas', '$tanggal','Di Pinjam')");

    if (!isset($insert)) {
        echo "<script>alert('Masukkan Data dengan benar'); location.href='pinjam.php'</script>";
    } else {
        echo
        "<script>
        alert('Data Berhasil Masuk'); window.location='../view/history.php'; 
        </script>";
    }
}