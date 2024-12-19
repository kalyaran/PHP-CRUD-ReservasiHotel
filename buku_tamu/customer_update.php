<?php
include $_SERVER['DOCUMENT_ROOT'] . '/Hotel/koneksi/koneksi.php';

if (isset($_GET['id'])) {
    $id_customer = $_GET['id'];

    // Ambil data customer berdasarkan ID
    $sql = "SELECT * FROM customer WHERE ID_Customer = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_customer);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $customer = $result->fetch_assoc();
    } else {
        echo "Data tidak ditemukan.";
        exit;
    }
} else {
    echo "ID tidak ditemukan.";
    exit;
}

// Proses pembaruan data
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_customer = $_POST['nama_customer'];
    $usia_customer = $_POST['usia_customer'];
    $alamat_customer = $_POST['alamat_customer'];
    $email_customer = $_POST['email_customer'];
    $no_hp = $_POST['no_hp'];

    // Update query tanpa mengubah Lama_Menginap
    $update_sql = "UPDATE customer SET Nama_Customer=?, Usia_Customer=?, Alamat_Customer=?, Email_Customer=?, No_HP=? WHERE ID_Customer=?";
    $update_stmt = $conn->prepare($update_sql);
    $update_stmt->bind_param("sisssi", $nama_customer, $usia_customer, $alamat_customer, $email_customer, $no_hp, $id_customer);

    if ($update_stmt->execute()) {
        echo "<script> alert('Data berhasil diperbarui'); 
        window.location.href = '/Hotel/index.php?page=buku_tamu'; 
        </script>";
        exit;
    } else {
        echo "Terjadi kesalahan saat memperbarui data.";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data Tamu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="">
        <h2 class="mb-3" >Edit Data Tamu</h2>
        <form method="POST" action="" class="shadow p-4 rounded bg-white">
            <div class="mb-3">
                <label for="nama_customer" class="form-label">Nama Tamu:</label>
                <input type="text" class="form-control" name="nama_customer" id="nama_customer" value="<?php echo $customer['Nama_Customer']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="usia_customer" class="form-label">Usia:</label>
                <input type="text" class="form-control" name="usia_customer" id="usia_customer" value="<?php echo $customer['Usia_Customer']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="alamat_customer" class="form-label">Alamat:</label>
                <input type="text" class="form-control" name="alamat_customer" id="alamat_customer" value="<?php echo $customer['Alamat_Customer']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="email_customer" class="form-label">Email:</label>
                <input type="email" class="form-control" name="email_customer" id="email_customer" value="<?php echo $customer['Email_Customer']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="no_hp" class="form-label">Nomor Handphone:</label>
                <input type="text" class="form-control" name="no_hp" id="no_hp" value="<?php echo $customer['No_HP']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Submit</button>
        </form>
    </div>

    <!-- Bootstrap JS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
mysqli_close($conn);
?>