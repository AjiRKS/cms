<?php
session_start(); // tambahkan session_start() untuk memulai sesi

include "../config/koneksi.php";

if ($_SESSION['namauser'] == 'admin') { // tambahkan tanda petik pada 'namauser'
    $sql = mysqli_query($connection, "SELECT * FROM modul ORDER BY urutan");
} else {
    $sql = mysqli_query($connection, "SELECT * FROM modul WHERE status='user' ORDER BY urutan");
}

while ($data = mysqli_fetch_array($sql)) {
    echo "<li><a href='{$data['link']}'> &#187; {$data['nama_modul']}</a></li>"; // tambahkan tanda kurung kurawal pada variabel dalam string
}
?>
