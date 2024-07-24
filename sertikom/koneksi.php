<!-- <!-- <?php
$hostname = "localhost";
$user = "root";
$pass = "";
$databasename = "db_hotel"; // Isi dengan nama database yang sesuai -->

// // Membuat koneksi
// $db = mysqli_connect($server, $user, $password, $db_hotel);

// // Memeriksa koneksi
// if ($db->connect_error) {
//     die("Gagal koneksi: " . $db->connect_error);
// }

// if (!$db){
//     die("Gagal terhubung dengan database : ". mysqli_connect_error());
// }



// session_start();
// ?> -->

<?php
$koneksi = mysqli_connect("localhost", "root", "", "db_hotel");

// Cek Kondisi 
if (mysqli_connect_errno()) {
    echo"Koneksi Database Gagal: " . mysqli_connect_error();
}

// Config array
return array(
    'host' => "localhost",
    'username' => "root",
    'password' => "",
    'dbname' => "db_hotel",
    // 'port' => "", // sementara menggunakan port bawaan
);


?>
