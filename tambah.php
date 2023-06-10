<?php
    include 'connect.php';

    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $no_hp = $_POST['no_hp'];
    $tanggal_masuk = $_POST['tanggal_masuk'];
    $kamar = $_POST['kamar'];
    $lama_penyewaan = $_POST['lama_penyewaan'];
    $status = $_POST['status'];


    if (isset($_POST['tombol_simpan'])) {   
    $query = "INSERT INTO datapenyewa VALUES ('$nama','$email','$no_hp','$tanggal_masuk','$kamar','$lama_penyewaan','$status')";
    mysqli_query($conn, $query);
    }

    echo "<script>
        document.location='Data_penyewa.php';
        </script>";

?>