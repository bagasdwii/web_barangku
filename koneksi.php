<?php
$servername = 'sql305.infinityfree.com';
$username_db = 'if0_34372373';
$password_db = 'rTSKSL3DNxmayNM';
$dbname = 'if0_34372373_db_barang';

$conn = new mysqli($servername, $username_db, $password_db, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>