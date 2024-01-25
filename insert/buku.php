<?php
session_start();
require '../koneksi.php';

if (!isset($_SESSION['username'])) {
    echo "<script>alert('Silahkan Login Terlebih dahulu');window.location='../login/login.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/insert.css">
    <title>Aplikasi Pinjam Buku | Form Tambah Buku</title>
</head>

<body>
    <?php
    require '../template/navbar.php';
    ?>
    <div class="container">
        <div class="card-tittle">
            <h2>Insert Data Buku</h2>
        </div>
        <div class="row">
            <form action="prosesinsertbuku.php" method="post">
                <div class="input-group">
                    <label for="">Nama Buku</label>
                    <input type="text" name="nama_buku">
                </div>
                <div class="input-group">
                    <label for="">Nama Penulis</label>
                    <input type="text" name="nama_penulis">
                </div>
                <div class="input-group">
                    <label for="">Jumlah Buku</label>
                    <input type="number" name="jumlah_buku" min="1">
                </div>
                <div class="input-group">
                    <label for="">Deskripsi / Keterangan</label>
                    <textarea name="deskripsi"  rows="10" cols="30"></textarea>
                </div>
                <div class="input-group">
                    <input type="submit">
                    <a href="../view/buku.php" class="btn-batal">BATAL</a>
                </div>
            </form>
        </div>
    </div>

    <!-- JavaScript -->
    <script src="../js/script.js"></script>
</body>

</html>