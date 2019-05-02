<?php
    session_start();
    require '../../core/functions.php';

    if (!isset($_SESSION['login_users'])) {
        header("location: ../../auth/login.php");
        exit;
    }

    $nis = $_SESSION['nis'];

    $buku = query("SELECT * FROM buku WHERE status = 'Y'");

    $users = query("SELECT * FROM users WHERE nis = '$nis'")[0];


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../_component/sidebar/sidebar.css">
    <script src="../../js/jquery-3.4.0.min.js"></script>
    <script src="../../js/script-buku.js"></script>
    <style>
        *,
        body {
            padding: 0;
            margin: 0;
            font-family: Montserrat, Open Sans;
        }

        .jumbotron {
            width: 100%;
            height: 100vh;
        }

        .content {}

        a {
            text-decoration: none;
        }

        .buku {
            width: 200px;
            background-color: white;
            padding: 10px;
            text-align: center;
            border-radius: 3px;
            margin: 20px;
            transition: 0.3s;
            display: inline-table;
        }

        .buku:hover {
            transform: scale(1.05);
            box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.25);
        }

        .buku .judul-buku {
            font-size: 15px;
            margin-top: 5px;
        }

        .header-buku {
            width: 100%;
            height: 50px;
            border-bottom: 1px solid rgba(0, 0, 0, 0.25);
        }

        .header-buku .header-p{
            position: absolute;
            top: 90px;
            left: 25px;
        }

        .search {
            display: inline-block;
            float: right;
            line-height: 50px;
            margin-right: 140px;
        }

        .search label {
            position: relative;
            top: 3px;
        }

        .search input {
            padding: 5px 10px;
            border: none;
            border-bottom: 1px solid #34315d;
        }

        .search .loader {
            float: right;
            position: absolute;
            width: 200px;
            z-index: -99;
            top: 70px;
            right: 0px;
            display: none;
        }
    </style>
</head>

<body>
    <div class="jumbotron">
        <?php
            include '../_component/header-user.php';
        ?>
        <div class="content">
            <div class="header-buku">
                <div class="header-p">
                    <h3>Daftar Buku</h3>
                </div>
                <div class="search">
                    <form action="" method="POST">
                        <label for="search"><img src="../../img/search.png" alt="" width="15"></label>
                        <input type="text" name="keyword" id="keyword" placeholder="Search...">
                        <img src="../../img/loader.gif" class="loader">
                    </form>
                </div>
            </div>
            <div class="pustaka">
                <?php
                    foreach ($buku as $row) :
                ?>
                <a href="desc.php?kode_buku=<?= $row['kode_buku']; ?>">
                    <div class="buku">
                        <div class="gambar-buku"><img src="../../img/product/<?= $row['gambar'] ?>" alt="" width="140" height="198">
                        </div>
                        <div class="judul-buku"><?= $row['judul']?></div>
                    </div>
                </a>
                <?php
                    endforeach;
                ?>
            </div>
        </div>
</body>

</html>