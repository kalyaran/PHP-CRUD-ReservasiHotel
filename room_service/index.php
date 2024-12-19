<?php
include $_SERVER['DOCUMENT_ROOT'] . '/Hotel/koneksi/koneksi.php';

// Query untuk mendapatkan data room service
$query = "
    SELECT 
        f.ID_Fasilitas,
        c.Nama_Customer,
        k.No_Kamar,
        f.Nama_Fasilitas
    FROM reservasi r
    JOIN customer c ON r.ID_Customer = c.ID_Customer
    JOIN kamar k ON c.ID_Kamar = k.ID_Kamar
    LEFT JOIN fasilitas f ON r.ID_Fasilitas = f.ID_Fasilitas
    WHERE f.Nama_Fasilitas IS NOT NULL
    ORDER BY c.Nama_Customer ASC";

$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query gagal: " . mysqli_error($conn));
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Room Service</title>
</head>
<body>
    
    <div class="">
        <h2 class="mb-5" style="border-bottom: 2px solid #000; padding-bottom: 10px; margin-bottom: 20px;">Daftar Room Service</h2>
        <table class="table table-striped table-bordered table-hover">
        <thead class="table-secondary text-center">
            <tr>
                <th>No</th>
                <th>Nama Tamu</th>
                <th>Nomor Kamar</th>
                <th>Fasilitas Digunakan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (mysqli_num_rows($result) > 0) {
                $no = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                            <td>{$no}</td>
                            <td>{$row['Nama_Customer']}</td>
                            <td>{$row['No_Kamar']}</td>
                            <td>{$row['Nama_Fasilitas']}</td>
                            <td>
                                <a class='btn btn-secondary' href='/Hotel/index.php?page=room_service_edit&id_fasilitas=" . $row['ID_Fasilitas'] . "'>Edit</a> 
                            </td>
                          </tr>";
                    $no++;
                }
            } else {
                echo "<tr>
                        <td>Tidak ada data room service tersedia.</td>
                      </tr>";
            }
            ?>
        </tbody>
    </table>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
</body>
</html>
