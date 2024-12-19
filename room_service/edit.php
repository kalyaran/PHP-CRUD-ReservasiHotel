<?php
include $_SERVER['DOCUMENT_ROOT'] . '/Hotel/koneksi/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_reservasi = $_POST['id_reservasi'];
    $id_fasilitas_lama = $_POST['id_fasilitas_lama'];
    $id_fasilitas_baru = $_POST['id_fasilitas_baru'];

    $queryHarga = "
        SELECT 
            (SELECT Harga_Fasilitas FROM fasilitas WHERE ID_Fasilitas = '$id_fasilitas_lama') AS Harga_Lama,
            (SELECT Harga_Fasilitas FROM fasilitas WHERE ID_Fasilitas = '$id_fasilitas_baru') AS Harga_Baru";

    $resultHarga = mysqli_query($conn, $queryHarga);
    $harga = mysqli_fetch_assoc($resultHarga);

    if ($harga) {
        $harga_lama = $harga['Harga_Lama'];
        $harga_baru = $harga['Harga_Baru'];

        $updateReservasi = "UPDATE reservasi SET ID_Fasilitas = '$id_fasilitas_baru' WHERE ID_Reservasi = '$id_reservasi'";
        $updatePembayaran = "UPDATE pembayaran SET Jumlah_Pembayaran = Jumlah_Pembayaran - $harga_lama + $harga_baru WHERE ID_Reservasi = '$id_reservasi'";

        if (mysqli_query($conn, $updateReservasi) && mysqli_query($conn, $updatePembayaran)) {
            echo "<script>
                alert('Fasilitas berhasil diupdate.');
                window.location.href = '../index.php?page=room_service';
              </script>";
        } else {
            die("Gagal mengupdate data: " . mysqli_error($conn));
        }
    } else {
        die("Gagal mengambil harga fasilitas.");
    }
} else {
    echo "Invalid request.";
}
?>