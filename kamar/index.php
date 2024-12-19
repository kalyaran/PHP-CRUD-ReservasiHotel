
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Kamar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
<div class="">
    <h2 class="mb-5" style="border-bottom: 2px solid #000; padding-bottom: 10px; margin-bottom: 20px;">Daftar Kamar</h2>

    <a href="/Hotel/index.php?page=kamar_tambah" class="mb-3 btn btn-primary">Tambah Kamar</a>

<table class="table table-striped table-bordered table-hover">
    <thead class="table-secondary text-center">
        <tr>
            <th>ID Kamar</th>
            <th>Nomor Kamar</th>
            <th>Jenis Kamar</th>
            <th>Harga Kamar</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include $_SERVER['DOCUMENT_ROOT'] . '/Hotel/koneksi/koneksi.php';

        $sql = "SELECT kamar.ID_Kamar, kamar.No_Kamar, jenis.Jenis_Kamar, jenis.Harga_Jenis_Kamar, 
                       IF(kamar.Status = 1, 'Tersedia', 'Tidak Tersedia') AS Status_Kamar
                FROM kamar
                LEFT JOIN jenis ON kamar.ID_Jenis = jenis.ID_Jenis
                ORDER BY kamar.ID_Kamar ASC";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
        ?>
                <tr>
                    <td><?php echo $row["ID_Kamar"]; ?></td>
                    <td><?php echo $row["No_Kamar"]; ?></td>
                    <td><?php echo $row["Jenis_Kamar"]; ?></td>
                    <td><?php echo number_format($row["Harga_Jenis_Kamar"], 0, ',', '.'); ?></td>
                    <td><?php echo $row["Status_Kamar"]; ?></td>
                    <td>
                        <a class="btn btn-secondary" href="/Hotel/index.php?page=kamar_edit&id=<?php echo $row['ID_Kamar']; ?>">Edit</a>
                        <a class="btn btn-danger" href="kamar/kamar_delete.php?id=<?php echo $row['ID_Kamar']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                    </td>
                </tr>
        <?php
            }
        } else {
            echo "<tr><td colspan='6'>Tidak ada data</td></tr>";
        }
        mysqli_close($conn);
        ?>
    </tbody>
</table>


    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>

