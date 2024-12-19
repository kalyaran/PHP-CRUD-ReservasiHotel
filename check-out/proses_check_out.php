<?php
include $_SERVER['DOCUMENT_ROOT'] . '/Hotel/koneksi/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_customer = $_POST['id_customer'];
    $id_kamar = $_POST['id_kamar'];
    $id_reservasi = $_POST['id_reservasi'];

    $sqlDeletePembayaran = "DELETE FROM pembayaran WHERE ID_Reservasi = '$id_reservasi'";

    $sqlDeleteReservasi = "DELETE FROM reservasi WHERE ID_Reservasi = '$id_reservasi'";

    $sqlDeleteCustomer = "DELETE FROM customer WHERE ID_Customer = '$id_customer'";

    $sqlUpdateKamar = "UPDATE kamar SET Status = 1 WHERE ID_Kamar = '$id_kamar'";

    if (mysqli_query($conn, $sqlDeletePembayaran) && mysqli_query($conn, $sqlDeleteReservasi) && mysqli_query($conn, $sqlDeleteCustomer) && mysqli_query($conn, $sqlUpdateKamar)) {
        echo "<script>
            alert('Check Out Berhasil');
            window.location.href ='/Hotel/index.php?page=check-out';
          </script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request.";
}
?>
