<?php
    include $_SERVER['DOCUMENT_ROOT'] . '/Hotel/koneksi/koneksi.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id_fasilitas = $_POST['id_fasilitas'];
        $nama_fasilitas = $_POST['nama_fasilitas']; 
        $harga_fasilitas = $_POST['harga_fasilitas'];   

        $query = "INSERT INTO fasilitas (ID_Fasilitas, Nama_Fasilitas, Harga_Fasilitas)
                  VALUES ('$id_fasilitas', '$nama_fasilitas', '$harga_fasilitas')";

        if (mysqli_query($conn, $query)) {
            echo "<script>
                alert('Fasilitas berhasil ditambahkan');
                window.location.href = '../index.php?page=fasilitas';
            </script>";
        } else {
            echo "Gagal menambahkan fasilitas: " . mysqli_error($conn);
        }
    } else {
        echo "Akses tidak valid.";
    }
?>