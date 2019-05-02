<?php
    require '../../core/functions.php';

    $kode_buku = $_GET['kode_buku'];

    if (trash($kode_buku) > 0) {
        echo "
            <script>
                alert('data berhasil dihapus!');
                document.location.href = 'index.php';
            </script>
        ";
    }   
    else {
        echo "
            <script>
                alert('data gagal dihapus!');
                document.location.href = 'desc.php';
            </script>
        ";
    }
?>