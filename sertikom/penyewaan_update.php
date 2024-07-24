<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="penyewaan.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<?php 
session_start();
include("koneksi.php"); 

$id_sewa = $_GET['id'];
$sql = "SELECT * FROM tbl_penyewa WHERE id_sewa='".$id_sewa."'";
$query = mysqli_query($koneksi, $sql);

$data = mysqli_fetch_array($query);

if(isset($_POST['nama'])){
    $nama = $_POST['nama'];
    $no_identitas = $_POST['no_identitas'];
    $no_hp = $_POST['no_hp'];
    $id_kamar = $_POST['id_kamar'];
    $checkin = $_POST['checkin'];
    $checkout = $_POST['checkout'];
    $jumlah = $_POST['jumlah'];
    $total = $_POST['total'];

    $sql = "UPDATE `tbl_penyewa` SET
            `nama` = '".$nama."',
            `no_identitas` = '".$no_identitas."',
            `no_hp` = '".$no_hp."',
            `id_kamar` = '".$id_kamar."',
            `checkin` = '".$checkin."',
            `checkout` = '".$checkout."',
            `jumlah` = '".$jumlah."',
            `id_admin` = '".$_SESSION['id_admin']."',
            `total` = '".$total."'
            WHERE `id_sewa` = '".$id_sewa."'";

    if(mysqli_query($koneksi, $sql)){
        header("location:penyewaan_read.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
    }
}
?>

<nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="kamar_read.php">Data Kamar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="admin_read.php">Data Admin</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="penyewaan_read.php">Data Penyewaan</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="card col-md-8" id="formCard">
    <h5 class="card-header bg-primary"></h5>
    <div class="card-body">
        <h5 class="card-title">Form Pemesanan</h5>
        <form method="POST">
            <div class="form-group">
                <label for="nama">Nama Lengkap :</label>
                <input type="text" class="form-control" name="nama" value="<?=$data['nama']?>">
            </div>

            <div class="form-group">
                <label for="no_identitas">No Identitas :</label>
                <input type="text" class="form-control" name="no_identitas" value="<?=$data['no_identitas']?>">
            </div>

            <div class="form-group">
                <label for="no_hp">Nomor HP :</label>
                <input type="text" name="no_hp" class="form-control" value="<?=$data['no_hp']?>">
            </div> 
            <br>

            <div class="form-group">
                <label for="id_kamar">Jenis Kamar :</label>
                <select class="form-select" aria-label="Default select example" name="id_kamar" id="jenis_kamar" required>
                    <option selected disabled>Pilih Jenis Kamar</option>
                    <?php
                    $sql = "SELECT * FROM tbl_jenis_kamar";
                    $query = mysqli_query($koneksi, $sql);
                    while($kamar = mysqli_fetch_array($query)){
                        echo "<option value=".$kamar['id_kamar']." data-harga='".$kamar['harga']."'";
                        if ($kamar['id_kamar']==$data['id_kamar']) {
                            echo " selected>";
                        }else{
                            echo ">";
                        } 
                        echo $kamar['jenis_kamar']." - Rp ".$kamar['harga'];
                        echo "</option>";
                    }
                    ?>
                </select>
            </div>
            <br>

            <div class="form-group">
                <label for="checkin">Check In :</label>
                <input type="date" name="checkin" class="form-control" id="checkin" value="<?=$data['checkin']?>">
            </div>
            <br>

            <div class="form-group">
                <label for="checkout">Check Out :</label>
                <input type="date" name="checkout" class="form-control" id="checkout" value="<?=$data['checkout']?>">
            </div>
            <br>

            <div class="form-group">
                <label for="jumlah">Jumlah Kamar :</label>
                <input type="text" name="jumlah" id="jumlah" class="form-control" value="<?=$data['jumlah']?>">
            </div>
            <br>     

            <div class="form-group">
                <label for="total">Total Bayar :</label>
                <input type="text" name="total" id="total" class="form-control" value="<?=$data['total']?>">
            </div>
            <br>
            
            <button type="button" id="btn_hitung" class="btn btn-primary" onclick="hitung()">Hitung Total Bayar</button>
            <br><br>
            <div class="form-group">
                <button class="btn btn-info col-sm-12" style="color: white;" type="submit" name="submit" value="Simpan Transaksi">Simpan Transaksi</button>
            </div>
        </form>
    </div>
</div>

<script>
function hitung() {
    var checkin = new Date(document.getElementById("checkin").value);
    var checkout = new Date(document.getElementById("checkout").value);
    var durasi = (checkout - checkin) / (1000 * 60 * 60 * 24);

    if (isNaN(durasi) || durasi <= 0) {
        alert("Tanggal check-out harus lebih besar dari tanggal check-in.");
        return;
    }

    var jk = document.getElementById("jenis_kamar");
    var harga = jk.options[jk.selectedIndex].dataset.harga;
    var jumlah = document.getElementById("jumlah").value;

    var total_bayar = harga * jumlah * durasi;
    document.getElementById("total").value = total_bayar;
}
</script>
</body>
</html>
