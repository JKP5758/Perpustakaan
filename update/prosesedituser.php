<?php
session_start();
require '../koneksi.php';

$id = htmlspecialchars($_POST['id_user']);
$nama = htmlspecialchars($_POST['nama']);
$password = htmlspecialchars($_POST['password']);
$alamat = htmlspecialchars($_POST['alamat']);
$no = htmlspecialchars($_POST['no']);


if (empty($id) || empty($nama) || empty($password) || empty($alamat) || empty($no)){
    echo "<script> alert('Data Tidak Boleh Kosong!!!'); window.location.href = '../view/user.php';</script> ";
} else {
    $insert = mysqli_query($koneksi, "UPDATE `user` SET `nama`='$nama',`password`='$password',`alamat`='$alamat',`no`='$no' WHERE id_user = '$id'");

    if (!isset($insert)) {
        echo "<script>alert('Masukkan Data dengan benar'); location.href='user.php'</script>";
    } else {
        echo
        "<script>
        alert('Data User Berhasil Masuk'); window.location='../view/user.php'; 
        </script>";
    }
}