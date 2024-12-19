<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
</head>
<body>
    <div class="col-md-15 p-4">
        <h2 class="mb-3">Pembayaran</h2>
        <form method="POST" class="shadow p-4 rounded bg-white" action="/Hotel/check-in/pembayaran_insert.php">
            <p>Nama Customer: <?php echo htmlspecialchars($nama_customer); ?></p>
            <p class="mb-5">Total Pembayaran: Rp. <?php echo number_format($total_pembayaran, 0, ',', '.'); ?></p>

        
            <div class="mb-3">
                <label for="id_pembayaran" class="form-label">ID Pembayaran:</label>
                <input type="text" name="id_pembayaran" id="id_pembayaran" class="form-control" placeholder="Masukkan ID" required>
            </div>

            <input type="hidden" name="id_reservasi" value="<?php echo $id_reservasi; ?>">
            <input type="hidden" name="id_customer" value="<?php echo $data['ID_Customer']; ?>">
            <input type="hidden" name="jumlah_pembayaran" value="<?php echo $total_pembayaran; ?>">

            <button type="submit" class="btn btn-primary w-100">Bayar</button>
        </form>
    </div>
</body>
</html>