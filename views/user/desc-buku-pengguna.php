<?php

    require_once '../../core/functions.php';

    $kode_peminjaman = $_GET['kode_peminjaman'];    

    $peminjam = query("SELECT * FROM peminjaman WHERE kode_peminjaman = '$kode_peminjaman'")[0];

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
        }

        .container {
            padding: 25px 40px;
        }

        .container .form {
            padding: 20px 35px;
            margin-left: 100px;
        }

        .form .form-img {
            margin: 10px;
            padding: 10px;
            display: inline-block;
            box-shadow: 0px 1px 5px rgba(0, 0, 0, 0.25);
        }

        .form .form-bio {
            display: inline-block;
            padding: 25px;
            position: absolute;
            margin: 75px 0px 0px 50px;
            border-radius: 10px;
            border: 1px solid #34315d;
        }

        .form .form-bio p {
            background-color: #fff;
            position: absolute;
            top: -12.5px;
            padding: 4px;
        }

        .form .form-bio label {
            background-color: #fff;
        }

        .form .form-bio input {
            width: 300px;
            padding: 7.5px;
            border: none;
            border-bottom: 1px solid #34315d;
            font-size: 17px;
            color: blue;
        }

        .form .form-bio span {
            font-size: 12px;
            margin: 5px;
        }

        .btn-pinjam {
            background-color: #5bc0de;
            border: none;
            padding: 10px 20px;
            font-size: 17px;
            border-radius: 10px;
            position: relative;
            bottom: 75px;
            left: 575px;
            text-decoration: none;
            transition: .3s;

        }

        .btn-pinjam:hover {
            transform: scale(1.1);
        }
    </style>
</head>

<body>
    <?php include '../_component/header-user.php'; ?>

    <div class="container">
        <div class="form">
            <form action="" method="post">
                <div class="form-img"><img src="../../img/product/<?= $peminjam['gambar']; ?>" alt="" width="280"
                        height="396"></div>
                <div class="form-bio">
                    <p>Data Peminjaman</p>
                    <table border="0" cellspacing="15">
                        <tr>
                            <td><label for="kode_peminjaman">Kode Peminjaman </label></td>
                            <td><input type="text" name="kode_peminjaman" id="kode_peminjaman" readonly
                                    value="<?= $peminjam['kode_peminjaman']; ?>"><br>
                                <span>Berikan kode ini pada petugas perpustakaan!</span>
                            </td>

                        </tr>
                        <tr>
                            <td><label for="judul">Judul </label></td>
                            <td><input type="text" name="judul" id="judul" value="<?= $peminjam['judul']; ?>" readonly>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="batas_waktu">Batas Waktu </label></td>
                            <td><input type="text" name="batas_waktu" id="batas_waktu"
                                    value="<?= $peminjam['batas_waktu']; ?>" required></td>
                        </tr>
                    </table>
                </div>
                <br>
                <a href="index.php" class="btn-pinjam">Ke Pustaka!</a>
            </form>
        </div>
    </div>
</body>

</html>