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

        .nav .logout-btn {
            float: right;
            position: absolute;
            top: 15px;
            right: 0px;
            padding: 10px 20px;
            margin-right: 75px;
            transition: .15s;
            border-radius: 5px;
        }

        .nav .logout-btn:hover {
            transform: scale(1.1);
            background-color: #ffeaea;
        }

        .nav .nav-sidebar {
            background-color: white;
            float: right;
            position: relative;
            left: 72.5%;
            padding: 20px;
        }

        .sidebar-icon {
            position: fixed;
            right: 0;
        }

        .sidebar-icon span {
            display: block;
            opacity: .5;
            cursor: pointer;
            transition: .3s;
        }

        .sidebar-icon span:hover {
            opacity: 1;
            transform: scale(1.1);
            margin-right: 10px;
        }

        .add {
            top: 350px;
            margin: 5px;
        }

        .more {
            top: 275px;
        }

        .sidebar {
            z-index: 999;
            width: 0;
            position: fixed;
            float: right;
            top: 0;
            bottom: 0;
            right: 0;
            transition: .3s;
            background-color: #ffffff;
            box-shadow: 0px 5px 15px 0px rgba(0, 0, 0, 0.2);
        }

        .sidebar span {
            display: block;
            margin: 10px;
            cursor: pointer;
        }

        .sidebar-image {
            margin: 20px 0px;
            text-align: center;
        }

        .sidebar-list {
            margin-top: 25px;
        }

        .sidebar-list a {
            display: block;
            color: black;
            padding: 10px 20px;
            transition: .5s;
        }

        .sidebar-list a:hover {
            background-color: #34315d;
            color: #ffffff;
            opacity: 1;

        }
    </style>
</head>

<body>
    <header class="nav">
        <a href="index.php">
            <div class="nav-logo"><img src="../../img/pustako.png" alt="Pustako" height="50">
                <span class="logo-header">
                    <h2><i>Pustako</i></h2>
                </span>
            </div>
        </a>
        <a href="logout.php">
            <div class="logout-btn">
                <h3>Logout</h3>
            </div>
        </a>
    </header>

    <div class="sidebar-icon add">
        <a href="tambah.php">
            <span><img src="../../img/add.png" width="65"></span>
        </a>
    </div>

    <div class="sidebar-icon more">
        <span id="openSidebar"><img src="../../img/more-option.png" width="75"></span>
    </div>

    <div id="mySidebar" class="sidebar">
        <span id="closeSidebar"><img src="../../img/close.png" width="25"></span>
        <div class="sidebar-image">
            <img src="../../img/pustako.png" width="100">
        </div>
        <div class="sidebar-list">
            <a href="../admin/index.php">Daftar Buku</a>
            <a href="../admin/daftar-peminjam.php">Daftar Peminjam</a>
            <a href="http://localhost/phpmyadmin/db_structure.php?server=1&db=pustako-beta" target="_blank">Show Database</a>
            <a href="../admin/trash-index.php">Trash Buku</a>
        </div>

    </div>

    <script type="text/javascript">
        //CREATE VARIABLE
        var mySidebar = document.getElementById("mySidebar");
        var openSidebar = document.getElementById("openSidebar");
        var closeSidebar = document.getElementById("closeSidebar");

        //SIDEBAR FUNCTION
        openSidebar.onclick = function () {
            mySidebar.style.width = "250px";
        }

        closeSidebar.onclick = function () {
            mySidebar.style.width = "0px";
        }
    </script>
</body>