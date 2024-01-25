<?php
session_start();
require "../koneksi.php";
if (!isset($_SESSION['username'])) {
    echo "<script>alert('Silahkan Login Terlebih dahulu');window.location='../login/login.php';</script>";
}
// error_reporting(0);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Pinjam Buku | Form pengembalian</title>
    <!-- link CSS -->
    <link rel="stylesheet" href="../css/insert.css">
    <link rel="stylesheet" href="../css/navbar.css">
</head>

<body>
    <div class="container">
        <?php
        require "../template/navbar.php";

        $id_pengembalian = $_GET['id_pengembalian'];
        $id_user = number_format($_GET['id']);
        $nama_user = $_GET['nama_user'];
        $id_buku = $_GET['id_buku'];
        $nama_buku = $_GET['nama_buku'];
        $jumlah = number_format($_GET['jumlah']);
        $id_petugas = $_SESSION['id'];
        $nama_petugas = $_SESSION['username'];
        $tanggal_p = $_GET['tanggal'];
        /*
        $query = "SELECT * FROM tb_siswa WHERE nis='$nis'";
        $hasil = mysqli_query($koneksi, $query);
        $data = mysqli_fetch_assoc($hasil);
        */
        ?>
        <div class="pembayaran">
            <div class="card-tittle">
                <h2>Masukan Data Pengembalian</h2>

            </div>
            <div class="row">
                

                <form action="prosespembayaran.php" method="POST">
                    <div class="input-group">
                        <label for="">ID Pengembalian</label>
                        <input type="text" name="id_pengembalian" readonly value="<?= $id_pengembalian ?>">
                    </div>
                    <div class="input-group">
                        <label for="">ID User</label>
                        <input type="number" name="id_user" readonly  value="<?= $id_user ?>">
                    </div>
                    <div class="input-group">
                        <label for="">Nama User</label>
                        <input type="text" name="nama_siswa" readonly value="<?= $nama_user ?>">
                    </div>
                    <div class="input-group">
                        <label for="">Nama Buku</label>
                        <input type="text" name="nama_buku" readonly value="<?= $nama_buku ?>">
                    </div>
                    <div class="input-group">
                        <label for="">Jumlah Buku yang di Pinjam</label>
                        <input type="number" nama="jumlah_p" readonly value="<?= $jumlah ?>">
                    </div>
                    <div class="input-group">
                        <label for="">Jumlah Buku yang di Kebalikan</label>
                        <input type="number" nama="jumlah_k" value="1" min="1" max="<?= $jumlah ?>">
                    </div>
                    <div class="input-group">
                        <label>Tanggal Buku di Kembalikan</label>
                        <input type="date" name="tanggal_k"  value="">
                    </div>
                    <div class='input-group'>
                        <lable for="">Denda Keterlambatan Pengembalian</lable>
                        <input type='text'  name='denda_terlambat' readonly value="Rp.0">
                    </div>
                    <div class="input-group">
                        <label>Tingkat Kerusakan Buku</label>
                        <select name="kerusakan" id="rusak" >
                            <option value="">Kondisi Baik</option>
                            <option value="1">Kerusakan Kecil</option>
                            <option value="2">Kerusakan Sedang</option>
                            <option value="3">Kerusakan Berat</option>
                        </select>
                    </div>
                    <div class="input-group">
                        <label>Jumlah buku yang rusak?</label>
                        <input type="number" name="jumlah_rusak" id="rusak" readonly value="0" min="0" max="<?=$jumlah?>">
                    </div>
                    <div class='input-group'>
                        <lable for="">Denda Kerusakan Buku</lable>
                        <input type="text"  name='denda_kerusakan' readonly value='Rp.0'>
                    </div>
                    <div class="input-group">
                        <label>Petugas</label>
                        <input type="text" name="petugas" readonly value="<?= $nama_petugas ?>">
                    </div>
                    <div class="input-group">
                        <label>Total Denda</label>
                        <input type="text" name="total_denda" readonly value="Rp.0 ">
                    </div>
                    <div class="input-group">
                        <input class="btn-bayar" type="submit" name="bayar" value="BAYAR">
                        <a href="../view/peminjaman.php?id=<?= $id_user ?>" class="btn-batal">BATAL</a>
                    </div>
                </form>

            </div>
        </div>


    </div>

    </div>


    <!-- link Js -->
    <script src="../js/script.js"></script>
</body>

</html>