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
    <title>Data Hotel</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;800&display=swap');
        body {
            font-family: 'Nunito', sans-serif;
            margin: 0;
            padding: 0;
            background: #f4f4f4;
            color: #333;
            background-image: url(blue.png);
        }
        header {
            background: linear-gradient(90deg, rgb(2, 10, 89), rgb(77, 181, 237) 100%);
            color: white;
            padding: 20px 0;
            text-align: center;
        }
        header h1 {
            margin: 0;
            font-size: 2.5em;
            font-weight: 300;
        }
        nav {
            text-align: center;
            margin: 270px 0;
            padding: 2;
        }
        .bn5{
    padding: 1em 1em;
    border: none;
    outline: none;
    color: rgb(255, 255, 255);
    background: #111;
    cursor: pointer;
    position: relative;
    z-index: 0;
    border-radius: 10px;
    text-decoration: none;
}

.bn5::before{
    content: "";
    background: linear-gradient(
        45deg,
        #f00,
        #ff7300,
        #fffb00,
        #48ff00,
        #00ffd5,
        #002bff,
        #7a00ff,
        #ff00c8,
        #f00
    );
    position: absolute;
    top: -2px;
    left: -2px;
    background-size: 400%;
    z-index: -1;
    filter: blur(5px);
    width: calc(100% + 4px);
    height: calc(100% + 4px);
    animation: glowingbn5 20s linear infinite;
    opacity: 0;
    transition: opacity 0.3s ease-in-out;
    border-radius: 10px;
}

@keyframes glowingbn5 {
    0%{
        background-position: 0 0;
    }

    50%{
        background-position: 400% 0;
    }

    100%{
        background-position: 0 0;
    }

}

.bn5:active{
    color: #000;
}

.bn5:active::after{
    background: transparent;
}

.bn5:hover::before{
    opacity: 1;
}

.bn5::after{
    z-index: -1;
    content: "";
    position: absolute;
    width: 100%;
    height: 100%;
    background: #191919;
    left: 0;
    top: 0;
    border-radius: 10px;
}
     
        hr {
            border: none;
            height: 1px;
            background: #ddd;
            margin: 40px 0;
        }
        footer {
            text-align: center;
            padding: 20px 0;
            background: #004d99;
            color: white;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <?php include("koneksi.php"); ?>

    <header>
        <h1>Data Hotel</h1>
    </header>

    <nav>
        <a href="kamar_read.php" class="bn5">Data Kamar</a>
        <a href="admin_read.php" class="bn5">Data Admin</a>
        <a href="penyewaan_read.php" class="bn5">Data Penyewaan</a>
        <a href="logout.php" class="bn5">Logout</a>
    </nav>

    <hr>

    <footer>
        &copy; 2024 Hotel Sertikom. All Rights Reserved. Made by Hilmi
    </footer>
</body>
</html>
