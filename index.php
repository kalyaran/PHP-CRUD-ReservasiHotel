<?php 
	session_start();
	ob_start();
	include "koneksi/koneksi.php";

	if(empty($_SESSION['username']) or empty($_SESSION['password'])){
		echo "<p align='center'> Anda harus login terlebih dahulu!</p>";
		echo "<meta http-equiv='refresh' content='2; url=login.php'>";
	}else{
		define('INDEX', true);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="assets/style/style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
	<header class="header">
			<div class="logo">
                <img src="assets/image/lucia.jpeg" alt="Lucia Hotel">
            </div>
            <div class="header-text">
                <h1>Lucia Hotel</h1>
            </div>
            <div>
            	<a style="text-decoration: none; color: black;" href="logout.php">
            		<i class='bx bx-log-in'></i>
            		<span>Keluar</span>
            	</a>
            </div>
	</header>
	<div class="layout"> 
		<aside class="sidebar">
			<ul class="menu-header"><p>MAIN NAVIGATION</p>
				<li><a href="?page=dashboard" class="aktif">Dashboard</a></li>
				<li><a href="?page=check-in">Check In</a></li>
				<li><a href="?page=check-out">Check Out</a></li>
				<li><a href="?page=room_service">Room Services</a></li>
			</ul>
			<ul class="menu-header"><p>ADMINISTRASI HOTEL</p>
				<li><a href="?page=kamar">Kamar</a></li>
				<li><a href="?page=fasilitas">Fasilitas</a></li>
				<li><a href="?page=buku_tamu">Buku Tamu</a></li>
				
			</ul>
		</aside>
		<div class="content">				
			<?php
				if (isset($_GET['page'])) {
					$page = $_GET['page'];
					switch ($page) {
						case "dashboard":
							include "dashboard.php";
							break;
						case "check-in":
							include "check-in/index.php";
							break;
						case "check-out":
							include "check-out/index.php";
							break;
						case "room_service":
							include "room_service/index.php";
							break;	
						case "room_service_edit":
							include "room_service/edit_form.php";
							break;	
						case "kamar":
							include "kamar/index.php";
							break;											
						case "fasilitas":
							include "fasilitas/index.php";
							break;	
						case "buku_tamu":
							include "buku_tamu/index.php";
							break;
						case "buku_tamu_edit":
							include "buku_tamu/customer_update.php";
							break;
						case "customer":
							include "check-in/customer_tambah.php";
							break;				
						case "reservasi":
							include "check-in/reservasi_tambah.php";
							break;
						case "pembayaran":
							include "check-in/pembayaran_tambah.php";
							break;
						case "proses_check-out":
							include "check-out/check_out.php";
							break;
						case "kamar_tambah":
							include "kamar/kamar_input.php";
							break;
						case "kamar_edit":
							include "kamar/kamar_update.php";
							break;
						case "fasilitas_edit":
							include "fasilitas/fasilitas_edit.php";
							break;
					}
				}
			?>
		</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
	<div class="footer">
		Copyright &copy; Modifikasi by kelompok 1 A1
		</div>
</body>
</html>
<?php
}
?>