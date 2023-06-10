<?php
    include 'connect.php';

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        
        $query = "DELETE FROM datapenyewa WHERE kamar = $id";
        $data = mysqli_query($conn, $query);
        
        if ($data) {
            echo "<script>
                alert('Data berhasil dihapus');
                document.location='Data_penyewa.php';
                </script>";
        }
    } else {
        echo "ID not found.";
    }
?>
