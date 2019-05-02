<?php
    session_start();
    require '../../core/functions.php';
    
    if (!isset($_SESSION['login_admin'])) {
        header("location: ../../auth/login.php");
        exit;
    }

    $result = mysqli_query($conn, "SELECT kode_buku FROM buku ORDER BY kode_buku DESC");
    $row = mysqli_fetch_assoc($result);
    $kode = $row['kode_buku'];

    $urut = substr($kode, 4, 4);
    $tambah = (int) $urut + 1;

    if (strlen($tambah) == 1) {
        $kode_buku = "PSTK"."000" .$tambah;
    }
    elseif (strlen($tambah) == 2) {
        $kode_buku = "PSTK"."00" .$tambah;
    }
    elseif (strlen($tambah) == 3) {
        $kode_buku = "PSTK"."0" .$tambah;
    }
    else {
        $kode_buku = $tambah;
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pustako - Tambah Buku</title>
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

        .kotak-tambah {
            background-color: #fff;
            width: 900px;
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
            padding: 10px 20px;
            /* background-color: salmon; */
            margin: 0px 5px 20px 15px;
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
        }

        table {
            margin: 5px auto;
        }

        #sinopsis {
            border-radius: 10px;
            width: 200px;
            font-size: 13px;
        }

        #gambar {
            border: none;
        }

        .btn-tambah {
            width: 100px;
            padding: 5px 10px;
            background-color: #151b3b;
            color: white;
            transition: 1s;
        }

        .btn-tambah:hover {
            padding: 5px 10px;
            transform: scale(1.1);
            box-shadow: 0px 2px 7px rgba(0, 0, 0, 0.25);
        }
    </style>
</head>

<body>
<?php
    if (isset($_POST['tambah'])) {
        if (tambah($_POST) > 0) {
            echo "
                <script>
                    alert('data berhasil ditambahkan!');
                    document.location.href = 'index.php';
                </script>
            ";
        }
        else {
            echo "
                <script>
                    alert('data gagal ditambahkan!');
                    document.location.href = 'index.php';
                </script>
            ";
        }
    }
?>
    <section class="jumbotron">
        <header class="nav">
            <a href="../admin/index.php">
                <div class="nav-logo"><img src="../../img/pustako.png" alt="Pustako" height="50">
                    <span class="logo-header">
                        <h2><i>Pustako</i></h2>
                    </span>
                </div>
            </a>
        </header>
        <div class="kotak-tambah">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-tambah">
                    <div class="bagian-satu">
                        <table border="0">
                            <tr>
                                <td><label for="kode-buku">Kode Buku</label></td>
                                <td><input type="text" class="input satu" name="kode-buku" id="kode-buku"
                                        value="<?php echo $kode_buku; ?>" readonly></td>
                            </tr>
                            <tr>
                                <td><label for="judul-buku">Judul Buku</label></td>
                                <td><input type="text" class="input satu" name="judul-buku" id="judul-buku"
                                        placeholder="Masukan Judul Buku" maxlength="35" required><br></td>
                            </tr>
                            <tr>
                                <td><label for="kode-kategori">Kategori Buku</label></td>
                                <td>
                                    <select name="kode-kategori" id="kode-kategori" class="input satu">
                                        <option value="">---</option>
                                        <option value="BIO">Biografi</option>
                                        <option value="DGG">Dongeng</option>
                                        <option value="KMK">Komik</option>
                                        <option value="NVL">Novel</option>
                                        <option value="PDN">Panduan</option>
                                    </select><br>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="pengarang">Pengarang</label></td>
                                <td><input type="text" class="input satu" name="pengarang" id="pengarang"
                                        placeholder="Masukan Pengarang Buku" required><br></td>
                            </tr>
                            <tr>
                                <td><label for="penerbit">Penerbit</label></td>
                                <td><input type="text" class="input satu" name="penerbit" id="penerbit"
                                        placeholder="Masukan Penerbit Buku" required><br></td>
                            </tr>

                        </table>
                    </div>
                    <div class="bagian-dua">
                        <table border="0">
                            <tr>
                                <td><label for="sinopsis">Sinopsis</label></td>
                                <td>
                                    <textarea class="input" name="sinopsis" id="sinopsis" cols="25"
                                        rows="5"></textarea><br>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="gambar">Gambar</label>
                                </td>
                                <td>
                                    <input type="file" name="gambar" id="gambar" class="input" required>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" align="center"><button type="submit" name="tambah"
                                        class="input btn-tambah">Tambah</button></td>

                            </tr>
                    </div>
                    </table>
                </div>
            </form>
        </div>
    </section>
</body>

</html>