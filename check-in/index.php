<?php 
    if(!defined('INDEX')) die("");
    include $_SERVER['DOCUMENT_ROOT'] . '/Hotel/koneksi/koneksi.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
</head>
<body>
    <h2 class="mb-5" style="border-bottom: 2px solid #000; padding-bottom: 10px; margin-bottom: 20px;">Check In</h2>
    
    <div class="row gap-4 justify-content-center" >
        <?php 
            $sql = "SELECT j.ID_Jenis, j.Jenis_Kamar, COUNT(k.ID_Kamar) AS jumlah_tersedia
                    FROM jenis j
                    LEFT JOIN kamar k ON j.ID_Jenis = k.ID_Jenis AND k.Status = 1
                    GROUP BY j.ID_Jenis, j.Jenis_Kamar";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $id_jenis = $row['ID_Jenis'];
                    $jumlah_tersedia = $row['jumlah_tersedia'];
                    $jenis_kamar = $row['Jenis_Kamar'];

                    echo "<a class='col-sm-5' style='text-decoration: none;' href='#' onclick='handleRoomSelection($jumlah_tersedia, \"$id_jenis\")'>
                        <div class='room-card bg-warning text-white'>
                            <div>
                                
                            </div>
                            <div>
                                $jumlah_tersedia
                            </div>
                            <div>
                                $jenis_kamar
                            </div>
                        </div>
                    </a>";

                }
            }
        ?>
    </div>

    <script>
        function handleRoomSelection(jumlahTersedia, idJenis) {
            if (jumlahTersedia > 0) {
                window.location.href = '/Hotel/index.php?page=customer&ID_Jenis=' + idJenis;
            } else {
                alert("Kamar tidak tersedia! Silakan pilih jenis kamar lain.");
            }
        }
    </script>
</body>
</html>