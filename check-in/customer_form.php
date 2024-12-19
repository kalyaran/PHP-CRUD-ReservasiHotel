<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check In</title>
</head>
<body>
    <div class="col-md-15 p-4">
        <h3 class="mb-3">Tambah Data Tamu - Jenis Kamar: <?php echo htmlspecialchars($jenis_kamar); ?></h3>
        <form action="/Hotel/check-in/customer_insert.php" method="POST" class="shadow p-4 rounded bg-white">
            <input type="hidden" id="id_jenis" name="id_jenis" value="<?php echo htmlspecialchars($id_jenis); ?>">

            <div class="mb-3">
                <label for="id_customer" class="form-label">ID</label>
                <input type="text" id="id_customer" class="form-control" name="id_customer" placeholder="Masukkan ID" required>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Lengkap</label>
                <input type="text" id="nama" class="form-control" name="nama" placeholder="Masukkan Nama Lengkap" required>
            </div>
            <div class="mb-3">
                <label for="usia" class="form-label">Usia</label>
                <input type="text" id="usia" class="form-control" name="usia" placeholder="Masukkan Usia" required>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" id="alamat" class="form-control" name="alamat" placeholder="Masukkan Alamat" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" class="form-control" name="email" placeholder="Masukkan Email" required>
            </div>
            <div class="mb-3">
                <label for="no_hp" class="form-label">Nomor Handphone</label>
                <input type="text" id="no_hp" class="form-control" name="no_hp" placeholder="Masukkan Nomor Handphone" required>
            </div>
            <div class="mb-3">
                <label for="lama_menginap" class="form-label">Lama Menginap</label>
                <input type="number" id="lama_menginap" class="form-control" name="lama_menginap" placeholder="Masukkan Lama Menginap" required>
            </div>
            <div class="mb-3">
                <label for="id_kamar" class="form-label">Nomor Kamar</label>
                <select id="id_kamar" name="id_kamar" class="form-control" required>
                    <option style="color: #6c757d; text-align: center;">- Pilih Nomor Kamar -</option>
                    <?php
                        $kamar_sql = "SELECT ID_Kamar, No_Kamar FROM kamar WHERE ID_Jenis = $id_jenis AND Status = 1";
                        $result = mysqli_query($conn, $kamar_sql);

                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<option value='{$row['ID_Kamar']}'>Kamar No: {$row['No_Kamar']}</option>";
                        }
                    ?>
                </select>
            </div>

            <div>
                <button type="submit" class="btn btn-primary w-100 mb-3">Submit</button>
            </div>
        </form>
    </div>
</body>
</html>