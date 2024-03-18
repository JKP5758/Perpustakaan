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
    <link rel="stylesheet" href="../css/tableview.css">
    <link rel="stylesheet" href="../css/navbar.css">

    <title>Aplikasi Pembayaran SPP | History</title>
</head>

<body>
    <?php require "../template/navbar.php"; ?>

    <div class="container">
        <div class="card-tittle">
            <h4>History</h4>
        </div>
        <?php
        if ($_SESSION['leveluser'] == 'siswa') {
            echo "";
        } else { ?>
            <div class="cari-bulan">
                <form action="" method="get">
                    <!--<label for="">Bulan</label>-->
                    <select name="id_user" id="">
                        <option value="0">Pilih ID</option>
                        <?php
                        $hasil_id = mysqli_query($koneksi, "SELECT * FROM user");
                        while ($rowID = mysqli_fetch_assoc($hasil_id)) {
                        ?>    
                        
                        <option value="<?=$rowID["id_user"];?>">
                            <?=$rowID["id_user"];?>
                        </option>
                        
                        <?php
                        }
                        ?>

                    </select>
                    <button type="submit"> Cari </button>
                </form>
            </div>
        <?php } ?>
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Nama Buku</th>
                        <th>Jumlah Buku</th>
                        <th>Nama Petugas</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $id_user = $_GET['id_user'];
                    $i = 1;
                    if (isset($id_user)) {
                        if ($_SESSION['leveluser'] == 'admin' || $_SESSION['leveluser'] == 'petugas') {
                            if ($id_user == "0"){
                                $query = mysqli_query($koneksi, "SELECT user.nama, buku.nama_buku, petugas.nama_petugas, data_history.tanggal, data_history.jumlah, data_history.status FROM data_history INNER JOIN user ON data_history.id_user = user.id_user INNER JOIN buku ON data_history.id_buku = buku.id_buku INNER JOIN petugas ON data_history.id_petugas = petugas.id_petugas ORDER BY `data_history`.`tanggal` DESC");
                            } else {
                                $query = mysqli_query($koneksi, "SELECT user.nama, buku.nama_buku, petugas.nama_petugas, data_history.tanggal, data_history.jumlah, data_history.status FROM data_history INNER JOIN user ON data_history.id_user = user.id_user INNER JOIN buku ON data_history.id_buku = buku.id_buku INNER JOIN petugas ON data_history.id_petugas = petugas.id_petugas WHERE data_history.id_user = '$id_user' ORDER BY `data_history`.`tanggal` DESC");
                            }

                            $baris = mysqli_num_rows($query);
                            if ($baris == 0) {
                    ?>
                                <td colspan="7">Tidak ada data</td>
                                <?php
                            } else {
                                while ($data = mysqli_fetch_assoc($query)) {
                                ?>
                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $data['nama']; ?></td>
                                            <td><?php echo $data['nama_buku']; ?></td>
                                            <td><?php echo $data['jumlah']?></td>
                                            <td><?php echo $data['nama_petugas']; ?></td>
                                            <td><?php echo $data['tanggal']; ?></td>
                                            <td><?php echo $data['status']; ?></td>
                                        </tr>
                                    <?php
                                    
                                }
                            }
                        }
                    } else {
                        if ($_SESSION['leveluser'] == 'admin' || $_SESSION['leveluser'] == 'petugas') {
                            $query = mysqli_query($koneksi, "SELECT user.nama, buku.nama_buku, petugas.nama_petugas, data_history.tanggal, data_history.jumlah, data_history.status FROM data_history INNER JOIN user ON data_history.id_user = user.id_user INNER JOIN buku ON data_history.id_buku = buku.id_buku INNER JOIN petugas ON data_history.id_petugas = petugas.id_petugas ORDER BY id DESC");
                            while ($data = mysqli_fetch_assoc($query)) {
                                
                                    ?>
                                    <tr>
                                        <td><?php echo $i++; ?></td>
                                        <td><?php echo $data['nama']; ?></td>
                                        <td><?php echo $data['nama_buku']; ?></td>
                                        <td><?php echo $data['jumlah']?></td>
                                        <td><?php echo $data['nama_petugas']; ?></td>
                                        <td><?php echo $data['tanggal']; ?></td>
                                        <td><?php echo $data['status']; ?></td>
                                    </tr>
                                <?php
                                
                            }
                        } else if ($_SESSION['leveluser'] == 'siswa') {
                            $nis = $_SESSION['nis'];
                            $query = mysqli_query($koneksi, "SELECT * FROM tb_pembayaran INNER JOIN tb_siswa using(nis) WHERE nis='$nis' ");
                            while ($data = mysqli_fetch_assoc($query)) {

                                ?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo $data['nama']; ?></td>
                                    <td><?php echo $data['tgl_bayar']; ?></td>
                                    <td><?php echo $data['bulan']; ?></td>
                                    <td><?php echo $data['tahun']; ?></td>
                                    <td><?php echo $data['status']; ?></td>
                                </tr>
                    <?php

                            }
                        }
                    } //Penutupan Isset
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php
    require "../template/footer.php";
    ?>
    <script src="../js/script.js"></script>
</body>

</html>