-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Bulan Mei 2019 pada 14.58
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pustako-beta`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$WZYS1.3t45iUrM8ivHldbOZITLHCg.Khk3OiwDtwusGdLUuG6rGb6');

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `kode_buku` varchar(8) NOT NULL,
  `judul` varchar(55) NOT NULL,
  `kode_kategori` varchar(3) NOT NULL,
  `pengarang` varchar(55) NOT NULL,
  `penerbit` varchar(55) NOT NULL,
  `sinopsis` text NOT NULL,
  `gambar` varchar(55) NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`kode_buku`, `judul`, `kode_kategori`, `pengarang`, `penerbit`, `sinopsis`, `gambar`, `status`) VALUES
('PSTK0001', 'Dia adalah Dilanku Tahun 1990', 'NVL', 'Pidi Baiq', 'DAR! Mizan', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque fuga, deserunt ex ipsam, velit aperiam tempore tempora ipsa ea incidunt illo officia mollitia? Eius consequatur ipsa itaque totam, excepturi aliquid atque quibusdam et ex obcaecati nesciunt illo fugiat? Dicta esse quam dolorem quas nulla accusantium veniam! Numquam, molestiae animi? Minus enim ullam ea nemo sequi. Ducimus eos esse ex ipsa ipsum ut distinctio, fugiat quasi laboriosam quam non, eaque odit aliquam! Esse ipsam eveniet praesentium culpa, recusandae dolore voluptas aperiam ipsa voluptatum voluptates, aut autem, repellat magnam! Suscipit repellendus nostrum ab totam quidem, quo veritatis animi? Impedit voluptates eius facere, dolore molestiae in harum eligendi maiores delectus culpa ex dicta suscipit nobis dolorum illum molestias quae aliquid magni iusto ducimus, id amet vel saepe! Quibusdam minus eaque tempora! Quia debitis recusandae magni? Expedita sint unde, ipsa quis ipsum vero iste excepturi amet harum eaque. Quaerat cumque eaque labore nam quo!', '5cb9c7718b00e.jpg', 'Y'),
('PSTK0002', 'Boruto : Naruto Next Generation', 'KMK', 'Masashi Kishimoto', 'Gramedia', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tempore id ullam rerum nostrum odio iste iusto adipisci illo atque rem voluptatum magni vitae eius neque mollitia sed repellat non eligendi sint, deleniti voluptatibus ex sunt! Ipsam doloremque autem eos ipsa. Vitae esse corporis similique ipsa nostrum, quam beatae provident fugit obcaecati fuga dolorem in debitis repudiandae consectetur recusandae numquam ipsam iure reprehenderit asperiores saepe fugiat, aliquam natus. At tenetur maiores, ullam reiciendis sit incidunt porro sint recusandae suscipit illo aspernatur nulla possimus voluptatem quae dolorem vel ipsa modi. Itaque quis magni fuga perferendis fugiat et quae aliquid distinctio, rerum laborum!', '5cbae4819c12a.jpeg', 'N'),
('PSTK0003', 'Ketika Mas Gagah Pergi', 'NVL', 'Helvy Tiana Rosa', 'AsmaNadia Publishing House', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat nam delectus nesciunt cum amet eum ipsa quibusdam ratione odio illo eligendi repellendus perspiciatis est vel iure explicabo totam, voluptatibus temporibus sint in dolore accusamus. Itaque perferendis nulla quis iure! Deleniti, ipsam aliquid! Ab nisi quibusdam, pariatur, molestias cupiditate facilis non odio aut at atque earum. Sit voluptate quae dolor ex cum quo saepe vitae, qui consequuntur vel blanditiis sint dolore architecto nostrum necessitatibus, possimus numquam optio perferendis facere. Adipisci nesciunt quam quisquam delectus soluta ipsam corporis labore sunt officia? Quam qui, deserunt doloribus velit tempore eum adipisci modi id omnis.', '5cc1aaa70235f.jpg', 'Y'),
('PSTK0004', 'Laskar Pelangi', 'NVL', 'Andrea Hirata', 'Bentang', 'Cerita dalam novel ini berawal dari sebuah tempat di daerah Belitung. Tempat itu adalah Sekolah Dasar Muhammadiyah yang terletak di Gantung, Beltug Timur. Ketika itu merupakan detik-detik yang sangat menegangkan yang di rasakan oleh para anak-anak yang ingin sekolah di sekolah dasar tersebut.\r\n\r\nKesembilan murid yang sudah daftar diantaranya Lintang, Ikal, A Kiong, Sahara, Syahdan, Borek, Trapani, dan Kucai merasa gelisah karena sekolah yang akan mereka tempati akan ditutup apabila muridnya tidak mencapai 10 orang murid.\r\n\r\nMereka semua pun sangat cemas karena takut sekolahnya ditutup. Sekolah dasar Muhammadiyah ini merupakan sekolah dasar Islam yang paling tua di Belitung, oleh sebab itu apabila sekolah ini benar-benar ditutup, keluarga yang pra sejahtera akan kesulitan mencarikan sekolah untuk anak-anaknya selain di sekolah dasar Muhamdadiyah ini. Hanya di sekolah dasar inilah anak-anak yang kurang mampu hanya bisa mengenyam pendidikan sekolah dasar mereka.\r\n\r\nKetika semua murid dan orang tuanya sudah sangat gelisah dan cemas, tiba-tiba datanglah Harun, seorang anak yang memiliki kekurangan mental. Dia menjadi penyelamat bagi kesembian sahabat dan juga orang tuanya, karena dengan datangnya Harun jumlah siswa yang mendaftar di sekolah dasar Muhammadiyah genpa menjadi 10 orang murid.\r\n\r\nPada akhirnya karena memenuhi syarat, sekolah dasar ini pun tidak jadi ditutup. Dari titik inilah petualangan ke 10 anak itu di mulai. Sekolah pun sudah dimulai, mereka menempatkan tempat duduknya masing-masing, bertemu dengan kepala sekolah yaitu Pak Harfan, mereka saling berkenalan satu sama lainnya. Hal paling lucu ketika sesi perkenalan adalah ketika A Kiong malah ketawa-ketawa saat ditanya namanya oleh guru mereka yaitu Bu Muslimah.\r\n\r\nHal-hal bodoh yang diperbuat Borek, pemilihan ketua kelas diprotes oleh si Kucai, bakat yang dimiliki Mahar yang sangat luar biasa, Ikal yang pernah mengalami jatuh cinta, hingga Lintang yang mempertaruhkan nyawanya yang setiap harinya bersepeda pulang pergi dari rumah ke sekolah yang jaraknya 80 km.\r\n\r\nKejadian-kejadian yang ada menjadi sebuah hiasan indah dari kehidupan yang dialami dari kesepuluh anak yang menyebut diri mereka Laskar Pelangi. Mereka memiliki guru yang sangat baik, guru itu bernama Bu Muslimah atau sering dipanggil Bu Mus inilah yang memberikan nama Laskar Pelangi untuk mereka.\r\n\r\nLaskar Pelangi menjadi pilihan karena kesepuluh anak itu sangat suka sekali dengan pelangi. Semua kejadian baik itu susah maupun senang mereka lalui bersama di kelas yang ketika pada malam hari dipakai menjadi kandang hewan ternak. Di sekolah dasar Muhammadiyah inilah Ikal dan sahabat-sahabatnya memperoleh kenangan-kenangan indah yang tidak akan pernah mereka lupakan.\r\n\r\nKenangan seperti ketika kisah cinta Ikal dan A Ling. Pada mulanya Ikal disuruh ibu guru Mus untuk membeli kapur tulis di toko keluarganya A Ling. Ketika akan membayar, Ikal melihat tangan dan kuku indahnya A Ling, sejak itulah hati Ikal selalu berbunga-bunga selalu membayangkan indahnya kejadian itu.\r\n\r\nIkal belum pernah melihat kuku seindah A Ling. Pada akhirnya Ikal tahu bahwa orang yang memiliki kuku indah itu namanya A Ling, Ikal pun langsung kasmaran dengan A Ling. Akan tetapi, Ikal harus menelan pahitnya jatuh cinta, karena A Ling harus pindah ke luar daerah untuk menemani sang bibi yang tinggal sendirian.\r\n\r\nPeristiwa ketika Mahar mempunyai ide yang sangat bagus untuk mengikuti lomba seperti karnaval. Mahar memiliki ide untuk mengikuti lomba di karnaval itu dengan menari. Mereka menari seperti orang kesurupan, itu disebabkan karena kalung yang mereka pakai berasal dari buah yang sangat langka dan buah itu hanya ada di Belitung saja, adalah tumbuhan yang menjadikan sekujur tubuh mereka gatal. Hasilnya mereka semua menari seperti orang kemasukan setan. Tapi, berat kejadian itu SD Muhammadiyah menjadi pemeang dalam lomba itu.\r\n\r\nAda sebuah kejadian saat kedatangan Flo. Dia merupakan anak orang kaya yang pindah dari SD PN, dan masuk ke dalam kehidupan para anggota Laskar Pelangi. Kedatangan Flo membawa pengaruh yang sangat buruk bagi para anggota Laskar Pelangi, terutama Mahar yang saat itu duduk sebangku dengan Flo. Sejak Mahar satu bangku dengan Flo nilai Mahar menjadi jelek yang mengakibtkan Bu Mus sangat kecewa dan marah kepada Mahar.\r\n\r\nSetiap hari yang di lewati mereka enuh dengan canda, tawa dan juga tangis. Tapi, di belakang semua keceriaan yang mereka alami, seorang murid bernama Lintang yang semangat dan kerja kerasnya untuk mendapatkan pendidikan patut kita teladani. Ia tak kenal lelah untuk mengayuh sepedanya pulang pergi dari rumah ke sekolah yang jaraknya sekitar 80 km.\r\n\r\nItu karena Lintang memiliki alasan yang kuat yaitu supaya dia bisa belajar. Lintang tidak pernah sama sekali merasa mengeluh akan keadaannya itu meski ketika menuju ke sekolah dia harus melewati danau yang ada buayanya. Lintang bisa dibilang murid yang cerdas.\r\n\r\nHal ini dibuktikan ketika dia mengikuti lomba cerdas cermat bersama Ikal dan Sahara. Ikal dan timnya bisa mengalahkan tim dari Drs. Zulfikar yang merupakan guru sekolah orang kaya SD PN yang memiliki ijazah dan juga sangat terkenal, dengan jawaban tim Ikal yang membawa timnya menajdi juara cerdas cermat.\r\n\r\nSayangnya semua kisah antara Lintang dan teman-temanya berakhir dengan sedih. Para anggota Laskar Pelangi harus berisah dengan si jenius Lintang. Lintang beserta sahabatnya telah membuktikan bahwasannya bukan dengan fasilitas yang bisa menjadikan seseorang itu pintar dan juga sukses, akan tetapi dengan kemauan yang tinggi dan bekerja keras yang bisa mewujufkan impian yang kita impikan.\r\n\r\nSelang beberapa hari, Lintang tidak pernah masuk sekolah, pada akhirnya sahabat Lintang dan Bu Mus memperoleh surat dari Lintang. Surat ini menjelaskan misteri kenapa selama ini Lintang tidak masuk sekolah. Alasan Lintang tidak bisa ke sekolah lagi disebabkan karena ayah Lintang telah meninggal. Hal ini membuat anggota laskar pelangi menjadi sedih yang sangat mendalam karena tidak bisa bertemu dengan sahabatnya yang jenius itu.\r\n\r\nBeberpa tahun pun berlalu sampai mereka tumbuh menjadi dewasa, mereka semuanya memperoleh pengalaman yang tak ternilai dari peristiwa yang dialami ketika mereka belajar di SD Muhammadiyah. Sebuah ketulusan, persahabatan yang ditunjukkan dan juga dicontohkan oleh Bu Mus, dan juga mimpi yang terus mereka wujudkan. Akhir cerita Ikal melanjutkan sekolahnya di Paris, Sedangkan teman-teman lainnya menjadi orang yang sukses dan membanggakan Belitung.', '5cc1ac832f7aa.jpg', 'Y'),
('PSTK0005', 'One Piece', 'KMK', 'Eiichiro Oda', 'Viz Media', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Id similique natus accusantium temporibus mollitia ullam magnam nam quis nulla explicabo consectetur exercitationem ipsum enim neque quibusdam, magni soluta inventore amet, voluptatem dignissimos et facere provident hic. Illo sit nihil fugit praesentium quis porro dolorum molestiae? Quisquam, dicta dolorum laborum nam voluptatem nesciunt. Mollitia aut quos reprehenderit quae inventore quibusdam unde placeat, molestias natus nihil incidunt in voluptatum hic doloribus id enim pariatur qui nostrum consectetur laudantium illo laborum ipsa? A aut quae odio illum sint ut. Molestias rerum aut pariatur dolor cum? Atque ipsa fugiat in voluptatem odit voluptates fuga!', '5cc1ae8ca68a2.jpg', 'N');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_users`
--

