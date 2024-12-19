<?php
    include $_SERVER['DOCUMENT_ROOT'] . '/Hotel/koneksi/koneksi.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_customer = $_POST['id_customer'];
    $id_reservasi = $_POST['id_reservasi'];
    $tanggal_reservasi = $_POST['tanggal_reservasi'];
    $check_in = $_POST['check_in'];
    $check_out = $_POST['check_out'];
    $resepsionis = $_POST['resepsionis'];
    $fasilitas = $_POST['fasilitas'];
    $sqlReservasi = "INSERT INTO reservasi (ID_Customer, ID_Reservasi, Tanggal_Reservasi, Check_In, Check_Out, ID_Resepsionis, ID_Fasilitas) 
                    VALUES ('$id_customer', $id_reservasi, '$tanggal_reservasi', '$check_in', '$check_out', '$resepsionis', '$fasilitas')";
    
    if (mysqli_query($conn, $sqlReservasi)) {
        echo "<script>
            let idReservasi = '$id_reservasi'; 
            window.location.href = '../index.php?page=pembayaran&ID_Reservasi=' + idReservasi;
        </script>";
            exit;
    } else {
        echo "Gagal menambahkan reservasi: " . mysqli_error($conn);
    }
}

?>