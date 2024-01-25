<?php
session_start();
require '../koneksi.php';

if (!isset($_SESSION['username'])) {
    echo "<script>alert('Silahkan Login Terlebih dahulu');window.location='../login/login.php';</script>";
}

$id_petugas = $_GET['id_petugas'];

$query = mysqli_query($koneksi, "SELECT * FROM petugas WHERE id_petugas = '$id_petugas'");
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
    <title>Aplikasi Pinjam buku | Form Tambah Petugas</title>
</head>

<body>
    <?php require '../template/navbar.php'; ?>
    <div class="container">
        <div class="card-tittle">
            <h2>Edit Data Petugas</h2>
        </div>
        <div class="row">
            <form action="proseseditpetugas.php" method="post">
                <div class="input-group">
                    <label for="">ID Petugas</label>
                    <input type="number" value="<?php echo $row['id_petugas']; ?>" readonly name="id_petugas">
                </div>
                <div class="input-group">
                    <label for="">Nama Petugas</label>
                    <input type="text" value="<?php echo $row['nama_petugas']; ?>" name="nama_petugas">
                </div>
                <div class="input-group">
                    <label for="">No Telfon</label>
                    <input type="number" value="<?php echo $row['no']; ?>" name="no">
                </div>
                <div class="input-group">
                    <label for="">Passsword</label>
                    <input type="text" value="<?php echo $row['password']; ?>" name="password">
                </div>
                <div class="input-group">
                    <label for="">Level User</label>

                    <?php
                    if ($row['leveluser'] == 'admin') { ?>
                        <Select name="leveluser">
                            <option value="petugas">Petugas</option>
                            <option selected value="admin">Admin</option>
                        </Select>
                    <?php
                    } else { ?>
                        <Select name="leveluser">
                            <option selected value="petugas">Petugas</option>
                            <option value="admin">Admin</option>
                        </Select>
                    <?php
                    } ?>
                </div>
                <div class="input-group">
                    <input type="submit"  name="submit">
                    <a href="../view/petugas.php" class="btn-batal">BATAL</a>
                </div>
                
            </form>
        </div>
    </div>

    <!-- JavaScript -->
    <script src="../js/script.js"></script>
</body>

</html>