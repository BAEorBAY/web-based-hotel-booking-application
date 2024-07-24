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
<?php include ("koneksi.php"); ?>
    <?php 
    $id_admin=$_GET['id'];
    $sql = "SELECT * FROM tbl_admin where id_admin='".$id_admin."'";
    $query = mysqli_query($koneksi,$sql);

    $data= mysqli_fetch_array($query); //mengambil data kamar sebagai array

    if(isset($_POST['nama'])){
        $nama = $_POST['nama'];
        $username = $_POST['username']; 
        $password = $_POST['password']; 

        $sql = "UPDATE `tbl_admin` SET
        `nama` = '".$nama."',
        `username` = '".$username."',
        `password` = '".$password."'
        WHERE `id_admin` = '".$id_admin."'";

        mysqli_query($koneksi,$sql);
        header("location:admin_read.php");
    }



    ?>
   <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
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
   <hr>

<div class="card col-md-8" id="formCard">
        <h5 class="card-header bg-primary"></h5>
        <div class="card-body">
            <h5 class="card-title">Edit Data Admin</h5>
            <form method="POST" action="admin_update.php?id=<?=$id_admin?>">
            <div class="form-group">
                <label for="nama">Nama :</label>
                <input type="text" name="nama" class="form-control"  value="<?=$data['nama']?>">
                
            </div>

            <div class="form-group">
                <label for="harga">Username :</label>
                <input type="text" name="username" class="form-control"  value="<?=$data['username']?>">
            </div>

            <div class="form-group">
                <label for="keterangan">Password :</label>
                <input type="text" name="password" class="form-control"  value="<?=$data['password']?>">
            </div> <br>

           
            <div class="form-group">
                <a href="admin_read.php"><button class="btn btn-info col-sm-12"
                style="color: white;" type="submit" name="submit" value="simpan">Edit Data Admin
            </button></a>
            </div>
            
            </form>
        </div>

    </div>





    
</body>
</html>