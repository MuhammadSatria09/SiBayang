<?php  
include 'connect.php';


if (isset($_POST['tombol_simpan'])) {   
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $no_hp = $_POST['no_hp'];
    $tanggal_masuk = $_POST['tanggal_masuk'];
    $kamar = $_POST['kamar'];
    $lama_penyewaan = $_POST['lama_penyewaan'];
    $status = $_POST['status'];

    $query = "UPDATE `datapenyewa` SET 
    nama= '$nama',
    email= '$email',
    no_hp= '$no_hp',
    tanggal_masuk= '$tanggal_masuk',
    kamar= '$kamar',
    lama_penyewaan= '$lama_penyewaan',
    status= '$status'
    WHERE kamar = $_GET[id]";

    mysqli_query($conn, $query);
    }

echo "<script>
document.location='index.php';
</script>"
?>