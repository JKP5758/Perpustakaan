<?php
session_start();
require '../koneksi.php';

if (!isset($_SESSION['username'])) {
    echo "<script>alert('Silahkan Login Terlebih dahulu');window.location='../login/login.php';</script>";
}

$id_user = $_GET['id_user'];

$query = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user = '$id_user'");
$row = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/insert.css">
    <title>Aplikasi Pinjam Buku | Form TEdit User</title>
</head>

<body>
    <?php
    require '../template/navbar.php';
    ?>
    <div class="container">
        <div class="card-tittle">
            <h2>Edit Data User</h2>
        </div>
        <div class="row">
            <form action="prosesedituser.php" method="post">
                <div class="input-group">
                    <label for="">ID User</label>
                    <input type="number" value="<?php echo $row['id_user']; ?>" readonly name="id_user">
                </div>
                <div class="input-group">
                    <label for="">Nama</label>
                    <input type="text" value="<?php echo $row['nama']; ?>" name="nama">
                </div>
                <div class="input-group">
                    <label for="">Password</label>
                    <input type="text" value="<?php echo $row['password']; ?>" name="password">
                </div>
                <div class="input-group">
                    <label for="">Alamat</label>
                    <input type="text" value="<?php echo $row['alamat']; ?>" name="alamat">
                </div>
                <div class="input-group">
                    <label for="">Nomor Telfon</label>
                    <input type="number" value="<?php echo $row['no']; ?>" name="no" min="1">
                </div>
                <div class="input-group">
                    <input type="submit">
                    <a href="../view/user.php" class="btn-batal">BATAL</a>
                </div>
            </form>
        </div>
    </div>

    <!-- JavaScript -->
    <script src="../js/script.js"></script>
</body>

</html>