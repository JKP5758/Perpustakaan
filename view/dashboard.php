<?php
session_start();
require "../koneksi.php";

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
    <link rel="stylesheet" href="../css/tableview.css">
    <title>Dashboard | Aplikasi Pinjam Buku</title>
</head>

<body>
    <?php require "../template/navbar.php";
    if (($_SESSION['leveluser'] == 'admin')) {
    ?>
        <div class="container">
            <div class="card-tittle">
                <h4>Welcome Back, <span><?= $_SESSION['username']; ?></span></h4>
            </div>
            <hr> <br>

            <div class="dashboard">
                <div class="baris">
                    <div class="col col-50">
                        <a href="../view/user.php">
                            <div class="card card-siswa">
                                <h3>Jumlah User</h3>
                                <?php
                                $query_user = mysqli_query($koneksi, "SELECT * FROM user");
                                $hasil_user = mysqli_num_rows($query_user);
                                ?>
                                <p class="count"><?= $hasil_user; ?></p>
                            </div>
                        </a>
                    </div>
                    <div class="col col-50">
                        <a href="../view/history.php">
                            <div class="card card-transaksi">
                                <h3>Riwayat Peminjaman Buku</h3>
                                <?php
                                $query_data_pinjam =  mysqli_query($koneksi, "SELECT * FROM data_history ");
                                $hasil_pinjam = mysqli_num_rows($query_data_pinjam);
                                ?>
                                <p class="count"><?= $hasil_pinjam; ?></p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="baris">
                    <div class="col col-50">
                        <a href="../view/buku.php">
                            <div class="card card-kelas">
                                <?php
                                    $query_total_buku =  mysqli_query($koneksi, "SELECT SUM(jumlah) FROM buku");
                                    $total_buku = mysqli_fetch_assoc($query_total_buku);
                                //$query_buku =  mysqli_query($koneksi, "SELECT * FROM buku");
                                
                                ?>
                                <h3>Total Buku</h3>
                                <p class="count"><?= $total_buku['SUM(jumlah)']; ?></p>
                            </div>
                        </a>
                    </div>
                    <div class="col col-50">
                        <a href="../view/buku.php">
                            <div class="card card-uang">
                                <?php
                                    $hasil_buku = $total_buku['SUM(jumlah)'];
                                ?>
                                <h3>Total Buku</h3>
                                <p class="count"><?= $hasil_buku; ?></p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    <?php
    } ?>
    
    <?php require "../template/navbar.php";
    if (($_SESSION['leveluser'] == 'petugas')) {
    ?>
        <div class="container">
            <div class="card-tittle">
                <h4>Welcome Back, <span><?= $_SESSION['username']; ?></span></h4>
            </div>
            <hr> <br>

            <div class="dashboard">
                <div class="baris">
                    <div class="col col-50">
                        
                            <div class="card card-siswa">
                                <h3>Jumlah Siswa</h3>
                                <?php
                                $query_siswa = mysqli_query($koneksi, "SELECT * FROM tb_siswa");
                                $hasil_siswa = mysqli_num_rows($query_siswa);
                                ?>
                                <p class="count"><?= $hasil_siswa; ?></p>
                            </div>
                        
                    </div>
                    <div class="col col-50">
                        
                            <div class="card card-transaksi">
                                <h3>Riwayat Transaksi</h3>
                                <?php
                                $query_pembayaran =  mysqli_query($koneksi, "SELECT * FROM tb_pembayaran WHERE status = 'Lunas'");
                                $hasil_pembayaran = mysqli_num_rows($query_pembayaran);
                                ?>
                                <p class="count"><?= $hasil_pembayaran; ?></p>
                            </div>
                        
                    </div>
                </div>
                <div class="baris">
                    <div class="col col-50">
                        
                            <div class="card card-kelas">
                                <?php
                                $query_kelas =  mysqli_query($koneksi, "SELECT * FROM tb_kelas");
                                $hasil_kelas = mysqli_num_rows($query_kelas);
                                ?>
                                <h3>Jumlah Kelas</h3>
                                <p class="count"><?= $hasil_kelas; ?></p>
                            </div>
                        
                    </div>
                    <div class="col col-50">
                        
                            <div class="card card-uang">
                                <?php
                                $total = 0;
                                while ($data_pembayaran = mysqli_fetch_assoc($query_pembayaran)) {
                                    $total += $data_pembayaran['jumlah'];
                                }
                                ?>
                                <h3>Jumlah Tunai</h3>
                                <p class="count">Rp. <?= number_format($total, 0, ',', '.'); ?></p>
                            </div>
                        
                    </div>
                </div>
            </div>
        </div>
    <?php
    } ?>

    <div class="container">
        <?php if (($_SESSION['leveluser'] == 'umum')) {
            $id = $_SESSION['id'];
            $query_cari = mysqli_query($koneksi, "SELECT * FROM user WHERE id = '$id'");
            $querynamakelas = "SELECT *  FROM tb_kelas INNER JOIN tb_siswa ON tb_siswa.kelas = tb_kelas.id_kelas WHERE nis='$nis' ";
            $resultcarikelas = mysqli_query($koneksi, $querynamakelas);
            $data = mysqli_fetch_assoc($query_cari);
            $namakelas = mysqli_fetch_assoc($resultcarikelas);
        ?>
            <div class="card-tittle">
                <h4>Welcome Back, <span><?= $data['nama']; ?></span></h4>
            </div>
            <hr> <br>
            <div class="biodata">
                <div class="judul-biodata">
                    <h2>Biodata Siswa</h2>
                </div>
                <div class="table-biodata">
                    <table>
                        <form action="../insert/prosespembayaran.php" method="post">
                            <tr>
                                <td>Nis</td>
                                <td>:</td>
                                <td><?= $data['nis']; ?></td>
                            </tr>
                            <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <td><?= $data['nama']; ?></td>
                            </tr>
                            <tr>
                                <td>Nisn</td>
                                <td>:</td>
                                <td><?= $data['nisn']; ?></td>
                            </tr>
                            <tr>
                                <td>Angkatan</td>
                                <td>:</td>
                                <td><?= $data['angkatan']; ?></td>
                            </tr>
                            <tr>
                                <td>Kelas</td>
                                <td>:</td>
                                <td><?= $namakelas['nama_kelas']; ?></td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>:</td>
                                <td><?= $data['alamat']; ?></td>
                            </tr>
                            <tr>
                                <td>No Telpon Ortu</td>
                                <td>:</td>
                                <td><?= $data['no_ortu']; ?></td>
                            </tr>
                        </form>
                    </table>
                </div>
                <hr>
            </div>

        <?php } ?>
    </div>
    <?php
    require "../template/footer.php";
    ?>
    <script src="../js/script.js"></script>
</body>

</html>