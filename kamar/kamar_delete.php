<!DOCTYPE html>
<html>

<head>
   <script>
      function showAlertAndRedirect(message, redirectUrl) {
         alert(message);
         setTimeout(function() {
            window.location.href = redirectUrl;
         }, 0);
      }
   </script>
</head>

<body>
   <div class="container">
      <?php
      include "../koneksi/koneksi.php";

      // Ambil data kamar berdasarkan ID
      $idKamar = $_GET['id'];
      $result = mysqli_query($conn, "SELECT Status FROM kamar WHERE ID_Kamar='$idKamar'");

      if ($result) {
         $row = mysqli_fetch_assoc($result);
         if ($row['Status'] == 0) { // Periksa jika status kamar adalah 0 atau tidak tersedia
            echo "<script>showAlertAndRedirect('Kamar tidak dapat dihapus karena statusnya tidak tersedia!', '../index.php?page=kamar');</script>";
         } else {
            // Lakukan penghapusan jika status bukan 0
            $query = mysqli_query($conn, "DELETE FROM kamar WHERE ID_Kamar='$idKamar'");
            if ($query) {
               echo "<script>showAlertAndRedirect('Data berhasil dihapus!', '../index.php?page=kamar');</script>";
            } else {
               echo "<div class='alert alert-danger'>Tidak dapat menghapus data: " . mysqli_error($conn) . "</div>";
            }
         }
      } else {
         echo "<div class='alert alert-danger'>Gagal mengambil data kamar: " . mysqli_error($conn) . "</div>";
      }
      ?>
   </div>
</body>

</html>
