<?php 
include $_SERVER['DOCUMENT_ROOT'] . '/Hotel/koneksi/koneksi.php';

// Query untuk menghitung jumlah kamar tersedia (Status = 1)
$queryKamarTersedia = "SELECT COUNT(*) AS JumlahTersedia FROM kamar WHERE Status = 1";
$resultKamarTersedia = mysqli_query($conn, $queryKamarTersedia);
$dataKamarTersedia = mysqli_fetch_assoc($resultKamarTersedia);
$jumlahKamarTersedia = $dataKamarTersedia['JumlahTersedia'];

// Query untuk menghitung jumlah kamar terpakai (Status = 0)
$queryKamarTerpakai = "SELECT COUNT(*) AS JumlahTerpakai FROM kamar WHERE Status = 0";
$resultKamarTerpakai = mysqli_query($conn, $queryKamarTerpakai);
$dataKamarTerpakai = mysqli_fetch_assoc($resultKamarTerpakai);
$jumlahKamarTerpakai = $dataKamarTerpakai['JumlahTerpakai'];

// Query untuk menghitung jumlah tamu
$queryJumlahTamu = "SELECT COUNT(*) AS JumlahTamu FROM customer";
$resultJumlahTamu = mysqli_query($conn, $queryJumlahTamu);
$dataJumlahTamu = mysqli_fetch_assoc($resultJumlahTamu);
$jumlahTamu = $dataJumlahTamu['JumlahTamu'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style/style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Dashboard Hotel</title>
</head>
<body class="body_dashboard">
    <h2 class="mb-5 p-2" style="border-bottom: 2px solid #000; padding-bottom: 10px; margin-bottom: 20px;">Dashboard Hotel</h2>
    <div class="row">
    	<div class="col">
			<div class="room-card bg-success text-white">	
				<i class='bx bx-bed bx-lg'></i>		
				<h3>Kamar Tersedia</h3>
				<p class="data fs-1 text-bold"><?php echo $jumlahKamarTersedia?></p>	
			</div>
		</div>
		<div class="col">
			<div class="room-card bg-warning text-white">	
				<i class='bx bxs-user bx-lg'></i>	
				<h3>Tamu</h3>
				<p class="data fs-1 text-bold"><?php echo $jumlahTamu?></p>
			</div>
		</div>
		<div class="col">
			<div class="room-card bg-danger text-white">		
				<i class='bx bx-bed bx-lg'></i>
				<h3>Kamar Terpakai</h3>
				<p class="data fs-1 text-bold"><?php echo $jumlahKamarTerpakai?></p>
			</div>
		</div>
		
	</div>
	 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>