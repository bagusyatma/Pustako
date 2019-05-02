<?php

    $conn = mysqli_connect("localhost", "root", "", "pustako-beta");

    function query($query){
        global $conn;

        $result = mysqli_query($conn, $query);
        $rows = [];

        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }

        return $rows;
    }

    function tambah($data){
        global $conn;

        $kode_buku = htmlspecialchars($data['kode-buku']);
        $judul_buku = htmlspecialchars($data['judul-buku']);
        $kode_kategori = htmlspecialchars($data['kode-kategori']);
        $pengarang = htmlspecialchars($data['pengarang']);
        $penerbit = htmlspecialchars($data['penerbit']);
        $sinopsis = htmlspecialchars($data['sinopsis']);
        $status = "Y";

        $gambar = upload();
        if (!$gambar) {
            return false;
        }

        $query = "INSERT INTO buku VALUES ('$kode_buku', '$judul_buku', '$kode_kategori', '$pengarang', '$penerbit', '$sinopsis', '$gambar', '$status')";

        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }

    
    function upload(){
        
        $namaFile = $_FILES['gambar']['name'];
        $ukuranFile = $_FILES['gambar']['size'];
        $error = $_FILES['gambar']['error'];
        $tmpName = $_FILES['gambar']['tmp_name'];

        //cek apakah tidak ada gambar yg diupload
        if ($error === 4) {
            echo "<script>
                alert('pilih gambar terlebih dahulu!')
            </script>";
            return false;
       }

        //cek apakah yan diupload adalah gambar
        $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
        $ekstensiGambar = explode('.', $namaFile);
        $ekstensiGambar = strtolower(end($ekstensiGambar));

        if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
            echo "<script>
                alert('yang anda upload bukan gambar!')
            </script>";
            return false;
        }

        //cek jika ukurannya terlalu besar
        if ($ukuranFile > 1000000) {
            echo "<script>
                alert('ukuran gambar terlalu besar!')
            </script>";
            return false;
        }

        $namaFileBaru = uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru .= $ekstensiGambar;


        //lolos pengecekan, gambar siap diupload
        move_uploaded_file($tmpName, '../../img/product/' . $namaFileBaru);

        return $namaFileBaru;
    }

    function trash($kode_buku){
        global $conn;

        mysqli_query($conn, "UPDATE buku SET status = 'N' WHERE kode_buku = '$kode_buku' ");
        return mysqli_affected_rows($conn);
    }

    function restore($kode_buku){
        global $conn;

        mysqli_query($conn, "UPDATE buku SET status = 'Y' WHERE kode_buku = '$kode_buku' ");
        return mysqli_affected_rows($conn);
    }

    function hapus($kode_buku){
        global $conn;

        mysqli_query($conn, "DELETE FROM buku WHERE kode_buku = '$kode_buku'");
        return mysqli_affected_rows($conn);
    }

    function ubah($data){
        global $conn;

        $kode_buku = $data['kode-buku'];
        $judul_buku = htmlspecialchars($data['judul-buku']);
        $kode_kategori = htmlspecialchars($data['kode_kategori']);
        $pengarang = htmlspecialchars($data['pengarang']);
        $penerbit = htmlspecialchars($data['penerbit']);
        $sinopsis = htmlspecialchars($data['sinopsis']);
        $pict = $data['pict'];

        //cek apakah user pilih gambar baru atau tidak
        if ($_FILES['gambar']['error'] === 4) {
            $gambar = $pict;
        }
        else {
            $gambar = upload();
        }

        $query = " UPDATE buku SET 
                    judul = '$judul_buku',
                    kode_kategori = '$kode_kategori',
                    pengarang = '$pengarang',
                    penerbit = '$penerbit',
                    sinopsis = '$sinopsis',
                    gambar = '$gambar'
                   WHERE kode_buku = '$kode_buku'
                ";
        
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }

    function register($data){
        global $conn;

        $nis = htmlspecialchars($data['nis']);
        $username = strtolower(stripslashes(htmlspecialchars($data['username'])));
        $password = mysqli_real_escape_string($conn, $data['password']);
        $password2 = mysqli_real_escape_string($conn, $data['password2']);

        //cek username sudah ada / belum
        $query_users = "SELECT username FROM users WHERE username = '$username'";
        $result_users = mysqli_query($conn, $query_users);

        if (mysqli_fetch_assoc($result_users)) {
            echo "
                <script>
                    alert('username sudah terdaftar');
                </script>
            ";
            return false;
        }

        //cek username admin sudah ada / belum
        $query_admin = "SELECT username FROM admin WHERE username = '$username'";
        $result_admin = mysqli_query($conn, $query_admin);

        if (mysqli_fetch_assoc($result_admin)) {
            echo "
                <script>
                    alert('gausah coba-coba jadi admin yaa kamu!');
                </script>
            ";
            return false;
        }


        // cek kondirmasi password
        if ($password !== $password2) {
            echo "
                <script>
                    alert('konfirmasi password tidak sesuai!');
                </script>
            ";
            return false;
        }

        //enkripsi password
        $password = password_hash($password, PASSWORD_DEFAULT);

        //tambah ke database
        mysqli_query($conn, "INSERT INTO users VALUES ('$nis', '$username', '$password')");

        return mysqli_affected_rows($conn);
    }

    function pinjam($data){
        global $conn;

        $kode_peminjaman = htmlspecialchars($data['kode_peminjaman']);
        $kode_buku = htmlspecialchars($data['kode_buku']);
        $judul_buku = htmlspecialchars($data['judul']);
        $nis = htmlspecialchars($data['nis']);
        $nama_lengkap = htmlspecialchars($data['nama_lengkap']);
        $kelas = htmlspecialchars($data['kelas']);
        $gambar = htmlspecialchars($data['gambar']);
        $batas_waktu = htmlspecialchars($data['batas_waktu']);

        $query = "INSERT INTO peminjaman(kode_peminjaman, kode_buku, judul, nis, nama_lengkap, kelas, gambar, batas_waktu) VALUES ('$kode_peminjaman', '$kode_buku', '$judul_buku', '$nis', '$nama_lengkap', '$kelas', '$gambar', '$batas_waktu' )";

        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }

?>