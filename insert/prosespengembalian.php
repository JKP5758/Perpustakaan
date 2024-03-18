<?php
session_start();
require '../koneksi.php';

$id_pengembalian = htmlspecialchars($_POST['id_pengembalian']);
$id_user = htmlspecialchars($_POST['id_user']);
$id_buku = htmlspecialchars($_POST['id_buku']);
$id_petugas = $_SESSION['id'];
$jumlah_p = htmlspecialchars($_POST['jumlah_p']);
$jumlah_k = htmlspecialchars($_POST['jumlah_k']);
$denda_terlambat = htmlspecialchars($_POST['denda_terlambat']);
$kerusakan = htmlspecialchars($_POST['kerusakan']);
$jumlah_rusak = htmlspecialchars($_POST['jumlah_rusak']);
$denda_kerusakan = htmlspecialchars($_POST['denda_kerusakan']);
$total_denda = htmlspecialchars($_POST['total_denda']);
$tanggal_k = htmlspecialchars($_POST['tanggal_k']);


$denda_terlambat = str_replace('Rp.', '', $denda_terlambat);
$denda_kerusakan = str_replace('Rp.', '', $denda_kerusakan);
$total_denda = str_replace('Rp.', '', $total_denda);


$data_pinjam = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT jumlah_kembali FROM data_pinjam WHERE id = '$id_pengembalian'"));

$jumlah_kembali = $data_pinjam['jumlah_kembali'] + $jumlah_k;

if (empty($tanggal_k)){
    echo "<script> alert('Tanggal Kembali Tidak Boleh Kosong!!!'); window.location.href = '../view/peminjaman.php';</script> ";
} else {

    $insert = mysqli_query($koneksi, "INSERT INTO data_history (id_user, id_buku, jumlah, id_petugas, tanggal, status) VALUES ('$id_user','$id_buku','$jumlah_k','$id_petugas', '$tanggal_k','Di Kembalikan')");
    
    if ($jumlah_kembali == $jumlah_p) {
        $update = mysqli_query($koneksi, "UPDATE data_pinjam SET jumlah_kembali='$jumlah_kembali', tanggal ='$tanggal_k', status ='Di Kembalikan' WHERE id = '$id_pengembalian'");
    } else {
        $update = mysqli_query($koneksi, "UPDATE data_pinjam SET jumlah_kembali='$jumlah_kembali' WHERE  id  = '$id_pengembalian'");
    }

    
    if (isset($total_denda)) {
        $denda = mysqli_query($koneksi, "INSERT INTO data_denda (id_pinjam, id_user, denda_terlambat, jumlah_rusak, denda_rusak, total_denda) VALUES ('$id_pengembalian', '$id_user', '$denda_terlambat', '$jumlah_rusak', '$denda_kerusakan', '$total_denda')");
    }
    
    
    
    if (!isset($insert)) {
        echo "<script>alert('Masukkan Data dengan benar'); location.href='buku.php'</script>";
    } else {
        echo
        "<script>
        alert('Pengembalian Buku Berhasil'); window.location='../view/buku.php'; 
        </script>";
    }
}