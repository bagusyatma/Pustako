<?php

session_start();
    require '../../core/functions.php';
    
    if (!isset($_SESSION['login_admin'])) {
        header("location: ../../auth/login.php");
        exit;
    }

$kode_buku = $_GET['kode_buku'];

$buku = query("SELECT * FROM buku WHERE kode_buku = '$kode_buku'")[0];

if (isset($_POST['ubah'])) {
    if (ubah($_POST) > 0) {
        echo "
            <script>
                alert('data berhasil diubah!');
                document.location.href = 'index.php';
            </script>
        ";
    }
    else {
        echo "
            <script>
                alert('data gagal diubah!');
                document.location.href = 'index.php';
            </script>
        ";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ubah</title>
    <style>
        *,
        body {
            margin: 0;
            padding: 0;
            font-family: Montserrat, Open Sans;
            color: #212529;
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
        }
        .kotak-ubah {
            background-color: #fff;
            width: 950px;
            padding: 40px;
            margin: 35px auto;
            border-radius: 10px;
            box-shadow: 0px 2px 7px rgba(0, 0, 0, 0.25);
        }

        .bagian-satu {
            padding: 10px 30px 10px 30px;
            /* background-color: salmon; */
            display: inline-block;
            margin-right: 25px;
            /* border-right: 1px solid #212529; */
            box-shadow: 10px 0px 7px -5px rgba(0, 0, 0, 0.1);
        }

        .bagian-dua {
            padding: 5px 10px;
            /* background-color: salmon; */
            margin: 0px 5px 20px 20px;
            display: inline-block;
        }

        input {
            width: 200px;
        }

        .input {
            margin: 25px 10px 25px 10px;
            padding: 4px 8px;
            border: 1px solid #1f1f1f;
        }

        .satu {
            border: none;
            border-bottom: 1px solid rgba(0, 0, 0, 0.5);
            box-shadow: 0px 5px 15px -5px rgba(0, 0, 0, 0.1);
        }

        label {
            margin: 10px 10px 10px 10px;
            text-align: left;
        }

        table {
            margin: 5px auto;
        }

        #sinopsis {
            border-radius: 10px;
            width: 250px;
            height: 120px;
            font-size: 13px;
        }

        #gambar {
            border: none;
        }

        .gambarlama {
            position: relative;
            margin-left: 20px;
            top: 2px;
        }

        .btn-ubah {
            width: 100px;
            padding: 5px 10px;
            background-color: #151b3b;
            color: white;
            transition: 1s;
        }

        .btn-ubah:hover {
            padding: 5px 10px;
            transform: scale(1.1);
            box-shadow: 0px 2px 7px rgba(0, 0, 0, 0.25);
        }

        .notice {
            font-size: 10px;
            position: relative;
            left: 10px;
            bottom: 20px;
        }
    </style>
</head>

<body>
    <section class="jumbotron">
    <header class="nav">
        <a href="index.php">
            <div class="nav-logo"><img src="../../img/pustako.png" alt="Pustako" height="50">
                <span class="logo-header">
                    <h2><i>Pustako</i></h2>
                </span>
            </div>
        </a>
        </header>
        <div class="kotak-ubah">
            <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="pict" id="pict" value="<?= $buku['gambar']; ?>">
                <div class="form-ubah">
                    <div class="bagian-satu">
                        <table border="0">
                            <tr>
                                <td><label for="kode-buku">Kode Buku</label></td>
                                <td><input type="text" class="input satu" name="kode-buku" id="kode-buku"
                                        value="<?= $buku['kode_buku']; ?>" readonly></td>
                            </tr>
                            <tr>
                                <td><label for="judul-buku">Judul Buku</label></td>
                                <td><input type="text" class="input satu" name="judul-buku" id="judul-buku"
                                        placeholder="Masukan Judul Buku" maxlength="35" value="<?= $buku['judul']; ?>"
                                        required><br></td>
                            </tr>
                            <tr>
                                <td><label for="kode_kategori">Kategori Buku</label></td>
                                <td>
                                    <select name="kode_kategori" id="kode_kategori" class="input satu">
                                        <option value="">---</option>
                                        <option value="BIO">Biografi</option>
                                        <option value="DGG">Dongeng</option>
                                        <option value="KMK">Komik</option>
                                        <option value="NVL">Novel</option>
                                        <option value="PDN">Panduan</option>
                                    </select><br>
                                    <p class="notice">dimohon masukan kembali kategori buku!</p>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="pengarang">Pengarang</label></td>
                                <td><input type="text" class="input satu" name="pengarang" id="pengarang"
                                        placeholder="Masukan Pengarang Buku" value="<?= $buku['pengarang']; ?>"><br>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="penerbit">Penerbit</label></td>
                                <td><input type="text" class="input satu" name="penerbit" id="penerbit"
                                        placeholder="Masukan Penerbit Buku" value="<?= $buku['penerbit']; ?>"><br></td>
                            </tr>

                        </table>
                    </div>
                    <div class="bagian-dua">
                        <table border="0">
                            <tr>
                                <td><label for="sinopsis">Sinopsis</label></td>
                                <td>
                                    <textarea class="input" name="sinopsis" id="sinopsis" cols="25"
                                        rows="5"><?= $buku['sinopsis']; ?></textarea><br>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label for="gambar">Gambar</label>
                                </td>
                                <td>
                                    <input type="file" name="gambar" id="gambar" class="input">
                                </td>
                            </tr>
                            <tr>
                                <td><label for="gambarLama">Gambar<br>&ensp;Sebelumnya</label>
                                </td>
                                <td><img src="../../img/product/<?= $buku['gambar']; ?>" alt="" width="30" class="gambarlama">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" align="center"><button type="submit" name="ubah"
                                        class="input btn-ubah">Ubah</button></td>
                            </tr>
                    </div>
                    </table>
                </div>
            </form>
        </div>
    </section>
</body>

</html>