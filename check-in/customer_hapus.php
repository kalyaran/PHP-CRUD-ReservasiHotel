<?php
include '../koneksi/koneksi.php';

if (isset($_GET['ID_Customer'])) {
    $id_customer = $_GET['ID_Customer'];

    $queryGetKamar = "SELECT ID_Kamar FROM customer WHERE ID_Customer = '$id_customer'";
    $resultGetKamar = mysqli_query($conn, $queryGetKamar);

    if (mysqli_num_rows($resultGetKamar) > 0) {
        $row = mysqli_fetch_assoc($resultGetKamar);
        $id_kamar = $row['ID_Kamar'];

        $queryUpdateKamar = "UPDATE kamar SET Status = 1 WHERE ID_Kamar = '$id_kamar'";
        mysqli_query($conn, $queryUpdateKamar);
    }

    $sqlDelete = "DELETE FROM customer WHERE ID_Customer = '$id_customer'";
    if (mysqli_query($conn, $sqlDelete)) {
        echo "<script>
                alert('Reservasi Batal!');
                window.location.href='../index.php?page=check-in';
              </script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "ID Customer tidak ditemukan.";
}
?>