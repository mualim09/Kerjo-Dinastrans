-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 06 Feb 2020 pada 00.31
-- Versi Server: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laporanpkl`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` varchar(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(225) NOT NULL,
  `email` varchar(30) NOT NULL,
  `handphone` char(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nama`, `username`, `password`, `email`, `handphone`) VALUES
('AD01', 'ayuai', 'ayu', '12345678', 'ayu@gmail.com', '08787622123'),
('AD02', 'Hindun', 'admin', 'admin', 'hindunndunh@gmail.com', '082150344789'),
('AD03', 'Wahyu', 'wahyu', 'wahyu', 'wahyumust@gmail.com', '0895413505277');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_info`
--

CREATE TABLE `tb_info` (
  `id` varchar(5) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `perusahaan` varchar(80) NOT NULL,
  `pic` varchar(40) NOT NULL,
  `kontak` varchar(40) NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_info`
--

INSERT INTO `tb_info` (`id`, `tgl_mulai`, `tgl_selesai`, `perusahaan`, `pic`, `kontak`, `alamat`) VALUES
('LK01', '2020-02-05', '2020-02-19', 'PT. INDOMARCO PRISMATAMA', 'GUNAWAN', '081136772231', 'Jl. Kebun Jeruk, Kel. Tomang, Jakarta Selatan'),
('LK02', '2020-02-05', '2020-02-28', 'PT. MITRA PROFITAMAS MOTOR', 'RONIKHA IMAWWATI', '082211475442	', 'Jl. A Yani Jl. Komplek Citra Km XII No.2 Gambut'),
('LK03', '2020-02-04', '2020-02-25', 'PT. LAUT TIMUR', 'ERNA SETYAWATI', '0818 1981 83', 'JL Jend A Yani Km 12,7/65 Banua Hanyar, Kertak Hanyar, Kabupaten Banjar'),
('LK04', '2020-03-04', '2020-03-18', 'PT. ANUGERAH ELEKTRONIK', 'LA VIOLA', '08127665122', 'Jl. Manuk Lulut, Kel. Mangku Bumi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pegawai`
--

CREATE TABLE `tb_pegawai` (
  `nip` char(20) NOT NULL,
  `nama_pegawai` varchar(50) NOT NULL,
  `jabatan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pegawai`
--

INSERT INTO `tb_pegawai` (`nip`, `nama_pegawai`, `jabatan`) VALUES
('196501061985102001', 'Hj. Nuril Fahriah, S. Sos, MM', 'Kabid Pelayanan Kes.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pencaker`
--

CREATE TABLE `tb_pencaker` (
  `id_pencaker` varchar(10) NOT NULL,
  `tanggal_pendaftar` date NOT NULL,
  `no_ktp` varchar(18) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `agama` varchar(10) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `status` varchar(15) NOT NULL,
  `tinggi_badan` char(10) NOT NULL,
  `berat_badan` char(10) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pendidikan` varchar(100) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `tahun` varchar(5) NOT NULL,
  `nilai` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pencaker`
--

INSERT INTO `tb_pencaker` (`id_pencaker`, `tanggal_pendaftar`, `no_ktp`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `agama`, `alamat`, `status`, `tinggi_badan`, `berat_badan`, `no_hp`, `email`, `pendidikan`, `jurusan`, `tahun`, `nilai`) VALUES
('PC01', '2020-01-01', '6303094805960004', 'PUSPITA DEWI, S.PD.', 'BENTENG', '1996-05-08', 'Perempuan', 'Islam', 'BENTENG SEBERANG RT.3 RW.2 BENTENG PENGARON, KABUPATEN BANJAR, PROVINSI KALIMANTAN SELATAN 70674', 'Single', '151', '67', '081998665120', 'pdewi8364@gmail.com', 'UNIVERSITAS ACHMAD YANI BANJARMASIN', 'SARJANA (S1) PENDIDIKAN GURU SEKOLAH DASAR', '2020', '3,41'),
('PC02', '2020-01-01', '6303105012960001', 'MAHRINA, S.M.', 'RANTAU NANGKA', '1996-12-10', 'Perempuan', 'Islam', 'RANTAU NANGKA RT.2 RW.1 RANTAU NANGKA SUNGAI PINANG, KABUPATEN BANJAR, PROVINSI KALIMANTAN SELATAN 7', 'Single', '152', '46', '082148416790', 'mahrina556@yahoo.co.id', 'UNIVERSITAS ISLAM KALIMANTAN MUHAMMAD ARSYAD AL BANJARI', 'SARJANA (S1) MANAJEMEN', '2019', '3,40'),
('PC03', '2020-01-02', '	6303051710970011', 'SOFIAN RAHMAN', 'BANJARMASIN', '1997-10-17', 'Laki-laki', 'Islam', 'KOMPLEK SEKUMPUL INDAH IV N0. 2 N RT.9 RW.5 SEKUMPUL MARTAPURA, KABUPATEN BANJAR, PROVINSI KALIMANTA', 'Single', '179', '56', '082352417724', 'sopians689@gmail.com', 'SMK DARUSSALAM MARTAPURA', 'TEKNIK MESIN', '2016', '79'),
('PC04', '2020-01-03', '	6303041310000001', 'JAMBRAN', 'NAGARA', '2000-10-13', 'Laki-laki', 'Islam', 'GUDANG TENGAH RT.2 GUDANG TENGAH SUNGAI TABUK, KABUPATEN BANJAR, PROVINSI KALIMANTAN SELATAN 70653', 'Single', '165', '54', '085652325406', 'jamketo@gmail.com', 'SMPN 1 SUMGAI TABUK', 'SEKOLAH MENENGAH PERTAMA', '2016', '75'),
('PC05', '2020-02-03', '6735412331232312', 'WAHYU MUSTAJIB', 'BANJARBARU', '1994-01-28', 'Laki-Laki', 'Islam', 'Jl. Sapta Marga, Kel. Guntung Payung, Kec. Landasan Ulin, Kota Banjarbaru', 'Single', '166', '66', '081237143176', 'adjieb.wahyu@gmail.com', 'UNIVERSITAS ACHMAD YANI', 'PGSD', '2018', '3,5'),
('PC06', '2020-02-04', '3242382302384230', 'FSDFSDIOP', 'SODFSDOPF', '2020-02-26', 'Laki-Laki', 'Katholik', 'Sdfsdf Sdf Sdf Sdf Sdf ', 'Single', '23', '234', '1323423434', 'andini@gmail.com', 'SDFSDFSDF', 'SDF SD', '2344', '234'),
('PC07', '2020-02-11', '3924274761212312', 'SDFJSDFJKLD SDFKJSDF ', 'SDF JLLJ', '1999-03-12', 'Perempuan', 'Katholik', 'S Sdfjkh Sdfsdf Kjshdf ', 'Cerai', '123', '45', '45123123', 'asdipsdf@gmail.com', 'ASDAS ASDASAD', 'ASD TYRTY', '1341', '43'),
('PC08', '2020-02-04', '546431231233', 'GFJ KIUYI WERW', 'ETYWTYU', '2020-01-29', 'Perempuan', 'Budha', 'Ertr Eerter Erter T', 'Single', '213', '45', '3455231', 'asdipsdf@gmail.com', 'DFGD DFGDFGDF', 'DFGDFG DFGDFG', '4321', '67'),
('PC09', '2020-01-28', '65756234234', 'DFGFGDFG', 'DGHJGJ', '2020-01-27', 'Laki-Laki', 'Budha', 'Dfg Dfgdfg Dfgdfgdfg Dfgg', 'Single', '135', '63', '092342123', 'sdfsdsdf@gmail.com', 'ASD A ASD ', 'PIDSYU ', '8123', '99'),
('PC10', '2020-02-04', '1832912931923123', 'ANA SOPHIA ANNISA', 'BANJARMASIN', '1995-11-17', 'Perempuan', 'Islam', 'Jl. A. Yani Km. 7,5 Kel. Karang Mekar, Kec. Kertak Hanyar, Kab. Banjar', 'Single', '163', '61', '089598123311', 'anna_annisa@gmail.com', 'UNIVERSITAS ISLAM KALIMANTAN MUHAMMAD ARSYAD AL BANJARI', 'SISTEM INFORMASI', '2018', '3,6');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_perusahaan`
--

CREATE TABLE `tb_perusahaan` (
  `id_perusahaan` varchar(10) NOT NULL,
  `perusahaan` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `nama_PIC` varchar(20) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `kontak` varchar(15) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_perusahaan`
--

INSERT INTO `tb_perusahaan` (`id_perusahaan`, `perusahaan`, `alamat`, `nama_PIC`, `jabatan`, `kontak`, `deskripsi`) VALUES
('P01', 'PT. MITRA PROFITAMAS MOTOR', 'Jl. A Yani Jl. Komplek Citra Km XII No.2 Gambut', 'RONIKHA IMAWWATI', 'HGAC ADMIN', '082211475442	', '- Bisa Komputer (Ms. Word, Power Point, Ms. Excel) \r\n- Berpenampilan menarik - Bersedia bekerja di bawah tekanan dan target - Siap di tempatkan di luar daerah Banjarmasin - Jujur, disiplin dan bertanggung jawab'),
('P02', 'PT. LAUT TIMUR', 'JL Jend A Yani Km 12,7/65 Banua Hanyar, Kertak Hanyar, Kabupaten Banjar', 'ERNA SETYAWATI', 'HRD', '0818 1981 83', '- Usia Maksimal 35 Tahun, Memiliki Sepeda Motor + SIM C (SR)'),
('P03', 'PT. ANUGERAH ELEKTRONIK', 'Jl. Manuk Lulut, Kel. Mangku Bumi', 'LA VIOLA', 'SUPERVISOR', '08127665122', 'asdasdasd\r\nasdasdasd asdasdasd\r\nasdasdas asdasdas\r\ndtrt'),
('P04', 'PT. MENCARI CINTA SEJATI', 'Jkajlks Dasdkjasdkas Asdas ', 'LUYA MANA', 'ADMIN', '08712127651', 'ajdkasjd asdjasjdh jasdhasjk jhasd kjk asdhjk \r\nasdasdh[p ertertert [[uayd asd '),
('P05', 'PT. INDOMARCO PRISMATAMA', 'Jl. Kebun Jeruk, Kel. Tomang, Jakarta Selatan', 'GUNAWAN', 'HEAD DEPT', '081136772231', '-Lulusan min. SMA\r\n-Mempunyai Sim C\r\n-Siap bekerja dibawah tekanan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_surat_masuk`
--

CREATE TABLE `tb_surat_masuk` (
  `id_penerima` varchar(10) NOT NULL,
  `nama_penerima` varchar(25) NOT NULL,
  `perusahaan` varchar(50) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `nama_pengirim` varchar(50) NOT NULL,
  `kontak` varchar(15) NOT NULL,
  `upload` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_surat_masuk`
--

INSERT INTO `tb_surat_masuk` (`id_penerima`, `nama_penerima`, `perusahaan`, `tanggal_surat`, `nama_pengirim`, `kontak`, `upload`) VALUES
('SM001', 'admin', 'PT. INDOMARCO PRISMATAMA', '2020-01-07', 'ICA', '0878654332', 'perkasa.jpg'),
('SM002', 'admin', 'PT. LAUT TIMUR', '2020-02-04', 'FARIDAH', '081187651277', 'brosur.jpg'),
('SM003', 'admin', 'PT. MENCARI CINTA SEJATI', '2020-02-04', 'KURNIA', '089576122112', 'kerja.jpg'),
('SM004', 'admin', 'PT. MITRA PROFITAMAS MOTOR', '2020-02-04', 'HILMAN', '082276512311', 'indomaret.jpg'),
('SM005', 'admin', 'PT. ANUGERAH ELEKTRONIK', '2020-02-05', 'AINI', '082276512311', 'bca.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `username` (`username`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `tb_info`
--
ALTER TABLE `tb_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `tb_pencaker`
--
ALTER TABLE `tb_pencaker`
  ADD PRIMARY KEY (`id_pencaker`);

--
-- Indexes for table `tb_perusahaan`
--
ALTER TABLE `tb_perusahaan`
  ADD PRIMARY KEY (`id_perusahaan`),
  ADD KEY `id_pengurus` (`perusahaan`);

--
-- Indexes for table `tb_surat_masuk`
--
ALTER TABLE `tb_surat_masuk`
  ADD PRIMARY KEY (`id_penerima`),
  ADD KEY `id_desa` (`nama_pengirim`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
