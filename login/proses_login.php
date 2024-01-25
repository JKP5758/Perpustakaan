   <?php
    session_start();
    require "../koneksi.php";

    //  Mengambil data dari Form
    $username = $_POST['id'];
    $id = $_POST['id'];
    $password = $_POST['password'];

    // Data Petugas
    $query_petugas = mysqli_query($koneksi, "SELECT * FROM petugas WHERE nama_petugas='$username' OR id_petugas='$id' AND password = '$password'");
    $cek_petugas = mysqli_num_rows($query_petugas);
    $baris_petugas = mysqli_fetch_assoc($query_petugas);


    // Data user
    $query_user = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user='$id' AND password='$password'");
    $cek_user = mysqli_num_rows($query_user);
    $baris_user = mysqli_fetch_assoc($query_user);

    if ($cek_petugas > 0) {
        $_SESSION['id'] = $baris_petugas['id_petugas'];
        $_SESSION['username'] = $baris_petugas['nama_petugas'];
        $_SESSION['leveluser'] = $baris_petugas['leveluser'];
        header("location: ../view/dashboard.php");
    } else if ($cek_user > 0) {
        $_SESSION['id_user'] = $id;
        $_SESSION['username'] = $baris_user['nama'];
        $_SESSION['leveluser'] = "umum";
        header("location:../view/dashboard.php");
    } else {
        echo "<script> alert('Username / Password Salah'); window.location.href = 'login.php';</script> ";
    }

    ?> 