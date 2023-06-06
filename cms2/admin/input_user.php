<?php
include "../config/koneksi.php";

// Create a new MySQLi connection
$connection = new mysqli("localhost", "root", "", "cms");

// Check for connection errors
if ($connection->connect_errno) {
    echo "Failed to connect to MySQL: " . $connection->connect_error;
    exit();
}

// Enkripsi password
$pass = md5($_POST['password']);

// Prepare the SQL statement
$query = "INSERT INTO user (id_user, password, nama_lengkap, email) VALUES (?, ?, ?, ?)";
$stmt = $connection->prepare($query);

// Bind the parameters and execute the statement
$stmt->bind_param("ssss", $_POST['id_user'], $pass, $_POST['nama_lengkap'], $_POST['email']);

if ($stmt->execute()) {
    $stmt->close();
    $connection->close();
    header('location: tampil_user.php');
    exit();
} else {
    echo "Gagal menyimpan data: " . $connection->error;
}

$stmt->close();
$connection->close();
?>