CREATE TABLE `data_users` (
  `id` int(11) NOT NULL,
  `nis` int(8) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `kelas` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `kode_kategori` varchar(3) NOT NULL,
  `nama_kategori` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`kode_kategori`, `nama_kategori`) VALUES
('BIO', 'Biografi'),
('DGG', 'Dongeng'),
('KMK', 'Komik'),
('NVL', 'Novel'),
('PDN', 'Panduan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `kode_peminjaman` varchar(10) NOT NULL,
  `kode_buku` varchar(8) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `nis` int(8) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `kelas` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `batas_waktu` datetime NOT NULL,
  `waktu` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`kode_peminjaman`, `kode_buku`, `judul`, `nis`, `nama_lengkap`, `kelas`, `gambar`, `batas_waktu`, `waktu`) VALUES
('A9EB66514A', 'PSTK0003', 'Ketika Mas Gagah Pergi', 20177376, 'bgauagsuag', 'X TEL 7', '5cc1aaa70235f.jpg', '2019-07-30 06:22:32', '2019-04-30 11:22:50'),
('AF562F7B10', 'PSTK0003', 'Ketika Mas Gagah Pergi', 20177375, 'aaaaaaaa', 'XI TEL 3', '5cc1aaa70235f.jpg', '2019-08-01 06:35:12', '2019-05-01 23:35:17'),
('B2AE3318A8', 'PSTK0001', 'Dia adalah Dilanku Tahun 1990', 20177375, 'Bagus Darmawan', 'X TEL 5', '5cb9c7718b00e.jpg', '2019-08-01 06:33:04', '2019-05-01 23:33:12'),
('E60947C9C6', 'PSTK0002', 'Boruto : Naruto Next Generation', 20177376, 'Bagus Yatma Pratama', 'XI TEL 12', '5cbae4819c12a.jpeg', '2019-07-30 09:05:21', '2019-04-30 14:05:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `nis` int(8) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`nis`, `username`, `password`) VALUES
(20177375, 'bagusdarmawan', '$2y$10$8Xb0libbfk97EP7avigBvuYME/krXgNnumNgm30U8HwvON8VM497y'),
(20177376, 'bagusyatma', '$2y$10$RAt5whkNLg9qYhGDL5rMDuU5Uv6ixaCI8mw7EdueDIHWtB2iLxJ/y');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`kode_buku`),
  ADD KEY `kode_kategori` (`kode_kategori`);

--
-- Indeks untuk tabel `data_users`
--
ALTER TABLE `data_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nis` (`nis`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kode_kategori`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`kode_peminjaman`),
  ADD KEY `kode_buku` (`kode_buku`),
  ADD KEY `nis` (`nis`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`nis`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `data_users`
--
ALTER TABLE `data_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `buku_ibfk_1` FOREIGN KEY (`kode_kategori`) REFERENCES `kategori` (`kode_kategori`);

--
-- Ketidakleluasaan untuk tabel `data_users`
--
ALTER TABLE `data_users`
  ADD CONSTRAINT `data_users_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `users` (`nis`);

--
-- Ketidakleluasaan untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`kode_buku`) REFERENCES `buku` (`kode_buku`),
  ADD CONSTRAINT `peminjaman_ibfk_2` FOREIGN KEY (`nis`) REFERENCES `users` (`nis`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
