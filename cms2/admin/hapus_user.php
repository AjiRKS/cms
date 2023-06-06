<?php
include "../config/koneksi.php";

$id = $_GET['id']; // Sanitize and validate this value before using it in the query

$query = "DELETE FROM user WHERE id_user='$id'";
$result = mysqli_query($connection, $query);

if (!$result) {
    die("Error in query: " . mysqli_error($connection));
}

header('location: tampil_user.php');
?>
