<?php
    require '../../core/functions.php';

    $kode_buku = $_GET['kode_buku'];

    if (restore($kode_buku) > 0) {
        echo "
            <script>
                alert('data berhasil direstore!');
                document.location.href = 'trash-index.php';
            </script>
        ";
    }   
    else {
        echo "
            <script>
                alert('data gagal direstore!');
                document.location.href = 'trash-desc.php';
            </script>
        ";
    }
?>