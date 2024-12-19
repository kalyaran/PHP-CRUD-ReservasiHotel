<?php 
    include $_SERVER['DOCUMENT_ROOT'] . '/Hotel/koneksi/koneksi.php';

    if (isset($_GET['ID_Jenis'])) {
        $id_jenis = $_GET['ID_Jenis'];
        
        
        $kamar_sql = "SELECT ID_Kamar, No_Kamar FROM kamar WHERE ID_Jenis = $id_jenis AND Status = 1";
        $result = mysqli_query($conn, $kamar_sql);

        
        $jenis_sql = "SELECT Jenis_Kamar FROM jenis WHERE ID_Jenis = $id_jenis";
        $jenis_result = mysqli_query($conn, $jenis_sql);
        
        if ($jenis_result && mysqli_num_rows($jenis_result) > 0) {
            $jenis_kamar = mysqli_fetch_assoc($jenis_result)['Jenis_Kamar'];
        } 
    } else {
        echo "Jenis kamar tidak ditemukan!";
        exit;
    }
?>