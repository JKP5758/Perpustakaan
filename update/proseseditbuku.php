<?php
session_start();
require '../koneksi.php';

$id = htmlspecialchars($_POST['id_buku']);
$nama_buku = htmlspecialchars($_POST['nama_buku']);
$nama_penulis = htmlspecialchars($_POST['nama_penulis']);
$jumlah = htmlspecialchars($_POST['jumlah_buku']);
$deskripsi = htmlspecialchars($_POST['deskripsi']);


if (empty($nama_buku) || empty($nama_penulis) || empty($jumlah) || empty($deskripsi)){
    echo "<script> alert('Data Tidak Boleh Kosong!!!'); window.location.href = '../view/buku.php';</script> ";
} else {
    $insert = mysqli_query($koneksi, "UPDATE `buku` SET `nama_buku`='$nama_buku',`penulis`='$nama_penulis',`jumlah`='$jumlah',`deskripsi`='$deskripsi' WHERE id_buku = '$id'");

    if (!isset($insert)) {
        echo "<script>alert('Masukkan Data dengan benar'); location.href='buku.php'</script>";
    } else {
        echo
        "<script>
        alert('Data Buku Berhasil Masuk'); window.location='../view/buku.php'; 
        </script>";
    }
}