<?php
include $_SERVER['DOCUMENT_ROOT'] . '/Hotel/koneksi/koneksi.php';

if (isset($_GET['id_fasilitas'])) {
    $id_fasilitas = $_GET['id_fasilitas'];

    $query = "
        SELECT 
            r.ID_Reservasi,
            f.ID_Fasilitas,
            f.Nama_Fasilitas,
            f.Harga_Fasilitas,
            c.Nama_Customer,
            k.No_Kamar
        FROM reservasi r
        JOIN customer c ON r.ID_Customer = c.ID_Customer
        JOIN kamar k ON c.ID_Kamar = k.ID_Kamar
        LEFT JOIN fasilitas f ON r.ID_Fasilitas = f.ID_Fasilitas
        WHERE f.ID_Fasilitas = '$id_fasilitas'";

    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);
    } else {
        die("Data fasilitas tidak ditemukan.");
    }
} else {
    die("ID fasilitas tidak ditemukan.");
}

$fasilitasQuery = "SELECT * FROM fasilitas";
$fasilitasResult = mysqli_query($conn, $fasilitasQuery);

if (!$fasilitasResult) {
    die("Query gagal: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Edit Fasilitas</title>
</head>
<body>
    <div style="width: 100%">
        
        <h2>Edit Fasilitas</h2>
    <form action="/Hotel/room_service/edit.php" method="POST" class="shadow p-4 rounded bg-white">
        <input type="hidden" name="id_reservasi" value="<?= $data['ID_Reservasi'] ?>">
        <input type="hidden" name="id_fasilitas_lama" value="<?= $data['ID_Fasilitas'] ?>">

        <label for="fasilitas_baru" class="mb-3">Pilih Fasilitas Baru:</label>
        <select name="id_fasilitas_baru" class="form-control mb-3"required>
            <?php while ($fasilitas = mysqli_fetch_assoc($fasilitasResult)) { ?>
                <option value="<?= $fasilitas['ID_Fasilitas'] ?>" <?= $fasilitas['ID_Fasilitas'] == $data['ID_Fasilitas'] ? 'selected' : '' ?>>
                    <?= $fasilitas['Nama_Fasilitas'] ?> (Rp <?= number_format($fasilitas['Harga_Fasilitas'], 0, ',', '.') ?>)
                </option>
            <?php } ?>
        </select>

        <button type="submit" class="btn btn-primary w-100 mb-3">Submit</button>
    </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
</body>
</html>