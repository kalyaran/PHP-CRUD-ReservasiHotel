<?php
include '../koneksi/koneksi.php';

$id_pembayaran = $_POST['id_pembayaran'];
$id_reservasi = $_POST['id_reservasi'];
$id_customer = $_POST['id_customer'];
$total_pembayaran = $_POST['jumlah_pembayaran'];

// Query insert ke tabel pembayaran
$sqlPembayaran = "INSERT INTO pembayaran (ID_Pembayaran, ID_Reservasi, ID_Customer, Jumlah_Pembayaran) 
                  VALUES ('$id_pembayaran', '$id_reservasi', '$id_customer', '$total_pembayaran')";

if (mysqli_query($conn, $sqlPembayaran)) {
    echo "<script>
            alert('Pembayaran berhasil dengan ID: $id_pembayaran');
            window.location.href = '../index.php?page=check-in';
          </script>";
} else {
    echo "Gagal menambahkan pembayaran: " . mysqli_error($conn);
}
?>
