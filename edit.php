<?php  
include 'connect.php';

$id = $_GET['id'];  

$query = "SELECT * FROM datapenyewa";
$sql = mysqli_query($conn, $query);

    $vnama = '';
	$vemail = '';
	$vno_hp = '';
	$vtanggal_masuk = '';
    $vkamar = '';
	$vlama_penyewaan = '';
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

    <h2 id="titleDataPenyewa">Data Penyewa</h2>

    <div class="tableDataPenyewa">
    <table>
 
        <tr>
            <th>Nama</th>
            <th>Alamat Email</th>
            <th>No Hp</th>
            <th>Tanggal Masuk</th>
            <th>Kamar</th>
            <th>Lama Menyewa</th>
            <th>Status</th>
            <th><div class="tambah_data" onclick="showPopup()"><img src="https://img.icons8.com/?size=512&id=1501&format=png"></div></th>
        </tr>
            <?php while ($data = mysqli_fetch_array($sql)) { ?>
        <tr id="isi" >
            <td><?php echo $data['nama']; ?></td>
            <td style="color:blue"><?php echo $data['email']; ?></td>
            <td><?php echo $data['no_hp']; ?></td>
            <td><?php echo $data['tanggal_masuk']; ?></td>
            <td><?php echo $data['kamar']; ?></td>
            <td><?php echo $data['lama_penyewaan']; ?></td>
            <td><div class="status" data-value ="<?php echo $data['status']; ?>"><?php echo $data['status']; ?></div></td>
            <td class="three-dot">
            <div class="menu"> <img style="width:20px;"src="https://img.icons8.com/?size=512&id=98963&format=png"> </div>
                <div class="menu-content">
                    <li><a onclick="">Edit</a></li>
                    
                    <li><a href="delete.php?id=<?=$data['kamar']?>">Delete</a></li>
                </div>
            </td>
            <?php } ?>
        </tr>
       

    </table>
    </div>
    

                                                <!-- ---------------- -->
                                                <!-- POP UP FORM EDIT -->
                                                <!-- ---------------- -->

                <?php 
                    include 'connect.php';

                    $fill = "SELECT * FROM datapenyewa WHERE kamar = '$_GET[id]'";
                    $tampil = mysqli_query($conn, $fill);
                    $isi = mysqli_fetch_array($tampil);

                    $vnama = $isi['nama'];
                    $vemail = $isi['email'];
                    $vno_hp = $isi['no_hp'];
                    $vtanggal_masuk = $isi['tanggal_masuk'];
                    $vkamar = $isi['kamar'];
                    $vlama_penyewaan = $isi['lama_penyewaan'];
                ?>
    <div class="popup_editdata" style = "display:block;">
                
            <a href="Data_penyewa.php" class = "blocker"></a>

            <div class="form_edit">
                
                <h3>Edit Data Penyewa</h3>
                <form action="edit_datapenyewa.php?id=<?=$id?>" method ="POST">

                    Nama: <br> <input type="text" name="nama" value="<?php echo $vnama ?>"> <br>
                    Alamat Email: <br> <input type="text" name="email" value="<?php echo $vemail ?>"> <br>
                    No HP: <br> <input type="text" name="no_hp" value="<?php echo $vno_hp ?>"> <br>
                    Tanggal Masuk: <br> <div class="date"><input type="date" name="tanggal_masuk" value="<?php echo $vtanggal_masuk ?>"> </div> <br>
                    No Kamar: <br> <input type="text" name="kamar" value="<?php echo $vkamar ?>"> <br>
                    Lama Menyewa: <br> <input type="text" name="lama_penyewaan" value="<?php echo $vlama_penyewaan ?>"> <br>
                    Status: <br> <input type="radio" name="status" id="Berjalan" value="Berjalan"> Berjalan
                                <input type="radio" name="status" id="Selesai" value="Selesai"> Selesai
                    <input type="submit" name="tombol_simpan"value="Simpan">
                </form>



            </div>
                  
    </div>
  
</body>
</html>