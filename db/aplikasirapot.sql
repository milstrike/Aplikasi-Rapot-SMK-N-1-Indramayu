-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 20 Feb 2017 pada 06.44
-- Versi Server: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `aplikasirapot`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bidang_studi`
--

CREATE TABLE IF NOT EXISTS `bidang_studi` (
  `id` int(11) NOT NULL,
  `id_pelajaran` text NOT NULL,
  `nama` text NOT NULL,
  `deskripsi` text NOT NULL,
  `pengampu` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bidang_studi`
--

INSERT INTO `bidang_studi` (`id`, `id_pelajaran`, `nama`, `deskripsi`, `pengampu`) VALUES
(1, 'SPK001', 'Sistem Perakitan Komputer 1', 'Sistem Perakitan Komputer untuk kelas X TKJ Semester 1', 'Jarwo Sudrajat'),
(2, 'SPK002', 'Sistem Perakitan Komputer 2', 'Sistem Perakitan Komputer untuk kelas X TKJ Semester 2', 'Jarwo Sudrajat'),
(3, 'SPK003', 'Sistem Perakitan Komputer 3', 'Sistem Perakitan Komputer untuk kelas XI TKJ Semester 1', 'Jarwo Sudrajat'),
(4, 'SPK004', 'Sistem Perakitan Komputer 4', 'Sistem Perakitan Komputer untuk kelas XI TKJ Semester 2', 'Jarwo Sudrajat'),
(5, 'SPK005', 'Sistem Perakitan Komputer 5', 'Sistem Perakitan Komputer untuk kelas XII TKJ Semester 1', 'Jarwo Sudrajat'),
(6, 'SPK006', 'Sistem Perakitan Komputer 6', 'Sistem Perakitan Komputer untuk kelas XII TKJ Semester 2', 'Jarwo Sudrajat'),
(7, 'KKPI001', 'Ketrampilan Komputer dan Pengelolaan Informasi 1', 'Ketrampilan Komputer dan Pengelolaan Informasi untuk kelas X semester 1', 'Jubaedah'),
(8, 'KKPI002', 'Ketrampilan Komputer dan Pengelolaan Informasi 2', 'Ketrampilan Komputer dan Pengelolaan Informasi untuk kelas X semester 2', 'Jubaedah'),
(9, 'AK001', 'Akuntansi 001', 'Akuntansi untuk kelas X Semester 1', 'Sukirjan'),
(10, 'AK002', 'Akuntansi 002', 'Akuntansi untuk kelas X semester II', 'What Should I Use'),
(11, 'AK003', 'Akuntasi 003', 'Akuntansi untuk kelas XI Semester 1', 'What Should I Use'),
(12, 'ST001', 'Statistika Umum X', 'Statistika umum untuk seluruh jurusan kelas X Semester I dan II', 'Sujilah, S.Pd'),
(13, 'ST002', 'Statistika Umum XI', 'Statistika Umum untuk kelas XI Semester I dan II', 'Yanuar'),
(14, 'SNRP001', 'Seni Rupa 01- Seni Rupa 1', 'Seni Rupa Dasar untuk kelas X Semester 1', 'Arendo Venemaex'),
(16, 'MK-01', 'Manajemen Komputer 01', 'Manajemen Komputer untuk kelas TKJ kelas X semester 1', 'Annis Nuraini');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_user`
--

CREATE TABLE IF NOT EXISTS `detail_user` (
  `id` int(11) NOT NULL,
  `id_user` text NOT NULL,
  `nama` text NOT NULL,
  `jabatan` text NOT NULL,
  `nip` text NOT NULL,
  `telepon` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_user`
--

INSERT INTO `detail_user` (`id`, `id_user`, `nama`, `jabatan`, `nip`, `telepon`) VALUES
(1, 'ri1o38w9', 'Jarwo Sudrajat', 'wali kelas', '15378', '085878952533565'),
(2, 'KfGQDcKd', 'Sukirjan', 'wali kelas', '4453475', '08143856347856'),
(3, 'IXyiQiyy', 'Ahmad Zulkifli F', 'siswa X Teknik Komputer dan Jaringan', '1001', '2016'),
(4, 'qPocHBby', 'Ahmad Zulkifli Badarudin', 'siswa X Teknik Komputer dan Jaringan', '1002', '2016'),
(5, '26wtLQt8', 'Ahmad Zulkifli Chaerudin', 'siswa X Teknik Komputer dan Jaringan', '1003', '2016'),
(6, 'IKEhgj98', 'Ahmad Zulkifli Dadarudin', 'siswa X Teknik Komputer dan Jaringan', '1004', '2016'),
(7, 'fvzpZNZk', 'Ahmad Zulkifli Earudin', 'siswa X Teknik Komputer dan Jaringan', '1005', '2016'),
(8, 'm80AG0Ir', 'Ahmad Zulkifli Fuludin', 'siswa X Teknik Komputer dan Jaringan', '1006', '2016'),
(9, 'NnIz4I5e', 'Ahmad Zulkifli Gadarudin', 'siswa X Teknik Komputer dan Jaringan', '1007', '2016'),
(10, 'kZr7VFSs', 'Ahmad Zulkifli Hadarudin', 'siswa X Teknik Komputer dan Jaringan', '1008', '2016'),
(11, 'HIXXZCNR', 'Ahmad Zulkifli Irudin', 'siswa X Teknik Komputer dan Jaringan', '1009', '2016'),
(12, 'kTIOoUze', 'Budi Cahyono', 'wali kelas', '09876545734834534', '081546332424'),
(13, 'CuBrGwXN', 'Badarudin Jamil Badarudin', 'siswa X Ekonomi', '9002', '2016'),
(14, 'dJHPUshB', 'Badarudin Jamil Chaerudin', 'siswa X Ekonomi', '9003', '2016'),
(15, 'ZyFJbmli', 'Badarudin Jamil Dadarudin', 'siswa X Ekonomi', '9004', '2016'),
(16, 'HIgUgYTE', 'Badarudin Jamil Earudin', 'siswa X Ekonomi', '9005', '2016'),
(17, '5Yd6T3Go', 'Badarudin Jamil Fuludin', 'siswa X Ekonomi', '9006', '2016'),
(18, 'T3h5Plth', 'Badarudin Jamil Gadarudin', 'siswa X Ekonomi', '9007', '2016'),
(19, 'TJeAOA04', 'Badarudin Jamil Hadarudin', 'siswa X Ekonomi', '9008', '2016'),
(20, 'PKMmCx1w', 'Badarudin Jamil Irudin', 'siswa X Ekonomi', '9009', '2016'),
(21, 'qPH9YXim', 'Badarudin Jamil Khoirudin', 'siswa X Ekonomi', '9015', '2016'),
(22, 'sLKICAxl', 'Terserah', 'siswa XI Teknik Komputer dan Jaringan', '387592473985', '2016');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ekstrakulikuler`
--

CREATE TABLE IF NOT EXISTS `ekstrakulikuler` (
  `id` int(11) NOT NULL,
  `id_ekskul` text NOT NULL,
  `nama` text NOT NULL,
  `pembimbing` text NOT NULL,
  `waktu` text NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ekstrakulikuler`
