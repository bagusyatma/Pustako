<?php
session_start();
require_once '../core/functions.php';

if (isset($_SESSION['login'])) {
    header("location: ../index.php");
    exit;
}

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result_users = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

    $result_admin = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$username'");


    //cek username
    if (mysqli_num_rows($result_users) === 1) {
        
        //cek password
        $row = mysqli_fetch_assoc($result_users);
        if(password_verify($password, $row['password'])){
            //set session
            $_SESSION['login_users'] = true;
            $_SESSION['nis'] = $row['nis'];

            if (isset($_POST['remember'])) {
                //buat cookie
                setcookie('login_users', 'true', time() + 60);
            }

            header("location: ../views/user/index.php?n=login%berhasil");
            exit;
        }

    }

    //cek username
    elseif (mysqli_num_rows($result_admin) === 1) {
        
        //cek password
        $row = mysqli_fetch_assoc($result_admin);
        if(password_verify($password, $row['password'])){
            //set session
            $_SESSION['login_admin'] = true;

            if (isset($_POST['remember'])) {
                //buat cookie
                setcookie('login_admin', 'true', time() + 60);
            }

            header("location: ../views/admin/index.php?n=login%berhasil");
            exit;
        }

    }

    else {
        echo "
            <script>
                alert('login gagal!');
                document.location.href = 'login.php';
            </script>
            ";
            exit;
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign In - Pustako</title>
    <style>
        *,
        body {
            padding: 0;
            margin: 0;
            font-family: Montserrat, Open Sans;
            text-decoration: none;
        }

        .jumbotron {
            width: 100%;
            height: 100vh;
        }

        .jumbotron .nav {
            width: 100%;
            height: 75px;
            box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.25);
        }

        .jumbotron .nav .nav-logo {
            display: flex;
            position: relative;
            top: 10px;
            margin-left: 75px;
        }

        .jumbotron .nav .logo-header {
            line-height: 55px;
            color: #34315d;
        }

        .form {
            display: inline-block;
            padding: 25px;
            text-align: center;
            margin: 35px 0px 0px 504px;

        }

        .form .form-img {}

        .form .form-p {
            color: #4a4a59;
        }

        .form .top {
            margin-top: 15px;
        }

        .form .bottom {
            margin-top: 20px;
        }

        .form .bottom a {
            text-decoration: none;
        }

        .form .data {
            width: 225px;
            display: block;
            margin-top: 35px;
            box-shadow: none;
            border: 1px solid #4a4a59;
            padding: 7.5px 10px;
            border-radius: 10px;
            margin-left: 10px;
        }

        .form #remember-input {
            position: relative;
            display: inline-block;
            width: 50px;
            top: 20px;
            right: 40px;
        }

        .form #remember-label {
            position: relative;
            width: 50px;
            top: 20px;
            right: 40px;
        }

        .form button {
            margin-top: 35px;
            background-color: #34315d;
            color: #ffffff;
            border: none;
            border-radius: 25px;
            padding: 7.5px 22.5px;
            transition: .3s;
        }

        .form button:hover {
            transform: scale(1.1);
        }
    </style>
</head>

<body>
    <div class="jumbotron">
        <header class="nav">
            <a href="../index.php">
                <div class="nav-logo"><img src="../img/pustako.png" alt="Pustako" height="50">
                    <span class="logo-header">
                        <h2><i>Pustako</i></h2>
                    </span>
                </div>
            </a>
        </header>

        <div class="form">
            <div class="form-img"><img src="../img/ts.png" alt="Pustako" width="50"></div>
            <div class="form-p top">
                <p>Sign in to your account</p>
            </div>
            <form action="" method="post">
                <input type="text" name="username" id="username" placeholder="Username" class="data" required>
                <input type="password" name="password" id="password" placeholder="Password" class="data" required>
                <!-- <input type="checkbox" name="remember" id="remember-input">
                <label for="remember" id="remember-label">Remember Me</label> -->
                <br>
                <button type="submit" name="login">Sign in</button>
            </form>
            <div class="form-p bottom">
                <p>Not register yet? <a href="register.php">Sign Up</a></p>
            </div>
        </div>
    </div>
</body>

</html>