<?php
usleep(500000);
require '../../core/functions.php';

$keyword = $_GET['keyword'];

$query = "SELECT * FROM peminjaman WHERE 
            kode_peminjaman LIKE '%$keyword%'
        ";
$peminjaman = mysqli_query($conn, $query);
?>

<div id="peminjam">
<?php
    while ($row = mysqli_fetch_assoc($peminjaman)) :
?>
    <div class="table-content">
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