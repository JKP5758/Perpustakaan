<?php
session_start();
require '../koneksi.php';

$id = htmlspecialchars($_POST['id_petugas']);



if (empty($id)){
    echo "<script> alert('Data Tidak Boleh Kosong!!!'); window.location.href = '../view/petugas.php';</script> ";
} else {
    $insert = mysqli_query($koneksi, "DELETE FROM petugas WHERE id_petugas = '$id' ");

    if (!isset($insert)) {
        echo "<script>alert('Masukkan Data dengan benar'); location.href='petugas.php'</script>";
    } else {
        echo
        "<script>
        alert('Data Petugas Berhasil Di Hapus'); window.location='../view/petugas.php'; 
        </script>";
    }
}