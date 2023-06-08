<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: sign-in.php');
    exit();
}
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $no = $_GET['id'];


    if (!empty($no)) {

        $sql = "DELETE FROM barang WHERE no='$no' LIMIT 1";


        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Data barang berhasil dihapus');</script>";
        }
    } else {
        echo "<script>alert('ID Barang tidak valid');</script>";
    }
}


header("Location: listbarang.php");
exit();
?>