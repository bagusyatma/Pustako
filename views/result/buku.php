<?php
usleep(500000);
require '../../core/functions.php';

$keyword = $_GET['keyword'];

$query = "SELECT * FROM buku WHERE
            kode_buku LIKE '%$keyword%' AND status = 'Y' OR
            judul LIKE '%$keyword%' AND status = 'Y' OR
            pengarang LIKE '%$keyword%' AND status = 'Y' OR
            penerbit LIKE '%$keyword%' AND status = 'Y'
        ";
$buku = query($query);
?>

<div class="pustaka">
    <?php
        foreach ($buku as $row) :
    ?>
    <a href="desc.php?kode_buku=<?= $row['kode_buku']; ?>">
        <div class="buku">
            <div class="gambar-buku"><img src="../../img/product/<?= $row['gambar'] ?>" alt="" width="140" height="198"></div>
            <div class="judul-buku"><?= $row['judul']?></div>
        </div>
    </a>
    <?php
        endforeach;
    ?>
</div>