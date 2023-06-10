<?php  
include 'connect.php';

$query = "SELECT * FROM datatransaksi";
$sql = mysqli_query($conn, $query);

$id = $_GET['id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="navbar">
        <ul class="navbar-left">
            <li id="sibayang">SiBayang</li>
        </ul>

        <ul class="navbar-right">
            <li id="sign_in">Log Out</li>
            <li><a href="Data_karyawan.php"> Karyawan</a></li>
            <li><a href="Data_transaksi.php">Transaksi</a></li>
            <li><a href="Data_penyewa.php">Data Penyewa</a></li>
        </ul>
    </div>
    
    <h2 id="titleDataPenyewa">Data Transaksi</h2>

    <div class="tableDataTransaksi">
        <table>
        <tr>
            <th>Tanggal Masuk</th>
            <th>Nama</th>
            <th>Status</th>
            <th>Lama</th>
            <th>Jumlah</th>
            <th><div class="tambah_data" onclick="showPopup()"><img src="https://img.icons8.com/?size=512&id=1501&format=png"></div></th>
        </tr>

        <tr>
        <?php while ($data = mysqli_fetch_array($sql)) { ?>
                <tr>
                <td><?php echo $data['tanggal_masuk']; ?></td>
                    <td><?php echo $data['nama']; ?></td>
                    <td><?php echo $data['status']; ?></td>
                    <td><?php echo $data['lama']; ?></td>
                    <td><?php echo $data['jumlah']; ?></td>
                    <td class="three-dot">
                    <div class="menu"> <img style="width:20px;"src="https://img.icons8.com/?size=512&id=98963&format=png"> </div> </div>
                            <div class="menu-content">
                            <li><a href="edit.php?id=<?php echo $data['id'] ?>">Edit</a></li>
                    
                            <li><a href="delete.php?id=<?=$data['id']?>">Delete</a></li>
                        </div>
                    </td>
                </tr>
        <?php } ?>
        </tr>
        <table>
    </div>

                                                <!-- ---------------- -->
                                                <!-- POP UP FORM EDIT -->
                                                <!-- ---------------- -->

                                                <?php 
                    include 'connect.php';

                    $fill = "SELECT * FROM datatransaksi WHERE id = '$_GET[id]'";
                    $tampil = mysqli_query($conn, $fill);
                    $isi = mysqli_fetch_array($tampil);

                    $vnama = $isi['nama'];
                    $vemail = $isi['status'];
                    $vno_hp = $isi['lama'];
                    $vtanggal_masuk = $isi['tanggal_masuk'];
                    $vkamar = $isi['jumlah'];
                ?>
    <div class="popup_editdata" style = "display:block;">
                
            <a href="Data_penyewa.php" class = "blocker"></a>

            <div class="form_edit">
                
                <h3>Edit Data Transaksi</h3>
                <form action="edit_querytransaksi.php?id=<?=$id?>" method ="POST">


                    Status: <br> <input type="text" name="email" value="<?php echo $vemail ?>"> <br>
                    Jumlah: <br> <input type="text" name="kamar" value="<?php echo $vkamar ?>"> <br>
                    <input type="submit" name="tombol_simpan"value="Simpan">
                </form>



            </div>
                  
    </div>
    

</body>
</html>