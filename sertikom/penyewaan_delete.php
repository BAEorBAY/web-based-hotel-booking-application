<?php include ("koneksi.php"); 
$id_sewa = $_GET['id'];//mengambil id kamar dari parameter URL

$sql = "DELETE FROM tbl_penyewa WHERE `id_sewa` = '".$id_sewa."'";
mysqli_query($koneksi, $sql);//menjalankan query untuk hapus data

header("location:penyewaan_read.php"); //mengarahkan kembali ke halaman data kamar
?>