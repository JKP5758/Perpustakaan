<?php
session_start();
require '../koneksi.php';

$id = htmlspecialchars($_POST['id_petugas']);
$nama_petugas = htmlspecialchars($_POST['nama_petugas']);
$no = htmlspecialchars($_POST['no']);
$password = htmlspecialchars($_POST['password']);
$leveluser = htmlspecialchars($_POST['leveluser']);


if (empty($nama_petugas) || empty($no) || empty($password) || empty($leveluser)){
    echo "<script> alert('Data Tidak Boleh Kosong!!!'); window.location.href = '../view/petugas.php';</script> ";
} else {
    $insert = mysqli_query($koneksi, "UPDATE `petugas` SET `nama_petugas`='$nama_petugas',`password`='$password',`no`='$no',`leveluser`='$leveluser' WHERE id_petugas = '$id'");

    if (!isset($insert)) {
        echo "<script>alert('Masukkan Data dengan benar'); location.href='petugas.php'</script>";
    } else {
        echo
        "<script>
        alert('Data Berhasil Di Update'); window.location='../view/petugas.php'; 
        </script>";
    }
}