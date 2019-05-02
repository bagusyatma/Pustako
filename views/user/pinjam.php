<?php

    require_once '../../core/functions.php';

    $kode_buku = $_GET['kode_buku'];
    $nis = $_GET['nis'];

    $buku = query("SELECT * FROM buku WHERE kode_buku = '$kode_buku'")[0];
    $users = query("SELECT * FROM users WHERE nis = '$nis'")[0];
 
    // $random_code = strtoupper(uniqid()) ; 
    $n = 5; 
    $random_code = strtoupper(bin2hex(random_bytes($n))); 
    $kode_peminjaman = $random_code;

    $d=strtotime("+3 Months");

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

        .form .form-desc {
            padding: 25px;
            display: inline-block;
            position: absolute;
            margin: 25px 0px 0px 50px;
            border-radius: 10px;
            border: 1px solid #34315d;
        }

        .form .form-desc p {
            background-color: #fff;
            position: absolute;
            top: -12.5px;
            padding: 4px;
        }

        .form .form-desc label {
            margin: 10px 0px 10px 15px;
        }

        .form .form-desc input {
            width: 300px;
            padding: 7.5px;
            border: none;
            border-bottom: 1px solid #34315d;
            font-size: 17px;
            color: blue;
            margin: 10px 10px 10px 5px;
        }

        .form .form-bio {
            display: inline-block;
            padding: 25px;
            position: absolute;
            margin: 150px 0px 0px 50px;
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
            display: inline-block;
            width: 300px;
            padding: 7.5px;
            border: none;
            border-bottom: 1px solid #34315d;
            font-size: 17px;
            color: blue;
        }

        .form .form-bio select {
            width: 316px;
            padding: 7.5px;
            color: blue;
        }

        .btn-pinjam {
            background-color: #5bc0de;
            border: none;
            padding: 10px 20px;
            font-size: 17px;
            border-radius: 10px;
            position: relative;
            left: 550px;
            transition: .3s;
        }

        .btn-pinjam:hover {
            transform: scale(1.1);
        }
    </style>
</head>

<body>
<?php
    if (isset($_POST['submit'])) {
        if (pinjam($_POST) > 0) {
            echo "
                <script>
                    alert('Peminjaman berhasil!');
                    document.location.href = 'buku-pengguna.php?nis=$nis';
                </script>
            ";
        }
        else {
            echo "
                <script>
                    alert('Peminjaman gagal!');
                    document.location.href = 'index.php';
                </script>
            ";
        }
    }
?>

    <?php include '../_component/header-user.php'; ?>

    <div class="container">
        <div class="form">
            <form action="" method="post">
                <input type="hidden" name="gambar" id="gambar" value="<?= $buku['gambar']; ?>">
                <input type="hidden" name="kode_peminjaman" id="kode_peminjaman" value="<?= $kode_peminjaman; ?>">
                <input type="hidden" name="kode_buku" id="kode_buku" value="<?= $buku['kode_buku']; ?>">
                <div class="form-img"><img src="../../img/product/<?= $buku['gambar']; ?>" alt="" width="280"
                        height="396"></div>
                <div class="form-desc">
                    <p>Data Buku</p>
                    <label for="judul">Judul </label>
                    <input type="text" name="judul" id="judul" readonly value="<?= $buku['judul']; ?>">
                </div>
                <div class="form-bio">
                    <p>Data Siswa</p>
                    <table border="0" cellspacing="15">
                        <tr>
                            <td><label for="nis">Nomor Induk Siswa </label></td>
                            <td><input type="text" name="nis" id="nis" readonly value="<?= $users['nis']; ?>"></td>
                        </tr>
                        <tr>
                            <td><label for="nama_lengkap">Nama Lengkap </label></td>
                            <td><input type="text" name="nama_lengkap" id="nama_lengkap" required></td>
                        </tr>
                        <tr>
                            <td><label for="kelas">Kelas</label></td>
                            <td>
                                <select name="kelas" id="kelas" required>
                                    <option value=""></option>
                                    <option value="X TEL 1">X TEL 1</option>
                                    <option value="X TEL 2">X TEL 2</option>
                                    <option value="X TEL 3">X TEL 3</option>
                                    <option value="X TEL 4">X TEL 4</option>
                                    <option value="X TEL 5">X TEL 5</option>
                                    <option value="X TEL 6">X TEL 6</option>
                                    <option value="X TEL 7">X TEL 7</option>
                                    <option value="X TEL 8">X TEL 8</option>
                                    <option value="X TEL 9">X TEL 9</option>
                                    <option value="X TEL 10">X TEL 10</option>
                                    <option value="X TEL 11">X TEL 11</option>
                                    <option value="X TEL 12">X TEL 12</option>
                                    <option value="X TEL 13">X TEL 13</option>
                                    <option value=""></option>
                                    <option value="XI TEL 1">XI TEL 1</option>
                                    <option value="XI TEL 2">XI TEL 2</option>
                                    <option value="XI TEL 3">XI TEL 3</option>
                                    <option value="XI TEL 4">XI TEL 4</option>
                                    <option value="XI TEL 5">XI TEL 5</option>
                                    <option value="XI TEL 6">XI TEL 6</option>
                                    <option value="XI TEL 7">XI TEL 7</option>
                                    <option value="XI TEL 8">XI TEL 8</option>
                                    <option value="XI TEL 9">XI TEL 9</option>
                                    <option value="XI TEL 10">XI TEL 10</option>
                                    <option value="XI TEL 11">XI TEL 11</option>
                                    <option value="XI TEL 12">XI TEL 12</option>
                                    <option value="XI TEL 13">XI TEL 13</option>
                                    <option value=""></option>
                                    <option value="XII TEL 1">XII TEL 1</option>
                                    <option value="XII TEL 2">XII TEL 2</option>
                                    <option value="XII TEL 3">XII TEL 3</option>
                                    <option value="XII TEL 4">XII TEL 4</option>
                                    <option value="XII TEL 5">XII TEL 5</option>
                                    <option value="XII TEL 6">XII TEL 6</option>
                                    <option value="XII TEL 7">XII TEL 7</option>
                                    <option value="XII TEL 8">XII TEL 8</option>
                                    <option value="XII TEL 9">XII TEL 9</option>
                                    <option value="XII TEL 10">XII TEL 10</option>
                                    <option value="XII TEL 11">XII TEL 11</option>
                                    <option value="XII TEL 12">XII TEL 12</option>
                                    <option value="XII TEL 13">XII TEL 13</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="batas_waktu">Batas Waktu </label></td>
                            <td><input type="text" name="batas_waktu" id="batas_waktu" value="<?= date("Y-m-d h:i:s", $d) ?>" required></td>
                        </tr>
                    </table>
                </div>
                <br>
                <button type="submit" name="submit" class="btn-pinjam">Pinjam Sekarang!</button>
            </form>
        </div>
    </div>
</body>

</html>