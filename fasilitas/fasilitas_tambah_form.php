<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fasilitas Hotel</title>
    <link rel="stylesheet" href="assets/style/fasilitas.css">
</head>
<body>
    <h2 class="mb-3" style="border-bottom: 2px solid #000; padding-bottom: 10px; margin-bottom: 20px;">Fasilitas Hotel</h2>

    <div class="container">
        <!-- Form Input -->
        <div class="form-container">
            <h5>Input Fasilitas </h5>
            <form action="fasilitas/fasilitas_insert.php" method="POST">
                <div class="form-group">
                    <label for="id_fasilitas">ID Fasilitas:</label>
                    <input type="text" name="id_fasilitas" placeholder="Masukan ID Fasilitas" required />
                </div>
                <div class="form-group">
                    <label for="nama_fasilitas">Nama Fasilitas:</label>
                    <input type="text" name="nama_fasilitas" placeholder="Masukan Nama Fasilitas" required />
                </div>
                <div class="form-group">
                    <label for="harga_fasilitas">Harga Fasilitas:</label>
                    <input type="number" name="harga_fasilitas" placeholder="Masukan Harga Fasilitas" required />
                </div>
                <button type="submit" name="submit">Submit</button>
            </form>
        </div>


        <!-- Tabel -->
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID Fasilitas</th>
                        <th>Nama Fasilitas</th>
                        <th>Harga Fasilitas</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- PHP Looping untuk Tabel -->
                    <?php
                    include $_SERVER['DOCUMENT_ROOT'] . '/Hotel/koneksi/koneksi.php';
                    $sql = "SELECT * FROM fasilitas";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        $no = 1;
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $no . "</td>";
                            echo "<td>" . htmlspecialchars($row['ID_Fasilitas']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['Nama_Fasilitas']) . "</td>";
                            echo "<td>" . number_format($row['Harga_Fasilitas'], 0, ',', '.') . "</td>";
                            echo "<td class='button-container'>
                                <a href='/Hotel/index.php?page=fasilitas_edit&id_fasilitas=" . htmlspecialchars($row['ID_Fasilitas']) . "'>Edit</a> 
                                <a href='fasilitas/fasilitas_hapus.php?id_fasilitas=" . htmlspecialchars($row['ID_Fasilitas']) . "'>Hapus</a>
                            </td>";
                            echo "</tr>";
                            $no++;
                        }
                    } else {
                        echo "<tr><td colspan='5'>Tidak ada data fasilitas</td></tr>";
                    }
                    mysqli_close($conn);
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>