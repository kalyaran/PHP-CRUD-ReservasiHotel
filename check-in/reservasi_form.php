<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Reservasi</title>
</head>
<body>
    <div class="col-md-15 p-4">
        <h3 class="mb-3">Check In</h3>
        <form action="/Hotel/check-in/reservasi_insert.php" method="POST" class="shadow p-4 rounded bg-white">
            <input type="hidden" name="id_customer" value="<?php echo htmlspecialchars($id_customer); ?>">

            <div class="mb-3">
                <label for="id_reservasi" class="form-label">ID Reservasi</label>
                <input type="text" id="id_reservasi" name="id_reservasi" class="form-control" placeholder="Masukkan ID" required>
            </div>
            <div class="mb-3">
                <label for="tanggal_reservasi" class="form-label">Tanggal Reservasi</label>
                <input type="date" id="tanggal_reservasi" name="tanggal_reservasi" placeholder="Masukkan Tanggal Reservasi" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="check_in" class="form-label">Tanggal Check-In</label>
                <input type="date" id="check_in" name="check_in" class="form-control" placeholder="Masukkan Tanggal Check-In" required>
            </div>
            <div class="mb-3">
                <label for="check_out" class="form-label">Tanggal Check-Out</label>
                <input type="date" id="check_out" name="check_out" class="form-control" placeholder="Masukkan Tanggal Check-Out" required>
            </div>
            <div class="mb-3">
                <label for="resepsionis" class="form-label">Resepsionis</label>
                <div>
                    <select id="resepsionis" name="resepsionis" class="form-control" required>
                        <option style="color: #6c757d; text-align: center;">- Pilih Resepsionis -</option>
                        <?php 
                            $queryResepsionis = mysqli_query($conn, "SELECT * FROM resepsionis");
                            while($r = mysqli_fetch_array($queryResepsionis)) {
                                echo "<option value='$r[ID_Resepsionis]'>$r[Nama_Resepsionis]</option>";
                            }
                        ?>
                    </select>
                </div>
            </div>
            <div class="mb-3">
                <label for="fasilitas" class="form-label">Fasilitas</label>
                <div>
                    <select id="fasilitas" name="fasilitas" class="form-control">
                        <option style="color: #6c757d; text-align: center;">- Pilih Fasilitas -</option>
                            <?php 
                                $queryFasilitas = mysqli_query($conn, "SELECT * FROM fasilitas");
                                while($f = mysqli_fetch_array($queryFasilitas)) {
                                    echo "<option value='$f[ID_Fasilitas]'>$f[Nama_Fasilitas]</option>";
                                }
                            ?>
                    </select>
                </div>
            </div>
            <div>
                <button type="submit" class="btn btn-primary w-100 mb-3">Submit</button>
            <a href="/Hotel/check-in/customer_hapus.php?ID_Customer=<?php echo htmlspecialchars($id_customer); ?>"onclick="return confirm('Yakin ingin membatalkan reservasi dan menghapus data customer?')"class="btn btn-danger w-100 mb-3">Batal</a>
            </div>

        </form>
    </div>
</body>
</html>