-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Des 2024 pada 08.26
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rumahsakit_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `antrian`
--

CREATE TABLE `antrian` (
  `id_antrian` int(11) NOT NULL,
  `nomor_antrian` varchar(10) NOT NULL,
  `id_lokasi` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jam_antrian` time NOT NULL,
  `id_dokter` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `antrian`
--

INSERT INTO `antrian` (`id_antrian`, `nomor_antrian`, `id_lokasi`, `tanggal`, `jam_antrian`, `id_dokter`) VALUES
(1, 'A-001', 3531, '2024-12-12', '07:00:00', '11'),
(5, 'A-001', 3531, '2024-12-05', '07:00:00', '11'),
(7, 'A-001', 3531, '2025-01-02', '07:00:00', '11'),
(8, 'A-002', 3531, '2025-01-02', '07:30:00', '11'),
(9, 'A-001', 3141, '2025-01-17', '12:00:00', '2'),
(10, 'A-003', 3531, '2024-12-12', '08:00:00', '11'),
(11, 'A-001', 3141, '2024-12-20', '12:00:00', '2'),
(12, 'A-001', 3531, '2024-12-26', '07:00:00', '11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokter`
--

CREATE TABLE `dokter` (
  `nip` varchar(20) NOT NULL,
  `npa_idi` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nomor_telepon` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `id_poli` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `dokter`
--

INSERT INTO `dokter` (`nip`, `npa_idi`, `nama`, `nomor_telepon`, `email`, `id_poli`) VALUES
('11', '11421', 'Agus Budianto C', '8648649797', 'a@gmail.com', 2416),
('2', '2', 'wiliam', '864864', 'b@gmail.com', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `id_dokter` varchar(20) NOT NULL,
  `hari` enum('Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu') NOT NULL,
  `waktu_mulai` time NOT NULL,
  `waktu_selesai` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `id_dokter`, `hari`, `waktu_mulai`, `waktu_selesai`) VALUES
(4, '11', 'Kamis', '07:00:00', '12:00:00'),
(5, '2', 'Jumat', '12:00:00', '16:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kunjungan`
--

CREATE TABLE `kunjungan` (
  `id_kunjungan` int(10) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `id_antrian` int(11) DEFAULT NULL,
  `pembayaran` enum('bpjs','umum') NOT NULL,
  `status_kunjungan` enum('hadir','tidak hadir') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kunjungan`
--

INSERT INTO `kunjungan` (`id_kunjungan`, `id_pasien`, `id_antrian`, `pembayaran`, `status_kunjungan`) VALUES
(1, 1, 1, 'bpjs', 'hadir'),
(2, 1, 7, 'bpjs', 'hadir'),
(3, 7, 8, 'umum', 'hadir'),
(4, 7, 9, 'bpjs', 'hadir'),
(5, 1, 10, 'bpjs', 'tidak hadir'),
(6, 5, 11, 'bpjs', 'tidak hadir'),
(7, 8, 12, 'bpjs', 'tidak hadir');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lokasi`
--

CREATE TABLE `lokasi` (
  `id_lokasi` int(11) NOT NULL,
  `nama_tempat` varchar(30) NOT NULL,
  `id_poli` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `lokasi`
--

INSERT INTO `lokasi` (`id_lokasi`, `nama_tempat`, `id_poli`) VALUES
(3141, 'Lantai 3.5', 1),
(3531, 'Lt 3.1', 2416);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` int(11) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nomor_bpjs` varchar(20) DEFAULT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `nomor_telepon` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `status` enum('aktif','tidak aktif') DEFAULT 'tidak aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `nik`, `nomor_bpjs`, `nama`, `jenis_kelamin`, `tanggal_lahir`, `nomor_telepon`, `email`, `status`) VALUES
(1, '525254', '2522', 'bang anton', 'Laki-Laki', '2024-12-05', '5663', 'b@gmail.com', 'aktif'),
(5, '1', '1', 'aaaa', 'Perempuan', '2024-12-12', '08121', 'test@gmail.com', 'aktif'),
(6, '2', '2', 'feesf', 'Laki-Laki', '2024-12-12', '008', 'dfafua@gmail.com', 'tidak aktif'),
(7, '31', '31', '31', 'Perempuan', '2024-12-11', '31', NULL, 'tidak aktif'),
(8, '12345678', '1234321', 'david tjong', 'Laki-Laki', '2004-11-02', '081234567890', NULL, 'tidak aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `nip` varchar(20) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `nik` varchar(16) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `id_pengguna` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`nip`, `nama`, `jenis_kelamin`, `tanggal_lahir`, `nik`, `jabatan`, `id_pengguna`) VALUES
('6', 'dave', 'Laki-laki', '2024-12-06', '3311', 'admin cabang', 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` enum('admin','hrd') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `username`, `password`, `role`) VALUES
(6, 'david', 'aa743a0aaec8f7d7a1f01442503957f4d7a2d634', 'hrd'),
(8, 'd', '3c363836cf4e16666669a25da280a1865c2d2874', 'admin'),
(9, 'ilkom', '1021167b8d793ebfd64daea4cad4e57a84db79fe', 'admin'),
(10, 'aguss', '13a27fd5d609a1c82c4ff046604a06f168f4373e', 'admin'),
(11, 'b', 'e9d71f5ee7c92d6dc9e92ffdad17b8bd49418f98', 'admin'),
(13, 'f', '4a0a19218e082a343a1b17e5333409af9d98f0f5', 'hrd'),
(14, 'x', '11f6ad8ec52a2984abaafd7c3b516503785c2072', 'hrd'),
(15, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin'),
(16, 'eri', '22be77c0cadb4da6085e45c68e23e88f7a6f8ea3', 'admin'),
(17, 'budiman', '227d6a389ff7d65b8aba17e494800ceac4367035', 'admin'),
(18, 'agus sedih', '6662071d168992f220248f6770ab5a8b93372265', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `poli`
--

CREATE TABLE `poli` (
  `id_poli` int(11) NOT NULL,
  `nama_poli` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `poli`
--

INSERT INTO `poli` (`id_poli`, `nama_poli`) VALUES
(1, 'Poliklinik Jantung'),
(2416, 'Poliklinik Mata'),
(532531, 'Poliklinik Kafka');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `antrian`
--
ALTER TABLE `antrian`
  ADD PRIMARY KEY (`id_antrian`),
  ADD KEY `id_lokasi` (`id_lokasi`),
  ADD KEY `id_dokter` (`id_dokter`);

--
-- Indeks untuk tabel `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`nip`),
  ADD UNIQUE KEY `npa_idi` (`npa_idi`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `id_poli` (`id_poli`);

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indeks untuk tabel `kunjungan`
--
ALTER TABLE `kunjungan`
  ADD PRIMARY KEY (`id_kunjungan`),
  ADD KEY `id_pasien` (`id_pasien`),
  ADD KEY `kunjungan_ibfk_3` (`id_antrian`);

--
-- Indeks untuk tabel `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id_lokasi`),
  ADD KEY `id_poli` (`id_poli`);

--
-- Indeks untuk tabel `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`),
  ADD UNIQUE KEY `nik` (`nik`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`nip`),
  ADD UNIQUE KEY `nik` (`nik`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeks untuk tabel `poli`
--
ALTER TABLE `poli`
  ADD PRIMARY KEY (`id_poli`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `antrian`
--
ALTER TABLE `antrian`
  MODIFY `id_antrian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `kunjungan`
--
ALTER TABLE `kunjungan`
  MODIFY `id_kunjungan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id_lokasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31332;

--
-- AUTO_INCREMENT untuk tabel `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id_pasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `poli`
--
ALTER TABLE `poli`
  MODIFY `id_poli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=532532;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `antrian`
--
ALTER TABLE `antrian`
  ADD CONSTRAINT `antrian_ibfk_1` FOREIGN KEY (`id_lokasi`) REFERENCES `lokasi` (`id_lokasi`),
  ADD CONSTRAINT `antrian_ibfk_2` FOREIGN KEY (`id_dokter`) REFERENCES `dokter` (`nip`);

--
-- Ketidakleluasaan untuk tabel `dokter`
--
ALTER TABLE `dokter`
  ADD CONSTRAINT `dokter_ibfk_1` FOREIGN KEY (`id_poli`) REFERENCES `poli` (`id_poli`) ON DELETE SET NULL;

--
-- Ketidakleluasaan untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`id_dokter`) REFERENCES `dokter` (`nip`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kunjungan`
--
ALTER TABLE `kunjungan`
  ADD CONSTRAINT `kunjungan_ibfk_1` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`),
  ADD CONSTRAINT `kunjungan_ibfk_3` FOREIGN KEY (`id_antrian`) REFERENCES `antrian` (`id_antrian`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `lokasi`
--
ALTER TABLE `lokasi`
  ADD CONSTRAINT `lokasi_ibfk_1` FOREIGN KEY (`id_poli`) REFERENCES `poli` (`id_poli`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `pegawai_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
