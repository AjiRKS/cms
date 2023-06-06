<?php
session_start();
include "../config/koneksi.php";
include "../config/library.php";
$lokasi_file = $_FILES['fupload']['tmp_name'];
$nama_file = $_FILES['fupload']['name'];

// Apabila ada gambar yang diupload
if (!empty($lokasi_file)) {
    move_uploaded_file($lokasi_file, "../images/foto_berita/$nama_file");

    $query = "INSERT INTO berita (judul, id_kategori, isi_berita, id_user, jam, tanggal, hari, gambar) 
              VALUES ('" . $_POST['judul'] . "', '" . $_POST['kategori'] . "', '" . $_POST['isi_berita'] . "', 
                      '" . $_SESSION['namauser'] . "', NOW(), NOW(), DAYNAME(NOW()), '$nama_file')";
} 
// Apabila tidak ada gambar yang diupload
else {
    $query = "INSERT INTO berita (judul, id_kategori, isi_berita, id_user, jam, tanggal, hari) 
              VALUES ('" . $_POST['judul'] . "', '" . $_POST['kategori'] . "', '" . $_POST['isi_berita'] . "', 
                      '" . $_SESSION['namauser'] . "', NOW(), NOW(), DAYNAME(NOW()))";
}

mysqli_query($connection, $query);

header('location: tampil_berita.php');
?>
