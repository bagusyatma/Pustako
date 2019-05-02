<?php
    session_start();
    require '../../core/functions.php';
    
    if (!isset($_SESSION['login_admin'])) {
        header("location: ../../auth/login.php");
        exit;
    }

    $kode_buku = $_GET['kode_buku'];

    $buku = query("SELECT * FROM buku WHERE kode_buku = '$kode_buku'")[0]; 

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

        .btn-ubah,
        .btn-hapus,
        .btn-restore{
            display: inline-block;
            position: absolute;
            float: right;
            right: 200px;
            top: 135px;
            padding: 5px 10px;
            transition: .25s;
        }

        .btn-ubah:hover,
        .btn-hapus:hover,
        .btn-restore:hover {
            transform: scale(1.05);
            box-shadow: 0px 1px 5px rgba(0, 0, 0, 0.25);
        }

        .btn-ubah {
            margin-right: 170px;
            background-color: #f0ad4e;
        }

        .btn-hapus {
            margin-right: 90px;
            background-color: #d9534f;
        }

        .btn-restore {
            margin-right: 0px;
            background-color: #007bff;
        }

        .btn-ubah a {
            color: #fff;
        }

        .btn-hapus a {
            color: white;
        }

        .btn-restore a {
            color: white;
        }
    </style>
</head>

<body>
    <?php
        include '../_component/header-admin.php';
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
            <div class="btn-ubah">
                <a href="ubah.php?kode_buku=<?= $buku['kode_buku']; ?>">Ubah</a>
            </div>
            <div class="btn-hapus">
                <a href="trash-hapus.php?kode_buku=<?= $buku['kode_buku']; ?>" onclick="return confirm('buku ini akan dihapus permanen, anda yakin?');">Hapus</a>
            </div>
            <div class="btn-restore">
                <a href="restore.php?kode_buku=<?= $buku['kode_buku']; ?>">Restore</a>
            </div>
        </div>
    </div>
</body>

</html>