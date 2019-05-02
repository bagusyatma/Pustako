<?php
    session_start();
    require 'core/functions.php';

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pustako</title>
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
            background-image: url(img/banner-landing.jpg);
            background-position: 0px 50px;
            background-size: contain;
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
            width: 425px;
            display: inline-block;
            padding: 25px;
            float: right;
            position: relative;
            top: 150px;
            right: 150px;
        }

        .form .form-header {
            margin-bottom: 15px;
        }

        .form .form-desc {
            margin-bottom: 25px;
        }

        .btn-start {
            background-color: #ff3f3f;
            border-radius: 25px;
            position: relative;
            display: inline-block;
            padding: 7.5px 15px;
            transition: .3s;
        }

        .btn-start a {
            text-decoration: none;
            color: white;
        }

        .btn-start:hover {
            transform: scale(1.1);
        }
    </style>
</head>

<body>
    <section class="jumbotron">
        <header class="nav">
            <a href="index.php">
                <div class="nav-logo"><img src="img/pustako.png" alt="Pustako" height="50">
                    <span class="logo-header">
                        <h2><i>Pustako</i></h2>
                    </span>
                </div>
            </a>
        </header>
        <div class="form">
            <div class="form-header">
                <h1>Temukan bukumu!</h1>
            </div>
            <div class="form-desc">
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quia odit rerum odio tempore, at quisquam.
                    Temporibus iusto dolore, harum libero aliquam culpa consequatur excepturi, nemo natus dolorem sed
                    nam? Facilis.</p>
            </div>
            <div class="btn-start">
                <a href="views/user/index.php">Get Started!</a>
            </div>
        </div>
    </section>
</body>

</html>