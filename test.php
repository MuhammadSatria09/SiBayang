<!DOCTYPE html>
    <html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <!-- import bootstrap  -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
            integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    </head>
    
    <body>
        <br>
        <!-- membuat container dengan lebar colomn col-lg-10  -->
        <div class="container col-lg-10">
            <!-- membuat tulisan alert berwarna hijau dengan tulisan di tengah  -->
            <h3 class="alert alert-success text-center" role="alert">
                Tutorial Modal Edit Data Dinamis
            </h3>
            <br>
            <!-- membuat card untuk membungkus tabel bootstrap  -->
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <thead class="thead-dark">
                            <!-- set table header  -->
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Barang</th>
                                <th scope="col">Deskripsi Barang</th>
                                <th scope="col">Jenis Barang</th>
                                <th scope="col">Harga Barang</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                // membuat koneksi ke database 
                                $koneksi = mysqli_connect("localhost", "root", "", "latihan");
    
                                //membuat variabel angka
                                $no = 1;
    
                                //mengambil data dari tabel barang
                                $select         = mysqli_query($koneksi, "select * from barang");
    
                                //melooping(perulangan) dengan menggunakan while
                                while($data= mysqli_fetch_array($select)){
                            ?>
                            <tr>
    
                                <!-- menampilkan data dengan menggunakan array  -->
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $data['nama_barang']; ?></td>
                                <td><?php echo $data['deskripsi_barang']; ?></td>
                                <td><?php echo $data['jenis_barang']; ?></td>
                                <td><?php echo $data['harga_barang']; ?></td>
                                <td>
    
                                    <!-- membuat tombol dengan ukuran small berwarna biru  -->
                                    <!-- data-target setiap modal harus berbeda, karena akan menampilkan data yang berbeda pula
                                    caranya membedakannya, gunakan id_barang sebagai pembeda data-target di setiap modal -->
                                    <!-- dibawah ini kita akan melempar data ke modal dengan cara mengisi variabel data-nama_data = value -->
                                    <!-- tapi sebelum kita kirim data2 tersebut, data tersebut akan ditampung di javascript terlebih dahulu  -->
                                    <a href="" class="btn btn-sm btn-info" 
                                        data-toggle="modal" 
                                        data-target="#modaledit"
                                        data-id="<?php echo $data['id_barang']; ?>"
                                        data-nama_barang="<?php echo $data['nama_barang']; ?>"
                                        data-deskripsi_barang="<?php echo $data['deskripsi_barang']; ?>"
                                        data-jenis_barang="<?php echo $data['jenis_barang']; ?>"
                                        data-harga_barang="<?php echo $data['harga_barang']; ?>"
                                    >Edit</a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            
            <div class="modal fade" id="modaledit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Barang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- di dalam modal-body terdapat 4 form input yang berisi data. data-data tersebut ditampilkan sama seperti menampilkan data pada tabel. -->
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Nama Barang</label>
                            <input type="text" class="form-control" name="nama_barang" id="nama_barang">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Deskripsi Barang</label>
                            <textarea class="form-control" rows="5" name="deskripsi_barang" id="deskripsi_barang"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Jenis Barang</label>
                            <input type="text" class="form-control" name="jenis_barang" id="jenis_barang">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Harga Barang</label>
                            <input type="text" class="form-control" name="harga_barang" id="harga_barang">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
</div>

        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
        </script>
        
            

<script>

$('#modaledit').on('show.bs.modal', function (event) {
    // event.relatedtarget menampilkan elemen mana yang digunakan saat diklik.
    var button              = $(event.relatedTarget)

    // data-data yang disimpan pada tombol edit dimasukkan ke dalam variabelnya masing-masing 
    var nama_barang         = button.data('nama_barang')
    var deskripsi_barang    = button.data('deskripsi_barang')
    var jenis_barang        = button.data('jenis_barang')
    var harga_barang        = button.data('harga_barang')
    var modal = $(this)

    //variabel di atas dimasukkan ke dalam element yang sesuai dengan idnya masing-masing
    modal.find('#nama_barang').val(nama_barang)
    modal.find('#deskripsi_barang').val(deskripsi_barang)
    modal.find('#jenis_barang').val(jenis_barang)
    modal.find('#harga_barang').val(harga_barang)
})
</script>

    </body>
    
    </html>