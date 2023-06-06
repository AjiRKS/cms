<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "cms";

// Koneksi ke server MySQL
$connection = mysqli_connect($server, $username, $password, $database);

// Memeriksa koneksi
if (!$connection) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Kode selanjutnya...
?>
