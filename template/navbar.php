<!-- Admin Navbar -->
<?php
if ($_SESSION['leveluser'] == "admin") {
?>
    <nav class="navbar ">
        <a href="../view/dashboard.php" class="navbar-logo">Pinjam<span> Buku</span></a>
        <div class="navbar-nav">
            <a href="../view/dashboard.php">Home</a>
            <a href="../view/user.php">User</a>
            <a href="../view/buku.php">Buku</a>
            <a href="../view/petugas.php">Petugas</a>
            <a href="../insert/pinjam.php"> Pinjam Buku</a>
            <a href="../view/peminjaman.php">Peminjaman</a>
            <a href="../view/denda.php">Denda</a>
            <a href="../view/history.php">History</a>
            <a href="../view/laporan.php">Laporan</a>
            <a href="../login/logout.php">Logout</a>
        </div>
        <div class="navbar-extra">
            <a href="#" id="hamburger-menu"><img src="../img/menu.png" alt="menu" width="30px"></a>
        </div>
    </nav>
<?php  } ?>
<!-- Akhir Admin Navbar -->

<!-- Petugas Navbar -->
<?php
if ($_SESSION['leveluser'] == "petugas") {
?>
    <nav class="navbar">
        <a href="../view/dashboard.php" class="navbar-logo">Pembayaran<span>SPP</span></a>
        <div class="navbar-nav">
            <a href="../view/dashboard.php">Home</a>
            <a href="../view/pembayaran.php">Pembayaran</a>
            <a href="../view/history.php">History Pembayaran</a>
            <!-- <a href="../view/laporan.php">Laporan</a> -->
            <a href="../login/logout.php">Logout</a>
        </div>
        <div class="navbar-extra">
            <a href="#" id="hamburger-menu"><img src="../img/menu.png" alt="menu" width="30px"></a>
        </div>
    </nav>
<?php  } ?>
<!-- Akhir Petugas Navbar -->

<!-- Siswa Navbar -->
<?php
if ($_SESSION['leveluser'] == "siswa") {
?>
    <nav class="navbar">
        <a href="../view/dashboard.php" class="navbar-logo">Pembayaran<span>SPP</span></a>
        <div class="navbar-nav">
            <a href="../view/dashboard.php">Home</a>
            <a href="../view/history.php">History Pembayaran</a>
            <a href="../login/logout.php">Logout</a>
        </div>
        <div class="navbar-extra">
            <a href="#" id="hamburger-menu"><img src="../img/menu.png" alt="menu" width="30px"></a>
        </div>
    </nav>
<?php  } ?>
<!-- Akhir Siswa Navbar -->