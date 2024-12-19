<?php
    include $_SERVER['DOCUMENT_ROOT'] . '/Hotel/koneksi/koneksi.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id_customer = $_POST['id_customer'];
        $nama = $_POST['nama'];
        $usia = $_POST['usia'];
        $alamat = $_POST['alamat'];
        $email = $_POST['email'];
        $no_hp = $_POST['no_hp'];
        $lama_menginap = $_POST['lama_menginap'];
        $id_jenis = $_POST['id_jenis'];
        $id_kamar = $_POST['id_kamar'];

        $sqlInsertCustomer = "INSERT INTO customer (ID_Customer, Nama_Customer, Usia_Customer, Alamat_Customer, Email_Customer, No_HP, Lama_Menginap, ID_Kamar) 
                VALUES ('$id_customer', '$nama', '$usia', '$alamat', '$email', '$no_hp', '$lama_menginap', '$id_kamar')";
        
        if (mysqli_query($conn, $sqlInsertCustomer)) {
            $sqlUpdateKamar = "UPDATE kamar SET Status = 0 WHERE ID_Kamar = '$id_kamar'";
            if (mysqli_query($conn, $sqlUpdateKamar)) {
                // Menggunakan JavaScript untuk redirect ke halaman dengan query string
                echo "<script>
                    let idCustomer = '$id_customer';
                    let idKamar = '$id_kamar';
                    window.location.href = '../index.php?page=reservasi&ID_Customer=' + idCustomer + '&ID_Kamar=' + idKamar;
                </script>";
                exit;

            } else {
                echo "<script>alert('Error updating room status: " . mysqli_error($conn) . "');</script>";
            }
            
        } else {
            echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
        }
    }
?>