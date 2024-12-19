<?php
include $_SERVER['DOCUMENT_ROOT'] . '/Hotel/koneksi/koneksi.php';

if (isset($_GET['ID_Kamar'])) {
    $id_kamar = $_GET['ID_Kamar'];

    $sql = "SELECT 
                c.ID_Customer,
                c.Nama_Customer,
                c.Alamat_Customer,
                r.ID_Reservasi,
                r.Check_In,
                r.Check_Out,
                p.Jumlah_Pembayaran,
                f.ID_Fasilitas,
                f.Nama_Fasilitas,
                k.ID_Kamar,
                k.No_Kamar,
                j.Jenis_Kamar
            FROM reservasi r
            JOIN customer c ON r.ID_Customer = c.ID_Customer
            JOIN kamar k ON c.ID_Kamar = k.ID_Kamar
            LEFT JOIN fasilitas f ON r.ID_Fasilitas = f.ID_Fasilitas
            JOIN pembayaran p ON r.ID_Reservasi = p.ID_Reservasi
            JOIN jenis j ON k.ID_Jenis = j.ID_Jenis
            WHERE k.ID_Kamar = '$id_kamar'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);
    } else {
        die("Data tidak ditemukan.");
    }
} else {
    die("ID_Kamar tidak ditemukan.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check-Out</title>
</head>
<body>
    <h2 class="mb-5" style="border-bottom: 2px solid #000; padding-bottom: 10px; margin-bottom: 20px;">Detail Check-Out</h2>
    <table class="table table-striped table-bordered table-hover">
        <head class="table-secondary">
            <tr>
                <th class="col-5">Nama Tamu</th>
                <td><?= $data['Nama_Customer'] ?></td>
            </tr>
            <tr>
                <th class="col-5">ID Customer</th>
                <td><?= $data['ID_Customer'] ?></td>
            </tr>
            <tr>
                <th class="col-5">Jenis Kamar</th>
                <td><?= $data['Jenis_Kamar'] ?></td>
            </tr>
            <tr>
                <th class="col-5">Nomor Kamar</th>
                <td><?= $data['No_Kamar'] ?></td>
            </tr>
            <tr>
                <th class="col-5">Jenis Fasilitas</th>
                <td><?= $data['Nama_Fasilitas'] ?: 'Tidak menggunakan fasilitas' ?></td>
            </tr>
            <tr>
                <th class="col-5">ID Fasilitas</th>
                <td><?= $data['ID_Fasilitas'] ?: '-' ?></td>
            </tr>
            <tr>
                <th class="col-5">Tanggal Check-In</th>
                <td><?= $data['Check_In'] ?></td>
            </tr>
            <tr>
                <th class="col-5">Tanggal Check-Out</th>
                <td><?= $data['Check_Out'] ?></td>
            </tr>
            <tr>
                <th  class="col-5">Jumlah Pembayaran</th>
                <td>Rp <?= number_format($data['Jumlah_Pembayaran'], 0, ',', '.') ?></td>
            </tr>
        </head>
    </table>
    <br>
    <form action="/Hotel/check-out/proses_check_out.php" method="POST">
        <input type="hidden" name="id_customer" value="<?= $data['ID_Customer'] ?>">
        <input type="hidden" name="id_kamar" value="<?= $data['ID_Kamar'] ?>">
        <input type="hidden" name="id_reservasi" value="<?= $data['ID_Reservasi'] ?>">
        <button type="submit" class="btn btn-primary">Check-Out</button>
    </form>
</body>
</html>