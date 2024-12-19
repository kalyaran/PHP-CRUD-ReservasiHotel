<?php
// tambah_kamar.php
include $_SERVER['DOCUMENT_ROOT'] . '/Hotel/koneksi/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_kamar = input($_POST["id_kamar"]);
    $no_kamar = input($_POST["no_kamar"]);
    $id_jenis = input($_POST["id_jenis"]);

    $sql = "INSERT INTO kamar (ID_Kamar, No_Kamar, ID_Jenis, Status) VALUES ('$id_kamar', '$no_kamar', '$id_jenis', 1)";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Kamar berhasil ditambahkan!'); window.location.href='/Hotel/index.php?page=kamar';</script>";
    } else {
        echo "<script>alert('Data gagal disimpan: " . mysqli_error($conn) . "');</script>";
    }
}

$sqlJenis = "SELECT ID_Jenis, Jenis_Kamar, Harga_Jenis_Kamar FROM jenis";
$resultJenis = mysqli_query($conn, $sqlJenis);

function input($data)
{
    return htmlspecialchars(stripslashes(trim($data)));
}
?>

<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Tambah Kamar</title>
</head>
<body>
    <div style="width:100%">
        
        <h2>Tambah Kamar</h2>
    <form action="" method="POST" class="shadow p-4 rounded bg-white">
        <div class="mb-3">
            <label>ID Kamar:</label>
            <input type="text" name="id_kamar" class="form-control" placeholder="Masukkan Id Kamar" required />
        </div>
        <div class="mb-3">
            <label>Nomor Kamar:</label>
            <input type="text" name="no_kamar" class="form-control" placeholder="Masukkan Nomor Kamar" required />
        </div>
        <div class="mb-3">
            <label>Jenis Kamar:</label>
            <select name="id_jenis" class="form-control" required>
                <option value="">Pilih Jenis Kamar</option>
                <?php while ($row = mysqli_fetch_assoc($resultJenis)) { ?>
                    <option value="<?php echo $row['ID_Jenis']; ?>">
                        <?php echo $row['Jenis_Kamar'] . " - Rp " . number_format($row['Harga_Jenis_Kamar'], 0, ',', '.'); ?>
                    </option>
                <?php } ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary w-100">Submit</button>
    </form>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>