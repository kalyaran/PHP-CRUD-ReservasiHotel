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
    <h2 class="mb-5" style="border-bottom: 2px solid #000; padding-bottom: 10px; margin-bottom: 20px;">Check Out</h2>
    
    <div class="row gap-4 justify-content-center">
        <?php 
            $sql = "SELECT k.ID_Kamar, k.No_Kamar, c.Nama_Customer
                    FROM kamar k
                    JOIN customer c ON k.ID_Kamar = c.ID_Kamar
                    WHERE k.Status = 0";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $id_kamar = $row['ID_Kamar'];
                    $nomor_kamar = $row['No_Kamar'];
                    $nama_tamu = $row['Nama_Customer'];

                    echo "<a class='col-sm-5' style='text-decoration: none;' href='#' onclick='handleCheckOutSelection(\"$id_kamar\")'>
                            <div class='room-card bg-success text-white'>
                                <div>
                                $nomor_kamar
                                </div>

                                <div>
                                $nama_tamu
                                </div>

                            </div>
                            
                          </a>";
                }
            } else {
                echo "<p>Tidak ada kamar yang sedang ditempati.</p>";
            }
        ?>
    </div>

    <script>
        function handleCheckOutSelection(idKamar) {
            window.location.href = '/Hotel/index.php?page=proses_check-out&ID_Kamar=' + idKamar;
        }
    </script>
</body>
</html>