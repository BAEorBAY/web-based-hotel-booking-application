<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php include("koneksi.php"); ?>
<?php
if (isset($_POST['nama'])) {
    $nama = $_POST['nama'];
    $no_identitas = $_POST['no_identitas'];
    $no_hp = $_POST['no_hp'];
    $id_kamar = $_POST['id_kamar'];
    $cekin = $_POST['cekin'];
    $cekout = $_POST['cekout'];
    $jumlah = $_POST['jumlah'];
    $total = $_POST['total'];

    $sql="INSERT INTO `tbl_penyewaan` (`id_kamar`, `nama`, `cekin`, `cekout`, `no_identitas`, `no_hp`, `id_admin`, `jumlah`, `total`) VALUES ('".$id_kamar."', '".$nama."', '".$cekin."', '".$cekout."', '".$no_identitas."', '".$no_hp."', '".$_SESSION['id_admin']."', '".$jumlah."', '".$total."')";

    mysqli_query($koneksi,$sql);
    header("location:penyewaan_read.php");
}

?>
    <h1>DATA Kamar</h1>
    <a href="kamar_read.php">Data Kamar</a>
    <a href="admin_read.php">Data Admin</a>
    <a href="penyewaan_read.php">Data Penyewaan</a>
    <a href="logout.php">Logout</a>
    <hr>
<div>
    <h3>Form Pemesanan</h3>
    <form method="POST">
    <table>
        <tr>
            <td>Nama Lengkap</td>
            <td><input type="text" name="nama"></td>
        </tr>
        <tr>
            <td>No Identitas</td>
            <td><input type="text" name="no_identitas"></td>
        </tr>
        <tr>
            <td>No Handphone</td>
            <td><input type="text" name="no_hp"></td>
        </tr>
        <tr>
            <td>Jenis Kamar</td>
            <td>
                <select name="id_kamar" id="jenis_kamar">
                <?php
                    $sql = "SELECT * FROM tbl_jenis_kamar";
                    $query = mysqli_query($koneksi, $sql);
                    while($kamar = mysqli_fetch_array($query)){
                        echo "<option value=".$kamar['id_kamar']." data-harga='".$kamar['harga']."'>".$kamar['jenis_kamar']." - Rp ".$kamar['harga']."</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Check In</td>
            <td><input type="date" name="cekin" id="cekin"></td>
        </tr>
        <tr>
            <td>Check Out</td>
            <td><input type="date" name="cekout" id="cekout"></td>
        </tr>
        <tr>
            <td>Jumlah Kamar</td>
            <td><input type="text" name="jumlah" id="jumlah_kamar"></td>
        </tr>
        <tr>
            <td>Total Bayar</td>
            <td><input type="text" name="total" id="total_bayar"></td>
        </tr>
        <tr>
            <td colspan="2">
                <button type="button" id="btn_hitung" onclick=hitung()>Hitung Total Bayar</button>
                <input type="submit" value="Simpan Transaksi"></input>
            </td>
        </tr>
    </table>
    </form>
</div>
</body>
<script>
    function hitung(){
        var cekin = new Date(document.getElementById("cekin").value);
        var cekout = new Date(document.getElementById("cekout").value);
        var durasi = (cekout.getTime() - cekin.getTime()) / (1000 * 60 * 60 * 24);
        if (durasi == 0) {
            durasi = 1;
        }
        var jk = document.getElementById("jenis_kamar");
        var harga = jk.options[jk.selectedIndex].dataset.harga;
        var jumlah_kamar = document.getElementById("jumlah_kamar").value;
        document.getElementById("total_bayar").value = harga * jumlah_kamar * durasi; 
    }
</script>
</html>