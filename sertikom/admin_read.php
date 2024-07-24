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
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <?php include("koneksi.php"); ?>
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
        <h1 class="poppinss-black" style="color:aliceblue">Admin</h1>
            <div class="col-md-12" style="text-align: end; padding-bottom: 1.5%; padding-right: 1.5%;">
                <a name="" id="" class="bn5" href="admin_create.php" role="button">Tambah Data Admin</a>
        </div>

        <div class="card">

            <div class="card-body">
                <table id="myTable" class="display table table-striped table-bordered text-center">
                <thead>
                <tr>
                <th>Nama</th>
                <th>Username</th>
                <th>Password</th>
                <th>Action</th>
                </tr>
                </thead>
                <!-- </table>
            </div>
        </div>
    </div> -->


    <?php
$sql = "SELECT * FROM tbl_admin";
$query = mysqli_query($koneksi, $sql);

while ($data = mysqli_fetch_array($query)) {
    echo "<tr>";
    echo "<td>" . $data["nama"] . "</td>"; // menampilkan jenis kamar
    echo "<td>" . $data["username"] . "</td>"; // menampilkan harga kamar
    echo"<td>".$data["password"]."<td/>"; //menampilkan pasasword admin
    echo '<a class="btn btn-primary" href="admin_update.php?id=' . $data['id_admin'] . '" role="button">Edit</a>';
    echo '<a class="btn btn-danger" href="admin_delete.php?id=' . $data['id_admin'] . '" onclick="return confirm(\'Data ini akan dihapus, apakah anda yakin ?\')" role="button">Delete</a>';
    echo "</tr>";
}
?>

    </table>

    
</body>
</html>