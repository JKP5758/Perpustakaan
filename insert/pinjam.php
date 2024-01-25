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
    <title>Aplikasi Pinjam Buku | Form Tambah User</title>
</head>

<body>
    <?php
    require '../template/navbar.php';
    ?>
    <div class="container">
        <div class="card-tittle">
            <h2>Meminjam Buku</h2>
        </div>
        <div class="row">
            <form action="prosesinsertpinjam.php" method="post">
                <div class="input-group">
                    <label for="">ID Peminjam</label>
                    <input type="text" name="id_user" autocomplete="off" list="ID">
                        <datalist id="ID">
                            <?php
                                $result = mysqli_query($koneksi, "SELECT * FROM user");
                                while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                <option value="<?php echo $row['id_user']; ?>"></option>
                            <?php
                                }
                            ?>
                        </datalist>
                </div>
                <div class="input-group">
                    <label for="">ID Buku</label>
                    <input type="text" name="id_buku" autocomplete="off" list="ID_Buku">
                        <datalist id="ID_Buku">
                            <?php
                                $result = mysqli_query($koneksi, "SELECT * FROM buku");
                                while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                <option value="<?php echo $row['id_buku']; ?>"><?php echo ' -> ' . $row['nama_buku']; ?></option>
                            <?php
                                }
                            ?>
                        </datalist>
                </div>
                <div class="input-group">
                    <label for="">Jumlah Buku</label>
                    <input type="number" value="1" name="jumlah" min="1" >
                </div>
                <div class="input-group">
                    <label for="">Petugas</label>
                    <input type="text" name="petugas" value="<?php echo $_SESSION['username']; ?>" READONLY>
                </div>
                <div class="input-group">
                    <label for="">Tanggal Pinjam</label>
                    <input type="date" id="tanggal_p" name="tanggal_p" onchange="setTanggalKembali()">
                </div>
                <div class="input-group">
                    <label for="">Tanggal Pengembalian</label>
                    <input type="date" id="tanggal_k" name="tanggal_k" readonly>
                </div>

                <div class="input-group">
                    <input type="submit">
                    <a href="../view/dashboard.php" class="btn-batal">BATAL</a>
                </div>
            </form>
        </div>
    </div>

    <!-- JavaScript -->
    <script src="../js/script.js"></script>
</body>

</html>