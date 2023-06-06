<?php
session_start();
include "../config/koneksi.php";
$module = $_GET['module'];
$act = $_GET['act'];
// Menghapus data
if (isset($module) && $act == 'hapus') {
    mysqli_query($connection, "DELETE FROM " . $module . " WHERE id_" . $module . "='{$_GET['id']}'");
    header('location: media.php?module=' . $module);
}
// Input user
elseif ($module == 'user' && $act == 'input') {
    $pass = md5($_POST['password']);
    mysqli_query($connection, "INSERT INTO user(id_user, password, nama_lengkap, email) VALUES('{$_POST['id_user']}', '$pass', '{$_POST['nama_lengkap']}', '{$_POST['email']}')");
    header('location: media.php?module=' . $module);
}
// Update user
elseif ($module == 'user' && $act == 'update') {
    // Apabila password tidak diubah
    if (empty($_POST['password'])) {
        mysqli_query($connection, "UPDATE user SET id_user='{$_POST['id_user']}', nama_lengkap='{$_POST['nama_lengkap']}', email='{$_POST['email']}' WHERE id_user='{$_POST['id']}'");
    } 
    // Apabila password diubah
    else {
        $pass = md5($_POST['password']);
        mysqli_query($connection, "UPDATE user SET id_user='{$_POST['id_user']}', password='$pass', nama_lengkap='{$_POST['nama_lengkap']}', email='{$_POST['email']}' WHERE id_user='{$_POST['id']}'");
    }
    header('location: media.php?module=' . $module);
}
?>
