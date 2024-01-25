<?php
require "../koneksi.php";
session_start();
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
    <title>Data User | Aplikasi Pinjam Buku</title>
</head>

<body>
    <?php
    require "../template/navbar.php";
    ?>
    <div class="container">

        <div class="card-tittle">
            <h4>Data User</h4>
        </div>

        <div class="tambah-menu">
            <a href="../insert/user.php">Tambah Data</a>
        </div>

        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID User</th>
                        <th>Nama</th>
                        <th>Password</th>
                        <th>Alamat</th>
                        <th>No Telp</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = mysqli_query($koneksi, "SELECT * FROM user ");
                    while ($data = mysqli_fetch_assoc($query)) {
                    ?>
                        <tr>
                            <td> <?php echo $data['id_user']; ?></td>
                            <td> <?php echo $data['nama']; ?></td>
                            <td> <?php echo $data['password']; ?></td>
                            <td> <?php echo $data['alamat']; ?></td>
                            <td> <?php echo $data['no']; ?></td>
                            <td class="action">
                                <a href="../update/user.php?id_user=<?= $data['id_user']; ?>" class="btn-aksi"><img src="../img/update.png"></a>
                                <a href=" ../delete/user.php?id_user=<?= $data['id_user']; ?>" class="btn-aksi"><img src="../img/delete.png"></a>
                            </td>
                        </tr>
                    <?php } ?>
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