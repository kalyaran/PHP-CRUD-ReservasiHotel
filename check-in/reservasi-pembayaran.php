<?php
    include $_SERVER['DOCUMENT_ROOT'] . '/Hotel/koneksi/koneksi.php';
    $id_reservasi = $_GET['ID_Reservasi'];

    $sqlHarga = "SELECT c.Nama_Customer, c.ID_Customer, c.Lama_Menginap, j.Harga_Jenis_Kamar, f.Harga_Fasilitas 
                 FROM reservasi r 
                 JOIN customer c ON r.ID_Customer = c.ID_Customer
                 JOIN kamar k ON c.ID_Kamar = k.ID_Kamar 
                 JOIN jenis j ON k.ID_Jenis = j.ID_Jenis 
                 LEFT JOIN fasilitas f ON r.ID_Fasilitas = f.ID_Fasilitas 
                 WHERE r.ID_Reservasi = '$id_reservasi'";

    $result = mysqli_query($conn, $sqlHarga);
    $data = mysqli_fetch_assoc($result);

    if ($data) {
        $nama_customer = $data['Nama_Customer'];
        $id_customer = $data['ID_Customer'];
        $lama_menginap = $data['Lama_Menginap'];
        $harga_kamar = $data['Harga_Jenis_Kamar'];
        $harga_fasilitas = $data['Harga_Fasilitas'] ?? 0;

        $total_pembayaran = ($lama_menginap * $harga_kamar) + $harga_fasilitas;
    } else {
        echo "Data tidak ditemukan.";
        exit;
    }
?>
