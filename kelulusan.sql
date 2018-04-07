-- Database: `kelulusan`
--
CREATE DATABASE IF NOT EXISTS `kelulusan` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `kelulusan`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `Statistik`
--

CREATE TABLE `Statistik` (
  `unique_id` varchar(150) NOT NULL,
  `sum_login` bigint(20) NOT NULL,
  `sum_unduh` bigint(20) NOT NULL,
  `sum_nilai_un` bigint(20) NOT NULL,
  `no_ujian` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `Statistik`
--

INSERT INTO `Statistik` (`unique_id`, `sum_login`, `sum_unduh`, `sum_nilai_un`, `no_ujian`) VALUES
('3eef53460aabd7d720c3b53000bb3ece', 0, 0, 0, '16-999-606-9'),
('4964b99d86d7e1ef50cf1724e6665f11', 9, 8, 27, '16-009-018-7');

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `unique_id` varchar(150) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `jabatan` varchar(150) NOT NULL,
  `tentang` varchar(150) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `hp` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`unique_id`, `nama`, `jabatan`, `tentang`, `alamat`, `hp`) VALUES
('7ae6f031b67289c3b844e28ea4a94e6a', 'herman sugiharto', 'edditor', 'suka seseorang yang bernama hahahaha', 'bojong wetan', '087xxxxxxxxxxxx');

-- --------------------------------------------------------

--
-- Struktur dari tabel `avatar`
--

