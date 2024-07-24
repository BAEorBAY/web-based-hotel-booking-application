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
    $id_kamar=$_GET['id'];
    $sql = "SELECT * FROM tbl_jenis_kamar where id_kamar='".$id_kamar."'";
    $query = mysqli_query($koneksi,$sql);

    $data= mysqli_fetch_array($query); //mengambil data kamar sebagai array

    if(isset($_POST['jenis_kamar'])){
        $jenis_kamar = $_POST['jenis_kamar']; //mendapat nilai jenis kamar dari form
        $harga = $_POST['harga']; //mendapatkan nilai harga dari form
        $keterangan = $_POST['keterangan']; //mendapatkan nilai keterangan dari form 

        $sql = "UPDATE `tbl_jenis_kamar` SET
        `jenis_kamar` = '".$jenis_kamar."',
        `harga` = '".$harga."',
        `keterangan` = '".$keterangan."'
        WHERE `id_kamar` = '".$id_kamar."'";

        mysqli_query($koneksi,$sql);
        header("location:kamar_read.php");
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
            <h5 class="card-title">Edit Data Siswa</h5>
            <form method="POST" action="kamar_update.php?id=<?=$id_kamar?>">
            <div class="form-group">
                <label for="jenis_kamar">Jenis Kamar :</label>
                <input type="text" name="jenis_kamar" class="form-control"  value="<?=$data['jenis_kamar']?>">
                
            </div>

            <div class="form-group">
                <label for="harga">Harga :</label>
                <input type="text" name="harga" class="form-control"  value="<?=$data['harga']?>">
            </div>

            <div class="form-group">
                <label for="keterangan">Keterangan :</label>
                <input type="text" name="keterangan" class="form-control"  value="<?=$data['keterangan']?>">
            </div> <br>

           
            <div class="form-group">
                <a href="kamar_read.php"><button class="btn btn-info col-sm-12"
                style="color: white;" type="submit" name="submit" value="simpan">Edit Data Siswa
            </button></a>
            </div>
            
            </form>
        </div>

    </div>





    
</body>
</html>