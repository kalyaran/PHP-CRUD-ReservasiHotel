<?php
include $_SERVER['DOCUMENT_ROOT'] . '/Hotel/koneksi/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_fasilitas = $_POST['id_fasilitas'];
    $nama_fasilitas = mysqli_real_escape_string($conn, $_POST['nama_fasilitas']);
    $harga_fasilitas = (int)$_POST['harga_fasilitas'];

    $query = "UPDATE fasilitas 
              SET Nama_Fasilitas = '$nama_fasilitas', Harga_Fasilitas = '$harga_fasilitas' 
              WHERE ID_Fasilitas = '$id_fasilitas'";

    if (mysqli_query($conn, $query)) {
        echo "<script>
            alert('Fasilitas berhasil diperbarui.');
            window.location.href = '../index.php?page=fasilitas';
          </script>";
    } else {
        die("Gagal mengupdate fasilitas: " . mysqli_error($conn));
    }
} else {
    echo "Invalid request.";
}
?>