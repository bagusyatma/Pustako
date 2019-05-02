<?php

    require '../../core/functions.php';

    $nis = $_GET['nis'];
    $peminjaman = mysqli_query($conn, "SELECT * FROM peminjaman WHERE nis = '$nis'");


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        *,
        body {
            padding: 0;
            margin: 0;
            font-family: Montserrat, Open Sans;
            text-decoration: none;
        }

        .header-buku {
            width: 100%;
            height: 50px;
            border-bottom: 1px solid rgba(0, 0, 0, 0.25);
        }

        .header-buku .header-p {
            position: absolute;
            top: 90px;
            left: 25px;
        }

        .search {
            display: inline-block;
            float: right;
            line-height: 50px;
            margin-right: 110px;
        }

        .search label {
            position: relative;
            top: 3px;
        }

        .search input {
            margin-right: 30px;
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
            right: 0;
            display: none;
        }

        .table {}

        .table-header {
            background-color: #4476eb;
            width: 95%;
            margin: 10px auto;
            margin-bottom: 5px;
            color: #ffffff;
            border-top-right-radius: 25px;
            border-top-left-radius: 25px;
        }

        .table-header div {
            display: inline-block;
            padding: 10px 25px;
        }

        .table-header .thkode-peminjaman {
            position: relative;
            left: 15px;
        }

        .table-header .thbuku {
            position: relative;
            left: 120px;
        }

        .table-header .thwaktu {
            float: right;
            position: relative;
            right: 90px;
        }

        .table-content {
            background-color: #e6edff;
            width: 95%;
            height: 75px;
            margin: 10px auto;
        }

        .table-content:hover {
            background-color: #fff;
        }

        .table-content .tc {
            display: inline-block;
        }

        .table-content .kode-peminjaman {
            background-color: #a7c1ff;
            padding: 10px;
            position: relative;
            border-radius: 5px;
            bottom: 7.5px;
            margin: auto 50px;
        }

        .table-content .buku {
            width: 500px;
            position: relative;
            top: 10px;
            border-radius: 5px;
            margin: 0px 10px 0px 10px;
        }

        .table-content .buku .buku-img {
            display: inline-block;
            position: relative;
            top: 2px;
            left: 25px;
        }

        .table-content .buku .buku-p {
            background-color: #a7c1ff;
            padding: 10px;
            display: inline-block;
            position: relative;
            bottom: 17.5px;
            left: 50px;
            border-radius: 5px;
        }

        .table-content .batas-waktu {
            float: right;
            background-color: #90b1ff;
            padding: 10px;
            position: relative;
            top: 17.5px;
            border-radius: 5px;
            margin: 0px 75px 0px 10px;
        }
    </style>
</head>

<body>
    <?php include '../_component/header-admin.php'; ?>

    <div class="container">
        <div class="content">
            <div class="header-buku">
                <div class="header-p">
                    <h3>Daftar Buku Anda</h3>
                </div>
            </div>
            <div class="table">
                <div class="table-header">
                    <div class="thkode-peminjaman">
                        <p>Kode Peminjaman</p>
                    </div>
                    <div class="thbuku">
                        <p>Buku</p>
                    </div>
                    <div class="thwaktu">
                        <p>Batas Waktu</p>
                    </div>
                </div>
                <div id="peminjam">
                    <?php
                    while ($row = mysqli_fetch_assoc($peminjaman)) :
                ?>
                    <div class="table-content"
                        onclick="window.location.href='desc-buku-pengguna.php?kode_peminjaman=<?= $row["kode_peminjaman"]; ?>'">
                        <div class="tc kode-peminjaman">
                            <p><?= $row['kode_peminjaman']; ?></p>
                        </div>
                        <div class="tc buku">
                            <div class="buku-img">
                                <img src="../../img/product/<?= $row['gambar']; ?>" width="35">
                            </div>
                            <div class="buku-p">
                                <p><?= $row['judul']; ?></p>
                            </div>
                        </div>
                        <div class="tc batas-waktu">
                            <p><?= $row['batas_waktu']; ?></p>
                        </div>
                    </div>
                    <?php
                    endwhile;
                ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>