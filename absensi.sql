-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Feb 2019 pada 14.54
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `absensi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `kode_kelas` varchar(20) NOT NULL,
  `nama_kelas` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`kode_kelas`, `nama_kelas`) VALUES
('A1', 'IPA 1'),
('A2', 'IPA 2'),
('B1', 'IPS 1'),
('B2', 'IPS 2'),
('C1', 'BAHASA 1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peserta`
--

CREATE TABLE `peserta` (
  `id` int(20) NOT NULL,
  `nis` varchar(20) NOT NULL,
  `nama` varchar(70) NOT NULL,
  `kode_kelas` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `nama_orang_tua` varchar(70) NOT NULL,
  `pekerjaan_orang_tua` varchar(20) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `tanggal_absensi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `peserta`
--

INSERT INTO `peserta` (`id`, `nis`, `nama`, `kode_kelas`, `tanggal_lahir`, `tempat_lahir`, `alamat`, `nama_orang_tua`, `pekerjaan_orang_tua`, `agama`, `tanggal_absensi`) VALUES
(1, '2013201271', 'asdasdsadasd', 'A1', '2019-02-03', 'asdasdsa', 'dasdsadsadsad', 'asdsadasda', 'sdsadsad', 'asdsadasd', '2019-02-05'),
(2, '1231231241', 'sdasdadasd', 'A2', '2019-02-13', 'sddasdsad', 'sadsadsadsa', 'asdasdasdsa', 'saqwqwfwq', 'wqeqwfqe', '2019-02-02'),
(3, '2013201271', 'asdasdsadasd', 'A1', '2019-02-03', 'asdasdsa', 'dasdsadsadsad', 'asdsadasda', 'sdsadsad', 'asdsadasd', '2019-02-06'),
(4, '1234123124122', 'asdasdw', 'B1', '2019-02-13', 'asdawda', 'asdqwda', 'asdwada', 'asdawqd', 'asdqwq', '2019-02-13'),
(5, '1234123124122', 'asdasdw', 'B1', '2019-02-13', 'asdawda', 'asdqwda', 'asdwada', 'asdawqd', 'asdqwq', '2019-02-13');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`kode_kelas`);

--
-- Indeks untuk tabel `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode_kelas` (`kode_kelas`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `peserta`
--
ALTER TABLE `peserta`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `peserta`
--
ALTER TABLE `peserta`
  ADD CONSTRAINT `peserta_ibfk_1` FOREIGN KEY (`kode_kelas`) REFERENCES `kelas` (`kode_kelas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
