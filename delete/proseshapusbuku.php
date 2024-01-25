<?php
session_start();
require '../koneksi.php';

$id = htmlspecialchars($_POST['id_buku']);



if (empty($id)){
    echo "<script> alert('Data Tidak Boleh Kosong!!!'); window.location.href = '../view/buku.php';</script> ";
} else {
    $insert = mysqli_query($koneksi, "DELETE FROM buku WHERE id_buku = '$id' ");

    if (!isset($insert)) {
        echo "<script>alert('Masukkan Data dengan benar'); location.href='buku.php'</script>";
    } else {
        echo
        "<script>
        alert('Data Buku Berhasil Di Hapus'); window.location='../view/buku.php'; 
        </script>";
    }
}