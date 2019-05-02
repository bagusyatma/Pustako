<?php
    require '../../core/functions.php';

    $kode_peminjaman = $_GET['kode_peminjaman'];
    $peminjaman = query("SELECT * FROM peminjaman WHERE kode_peminjaman = '$kode_peminjaman'");
    var_dump($peminjaman);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php include '../_component/header-user.php'; ?>
</body>
</html>