<?php
session_start();
require "../koneksi.php";
error_reporting(0);
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
    <title>View Pembayaran | Aplikasi Pembayaran SPP</title>
</head>

<style>
    .table-pembayaran input {
        border: none;
    }
</style>

<body>
    <?php
    require "../template/navbar.php";
    ?>

    <div class="container">
        <div class="card-tittle">
            <h4>Data Denda</h4>
        </div>

        <div class="pencarian">
            <table>
                <form action="" method="GET">
                    <tr>
                        <td>
                            <input type="text" placeholder="Masukkan ID" autocomplete="off" name="id" list="ID">
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
                        </td>
                        <td class="cari">
                            <button class="button" name="cari"><img src="../img/search-white.png" width="20px" alt=""></button>
                        </td>
                    </tr>
                </form>
            </table>
        </div>

        <?php
        if (isset($_GET['id']) && ($_GET['id'] != '')) {
            $querycari = "SELECT *  FROM user WHERE id_user='$_GET[id]' ";
            $resultcari = mysqli_query($koneksi, $querycari);
            $data = mysqli_fetch_assoc($resultcari);
            if ($result->num_rows  ==  true) {
        ?>
                <div class="biodata">
                    <div class="judul-biodata">
                        <h2>Biodata User</h2>
                    </div>

                    <div class="table-biodata">
                        <table>
                            <form action="" method="post">
                                <tr>
                                    <td>ID</td>
                                    <td>:</td>
                                    <td><?= $data['id_user']; ?></td>
                                </tr>
                                <tr>
                                    <td>Nama</td>
                                    <td>:</td>
                                    <td><?= $data['nama']; ?></td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>:</td>
                                    <td><?= $data['alamat']; ?></td>
                                </tr>
                                <tr>
                                    <td>Nomor Telfon</td>
                                    <td>:</td>
                                    <td><?= $data['no']; ?></td>
                                </tr>
                                
                            </form>
                        </table>
                    </div>
                </div>
                <!-- Data Detail Tagihan Siswa -->
                <?php
                $id = $data['id_user'];
                $data_bayar = mysqli_query($koneksi, "SELECT data_denda.id_denda, user.nama, buku.id_buku, buku.nama_buku, petugas.id_petugas, petugas.nama_petugas, data_pinjam.tanggal, data_pinjam.jumlah_pinjam, data_pinjam.jumlah_kembali, data_pinjam.status FROM data_pinjam INNER JOIN user ON data_pinjam.id_user = user.id_user INNER JOIN buku ON data_pinjam.id_buku = buku.id_buku INNER JOIN petugas ON data_pinjam.id_petugas = petugas.id_petugas INNER JOIN data_denda ON data_denda.id_user = user.id_user WHERE data_pinjam.id_user = '105' ORDER BY id DESC;");
                $i = 1;
                ?>

                <div class="detail-siswa">
                    <div class="judul-detail">
                        <h2>Detail Denda</h2>
                    </div>

                    <div class="table-detail">
                        <table>
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Buku</th>
                                    <th>Jumlah Pinjam</th>
                                    <th>Jumlah Kembali</th>
                                    <th>Tanggal</th>
                                    <th>Petugas</th>
                                    <th>Keterangan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data_bayar as $row) { ?>
                                    <form action="">
                                        <tr>
                                            <td hidden><?= $row['id']; ?></td>
                                            <td><?= $i; ?></td>
                                            <td><?= $row['nama_buku']; ?></td>
                                            <td><?= $row['jumlah_pinjam'];?></td>
                                            <td><?= $row['jumlah_kembali'];?></td>
                                            <td><?= $row['tanggal']; ?></td>
                                            <td><?= $row['nama_petugas']; ?></td>
                                            <td><?= $row['status']; ?></td>
                                            <td>
                                                <?php
                                                if ($row['status'] == "Di Pinjam") {
                                                ?>
                                                  <a href="../insert/pengembalian.php?id=
                                                        <?= $data['id_user']; ?>
                                                        &id_pengembalian=<?= $row['id']; ?>
                                                        &nama_user=<?= $data['nama']; ?>
                                                        &id_buku=<?= $row['id_buku'];?>
                                                        &nama_buku=<?= $row['nama_buku']; ?>
                                                        &jumlah=<?= $row['jumlah_pinjam']; ?>
                                                        &tanggal=<?= $row['tanggal']; ?>

                                                        
                                                        ">Kembalikan</a>
                                                <?php
                                                } else {
                                                ?>
                                                    <h4>Selesai</h4>
                                                <?php
                                                }
                                                $i++
                                                ?>
                                            </td>

                                        </tr>
                                    </form>
                            </tbody>
                        <?php
                                    // Penutup Perulangan For Each
                                }
                        ?>
                        </table>
                        <?php


                        ?>
                    </div>
            <?php
                //  <!-- Penutup If Rows -->
            }
            // <!-- Penutup Isset -->
        } ?>
                </div>

    </div>
    <?php
    require "../template/footer.php";
    ?>
    <script src=" ../js/script.js"></script>
</body>

</html>