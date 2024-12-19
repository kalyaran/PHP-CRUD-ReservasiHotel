<?php
include $_SERVER['DOCUMENT_ROOT'] . '/Hotel/koneksi/koneksi.php';
    if (isset($_GET['ID_Customer'])) {
        $id_customer = $_GET['ID_Customer'];

        $sql_customer = "SELECT * FROM customer WHERE ID_Customer = '$id_customer'";
        $result_customer = mysqli_query($conn, $sql_customer);
        $customer = mysqli_fetch_assoc($result_customer);

        $sql_fasilitas = "SELECT * FROM fasilitas";
        $result_fasilitas = mysqli_query($conn, $sql_fasilitas);
    } else {
        echo "ID Customer tidak ditemukan!";
        exit;
    }
?>