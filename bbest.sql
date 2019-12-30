-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 20 Jun 2016 pada 16.16
-- Versi Server: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bbest`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `ambil_beasiswa`
--

CREATE TABLE IF NOT EXISTS `ambil_beasiswa` (
  `code_trans` varchar(12) NOT NULL,
  `tgl` date DEFAULT NULL,
  `id_peserta` int(11) NOT NULL,
  `id_pddkn` smallint(6) NOT NULL,
  `no_rekening` int(11) DEFAULT NULL,
  `beasiswa` int(11) NOT NULL,
  `tgl_ambil` date DEFAULT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `ambil_beasiswa`
--

INSERT INTO `ambil_beasiswa` (`code_trans`, `tgl`, `id_peserta`, `id_pddkn`, `no_rekening`, `beasiswa`, `tgl_ambil`, `status`) VALUES
('BB001', '2016-06-01', 2, 2, 1, 2, '2016-07-16', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `beasiswa`
--

CREATE TABLE IF NOT EXISTS `beasiswa` (
`id` int(11) NOT NULL,
  `id_pddkn` smallint(6) NOT NULL,
  `jumlah_bea` decimal(9,2) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `beasiswa`
--

INSERT INTO `beasiswa` (`id`, `id_pddkn`, `jumlah_bea`) VALUES
(1, 1, '235000.00'),
(2, 2, '135000.00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
`id` int(11) NOT NULL,
  `konten` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `create_time` int(11) DEFAULT NULL,
  `author` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
`id` int(11) NOT NULL,
  `nama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `nama`, `create_time`, `update_time`) VALUES
