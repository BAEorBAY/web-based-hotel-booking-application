<?php include ("koneksi.php"); 
$id_kamar = $_GET['id'];//mengambil id kamar dari parameter URL

$sql = "DELETE FROM tbl_jenis_kamar WHERE `id_kamar` = '".$id_kamar."'";
mysqli_query($koneksi, $sql);//menjalankan query untuk hapus data

header("location:kamar_read.php"); //mengarahkan kembali ke halaman data kamar
?>