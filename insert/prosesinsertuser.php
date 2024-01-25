<?php
session_start();
require '../koneksi.php';

$nama = htmlspecialchars($_POST['nama']);
$password = htmlspecialchars($_POST['password']);
$alamat = htmlspecialchars($_POST['alamat']);
$no = htmlspecialchars($_POST['no']);


if (empty($nama) || empty($password) || empty($alamat) || empty($no)){
    echo "<script> alert('Data Tidak Boleh Kosong!!!'); window.location.href = '../view/user.php';</script> ";
} else {
    $insert = mysqli_query($koneksi, "INSERT INTO user (nama,password,alamat,no) VALUES ('$nama','$password','$alamat','$no')");

    if (!isset($insert)) {
        echo "<script>alert('Masukkan Data dengan benar'); location.href='user.php'</script>";
    } else {
        echo
        "<script>
        alert('Data Berhasil Masuk'); window.location='../view/user.php'; 
        </script>";
    }
}