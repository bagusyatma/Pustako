<?php

require_once '../../core/functions.php';


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        *,
        body {
            padding: 0;
            margin: 0;
            font-family: Montserrat, Open Sans;
        }
        .nav {
            width: 100%;
            height: 75px;
            box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.25);
            display: flex;
        }

        .nav a {
            text-decoration: none;
            color: #34315d;
        }

        .nav .nav-logo {
            display: flex;
            position: relative;
            top: 10px;
            margin-left: 90px;
        }

        .nav .logo-header {
            line-height: 55px;
        }

        .nav .nav-account {
            float: right;
            position: relative;
            left: 70%;
        }

        /* Style The Dropdown Button */
        .dropbtn {
            color: white;
            padding: 10.25px 35px;
            border: none;
            cursor: pointer;
        }

        /* The container <div> - needed to position the dropdown content */
        .dropdown {
            position: relative;
            display: inline-block;
        }

        /* Dropdown Content (Hidden by Default) */
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 120px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        /* Links inside the dropdown */
        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        /* Change color of dropdown links on hover */
        .dropdown-content a:hover {
            background-color: #ffeaea;
        }

        /* Show the dropdown menu on hover */
        .dropdown:hover .dropdown-content {
            display: block;
        }

        /* Change the background color of the dropdown button when the dropdown content is shown */
        .dropdown:hover .dropbtn {
            background-color: #ffeaea;
        }
    </style>
</head>

<body>
    <header class="nav">
        <a href="../../index.php">
            <div class="nav-logo"><img src="../../img/pustako.png" alt="Pustako" height="50">
                <span class="logo-header">
                    <h2><i>Pustako</i></h2>
                </span>
            </div>
        </a>
        <div class="dropdown nav-account">
            <div class="dropbtn"><img src="../../img/account.png" alt="Account" width="50"></div>
            <div class="dropdown-content">
                <a href="buku-pengguna.php?nis=<?= $nis;?>">Bukumu</a>
                <a href="logout.php">Logout</a>
            </div>
        </div>
    </header>
</body>

</html>