(2, 'TEST', 1461945006, 1461945006);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1458312030),
('m150214_044831_init_user', 1458312045);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE IF NOT EXISTS `nilai` (
`id` int(11) NOT NULL,
  `id_pddkn` smallint(6) NOT NULL,
  `nilai` decimal(3,2) NOT NULL,
  `semester` varchar(5) NOT NULL,
  `tahun_ajaran` varchar(10) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `nilai`
--

INSERT INTO `nilai` (`id`, `id_pddkn`, `nilai`, `semester`, `tahun_ajaran`) VALUES
(1, 2, '7.50', '2', '2016/2017'),
(2, 2, '9.99', 'II', '2016/2017');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_peserta`
--

CREATE TABLE IF NOT EXISTS `nilai_peserta` (
  `id_nilai` int(11) NOT NULL,
  `id_peserta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `nilai_peserta`
--

INSERT INTO `nilai_peserta` (`id_nilai`, `id_peserta`) VALUES
(1, 2),
(2, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `orangtua`
--

CREATE TABLE IF NOT EXISTS `orangtua` (
`id` int(11) NOT NULL,
  `id_peserta` int(11) NOT NULL,
  `nama_ayah` varchar(30) NOT NULL,
  `nama_ibu` varchar(30) NOT NULL,
  `tgl_lahir_ayah` date NOT NULL,
  `tgl_lahir_ibu` date NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `pkrjn_ayah` varchar(30) DEFAULT NULL,
  `pkrjn_ibu` varchar(30) DEFAULT NULL,
  `tempat_lahir_ayah` varchar(50) NOT NULL,
  `tempat_lahir_ibu` varchar(50) NOT NULL,
  `no_hp` varchar(12) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `orangtua`
--

INSERT INTO `orangtua` (`id`, `id_peserta`, `nama_ayah`, `nama_ibu`, `tgl_lahir_ayah`, `tgl_lahir_ibu`, `alamat`, `pkrjn_ayah`, `pkrjn_ibu`, `tempat_lahir_ayah`, `tempat_lahir_ibu`, `no_hp`) VALUES
(1, 2, 'Fai', 'Lina', '1993-05-11', '1974-03-23', 'Tangerang', 'Progremer', 'Ibu Rumah tangga', 'Serang', 'Tangerang', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendidikan`
--

CREATE TABLE IF NOT EXISTS `pendidikan` (
`id` smallint(6) NOT NULL,
  `pendidikan` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `pendidikan`
--

INSERT INTO `pendidikan` (`id`, `pendidikan`) VALUES
(1, 'SMA'),
(2, 'SD');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peserta`
--

CREATE TABLE IF NOT EXISTS `peserta` (
`id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `nama_lengkap` varchar(50) NOT NULL,
  `tempat_lahir` varchar(25) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `tinggal_pada` varchar(50) NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `tingkat_pddkn` smallint(6) NOT NULL,
  `nama_sekolah` varchar(50) NOT NULL,
  `hoby` varchar(25) NOT NULL,
  `cita_cita` varchar(25) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `peserta`
--

INSERT INTO `peserta` (`id`, `status`, `nama_lengkap`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `tinggal_pada`, `no_hp`, `tingkat_pddkn`, `nama_sekolah`, `hoby`, `cita_cita`) VALUES
(2, 1, 'Tio Rhadityo', 'Tangerang', '2004-04-07', 'Laki-laki', 'Orang Tua', '0899', 2, 'SDN Pembangunan', 'Main Bola', 'Dokter');

-- --------------------------------------------------------

--
-- Struktur dari tabel `post`
--

CREATE TABLE IF NOT EXISTS `post` (
`id` int(11) NOT NULL,
  `judul` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `konten` text COLLATE utf8_unicode_ci NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data untuk tabel `post`
--

INSERT INTO `post` (`id`, `judul`, `konten`, `kategori_id`, `status`, `user_id`, `create_time`, `update_time`) VALUES
(7, 'Welcome!', 'This blog system is developed using Yii. It is meant to demonstrate how to use Yii to build a complete real-world application. Complete source code may be found in the Yii releases.\r\nFeel free to try this system by writing new posts and posting comments.', 2, 1, 1, 0, 1461945065);

-- --------------------------------------------------------

--
-- Struktur dari tabel `prestasi_calon`
--

CREATE TABLE IF NOT EXISTS `prestasi_calon` (
`id` int(11) NOT NULL,
  `id_calon` int(11) NOT NULL,
  `nama_kejuaraan` varchar(50) NOT NULL,
  `tingkat` varchar(25) NOT NULL,
  `juara` tinyint(1) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `prestasi_calon`
--

INSERT INTO `prestasi_calon` (`id`, `id_calon`, `nama_kejuaraan`, `tingkat`, `juara`) VALUES
(1, 2, 'Bulu Tangkis', 'Kabupaten', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `profile`
--

CREATE TABLE IF NOT EXISTS `profile` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `full_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `timezone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `no_identitas` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `anak_ke` smallint(2) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `agama` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `foto` text COLLATE utf8_unicode_ci NOT NULL,
  `jurusan` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nama_sekolah` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `no_hp` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tingkt_pddkn` smallint(6) DEFAULT NULL,
  `tahun_masuk` int(4) DEFAULT NULL,
  `jenis_kalamin` enum('Laki-laki','Perempuan') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `profile`
--

INSERT INTO `profile` (`id`, `user_id`, `created_at`, `updated_at`, `full_name`, `timezone`, `no_identitas`, `anak_ke`, `tgl_lahir`, `agama`, `alamat`, `foto`, `jurusan`, `nama_sekolah`, `no_hp`, `tingkt_pddkn`, `tahun_masuk`, `jenis_kalamin`) VALUES
(1, 1, '2016-03-18 07:40:45', NULL, 'the one', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 'Laki-laki');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekening`
--

CREATE TABLE IF NOT EXISTS `rekening` (
`id` int(11) NOT NULL,
  `id_peserta` int(11) NOT NULL,
  `nama_bank` varchar(25) NOT NULL,
  `no_rekening` varchar(30) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `rekening`
--

INSERT INTO `rekening` (`id`, `id_peserta`, `nama_bank`, `no_rekening`) VALUES
(1, 2, 'BCA', '100000324240');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE IF NOT EXISTS `role` (
`id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `can_admin` smallint(6) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`id`, `name`, `created_at`, `updated_at`, `can_admin`) VALUES
(1, 'Admin', '2016-03-18 07:40:45', NULL, 1),
(2, 'User', '2016-03-18 07:40:45', NULL, 2),
(3, 'Keuangan', NULL, NULL, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `seleksi`
--

CREATE TABLE IF NOT EXISTS `seleksi` (
`id` int(11) NOT NULL,
  `id_calon` int(11) NOT NULL,
  `hasil1` int(11) NOT NULL,
  `hasil2` int(11) NOT NULL,
  `hasil3` int(11) NOT NULL,
  `hasil4` int(11) NOT NULL,
  `hasil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `status` smallint(6) NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `auth_key` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `access_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `logged_in_ip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `logged_in_at` timestamp NULL DEFAULT NULL,
  `created_ip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `banned_at` timestamp NULL DEFAULT NULL,
  `banned_reason` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `role_id`, `status`, `email`, `username`, `password`, `auth_key`, `access_token`, `logged_in_ip`, `logged_in_at`, `created_ip`, `created_at`, `updated_at`, `banned_at`, `banned_reason`) VALUES
(1, 1, 1, 'neo@neo.com', 'neo', '$2y$13$dyVw4WkZGkABf2UrGWrhHO4ZmVBv.K4puhOL59Y9jQhIdj63TlV.O', '0Vyq0fbSUrfwf7LJuoDML0plgzYSGwHN', '9kUq9822SyQTPW4kqc4yPfjRp-KVauJl', '127.0.0.1', '2016-06-20 03:43:23', NULL, '2016-03-18 07:40:45', NULL, NULL, NULL),
(5, 3, 1, 'yatimrydha@gmail.com', 'keu_rydha', '$2y$13$UchOXchAZ4DKZQjEx9BCWONU3C4tIM99Ug4xHd5wKbwKLuTtva8K6', NULL, NULL, '127.0.0.1', '2016-06-20 03:33:58', NULL, '2016-06-19 08:12:39', '2016-06-19 08:12:39', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_token`
--

CREATE TABLE IF NOT EXISTS `user_token` (
`id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `type` smallint(6) NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `data` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `expired_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_nilai`
--
CREATE TABLE IF NOT EXISTS `v_nilai` (
`id` int(11)
,`NILAI` decimal(3,2)
,`SEMESTER` varchar(5)
,`TAHUN_AJARAN` varchar(10)
,`NAMA_PESERTA` varchar(50)
,`PENDIDIKAN` varchar(50)
);
-- --------------------------------------------------------

--
-- Struktur untuk view `v_nilai`
--
DROP TABLE IF EXISTS `v_nilai`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_nilai` AS select `nilai`.`id` AS `id`,`nilai`.`nilai` AS `NILAI`,`nilai`.`semester` AS `SEMESTER`,`nilai`.`tahun_ajaran` AS `TAHUN_AJARAN`,`peserta`.`nama_lengkap` AS `NAMA_PESERTA`,`pendidikan`.`pendidikan` AS `PENDIDIKAN` from (((`nilai` join `nilai_peserta`) join `peserta`) join `pendidikan`) where ((`nilai`.`id_pddkn` = `pendidikan`.`id`) and (`nilai`.`id` = `nilai_peserta`.`id_nilai`) and (`peserta`.`id` = `nilai_peserta`.`id_peserta`)) order by `nilai`.`tahun_ajaran`;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ambil_beasiswa`
--
ALTER TABLE `ambil_beasiswa`
 ADD PRIMARY KEY (`code_trans`), ADD KEY `id_peserta` (`id_peserta`), ADD KEY `id_peserta_2` (`id_peserta`), ADD KEY `id_pddkn` (`id_pddkn`), ADD KEY `no_rekening` (`no_rekening`), ADD KEY `beasiswa` (`beasiswa`);

--
-- Indexes for table `beasiswa`
--
ALTER TABLE `beasiswa`
 ADD PRIMARY KEY (`id`), ADD KEY `id_pddkn` (`id_pddkn`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
 ADD PRIMARY KEY (`id`), ADD KEY `FK_comment_post` (`post_id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
 ADD PRIMARY KEY (`version`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
 ADD PRIMARY KEY (`id`), ADD KEY `id_pddkn` (`id_pddkn`), ADD KEY `id_pddkn_2` (`id_pddkn`);

--
-- Indexes for table `nilai_peserta`
--
ALTER TABLE `nilai_peserta`
 ADD KEY `id_nilai` (`id_nilai`), ADD KEY `id_peserta` (`id_peserta`), ADD KEY `id_nilai_2` (`id_nilai`), ADD KEY `id_peserta_2` (`id_peserta`), ADD KEY `id_peserta_3` (`id_peserta`);

--
-- Indexes for table `orangtua`
--
ALTER TABLE `orangtua`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id_peserta_2` (`id_peserta`), ADD KEY `id_peserta` (`id_peserta`);

--
-- Indexes for table `pendidikan`
--
ALTER TABLE `pendidikan`
 ADD PRIMARY KEY (`id`), ADD KEY `id` (`id`), ADD KEY `id_2` (`id`);

--
-- Indexes for table `peserta`
--
ALTER TABLE `peserta`
 ADD PRIMARY KEY (`id`), ADD KEY `tingkat_pddkn` (`tingkat_pddkn`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
 ADD PRIMARY KEY (`id`), ADD KEY `FK_post_kategor` (`kategori_id`), ADD KEY `FK_post_user` (`user_id`);

--
-- Indexes for table `prestasi_calon`
--
ALTER TABLE `prestasi_calon`
 ADD PRIMARY KEY (`id`), ADD KEY `id_calon` (`id_calon`), ADD KEY `id_calon_2` (`id_calon`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
 ADD PRIMARY KEY (`id`), ADD KEY `profile_user_id` (`user_id`), ADD KEY `tingkt_pddkn` (`tingkt_pddkn`);

--
-- Indexes for table `rekening`
--
ALTER TABLE `rekening`
 ADD PRIMARY KEY (`id`), ADD KEY `id_peserta` (`id_peserta`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seleksi`
--
ALTER TABLE `seleksi`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `user_id` (`id_calon`), ADD KEY `user_id_2` (`id_calon`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `user_email` (`email`), ADD UNIQUE KEY `user_username` (`username`), ADD KEY `user_role_id` (`role_id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `user_token_token` (`token`), ADD KEY `user_token_user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `beasiswa`
--
ALTER TABLE `beasiswa`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `orangtua`
--
ALTER TABLE `orangtua`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pendidikan`
--
ALTER TABLE `pendidikan`
MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `peserta`
--
ALTER TABLE `peserta`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `prestasi_calon`
--
ALTER TABLE `prestasi_calon`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `rekening`
--
ALTER TABLE `rekening`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `seleksi`
--
ALTER TABLE `seleksi`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `ambil_beasiswa`
--
ALTER TABLE `ambil_beasiswa`
ADD CONSTRAINT `ambil_beasiswa_ibfk_1` FOREIGN KEY (`id_peserta`) REFERENCES `peserta` (`id`),
ADD CONSTRAINT `ambil_beasiswa_ibfk_2` FOREIGN KEY (`id_pddkn`) REFERENCES `pendidikan` (`id`),
ADD CONSTRAINT `ambil_beasiswa_ibfk_3` FOREIGN KEY (`beasiswa`) REFERENCES `beasiswa` (`id`),
ADD CONSTRAINT `ambil_beasiswa_ibfk_4` FOREIGN KEY (`no_rekening`) REFERENCES `rekening` (`id`);

--
-- Ketidakleluasaan untuk tabel `beasiswa`
--
ALTER TABLE `beasiswa`
ADD CONSTRAINT `beasiswa_ibfk_1` FOREIGN KEY (`id_pddkn`) REFERENCES `pendidikan` (`id`);

--
-- Ketidakleluasaan untuk tabel `comment`
--
ALTER TABLE `comment`
ADD CONSTRAINT `FK_comment_post` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `nilai`
--
ALTER TABLE `nilai`
ADD CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`id_pddkn`) REFERENCES `pendidikan` (`id`);

--
-- Ketidakleluasaan untuk tabel `nilai_peserta`
--
ALTER TABLE `nilai_peserta`
ADD CONSTRAINT `nilai_peserta_ibfk_1` FOREIGN KEY (`id_nilai`) REFERENCES `nilai` (`id`),
ADD CONSTRAINT `nilai_peserta_ibfk_2` FOREIGN KEY (`id_peserta`) REFERENCES `peserta` (`id`);

--
-- Ketidakleluasaan untuk tabel `orangtua`
--
ALTER TABLE `orangtua`
ADD CONSTRAINT `orangtua_ibfk_1` FOREIGN KEY (`id_peserta`) REFERENCES `peserta` (`id`);

--
-- Ketidakleluasaan untuk tabel `peserta`
--
ALTER TABLE `peserta`
ADD CONSTRAINT `peserta_ibfk_1` FOREIGN KEY (`tingkat_pddkn`) REFERENCES `pendidikan` (`id`);

--
-- Ketidakleluasaan untuk tabel `post`
--
ALTER TABLE `post`
ADD CONSTRAINT `FK_post_kategor` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Ketidakleluasaan untuk tabel `prestasi_calon`
--
ALTER TABLE `prestasi_calon`
ADD CONSTRAINT `prestasi_calon_ibfk_1` FOREIGN KEY (`id_calon`) REFERENCES `peserta` (`id`);

--
-- Ketidakleluasaan untuk tabel `profile`
--
ALTER TABLE `profile`
ADD CONSTRAINT `profile_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Ketidakleluasaan untuk tabel `rekening`
--
ALTER TABLE `rekening`
ADD CONSTRAINT `rekening_ibfk_1` FOREIGN KEY (`id_peserta`) REFERENCES `peserta` (`id`);

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
ADD CONSTRAINT `user_role_id` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);

--
-- Ketidakleluasaan untuk tabel `user_token`
--
ALTER TABLE `user_token`
ADD CONSTRAINT `user_token_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
