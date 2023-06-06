<?php
session_start();
include "../config/koneksi.php";
include "../config/fungsi_indotgl.php";

// Bagian Home
if (isset($_GET['module']) && $_GET['module'] == 'home') {
    echo "<h2> Selamat Datang</h2>
    <p>Hai <b>{$_SESSION['namauser']}</b>,
    silahkan klik menu pilihan yang berada
    di sebelah kiri untuk mengelola content website.</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p align=right>Login Hari ini: ";
    echo tgl_indo(date("Y m d"));
    echo " | ";
    echo date("H:i:s");
    echo "</p>";
}
// Bagian User
elseif (isset($_GET['module']) && $_GET['module'] == 'user') {
    echo "<h2>User</h2>
    <form method=POST action='?act=tambahuser'>
    <p><input type=submit value='Tambah User'></p>
    </form>
    <p><table>
    <tr><th>no</th><th>username</th><th>nama lengkap</th>
    <th>email</th><th>aksi</th></th></tr>";
    $tampil = mysqli_query($connection, "SELECT * FROM user ORDER BY id_user");
    $no = 1;
    while ($r = mysqli_fetch_array($tampil)) {
        echo "<tr><td>$no</td>
        <td>{$r['id_user']}</td>
        <td>{$r['nama_lengkap']}</td>
        <td><a href=mailto:{$r['email']}>{$r['email']}</a></td>
        <td><a href=?act=edituser&id={$r['id_user']}>Edit</a> |
        <a href=aksi.php?module=user&act=hapus&id={$r['id_user']}>
        Hapus</a>
        </td></tr>";
        $no++;
    }
    echo "</table></p>";
}
// Form tambah user
elseif (isset($_GET['act']) && $_GET['act'] == 'tambahuser') {
    echo "<h2>Tambah User</h2>
    <form method=POST action='aksi.php?module=user&act=input'>
    <p><table>
    <tr><td>Username</td>
    <td> : <input type=text name=id_user></td></tr>
    <tr><td>Password</td>
    <td> : <input type=text name=password></td></tr>
    <tr><td>Nama Lengkap</td> <td> :
    <input type=text name=nama_lengkap size=30></td></tr>
    <tr><td>E-mail</td> <td> :
    <input type=text name=email size=30></td></tr>
    <tr><td colspan=2><input type=submit value=Simpan>
    <input type=button value=Batal onclick=window.history.back()>
    </td></tr>
    </table></p>
    </form>";
}
// Form edit user
elseif (isset($_GET['act']) && $_GET['act'] == 'edituser') {
    $edit = mysqli_query($connection, "SELECT * FROM user
    WHERE id_user='{$_GET['id']}'");
    $r = mysqli_fetch_array($edit);
    if ($r) {
        echo "<h2>Edit User</h2>
        <form method=POST action='aksi.php?module=user&act=update'>
        <input type=hidden name=id value='{$r['id_user']}'>
        <p><table>
        <tr><td>Username</td><td> :
        <input type=text name=id_user value='{$r['id_user']}'>
        </td></tr>
        <tr><td>Password</td><td> :
        <input type=text name=password></td></tr>
        <tr><td>Nama Lengkap</td><td> :
        <input type=text name=nama_lengkap size=30
        value='{$r['nama_lengkap']}'></td></tr>
        <tr><td>E-mail</td><td> :
        <input type=text name=email size=30
        value='{$r['email']}'></td></tr>
        <tr><td colspan=2>) Apabila password tidak diubah,
        dikosongkan saja.</td></tr>
        <tr><td colspan=2><input type=submit value=Update>
        <input type=button value=Batal onclick=window.history.back()>
        </td></tr>
        </table></p>
        </form>";
    } else {
        echo "User tidak ditemukan.";
    }
}
?>
