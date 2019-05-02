<?php
    require '../../core/functions.php';

    $kode_buku = $_GET['kode_buku'];

    if (hapus($kode_buku) > 0) {
        echo "
            <script>
                alert('data berhasil dihapus permanen!');
                document.location.href = 'trash-index.php';
            </script>
        ";
    }   
    else {
        echo "
            <script>
                alert('data gagal dihapus!');
                document.location.href = 'trash-desc.php';
            </script>
        ";
    }
?>