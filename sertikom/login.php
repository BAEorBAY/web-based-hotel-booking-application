<?php include("koneksi.php");?>
    <?php
    if(isset($_POST['username'])){
        $username=$_POST['username'];
        $password=$_POST['password'];

        $sql = "SELECT * FROM tbl_admin WHERE username = '".$username."' AND password = '".$password."'";
        $query=mysqli_query($koneksi, $sql);
        $data= mysqli_fetch_array($query);

        if(mysqli_num_rows($query)>0){
            session_start();
            $_SESSION['status']=$data['login'];
            $_SESSION['id_admin']=$data['id_admin'];
            $_SESSION['nama']=$data['nama'];
            $_SESSION['username']=$data['username'];

            header('location:index.php');
        }
    }
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Icons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- Css -->
    <link rel="stylesheet" href="register.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Login Page</title>
</head>
<body background="exit.png">
    

    
    <form action="" method="POST">
        <div class="container">

            <div class="box">
                <div class="header">
                    <header></header>
                    <p>Sign In</p>
                </div>
                <?php if (isset($error)) : ?>
                    <div class="alert alert-danger" role="alert" style="text-align: center; font-style: italic; font-size: large; color: crimson;">Wrong username,E-Mail or password</div>
                <?php endif; ?>

                <div class="input-box">
                    <label for="username">Username</label>
                    <input type="text" name="username" class="input-field" id="username" required>
                    <i class="bx bx-envelope"></i>
                </div>

                <div class="input-box">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="input-field" id="password" required>
                    <i class="bx bx-lock"></i>
                </div>

                <div class="input-box">
                    <input type="submit" name="login" class="input-submit" value="login">
                </div>
            </div>
            
            
            <div class="wrapper"></div>
            

        </div>
        
    </form>
</body>
</html>

<!-- <div>
    <h1>Login</h1>
    <form method="POST">
        <table>
            <tr>
                <td>Username</td>
                <td>:</td>
                <td><input type="text" name="username" required></td>
            </tr>

            <tr>
                <td>Password</td>
                <td>:</td>
                <td><input type="text" name="password" required></td>
            </tr>

            <tr>
                <td colspan="3"><input type="submit" value="login" style="width: 100%;"></td>
            </tr>
        </table>
    </form>
</div> -->