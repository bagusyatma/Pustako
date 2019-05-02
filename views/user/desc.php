<?php
    session_start();
    require '../../core/functions.php';

    if (!isset($_SESSION['login_users'])) {
        header("location: ../../auth/login.php");
        exit;
    }

    $kode_buku = $_GET['kode_buku'];
    $nis = $_SESSION['nis'];

    $buku = query("SELECT * FROM buku WHERE kode_buku = '$kode_buku'")[0];
    $users = query("SELECT * FROM users WHERE nis = '$nis'")[0];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Judul</title>
    <style>
        *,
        body {
            padding: 0;
            margin: 0;
            font-family: Montserrat, Open Sans;
        }

        .container {
            padding: 25px 40px;
        }

        .container .content {
            padding: 20px 35px;
        }

        .content .content-img {
            padding: 10px;
            display: inline-block;
            box-shadow: 0px 1px 5px rgba(0, 0, 0, 0.25);
        }

        .content .content-desc {
            display: inline-block;
            position: relative;
            bottom: 10px;
            margin: 15px;
            padding: 10px;
        }

        .content .content-desc .content-header {
            margin-bottom: 15px;
        }

        .content .content-desc-p {}

        .content .content-desc-sinopsis {
            background-color: #fff;
            width: 95%;
            padding: 10px;
            margin: 20px 0px 0px 0px;
        }

        a {
            text-decoration: none;
        }

        .btn-pinjam {
            display: inline-block;
            position: absolute;
            float: right;
            right: 200px;
            top: 135px;
            padding: 5px 10px;
            transition: .25s;
        }

        .btn-pinjam:hover {
            transform: scale(1.05);
            box-shadow: 0px 1px 5px rgba(0, 0, 0, 0.25);
        }

        .btn-pinjam {
            margin-right: 0px;
            background-color: #007bff;
        }

        .btn-pinjam a {
            color: white;
        }
    </style>
</head>

<body>
    <?php
        include '../_component/header-user.php';
    ?>

    <div class="container">
        <div class="content">
            <div class="content-img">
                <img src="../../img/product/<?= $buku['gambar']; ?>" alt="" width="168" height="238">
            </div>
            <div class="content-desc">
                <div class="content-header">
                    <h1><?= $buku['judul']; ?></h1>
                </div>
                <div class="content-desc-p">
                    <p>Buku ini diterbitkan oleh <strong><em><?= $buku['penerbit']; ?></em></strong></p>
                    <p>dan pengarangnya adalah <strong><em><?= $buku['pengarang']; ?></em></strong></p>
                </div>
            </div>
            <div class="content-desc-sinopsis">
                <h4>Sinopsis</h4>
                <br>
                <p><?= $buku['sinopsis']; ?></p>
            </div>
            <div class="btn-pinjam">
                <a href="pinjam.php?kode_buku=<?= $buku['kode_buku']; ?>&&nis=<?= $users['nis']; ?>">Pinjam</a>
            </div>
        </div>
    </div>
</body>

</html>