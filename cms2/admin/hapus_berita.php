<?php
include "../config/koneksi.php";
mysqli_query($connection, "DELETE FROM berita WHERE id_berita='$_GET[id]'");
header('location:tampil_berita.php');
?>