--

INSERT INTO `ekstrakulikuler` (`id`, `id_ekskul`, `nama`, `pembimbing`, `waktu`, `deskripsi`) VALUES
(2, 'DRM001', 'Drumband 101', 'Rifai', 'Selasa Sore jam 14.30', 'Ekstrakulikuler Drumban'),
(3, 'KRT001', 'Karate', 'Chung Ha Sung', 'Selasa Sore Jam 15.00', 'Ekstrakulikuler Karate'),
(4, 'PS001', 'Baca Puisi', 'Sukardiman', 'Senin - Jumat jam 13.00', 'Ekstrakulikuler Baca Puisi'),
(5, 'MDG001', 'Mading', 'Sukartinah', 'Kamis jam 15.00', 'Ekstrakulikuler Mading'),
(7, 'JAR-01', 'Jaringan Komputer X', 'Dr. Supratman WR.', 'Senin sampai Sabtu jam 16.00 WIB', 'Ekstrakulikuler Jaringan Komputer untuk junior');

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE IF NOT EXISTS `guru` (
  `id` int(11) NOT NULL,
  `id_guru` text NOT NULL,
  `nip` text NOT NULL,
  `nama` text NOT NULL,
  `alamat` text NOT NULL,
  `telepon` text NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`id`, `id_guru`, `nip`, `nama`, `alamat`, `telepon`, `email`) VALUES
(1, 'NPK0201', '542483904853453', 'Sujilah, S.Pd', 'Jogonalan KM.10 No.253', '0274112112', 'sujilah@sujilah.id'),
(2, '6E22tuuN', '193454395783485', 'Sujarwo', 'Yogyakarta km 19', '081546455345', 'jarwo@sujarwo.com'),
(4, 'RecCKVVH', '15378', 'Jarwo Sudrajat', 'JL. K.H. Ali Maksumx', '085878952533565', 'jarwo@yahoo.comx'),
(6, 'rIPNTSNg', '44437573485934', 'Jubaedah', 'Jalan Laravel', '75475374653847', 'jub@edah.com'),
(7, 'anRsIkfb', '4453475', 'Sukirjan', 'Kulon Progo', '08143856347856', 'sukirjan@gmail.com'),
(8, 'vjGO0qob', '87935345374', 'Priyanto', 'Bantul', '089578346756347', 'priyanto@google.com'),
(9, 'cg4DyUX1', '8573957348958347', 'Yanuar', 'Blitar', '0834536', 'yanuar@yanuar.web.id'),
(10, '1ZLF5yHr', '4374858345', 'What Should I Use', 'Jalan Merdeka', '90348038534', 'whsi@google.com'),
(11, 'f1w2JeSa', '198503302003121002', 'Kudur', 'JL. Abadi No.3', '081234567890', 'kudur@gmail.com'),
(12, 'y9FVhteL', '196509201997112001', 'Budus', 'Jl. Tidak Abadi No.1', '0858123456789', 'budus@gmail.com'),
(13, 'Q8R1ZFVA', '12345678765434567', 'Arend Venema', 'Belanda Kecamatan Amsterdam', '+62 5656567656765', 'arend@venema.com'),
(15, '2pRqTqzF', '09876567876787676', 'Annis Nuraini', 'JL. Magelang No.10', '08154676465', 'annis@gmail.com'),
(16, 'qCOKHdpD', '09876545734834534', 'Budi Cahyono', 'JL. Magelang No.15', '081546332424', 'budi@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE IF NOT EXISTS `jurusan` (
  `id` int(11) NOT NULL,
  `id_jurusan` text NOT NULL,
  `nama` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`id`, `id_jurusan`, `nama`) VALUES
