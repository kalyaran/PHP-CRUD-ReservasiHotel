<?php
include $_SERVER['DOCUMENT_ROOT'] . '/Hotel/koneksi/koneksi.php';

if (isset($_GET['id'])) {
    $id_kamar = $_GET['id'];

    // Periksa status kamar terlebih dahulu
    $sqlCheckStatus = "SELECT Status FROM kamar WHERE ID_Kamar = '$id_kamar'";
    $resultCheckStatus = mysqli_query($conn, $sqlCheckStatus);
    $rowCheckStatus = mysqli_fetch_assoc($resultCheckStatus);

    if ($rowCheckStatus['Status'] == 0) {
        echo "<script>
                alert('Kamar sedang diisi dan tidak dapat diupdate!');
                window.location.href = '/Hotel/index.php?page=kamar';
              </script>";
        exit;
    }

    // Ambil data kamar untuk di-edit
    $sql = "SELECT * FROM kamar WHERE ID_Kamar = '$id_kamar'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        echo "<script>
                alert('Data kamar tidak ditemukan!');
                window.location.href = '/Hotel/index.php?page=kamar';
              </script>";
        exit;
    }
}

// Proses update data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $no_kamar = $_POST['no_kamar'];
    $id_jenis = $_POST['id_jenis'];

    $sqlUpdate = "UPDATE kamar SET No_Kamar = '$no_kamar', ID_Jenis = '$id_jenis' WHERE ID_Kamar = '$id_kamar'";
    if (mysqli_query($conn, $sqlUpdate)) {
        echo "<script>
                alert('Kamar berhasil diupdate!');
                window.location.href = '/Hotel/index.php?page=kamar';
              </script>";
    } else {
        echo "<div class='alert alert-danger'>Data gagal diupdate: " . mysqli_error($conn) . "</div>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Edit Kamar</title>
</head>
<body>
            <div style="width: 100%">
                <h4 class="mb-3" >Edit Kamar</h4>
                <form method="POST" action="" class="shadow p-4 rounded bg-white">
                    <div class="mb-3">
                        <label>Nomor Kamar:</label>
                        <input type="text" name="no_kamar" class="form-control" value="<?php echo $row['No_Kamar']; ?>" required />
                    </div>
            
                    <div class="form-group mb-3">
                        <label>Jenis Kamar:</label>
                        <select name="id_jenis" class="form-control" required>
                            <?php
                                $sqlJenis = "SELECT ID_Jenis, Jenis_Kamar FROM jenis";
                                $resultJenis = mysqli_query($conn, $sqlJenis);
                                while ($rowJenis = mysqli_fetch_assoc($resultJenis)) {
                                    $selected = $rowJenis['ID_Jenis'] == $row['ID_Jenis'] ? 'selected' : '';
                                    echo "<option value='{$rowJenis['ID_Jenis']}' $selected>{$rowJenis['Jenis_Kamar']}</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 mb-3">Update</button>
                </form>
            </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>