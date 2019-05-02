<?php
    session_start();
    require '../../core/functions.php';
    
    if (!isset($_SESSION['login_admin'])) {
        header("location: ../../auth/login.php");
        exit;
    }

    $buku = query("SELECT * FROM buku WHERE status = 'N'"); 

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
    </style>
</head>

<body>
    <div class="jumbotron">
        <?php
            include '../_component/header-admin.php';
        ?>
        <div class="content">
            <div class="header-buku">
                <div class="header-p">
                    <h3>Trash Buku</h3>
                </div>
            </div>
            <div class="pustaka">
                <?php
                    foreach ($buku as $row) :
                ?>
                <a href="trash-desc.php?kode_buku=<?= $row['kode_buku']; ?>">
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