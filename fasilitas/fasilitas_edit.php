<?php
include $_SERVER['DOCUMENT_ROOT'] . '/Hotel/koneksi/koneksi.php';

if (isset($_GET['id_fasilitas'])) {
    $id_fasilitas = $_GET['id_fasilitas'];

    $query = "SELECT * FROM fasilitas WHERE ID_Fasilitas = '$id_fasilitas'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);
    } else {
        die("Fasilitas tidak ditemukan.");
    }
} else {
    die("ID fasilitas tidak ditemukan.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Edit Fasilitas</title>
</head>
<body>
    <div style="width: 100%">
        <h2 class="mb-3">Edit Fasilitas</h2>
    <form action="/Hotel/fasilitas/fasilitas_update.php" method="POST" class="shadow p-4 rounded bg-white">

        <input type="hidden" name="id_fasilitas" value="<?= htmlspecialchars($data['ID_Fasilitas']) ?>">
        <label for="nama_fasilitas">Nama Fasilitas:</label>
        <input type="text" id="nama_fasilitas" class="form-control" name="nama_fasilitas" value="<?= htmlspecialchars($data['Nama_Fasilitas']) ?>" required>
        <br><br>
        <label for="harga_fasilitas">Harga Fasilitas:</label>
        <input type="number" id="harga_fasilitas" class="form-control" name="harga_fasilitas" value="<?= htmlspecialchars($data['Harga_Fasilitas']) ?>" required>
        <br><br>
        <button type="submit" class="btn btn-primary w-100">Submit</button>
    </form>

    </div>
    
</body>
</html>