CREATE TABLE `avatar` (
  `id_avatar` int(11) NOT NULL,
  `nama_avatar` varchar(150) NOT NULL,
  `url_avatar` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `avatar`
--

INSERT INTO `avatar` (`id_avatar`, `nama_avatar`, `url_avatar`) VALUES
(1, 'hijab', 'images/img1.png'),
(2, 'women', 'images/img2.png'),
(3, 'hijab1', 'images/img3.png'),
(4, 'hijab2', 'images/img4.png'),
(5, 'man', 'images/img5.png'),
(6, 'default', 'images/img.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `biodata`
--

CREATE TABLE `biodata` (
  `unique_id` varchar(150) NOT NULL,
  `nama_lengkap` varchar(150) NOT NULL,
  `jurusan` varchar(10) NOT NULL,
  `nisn` varchar(150) NOT NULL,
  `kelas` varchar(150) NOT NULL,
  `peminatan` varchar(150) NOT NULL,
  `tempat_lhr` varchar(150) NOT NULL,
  `tanggal_lhr` varchar(150) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `biodata`
--

INSERT INTO `biodata` (`unique_id`, `nama_lengkap`, `jurusan`, `nisn`, `kelas`, `peminatan`, `tempat_lhr`, `tanggal_lhr`, `alamat`) VALUES
('3eef53460aabd7d720c3b53000bb3ece', 'herma', 'IPA', '8393483', '1', 'fisika', 'Cirebon', '021912', 'asksaska'),
('4964b99d86d7e1ef50cf1724e6665f11', 'nova wahyuni', 'IPA', '98898881', '1', 'fisika', 'cirebon', '13 November 2000', 'bango dua kec.jamblang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data`
--

CREATE TABLE `data` (
  `id_data` int(50) NOT NULL,
  `nama_data` varchar(200) NOT NULL,
  `isi_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data`
--

INSERT INTO `data` (`id_data`, `nama_data`, `isi_data`) VALUES
(1, 'jurusan', 'IPA'),
(2, 'jurusan', 'IPS'),
(3, 'kelas', '1'),
(4, 'kelas', '2'),
(5, 'kelas', '3'),
(6, 'kelas', '4'),
(7, 'kelas', '5'),
(8, 'peminatan', 'fisika'),
(9, 'peminatan', 'biologi'),
(10, 'peminatan', 'kimia'),
(11, 'peminatan', 'ekonomi'),
(12, 'peminatan', 'geografi'),
(13, 'peminatan', 'sosiologi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `faq`
--

CREATE TABLE `faq` (
  `id_faq` int(11) NOT NULL,
  `faq_title` text NOT NULL,
  `faq_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `faq`
--

INSERT INTO `faq` (`id_faq`, `faq_title`, `faq_content`) VALUES
(1, 'Membuka PDF', 'silahkan buka PDF dengan cara berikut');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `link` varchar(150) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `icon` varchar(150) NOT NULL,
  `level` varchar(150) NOT NULL,
  `keterangan` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id_menu`, `link`, `nama`, `icon`, `level`, `keterangan`) VALUES
(1, 'admin/profil', 'Profil', 'fa-user', '1', 0),
(2, 'profil', 'Profil', 'fa-user', '0', 1),
(3, 'biodata', 'Biodata', 'fa-user', '0', 1),
(4, 'suratsiswa', 'Cetak Surat', 'fa-user', '0', 1),
(5, 'nilaiun', 'Lihat Nilai UN', 'fa-user', '0', 0),
(6, 'pengumuman', 'Pengumuman', 'fa-user', '0', 0),
(7, 'petugas', 'Petugas', 'fa-user', '0', 0),
(8, 'faq', 'FAQ', 'fa-user', '0', 0),
(9, 'admin/siswa', 'Data Siswa', 'fa-user', '1', 0),
(10, 'admin/nilai', 'Nilai Siswa', 'fa-user', '1', 0),
(11, 'admin/pengumuman', 'Pengumuman', 'fa-user', '1', 0),
(12, 'admin/petugas', 'Petugas', 'fa-user', '1', 0),
(13, 'admin/pengaturan', 'Pengaturan', 'fa-user', '1', 0),
(14, 'keluar', 'Keluar', 'fa-user', '0', 1),
(15, 'keluar', 'Keluar', 'fa-user', '1', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE `nilai` (
  `unique_id` varchar(150) NOT NULL,
  `matematika` int(3) NOT NULL,
  `indonesia` int(3) NOT NULL,
  `inggris` int(3) NOT NULL,
  `nilai_peminatan` int(3) NOT NULL,
  `akhir` int(3) NOT NULL,
  `peringkat` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nilai`
--

INSERT INTO `nilai` (`unique_id`, `matematika`, `indonesia`, `inggris`, `nilai_peminatan`, `akhir`, `peringkat`) VALUES
('3eef53460aabd7d720c3b53000bb3ece', 90, 90, 90, 90, 90, 90),
('4964b99d86d7e1ef50cf1724e6665f11', 80, 80, 80, 80, 360, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `options`
--

CREATE TABLE `options` (
  `id_option` int(11) NOT NULL,
  `nama_option` varchar(200) NOT NULL,
  `judul_option` varchar(200) NOT NULL,
  `isi_option` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `options`
--

INSERT INTO `options` (`id_option`, `nama_option`, `judul_option`, `isi_option`) VALUES
(1, 'nama_web', 'nama web', 'pengumuman kelulusan'),
(2, 'tagline', 'tagline', 'tahun pelajaran 2016/2017'),
(3, 'nama_sekolah', 'nama sekolah', 'SMA Negeri 1 Jamblang'),
(4, 'pesan_untuk_siswa', 'pesan untuk siswa', '\r\n                            <p>\r\n                              jika ada yang salah silahkan menghubungi admin, gunakan menu samping kiri.\r\n                              </p>'),
(5, 'himbauan_petugas', 'himbauan dari petugas', '<p>Gunakan Tombol di kanan untuk akses cepat! baca cara penggunaan agar mengerti! jangan lupa log out di pojok kanan atas.</p>'),
(6, 'petunjuk_jalan_pintas', 'petunjuk jalan pintas untuk siswa', '<p>gunakan tombol - tombol disamping ini untuk mengakses secara cepat beberapa menu, menu utama berada di kiri layar, silahkan klik <code>sidebar</code> di pojok kiri atas untuk menu lengkap, SKL SBM-PTN adalah Surat kelulusan khusus pendaftar SBM-PTN</p>');

-- --------------------------------------------------------

--
-- Struktur dari tabel `post`
--

CREATE TABLE `post` (
  `id_post` int(11) NOT NULL,
  `post_title` varchar(150) NOT NULL,
  `post_content` text NOT NULL,
  `post_author` varchar(150) NOT NULL,
  `post_image` text NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `post`
--

INSERT INTO `post` (`id_post`, `post_title`, `post_content`, `post_author`, `post_image`, `tanggal`) VALUES
(1, 'Hari Pertama Sekolah', 'lorem ipsum dolor', 'herman sugiharto', '1.png', '2017-09-13 04:46:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `shortcut`
--

CREATE TABLE `shortcut` (
  `id_shortcut` int(11) NOT NULL,
  `icon` varchar(150) NOT NULL,
  `url` varchar(150) NOT NULL,
  `judul` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `shortcut`
--

INSERT INTO `shortcut` (`id_shortcut`, `icon`, `url`, `judul`) VALUES
(1, 'fa-user', 'profil', 'Profil');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(25) NOT NULL,
  `unique_id` varchar(160) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `username` varchar(160) NOT NULL,
  `password` varchar(160) NOT NULL,
  `avatar_url` varchar(160) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `unique_id`, `nama`, `username`, `password`, `avatar_url`, `level`) VALUES
(3, '3eef53460aabd7d720c3b53000bb3ece', 'herma', 'ezioalzeusi', '1dc0aff5d289a77f78b2b9e68352948b', 'images/img.jpg', 2),
(2, '4964b99d86d7e1ef50cf1724e6665f11', 'nova wahyuni', 'nova', '1a9c91f6e0310d4f55b7ee7f22c2c9df', 'images/img.jpg', 2),
(1, '7ae6f031b67289c3b844e28ea4a94e6a', 'herman sugiharto', 'ezioalzeusi', '1dc0aff5d289a77f78b2b9e68352948b', 'images/petugas1.jpg', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Statistik`
--
ALTER TABLE `Statistik`
  ADD PRIMARY KEY (`unique_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`unique_id`);

--
-- Indexes for table `avatar`
--
ALTER TABLE `avatar`
  ADD PRIMARY KEY (`id_avatar`);

--
-- Indexes for table `biodata`
--
ALTER TABLE `biodata`
  ADD PRIMARY KEY (`unique_id`);

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id_data`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id_faq`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`unique_id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id_option`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id_post`);

--
-- Indexes for table `shortcut`
--
ALTER TABLE `shortcut`
  ADD PRIMARY KEY (`id_shortcut`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`unique_id`),
  ADD UNIQUE KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `avatar`
--
ALTER TABLE `avatar`
  MODIFY `id_avatar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `id_data` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id_faq` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id_option` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `shortcut`
--
ALTER TABLE `shortcut`
  MODIFY `id_shortcut` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `Statistik`
--
ALTER TABLE `Statistik`
  ADD CONSTRAINT `Statistik_ibfk_1` FOREIGN KEY (`unique_id`) REFERENCES `user` (`unique_id`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`unique_id`) REFERENCES `user` (`unique_id`);

--
-- Ketidakleluasaan untuk tabel `biodata`
--
ALTER TABLE `biodata`
  ADD CONSTRAINT `biodata_ibfk_1` FOREIGN KEY (`unique_id`) REFERENCES `user` (`unique_id`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`unique_id`) REFERENCES `user` (`unique_id`);
