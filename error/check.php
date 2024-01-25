<?php
session_start();
require '../koneksi.php';

$a1 = htmlspecialchars($_GET['id_petugas']);
$a2 = htmlspecialchars($_GET['tanggal']);
$a3 = htmlspecialchars($_GET['jumlah']);
$a4 = htmlspecialchars($_POST['petugas']);
$a5 = htmlspecialchars($_POST['tanggal_p']);
$a6 = htmlspecialchars($_POST['tanggal_p']);
 
?>

<table border='1'>
    <tr>
        <td>GET 01</td>
        <td><?php echo $a1;?></td>
    </tr>
    <tr>
        <td>GET 02</td>
        <td><?php echo $a2;?></td>
    </tr>
    <tr>
        <td>GET 03</td>
        <td><?php echo $a3;?></td>
    </tr>
    <tr>
        <td>POST 01</td>
        <td><?php echo $a4;?></td>
    </tr>
    <tr>
        <td>POST 02</td>
        <td><?php echo $a5;?></td>
    </tr>
    <tr>
        <td>POST 03</td>
        <td><?php echo $a6;?></td>
    </tr>
</table>