(2, 'TKJ', 'Teknik Komputer dan Jaringan'),
(3, 'MPK', 'Manajemen Perkantoran'),
(4, 'KSN', 'Kesenian'),
(6, 'Eko', 'Ekonomi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE IF NOT EXISTS `kelas` (
  `id` int(11) NOT NULL,
  `id_kelas` text NOT NULL,
  `nama_kelas` text NOT NULL,
  `wali_kelas` text NOT NULL,
  `bidang_studi` longtext NOT NULL,
  `bidang_studi_2` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id`, `id_kelas`, `nama_kelas`, `wali_kelas`, `bidang_studi`, `bidang_studi_2`) VALUES
(2, 'TKJ-X', 'X Teknik Komputer dan Jaringan', 'Jarwo Sudrajat', 'Ketrampilan Komputer dan Pengelolaan Informasi 1 | Sistem Perakitan Komputer 1 | Statistika Umum X', 'Ketrampilan Komputer dan Pengelolaan Informasi 2 | Sistem Perakitan Komputer 2 | Statistika Umum X'),
(3, 'MPK101', 'X Manajemen Perkantoran', 'Jarwo Sudrajat', '', ''),
(4, 'KSN-X', 'X Kesenian', 'Sukirjan', '', ''),
(5, 'TKJ-XI', 'XI Teknik Komputer dan Jaringan', 'Jarwo Sudrajat', '', ''),
(6, 'MPK-XI', 'XI Manajemen Perkantoran', 'What Should I Use', '', ''),
(7, 'TKJ-XII', 'XII Teknik Komputer dan Jaringan', 'Priyanto', '', ''),
(9, 'Eko01', 'X Ekonomi', 'Budi Cahyono', 'Akuntansi 001 | Statistika Umum X', 'Akuntansi 002 | Statistika Umum X');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rapot`
--

CREATE TABLE IF NOT EXISTS `rapot` (
  `id` int(11) NOT NULL,
  `id_rapot` text NOT NULL,
  `kelas` text NOT NULL,
  `angkatan` text NOT NULL,
  `nis` text NOT NULL,
  `nama_siswa` text NOT NULL,
  `bidang_studi_1` longtext NOT NULL,
  `semester_1` longtext NOT NULL,
  `keterangan_1` longtext NOT NULL,
  `bidang_studi_2` longtext NOT NULL,
  `semester_2` longtext NOT NULL,
  `keterangan_2` longtext NOT NULL,
  `penginput` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=112 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rapot`
--

INSERT INTO `rapot` (`id`, `id_rapot`, `kelas`, `angkatan`, `nis`, `nama_siswa`, `bidang_studi_1`, `semester_1`, `keterangan_1`, `bidang_studi_2`, `semester_2`, `keterangan_2`, `penginput`) VALUES
(74, 'rer83280', 'X Teknik Komputer dan Jaringan', '2016', '1001', 'Ahmad Farurozi', 'Ketrampilan Komputer dan Pengelolaan Informasi 1 | Sistem Perakitan Komputer 1 | Statistika Umum X', '90|89|100', 'ok 1|ok 2|ok 3', 'Ketrampilan Komputer dan Pengelolaan Informasi 2 | Sistem Perakitan Komputer 2 | Statistika Umum X', '54|45|35', 'jelek 1|jelek 2|jelek 3', ''),
(75, '1wqPH9YX', 'X Teknik Komputer dan Jaringan', '2016', '1001', 'Ahmad Zulkifli', 'Ketrampilan Komputer dan Pengelolaan Informasi 1 | Sistem Perakitan Komputer 1 | Statistika Umum X', '90|68|80', 'ok tkj 1 90|ok tkj 2 68|ok tkj 3 68', 'Ketrampilan Komputer dan Pengelolaan Informasi 2 | Sistem Perakitan Komputer 2 | Statistika Umum X', '0', '0', ''),
(76, '1wqPH9YX', 'X Teknik Komputer dan Jaringan', '2016', '1002', 'Ahmad Zulkifli Badarudin', 'Ketrampilan Komputer dan Pengelolaan Informasi 1 | Sistem Perakitan Komputer 1 | Statistika Umum X', '0', '0', 'Ketrampilan Komputer dan Pengelolaan Informasi 2 | Sistem Perakitan Komputer 2 | Statistika Umum X', '0', '0', ''),
(77, '1wqPH9YX', 'X Teknik Komputer dan Jaringan', '2016', '1003', 'Ahmad Zulkifli Chaerudin', 'Ketrampilan Komputer dan Pengelolaan Informasi 1 | Sistem Perakitan Komputer 1 | Statistika Umum X', '0', '0', 'Ketrampilan Komputer dan Pengelolaan Informasi 2 | Sistem Perakitan Komputer 2 | Statistika Umum X', '0', '0', ''),
(78, '1wqPH9YX', 'X Teknik Komputer dan Jaringan', '2016', '1004', 'Ahmad Zulkifli Dadarudin', 'Ketrampilan Komputer dan Pengelolaan Informasi 1 | Sistem Perakitan Komputer 1 | Statistika Umum X', '0', '0', 'Ketrampilan Komputer dan Pengelolaan Informasi 2 | Sistem Perakitan Komputer 2 | Statistika Umum X', '0', '0', ''),
(79, '1wqPH9YX', 'X Teknik Komputer dan Jaringan', '2016', '1005', 'Ahmad Zulkifli Earudin', 'Ketrampilan Komputer dan Pengelolaan Informasi 1 | Sistem Perakitan Komputer 1 | Statistika Umum X', '0', '0', 'Ketrampilan Komputer dan Pengelolaan Informasi 2 | Sistem Perakitan Komputer 2 | Statistika Umum X', '0', '0', ''),
(80, '1wqPH9YX', 'X Teknik Komputer dan Jaringan', '2016', '1006', 'Ahmad Zulkifli Fuludin', 'Ketrampilan Komputer dan Pengelolaan Informasi 1 | Sistem Perakitan Komputer 1 | Statistika Umum X', '0', '0', 'Ketrampilan Komputer dan Pengelolaan Informasi 2 | Sistem Perakitan Komputer 2 | Statistika Umum X', '0', '0', ''),
(81, '1wqPH9YX', 'X Teknik Komputer dan Jaringan', '2016', '1007', 'Ahmad Zulkifli Gadarudin', 'Ketrampilan Komputer dan Pengelolaan Informasi 1 | Sistem Perakitan Komputer 1 | Statistika Umum X', '0', '0', 'Ketrampilan Komputer dan Pengelolaan Informasi 2 | Sistem Perakitan Komputer 2 | Statistika Umum X', '0', '0', ''),
(82, '1wqPH9YX', 'X Teknik Komputer dan Jaringan', '2016', '1008', 'Ahmad Zulkifli Hadarudin', 'Ketrampilan Komputer dan Pengelolaan Informasi 1 | Sistem Perakitan Komputer 1 | Statistika Umum X', '0', '0', 'Ketrampilan Komputer dan Pengelolaan Informasi 2 | Sistem Perakitan Komputer 2 | Statistika Umum X', '0', '0', ''),
(83, '1wqPH9YX', 'X Teknik Komputer dan Jaringan', '2016', '1009', 'Ahmad Zulkifli Irudin', 'Ketrampilan Komputer dan Pengelolaan Informasi 1 | Sistem Perakitan Komputer 1 | Statistika Umum X', '0', '0', 'Ketrampilan Komputer dan Pengelolaan Informasi 2 | Sistem Perakitan Komputer 2 | Statistika Umum X', '0', '0', ''),
(84, '1wqPH9YX', 'X Ekonomi', '2016', '9002', 'Badarudin Jamil Badarudin', 'Akuntansi 001 | Statistika Umum X', '90|78', 'ok 90 1 ekonomi|ok 78 2 ekonomi', 'Akuntansi 002 | Statistika Umum X', '0', '0', ''),
(85, '1wqPH9YX', 'X Ekonomi', '2016', '9003', 'Badarudin Jamil Chaerudin', 'Akuntansi 001 | Statistika Umum X', '0', '0', 'Akuntansi 002 | Statistika Umum X', '0', '0', ''),
(86, '1wqPH9YX', 'X Ekonomi', '2016', '9004', 'Badarudin Jamil Dadarudin', 'Akuntansi 001 | Statistika Umum X', '0', '0', 'Akuntansi 002 | Statistika Umum X', '0', '0', ''),
(87, '1wqPH9YX', 'X Ekonomi', '2016', '9005', 'Badarudin Jamil Earudin', 'Akuntansi 001 | Statistika Umum X', '0', '0', 'Akuntansi 002 | Statistika Umum X', '0', '0', ''),
(88, '1wqPH9YX', 'X Ekonomi', '2016', '9006', 'Badarudin Jamil Fuludin', 'Akuntansi 001 | Statistika Umum X', '0', '0', 'Akuntansi 002 | Statistika Umum X', '0', '0', ''),
(89, '1wqPH9YX', 'X Ekonomi', '2016', '9007', 'Badarudin Jamil Gadarudin', 'Akuntansi 001 | Statistika Umum X', '0', '0', 'Akuntansi 002 | Statistika Umum X', '0', '0', ''),
(90, '1wqPH9YX', 'X Ekonomi', '2016', '9008', 'Badarudin Jamil Hadarudin', 'Akuntansi 001 | Statistika Umum X', '0', '0', 'Akuntansi 002 | Statistika Umum X', '0', '0', ''),
(91, '1wqPH9YX', 'X Ekonomi', '2016', '9009', 'Badarudin Jamil Irudin', 'Akuntansi 001 | Statistika Umum X', '0', '0', 'Akuntansi 002 | Statistika Umum X', '0', '0', ''),
(92, '1wqPH9YX', 'X Ekonomi', '2016', '90150', 'Badarudin Jamil Khoirudin Ahmadinejad', 'Akuntansi 001 | Statistika Umum X', '0', '0', 'Akuntansi 002 | Statistika Umum X', '0', '0', ''),
(93, 'FhEOkbxe', 'X Teknik Komputer dan Jaringan', '2016', '1001', 'Ahmad Zulkifli', 'Ketrampilan Komputer dan Pengelolaan Informasi 1 | Sistem Perakitan Komputer 1 | Statistika Umum X', '0', '0', 'Ketrampilan Komputer dan Pengelolaan Informasi 2 | Sistem Perakitan Komputer 2 | Statistika Umum X', '0', '0', ''),
(94, 'FhEOkbxe', 'X Teknik Komputer dan Jaringan', '2016', '1002', 'Ahmad Zulkifli Badarudin', 'Ketrampilan Komputer dan Pengelolaan Informasi 1 | Sistem Perakitan Komputer 1 | Statistika Umum X', '0', '0', 'Ketrampilan Komputer dan Pengelolaan Informasi 2 | Sistem Perakitan Komputer 2 | Statistika Umum X', '0', '0', ''),
(95, 'FhEOkbxe', 'X Teknik Komputer dan Jaringan', '2016', '1003', 'Ahmad Zulkifli Chaerudin', 'Ketrampilan Komputer dan Pengelolaan Informasi 1 | Sistem Perakitan Komputer 1 | Statistika Umum X', '0', '0', 'Ketrampilan Komputer dan Pengelolaan Informasi 2 | Sistem Perakitan Komputer 2 | Statistika Umum X', '0', '0', ''),
(96, 'FhEOkbxe', 'X Teknik Komputer dan Jaringan', '2016', '1004', 'Ahmad Zulkifli Dadarudin', 'Ketrampilan Komputer dan Pengelolaan Informasi 1 | Sistem Perakitan Komputer 1 | Statistika Umum X', '0', '0', 'Ketrampilan Komputer dan Pengelolaan Informasi 2 | Sistem Perakitan Komputer 2 | Statistika Umum X', '0', '0', ''),
(97, 'FhEOkbxe', 'X Teknik Komputer dan Jaringan', '2016', '1005', 'Ahmad Zulkifli Earudin', 'Ketrampilan Komputer dan Pengelolaan Informasi 1 | Sistem Perakitan Komputer 1 | Statistika Umum X', '0', '0', 'Ketrampilan Komputer dan Pengelolaan Informasi 2 | Sistem Perakitan Komputer 2 | Statistika Umum X', '0', '0', ''),
(98, 'FhEOkbxe', 'X Teknik Komputer dan Jaringan', '2016', '1006', 'Ahmad Zulkifli Fuludin', 'Ketrampilan Komputer dan Pengelolaan Informasi 1 | Sistem Perakitan Komputer 1 | Statistika Umum X', '0', '0', 'Ketrampilan Komputer dan Pengelolaan Informasi 2 | Sistem Perakitan Komputer 2 | Statistika Umum X', '0', '0', ''),
(99, 'FhEOkbxe', 'X Teknik Komputer dan Jaringan', '2016', '1007', 'Ahmad Zulkifli Gadarudin', 'Ketrampilan Komputer dan Pengelolaan Informasi 1 | Sistem Perakitan Komputer 1 | Statistika Umum X', '0', '0', 'Ketrampilan Komputer dan Pengelolaan Informasi 2 | Sistem Perakitan Komputer 2 | Statistika Umum X', '0', '0', ''),
(100, 'FhEOkbxe', 'X Teknik Komputer dan Jaringan', '2016', '1008', 'Ahmad Zulkifli Hadarudin', 'Ketrampilan Komputer dan Pengelolaan Informasi 1 | Sistem Perakitan Komputer 1 | Statistika Umum X', '0', '0', 'Ketrampilan Komputer dan Pengelolaan Informasi 2 | Sistem Perakitan Komputer 2 | Statistika Umum X', '0', '0', ''),
(101, 'FhEOkbxe', 'X Teknik Komputer dan Jaringan', '2016', '1009', 'Ahmad Zulkifli Irudin', 'Ketrampilan Komputer dan Pengelolaan Informasi 1 | Sistem Perakitan Komputer 1 | Statistika Umum X', '0', '0', 'Ketrampilan Komputer dan Pengelolaan Informasi 2 | Sistem Perakitan Komputer 2 | Statistika Umum X', '0', '0', ''),
(102, 'FhEOkbxe', 'X Ekonomi', '2016', '9002', 'Badarudin Jamil Badarudin', 'Akuntansi 001 | Statistika Umum X', '0', '0', 'Akuntansi 002 | Statistika Umum X', '0', '0', ''),
(103, 'FhEOkbxe', 'X Ekonomi', '2016', '9003', 'Badarudin Jamil Chaerudin', 'Akuntansi 001 | Statistika Umum X', '0', '0', 'Akuntansi 002 | Statistika Umum X', '0', '0', ''),
(104, 'FhEOkbxe', 'X Ekonomi', '2016', '9004', 'Badarudin Jamil Dadarudin', 'Akuntansi 001 | Statistika Umum X', '0', '0', 'Akuntansi 002 | Statistika Umum X', '0', '0', ''),
(105, 'FhEOkbxe', 'X Ekonomi', '2016', '9005', 'Badarudin Jamil Earudin', 'Akuntansi 001 | Statistika Umum X', '0', '0', 'Akuntansi 002 | Statistika Umum X', '0', '0', ''),
(106, 'FhEOkbxe', 'X Ekonomi', '2016', '9006', 'Badarudin Jamil Fuludin', 'Akuntansi 001 | Statistika Umum X', '0', '0', 'Akuntansi 002 | Statistika Umum X', '0', '0', ''),
(107, 'FhEOkbxe', 'X Ekonomi', '2016', '9007', 'Badarudin Jamil Gadarudin', 'Akuntansi 001 | Statistika Umum X', '0', '0', 'Akuntansi 002 | Statistika Umum X', '0', '0', ''),
(108, 'FhEOkbxe', 'X Ekonomi', '2016', '9008', 'Badarudin Jamil Hadarudin', 'Akuntansi 001 | Statistika Umum X', '0', '0', 'Akuntansi 002 | Statistika Umum X', '0', '0', ''),
(109, 'FhEOkbxe', 'X Ekonomi', '2016', '9009', 'Badarudin Jamil Irudin', 'Akuntansi 001 | Statistika Umum X', '0', '0', 'Akuntansi 002 | Statistika Umum X', '0', '0', ''),
(110, 'FhEOkbxe', 'X Ekonomi', '2016', '90150', 'Badarudin Jamil Khoirudin Ahmadinejad', 'Akuntansi 001 | Statistika Umum X', '0', '0', 'Akuntansi 002 | Statistika Umum X', '0', '0', ''),
(111, 'FhEOkbxe', 'XI Teknik Komputer dan Jaringan', '2016', '387592473985', 'Terserah', '', '0', '0', '', '0', '0', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rapot_ekskul`
--

CREATE TABLE IF NOT EXISTS `rapot_ekskul` (
  `id` int(11) NOT NULL,
  `id_rapot` text NOT NULL,
  `nama_ekskul` text NOT NULL,
  `nama_siswa` text NOT NULL,
  `nis` text NOT NULL,
  `kelas` text NOT NULL,
  `angkatan` text NOT NULL,
  `semester_1` text NOT NULL,
  `nilai_1` text NOT NULL,
  `deskripsi_1` text NOT NULL,
  `semester_2` text NOT NULL,
  `nilai_2` text NOT NULL,
  `deskripsi_2` text NOT NULL,
  `penginput` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rapot_ekskul`
--

INSERT INTO `rapot_ekskul` (`id`, `id_rapot`, `nama_ekskul`, `nama_siswa`, `nis`, `kelas`, `angkatan`, `semester_1`, `nilai_1`, `deskripsi_1`, `semester_2`, `nilai_2`, `deskripsi_2`, `penginput`) VALUES
(44, 'rer83280', 'Drumband 101', 'Ahmad Farurozi', '1001', 'X Teknik Komputer dan Jaringan', '2016', '0', '90', 'ok 90', '0', '78', 'ok 78', ''),
(45, '1wqPH9YX', '', 'Ahmad Zulkifli', '1001', 'X Teknik Komputer dan Jaringan', '2016', '0', '0', '', '0', '0', '', ''),
(46, '1wqPH9YX', '', 'Ahmad Zulkifli Badarudin', '1002', 'X Teknik Komputer dan Jaringan', '2016', '0', '0', '', '0', '0', '', ''),
(47, '1wqPH9YX', '', 'Ahmad Zulkifli Chaerudin', '1003', 'X Teknik Komputer dan Jaringan', '2016', '0', '0', '', '0', '0', '', ''),
(48, '1wqPH9YX', '', 'Ahmad Zulkifli Dadarudin', '1004', 'X Teknik Komputer dan Jaringan', '2016', '0', '0', '', '0', '0', '', ''),
(49, '1wqPH9YX', '', 'Ahmad Zulkifli Earudin', '1005', 'X Teknik Komputer dan Jaringan', '2016', '0', '0', '', '0', '0', '', ''),
(50, '1wqPH9YX', '', 'Ahmad Zulkifli Fuludin', '1006', 'X Teknik Komputer dan Jaringan', '2016', '0', '0', '', '0', '0', '', ''),
(51, '1wqPH9YX', '', 'Ahmad Zulkifli Gadarudin', '1007', 'X Teknik Komputer dan Jaringan', '2016', '0', '0', '', '0', '0', '', ''),
(52, '1wqPH9YX', '', 'Ahmad Zulkifli Hadarudin', '1008', 'X Teknik Komputer dan Jaringan', '2016', '0', '0', '', '0', '0', '', ''),
(53, '1wqPH9YX', '', 'Ahmad Zulkifli Irudin', '1009', 'X Teknik Komputer dan Jaringan', '2016', '0', '0', '', '0', '0', '', ''),
(54, '1wqPH9YX', 'Drumband 101', 'Badarudin Jamil Badarudin', '9002', 'X Ekonomi', '2016', '0', '90', 'ok drumband', '0', '0', '', ''),
(55, '1wqPH9YX', 'Jaringan Komputer X', 'Badarudin Jamil Chaerudin', '9003', 'X Ekonomi', '2016', '0', '67', 'TKJ X', '0', '0', '', ''),
(56, '1wqPH9YX', 'Jaringan Komputer X', 'Badarudin Jamil Dadarudin', '9004', 'X Ekonomi', '2016', '0', '0', '', '0', '0', '', ''),
(57, '1wqPH9YX', 'Baca Puisi', 'Badarudin Jamil Earudin', '9005', 'X Ekonomi', '2016', '0', '0', '', '0', '0', '', ''),
(58, '1wqPH9YX', 'Baca Puisi', 'Badarudin Jamil Fuludin', '9006', 'X Ekonomi', '2016', '0', '0', '', '0', '0', '', ''),
(59, '1wqPH9YX', 'Baca Puisi', 'Badarudin Jamil Gadarudin', '9007', 'X Ekonomi', '2016', '0', '0', '', '0', '0', '', ''),
(60, '1wqPH9YX', 'Baca Puisi', 'Badarudin Jamil Hadarudin', '9008', 'X Ekonomi', '2016', '0', '0', '', '0', '0', '', ''),
(61, '1wqPH9YX', 'Baca Puisi', 'Badarudin Jamil Irudin', '9009', 'X Ekonomi', '2016', '0', '0', '', '0', '0', '', ''),
(62, '1wqPH9YX', 'Baca Puisi', 'Badarudin Jamil Khoirudin Ahmadinejad', '90150', 'X Ekonomi', '2016', '0', '0', '', '0', '0', '', ''),
(63, 'FhEOkbxe', '', 'Ahmad Zulkifli', '1001', 'X Teknik Komputer dan Jaringan', '2016', '0', '0', '', '0', '0', '', ''),
(64, 'FhEOkbxe', '', 'Ahmad Zulkifli Badarudin', '1002', 'X Teknik Komputer dan Jaringan', '2016', '0', '0', '', '0', '0', '', ''),
(65, 'FhEOkbxe', '', 'Ahmad Zulkifli Chaerudin', '1003', 'X Teknik Komputer dan Jaringan', '2016', '0', '0', '', '0', '0', '', ''),
(66, 'FhEOkbxe', '', 'Ahmad Zulkifli Dadarudin', '1004', 'X Teknik Komputer dan Jaringan', '2016', '0', '0', '', '0', '0', '', ''),
(67, 'FhEOkbxe', '', 'Ahmad Zulkifli Earudin', '1005', 'X Teknik Komputer dan Jaringan', '2016', '0', '0', '', '0', '0', '', ''),
(68, 'FhEOkbxe', '', 'Ahmad Zulkifli Fuludin', '1006', 'X Teknik Komputer dan Jaringan', '2016', '0', '0', '', '0', '0', '', ''),
(69, 'FhEOkbxe', '', 'Ahmad Zulkifli Gadarudin', '1007', 'X Teknik Komputer dan Jaringan', '2016', '0', '0', '', '0', '0', '', ''),
(70, 'FhEOkbxe', '', 'Ahmad Zulkifli Hadarudin', '1008', 'X Teknik Komputer dan Jaringan', '2016', '0', '0', '', '0', '0', '', ''),
(71, 'FhEOkbxe', '', 'Ahmad Zulkifli Irudin', '1009', 'X Teknik Komputer dan Jaringan', '2016', '0', '0', '', '0', '0', '', ''),
(72, 'FhEOkbxe', '', 'Badarudin Jamil Badarudin', '9002', 'X Ekonomi', '2016', '0', '0', '', '0', '0', '', ''),
(73, 'FhEOkbxe', '', 'Badarudin Jamil Chaerudin', '9003', 'X Ekonomi', '2016', '0', '0', '', '0', '0', '', ''),
(74, 'FhEOkbxe', '', 'Badarudin Jamil Dadarudin', '9004', 'X Ekonomi', '2016', '0', '0', '', '0', '0', '', ''),
(75, 'FhEOkbxe', '', 'Badarudin Jamil Earudin', '9005', 'X Ekonomi', '2016', '0', '0', '', '0', '0', '', ''),
(76, 'FhEOkbxe', '', 'Badarudin Jamil Fuludin', '9006', 'X Ekonomi', '2016', '0', '0', '', '0', '0', '', ''),
(77, 'FhEOkbxe', '', 'Badarudin Jamil Gadarudin', '9007', 'X Ekonomi', '2016', '0', '0', '', '0', '0', '', ''),
(78, 'FhEOkbxe', '', 'Badarudin Jamil Hadarudin', '9008', 'X Ekonomi', '2016', '0', '0', '', '0', '0', '', ''),
(79, 'FhEOkbxe', '', 'Badarudin Jamil Irudin', '9009', 'X Ekonomi', '2016', '0', '0', '', '0', '0', '', ''),
(80, 'FhEOkbxe', '', 'Badarudin Jamil Khoirudin Ahmadinejad', '90150', 'X Ekonomi', '2016', '0', '0', '', '0', '0', '', ''),
(81, 'FhEOkbxe', '', 'Terserah', '387592473985', 'XI Teknik Komputer dan Jaringan', '2016', '0', '0', '', '0', '0', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rapot_pkl`
--

CREATE TABLE IF NOT EXISTS `rapot_pkl` (
  `id` int(11) NOT NULL,
  `id_rapot` text NOT NULL,
  `nis` text NOT NULL,
  `kelas` text NOT NULL,
  `angkatan` text NOT NULL,
  `nama_siswa` text NOT NULL,
  `nilai` text NOT NULL,
  `keterangan` text NOT NULL,
  `penginput` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rapot_pkl`
--

INSERT INTO `rapot_pkl` (`id`, `id_rapot`, `nis`, `kelas`, `angkatan`, `nama_siswa`, `nilai`, `keterangan`, `penginput`) VALUES
(1, 'FhEOkbxe', '387592473985', 'XI Teknik Komputer dan Jaringan', '2016', 'Terserah', '100', 'Excellent', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE IF NOT EXISTS `siswa` (
  `id` int(11) NOT NULL,
  `id_siswa` text NOT NULL,
  `nis` text NOT NULL,
  `nama` text NOT NULL,
  `kelas` text NOT NULL,
  `angkatan` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id`, `id_siswa`, `nis`, `nama`, `kelas`, `angkatan`) VALUES
(10, 'IXyiQiyy', '1001', 'Ahmad Zulkifli F', 'X Teknik Komputer dan Jaringan', '2016'),
(11, 'qPocHBby', '1002', 'Ahmad Zulkifli Badarudin', 'X Teknik Komputer dan Jaringan', '2016'),
(12, '26wtLQt8', '1003', 'Ahmad Zulkifli Chaerudin', 'X Teknik Komputer dan Jaringan', '2016'),
(13, 'IKEhgj98', '1004', 'Ahmad Zulkifli Dadarudin', 'X Teknik Komputer dan Jaringan', '2016'),
(14, 'fvzpZNZk', '1005', 'Ahmad Zulkifli Earudin', 'X Teknik Komputer dan Jaringan', '2016'),
(15, 'm80AG0Ir', '1006', 'Ahmad Zulkifli Fuludin', 'X Teknik Komputer dan Jaringan', '2016'),
(16, 'NnIz4I5e', '1007', 'Ahmad Zulkifli Gadarudin', 'X Teknik Komputer dan Jaringan', '2016'),
(17, 'kZr7VFSs', '1008', 'Ahmad Zulkifli Hadarudin', 'X Teknik Komputer dan Jaringan', '2016'),
(18, 'HIXXZCNR', '1009', 'Ahmad Zulkifli Irudin', 'X Teknik Komputer dan Jaringan', '2016'),
(19, 'CuBrGwXN', '9002', 'Badarudin Jamil Badarudin', 'X Ekonomi', '2016'),
(20, 'dJHPUshB', '9003', 'Badarudin Jamil Chaerudin', 'X Ekonomi', '2016'),
(21, 'ZyFJbmli', '9004', 'Badarudin Jamil Dadarudin', 'X Ekonomi', '2016'),
(22, 'HIgUgYTE', '9005', 'Badarudin Jamil Earudin', 'X Ekonomi', '2016'),
(23, '5Yd6T3Go', '9006', 'Badarudin Jamil Fuludin', 'X Ekonomi', '2016'),
(24, 'T3h5Plth', '9007', 'Badarudin Jamil Gadarudin', 'X Ekonomi', '2016'),
(25, 'TJeAOA04', '9008', 'Badarudin Jamil Hadarudin', 'X Ekonomi', '2016'),
(26, 'PKMmCx1w', '9009', 'Badarudin Jamil Irudin', 'X Ekonomi', '2016'),
(27, 'qPH9YXim', '90150', 'Badarudin Jamil Khoirudin Ahmadinejad', 'X Ekonomi', '2016'),
(28, 'sLKICAxl', '387592473985', 'Terserah', 'XI Teknik Komputer dan Jaringan', '2016');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tahun_rapot`
--

CREATE TABLE IF NOT EXISTS `tahun_rapot` (
  `id` int(11) NOT NULL,
  `id_rapot` text NOT NULL,
  `tahun_ajaran` text NOT NULL,
  `semester` text NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tahun_rapot`
--

INSERT INTO `tahun_rapot` (`id`, `id_rapot`, `tahun_ajaran`, `semester`, `status`) VALUES
(2, 'rer83280', '2016/2017', '', 'Tidak Aktif'),
(3, 'BW2fbvUZ', '2019/2020', '', 'Tidak Aktif'),
(4, '1wqPH9YX', '2017/2018', '', 'Tidak Aktif'),
(5, 'imsLKICA', '2015/2016', '', 'Tidak Aktif'),
(6, 'FhEOkbxe', '2018/2019', '0', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `id_user` text NOT NULL,
  `username` text NOT NULL,
  `user_mask` text NOT NULL,
  `password` text NOT NULL,
  `pass_mask` text NOT NULL,
  `level` text NOT NULL,
  `remember_token` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `id_user`, `username`, `user_mask`, `password`, `pass_mask`, `level`, `remember_token`) VALUES
(1, 'spkoo1', 'bcd724d15cde8c47650fda962968f102', 'siswa', 'bcd724d15cde8c47650fda962968f102', 'siswa', '1', ''),
(2, 'sppk002', 'dcf52f84dbf511ee4a0abcfc18093ee4', 'walikelas', 'dcf52f84dbf511ee4a0abcfc18093ee4', 'walikelas', '2', ''),
(3, 'sppk003', 'c5a9c89e63451dfcd9f6b6d07f4c9fd0', 'adminsekolah', 'c5a9c89e63451dfcd9f6b6d07f4c9fd0', 'adminsekolah', '3', ''),
(4, 'ri1o38w9', 'a211e1c515ecd464f816b70601108b4c', 'jarwo', 'a211e1c515ecd464f816b70601108b4c', 'jarwo', '2', ''),
(5, 'KfGQDcKd', '9f7060a03523ede7f959b50d8bea40cb', 'sukirjan', '9f7060a03523ede7f959b50d8bea40cb', 'sukirjan', '2', ''),
(6, 'IXyiQiyy', 'b8c37e33defde51cf91e1e03e51657da', '1001', 'b8c37e33defde51cf91e1e03e51657da', '1001', '1', ''),
(7, 'qPocHBby', 'fba9d88164f3e2d9109ee770223212a0', '1002', 'fba9d88164f3e2d9109ee770223212a0', '1002', '1', ''),
(8, '26wtLQt8', 'aa68c75c4a77c87f97fb686b2f068676', '1003', 'aa68c75c4a77c87f97fb686b2f068676', '1003', '1', ''),
(9, 'IKEhgj98', 'fed33392d3a48aa149a87a38b875ba4a', '1004', 'fed33392d3a48aa149a87a38b875ba4a', '1004', '1', ''),
(10, 'fvzpZNZk', '2387337ba1e0b0249ba90f55b2ba2521', '1005', '2387337ba1e0b0249ba90f55b2ba2521', '1005', '1', ''),
(11, 'm80AG0Ir', '9246444d94f081e3549803b928260f56', '1006', '9246444d94f081e3549803b928260f56', '1006', '1', ''),
(12, 'NnIz4I5e', 'd7322ed717dedf1eb4e6e52a37ea7bcd', '1007', 'd7322ed717dedf1eb4e6e52a37ea7bcd', '1007', '1', ''),
(13, 'kZr7VFSs', '1587965fb4d4b5afe8428a4a024feb0d', '1008', '1587965fb4d4b5afe8428a4a024feb0d', '1008', '1', ''),
(14, 'HIXXZCNR', '31b3b31a1c2f8a370206f111127c0dbd', '1009', '31b3b31a1c2f8a370206f111127c0dbd', '1009', '1', ''),
(15, 'kTIOoUze', 'bc667476f11158f1e6b8de2e8d1d27a5', 'cahyono', 'bc667476f11158f1e6b8de2e8d1d27a5', 'cahyono', '2', ''),
(16, 'CuBrGwXN', 'f3957fa3bea9138b3f54f0e18975a30c', '9002', 'f3957fa3bea9138b3f54f0e18975a30c', '9002', '1', ''),
(17, 'dJHPUshB', '532435c44bec236b471a47a88d63513d', '9003', '532435c44bec236b471a47a88d63513d', '9003', '1', ''),
(18, 'ZyFJbmli', '3799b2e805a7fa8b076fc020574a73b2', '9004', '3799b2e805a7fa8b076fc020574a73b2', '9004', '1', ''),
(19, 'HIgUgYTE', '6872937617af85db5a39a5243e858d1f', '9005', '6872937617af85db5a39a5243e858d1f', '9005', '1', ''),
(20, '5Yd6T3Go', '831da40e5907987235ebe5616446e083', '9006', '831da40e5907987235ebe5616446e083', '9006', '1', ''),
(21, 'T3h5Plth', '64314c17210c549a854f1f1c7adce8b6', '9007', '64314c17210c549a854f1f1c7adce8b6', '9007', '1', ''),
(22, 'TJeAOA04', 'a1324603d9b1a22277809229934a36fd', '9008', 'a1324603d9b1a22277809229934a36fd', '9008', '1', ''),
(23, 'PKMmCx1w', 'ddf354219aac374f1d40b7e760ee5bb7', '9009', 'ddf354219aac374f1d40b7e760ee5bb7', '9009', '1', ''),
(24, 'qPH9YXim', '9c509b71f28ed054340ab236be2f83bd', '9015', '9c509b71f28ed054340ab236be2f83bd', '9015', '1', ''),
(25, 'sLKICAxl', '7a9f3b5467fed8a16117898ce4e2ee5a', '387592473985', '7a9f3b5467fed8a16117898ce4e2ee5a', '387592473985', '1', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bidang_studi`
--
ALTER TABLE `bidang_studi`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `detail_user`
--
ALTER TABLE `detail_user`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `ekstrakulikuler`
--
ALTER TABLE `ekstrakulikuler`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `rapot`
--
ALTER TABLE `rapot`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `rapot_ekskul`
--
ALTER TABLE `rapot_ekskul`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `rapot_pkl`
--
ALTER TABLE `rapot_pkl`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `tahun_rapot`
--
ALTER TABLE `tahun_rapot`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bidang_studi`
--
ALTER TABLE `bidang_studi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `detail_user`
--
ALTER TABLE `detail_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `ekstrakulikuler`
--
ALTER TABLE `ekstrakulikuler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `rapot`
--
ALTER TABLE `rapot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=112;
--
-- AUTO_INCREMENT for table `rapot_ekskul`
--
ALTER TABLE `rapot_ekskul`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=82;
--
-- AUTO_INCREMENT for table `rapot_pkl`
--
ALTER TABLE `rapot_pkl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `tahun_rapot`
--
ALTER TABLE `tahun_rapot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
