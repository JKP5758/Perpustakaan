<?php
session_start();
require '../koneksi.php';

$id = htmlspecialchars($_POST['id_user']);



if (empty($id)){
    echo "<script> alert('Data Tidak Boleh Kosong!!!'); window.location.href = '../view/user.php';</script> ";
} else {
    $insert = mysqli_query($koneksi, "DELETE FROM user WHERE id_user = '$id' ");

    if (!isset($insert)) {
        echo "<script>alert('Masukkan Data dengan benar'); location.href='user.php'</script>";
    } else {
        echo
        "<script>
        alert('Data User Berhasil Di Hapus'); window.location='../view/user.php'; 
        </script>";
    }
}