<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Kamar</title>
    <link rel="stylesheet" type="text/css" href="assets/style/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
<div >
    <h2 class="mb-5" style="border-bottom: 2px solid #000; padding-bottom: 10px; margin-bottom: 20px;">Buku Tamu</h2>
    <table class="table table-striped table-bordered table-hover">
    <thead class="table-secondary text-center">
        <tr>
            <th>No</th>
            <th>NIK</th>
            <th>Nama Tamu</th>
            <th>Usia</th>
            <th>Alamat</th>
            <th>Email</th>
            <th>Nomor Handphone</th>
            <th>Lama Menginap</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include $_SERVER['DOCUMENT_ROOT'] . '/Hotel/koneksi/koneksi.php';

        $sql = "SELECT customer.ID_Customer, customer.Nama_Customer, customer.Usia_Customer, customer.Alamat_Customer,
                customer.Email_Customer, customer.No_HP, customer.Lama_Menginap, kamar.ID_Kamar
                FROM customer
                LEFT JOIN kamar ON customer.ID_Kamar=kamar.ID_Kamar
                ORDER BY customer.ID_Customer ASC";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result)) {
            $no = 0;
            while ($row = mysqli_fetch_assoc($result)) {
            $no++;
        ?>
                <tr>
                    <td><?php echo $no ?></td>
                    <td><?php echo $row["ID_Customer"]; ?></td>
                    <td><?php echo $row["Nama_Customer"]; ?></td>
                    <td><?php echo $row["Usia_Customer"]; ?></td>
                    <td><?php echo $row["Alamat_Customer"]; ?></td>
                    <td><?php echo $row["Email_Customer"]; ?></td>
                    <td><?php echo $row["No_HP"]; ?></td>
                    <td><?php echo $row["Lama_Menginap"]; ?></td>
                    <td>
                        <a class="btn btn-secondary" href="/Hotel/index.php?page=buku_tamu_edit&id=<?php echo $row['ID_Customer']; ?>">Edit</a>
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

