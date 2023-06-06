<?php
session_start(); // Memulai session

include "../config/koneksi.php";

$pass = md5($_POST['password']);
$login = mysqli_query($connection, "SELECT * FROM user WHERE id_user='{$_POST['id_user']}' AND password='$pass'");
$ketemu = mysqli_num_rows($login);
$r = mysqli_fetch_array($login);

// Apabila username dan password ditemukan (valid)
if ($ketemu > 0) {
    // Daftarkan session ke server
    $_SESSION['namauser'] = $r['id_user'];
    $_SESSION['passuser'] = $r['password'];

    header('location: content.php'); // Buka halaman tampil berita
} else {
    echo "Login gagal! Username dan password tidak benar.<br>";
    echo "<a href='form_login.php'>Ulangi Lagi</a>";
}
?>
