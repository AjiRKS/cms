<?php

include "../config/koneksi.php"; // Assuming the file contains the database connection

// Use MySQLi or PDO for database operations

// Assuming you are using MySQLi
$connection = new mysqli("localhost", "root", "", "cms");

if ($connection->connect_errno) {
    die("Failed to connect to MySQL: " . $connection->connect_error);
}

$id = $_GET['id']; // Sanitize and validate this value before using it in the query

$edit = $connection->query("SELECT * FROM user WHERE id_user = '$id'");

if (!$edit) {
    die("Error in query: " . $connection->error);
}

$r = $edit->fetch_assoc();

echo "<h2>Edit User</h2>
<form method='POST' action='update_user.php'>
<input type='hidden' name='id' value='" . $r['id_user'] . "'>
<table>
<tr><td>Username</td> <td> : <input type='text' name='username' value='" . $r['id_user'] . "'></td></tr>
<tr><td>Password</td> <td> : <input type='password' name='password'> *) </td></tr>
<tr><td>Nama Lengkap</td> <td> : <input type='text' name='nama_lengkap' size='30' value='" . $r['nama_lengkap'] . "'></td></tr>
<tr><td>E-mail</td> <td> : <input type='text' name='email' size='30' value='" . $r['email'] . "'></td></tr>
<tr><td colspan='2'>*) Apabila password tidak diubah, dikosongkan saja.</td></tr>
<tr><td colspan='2'><input type='submit' value='Update'>
<input type='button' value='Batal' onclick='self.history.back()'></td></tr>
</table>
</form>";

$connection->close();
?>
