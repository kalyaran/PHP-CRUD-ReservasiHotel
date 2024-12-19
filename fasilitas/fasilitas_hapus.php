<?php
include $_SERVER['DOCUMENT_ROOT'] . '/Hotel/koneksi/koneksi.php';

if (isset($_GET['id_fasilitas'])) {
    $id_fasilitas = $_GET['id_fasilitas'];
    $checkQuery = "SELECT COUNT(*) as count FROM reservasi WHERE ID_Fasilitas = '$id_fasilitas'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if ($checkResult) {
        $row = mysqli_fetch_assoc($checkResult);

        if ($row['count'] > 0) {
            echo "<script>
                alert('Fasilitas sedang digunakan oleh customer dan tidak dapat dihapus.');
                window.location.href = '../index.php?page=fasilitas';
                </script>";
        } else {
            $deleteQuery = "DELETE FROM fasilitas WHERE ID_Fasilitas = '$id_fasilitas'";

            if (mysqli_query($conn, $deleteQuery)) {
                echo "<script>
                    alert('Fasilitas berhasil dihapus.');
                    window.location.href = '../index.php?page=fasilitas';
                  </script>";
            } else {
                die("Gagal menghapus fasilitas: " . mysqli_error($conn));
            }
        }
    } else {
        die("Gagal memeriksa fasilitas: " . mysqli_error($conn));
    }
} else {
    die("ID fasilitas tidak ditemukan.");
}
?>