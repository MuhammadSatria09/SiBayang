<?php  
include 'connect.php';

$query = "SELECT * FROM datapenyewa";
$sql = mysqli_query($conn, $query);


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
                    <li><a href="edit.php?id=<?php echo $data['kamar'] ?>">Edit</a></li>
                    
                    <li><a href="delete.php?id=<?=$data['kamar']?>">Delete</a></li>
                </div>
            </td>
            <?php } ?>
        </tr>
       

    </table>
    </div>

                                                <!-- ------------------ -->
                                                <!-- POP UP FORM TAMBAH -->
                                                <!-- ------------------ -->

    <div class="popup_tambahdata">
            <div class="blocker" onclick="hidePopup()"></div>
            <div class="form_tambah">
                <h3>Tambah Data Penyewa</h3>
                <form action="tambah.php" method ="POST">
                    Nama: <br> <input type="text" name="nama"> <br>
                    Alamat Email: <br> <input type="text" name="email"> <br>
                    No HP: <br> <input type="text" name="no_hp"> <br>
                    Tanggal Masuk: <br> <div class="date"><input type="date" name="tanggal_masuk"> </div> <br>
                    No Kamar: <br> <input type="text" name="kamar"> <br>
                    Lama Menyewa: <br> <input type="text" name="lama_penyewaan"> <br>
                    Status: <br> <input type="radio" name="status" id="Berjalan" value="Berjalan"> Berjalan
                                <input type="radio" name="status" id="Selesai" value="Selesai"> Selesai
                    <input type="submit" name="tombol_simpan"value="Simpan">
                    
                </form>
            </div>
    </div>



    <script>
        const popup = document.querySelector(".popup_tambahdata");
        function showPopup() {
            popup.classList.add('open');
                }
        function hidePopup() {
            popup.classList.remove('open');
                }

    </script>
  
</body>
</html>