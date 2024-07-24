<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}


// Nonaktifkan cache
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0");// Proxies.

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

    <?php  include("koneksi.php")?>

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


<div class="element">
        <h1 class="poppinss-black" style="color:aliceblue">Penyewaan</h1>
            <div class="col-md-12" style="text-align: end; padding-bottom: 1.5%; padding-right: 1.5%;">
                <a name="" id="" class="bn5" href="penyewaan_create.php" role="button">Tambah Data Penyewa</a>
        </div>

        <div class="card">

            <div class="card-body">
                <table id="myTable" class="display table table-striped table-bordered text-center">
                <thead>
                <th>No</th>
                <th>Nama Lengkap</th>
                 <th>No indentitas</th>
                <th>No Hp</th>
                <th>Jenis Kamar</th>
                <th>Jumlah Kamar</th>
                <th>Total</th>
                 <th>action</th>
                </thead>
                <!-- </table>
            </div>
        </div>
    </div> -->


    


    <?php 
    $sql = "SELECT tbl_penyewa.*, tbl_jenis_kamar.*, tbl_admin.nama as nama_admin from tbl_penyewa
    JOIN tbl_jenis_kamar on tbl_penyewa.id_kamar=tbl_jenis_kamar.id_kamar JOIN tbl_admin
    ON tbl_penyewa.id_admin=tbl_admin.id_admin";
    $query = mysqli_query($koneksi, $sql);
    $no=1;

    while ($data = mysqli_fetch_array($query)) {
        echo "<tr>";

        echo "<td>" . $no++."</td>";
        echo "<td>" . $data['nama'] . "</td>";
        echo "<td>" . $data['no_identitas'] . "</td>";
        echo "<td>" . $data["no_hp"] . "</td>";
        echo "<td>" . $data["jenis_kamar"] . "</td>";
        echo "<td>" . $data['jumlah'] . "</td>";
        echo "<td>" . "Rp." . $data['total'] . "</td>";

        // link untuk mengedit dan menghapus data penyewaan
        echo '<td class="project-actions text-center" scope="col" colspan="2">';
        echo '<a class="btn btn-primary" href="penyewaan_update.php?id=' . $data['id_sewa'] . '" role="button">Edit</a>';
        echo '<a class="btn btn-danger" href="penyewaan_delete.php?id=' . $data['id_sewa'] . '" onclick="return confirm(\'Data ini akan dihapus, apakah anda yakin ?\')" role="button">Delete</a>';
        echo '</td>';

        echo "</tr>";


    }


    
    
    ?>


    </table>




    
</body>
</html>