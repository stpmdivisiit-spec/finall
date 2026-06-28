-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2026 at 11:28 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbestpm`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang_detail`
--

CREATE TABLE `barang_detail` (
  `id` int(11) NOT NULL,
  `id_master` int(11) NOT NULL,
  `kode_barang` varchar(50) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `klasifikasi` varchar(100) DEFAULT NULL,
  `tanggal_perolehan` date NOT NULL,
  `lokasi` varchar(100) DEFAULT 'Gudang',
  `lokasi_asal` varchar(100) DEFAULT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Baru',
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang_detail`
--

INSERT INTO `barang_detail` (`id`, `id_master`, `kode_barang`, `nama_barang`, `klasifikasi`, `tanggal_perolehan`, `lokasi`, `lokasi_asal`, `status`, `keterangan`) VALUES
(13659, 184, '280.09 - 001 - 001', 'Vas Bunga', 'PERHIASAN RUANGAN', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(13660, 184, '280.09 - 001 - 002', 'Vas Bunga', 'PERHIASAN RUANGAN', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(13661, 184, '280.09 - 001 - 003', 'Vas Bunga', 'PERHIASAN RUANGAN', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(13662, 184, '280.09 - 001 - 004', 'Vas Bunga', 'PERHIASAN RUANGAN', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(13663, 184, '280.09 - 001 - 005', 'Vas Bunga', 'PERHIASAN RUANGAN', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(13664, 184, '280.09 - 001 - 006', 'Vas Bunga', 'PERHIASAN RUANGAN', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(13665, 184, '280.09 - 001 - 007', 'Vas Bunga', 'PERHIASAN RUANGAN', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(13666, 184, '280.09 - 001 - 008', 'Vas Bunga', 'PERHIASAN RUANGAN', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(13667, 184, '280.09 - 001 - 009', 'Vas Bunga', 'PERHIASAN RUANGAN', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(13668, 184, '280.09 - 001 - 010', 'Vas Bunga', 'PERHIASAN RUANGAN', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(13669, 185, '280.08 - 001 - 001', 'Salib Yesus', 'PERHIASAN RUANGAN', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(13670, 185, '280.08 - 001 - 002', 'Salib Yesus', 'PERHIASAN RUANGAN', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(13671, 185, '280.08 - 001 - 003', 'Salib Yesus', 'PERHIASAN RUANGAN', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(13672, 185, '280.08 - 001 - 004', 'Salib Yesus', 'PERHIASAN RUANGAN', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(13673, 185, '280.08 - 001 - 005', 'Salib Yesus', 'PERHIASAN RUANGAN', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(13674, 185, '280.08 - 001 - 006', 'Salib Yesus', 'PERHIASAN RUANGAN', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(13675, 185, '280.08 - 001 - 007', 'Salib Yesus', 'PERHIASAN RUANGAN', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(13676, 185, '280.08 - 001 - 008', 'Salib Yesus', 'PERHIASAN RUANGAN', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(13677, 185, '280.08 - 001 - 009', 'Salib Yesus', 'PERHIASAN RUANGAN', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(13678, 185, '280.08 - 001 - 010', 'Salib Yesus', 'PERHIASAN RUANGAN', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(13679, 185, '280.08 - 001 - 011', 'Salib Yesus', 'PERHIASAN RUANGAN', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(13680, 185, '280.08 - 001 - 012', 'Salib Yesus', 'PERHIASAN RUANGAN', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(13681, 185, '280.08 - 001 - 013', 'Salib Yesus', 'PERHIASAN RUANGAN', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(13682, 185, '280.08 - 001 - 014', 'Salib Yesus', 'PERHIASAN RUANGAN', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(13683, 185, '280.08 - 001 - 015', 'Salib Yesus', 'PERHIASAN RUANGAN', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(13684, 185, '280.08 - 001 - 016', 'Salib Yesus', 'PERHIASAN RUANGAN', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(13685, 185, '280.08 - 001 - 017', 'Salib Yesus', 'PERHIASAN RUANGAN', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(13686, 185, '280.08 - 001 - 018', 'Salib Yesus', 'PERHIASAN RUANGAN', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(13687, 185, '280.08 - 001 - 019', 'Salib Yesus', 'PERHIASAN RUANGAN', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(13688, 185, '280.08 - 001 - 020', 'Salib Yesus', 'PERHIASAN RUANGAN', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(13689, 185, '280.08 - 001 - 021', 'Salib Yesus', 'PERHIASAN RUANGAN', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(13690, 185, '280.08 - 001 - 022', 'Salib Yesus', 'PERHIASAN RUANGAN', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(13691, 185, '280.08 - 001 - 023', 'Salib Yesus', 'PERHIASAN RUANGAN', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(13692, 185, '280.08 - 001 - 024', 'Salib Yesus', 'PERHIASAN RUANGAN', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(13693, 185, '280.08 - 001 - 025', 'Salib Yesus', 'PERHIASAN RUANGAN', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(13694, 185, '280.08 - 001 - 026', 'Salib Yesus', 'PERHIASAN RUANGAN', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(13695, 185, '280.08 - 001 - 027', 'Salib Yesus', 'PERHIASAN RUANGAN', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(13696, 185, '280.08 - 001 - 028', 'Salib Yesus', 'PERHIASAN RUANGAN', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(13697, 185, '280.08 - 001 - 029', 'Salib Yesus', 'PERHIASAN RUANGAN', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(13698, 185, '280.08 - 001 - 030', 'Salib Yesus', 'PERHIASAN RUANGAN', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(13699, 185, '280.08 - 001 - 031', 'Salib Yesus', 'PERHIASAN RUANGAN', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(13700, 185, '280.08 - 001 - 032', 'Salib Yesus', 'PERHIASAN RUANGAN', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(13701, 186, '280.07 - 001 - 001', 'Piala Penghargaan Perlombaan', 'PERHIASAN RUANGAN', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(13702, 186, '280.07 - 001 - 002', 'Piala Penghargaan Perlombaan', 'PERHIASAN RUANGAN', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(13703, 186, '280.07 - 001 - 003', 'Piala Penghargaan Perlombaan', 'PERHIASAN RUANGAN', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(13704, 186, '280.07 - 001 - 004', 'Piala Penghargaan Perlombaan', 'PERHIASAN RUANGAN', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(13705, 186, '280.07 - 001 - 005', 'Piala Penghargaan Perlombaan', 'PERHIASAN RUANGAN', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(13706, 186, '280.07 - 001 - 006', 'Piala Penghargaan Perlombaan', 'PERHIASAN RUANGAN', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(13707, 186, '280.07 - 001 - 007', 'Piala Penghargaan Perlombaan', 'PERHIASAN RUANGAN', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(13708, 186, '280.07 - 001 - 008', 'Piala Penghargaan Perlombaan', 'PERHIASAN RUANGAN', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(13709, 186, '280.07 - 001 - 009', 'Piala Penghargaan Perlombaan', 'PERHIASAN RUANGAN', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(13710, 186, '280.07 - 001 - 010', 'Piala Penghargaan Perlombaan', 'PERHIASAN RUANGAN', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(13711, 186, '280.07 - 001 - 011', 'Piala Penghargaan Perlombaan', 'PERHIASAN RUANGAN', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(13712, 186, '280.07 - 001 - 012', 'Piala Penghargaan Perlombaan', 'PERHIASAN RUANGAN', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(13713, 186, '280.07 - 001 - 013', 'Piala Penghargaan Perlombaan', 'PERHIASAN RUANGAN', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(13714, 186, '280.07 - 001 - 014', 'Piala Penghargaan Perlombaan', 'PERHIASAN RUANGAN', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(13715, 186, '280.07 - 001 - 015', 'Piala Penghargaan Perlombaan', 'PERHIASAN RUANGAN', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(13716, 186, '280.07 - 001 - 016', 'Piala Penghargaan Perlombaan', 'PERHIASAN RUANGAN', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(13717, 186, '280.07 - 001 - 017', 'Piala Penghargaan Perlombaan', 'PERHIASAN RUANGAN', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(13718, 186, '280.07 - 001 - 018', 'Piala Penghargaan Perlombaan', 'PERHIASAN RUANGAN', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(13719, 186, '280.07 - 001 - 019', 'Piala Penghargaan Perlombaan', 'PERHIASAN RUANGAN', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(13720, 186, '280.07 - 001 - 020', 'Piala Penghargaan Perlombaan', 'PERHIASAN RUANGAN', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(13721, 186, '280.07 - 001 - 021', 'Piala Penghargaan Perlombaan', 'PERHIASAN RUANGAN', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(13722, 186, '280.07 - 001 - 022', 'Piala Penghargaan Perlombaan', 'PERHIASAN RUANGAN', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(13723, 186, '280.07 - 001 - 023', 'Piala Penghargaan Perlombaan', 'PERHIASAN RUANGAN', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(13724, 186, '280.07 - 001 - 024', 'Piala Penghargaan Perlombaan', 'PERHIASAN RUANGAN', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(13725, 186, '280.07 - 001 - 025', 'Piala Penghargaan Perlombaan', 'PERHIASAN RUANGAN', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(13726, 186, '280.07 - 001 - 026', 'Piala Penghargaan Perlombaan', 'PERHIASAN RUANGAN', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(13727, 186, '280.07 - 001 - 027', 'Piala Penghargaan Perlombaan', 'PERHIASAN RUANGAN', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(13728, 186, '280.07 - 001 - 028', 'Piala Penghargaan Perlombaan', 'PERHIASAN RUANGAN', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(13729, 186, '280.07 - 001 - 029', 'Piala Penghargaan Perlombaan', 'PERHIASAN RUANGAN', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(13730, 186, '280.07 - 001 - 030', 'Piala Penghargaan Perlombaan', 'PERHIASAN RUANGAN', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(13731, 186, '280.07 - 001 - 031', 'Piala Penghargaan Perlombaan', 'PERHIASAN RUANGAN', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(13732, 186, '280.07 - 001 - 032', 'Piala Penghargaan Perlombaan', 'PERHIASAN RUANGAN', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(13733, 186, '280.07 - 001 - 033', 'Piala Penghargaan Perlombaan', 'PERHIASAN RUANGAN', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(13734, 186, '280.07 - 001 - 034', 'Piala Penghargaan Perlombaan', 'PERHIASAN RUANGAN', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(13735, 186, '280.07 - 001 - 035', 'Piala Penghargaan Perlombaan', 'PERHIASAN RUANGAN', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(13736, 186, '280.07 - 001 - 036', 'Piala Penghargaan Perlombaan', 'PERHIASAN RUANGAN', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(13737, 186, '280.07 - 001 - 037', 'Piala Penghargaan Perlombaan', 'PERHIASAN RUANGAN', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(13738, 186, '280.07 - 001 - 038', 'Piala Penghargaan Perlombaan', 'PERHIASAN RUANGAN', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(13739, 186, '280.07 - 001 - 039', 'Piala Penghargaan Perlombaan', 'PERHIASAN RUANGAN', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(13740, 186, '280.07 - 001 - 040', 'Piala Penghargaan Perlombaan', 'PERHIASAN RUANGAN', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(13741, 186, '280.07 - 001 - 041', 'Piala Penghargaan Perlombaan', 'PERHIASAN RUANGAN', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(13742, 187, '280.06 - 001 - 001', 'Patung Bunda Maria', 'PERHIASAN RUANGAN', '2025-07-07', 'Ruangan Doa', 'Gudang', 'Aktif Digunakan', ''),
(13743, 187, '280.06 - 001 - 002', 'Patung Bunda Maria', 'PERHIASAN RUANGAN', '2025-07-07', 'Ruangan Doa', 'Gudang', 'Aktif Digunakan', ''),
(13744, 188, '280.04 - 001 - 001', 'Hiasan', 'PERHIASAN RUANGAN', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(13745, 188, '280.04 - 001 - 002', 'Hiasan', 'PERHIASAN RUANGAN', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(13746, 188, '280.04 - 001 - 003', 'Hiasan', 'PERHIASAN RUANGAN', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(13747, 188, '280.04 - 001 - 004', 'Hiasan', 'PERHIASAN RUANGAN', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(13748, 189, '280.03 - 001 - 001', 'Kain Gorden', 'PERHIASAN RUANGAN', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(13749, 189, '280.03 - 001 - 002', 'Kain Gorden', 'PERHIASAN RUANGAN', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(13750, 189, '280.03 - 001 - 003', 'Kain Gorden', 'PERHIASAN RUANGAN', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(13751, 189, '280.03 - 001 - 004', 'Kain Gorden', 'PERHIASAN RUANGAN', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(13752, 189, '280.03 - 001 - 005', 'Kain Gorden', 'PERHIASAN RUANGAN', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(13753, 190, '280.02 - 001 - 001', 'Foto Presiden', 'PERHIASAN RUANGAN', '2025-07-07', 'Gedung Aula', 'Gudang', 'Baik', ''),
(13754, 190, '280.02 - 001 - 002', 'Foto Presiden', 'PERHIASAN RUANGAN', '2025-07-07', 'Gedung Aula', 'Gudang', 'Baik', ''),
(13755, 191, '280.01 - 001 - 001', 'Bendera Kecil', 'PERHIASAN RUANGAN', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(13756, 191, '280.01 - 001 - 002', 'Bendera Kecil', 'PERHIASAN RUANGAN', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(13757, 191, '280.01 - 001 - 003', 'Bendera Kecil', 'PERHIASAN RUANGAN', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(13758, 191, '280.01 - 001 - 004', 'Bendera Kecil', 'PERHIASAN RUANGAN', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(13759, 191, '280.01 - 001 - 005', 'Bendera Kecil', 'PERHIASAN RUANGAN', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(13760, 191, '280.01 - 001 - 006', 'Bendera Kecil', 'PERHIASAN RUANGAN', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(13761, 191, '280.01 - 001 - 007', 'Bendera Kecil', 'PERHIASAN RUANGAN', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(13762, 191, '280.01 - 001 - 008', 'Bendera Kecil', 'PERHIASAN RUANGAN', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(13763, 191, '280.01 - 001 - 009', 'Bendera Kecil', 'PERHIASAN RUANGAN', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(13764, 191, '280.01 - 001 - 010', 'Bendera Kecil', 'PERHIASAN RUANGAN', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(13765, 191, '280.01 - 001 - 011', 'Bendera Kecil', 'PERHIASAN RUANGAN', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(13766, 191, '280.01 - 001 - 012', 'Bendera Kecil', 'PERHIASAN RUANGAN', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(13767, 192, '260,101 - 001 - 001', 'Kursi Sofa', 'MEBELAIR', '2026-07-07', 'Gedung Aula', 'Gudang', 'Layak Pakai', 'Podium Besar berbahan Kayu'),
(13768, 192, '260,101 - 001 - 002', 'Kursi Sofa', 'MEBELAIR', '2026-07-07', 'Gedung Aula', 'Gudang', 'Layak Pakai', 'Podium Sedang berbahan Kayu'),
(13774, 193, '210.01 - 001 - 001', 'AC', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Gudang', NULL, 'Dipinjam', NULL),
(13775, 193, '210.01 - 001 - 002', 'AC', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Gudang', NULL, 'Dipinjam', NULL),
(13776, 193, '210.01 - 001 - 003', 'AC', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Gudang', NULL, 'Dipinjam', NULL),
(13777, 193, '210.01 - 001 - 004', 'AC', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Gudang', NULL, 'Dipinjam', NULL),
(13778, 193, '210.01 - 001 - 005', 'AC', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Gudang', NULL, 'Dipinjam', NULL),
(13779, 193, '210.01 - 001 - 006', 'AC', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13780, 193, '210.01 - 001 - 007', 'AC', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13781, 193, '210.01 - 001 - 008', 'AC', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13782, 193, '210.01 - 001 - 009', 'AC', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13783, 193, '210.01 - 001 - 010', 'AC', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13784, 193, '210.01 - 001 - 011', 'AC', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13785, 193, '210.01 - 001 - 012', 'AC', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13786, 193, '210.01 - 001 - 013', 'AC', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13787, 194, '210.02 - 001 - 001', 'Dispenser', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13788, 194, '210.02 - 001 - 002', 'Dispenser', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13789, 194, '210.02 - 001 - 003', 'Dispenser', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13790, 195, '211.01 - 001 - 001', 'Kipas Angin Berdiri', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13791, 195, '211.01 - 001 - 002', 'Kipas Angin Berdiri', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13792, 195, '211.01 - 001 - 003', 'Kipas Angin Berdiri', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13793, 195, '211.01 - 001 - 004', 'Kipas Angin Berdiri', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13794, 195, '211.01 - 001 - 005', 'Kipas Angin Berdiri', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13795, 196, '210.03 - 001 - 001', 'Kipas Angin Dinding', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13796, 196, '210.03 - 001 - 002', 'Kipas Angin Dinding', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13797, 196, '210.03 - 001 - 003', 'Kipas Angin Dinding', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13798, 196, '210.03 - 001 - 004', 'Kipas Angin Dinding', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13799, 196, '210.03 - 001 - 005', 'Kipas Angin Dinding', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13800, 196, '210.03 - 001 - 006', 'Kipas Angin Dinding', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13801, 196, '210.03 - 001 - 007', 'Kipas Angin Dinding', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13802, 196, '210.03 - 001 - 008', 'Kipas Angin Dinding', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13803, 196, '210.03 - 001 - 009', 'Kipas Angin Dinding', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13804, 196, '210.03 - 001 - 010', 'Kipas Angin Dinding', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13805, 196, '210.03 - 001 - 011', 'Kipas Angin Dinding', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13806, 196, '210.03 - 001 - 012', 'Kipas Angin Dinding', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13807, 196, '210.03 - 001 - 013', 'Kipas Angin Dinding', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13808, 196, '210.03 - 001 - 014', 'Kipas Angin Dinding', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13809, 196, '210.03 - 001 - 015', 'Kipas Angin Dinding', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13810, 196, '210.03 - 001 - 016', 'Kipas Angin Dinding', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13811, 196, '210.03 - 001 - 017', 'Kipas Angin Dinding', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13812, 196, '210.03 - 001 - 018', 'Kipas Angin Dinding', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13813, 196, '210.03 - 001 - 019', 'Kipas Angin Dinding', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13814, 196, '210.03 - 001 - 020', 'Kipas Angin Dinding', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13815, 196, '210.03 - 001 - 021', 'Kipas Angin Dinding', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13816, 196, '210.03 - 001 - 022', 'Kipas Angin Dinding', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13817, 196, '210.03 - 001 - 023', 'Kipas Angin Dinding', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13818, 196, '210.03 - 001 - 024', 'Kipas Angin Dinding', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13819, 196, '210.03 - 001 - 025', 'Kipas Angin Dinding', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13820, 196, '210.03 - 001 - 026', 'Kipas Angin Dinding', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13821, 196, '210.03 - 001 - 027', 'Kipas Angin Dinding', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13822, 196, '210.03 - 001 - 028', 'Kipas Angin Dinding', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13823, 196, '210.03 - 001 - 029', 'Kipas Angin Dinding', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13824, 196, '210.03 - 001 - 030', 'Kipas Angin Dinding', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13825, 196, '210.03 - 001 - 031', 'Kipas Angin Dinding', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13826, 196, '210.03 - 001 - 032', 'Kipas Angin Dinding', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13827, 196, '210.03 - 001 - 033', 'Kipas Angin Dinding', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13828, 196, '210.03 - 001 - 034', 'Kipas Angin Dinding', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13829, 196, '210.03 - 001 - 035', 'Kipas Angin Dinding', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13830, 196, '210.03 - 001 - 036', 'Kipas Angin Dinding', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13831, 196, '210.03 - 001 - 037', 'Kipas Angin Dinding', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13832, 196, '210.03 - 001 - 038', 'Kipas Angin Dinding', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13833, 196, '210.03 - 001 - 039', 'Kipas Angin Dinding', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13834, 196, '210.03 - 001 - 040', 'Kipas Angin Dinding', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13835, 196, '210.03 - 001 - 041', 'Kipas Angin Dinding', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13836, 196, '210.03 - 001 - 042', 'Kipas Angin Dinding', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13837, 196, '210.03 - 001 - 043', 'Kipas Angin Dinding', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13838, 196, '210.03 - 001 - 044', 'Kipas Angin Dinding', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13839, 196, '210.03 - 001 - 045', 'Kipas Angin Dinding', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13840, 196, '210.03 - 001 - 046', 'Kipas Angin Dinding', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13841, 196, '210.03 - 001 - 047', 'Kipas Angin Dinding', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13842, 196, '210.03 - 001 - 048', 'Kipas Angin Dinding', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13843, 196, '210.03 - 001 - 049', 'Kipas Angin Dinding', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13844, 196, '210.03 - 001 - 050', 'Kipas Angin Dinding', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13845, 196, '210.03 - 001 - 051', 'Kipas Angin Dinding', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13846, 196, '210.03 - 001 - 052', 'Kipas Angin Dinding', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13847, 196, '210.03 - 001 - 053', 'Kipas Angin Dinding', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13848, 196, '210.03 - 001 - 054', 'Kipas Angin Dinding', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13849, 196, '210.03 - 001 - 055', 'Kipas Angin Dinding', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13850, 196, '210.03 - 001 - 056', 'Kipas Angin Dinding', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13851, 196, '210.03 - 001 - 057', 'Kipas Angin Dinding', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13852, 196, '210.03 - 001 - 058', 'Kipas Angin Dinding', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13853, 196, '210.03 - 001 - 059', 'Kipas Angin Dinding', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13854, 196, '210.03 - 001 - 060', 'Kipas Angin Dinding', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13855, 196, '210.03 - 001 - 061', 'Kipas Angin Dinding', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13856, 197, '212.01 - 001 - 001', 'Kipas Angin Gantung', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13857, 197, '212.01 - 001 - 002', 'Kipas Angin Gantung', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13858, 198, '210.04 - 001 - 001', 'Kulkas Mini', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13859, 199, '213.01 - 001 - 001', 'Speaker (SPKR)', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Gudang', NULL, 'Dipinjam', NULL),
(13860, 199, '213.01 - 001 - 002', 'Speaker (SPKR)', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(13861, 199, '213.01 - 001 - 003', 'Speaker (SPKR)', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13862, 199, '213.01 - 001 - 004', 'Speaker (SPKR)', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13863, 199, '213.01 - 001 - 005', 'Speaker (SPKR)', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Gudang', NULL, 'Dipinjam', NULL),
(13864, 199, '213.01 - 001 - 006', 'Speaker (SPKR)', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13865, 199, '213.01 - 001 - 007', 'Speaker (SPKR)', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13866, 199, '213.01 - 001 - 008', 'Speaker (SPKR)', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13867, 199, '213.01 - 001 - 009', 'Speaker (SPKR)', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13868, 199, '213.01 - 001 - 010', 'Speaker (SPKR)', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13869, 200, '210.05 - 001 - 001', 'Spiker (TOA)', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13870, 200, '210.05 - 001 - 002', 'Spiker (TOA)', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13871, 200, '210.05 - 001 - 003', 'Spiker (TOA)', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13872, 200, '210.05 - 001 - 004', 'Spiker (TOA)', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13873, 200, '210.05 - 001 - 005', 'Spiker (TOA)', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13874, 200, '210.05 - 001 - 006', 'Spiker (TOA)', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13875, 200, '210.05 - 001 - 007', 'Spiker (TOA)', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13876, 200, '210.05 - 001 - 008', 'Spiker (TOA)', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13877, 201, '214.01 - 001 - 001', 'Toa / Pengeras Suara (TPS)', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13878, 202, '210.06 - 001 - 001', 'Wifi', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13879, 202, '210.06 - 001 - 002', 'Wifi', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13880, 202, '210.06 - 001 - 003', 'Wifi', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13881, 203, '220.01 - 001 - 001', 'Colokan AC', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13882, 203, '220.01 - 001 - 002', 'Colokan AC', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13883, 203, '220.01 - 001 - 003', 'Colokan AC', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13884, 203, '220.01 - 001 - 004', 'Colokan AC', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13885, 203, '220.01 - 001 - 005', 'Colokan AC', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13886, 203, '220.01 - 001 - 006', 'Colokan AC', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13887, 203, '220.01 - 001 - 007', 'Colokan AC', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13888, 203, '220.01 - 001 - 008', 'Colokan AC', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13889, 203, '220.01 - 001 - 009', 'Colokan AC', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13890, 203, '220.01 - 001 - 010', 'Colokan AC', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13891, 203, '220.01 - 001 - 011', 'Colokan AC', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13892, 203, '220.01 - 001 - 012', 'Colokan AC', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13893, 203, '220.01 - 001 - 013', 'Colokan AC', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13894, 203, '220.01 - 001 - 014', 'Colokan AC', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13895, 203, '220.01 - 001 - 015', 'Colokan AC', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13896, 203, '220.01 - 001 - 016', 'Colokan AC', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13897, 203, '220.01 - 001 - 017', 'Colokan AC', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13898, 203, '220.01 - 001 - 018', 'Colokan AC', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13899, 203, '220.01 - 001 - 019', 'Colokan AC', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13900, 203, '220.01 - 001 - 020', 'Colokan AC', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13901, 203, '220.01 - 001 - 021', 'Colokan AC', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13902, 203, '220.01 - 001 - 022', 'Colokan AC', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13903, 203, '220.01 - 001 - 023', 'Colokan AC', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13904, 203, '220.01 - 001 - 024', 'Colokan AC', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13905, 203, '220.01 - 001 - 025', 'Colokan AC', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13906, 203, '220.01 - 001 - 026', 'Colokan AC', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13907, 203, '220.01 - 001 - 027', 'Colokan AC', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13908, 203, '220.01 - 001 - 028', 'Colokan AC', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13909, 203, '220.01 - 001 - 029', 'Colokan AC', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13910, 203, '220.01 - 001 - 030', 'Colokan AC', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13911, 203, '220.01 - 001 - 031', 'Colokan AC', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13912, 203, '220.01 - 001 - 032', 'Colokan AC', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13913, 204, '220.02 - 001 - 001', 'Colokan Listrik', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13914, 204, '220.02 - 001 - 002', 'Colokan Listrik', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13915, 204, '220.02 - 001 - 003', 'Colokan Listrik', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13916, 204, '220.02 - 001 - 004', 'Colokan Listrik', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13917, 204, '220.02 - 001 - 005', 'Colokan Listrik', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13918, 204, '220.02 - 001 - 006', 'Colokan Listrik', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13919, 204, '220.02 - 001 - 007', 'Colokan Listrik', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13920, 204, '220.02 - 001 - 008', 'Colokan Listrik', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13921, 204, '220.02 - 001 - 009', 'Colokan Listrik', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13922, 204, '220.02 - 001 - 010', 'Colokan Listrik', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13923, 204, '220.02 - 001 - 011', 'Colokan Listrik', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13924, 204, '220.02 - 001 - 012', 'Colokan Listrik', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13925, 204, '220.02 - 001 - 013', 'Colokan Listrik', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13926, 204, '220.02 - 001 - 014', 'Colokan Listrik', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13927, 204, '220.02 - 001 - 015', 'Colokan Listrik', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13928, 204, '220.02 - 001 - 016', 'Colokan Listrik', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13929, 204, '220.02 - 001 - 017', 'Colokan Listrik', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13930, 204, '220.02 - 001 - 018', 'Colokan Listrik', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13931, 204, '220.02 - 001 - 019', 'Colokan Listrik', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13932, 204, '220.02 - 001 - 020', 'Colokan Listrik', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13933, 204, '220.02 - 001 - 021', 'Colokan Listrik', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13934, 204, '220.02 - 001 - 022', 'Colokan Listrik', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13935, 204, '220.02 - 001 - 023', 'Colokan Listrik', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13936, 204, '220.02 - 001 - 024', 'Colokan Listrik', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13937, 204, '220.02 - 001 - 025', 'Colokan Listrik', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13938, 204, '220.02 - 001 - 026', 'Colokan Listrik', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13939, 204, '220.02 - 001 - 027', 'Colokan Listrik', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13940, 204, '220.02 - 001 - 028', 'Colokan Listrik', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13941, 204, '220.02 - 001 - 029', 'Colokan Listrik', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13942, 204, '220.02 - 001 - 030', 'Colokan Listrik', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13943, 204, '220.02 - 001 - 031', 'Colokan Listrik', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13944, 204, '220.02 - 001 - 032', 'Colokan Listrik', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13945, 204, '220.02 - 001 - 033', 'Colokan Listrik', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13946, 204, '220.02 - 001 - 034', 'Colokan Listrik', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13947, 204, '220.02 - 001 - 035', 'Colokan Listrik', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13948, 204, '220.02 - 001 - 036', 'Colokan Listrik', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13949, 204, '220.02 - 001 - 037', 'Colokan Listrik', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13950, 204, '220.02 - 001 - 038', 'Colokan Listrik', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13951, 204, '220.02 - 001 - 039', 'Colokan Listrik', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13952, 204, '220.02 - 001 - 040', 'Colokan Listrik', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13953, 204, '220.02 - 001 - 041', 'Colokan Listrik', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13954, 204, '220.02 - 001 - 042', 'Colokan Listrik', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13955, 204, '220.02 - 001 - 043', 'Colokan Listrik', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13956, 204, '220.02 - 001 - 044', 'Colokan Listrik', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13957, 204, '220.02 - 001 - 045', 'Colokan Listrik', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13958, 204, '220.02 - 001 - 046', 'Colokan Listrik', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13959, 204, '220.02 - 001 - 047', 'Colokan Listrik', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13960, 204, '220.02 - 001 - 048', 'Colokan Listrik', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13961, 204, '220.02 - 001 - 049', 'Colokan Listrik', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13962, 204, '220.02 - 001 - 050', 'Colokan Listrik', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13963, 204, '220.02 - 001 - 051', 'Colokan Listrik', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13964, 204, '220.02 - 001 - 052', 'Colokan Listrik', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13965, 204, '220.02 - 001 - 053', 'Colokan Listrik', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13966, 204, '220.02 - 001 - 054', 'Colokan Listrik', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13967, 204, '220.02 - 001 - 055', 'Colokan Listrik', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13968, 204, '220.02 - 001 - 056', 'Colokan Listrik', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13969, 204, '220.02 - 001 - 057', 'Colokan Listrik', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13970, 204, '220.02 - 001 - 058', 'Colokan Listrik', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13971, 204, '220.02 - 001 - 059', 'Colokan Listrik', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13972, 204, '220.02 - 001 - 060', 'Colokan Listrik', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13973, 204, '220.02 - 001 - 061', 'Colokan Listrik', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13974, 204, '220.02 - 001 - 062', 'Colokan Listrik', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13975, 204, '220.02 - 001 - 063', 'Colokan Listrik', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13976, 204, '220.02 - 001 - 064', 'Colokan Listrik', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13977, 204, '220.02 - 001 - 065', 'Colokan Listrik', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13978, 204, '220.02 - 001 - 066', 'Colokan Listrik', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13979, 204, '220.02 - 001 - 067', 'Colokan Listrik', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13980, 204, '220.02 - 001 - 068', 'Colokan Listrik', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13981, 204, '220.02 - 001 - 069', 'Colokan Listrik', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13982, 204, '220.02 - 001 - 070', 'Colokan Listrik', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13983, 204, '220.02 - 001 - 071', 'Colokan Listrik', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13984, 204, '220.02 - 001 - 072', 'Colokan Listrik', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13985, 204, '220.02 - 001 - 073', 'Colokan Listrik', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13986, 204, '220.02 - 001 - 074', 'Colokan Listrik', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13987, 204, '220.02 - 001 - 075', 'Colokan Listrik', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13988, 204, '220.02 - 001 - 076', 'Colokan Listrik', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13989, 204, '220.02 - 001 - 077', 'Colokan Listrik', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13990, 205, '220.03 - 001 - 001', 'Colokan T', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13991, 205, '220.03 - 001 - 002', 'Colokan T', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13992, 205, '220.03 - 001 - 003', 'Colokan T', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13993, 206, '220.04 - 001 - 001', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13994, 206, '220.04 - 001 - 002', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13995, 206, '220.04 - 001 - 003', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13996, 206, '220.04 - 001 - 004', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13997, 206, '220.04 - 001 - 005', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13998, 206, '220.04 - 001 - 006', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(13999, 206, '220.04 - 001 - 007', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14000, 206, '220.04 - 001 - 008', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14001, 206, '220.04 - 001 - 009', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14002, 206, '220.04 - 001 - 010', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14003, 206, '220.04 - 001 - 011', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14004, 206, '220.04 - 001 - 012', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14005, 206, '220.04 - 001 - 013', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14006, 206, '220.04 - 001 - 014', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14007, 206, '220.04 - 001 - 015', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14008, 206, '220.04 - 001 - 016', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14009, 206, '220.04 - 001 - 017', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14010, 206, '220.04 - 001 - 018', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14011, 206, '220.04 - 001 - 019', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14012, 206, '220.04 - 001 - 020', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14013, 206, '220.04 - 001 - 021', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14014, 206, '220.04 - 001 - 022', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14015, 206, '220.04 - 001 - 023', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14016, 206, '220.04 - 001 - 024', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14017, 206, '220.04 - 001 - 025', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14018, 206, '220.04 - 001 - 026', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14019, 206, '220.04 - 001 - 027', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14020, 206, '220.04 - 001 - 028', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14021, 206, '220.04 - 001 - 029', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14022, 206, '220.04 - 001 - 030', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14023, 206, '220.04 - 001 - 031', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14024, 206, '220.04 - 001 - 032', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14025, 206, '220.04 - 001 - 033', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14026, 206, '220.04 - 001 - 034', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14027, 206, '220.04 - 001 - 035', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14028, 206, '220.04 - 001 - 036', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14029, 206, '220.04 - 001 - 037', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14030, 206, '220.04 - 001 - 038', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14031, 206, '220.04 - 001 - 039', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14032, 206, '220.04 - 001 - 040', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14033, 206, '220.04 - 001 - 041', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14034, 206, '220.04 - 001 - 042', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14035, 206, '220.04 - 001 - 043', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14036, 206, '220.04 - 001 - 044', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14037, 206, '220.04 - 001 - 045', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14038, 206, '220.04 - 001 - 046', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14039, 206, '220.04 - 001 - 047', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14040, 206, '220.04 - 001 - 048', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14041, 206, '220.04 - 001 - 049', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14042, 206, '220.04 - 001 - 050', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14043, 206, '220.04 - 001 - 051', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14044, 206, '220.04 - 001 - 052', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14045, 206, '220.04 - 001 - 053', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14046, 206, '220.04 - 001 - 054', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14047, 206, '220.04 - 001 - 055', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14048, 206, '220.04 - 001 - 056', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14049, 206, '220.04 - 001 - 057', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14050, 206, '220.04 - 001 - 058', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14051, 206, '220.04 - 001 - 059', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14052, 206, '220.04 - 001 - 060', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14053, 206, '220.04 - 001 - 061', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14054, 206, '220.04 - 001 - 062', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14055, 206, '220.04 - 001 - 063', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14056, 206, '220.04 - 001 - 064', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14057, 206, '220.04 - 001 - 065', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14058, 206, '220.04 - 001 - 066', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14059, 206, '220.04 - 001 - 067', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14060, 206, '220.04 - 001 - 068', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14061, 206, '220.04 - 001 - 069', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14062, 206, '220.04 - 001 - 070', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14063, 206, '220.04 - 001 - 071', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14064, 206, '220.04 - 001 - 072', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14065, 206, '220.04 - 001 - 073', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14066, 206, '220.04 - 001 - 074', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14067, 206, '220.04 - 001 - 075', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14068, 206, '220.04 - 001 - 076', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14069, 206, '220.04 - 001 - 077', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14070, 206, '220.04 - 001 - 078', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14071, 206, '220.04 - 001 - 079', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14072, 206, '220.04 - 001 - 080', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14073, 206, '220.04 - 001 - 081', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14074, 206, '220.04 - 001 - 082', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14075, 206, '220.04 - 001 - 083', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14076, 206, '220.04 - 001 - 084', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14077, 206, '220.04 - 001 - 085', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14078, 206, '220.04 - 001 - 086', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14079, 206, '220.04 - 001 - 087', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14080, 206, '220.04 - 001 - 088', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14081, 206, '220.04 - 001 - 089', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14082, 206, '220.04 - 001 - 090', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14083, 206, '220.04 - 001 - 091', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14084, 206, '220.04 - 001 - 092', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL);
INSERT INTO `barang_detail` (`id`, `id_master`, `kode_barang`, `nama_barang`, `klasifikasi`, `tanggal_perolehan`, `lokasi`, `lokasi_asal`, `status`, `keterangan`) VALUES
(14085, 206, '220.04 - 001 - 093', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14086, 206, '220.04 - 001 - 094', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14087, 206, '220.04 - 001 - 095', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14088, 206, '220.04 - 001 - 096', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14089, 206, '220.04 - 001 - 097', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14090, 206, '220.04 - 001 - 098', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14091, 206, '220.04 - 001 - 099', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14092, 206, '220.04 - 001 - 100', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14093, 206, '220.04 - 001 - 101', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14094, 206, '220.04 - 001 - 102', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14095, 206, '220.04 - 001 - 103', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14096, 206, '220.04 - 001 - 104', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14097, 206, '220.04 - 001 - 105', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14098, 206, '220.04 - 001 - 106', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14099, 206, '220.04 - 001 - 107', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14100, 206, '220.04 - 001 - 108', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14101, 206, '220.04 - 001 - 109', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14102, 206, '220.04 - 001 - 110', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14103, 206, '220.04 - 001 - 111', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14104, 206, '220.04 - 001 - 112', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14105, 206, '220.04 - 001 - 113', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14106, 206, '220.04 - 001 - 114', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14107, 206, '220.04 - 001 - 115', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14108, 206, '220.04 - 001 - 116', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14109, 206, '220.04 - 001 - 117', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14110, 206, '220.04 - 001 - 118', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14111, 206, '220.04 - 001 - 119', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14112, 206, '220.04 - 001 - 120', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14113, 206, '220.04 - 001 - 121', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14114, 206, '220.04 - 001 - 122', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14115, 206, '220.04 - 001 - 123', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14116, 206, '220.04 - 001 - 124', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14117, 206, '220.04 - 001 - 125', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14118, 206, '220.04 - 001 - 126', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14119, 206, '220.04 - 001 - 127', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14120, 206, '220.04 - 001 - 128', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14121, 206, '220.04 - 001 - 129', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14122, 206, '220.04 - 001 - 130', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14123, 206, '220.04 - 001 - 131', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14124, 206, '220.04 - 001 - 132', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14125, 206, '220.04 - 001 - 133', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14126, 206, '220.04 - 001 - 134', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14127, 206, '220.04 - 001 - 135', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14128, 206, '220.04 - 001 - 136', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14129, 206, '220.04 - 001 - 137', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14130, 206, '220.04 - 001 - 138', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14131, 206, '220.04 - 001 - 139', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14132, 206, '220.04 - 001 - 140', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14133, 206, '220.04 - 001 - 141', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14134, 206, '220.04 - 001 - 142', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14135, 206, '220.04 - 001 - 143', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14136, 206, '220.04 - 001 - 144', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14137, 206, '220.04 - 001 - 145', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14138, 206, '220.04 - 001 - 146', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14139, 206, '220.04 - 001 - 147', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14140, 206, '220.04 - 001 - 148', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14141, 206, '220.04 - 001 - 149', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14142, 207, '220.05 - 001 - 001', 'Terminal', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14143, 207, '220.05 - 001 - 002', 'Terminal', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14144, 207, '220.05 - 001 - 003', 'Terminal', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14145, 207, '220.05 - 001 - 004', 'Terminal', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14146, 207, '220.05 - 001 - 005', 'Terminal', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14147, 207, '220.05 - 001 - 006', 'Terminal', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14148, 207, '220.05 - 001 - 007', 'Terminal', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14149, 207, '220.05 - 001 - 008', 'Terminal', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14150, 207, '220.05 - 001 - 009', 'Terminal', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14151, 207, '220.05 - 001 - 010', 'Terminal', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14152, 207, '220.05 - 001 - 011', 'Terminal', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14153, 207, '220.05 - 001 - 012', 'Terminal', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14154, 207, '220.05 - 001 - 013', 'Terminal', 'PERALATAN LISTRIK', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14155, 208, '230.01 - 001 - 001', 'Alat Tulis Sekolah', 'PERALATAN KANTOR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14156, 209, '230.02 - 001 - 001', 'Box Ukuran Sedang', 'PERALATAN KANTOR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14157, 210, '230.03 - 001 - 001', 'Komputer', 'PERALATAN KANTOR', '2025-07-07', 'Gudang', NULL, 'Baru', ''),
(14158, 210, '230.03 - 001 - 002', 'Komputer', 'PERALATAN KANTOR', '2025-07-07', 'Gudang', NULL, 'Baru', ''),
(14159, 210, '230.03 - 001 - 003', 'Komputer', 'PERALATAN KANTOR', '2025-07-07', 'Gudang', NULL, 'Baru', ''),
(14160, 210, '230.03 - 001 - 004', 'Komputer', 'PERALATAN KANTOR', '2025-07-07', 'Gudang', NULL, 'Baru', ''),
(14161, 210, '230.03 - 001 - 005', 'Komputer', 'PERALATAN KANTOR', '2025-07-07', 'Gudang', NULL, 'Baru', ''),
(14162, 210, '230.03 - 001 - 006', 'Komputer', 'PERALATAN KANTOR', '2025-07-07', 'Gudang', NULL, 'Baru', ''),
(14163, 210, '230.03 - 001 - 007', 'Komputer', 'PERALATAN KANTOR', '2025-07-07', 'Gudang', NULL, 'Baru', ''),
(14164, 210, '230.03 - 001 - 008', 'Komputer', 'PERALATAN KANTOR', '2025-07-07', 'Gudang', NULL, 'Baru', ''),
(14165, 210, '230.03 - 001 - 009', 'Komputer', 'PERALATAN KANTOR', '2025-07-07', 'Gudang', NULL, 'Baru', ''),
(14166, 210, '230.03 - 001 - 010', 'Komputer', 'PERALATAN KANTOR', '2025-07-07', 'Gudang', NULL, 'Baru', ''),
(14167, 210, '230.03 - 001 - 011', 'Komputer', 'PERALATAN KANTOR', '2025-07-07', 'Gudang', NULL, 'Baru', ''),
(14168, 210, '230.03 - 001 - 012', 'Komputer', 'PERALATAN KANTOR', '2025-07-07', 'Gudang', NULL, 'Baru', ''),
(14169, 210, '230.03 - 001 - 013', 'Komputer', 'PERALATAN KANTOR', '2025-07-07', 'Gudang', NULL, 'Baru', ''),
(14170, 210, '230.03 - 001 - 014', 'Komputer', 'PERALATAN KANTOR', '2025-07-07', 'Gudang', NULL, 'Baru', ''),
(14171, 210, '230.03 - 001 - 015', 'Komputer', 'PERALATAN KANTOR', '2025-07-07', 'Gudang', NULL, 'Baru', ''),
(14172, 210, '230.03 - 001 - 016', 'Komputer', 'PERALATAN KANTOR', '2025-07-07', 'Gudang', NULL, 'Baru', ''),
(14173, 210, '230.03 - 001 - 017', 'Komputer', 'PERALATAN KANTOR', '2025-07-07', 'Gudang', NULL, 'Baru', ''),
(14174, 210, '230.03 - 001 - 018', 'Komputer', 'PERALATAN KANTOR', '2025-07-07', 'Gudang', NULL, 'Baru', ''),
(14175, 210, '230.03 - 001 - 019', 'Komputer', 'PERALATAN KANTOR', '2025-07-07', 'Gudang', NULL, 'Baru', ''),
(14176, 210, '230.03 - 001 - 020', 'Komputer', 'PERALATAN KANTOR', '2025-07-07', 'Gudang', NULL, 'Baru', ''),
(14177, 210, '230.03 - 001 - 021', 'Komputer', 'PERALATAN KANTOR', '2025-07-07', 'Gudang', NULL, 'Baru', ''),
(14178, 210, '230.03 - 001 - 022', 'Komputer', 'PERALATAN KANTOR', '2025-07-07', 'Gudang', NULL, 'Baru', ''),
(14179, 210, '230.03 - 001 - 023', 'Komputer', 'PERALATAN KANTOR', '2025-07-07', 'Gudang', NULL, 'Baru', ''),
(14180, 210, '230.03 - 001 - 024', 'Komputer', 'PERALATAN KANTOR', '2025-07-07', 'Gudang', NULL, 'Baru', ''),
(14181, 210, '230.03 - 001 - 025', 'Komputer', 'PERALATAN KANTOR', '2025-07-07', 'Gudang', NULL, 'Baru', ''),
(14182, 210, '230.03 - 001 - 026', 'Komputer', 'PERALATAN KANTOR', '2025-07-07', 'Gudang', NULL, 'Baru', ''),
(14183, 210, '230.03 - 001 - 027', 'Komputer', 'PERALATAN KANTOR', '2025-07-07', 'Gudang', NULL, 'Baru', ''),
(14184, 210, '230.03 - 001 - 028', 'Komputer', 'PERALATAN KANTOR', '2025-07-07', 'Gudang', NULL, 'Baru', ''),
(14185, 210, '230.03 - 001 - 029', 'Komputer', 'PERALATAN KANTOR', '2025-07-07', 'Gudang', NULL, 'Baru', ''),
(14186, 210, '230.03 - 001 - 030', 'Komputer', 'PERALATAN KANTOR', '2025-07-07', 'Gudang', NULL, 'Baru', ''),
(14187, 210, '230.03 - 001 - 031', 'Komputer', 'PERALATAN KANTOR', '2025-07-07', 'Gudang', NULL, 'Baru', ''),
(14188, 210, '230.03 - 001 - 032', 'Komputer', 'PERALATAN KANTOR', '2025-07-07', 'Gudang', NULL, 'Baru', ''),
(14189, 210, '230.03 - 001 - 033', 'Komputer', 'PERALATAN KANTOR', '2025-07-07', 'Gudang', NULL, 'Baru', ''),
(14190, 210, '230.03 - 001 - 034', 'Komputer', 'PERALATAN KANTOR', '2025-07-07', 'Gudang', NULL, 'Baru', ''),
(14191, 210, '230.03 - 001 - 035', 'Komputer', 'PERALATAN KANTOR', '2025-07-07', 'Gudang', NULL, 'Baru', ''),
(14192, 210, '230.03 - 001 - 036', 'Komputer', 'PERALATAN KANTOR', '2025-07-07', 'Gudang', NULL, 'Baru', ''),
(14193, 210, '230.03 - 001 - 037', 'Komputer', 'PERALATAN KANTOR', '2025-07-07', 'Gudang', NULL, 'Baru', ''),
(14194, 210, '230.03 - 001 - 038', 'Komputer', 'PERALATAN KANTOR', '2025-07-07', 'Gudang', NULL, 'Baru', ''),
(14195, 210, '230.03 - 001 - 039', 'Komputer', 'PERALATAN KANTOR', '2025-07-07', 'Gudang', NULL, 'Baru', ''),
(14196, 210, '230.03 - 001 - 040', 'Komputer', 'PERALATAN KANTOR', '2025-07-07', 'Gudang', NULL, 'Baru', ''),
(14197, 210, '230.03 - 001 - 041', 'Komputer', 'PERALATAN KANTOR', '2025-07-07', 'Laboratorium Komputer', NULL, 'Aktif Digunakan', ''),
(14198, 210, '230.03 - 001 - 042', 'Komputer', 'PERALATAN KANTOR', '2025-07-07', 'Laboratorium Komputer', NULL, 'Aktif Digunakan', ''),
(14199, 210, '230.03 - 001 - 043', 'Komputer', 'PERALATAN KANTOR', '2025-07-07', 'Laboratorium Komputer', NULL, 'Aktif Digunakan', ''),
(14200, 210, '230.03 - 001 - 044', 'Komputer', 'PERALATAN KANTOR', '2025-07-07', 'Laboratorium Komputer', NULL, 'Aktif Digunakan', ''),
(14201, 210, '230.03 - 001 - 045', 'Komputer', 'PERALATAN KANTOR', '2025-07-07', 'Laboratorium Komputer', NULL, 'Aktif Digunakan', ''),
(14202, 210, '230.03 - 001 - 046', 'Komputer', 'PERALATAN KANTOR', '2025-07-07', 'Laboratorium Komputer', NULL, 'Aktif Digunakan', ''),
(14203, 210, '230.03 - 001 - 047', 'Komputer', 'PERALATAN KANTOR', '2025-07-07', 'Laboratorium Komputer', NULL, 'Aktif Digunakan', ''),
(14204, 210, '230.03 - 001 - 048', 'Komputer', 'PERALATAN KANTOR', '2025-07-07', 'Laboratorium Komputer', NULL, 'Aktif Digunakan', ''),
(14205, 210, '230.03 - 001 - 049', 'Komputer', 'PERALATAN KANTOR', '2025-07-07', 'Laboratorium Komputer', NULL, 'Aktif Digunakan', ''),
(14206, 210, '230.03 - 001 - 050', 'Komputer', 'PERALATAN KANTOR', '2025-07-07', 'Laboratorium Komputer', NULL, 'Aktif Digunakan', ''),
(14207, 210, '230.03 - 001 - 051', 'Komputer', 'PERALATAN KANTOR', '2025-07-07', 'Laboratorium Komputer', NULL, 'Aktif Digunakan', ''),
(14208, 210, '230.03 - 001 - 052', 'Komputer', 'PERALATAN KANTOR', '2025-07-07', 'Laboratorium Komputer', NULL, 'Aktif Digunakan', ''),
(14209, 210, '230.03 - 001 - 053', 'Komputer', 'PERALATAN KANTOR', '2025-07-07', 'Laboratorium Komputer', NULL, 'Aktif Digunakan', ''),
(14210, 210, '230.03 - 001 - 054', 'Komputer', 'PERALATAN KANTOR', '2025-07-07', 'Laboratorium Komputer', NULL, 'Aktif Digunakan', ''),
(14211, 210, '230.03 - 001 - 055', 'Komputer', 'PERALATAN KANTOR', '2025-07-07', 'Laboratorium Komputer', NULL, 'Aktif Digunakan', ''),
(14212, 210, '230.03 - 001 - 056', 'Komputer', 'PERALATAN KANTOR', '2025-07-07', 'Laboratorium Komputer', NULL, 'Aktif Digunakan', ''),
(14213, 210, '230.03 - 001 - 057', 'Komputer', 'PERALATAN KANTOR', '2025-07-07', 'Laboratorium Komputer', NULL, 'Aktif Digunakan', ''),
(14214, 210, '230.03 - 001 - 058', 'Komputer', 'PERALATAN KANTOR', '2025-07-07', 'Laboratorium Komputer', NULL, 'Aktif Digunakan', ''),
(14215, 210, '230.03 - 001 - 059', 'Komputer', 'PERALATAN KANTOR', '2025-07-07', 'Laboratorium Komputer', NULL, 'Aktif Digunakan', ''),
(14216, 210, '230.03 - 001 - 060', 'Komputer', 'PERALATAN KANTOR', '2025-07-07', 'Laboratorium Komputer', NULL, 'Aktif Digunakan', ''),
(14217, 210, '230.03 - 001 - 061', 'Komputer', 'PERALATAN KANTOR', '2025-07-07', 'Laboratorium Komputer', NULL, 'Aktif Digunakan', ''),
(14218, 210, '230.03 - 001 - 062', 'Komputer', 'PERALATAN KANTOR', '2025-07-07', 'Laboratorium Komputer', NULL, 'Aktif Digunakan', ''),
(14219, 210, '230.03 - 001 - 063', 'Komputer', 'PERALATAN KANTOR', '2025-07-07', 'Laboratorium Komputer', NULL, 'Aktif Digunakan', ''),
(14220, 211, '230.04 - 001 - 001', 'LCD', 'PERALATAN KANTOR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14221, 211, '230.04 - 001 - 002', 'LCD', 'PERALATAN KANTOR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14222, 211, '230.04 - 001 - 003', 'LCD', 'PERALATAN KANTOR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14223, 211, '230.04 - 001 - 004', 'LCD', 'PERALATAN KANTOR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14224, 211, '230.04 - 001 - 005', 'LCD', 'PERALATAN KANTOR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14225, 211, '230.04 - 001 - 006', 'LCD', 'PERALATAN KANTOR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14226, 211, '230.04 - 001 - 007', 'LCD', 'PERALATAN KANTOR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14227, 211, '230.04 - 001 - 008', 'LCD', 'PERALATAN KANTOR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14228, 211, '230.04 - 001 - 009', 'LCD', 'PERALATAN KANTOR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14229, 211, '230.04 - 001 - 010', 'LCD', 'PERALATAN KANTOR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14230, 211, '230.04 - 001 - 011', 'LCD', 'PERALATAN KANTOR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14231, 211, '230.04 - 001 - 012', 'LCD', 'PERALATAN KANTOR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14232, 211, '230.04 - 001 - 013', 'LCD', 'PERALATAN KANTOR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14233, 211, '230.04 - 001 - 014', 'LCD', 'PERALATAN KANTOR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14234, 211, '230.04 - 001 - 015', 'LCD', 'PERALATAN KANTOR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14235, 212, '230.05 - 001 - 001', 'Papan White Board', 'PERALATAN KANTOR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14236, 212, '230.05 - 001 - 002', 'Papan White Board', 'PERALATAN KANTOR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14237, 212, '230.05 - 001 - 003', 'Papan White Board', 'PERALATAN KANTOR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14238, 212, '230.05 - 001 - 004', 'Papan White Board', 'PERALATAN KANTOR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14239, 212, '230.05 - 001 - 005', 'Papan White Board', 'PERALATAN KANTOR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14240, 212, '230.05 - 001 - 006', 'Papan White Board', 'PERALATAN KANTOR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14241, 212, '230.05 - 001 - 007', 'Papan White Board', 'PERALATAN KANTOR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14242, 212, '230.05 - 001 - 008', 'Papan White Board', 'PERALATAN KANTOR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14243, 212, '230.05 - 001 - 009', 'Papan White Board', 'PERALATAN KANTOR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14244, 212, '230.05 - 001 - 010', 'Papan White Board', 'PERALATAN KANTOR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14245, 212, '230.05 - 001 - 011', 'Papan White Board', 'PERALATAN KANTOR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14246, 212, '230.05 - 001 - 012', 'Papan White Board', 'PERALATAN KANTOR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14247, 212, '230.05 - 001 - 013', 'Papan White Board', 'PERALATAN KANTOR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14248, 212, '230.05 - 001 - 014', 'Papan White Board', 'PERALATAN KANTOR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14249, 212, '230.05 - 001 - 015', 'Papan White Board', 'PERALATAN KANTOR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14250, 212, '230.05 - 001 - 016', 'Papan White Board', 'PERALATAN KANTOR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14251, 213, '230.06 - 001 - 001', 'Printer', 'PERALATAN KANTOR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14252, 213, '230.06 - 001 - 002', 'Printer', 'PERALATAN KANTOR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14253, 213, '230.06 - 001 - 003', 'Printer', 'PERALATAN KANTOR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14254, 213, '230.06 - 001 - 004', 'Printer', 'PERALATAN KANTOR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14255, 213, '230.06 - 001 - 005', 'Printer', 'PERALATAN KANTOR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14256, 213, '230.06 - 001 - 006', 'Printer', 'PERALATAN KANTOR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14257, 213, '230.06 - 001 - 007', 'Printer', 'PERALATAN KANTOR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14258, 213, '230.06 - 001 - 008', 'Printer', 'PERALATAN KANTOR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14259, 213, '230.06 - 001 - 009', 'Printer', 'PERALATAN KANTOR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14260, 213, '230.06 - 001 - 010', 'Printer', 'PERALATAN KANTOR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14261, 214, '230.07 - 001 - 001', 'Tiang Bendera', 'PERALATAN KANTOR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14262, 214, '230.07 - 001 - 002', 'Tiang Bendera', 'PERALATAN KANTOR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14263, 214, '230.07 - 001 - 003', 'Tiang Bendera', 'PERALATAN KANTOR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14264, 215, '240.01 - 001 - 001', 'Dulang', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14265, 215, '240.01 - 001 - 002', 'Dulang', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14266, 215, '240.01 - 001 - 003', 'Dulang', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14267, 215, '240.01 - 001 - 004', 'Dulang', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14268, 215, '240.01 - 001 - 005', 'Dulang', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14269, 215, '240.01 - 001 - 006', 'Dulang', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14270, 215, '240.01 - 001 - 007', 'Dulang', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14271, 215, '240.01 - 001 - 008', 'Dulang', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14272, 215, '240.01 - 001 - 009', 'Dulang', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14273, 215, '240.01 - 001 - 010', 'Dulang', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14274, 215, '240.01 - 001 - 011', 'Dulang', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14275, 216, '240.02 - 001 - 001', 'Garpu', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14276, 217, '240.03 - 001 - 001', 'Gelas', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14277, 217, '240.03 - 001 - 002', 'Gelas', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14278, 217, '240.03 - 001 - 003', 'Gelas', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14279, 217, '240.03 - 001 - 004', 'Gelas', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14280, 218, '240.04 - 001 - 001', 'Gentong Ukuran Kecil', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14281, 219, '240.05 - 001 - 001', 'Jam Dinding', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14282, 219, '240.05 - 001 - 002', 'Jam Dinding', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14283, 219, '240.05 - 001 - 003', 'Jam Dinding', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14284, 219, '240.05 - 001 - 004', 'Jam Dinding', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14285, 219, '240.05 - 001 - 005', 'Jam Dinding', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14286, 220, '240.06 - 001 - 001', 'Kain Meja', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14287, 220, '240.06 - 001 - 002', 'Kain Meja', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14288, 220, '240.06 - 001 - 003', 'Kain Meja', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14289, 220, '240.06 - 001 - 004', 'Kain Meja', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14290, 220, '240.06 - 001 - 005', 'Kain Meja', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14291, 220, '240.06 - 001 - 006', 'Kain Meja', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14292, 220, '240.06 - 001 - 007', 'Kain Meja', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14293, 220, '240.06 - 001 - 008', 'Kain Meja', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14294, 220, '240.06 - 001 - 009', 'Kain Meja', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14295, 220, '240.06 - 001 - 010', 'Kain Meja', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14296, 220, '240.06 - 001 - 011', 'Kain Meja', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14297, 221, '240.07 - 001 - 001', 'Kemoceng', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14298, 221, '240.07 - 001 - 002', 'Kemoceng', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14299, 221, '240.07 - 001 - 003', 'Kemoceng', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14300, 221, '240.07 - 001 - 004', 'Kemoceng', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14301, 221, '240.07 - 001 - 005', 'Kemoceng', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14302, 221, '240.07 - 001 - 006', 'Kemoceng', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14303, 221, '240.07 - 001 - 007', 'Kemoceng', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14304, 221, '240.07 - 001 - 008', 'Kemoceng', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14305, 221, '240.07 - 001 - 009', 'Kemoceng', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14306, 221, '240.07 - 001 - 010', 'Kemoceng', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14307, 221, '240.07 - 001 - 011', 'Kemoceng', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14308, 222, '240.08 - 001 - 001', 'Keranjang Aqua Gelas', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14309, 222, '240.08 - 001 - 002', 'Keranjang Aqua Gelas', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14310, 223, '240.09 - 001 - 001', 'Keset Kaki', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14311, 223, '240.09 - 001 - 002', 'Keset Kaki', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14312, 223, '240.09 - 001 - 003', 'Keset Kaki', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14313, 223, '240.09 - 001 - 004', 'Keset Kaki', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14314, 223, '240.09 - 001 - 005', 'Keset Kaki', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14315, 223, '240.09 - 001 - 006', 'Keset Kaki', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14316, 223, '240.09 - 001 - 007', 'Keset Kaki', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14317, 223, '240.09 - 001 - 008', 'Keset Kaki', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14318, 223, '240.09 - 001 - 009', 'Keset Kaki', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14319, 223, '240.09 - 001 - 010', 'Keset Kaki', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14320, 223, '240.09 - 001 - 011', 'Keset Kaki', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14321, 223, '240.09 - 001 - 012', 'Keset Kaki', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14322, 223, '240.09 - 001 - 013', 'Keset Kaki', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14323, 223, '240.09 - 001 - 014', 'Keset Kaki', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14324, 223, '240.09 - 001 - 015', 'Keset Kaki', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14325, 223, '240.09 - 001 - 016', 'Keset Kaki', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14326, 223, '240.09 - 001 - 017', 'Keset Kaki', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14327, 223, '240.09 - 001 - 018', 'Keset Kaki', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14328, 223, '240.09 - 001 - 019', 'Keset Kaki', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14329, 223, '240.09 - 001 - 020', 'Keset Kaki', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14330, 223, '240.09 - 001 - 021', 'Keset Kaki', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14331, 223, '240.09 - 001 - 022', 'Keset Kaki', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14332, 223, '240.09 - 001 - 023', 'Keset Kaki', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14333, 223, '240.09 - 001 - 024', 'Keset Kaki', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14334, 223, '240.09 - 001 - 025', 'Keset Kaki', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14335, 223, '240.09 - 001 - 026', 'Keset Kaki', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14336, 223, '240.09 - 001 - 027', 'Keset Kaki', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14337, 223, '240.09 - 001 - 028', 'Keset Kaki', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14338, 223, '240.09 - 001 - 029', 'Keset Kaki', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14339, 223, '240.09 - 001 - 030', 'Keset Kaki', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14340, 223, '240.09 - 001 - 031', 'Keset Kaki', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14341, 223, '240.09 - 001 - 032', 'Keset Kaki', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14342, 223, '240.09 - 001 - 033', 'Keset Kaki', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14343, 223, '240.09 - 001 - 034', 'Keset Kaki', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14344, 223, '240.09 - 001 - 035', 'Keset Kaki', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14345, 223, '240.09 - 001 - 036', 'Keset Kaki', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14346, 223, '240.09 - 001 - 037', 'Keset Kaki', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14347, 223, '240.09 - 001 - 038', 'Keset Kaki', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14348, 223, '240.09 - 001 - 039', 'Keset Kaki', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14349, 223, '240.09 - 001 - 040', 'Keset Kaki', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14350, 224, '240.10 - 001 - 001', 'Mangkok', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14351, 224, '240.10 - 001 - 002', 'Mangkok', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14352, 224, '240.10 - 001 - 003', 'Mangkok', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14353, 224, '240.10 - 001 - 004', 'Mangkok', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14354, 224, '240.10 - 001 - 005', 'Mangkok', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14355, 224, '240.10 - 001 - 006', 'Mangkok', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14356, 225, '240.11 - 001 - 001', 'Obeng', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14357, 226, '240.12 - 001 - 001', 'Oven', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14358, 227, '240.13 - 001 - 001', 'Piring Makan', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14359, 227, '240.13 - 001 - 002', 'Piring Makan', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14360, 227, '240.13 - 001 - 003', 'Piring Makan', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14361, 227, '240.13 - 001 - 004', 'Piring Makan', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14362, 228, '240.14 - 001 - 001', 'Rice Cooker', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14363, 229, '240.15 - 001 - 001', 'Sapu', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14364, 229, '240.15 - 001 - 002', 'Sapu', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14365, 229, '240.15 - 001 - 003', 'Sapu', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14366, 229, '240.15 - 001 - 004', 'Sapu', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14367, 229, '240.15 - 001 - 005', 'Sapu', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14368, 229, '240.15 - 001 - 006', 'Sapu', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14369, 229, '240.15 - 001 - 007', 'Sapu', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14370, 229, '240.15 - 001 - 008', 'Sapu', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14371, 229, '240.15 - 001 - 009', 'Sapu', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14372, 229, '240.15 - 001 - 010', 'Sapu', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14373, 229, '240.15 - 001 - 011', 'Sapu', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14374, 229, '240.15 - 001 - 012', 'Sapu', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14375, 229, '240.15 - 001 - 013', 'Sapu', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14376, 229, '240.15 - 001 - 014', 'Sapu', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14377, 229, '240.15 - 001 - 015', 'Sapu', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14378, 229, '240.15 - 001 - 016', 'Sapu', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14379, 229, '240.15 - 001 - 017', 'Sapu', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14380, 229, '240.15 - 001 - 018', 'Sapu', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14381, 229, '240.15 - 001 - 019', 'Sapu', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14382, 229, '240.15 - 001 - 020', 'Sapu', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14383, 230, '240.16 - 001 - 001', 'Sendok', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14384, 230, '240.16 - 001 - 002', 'Sendok', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14385, 230, '240.16 - 001 - 003', 'Sendok', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14386, 230, '240.16 - 001 - 004', 'Sendok', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14387, 231, '240.17 - 001 - 001', 'Tempat Nasi', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14388, 231, '240.17 - 001 - 002', 'Tempat Nasi', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14389, 232, '240.18 - 001 - 001', 'Tempat Sampah Besar', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14390, 232, '240.18 - 001 - 002', 'Tempat Sampah Besar', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14391, 232, '240.18 - 001 - 003', 'Tempat Sampah Besar', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14392, 232, '240.18 - 001 - 004', 'Tempat Sampah Besar', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14393, 232, '240.18 - 001 - 005', 'Tempat Sampah Besar', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14394, 232, '240.18 - 001 - 006', 'Tempat Sampah Besar', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14395, 233, '240.19 - 001 - 001', 'Tempat Tisu', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14396, 233, '240.19 - 001 - 002', 'Tempat Tisu', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14397, 233, '240.19 - 001 - 003', 'Tempat Tisu', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14398, 233, '240.19 - 001 - 004', 'Tempat Tisu', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14399, 233, '240.19 - 001 - 005', 'Tempat Tisu', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14400, 233, '240.19 - 001 - 006', 'Tempat Tisu', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14401, 233, '240.19 - 001 - 007', 'Tempat Tisu', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14402, 233, '240.19 - 001 - 008', 'Tempat Tisu', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14403, 234, '240.20 - 001 - 001', 'Termos Tahan Teh/Kopi', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14404, 234, '240.20 - 001 - 002', 'Termos Tahan Teh/Kopi', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14405, 235, '240.21 - 001 - 001', 'Toples', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14406, 235, '240.21 - 001 - 002', 'Toples', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14407, 235, '240.21 - 001 - 003', 'Toples', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14408, 235, '240.21 - 001 - 004', 'Toples', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14409, 235, '240.21 - 001 - 005', 'Toples', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14410, 235, '240.21 - 001 - 006', 'Toples', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14411, 235, '240.21 - 001 - 007', 'Toples', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14412, 235, '240.21 - 001 - 008', 'Toples', 'ALAT RUMAH TANGGA', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14413, 236, '260.102 - 001 - 001', 'Kitchen Set', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14414, 237, '260.103 - 001 - 001', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Dipinjam', NULL),
(14415, 237, '260.103 - 001 - 002', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Dipinjam', NULL),
(14416, 237, '260.103 - 001 - 003', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Dipinjam', NULL),
(14417, 237, '260.103 - 001 - 004', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Dipinjam', NULL),
(14418, 237, '260.103 - 001 - 005', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Dipinjam', NULL),
(14419, 237, '260.103 - 001 - 006', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Dipinjam', NULL),
(14420, 237, '260.103 - 001 - 007', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Dipinjam', NULL),
(14421, 237, '260.103 - 001 - 008', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Dipinjam', NULL),
(14422, 237, '260.103 - 001 - 009', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Dipinjam', NULL),
(14423, 237, '260.103 - 001 - 010', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Dipinjam', NULL),
(14424, 237, '260.103 - 001 - 011', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Dipinjam', NULL),
(14425, 237, '260.103 - 001 - 012', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Dipinjam', NULL),
(14426, 237, '260.103 - 001 - 013', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Dipinjam', NULL),
(14427, 237, '260.103 - 001 - 014', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Dipinjam', NULL),
(14428, 237, '260.103 - 001 - 015', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Dipinjam', NULL),
(14429, 237, '260.103 - 001 - 016', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Dipinjam', NULL),
(14430, 237, '260.103 - 001 - 017', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Dipinjam', NULL),
(14431, 237, '260.103 - 001 - 018', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Dipinjam', NULL),
(14432, 237, '260.103 - 001 - 019', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Dipinjam', NULL),
(14433, 237, '260.103 - 001 - 020', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Dipinjam', NULL),
(14434, 237, '260.103 - 001 - 021', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Dipinjam', NULL),
(14435, 237, '260.103 - 001 - 022', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Dipinjam', NULL),
(14436, 237, '260.103 - 001 - 023', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Dipinjam', NULL),
(14437, 237, '260.103 - 001 - 024', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Dipinjam', NULL),
(14438, 237, '260.103 - 001 - 025', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Dipinjam', NULL),
(14439, 237, '260.103 - 001 - 026', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Dipinjam', NULL),
(14440, 237, '260.103 - 001 - 027', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Dipinjam', NULL),
(14441, 237, '260.103 - 001 - 028', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Dipinjam', NULL),
(14442, 237, '260.103 - 001 - 029', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Dipinjam', NULL),
(14443, 237, '260.103 - 001 - 030', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Dipinjam', NULL),
(14444, 237, '260.103 - 001 - 031', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Dipinjam', NULL),
(14445, 237, '260.103 - 001 - 032', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Dipinjam', NULL),
(14446, 237, '260.103 - 001 - 033', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Dipinjam', NULL),
(14447, 237, '260.103 - 001 - 034', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Dipinjam', NULL),
(14448, 237, '260.103 - 001 - 035', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Dipinjam', NULL),
(14449, 237, '260.103 - 001 - 036', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Dipinjam', NULL),
(14450, 237, '260.103 - 001 - 037', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Dipinjam', NULL),
(14451, 237, '260.103 - 001 - 038', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Dipinjam', NULL),
(14452, 237, '260.103 - 001 - 039', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Dipinjam', NULL),
(14453, 237, '260.103 - 001 - 040', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Dipinjam', NULL),
(14454, 237, '260.103 - 001 - 041', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Dipinjam', NULL),
(14455, 237, '260.103 - 001 - 042', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Dipinjam', NULL),
(14456, 237, '260.103 - 001 - 043', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Dipinjam', NULL),
(14457, 237, '260.103 - 001 - 044', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Dipinjam', NULL),
(14458, 237, '260.103 - 001 - 045', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Dipinjam', NULL),
(14459, 237, '260.103 - 001 - 046', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Dipinjam', NULL),
(14460, 237, '260.103 - 001 - 047', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Dipinjam', NULL),
(14461, 237, '260.103 - 001 - 048', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Dipinjam', NULL),
(14462, 237, '260.103 - 001 - 049', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Dipinjam', NULL),
(14463, 237, '260.103 - 001 - 050', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Dipinjam', NULL),
(14464, 237, '260.103 - 001 - 051', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14465, 237, '260.103 - 001 - 052', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14466, 237, '260.103 - 001 - 053', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14467, 237, '260.103 - 001 - 054', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14468, 237, '260.103 - 001 - 055', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14469, 237, '260.103 - 001 - 056', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14470, 237, '260.103 - 001 - 057', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14471, 237, '260.103 - 001 - 058', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14472, 237, '260.103 - 001 - 059', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14473, 237, '260.103 - 001 - 060', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14474, 237, '260.103 - 001 - 061', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14475, 237, '260.103 - 001 - 062', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14476, 237, '260.103 - 001 - 063', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14477, 237, '260.103 - 001 - 064', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14478, 237, '260.103 - 001 - 065', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14479, 237, '260.103 - 001 - 066', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14480, 237, '260.103 - 001 - 067', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14481, 237, '260.103 - 001 - 068', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14482, 237, '260.103 - 001 - 069', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14483, 237, '260.103 - 001 - 070', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14484, 237, '260.103 - 001 - 071', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14485, 237, '260.103 - 001 - 072', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14486, 237, '260.103 - 001 - 073', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14487, 237, '260.103 - 001 - 074', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14488, 237, '260.103 - 001 - 075', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14489, 237, '260.103 - 001 - 076', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14490, 237, '260.103 - 001 - 077', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14491, 237, '260.103 - 001 - 078', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14492, 237, '260.103 - 001 - 079', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14493, 237, '260.103 - 001 - 080', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14494, 237, '260.103 - 001 - 081', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14495, 237, '260.103 - 001 - 082', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14496, 237, '260.103 - 001 - 083', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14497, 237, '260.103 - 001 - 084', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14498, 237, '260.103 - 001 - 085', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14499, 237, '260.103 - 001 - 086', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14500, 237, '260.103 - 001 - 087', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14501, 237, '260.103 - 001 - 088', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14502, 237, '260.103 - 001 - 089', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14503, 237, '260.103 - 001 - 090', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14504, 237, '260.103 - 001 - 091', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14505, 237, '260.103 - 001 - 092', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14506, 237, '260.103 - 001 - 093', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14507, 237, '260.103 - 001 - 094', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14508, 237, '260.103 - 001 - 095', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14509, 237, '260.103 - 001 - 096', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14510, 237, '260.103 - 001 - 097', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14511, 237, '260.103 - 001 - 098', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14512, 237, '260.103 - 001 - 099', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14513, 237, '260.103 - 001 - 100', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14514, 237, '260.103 - 001 - 101', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14515, 237, '260.103 - 001 - 102', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14516, 237, '260.103 - 001 - 103', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14517, 237, '260.103 - 001 - 104', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14518, 237, '260.103 - 001 - 105', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14519, 237, '260.103 - 001 - 106', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14520, 237, '260.103 - 001 - 107', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14521, 237, '260.103 - 001 - 108', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14522, 237, '260.103 - 001 - 109', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14523, 237, '260.103 - 001 - 110', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14524, 237, '260.103 - 001 - 111', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14525, 237, '260.103 - 001 - 112', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14526, 237, '260.103 - 001 - 113', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14527, 237, '260.103 - 001 - 114', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL);
INSERT INTO `barang_detail` (`id`, `id_master`, `kode_barang`, `nama_barang`, `klasifikasi`, `tanggal_perolehan`, `lokasi`, `lokasi_asal`, `status`, `keterangan`) VALUES
(14528, 237, '260.103 - 001 - 115', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14529, 237, '260.103 - 001 - 116', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14530, 237, '260.103 - 001 - 117', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14531, 237, '260.103 - 001 - 118', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14532, 237, '260.103 - 001 - 119', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14533, 237, '260.103 - 001 - 120', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14534, 237, '260.103 - 001 - 121', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14535, 237, '260.103 - 001 - 122', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14536, 237, '260.103 - 001 - 123', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14537, 237, '260.103 - 001 - 124', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14538, 237, '260.103 - 001 - 125', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14539, 237, '260.103 - 001 - 126', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14540, 237, '260.103 - 001 - 127', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14541, 237, '260.103 - 001 - 128', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14542, 237, '260.103 - 001 - 129', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14543, 237, '260.103 - 001 - 130', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14544, 237, '260.103 - 001 - 131', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14545, 237, '260.103 - 001 - 132', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14546, 237, '260.103 - 001 - 133', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14547, 237, '260.103 - 001 - 134', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14548, 237, '260.103 - 001 - 135', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14549, 237, '260.103 - 001 - 136', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14550, 237, '260.103 - 001 - 137', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14551, 237, '260.103 - 001 - 138', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14552, 237, '260.103 - 001 - 139', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14553, 237, '260.103 - 001 - 140', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14554, 237, '260.103 - 001 - 141', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14555, 237, '260.103 - 001 - 142', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14556, 237, '260.103 - 001 - 143', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14557, 237, '260.103 - 001 - 144', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14558, 237, '260.103 - 001 - 145', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14559, 237, '260.103 - 001 - 146', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14560, 237, '260.103 - 001 - 147', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14561, 237, '260.103 - 001 - 148', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14562, 237, '260.103 - 001 - 149', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14563, 237, '260.103 - 001 - 150', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14564, 237, '260.103 - 001 - 151', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14565, 237, '260.103 - 001 - 152', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14566, 237, '260.103 - 001 - 153', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14567, 237, '260.103 - 001 - 154', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14568, 237, '260.103 - 001 - 155', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14569, 237, '260.103 - 001 - 156', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14570, 237, '260.103 - 001 - 157', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14571, 237, '260.103 - 001 - 158', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14572, 237, '260.103 - 001 - 159', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14573, 237, '260.103 - 001 - 160', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14574, 237, '260.103 - 001 - 161', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14575, 237, '260.103 - 001 - 162', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14576, 237, '260.103 - 001 - 163', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14577, 237, '260.103 - 001 - 164', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14578, 237, '260.103 - 001 - 165', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14579, 237, '260.103 - 001 - 166', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14580, 237, '260.103 - 001 - 167', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14581, 237, '260.103 - 001 - 168', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14582, 237, '260.103 - 001 - 169', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14583, 237, '260.103 - 001 - 170', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14584, 237, '260.103 - 001 - 171', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14585, 237, '260.103 - 001 - 172', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14586, 237, '260.103 - 001 - 173', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14587, 237, '260.103 - 001 - 174', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14588, 237, '260.103 - 001 - 175', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14589, 237, '260.103 - 001 - 176', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14590, 237, '260.103 - 001 - 177', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14591, 237, '260.103 - 001 - 178', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14592, 237, '260.103 - 001 - 179', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14593, 237, '260.103 - 001 - 180', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14594, 237, '260.103 - 001 - 181', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14595, 237, '260.103 - 001 - 182', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14596, 237, '260.103 - 001 - 183', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14597, 237, '260.103 - 001 - 184', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14598, 237, '260.103 - 001 - 185', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14599, 237, '260.103 - 001 - 186', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14600, 237, '260.103 - 001 - 187', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14601, 237, '260.103 - 001 - 188', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14602, 237, '260.103 - 001 - 189', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14603, 237, '260.103 - 001 - 190', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14604, 237, '260.103 - 001 - 191', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14605, 237, '260.103 - 001 - 192', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14606, 237, '260.103 - 001 - 193', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14607, 237, '260.103 - 001 - 194', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14608, 237, '260.103 - 001 - 195', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14609, 237, '260.103 - 001 - 196', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14610, 237, '260.103 - 001 - 197', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14611, 237, '260.103 - 001 - 198', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14612, 237, '260.103 - 001 - 199', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14613, 237, '260.103 - 001 - 200', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14614, 237, '260.103 - 001 - 201', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14615, 237, '260.103 - 001 - 202', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14616, 237, '260.103 - 001 - 203', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14617, 237, '260.103 - 001 - 204', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14618, 237, '260.103 - 001 - 205', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14619, 237, '260.103 - 001 - 206', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14620, 237, '260.103 - 001 - 207', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14621, 237, '260.103 - 001 - 208', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14622, 237, '260.103 - 001 - 209', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14623, 237, '260.103 - 001 - 210', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14624, 237, '260.103 - 001 - 211', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14625, 237, '260.103 - 001 - 212', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14626, 237, '260.103 - 001 - 213', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14627, 237, '260.103 - 001 - 214', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14628, 237, '260.103 - 001 - 215', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14629, 237, '260.103 - 001 - 216', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14630, 237, '260.103 - 001 - 217', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14631, 237, '260.103 - 001 - 218', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14632, 237, '260.103 - 001 - 219', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14633, 237, '260.103 - 001 - 220', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14634, 237, '260.103 - 001 - 221', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14635, 237, '260.103 - 001 - 222', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14636, 237, '260.103 - 001 - 223', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14637, 237, '260.103 - 001 - 224', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14638, 237, '260.103 - 001 - 225', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14639, 237, '260.103 - 001 - 226', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14640, 237, '260.103 - 001 - 227', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14641, 237, '260.103 - 001 - 228', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14642, 237, '260.103 - 001 - 229', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14643, 237, '260.103 - 001 - 230', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14644, 237, '260.103 - 001 - 231', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14645, 237, '260.103 - 001 - 232', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14646, 237, '260.103 - 001 - 233', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14647, 237, '260.103 - 001 - 234', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14648, 237, '260.103 - 001 - 235', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14649, 237, '260.103 - 001 - 236', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14650, 237, '260.103 - 001 - 237', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14651, 237, '260.103 - 001 - 238', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14652, 237, '260.103 - 001 - 239', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14653, 237, '260.103 - 001 - 240', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14654, 237, '260.103 - 001 - 241', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14655, 237, '260.103 - 001 - 242', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14656, 237, '260.103 - 001 - 243', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14657, 237, '260.103 - 001 - 244', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14658, 237, '260.103 - 001 - 245', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14659, 237, '260.103 - 001 - 246', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14660, 237, '260.103 - 001 - 247', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14661, 237, '260.103 - 001 - 248', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14662, 237, '260.103 - 001 - 249', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14663, 237, '260.103 - 001 - 250', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14664, 237, '260.103 - 001 - 251', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14665, 237, '260.103 - 001 - 252', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14666, 237, '260.103 - 001 - 253', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14667, 237, '260.103 - 001 - 254', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14668, 237, '260.103 - 001 - 255', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14669, 237, '260.103 - 001 - 256', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14670, 237, '260.103 - 001 - 257', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14671, 237, '260.103 - 001 - 258', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14672, 237, '260.103 - 001 - 259', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14673, 237, '260.103 - 001 - 260', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14674, 237, '260.103 - 001 - 261', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14675, 237, '260.103 - 001 - 262', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14676, 237, '260.103 - 001 - 263', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14677, 237, '260.103 - 001 - 264', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14678, 237, '260.103 - 001 - 265', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14679, 237, '260.103 - 001 - 266', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14680, 237, '260.103 - 001 - 267', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14681, 237, '260.103 - 001 - 268', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14682, 237, '260.103 - 001 - 269', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14683, 237, '260.103 - 001 - 270', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14684, 237, '260.103 - 001 - 271', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14685, 237, '260.103 - 001 - 272', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14686, 237, '260.103 - 001 - 273', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14687, 237, '260.103 - 001 - 274', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14688, 237, '260.103 - 001 - 275', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14689, 237, '260.103 - 001 - 276', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14690, 237, '260.103 - 001 - 277', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14691, 237, '260.103 - 001 - 278', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14692, 237, '260.103 - 001 - 279', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14693, 237, '260.103 - 001 - 280', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14694, 237, '260.103 - 001 - 281', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14695, 237, '260.103 - 001 - 282', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14696, 237, '260.103 - 001 - 283', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14697, 237, '260.103 - 001 - 284', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14698, 237, '260.103 - 001 - 285', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14699, 237, '260.103 - 001 - 286', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14700, 237, '260.103 - 001 - 287', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14701, 237, '260.103 - 001 - 288', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14702, 237, '260.103 - 001 - 289', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14703, 237, '260.103 - 001 - 290', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14704, 237, '260.103 - 001 - 291', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14705, 237, '260.103 - 001 - 292', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14706, 237, '260.103 - 001 - 293', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14707, 237, '260.103 - 001 - 294', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14708, 237, '260.103 - 001 - 295', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14709, 237, '260.103 - 001 - 296', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14710, 237, '260.103 - 001 - 297', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14711, 237, '260.103 - 001 - 298', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14712, 237, '260.103 - 001 - 299', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14713, 237, '260.103 - 001 - 300', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14714, 237, '260.103 - 001 - 301', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14715, 237, '260.103 - 001 - 302', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14716, 237, '260.103 - 001 - 303', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14717, 237, '260.103 - 001 - 304', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14718, 237, '260.103 - 001 - 305', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14719, 237, '260.103 - 001 - 306', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14720, 237, '260.103 - 001 - 307', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14721, 237, '260.103 - 001 - 308', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14722, 237, '260.103 - 001 - 309', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14723, 237, '260.103 - 001 - 310', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14724, 237, '260.103 - 001 - 311', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14725, 237, '260.103 - 001 - 312', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14726, 237, '260.103 - 001 - 313', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14727, 237, '260.103 - 001 - 314', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14728, 237, '260.103 - 001 - 315', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14729, 237, '260.103 - 001 - 316', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14730, 237, '260.103 - 001 - 317', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14731, 237, '260.103 - 001 - 318', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14732, 237, '260.103 - 001 - 319', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14733, 237, '260.103 - 001 - 320', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14734, 237, '260.103 - 001 - 321', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14735, 237, '260.103 - 001 - 322', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14736, 237, '260.103 - 001 - 323', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14737, 237, '260.103 - 001 - 324', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14738, 237, '260.103 - 001 - 325', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14739, 237, '260.103 - 001 - 326', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14740, 237, '260.103 - 001 - 327', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14741, 237, '260.103 - 001 - 328', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14742, 237, '260.103 - 001 - 329', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14743, 237, '260.103 - 001 - 330', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14744, 237, '260.103 - 001 - 331', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14745, 237, '260.103 - 001 - 332', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14746, 237, '260.103 - 001 - 333', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14747, 237, '260.103 - 001 - 334', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14748, 237, '260.103 - 001 - 335', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14749, 237, '260.103 - 001 - 336', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14750, 237, '260.103 - 001 - 337', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14751, 237, '260.103 - 001 - 338', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14752, 237, '260.103 - 001 - 339', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14753, 237, '260.103 - 001 - 340', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14754, 237, '260.103 - 001 - 341', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14755, 237, '260.103 - 001 - 342', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14756, 237, '260.103 - 001 - 343', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14757, 237, '260.103 - 001 - 344', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14758, 237, '260.103 - 001 - 345', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14759, 237, '260.103 - 001 - 346', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14760, 237, '260.103 - 001 - 347', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14761, 237, '260.103 - 001 - 348', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14762, 237, '260.103 - 001 - 349', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14763, 237, '260.103 - 001 - 350', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14764, 237, '260.103 - 001 - 351', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14765, 237, '260.103 - 001 - 352', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14766, 237, '260.103 - 001 - 353', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14767, 237, '260.103 - 001 - 354', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14768, 237, '260.103 - 001 - 355', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14769, 237, '260.103 - 001 - 356', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14770, 237, '260.103 - 001 - 357', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14771, 237, '260.103 - 001 - 358', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14772, 237, '260.103 - 001 - 359', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14773, 237, '260.103 - 001 - 360', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14774, 237, '260.103 - 001 - 361', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14775, 237, '260.103 - 001 - 362', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14776, 237, '260.103 - 001 - 363', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14777, 237, '260.103 - 001 - 364', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14778, 237, '260.103 - 001 - 365', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14779, 237, '260.103 - 001 - 366', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14780, 237, '260.103 - 001 - 367', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14781, 237, '260.103 - 001 - 368', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14782, 237, '260.103 - 001 - 369', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14783, 237, '260.103 - 001 - 370', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14784, 237, '260.103 - 001 - 371', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14785, 237, '260.103 - 001 - 372', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14786, 237, '260.103 - 001 - 373', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14787, 237, '260.103 - 001 - 374', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14788, 237, '260.103 - 001 - 375', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14789, 237, '260.103 - 001 - 376', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14790, 237, '260.103 - 001 - 377', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14791, 237, '260.103 - 001 - 378', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14792, 237, '260.103 - 001 - 379', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14793, 237, '260.103 - 001 - 380', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14794, 237, '260.103 - 001 - 381', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14795, 237, '260.103 - 001 - 382', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14796, 237, '260.103 - 001 - 383', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14797, 237, '260.103 - 001 - 384', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14798, 237, '260.103 - 001 - 385', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14799, 237, '260.103 - 001 - 386', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14800, 237, '260.103 - 001 - 387', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14801, 237, '260.103 - 001 - 388', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14802, 237, '260.103 - 001 - 389', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14803, 237, '260.103 - 001 - 390', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14804, 237, '260.103 - 001 - 391', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14805, 237, '260.103 - 001 - 392', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14806, 237, '260.103 - 001 - 393', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14807, 237, '260.103 - 001 - 394', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14808, 237, '260.103 - 001 - 395', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14809, 237, '260.103 - 001 - 396', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14810, 237, '260.103 - 001 - 397', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14811, 237, '260.103 - 001 - 398', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14812, 237, '260.103 - 001 - 399', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14813, 237, '260.103 - 001 - 400', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14814, 237, '260.103 - 001 - 401', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14815, 237, '260.103 - 001 - 402', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14816, 237, '260.103 - 001 - 403', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14817, 237, '260.103 - 001 - 404', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14818, 237, '260.103 - 001 - 405', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14819, 237, '260.103 - 001 - 406', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14820, 237, '260.103 - 001 - 407', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14821, 237, '260.103 - 001 - 408', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14822, 237, '260.103 - 001 - 409', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14823, 237, '260.103 - 001 - 410', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14824, 237, '260.103 - 001 - 411', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14825, 237, '260.103 - 001 - 412', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14826, 237, '260.103 - 001 - 413', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14827, 237, '260.103 - 001 - 414', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14828, 237, '260.103 - 001 - 415', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14829, 237, '260.103 - 001 - 416', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14830, 237, '260.103 - 001 - 417', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14831, 237, '260.103 - 001 - 418', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14832, 237, '260.103 - 001 - 419', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14833, 237, '260.103 - 001 - 420', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14834, 237, '260.103 - 001 - 421', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14835, 237, '260.103 - 001 - 422', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14836, 237, '260.103 - 001 - 423', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14837, 237, '260.103 - 001 - 424', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14838, 237, '260.103 - 001 - 425', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14839, 237, '260.103 - 001 - 426', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14840, 237, '260.103 - 001 - 427', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14841, 237, '260.103 - 001 - 428', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14842, 237, '260.103 - 001 - 429', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14843, 237, '260.103 - 001 - 430', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14844, 237, '260.103 - 001 - 431', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14845, 237, '260.103 - 001 - 432', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14846, 237, '260.103 - 001 - 433', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14847, 237, '260.103 - 001 - 434', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14848, 237, '260.103 - 001 - 435', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14849, 237, '260.103 - 001 - 436', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14850, 237, '260.103 - 001 - 437', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14851, 237, '260.103 - 001 - 438', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14852, 237, '260.103 - 001 - 439', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14853, 237, '260.103 - 001 - 440', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14854, 237, '260.103 - 001 - 441', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14855, 237, '260.103 - 001 - 442', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14856, 237, '260.103 - 001 - 443', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14857, 237, '260.103 - 001 - 444', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14858, 237, '260.103 - 001 - 445', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14859, 237, '260.103 - 001 - 446', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14860, 237, '260.103 - 001 - 447', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14861, 237, '260.103 - 001 - 448', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14862, 237, '260.103 - 001 - 449', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14863, 237, '260.103 - 001 - 450', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14864, 237, '260.103 - 001 - 451', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14865, 237, '260.103 - 001 - 452', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14866, 237, '260.103 - 001 - 453', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14867, 237, '260.103 - 001 - 454', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14868, 237, '260.103 - 001 - 455', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14869, 237, '260.103 - 001 - 456', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14870, 237, '260.103 - 001 - 457', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14871, 237, '260.103 - 001 - 458', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14872, 237, '260.103 - 001 - 459', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14873, 237, '260.103 - 001 - 460', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14874, 237, '260.103 - 001 - 461', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14875, 237, '260.103 - 001 - 462', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14876, 237, '260.103 - 001 - 463', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14877, 237, '260.103 - 001 - 464', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14878, 237, '260.103 - 001 - 465', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14879, 237, '260.103 - 001 - 466', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14880, 237, '260.103 - 001 - 467', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14881, 237, '260.103 - 001 - 468', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14882, 237, '260.103 - 001 - 469', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14883, 237, '260.103 - 001 - 470', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14884, 237, '260.103 - 001 - 471', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14885, 237, '260.103 - 001 - 472', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14886, 237, '260.103 - 001 - 473', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14887, 237, '260.103 - 001 - 474', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14888, 237, '260.103 - 001 - 475', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14889, 237, '260.103 - 001 - 476', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14890, 237, '260.103 - 001 - 477', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14891, 237, '260.103 - 001 - 478', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14892, 237, '260.103 - 001 - 479', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14893, 237, '260.103 - 001 - 480', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14894, 237, '260.103 - 001 - 481', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14895, 237, '260.103 - 001 - 482', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14896, 237, '260.103 - 001 - 483', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14897, 237, '260.103 - 001 - 484', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14898, 237, '260.103 - 001 - 485', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14899, 237, '260.103 - 001 - 486', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14900, 237, '260.103 - 001 - 487', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14901, 237, '260.103 - 001 - 488', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14902, 237, '260.103 - 001 - 489', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14903, 237, '260.103 - 001 - 490', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14904, 237, '260.103 - 001 - 491', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14905, 237, '260.103 - 001 - 492', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14906, 237, '260.103 - 001 - 493', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14907, 237, '260.103 - 001 - 494', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14908, 237, '260.103 - 001 - 495', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14909, 237, '260.103 - 001 - 496', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14910, 237, '260.103 - 001 - 497', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14911, 237, '260.103 - 001 - 498', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14912, 237, '260.103 - 001 - 499', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14913, 237, '260.103 - 001 - 500', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14914, 237, '260.103 - 001 - 501', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14915, 237, '260.103 - 001 - 502', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14916, 237, '260.103 - 001 - 503', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14917, 237, '260.103 - 001 - 504', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14918, 237, '260.103 - 001 - 505', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14919, 237, '260.103 - 001 - 506', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14920, 237, '260.103 - 001 - 507', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14921, 237, '260.103 - 001 - 508', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14922, 237, '260.103 - 001 - 509', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14923, 237, '260.103 - 001 - 510', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14924, 237, '260.103 - 001 - 511', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14925, 237, '260.103 - 001 - 512', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14926, 237, '260.103 - 001 - 513', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14927, 237, '260.103 - 001 - 514', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14928, 237, '260.103 - 001 - 515', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14929, 237, '260.103 - 001 - 516', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14930, 237, '260.103 - 001 - 517', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14931, 237, '260.103 - 001 - 518', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14932, 237, '260.103 - 001 - 519', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14933, 237, '260.103 - 001 - 520', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14934, 237, '260.103 - 001 - 521', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14935, 237, '260.103 - 001 - 522', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14936, 237, '260.103 - 001 - 523', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14937, 237, '260.103 - 001 - 524', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14938, 237, '260.103 - 001 - 525', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14939, 237, '260.103 - 001 - 526', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14940, 237, '260.103 - 001 - 527', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14941, 237, '260.103 - 001 - 528', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14942, 237, '260.103 - 001 - 529', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14943, 237, '260.103 - 001 - 530', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14944, 237, '260.103 - 001 - 531', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14945, 237, '260.103 - 001 - 532', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14946, 237, '260.103 - 001 - 533', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14947, 237, '260.103 - 001 - 534', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14948, 237, '260.103 - 001 - 535', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14949, 237, '260.103 - 001 - 536', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14950, 237, '260.103 - 001 - 537', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14951, 237, '260.103 - 001 - 538', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14952, 237, '260.103 - 001 - 539', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14953, 237, '260.103 - 001 - 540', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14954, 237, '260.103 - 001 - 541', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14955, 237, '260.103 - 001 - 542', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14956, 237, '260.103 - 001 - 543', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14957, 237, '260.103 - 001 - 544', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14958, 237, '260.103 - 001 - 545', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14959, 237, '260.103 - 001 - 546', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14960, 237, '260.103 - 001 - 547', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14961, 237, '260.103 - 001 - 548', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14962, 237, '260.103 - 001 - 549', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14963, 237, '260.103 - 001 - 550', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14964, 237, '260.103 - 001 - 551', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14965, 237, '260.103 - 001 - 552', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14966, 237, '260.103 - 001 - 553', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14967, 238, '260.104 - 001 - 001', 'Kursi Chitose', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14968, 238, '260.104 - 001 - 002', 'Kursi Chitose', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14969, 238, '260.104 - 001 - 003', 'Kursi Chitose', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14970, 238, '260.104 - 001 - 004', 'Kursi Chitose', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14971, 238, '260.104 - 001 - 005', 'Kursi Chitose', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14972, 238, '260.104 - 001 - 006', 'Kursi Chitose', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14973, 238, '260.104 - 001 - 007', 'Kursi Chitose', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14974, 238, '260.104 - 001 - 008', 'Kursi Chitose', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14975, 238, '260.104 - 001 - 009', 'Kursi Chitose', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14976, 238, '260.104 - 001 - 010', 'Kursi Chitose', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL);
INSERT INTO `barang_detail` (`id`, `id_master`, `kode_barang`, `nama_barang`, `klasifikasi`, `tanggal_perolehan`, `lokasi`, `lokasi_asal`, `status`, `keterangan`) VALUES
(14977, 238, '260.104 - 001 - 011', 'Kursi Chitose', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14978, 238, '260.104 - 001 - 012', 'Kursi Chitose', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14979, 238, '260.104 - 001 - 013', 'Kursi Chitose', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14980, 238, '260.104 - 001 - 014', 'Kursi Chitose', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14981, 238, '260.104 - 001 - 015', 'Kursi Chitose', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14982, 238, '260.104 - 001 - 016', 'Kursi Chitose', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14983, 238, '260.104 - 001 - 017', 'Kursi Chitose', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14984, 238, '260.104 - 001 - 018', 'Kursi Chitose', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14985, 238, '260.104 - 001 - 019', 'Kursi Chitose', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14986, 238, '260.104 - 001 - 020', 'Kursi Chitose', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14987, 238, '260.104 - 001 - 021', 'Kursi Chitose', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14988, 238, '260.104 - 001 - 022', 'Kursi Chitose', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14989, 238, '260.104 - 001 - 023', 'Kursi Chitose', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14990, 238, '260.104 - 001 - 024', 'Kursi Chitose', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14991, 238, '260.104 - 001 - 025', 'Kursi Chitose', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14992, 238, '260.104 - 001 - 026', 'Kursi Chitose', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14993, 238, '260.104 - 001 - 027', 'Kursi Chitose', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14994, 238, '260.104 - 001 - 028', 'Kursi Chitose', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14995, 238, '260.104 - 001 - 029', 'Kursi Chitose', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14996, 238, '260.104 - 001 - 030', 'Kursi Chitose', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14997, 238, '260.104 - 001 - 031', 'Kursi Chitose', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14998, 238, '260.104 - 001 - 032', 'Kursi Chitose', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(14999, 238, '260.104 - 001 - 033', 'Kursi Chitose', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15000, 238, '260.104 - 001 - 034', 'Kursi Chitose', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15001, 238, '260.104 - 001 - 035', 'Kursi Chitose', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15002, 238, '260.104 - 001 - 036', 'Kursi Chitose', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15003, 238, '260.104 - 001 - 037', 'Kursi Chitose', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15004, 238, '260.104 - 001 - 038', 'Kursi Chitose', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15005, 238, '260.104 - 001 - 039', 'Kursi Chitose', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15006, 238, '260.104 - 001 - 040', 'Kursi Chitose', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15007, 238, '260.104 - 001 - 041', 'Kursi Chitose', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15008, 238, '260.104 - 001 - 042', 'Kursi Chitose', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15009, 238, '260.104 - 001 - 043', 'Kursi Chitose', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15010, 238, '260.104 - 001 - 044', 'Kursi Chitose', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15011, 238, '260.104 - 001 - 045', 'Kursi Chitose', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15012, 238, '260.104 - 001 - 046', 'Kursi Chitose', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15013, 238, '260.104 - 001 - 047', 'Kursi Chitose', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15014, 238, '260.104 - 001 - 048', 'Kursi Chitose', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15015, 238, '260.104 - 001 - 049', 'Kursi Chitose', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15016, 238, '260.104 - 001 - 050', 'Kursi Chitose', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15017, 238, '260.104 - 001 - 051', 'Kursi Chitose', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15018, 238, '260.104 - 001 - 052', 'Kursi Chitose', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15019, 238, '260.104 - 001 - 053', 'Kursi Chitose', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15020, 238, '260.104 - 001 - 054', 'Kursi Chitose', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15021, 238, '260.104 - 001 - 055', 'Kursi Chitose', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15022, 238, '260.104 - 001 - 056', 'Kursi Chitose', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15023, 238, '260.104 - 001 - 057', 'Kursi Chitose', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15024, 238, '260.104 - 001 - 058', 'Kursi Chitose', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15025, 238, '260.104 - 001 - 059', 'Kursi Chitose', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15026, 238, '260.104 - 001 - 060', 'Kursi Chitose', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15027, 238, '260.104 - 001 - 061', 'Kursi Chitose', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15028, 238, '260.104 - 001 - 062', 'Kursi Chitose', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15029, 238, '260.104 - 001 - 063', 'Kursi Chitose', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15030, 238, '260.104 - 001 - 064', 'Kursi Chitose', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15031, 238, '260.104 - 001 - 065', 'Kursi Chitose', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15032, 238, '260.104 - 001 - 066', 'Kursi Chitose', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15033, 238, '260.104 - 001 - 067', 'Kursi Chitose', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15034, 238, '260.104 - 001 - 068', 'Kursi Chitose', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15035, 238, '260.104 - 001 - 069', 'Kursi Chitose', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15036, 238, '260.104 - 001 - 070', 'Kursi Chitose', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15037, 238, '260.104 - 001 - 071', 'Kursi Chitose', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15038, 238, '260.104 - 001 - 072', 'Kursi Chitose', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15039, 238, '260.104 - 001 - 073', 'Kursi Chitose', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15040, 238, '260.104 - 001 - 074', 'Kursi Chitose', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15041, 238, '260.104 - 001 - 075', 'Kursi Chitose', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15042, 238, '260.104 - 001 - 076', 'Kursi Chitose', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15043, 238, '260.104 - 001 - 077', 'Kursi Chitose', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15044, 238, '260.104 - 001 - 078', 'Kursi Chitose', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15045, 238, '260.104 - 001 - 079', 'Kursi Chitose', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15046, 238, '260.104 - 001 - 080', 'Kursi Chitose', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15047, 238, '260.104 - 001 - 081', 'Kursi Chitose', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15048, 238, '260.104 - 001 - 082', 'Kursi Chitose', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15049, 238, '260.104 - 001 - 083', 'Kursi Chitose', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15050, 238, '260.104 - 001 - 084', 'Kursi Chitose', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15051, 238, '260.104 - 001 - 085', 'Kursi Chitose', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15052, 238, '260.104 - 001 - 086', 'Kursi Chitose', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15053, 238, '260.104 - 001 - 087', 'Kursi Chitose', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15054, 238, '260.104 - 001 - 088', 'Kursi Chitose', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15055, 238, '260.104 - 001 - 089', 'Kursi Chitose', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15056, 238, '260.104 - 001 - 090', 'Kursi Chitose', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15057, 238, '260.104 - 001 - 091', 'Kursi Chitose', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15058, 238, '260.104 - 001 - 092', 'Kursi Chitose', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15059, 238, '260.104 - 001 - 093', 'Kursi Chitose', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15060, 238, '260.104 - 001 - 094', 'Kursi Chitose', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15061, 238, '260.104 - 001 - 095', 'Kursi Chitose', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15062, 238, '260.104 - 001 - 096', 'Kursi Chitose', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15063, 238, '260.104 - 001 - 097', 'Kursi Chitose', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15064, 238, '260.104 - 001 - 098', 'Kursi Chitose', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15065, 238, '260.104 - 001 - 099', 'Kursi Chitose', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15066, 238, '260.104 - 001 - 100', 'Kursi Chitose', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15067, 238, '260.104 - 001 - 101', 'Kursi Chitose', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15068, 238, '260.104 - 001 - 102', 'Kursi Chitose', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15069, 238, '260.104 - 001 - 103', 'Kursi Chitose', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15070, 239, '260.105 - 001 - 001', 'Kursi Direktur', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15071, 239, '260.105 - 001 - 002', 'Kursi Direktur', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15072, 239, '260.105 - 001 - 003', 'Kursi Direktur', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15073, 239, '260.105 - 001 - 004', 'Kursi Direktur', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15074, 239, '260.105 - 001 - 005', 'Kursi Direktur', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15075, 239, '260.105 - 001 - 006', 'Kursi Direktur', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15076, 239, '260.105 - 001 - 007', 'Kursi Direktur', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15077, 239, '260.105 - 001 - 008', 'Kursi Direktur', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15078, 239, '260.105 - 001 - 009', 'Kursi Direktur', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15079, 239, '260.105 - 001 - 010', 'Kursi Direktur', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15080, 239, '260.105 - 001 - 011', 'Kursi Direktur', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15081, 239, '260.105 - 001 - 012', 'Kursi Direktur', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15082, 239, '260.105 - 001 - 013', 'Kursi Direktur', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15083, 239, '260.105 - 001 - 014', 'Kursi Direktur', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15084, 239, '260.105 - 001 - 015', 'Kursi Direktur', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15085, 239, '260.105 - 001 - 016', 'Kursi Direktur', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15086, 239, '260.105 - 001 - 017', 'Kursi Direktur', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15087, 239, '260.105 - 001 - 018', 'Kursi Direktur', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15088, 239, '260.105 - 001 - 019', 'Kursi Direktur', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15089, 239, '260.105 - 001 - 020', 'Kursi Direktur', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15090, 239, '260.105 - 001 - 021', 'Kursi Direktur', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15091, 239, '260.105 - 001 - 022', 'Kursi Direktur', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15092, 240, '260.106 - 001 - 001', 'Kursi Dosen', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15093, 240, '260.106 - 001 - 002', 'Kursi Dosen', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15094, 240, '260.106 - 001 - 003', 'Kursi Dosen', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15095, 240, '260.106 - 001 - 004', 'Kursi Dosen', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15096, 240, '260.106 - 001 - 005', 'Kursi Dosen', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15097, 240, '260.106 - 001 - 006', 'Kursi Dosen', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15098, 240, '260.106 - 001 - 007', 'Kursi Dosen', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15099, 240, '260.106 - 001 - 008', 'Kursi Dosen', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15100, 240, '260.106 - 001 - 009', 'Kursi Dosen', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15101, 240, '260.106 - 001 - 010', 'Kursi Dosen', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15102, 240, '260.106 - 001 - 011', 'Kursi Dosen', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15103, 240, '260.106 - 001 - 012', 'Kursi Dosen', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15104, 240, '260.106 - 001 - 013', 'Kursi Dosen', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15105, 240, '260.106 - 001 - 014', 'Kursi Dosen', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15106, 240, '260.106 - 001 - 015', 'Kursi Dosen', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15107, 240, '260.106 - 001 - 016', 'Kursi Dosen', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15108, 240, '260.106 - 001 - 017', 'Kursi Dosen', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15109, 240, '260.106 - 001 - 018', 'Kursi Dosen', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15110, 240, '260.106 - 001 - 019', 'Kursi Dosen', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15111, 240, '260.106 - 001 - 020', 'Kursi Dosen', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15112, 240, '260.106 - 001 - 021', 'Kursi Dosen', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15113, 240, '260.106 - 001 - 022', 'Kursi Dosen', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15114, 240, '260.106 - 001 - 023', 'Kursi Dosen', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15115, 240, '260.106 - 001 - 024', 'Kursi Dosen', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15116, 240, '260.106 - 001 - 025', 'Kursi Dosen', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15117, 240, '260.106 - 001 - 026', 'Kursi Dosen', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15118, 240, '260.106 - 001 - 027', 'Kursi Dosen', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15119, 240, '260.106 - 001 - 028', 'Kursi Dosen', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15120, 240, '260.106 - 001 - 029', 'Kursi Dosen', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15121, 240, '260.106 - 001 - 030', 'Kursi Dosen', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15122, 240, '260.106 - 001 - 031', 'Kursi Dosen', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15123, 240, '260.106 - 001 - 032', 'Kursi Dosen', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15124, 240, '260.106 - 001 - 033', 'Kursi Dosen', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15125, 240, '260.106 - 001 - 034', 'Kursi Dosen', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15126, 240, '260.106 - 001 - 035', 'Kursi Dosen', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15127, 240, '260.106 - 001 - 036', 'Kursi Dosen', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15128, 240, '260.106 - 001 - 037', 'Kursi Dosen', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15129, 240, '260.106 - 001 - 038', 'Kursi Dosen', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15130, 240, '260.106 - 001 - 039', 'Kursi Dosen', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15131, 240, '260.106 - 001 - 040', 'Kursi Dosen', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15132, 240, '260.106 - 001 - 041', 'Kursi Dosen', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15133, 240, '260.106 - 001 - 042', 'Kursi Dosen', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15134, 240, '260.106 - 001 - 043', 'Kursi Dosen', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15135, 240, '260.106 - 001 - 044', 'Kursi Dosen', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15136, 240, '260.106 - 001 - 045', 'Kursi Dosen', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15137, 240, '260.106 - 001 - 046', 'Kursi Dosen', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15138, 240, '260.106 - 001 - 047', 'Kursi Dosen', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15139, 240, '260.106 - 001 - 048', 'Kursi Dosen', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15140, 240, '260.106 - 001 - 049', 'Kursi Dosen', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15141, 240, '260.106 - 001 - 050', 'Kursi Dosen', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15142, 240, '260.106 - 001 - 051', 'Kursi Dosen', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15143, 240, '260.106 - 001 - 052', 'Kursi Dosen', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15144, 240, '260.106 - 001 - 053', 'Kursi Dosen', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15145, 240, '260.106 - 001 - 054', 'Kursi Dosen', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15146, 240, '260.106 - 001 - 055', 'Kursi Dosen', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15154, 241, '260.107 - 001 - 001', 'Kursi Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15155, 241, '260.107 - 001 - 002', 'Kursi Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15156, 241, '260.107 - 001 - 003', 'Kursi Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15157, 241, '260.107 - 001 - 004', 'Kursi Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15158, 241, '260.107 - 001 - 005', 'Kursi Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15159, 241, '260.107 - 001 - 006', 'Kursi Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15160, 241, '260.107 - 001 - 007', 'Kursi Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15161, 241, '260.107 - 001 - 008', 'Kursi Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15162, 241, '260.107 - 001 - 009', 'Kursi Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15163, 241, '260.107 - 001 - 010', 'Kursi Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15164, 241, '260.107 - 001 - 011', 'Kursi Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15165, 241, '260.107 - 001 - 012', 'Kursi Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15166, 241, '260.107 - 001 - 013', 'Kursi Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15167, 241, '260.107 - 001 - 014', 'Kursi Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15168, 241, '260.107 - 001 - 015', 'Kursi Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15169, 241, '260.107 - 001 - 016', 'Kursi Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15170, 241, '260.107 - 001 - 017', 'Kursi Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15171, 241, '260.107 - 001 - 018', 'Kursi Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15172, 241, '260.107 - 001 - 019', 'Kursi Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15173, 241, '260.107 - 001 - 020', 'Kursi Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15174, 241, '260.107 - 001 - 021', 'Kursi Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15175, 241, '260.107 - 001 - 022', 'Kursi Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15176, 241, '260.107 - 001 - 023', 'Kursi Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15177, 241, '260.107 - 001 - 024', 'Kursi Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15178, 241, '260.107 - 001 - 025', 'Kursi Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15179, 241, '260.107 - 001 - 026', 'Kursi Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15180, 241, '260.107 - 001 - 027', 'Kursi Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15181, 241, '260.107 - 001 - 028', 'Kursi Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15182, 241, '260.107 - 001 - 029', 'Kursi Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15183, 241, '260.107 - 001 - 030', 'Kursi Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15184, 241, '260.107 - 001 - 031', 'Kursi Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15185, 241, '260.107 - 001 - 032', 'Kursi Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15186, 241, '260.107 - 001 - 033', 'Kursi Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15187, 241, '260.107 - 001 - 034', 'Kursi Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15188, 241, '260.107 - 001 - 035', 'Kursi Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15189, 241, '260.107 - 001 - 036', 'Kursi Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15190, 241, '260.107 - 001 - 037', 'Kursi Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15191, 241, '260.107 - 001 - 038', 'Kursi Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15192, 241, '260.107 - 001 - 039', 'Kursi Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15193, 241, '260.107 - 001 - 040', 'Kursi Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15194, 241, '260.107 - 001 - 041', 'Kursi Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15195, 241, '260.107 - 001 - 042', 'Kursi Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15196, 241, '260.107 - 001 - 043', 'Kursi Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15197, 241, '260.107 - 001 - 044', 'Kursi Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15198, 241, '260.107 - 001 - 045', 'Kursi Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15199, 241, '260.107 - 001 - 046', 'Kursi Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15200, 241, '260.107 - 001 - 047', 'Kursi Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15201, 241, '260.107 - 001 - 048', 'Kursi Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15202, 241, '260.107 - 001 - 049', 'Kursi Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15203, 241, '260.107 - 001 - 050', 'Kursi Merah', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15204, 242, '260.108 - 001 - 001', 'Kursi Plastik Biru', 'MEBELAIR', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(15205, 242, '260.108 - 001 - 002', 'Kursi Plastik Biru', 'MEBELAIR', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(15206, 242, '260.108 - 001 - 003', 'Kursi Plastik Biru', 'MEBELAIR', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(15207, 242, '260.108 - 001 - 004', 'Kursi Plastik Biru', 'MEBELAIR', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(15208, 242, '260.108 - 001 - 005', 'Kursi Plastik Biru', 'MEBELAIR', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(15209, 242, '260.108 - 001 - 006', 'Kursi Plastik Biru', 'MEBELAIR', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(15210, 242, '260.108 - 001 - 007', 'Kursi Plastik Biru', 'MEBELAIR', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(15211, 242, '260.108 - 001 - 008', 'Kursi Plastik Biru', 'MEBELAIR', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(15212, 242, '260.108 - 001 - 009', 'Kursi Plastik Biru', 'MEBELAIR', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(15213, 242, '260.108 - 001 - 010', 'Kursi Plastik Biru', 'MEBELAIR', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(15214, 242, '260.108 - 001 - 011', 'Kursi Plastik Biru', 'MEBELAIR', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(15215, 242, '260.108 - 001 - 012', 'Kursi Plastik Biru', 'MEBELAIR', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(15216, 242, '260.108 - 001 - 013', 'Kursi Plastik Biru', 'MEBELAIR', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(15217, 242, '260.108 - 001 - 014', 'Kursi Plastik Biru', 'MEBELAIR', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(15218, 242, '260.108 - 001 - 015', 'Kursi Plastik Biru', 'MEBELAIR', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(15219, 242, '260.108 - 001 - 016', 'Kursi Plastik Biru', 'MEBELAIR', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(15220, 242, '260.108 - 001 - 017', 'Kursi Plastik Biru', 'MEBELAIR', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(15221, 242, '260.108 - 001 - 018', 'Kursi Plastik Biru', 'MEBELAIR', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(15222, 242, '260.108 - 001 - 019', 'Kursi Plastik Biru', 'MEBELAIR', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(15223, 242, '260.108 - 001 - 020', 'Kursi Plastik Biru', 'MEBELAIR', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(15224, 242, '260.108 - 001 - 021', 'Kursi Plastik Biru', 'MEBELAIR', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(15225, 242, '260.108 - 001 - 022', 'Kursi Plastik Biru', 'MEBELAIR', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(15226, 242, '260.108 - 001 - 023', 'Kursi Plastik Biru', 'MEBELAIR', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(15227, 242, '260.108 - 001 - 024', 'Kursi Plastik Biru', 'MEBELAIR', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(15228, 242, '260.108 - 001 - 025', 'Kursi Plastik Biru', 'MEBELAIR', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(15229, 242, '260.108 - 001 - 026', 'Kursi Plastik Biru', 'MEBELAIR', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(15230, 242, '260.108 - 001 - 027', 'Kursi Plastik Biru', 'MEBELAIR', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(15231, 242, '260.108 - 001 - 028', 'Kursi Plastik Biru', 'MEBELAIR', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(15232, 242, '260.108 - 001 - 029', 'Kursi Plastik Biru', 'MEBELAIR', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(15233, 242, '260.108 - 001 - 030', 'Kursi Plastik Biru', 'MEBELAIR', '2025-07-07', 'Gudang', 'Gudang', 'Baru', NULL),
(15234, 242, '260.108 - 001 - 031', 'Kursi Plastik Biru', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15235, 242, '260.108 - 001 - 032', 'Kursi Plastik Biru', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15236, 242, '260.108 - 001 - 033', 'Kursi Plastik Biru', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15237, 242, '260.108 - 001 - 034', 'Kursi Plastik Biru', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15238, 242, '260.108 - 001 - 035', 'Kursi Plastik Biru', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15239, 242, '260.108 - 001 - 036', 'Kursi Plastik Biru', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15240, 242, '260.108 - 001 - 037', 'Kursi Plastik Biru', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15241, 242, '260.108 - 001 - 038', 'Kursi Plastik Biru', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15242, 242, '260.108 - 001 - 039', 'Kursi Plastik Biru', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15243, 242, '260.108 - 001 - 040', 'Kursi Plastik Biru', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15244, 242, '260.108 - 001 - 041', 'Kursi Plastik Biru', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15245, 242, '260.108 - 001 - 042', 'Kursi Plastik Biru', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15246, 242, '260.108 - 001 - 043', 'Kursi Plastik Biru', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15247, 242, '260.108 - 001 - 044', 'Kursi Plastik Biru', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15248, 242, '260.108 - 001 - 045', 'Kursi Plastik Biru', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15249, 242, '260.108 - 001 - 046', 'Kursi Plastik Biru', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15250, 242, '260.108 - 001 - 047', 'Kursi Plastik Biru', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15251, 242, '260.108 - 001 - 048', 'Kursi Plastik Biru', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15252, 242, '260.108 - 001 - 049', 'Kursi Plastik Biru', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15253, 242, '260.108 - 001 - 050', 'Kursi Plastik Biru', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15254, 243, '260.109 - 001 - 001', 'Lemari Besi', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15255, 243, '260.109 - 001 - 002', 'Lemari Besi', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15256, 243, '260.109 - 001 - 003', 'Lemari Besi', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15257, 243, '260.109 - 001 - 004', 'Lemari Besi', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15258, 244, '260.110 - 001 - 001', 'Lemari Kaca', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15259, 244, '260.110 - 001 - 002', 'Lemari Kaca', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15260, 244, '260.110 - 001 - 003', 'Lemari Kaca', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15261, 244, '260.110 - 001 - 004', 'Lemari Kaca', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15262, 244, '260.110 - 001 - 005', 'Lemari Kaca', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15263, 244, '260.110 - 001 - 006', 'Lemari Kaca', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15264, 244, '260.110 - 001 - 007', 'Lemari Kaca', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15265, 244, '260.110 - 001 - 008', 'Lemari Kaca', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15266, 244, '260.110 - 001 - 009', 'Lemari Kaca', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15267, 244, '260.110 - 001 - 010', 'Lemari Kaca', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15268, 245, '260.111 - 001 - 001', 'Lemari Kayu', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15269, 245, '260.111 - 001 - 002', 'Lemari Kayu', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15270, 245, '260.111 - 001 - 003', 'Lemari Kayu', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15271, 245, '260.111 - 001 - 004', 'Lemari Kayu', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15272, 245, '260.111 - 001 - 005', 'Lemari Kayu', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15273, 245, '260.111 - 001 - 006', 'Lemari Kayu', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15274, 245, '260.111 - 001 - 007', 'Lemari Kayu', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15275, 245, '260.111 - 001 - 008', 'Lemari Kayu', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15276, 245, '260.111 - 001 - 009', 'Lemari Kayu', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15277, 245, '260.111 - 001 - 010', 'Lemari Kayu', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15278, 245, '260.111 - 001 - 011', 'Lemari Kayu', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15279, 245, '260.111 - 001 - 012', 'Lemari Kayu', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15280, 245, '260.111 - 001 - 013', 'Lemari Kayu', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15281, 245, '260.111 - 001 - 014', 'Lemari Kayu', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15282, 245, '260.111 - 001 - 015', 'Lemari Kayu', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15283, 246, '260.112 - 001 - 001', 'Meja Dosen', 'MEBELAIR', '2025-07-07', 'Ruangan Kelas Maria 1', NULL, 'Aktif Digunakan', ''),
(15284, 246, '260.112 - 001 - 002', 'Meja Dosen', 'MEBELAIR', '2025-07-07', 'Ruangan Kelas Maria 2', NULL, 'Aktif Digunakan', ''),
(15285, 246, '260.112 - 001 - 003', 'Meja Dosen', 'MEBELAIR', '2025-07-07', 'Ruangan Kelas Maria 3', NULL, 'Aktif Digunakan', ''),
(15286, 246, '260.112 - 001 - 004', 'Meja Dosen', 'MEBELAIR', '2025-07-07', 'Ruangan Kelas Maria 4', NULL, 'Aktif Digunakan', ''),
(15287, 246, '260.112 - 001 - 005', 'Meja Dosen', 'MEBELAIR', '2025-07-07', 'Ruangan Kelas Angela 1', NULL, 'Aktif Digunakan', ''),
(15288, 246, '260.112 - 001 - 006', 'Meja Dosen', 'MEBELAIR', '2025-07-07', 'Ruangan Kelas Angela 2', NULL, 'Aktif Digunakan', ''),
(15289, 246, '260.112 - 001 - 007', 'Meja Dosen', 'MEBELAIR', '2025-07-07', 'Ruangan Kelas Angela 3', NULL, 'Aktif Digunakan', ''),
(15290, 246, '260.112 - 001 - 008', 'Meja Dosen', 'MEBELAIR', '2025-07-07', 'Ruangan Kelas Angela 4', NULL, 'Aktif Digunakan', ''),
(15291, 246, '260.112 - 001 - 009', 'Meja Dosen', 'MEBELAIR', '2025-07-07', 'Ruangan Kelas Ursula 1', NULL, 'Aktif Digunakan', ''),
(15292, 246, '260.112 - 001 - 010', 'Meja Dosen', 'MEBELAIR', '2025-07-07', 'Ruangan Kelas Ursula 2', NULL, 'Aktif Digunakan', ''),
(15293, 246, '260.112 - 001 - 011', 'Meja Dosen', 'MEBELAIR', '2025-07-07', 'Ruangan Kelas Ursula 3', NULL, 'Aktif Digunakan', ''),
(15294, 246, '260.112 - 001 - 012', 'Meja Dosen', 'MEBELAIR', '2025-07-07', 'Ruangan Kelas Ursula 4', NULL, 'Aktif Digunakan', ''),
(15295, 247, '260.113 - 001 - 001', 'Meja Kecil', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15296, 247, '260.113 - 001 - 002', 'Meja Kecil', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15297, 247, '260.113 - 001 - 003', 'Meja Kecil', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15298, 247, '260.113 - 001 - 004', 'Meja Kecil', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15299, 247, '260.113 - 001 - 005', 'Meja Kecil', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15300, 247, '260.113 - 001 - 006', 'Meja Kecil', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15301, 247, '260.113 - 001 - 007', 'Meja Kecil', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15302, 247, '260.113 - 001 - 008', 'Meja Kecil', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15303, 247, '260.113 - 001 - 009', 'Meja Kecil', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15304, 247, '260.113 - 001 - 010', 'Meja Kecil', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15305, 248, '260.114 - 001 - 001', 'Meja Lingkar', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15316, 250, '260.116 - 001 - 001', 'Meja Penyimpanan', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15317, 250, '260.116 - 001 - 002', 'Meja Penyimpanan', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15318, 250, '260.116 - 001 - 003', 'Meja Penyimpanan', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15319, 251, '260.117 - 001 - 001', 'Rak Plastik', 'MEBELAIR', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15320, 252, '260.118 - 001 - 001', 'Sofa', 'MEBELAIR', '2025-07-07', 'Ruangan Pimpinan', NULL, 'Aktif Digunakan', ''),
(15321, 252, '260.118 - 001 - 002', 'Sofa', 'MEBELAIR', '2025-07-07', 'Ruangtamu', NULL, 'Aktif Digunakan', ''),
(15322, 252, '260.118 - 001 - 003', 'Sofa', 'MEBELAIR', '2025-07-07', 'Ruangtamu', 'Gudang', 'Aktif Digunakan', ''),
(15323, 252, '260.118 - 001 - 004', 'Sofa', 'MEBELAIR', '2025-07-07', 'Campus Ministri', 'Gudang', 'Aktif Digunakan', ''),
(15324, 253, '270.001 - 001 - 001', 'Gerobak', 'ALAT ALAT KEBUN', '2025-07-07', 'Gudang', NULL, 'Baru', NULL),
(15325, 254, '280.05 - 001 - 001', 'Lukisan', 'PERHIASAN RUANGAN', '2025-07-07', 'Gudang', NULL, 'Baru', ''),
(15326, 254, '280.05 - 001 - 002', 'Lukisan', 'PERHIASAN RUANGAN', '2025-07-07', 'Gudang', NULL, 'Baru', ''),
(15327, 254, '280.05 - 001 - 003', 'Lukisan', 'PERHIASAN RUANGAN', '2025-07-07', 'Gudang', NULL, 'Baru', ''),
(15328, 254, '280.05 - 001 - 004', 'Lukisan', 'PERHIASAN RUANGAN', '2025-07-07', 'Gudang', NULL, 'Baru', ''),
(15329, 254, '280.05 - 001 - 005', 'Lukisan', 'PERHIASAN RUANGAN', '2025-07-07', 'Gudang', NULL, 'Baru', ''),
(15363, 258, '260.115 - 001 - 001', 'MEJA PANJANG', 'MEBELAIR', '2025-07-30', 'Gudang', 'Gudang', 'Rusak Berat', ''),
(15364, 258, '260.115 - 001 - 002', 'MEJA PANJANG', 'MEBELAIR', '2025-07-30', 'SMP', 'Gudang', 'Dipinjamkan', ''),
(15365, 258, '260.115 - 001 - 003', 'MEJA PANJANG', 'MEBELAIR', '2025-07-30', 'Gudang', 'Gudang', 'Baru', ''),
(15366, 258, '260.115 - 001 - 004', 'MEJA PANJANG', 'MEBELAIR', '2025-07-30', 'Gudang', 'Gudang', 'Baru', ''),
(15367, 258, '260.115 - 001 - 005', 'MEJA PANJANG', 'MEBELAIR', '2025-07-30', 'Gudang', 'Gudang', 'Baru', ''),
(15368, 258, '260.115 - 001 - 006', 'MEJA PANJANG', 'MEBELAIR', '2025-07-30', 'Gudang', 'Gudang', 'Baru', ''),
(15369, 258, '260.115 - 001 - 007', 'MEJA PANJANG', 'MEBELAIR', '2025-07-30', 'Gudang', 'Gudang', 'Baru', ''),
(15370, 258, '260.115 - 001 - 008', 'MEJA PANJANG', 'MEBELAIR', '2025-07-30', 'Gudang', 'Gudang', 'Baru', ''),
(15371, 258, '260.115 - 001 - 009', 'MEJA PANJANG', 'MEBELAIR', '2025-07-30', 'Gudang', 'Gudang', 'Baru', ''),
(15372, 258, '260.115 - 001 - 010', 'MEJA PANJANG', 'MEBELAIR', '2025-07-30', 'Gudang', 'Gudang', 'Baru', ''),
(15373, 242, '260.108 - 001 - 051', 'Kursi Plastik Biru', NULL, '2026-05-18', 'Gudang', 'Yayasan', 'Baik', NULL),
(15374, 242, '260.108 - 001 - 052', 'Kursi Plastik Biru', NULL, '2026-05-18', 'Gudang', 'Yayasan', 'Baik', NULL),
(15375, 242, '260.108 - 001 - 053', 'Kursi Plastik Biru', NULL, '2026-05-18', 'Gudang', 'Yayasan', 'Baik', NULL),
(15376, 242, '260.108 - 001 - 054', 'Kursi Plastik Biru', NULL, '2026-05-18', 'Gudang', 'Yayasan', 'Baik', NULL),
(15377, 242, '260.108 - 001 - 055', 'Kursi Plastik Biru', NULL, '2026-05-18', 'Gudang', 'Yayasan', 'Baik', NULL),
(15378, 242, '260.108 - 001 - 056', 'Kursi Plastik Biru', NULL, '2026-05-18', 'Gudang', 'Yayasan', 'Baik', NULL),
(15379, 242, '260.108 - 001 - 057', 'Kursi Plastik Biru', NULL, '2026-05-18', 'Gudang', 'Yayasan', 'Baik', NULL),
(15380, 242, '260.108 - 001 - 058', 'Kursi Plastik Biru', NULL, '2026-05-18', 'Gudang', 'Yayasan', 'Baik', NULL),
(15381, 242, '260.108 - 001 - 059', 'Kursi Plastik Biru', NULL, '2026-05-18', 'Gudang', 'Yayasan', 'Baik', NULL),
(15382, 242, '260.108 - 001 - 060', 'Kursi Plastik Biru', NULL, '2026-05-18', 'Gudang', 'Yayasan', 'Baik', NULL),
(15383, 242, '260.108 - 001 - 061', 'Kursi Plastik Biru', NULL, '2026-05-18', 'Gudang', 'Yayasan', 'Baik', NULL),
(15384, 242, '260.108 - 001 - 062', 'Kursi Plastik Biru', NULL, '2026-05-18', 'Gudang', 'Yayasan', 'Baik', NULL),
(15385, 242, '260.108 - 001 - 063', 'Kursi Plastik Biru', NULL, '2026-05-18', 'Gudang', 'Yayasan', 'Baik', NULL),
(15386, 242, '260.108 - 001 - 064', 'Kursi Plastik Biru', NULL, '2026-05-18', 'Gudang', 'Yayasan', 'Baik', NULL),
(15387, 242, '260.108 - 001 - 065', 'Kursi Plastik Biru', NULL, '2026-05-18', 'Gudang', 'Yayasan', 'Baik', NULL),
(15388, 242, '260.108 - 001 - 066', 'Kursi Plastik Biru', NULL, '2026-05-18', 'Gudang', 'Yayasan', 'Baik', NULL),
(15389, 242, '260.108 - 001 - 067', 'Kursi Plastik Biru', NULL, '2026-05-18', 'Gudang', 'Yayasan', 'Baik', NULL),
(15390, 242, '260.108 - 001 - 068', 'Kursi Plastik Biru', NULL, '2026-05-18', 'Gudang', 'Yayasan', 'Baik', NULL),
(15391, 242, '260.108 - 001 - 069', 'Kursi Plastik Biru', NULL, '2026-05-18', 'Gudang', 'Yayasan', 'Baik', NULL),
(15392, 242, '260.108 - 001 - 070', 'Kursi Plastik Biru', NULL, '2026-05-18', 'Gudang', 'Yayasan', 'Baik', NULL),
(15393, 259, '230.40 - 001 - 001', 'motor', 'ALAT TRANSPORTASI', '2026-06-03', 'Gudang', 'Gudang', 'Baru', NULL),
(15394, 259, '230.40 - 001 - 002', 'motor', 'ALAT TRANSPORTASI', '2026-06-03', 'Gudang', 'Gudang', 'Baru', NULL),
(15395, 259, '230.40 - 001 - 003', 'motor', 'ALAT TRANSPORTASI', '2026-06-03', 'Gudang', 'Gudang', 'Baru', NULL),
(15396, 259, '230.40 - 001 - 004', 'motor', 'ALAT TRANSPORTASI', '2026-06-03', 'Gudang', 'Gudang', 'Baru', NULL),
(15397, 259, '230.40 - 001 - 005', 'motor', 'ALAT TRANSPORTASI', '2026-06-03', 'Gudang', 'Gudang', 'Baru', NULL),
(15398, 259, '230.40 - 001 - 006', 'motor', 'ALAT TRANSPORTASI', '2026-06-03', 'Gudang', 'Gudang', 'Baru', NULL),
(15399, 259, '230.40 - 001 - 007', 'motor', 'ALAT TRANSPORTASI', '2026-06-03', 'Gudang', 'Gudang', 'Baru', NULL),
(15400, 259, '230.40 - 001 - 008', 'motor', 'ALAT TRANSPORTASI', '2026-06-03', 'Gudang', 'Gudang', 'Baru', NULL),
(15401, 259, '230.40 - 001 - 009', 'motor', 'ALAT TRANSPORTASI', '2026-06-03', 'Gudang', 'Gudang', 'Baru', NULL),
(15402, 259, '230.40 - 001 - 010', 'motor', 'ALAT TRANSPORTASI', '2026-06-03', 'Gudang', 'Gudang', 'Baru', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `barang_master`
--

CREATE TABLE `barang_master` (
  `id` int(11) NOT NULL,
  `kode_induk` varchar(20) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `klasifikasi` varchar(100) DEFAULT NULL,
  `tanggal_masuk` date NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `jumlah_total` int(11) NOT NULL DEFAULT 0,
  `stok_sisa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang_master`
--

INSERT INTO `barang_master` (`id`, `kode_induk`, `nama_barang`, `klasifikasi`, `tanggal_masuk`, `satuan`, `jumlah_total`, `stok_sisa`) VALUES
(184, '280.09', 'Vas Bunga', 'PERHIASAN RUANGAN', '2025-07-07', 'Buah', 10, 10),
(185, '280.08', 'Salib Yesus', 'PERHIASAN RUANGAN', '2025-07-07', 'Buah', 32, 32),
(186, '280.07', 'Piala Penghargaan Perlombaan', 'PERHIASAN RUANGAN', '2025-07-07', 'Unit', 41, 41),
(187, '280.06', 'Patung Bunda Maria', 'PERHIASAN RUANGAN', '2025-07-07', 'Unit', 2, 2),
(188, '280.04', 'Hiasan', 'PERHIASAN RUANGAN', '2025-07-07', 'Buah', 4, 4),
(189, '280.03', 'Kain Gorden', 'PERHIASAN RUANGAN', '2025-07-07', 'Buah', 5, 5),
(190, '280.02', 'Foto Presiden', 'PERHIASAN RUANGAN', '2025-07-07', 'Buah', 2, 2),
(191, '280.01', 'Bendera Kecil', 'PERHIASAN RUANGAN', '2025-07-07', 'Unit', 12, 12),
(192, '260,101', 'Podium', 'PERHIASAN RUANGAN', '2026-07-07', 'Unit', 2, 2),
(193, '210.01', 'AC', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Unit', 13, 13),
(194, '210.02', 'Dispenser', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Unit', 3, 3),
(195, '211.01', 'Kipas Angin Berdiri', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Unit', 5, 5),
(196, '210.03', 'Kipas Angin Dinding', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Unit', 61, 61),
(197, '212.01', 'Kipas Angin Gantung', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Unit', 2, 2),
(198, '210.04', 'Kulkas Mini', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Buah', 1, 1),
(199, '213.01', 'Speaker (SPKR)', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Set', 10, 10),
(200, '210.05', 'Spiker (TOA)', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Unit', 8, 8),
(201, '214.01', 'Toa / Pengeras Suara (TPS)', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Unit', 1, 1),
(202, '210.06', 'Wifi', 'PERALATAN ELEKTRONIK', '2025-07-07', 'Unit', 3, 3),
(203, '220.01', 'Colokan AC', 'PERALATAN LISTRIK', '2025-07-07', 'Buah', 32, 32),
(204, '220.02', 'Colokan Listrik', 'PERALATAN LISTRIK', '2025-07-07', 'Buah', 77, 77),
(205, '220.03', 'Colokan T', 'PERALATAN LISTRIK', '2025-07-07', 'Buah', 3, 3),
(206, '220.04', 'Lampu', 'PERALATAN LISTRIK', '2025-07-07', 'Buah', 149, 149),
(207, '220.05', 'Terminal', 'PERALATAN LISTRIK', '2025-07-07', 'Buah', 13, 13),
(208, '230.01', 'Alat Tulis Sekolah', 'PERALATAN KANTOR', '2025-07-07', 'Buah', 1, 1),
(209, '230.02', 'Box Ukuran Sedang', 'PERALATAN KANTOR', '2025-07-07', 'Buah', 1, 1),
(210, '230.03', 'Komputer', 'PERALATAN KANTOR', '2025-07-07', 'Unit', 63, 63),
(211, '230.04', 'LCD', 'PERALATAN KANTOR', '2025-07-07', 'Unit', 15, 15),
(212, '230.05', 'Papan White Board', 'PERALATAN KANTOR', '2025-07-07', 'Buah', 16, 16),
(213, '230.06', 'Printer', 'PERALATAN KANTOR', '2025-07-07', 'Unit', 10, 10),
(214, '230.07', 'Tiang Bendera', 'PERALATAN KANTOR', '2025-07-07', 'Unit', 3, 3),
(215, '240.01', 'Dulang', 'ALAT RUMAH TANGGA', '2025-07-07', 'Buah', 11, 11),
(216, '240.02', 'Garpu', 'ALAT RUMAH TANGGA', '2025-07-07', 'Lusin', 1, 1),
(217, '240.03', 'Gelas', 'ALAT RUMAH TANGGA', '2025-07-07', 'Lusin', 4, 4),
(218, '240.04', 'Gentong Ukuran Kecil', 'ALAT RUMAH TANGGA', '2025-07-07', 'Buah', 1, 1),
(219, '240.05', 'Jam Dinding', 'ALAT RUMAH TANGGA', '2025-07-07', 'Buah', 5, 5),
(220, '240.06', 'Kain Meja', 'ALAT RUMAH TANGGA', '2025-07-07', 'Buah', 11, 11),
(221, '240.07', 'Kemoceng', 'ALAT RUMAH TANGGA', '2025-07-07', 'Buah', 11, 11),
(222, '240.08', 'Keranjang Aqua Gelas', 'ALAT RUMAH TANGGA', '2025-07-07', 'Buah', 2, 2),
(223, '240.09', 'Keset Kaki', 'ALAT RUMAH TANGGA', '2025-07-07', 'Buah', 40, 40),
(224, '240.10', 'Mangkok', 'ALAT RUMAH TANGGA', '2025-07-07', 'Buah', 6, 6),
(225, '240.11', 'Obeng', 'ALAT RUMAH TANGGA', '2025-07-07', 'Unit', 1, 1),
(226, '240.12', 'Oven', 'ALAT RUMAH TANGGA', '2025-07-07', 'Buah', 1, 1),
(227, '240.13', 'Piring Makan', 'ALAT RUMAH TANGGA', '2025-07-07', 'Lusin', 4, 4),
(228, '240.14', 'Rice Cooker', 'ALAT RUMAH TANGGA', '2025-07-07', 'Buah', 1, 1),
(229, '240.15', 'Sapu', 'ALAT RUMAH TANGGA', '2025-07-07', 'Buah', 20, 20),
(230, '240.16', 'Sendok', 'ALAT RUMAH TANGGA', '2025-07-07', 'Lusin', 4, 4),
(231, '240.17', 'Tempat Nasi', 'ALAT RUMAH TANGGA', '2025-07-07', 'Buah', 2, 2),
(232, '240.18', 'Tempat Sampah Besar', 'ALAT RUMAH TANGGA', '2025-07-07', 'Unit', 6, 6),
(233, '240.19', 'Tempat Tisu', 'ALAT RUMAH TANGGA', '2025-07-07', 'Buah', 8, 8),
(234, '240.20', 'Termos Tahan Teh/Kopi', 'ALAT RUMAH TANGGA', '2025-07-07', 'Buah', 2, 2),
(235, '240.21', 'Toples', 'ALAT RUMAH TANGGA', '2025-07-07', 'Buah', 8, 8),
(236, '260.102', 'Kitchen Set', 'MEBELAIR', '2025-07-07', 'Set', 1, 1),
(237, '260.103', 'Kursi Busa Merah', 'MEBELAIR', '2025-07-07', 'Unit', 553, 553),
(238, '260.104', 'Kursi Chitose', 'MEBELAIR', '2025-07-07', 'Unit', 103, 103),
(239, '260.105', 'Kursi Direktur', 'MEBELAIR', '2025-07-07', 'Unit', 22, 22),
(240, '260.106', 'Kursi Dosen', 'MEBELAIR', '2025-07-07', 'Unit', 55, 55),
(241, '260.107', 'Kursi Merah', 'MEBELAIR', '2025-07-07', 'Unit', 50, 50),
(242, '260.108', 'Kursi Plastik Biru', 'MEBELAIR', '2025-07-07', 'Unit', 70, 70),
(243, '260.109', 'Lemari Besi', 'MEBELAIR', '2025-07-07', 'Unit', 4, 4),
(244, '260.110', 'Lemari Kaca', 'MEBELAIR', '2025-07-07', 'Buah', 10, 10),
(245, '260.111', 'Lemari Kayu', 'MEBELAIR', '2025-07-07', 'Unit', 15, 15),
(246, '260.112', 'Meja Dosen', 'MEBELAIR', '2025-07-07', 'Unit', 12, 12),
(247, '260.113', 'Meja Kecil', 'MEBELAIR', '2025-07-07', 'Unit', 10, 10),
(248, '260.114', 'Meja Lingkar', 'MEBELAIR', '2025-07-07', 'Set', 1, 1),
(250, '260.116', 'Meja Penyimpanan', 'MEBELAIR', '2025-07-07', 'Unit', 3, 3),
(251, '260.117', 'Rak Plastik', 'MEBELAIR', '2025-07-07', 'Buah', 1, 1),
(252, '260.118', 'Sofa', 'MEBELAIR', '2025-07-07', 'Set', 4, 4),
(253, '270.001', 'Gerobak', 'ALAT ALAT KEBUN', '2025-07-07', 'Buah', 1, 1),
(254, '280.05', 'Lukisan', 'PERHIASAN RUANGAN', '2025-07-07', 'Buah', 5, 5),
(258, '260.115', 'MEJA PANJANG', 'MEBELAIR', '2025-07-30', 'Unit', 10, 8),
(259, '230.40', 'motor', 'ALAT TRANSPORTASI', '2026-06-03', 'Unit', 10, 10);

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `nidn` varchar(50) DEFAULT NULL,
  `nip` varchar(50) DEFAULT NULL,
  `status_dosen` varchar(50) DEFAULT NULL,
  `gelar_depan` varchar(20) DEFAULT NULL,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `gelar_belakang` varchar(20) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jabatan_fungsional` varchar(50) DEFAULT NULL,
  `pangkat_golongan` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `bidang_keahlian` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `google_scholar` varchar(255) DEFAULT NULL,
  `sinta_id` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id`, `user_id`, `nidn`, `nip`, `status_dosen`, `gelar_depan`, `nama_lengkap`, `gelar_belakang`, `tempat_lahir`, `tanggal_lahir`, `jabatan_fungsional`, `pangkat_golongan`, `email`, `no_hp`, `bidang_keahlian`, `foto`, `google_scholar`, `sinta_id`) VALUES
(44, 61, '123125123123', '4313232311246', 'Aktif', '', 'Yulita Eme', 'S.Sos., M.Si', NULL, NULL, 'Ketua STPM Santa Ursula', NULL, 'yulitaeme@gmail.com', '081239416161', NULL, NULL, NULL, NULL),
(45, 62, '121231325132', '8556774302496', 'Aktif', '', 'Ngea Andreas', 'S.Sos., M.Si', NULL, NULL, 'Wakit Ketua Akademik', NULL, 'ngeaandreas@gmail.com', '081338082427', NULL, NULL, NULL, NULL),
(46, 68, '132123125231', '474528950637', 'Aktif', '', 'Fidentus Didakus Darma Saputra', ', S.I.P., M.I.P', NULL, NULL, 'Ketua Program Studi Ilmu Pemerintahan', NULL, 'denssaputra@gmail.com', '0892805226219', NULL, NULL, NULL, NULL),
(47, 69, '0510222001', '3141223312463', 'Aktif', '', 'Viktoria Dalima', ', S.S., M.Hum', NULL, NULL, 'Asisten Ahli', NULL, 'susterkori@gmail.com', '0288092692251', NULL, NULL, NULL, NULL),
(48, 70, '113222132513', '4083655279674', 'Aktif', '', 'Richardus Beda Toulwala', ', S.Fil., M.Si', NULL, NULL, 'Lektor kepala', NULL, 'pakrikar@gmail.com', '082247555544', NULL, NULL, NULL, NULL),
(49, 71, '0122000222', '3164323221431', 'Aktif', '', 'Patricius Marianus Botha', ', S.Fil., M.Si', NULL, NULL, '', NULL, 'pakaris@gmail.com', '', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dosen_dokumen`
--

CREATE TABLE `dosen_dokumen` (
  `id` int(11) NOT NULL,
  `dosen_id` int(11) NOT NULL,
  `cv` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dosen_pendidikan`
--

CREATE TABLE `dosen_pendidikan` (
  `id` int(11) NOT NULL,
  `dosen_id` int(11) NOT NULL,
  `jenjang` enum('S1','S2','S3') NOT NULL,
  `universitas` varchar(100) DEFAULT NULL,
  `prodi` varchar(100) DEFAULT NULL,
  `tahun_lulus` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dosen_penelitian`
--

CREATE TABLE `dosen_penelitian` (
  `id` int(11) NOT NULL,
  `dosen_id` int(11) NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `tahun` int(11) DEFAULT NULL,
  `jenis_publikasi` varchar(100) DEFAULT NULL,
  `link_publikasi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dosen_pengabdian`
--

CREATE TABLE `dosen_pengabdian` (
  `id` int(11) NOT NULL,
  `dosen_id` int(11) NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `lokasi` varchar(100) DEFAULT NULL,
  `tahun` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `category` varchar(50) DEFAULT 'event-info',
  `unit_owner` varchar(50) NOT NULL DEFAULT 'umum'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `description`, `start_date`, `end_date`, `category`, `unit_owner`) VALUES
(1, 'Penyesuaian Indikator Standar Mutu', 'Juli 2025', '2025-07-01', '2025-08-01', 'event-info', 'umum'),
(2, 'Digital Web SPMI', 'Juli 2025', '2025-07-01', '2025-08-01', 'event-info', 'umum'),
(3, 'Batas Terakhir Pendaftaran Ujian Skripsi', 'Penting', '2025-07-02', '2025-07-03', 'event-important', 'umum'),
(4, 'Agenda Harian untuk STPM Divisi IT', 'Divisi IT', '2025-07-02', '2025-07-03', 'event-info', 'umum'),
(5, 'Batas Terakhir Pengumpulan LED Prodi Sosiatri', 'Prodi Sosiatri', '2025-07-03', '2025-07-04', 'event-important', 'umum'),
(6, 'Angela Sesion', 'Kegiatan Yayasan', '2025-07-09', '2025-07-10', 'event-success', 'umum'),
(7, 'SDM Pengelolaan perpustakaan', 'Perpustakaan', '2025-07-10', '2025-07-11', 'event-info', 'umum'),
(8, 'ZOOM bersama DPMD dan Kepala Desa KKN', 'Persiapan KKN', '2025-07-10', '2025-07-11', 'event-info', 'umum'),
(9, 'Batas Akhir Ujian Skripsi', 'Akademik', '2025-07-12', '2025-07-13', 'event-important', 'umum'),
(10, 'Batas Akhir Pengumpulan Nilai UAS Semester Genap', 'Akademik', '2025-07-12', '2025-07-13', 'event-important', 'umum'),
(11, 'Pelepasan KKN', 'KKN', '2025-07-12', '2025-07-13', 'event-success', 'umum'),
(13, 'Libur Dosen STPM', 'Libur', '2025-07-14', '2025-07-27', 'event-inverse', 'umum'),
(14, 'Rekreasi Bersama', 'Refreshing', '2025-07-31', '2025-08-01', 'event-success', 'umum'),
(15, 'Pendampingan Rutin UKM dan ORMAWA', 'Kemahasiswaan', '2025-08-01', '2025-08-02', 'event-info', 'umum'),
(16, 'Her-registrasi semester ganjil 2025/2026', 'Registrasi', '2025-08-03', '2025-08-16', 'event-warning', 'umum'),
(17, 'Monitoring KKN', 'Lapangan', '2025-08-04', '2025-08-10', 'event-info', 'umum'),
(18, 'Rapat Persiapan APT', 'Akreditasi', '2025-08-05', '2025-08-06', 'event-important', 'umum'),
(19, 'Pelatihan Penggunaan LMS (Edlink) (PRODI IP)', 'Workshop', '2025-08-08', '2025-08-09', 'event-info', 'umum'),
(20, 'Evaluasi dan penguatan Dudi', 'Evaluasi', '2025-08-08', '2025-08-09', 'event-warning', 'umum'),
(21, 'Pelatihan Penggunaan LMS (PRODI SOS)', 'Workshop', '2025-08-08', '2025-08-09', 'event-info', 'umum'),
(22, 'Sosialisasi SPMI ke unit kerja dan prodi', 'SPMI', '2025-08-09', '2025-08-10', 'event-info', 'umum'),
(23, 'Pemeriksaan Perkembangan Pekerjaan (Google Drive)', 'Monitoring', '2025-08-11', '2025-08-12', 'event-warning', 'umum'),
(24, 'Presentasi lulusan tepat waktu (Yudisium)', 'Akademik', '2025-08-11', '2025-08-12', 'event-success', 'umum'),
(25, 'Pendaftaran Anggota KAPSIPI & ADIPSI', 'Keanggotaan', '2025-08-12', '2025-08-13', 'event-info', 'umum'),
(26, 'Pengerjaan borang terpusat & Presentasi hasil', 'Akreditasi', '2025-08-12', '2025-08-16', 'event-important', 'umum'),
(27, 'Lokakarya Penyususan Laporan & LPJ', 'Keuangan', '2025-08-15', '2025-08-16', 'event-warning', 'umum'),
(28, 'Lanjutan Pengerjaan Borang', 'Akreditasi', '2025-08-18', '2025-08-21', 'event-important', 'umum'),
(29, 'Pra Ospek dan Ospek', 'Mahasiswa Baru', '2025-08-18', '2025-08-23', 'event-success', 'umum'),
(30, 'Finalisasi administrasi pembelajaran', 'Dosen', '2025-08-18', '2025-08-24', 'event-info', 'umum'),
(31, 'Perbaiki Dokumen LED', 'Akreditasi', '2025-08-21', '2025-08-22', 'event-important', 'umum'),
(32, 'Branding dan Media Sosial UKM/Workshop', 'Workshop', '2025-08-22', '2025-08-23', 'event-info', 'umum'),
(33, 'Coaching dengan Koordinator SPMI Wilayah Ende', 'SPMI', '2025-08-22', '2025-08-23', 'event-info', 'umum'),
(34, 'Menghargai HAM (Unit SD, SMP, STPM)', 'Yayasan', '2025-08-22', '2025-08-23', 'event-success', 'umum'),
(35, 'Pertemuan awal semester Dosen', 'Rapat Dosen', '2025-08-23', '2025-08-24', 'event-info', 'umum'),
(36, 'Masa Perbaikan KRS', 'Akademik', '2025-08-24', '2025-09-06', 'event-warning', 'umum'),
(37, 'Pelaksanaan kuliah', 'Perkuliahan', '2025-08-24', '2025-12-11', 'event-info', 'umum'),
(38, 'Pengajuan Koleksi Baru', 'Perpustakaan', '2025-08-25', '2025-08-26', 'event-info', 'umum'),
(39, 'Pendampingan LLDIKTI XV', 'LLDIKTI', '2025-08-25', '2025-08-28', 'event-important', 'umum'),
(40, 'Kegiatan ZOOM Pemerintahan Desa & STPM', 'Kerjasama', '2025-08-26', '2025-08-27', 'event-info', 'umum'),
(41, 'Data dikirim ke BAN-PT di Sapto 2.0', 'Akreditasi', '2025-08-27', '2025-08-28', 'event-important', 'umum'),
(42, 'Workshop Penyusunan RPS dan kurikulum OBE', 'Workshop', '2025-08-29', '2025-08-30', 'event-info', 'umum'),
(43, 'Akreditasi Institusi STPM Santa Ursula', 'Akreditasi', '2025-08-30', '2025-08-31', 'event-important', 'umum'),
(44, 'Penarikan Mahasiswa KKN', 'KKN', '2025-08-31', '2025-09-01', 'event-warning', 'umum'),
(45, 'Implementasi Aplikasi Repository Perpustakaan', 'IT/Perpus', '2025-09-01', '2025-10-01', 'event-info', 'umum'),
(46, 'Pertemuan Awal semester Mahasiswa (PRODI IP & SOS)', 'Mahasiswa', '2025-09-06', '2025-09-07', 'event-info', 'umum'),
(47, 'Evaluasi KKN Tematik & Akreditasi PT', 'Evaluasi', '2025-09-06', '2025-09-07', 'event-warning', 'umum'),
(48, 'Pembentukan Panitia ORMAWA CUP ke 25', 'Kemahasiswaan', '2025-09-08', '2025-09-09', 'event-info', 'umum'),
(49, 'Evaluasi Kemitraan & Podcast KKN', 'Humas', '2025-09-09', '2025-09-10', 'event-info', 'umum'),
(50, 'Capacity Building', 'SDM', '2025-09-09', '2025-09-12', 'event-success', 'umum'),
(51, 'Kampus Hiring Tahap II', 'Karir', '2025-09-10', '2025-09-12', 'event-info', 'umum'),
(52, 'Monitoring dan Evaluasi RPS (PRODI SOS)', 'Akademik', '2025-09-12', '2025-09-13', 'event-warning', 'umum'),
(53, 'Skripsi & Yudisium (Prodi IP)', 'Akademik', '2025-09-13', '2025-09-14', 'event-success', 'umum'),
(54, 'Monev Penelitian & PKM 2024/2025', 'LP2M', '2025-09-16', '2025-09-17', 'event-warning', 'umum'),
(55, 'Sidang dan Seminar proposal penelitian & PKM 2026', 'LP2M', '2025-09-16', '2025-09-17', 'event-important', 'umum'),
(56, 'Sidang dan Monitoring/Evaluasi Hasil Penelitian /PKM', 'LP2M', '2025-09-16', '2025-09-17', 'event-warning', 'umum'),
(57, 'Benchmarking Tingkat Mahasiswa', 'Kemahasiswaan', '2025-09-17', '2025-09-18', 'event-info', 'umum'),
(58, 'Turnamen Futsal, Lomba Debat, Penulisan Opini (Prodi IP)', 'Lomba', '2025-09-18', '2025-10-01', 'event-success', 'umum'),
(59, 'Workshop Manajemen Surat Menyurat Ormawa', 'Workshop', '2025-09-19', '2025-09-20', 'event-info', 'umum'),
(60, 'Seminar Kerja (Wisuda)', 'Wisuda', '2025-09-19', '2025-09-20', 'event-success', 'umum'),
(61, 'Wisuda', 'Wisuda', '2025-09-25', '2025-09-26', 'event-success', 'umum'),
(62, 'Monitori dan Choacing Karir bersama Alumni', 'Alumni', '2025-09-26', '2025-09-28', 'event-info', 'umum'),
(63, 'Wisuda (Waket Akademik/Panitia)', 'Wisuda', '2025-09-27', '2025-09-28', 'event-success', 'umum'),
(64, 'Monitoring/Evaluasi Laporan Kemajuan penelitian BIMA', 'LP2M', '2025-09-30', '2025-10-01', 'event-warning', 'umum'),
(65, 'Monitoring proses pembelajaran (PRODI SOS)', 'Akademik', '2025-10-01', '2025-10-05', 'event-warning', 'umum'),
(66, 'Evaluasi Bimbingan Skripsi', 'Akademik', '2025-10-04', '2025-10-05', 'event-warning', 'umum'),
(67, 'Pelatihan Etika Kerja dan Tim Kerja serta PPKPT', 'Pelatihan', '2025-10-06', '2025-10-10', 'event-info', 'umum'),
(68, 'Doa Novena Santa Ursula', 'Pastoral', '2025-10-07', '2025-10-19', 'event-info', 'umum'),
(69, 'Presentasi lulusan tepat waktu (Yudisium)', 'Akademik', '2025-10-09', '2025-10-10', 'event-success', 'umum'),
(70, 'Evaluasi Pembelajaran Tengah Semester', 'Evaluasi', '2025-10-10', '2025-10-11', 'event-warning', 'umum'),
(71, 'Monev Ormawa Smester I', 'Kemahasiswaan', '2025-10-10', '2025-10-11', 'event-warning', 'umum'),
(72, 'Rapat Monev Pembelajaran Tengah Semester (Prodi IP)', 'Rapat', '2025-10-10', '2025-10-11', 'event-warning', 'umum'),
(73, 'Rapat Monev Pembelajaran Tengah Semester (Prodi SOS)', 'Rapat', '2025-10-11', '2025-10-12', 'event-warning', 'umum'),
(74, 'Tanggungan Koor Di Paroki Onekore', 'Pastoral', '2025-10-12', '2025-10-13', 'event-info', 'umum'),
(75, 'Ujian Tengah Semester', 'Ujian', '2025-10-13', '2025-10-18', 'event-important', 'umum'),
(76, 'Hari Pangan Sedunia', 'Peringatan', '2025-10-16', '2025-10-17', 'event-success', 'umum'),
(77, 'Mendukung Peningkatan Kualitas Institusi YNTB (Olahraga)', 'Yayasan', '2025-10-18', '2025-10-19', 'event-info', 'umum'),
(78, 'Pengumuman & Penyerahan Laporan Penelitan & PKM Tahap 2', 'LP2M', '2025-10-21', '2025-11-01', 'event-info', 'umum'),
(79, 'Pesta Santa Ursula', 'Perayaan', '2025-10-21', '2025-10-22', 'event-success', 'umum'),
(80, 'Tanggungan Liturgi Pesta Santa Ursula', 'Pastoral', '2025-10-21', '2025-10-22', 'event-info', 'umum'),
(81, 'Pengurusan E-ISSN Jurnal Pengabdian (JPPM) ke BRIN', 'Publikasi', '2025-10-22', '2025-10-23', 'event-info', 'umum'),
(82, 'Pelatihan dan Pendampingan PKM', 'LP2M', '2025-10-23', '2025-10-24', 'event-info', 'umum'),
(83, 'Ratas ORMAWA', 'Rapat', '2025-10-24', '2025-10-25', 'event-warning', 'umum'),
(84, 'Seminar HAM (Nasional)', 'Seminar', '2025-10-28', '2025-10-29', 'event-info', 'umum'),
(85, 'Pendaftaran dan pendistribusian bimbingan skripsi', 'Akademik', '2025-11-01', '2025-11-30', 'event-info', 'umum'),
(86, 'Simulasi Layanan Darurat', 'K3', '2025-11-03', '2025-11-04', 'event-warning', 'umum'),
(87, 'Penyerahan Laporan Penelitian & PKM Tahap 1 2024/2025', 'LP2M', '2025-11-03', '2025-11-06', 'event-important', 'umum'),
(88, 'Sidang dan Evaluasi Hasil Penelitian dan PKM Tahap 2', 'LP2M', '2025-11-07', '2025-11-08', 'event-important', 'umum'),
(89, 'Sidang & Seminar Proposal Penelitian dan PKM Tahap 1', 'LP2M', '2025-11-08', '2025-11-09', 'event-important', 'umum'),
(90, 'Penelitian Mandiri dan Tim', 'Penelitian', '2025-11-09', '2026-02-10', 'event-info', 'umum'),
(91, 'Penelitian Kerja Sama Internasional, Nasional dan lokal', 'Penelitian', '2025-11-09', '2026-02-10', 'event-info', 'umum'),
(92, 'Seminar HMPS', 'Kemahasiswaan', '2025-11-10', '2025-11-11', 'event-info', 'umum'),
(93, 'Kampanye Beasiswa dan Testimoni Alumni', 'Promosi', '2025-11-20', '2025-11-21', 'event-success', 'umum'),
(94, 'SDM Pengelolaan perpustakaan', 'SDM', '2025-12-01', '2025-12-02', 'event-info', 'umum'),
(95, 'Penyerahan Laporan dan Publikasi penelitian', 'LP2M', '2025-12-01', '2025-12-07', 'event-important', 'umum'),
(96, 'Aksi Natal', 'Pastoral', '2025-12-01', '2025-12-07', 'event-success', 'umum'),
(97, 'Pemutahiran data Pendidikan, Jabatan dan Bidang', 'SDM', '2025-12-06', '2025-12-07', 'event-warning', 'umum'),
(98, 'Rapat Monev pembelajaran akhir semester', 'Rapat', '2025-12-06', '2025-12-07', 'event-warning', 'umum'),
(99, 'Monitoring Kinerja Semester', 'Evaluasi', '2025-12-09', '2025-12-10', 'event-warning', 'umum'),
(100, 'Survei Evaluasi Proses Pemebelajaran', 'Evaluasi', '2025-12-09', '2025-12-19', 'event-info', 'umum'),
(101, 'Penyusunan Laporan dan Rekomendasi Program DUDI', 'Laporan', '2025-12-10', '2025-12-11', 'event-info', 'umum'),
(102, 'Rapat Evaluasi dan Penyerahan Piagam', 'Rapat', '2025-12-11', '2025-12-12', 'event-success', 'umum'),
(103, 'Penyebaran kuesioner Tracer Study', 'Alumni', '2025-12-11', '2025-12-12', 'event-info', 'umum'),
(104, 'Ibadat Tobat dan Sakramen Rekonsiliasi', 'Pastoral', '2025-12-12', '2025-12-13', 'event-info', 'umum'),
(105, 'Rekoleksi mahasiswa bersama DPA (Persiapan UAS)', 'Pastoral', '2025-12-12', '2025-12-13', 'event-info', 'umum'),
(106, 'Sidang dan Monitoring/Evaluasi Penelitian dan PKM', 'LP2M', '2025-12-13', '2025-12-14', 'event-warning', 'umum'),
(107, 'Ujian Akhir Semester (UAS)', 'Ujian', '2025-12-15', '2025-12-20', 'event-important', 'umum'),
(108, 'Rekoleksi Pendidik dan Tendik YNTB', 'Pastoral', '2025-12-20', '2025-12-21', 'event-success', 'umum'),
(109, 'Ujian susulan', 'Ujian', '2025-12-20', '2025-12-23', 'event-warning', 'umum'),
(110, 'Libur Semester/Natal/Akhir Tahun', 'Libur', '2025-12-22', '2026-01-01', 'event-inverse', 'umum'),
(111, 'Rekoleksi Tenaga Penunjang', 'Pastoral', '2025-12-23', '2025-12-24', 'event-info', 'umum'),
(112, 'Stock Opname Barang Selain Buku', 'Inventaris', '2025-12-27', '2025-12-31', 'event-info', 'umum'),
(113, 'Libur Tahun Baru 2026', 'Libur', '2026-01-01', '2026-01-04', 'event-inverse', 'umum'),
(114, 'Sidang dan Monitoring/Evaluasi Penelitian dan PKM', 'LP2M', '2026-01-01', '2026-01-31', 'event-info', 'umum'),
(115, 'Batas Penginputanan Nilai UAS', 'Akademik', '2026-01-10', '2026-01-11', 'event-important', 'umum'),
(116, 'Natal dan Tahun Baru Bersama', 'Perayaan', '2026-01-12', '2026-01-13', 'event-success', 'umum'),
(117, 'Coaching Clinic Terpadu Penelitian Mandiri/Tim Dosen', 'Penelitian', '2026-01-12', '2026-02-01', 'event-info', 'umum'),
(118, 'Monev IKU', 'Evaluasi', '2026-01-13', '2026-01-14', 'event-warning', 'umum'),
(119, 'Evaluasi Kelembagaan Semester Ganjil 2025/2026', 'Evaluasi', '2026-01-13', '2026-01-14', 'event-warning', 'umum'),
(120, 'Novena Santa Angela', 'Pastoral', '2026-01-14', '2026-01-27', 'event-info', 'umum'),
(121, 'Pendaftaran Calon Mahasiswa (Gel. I)', 'PMB', '2026-01-18', '2026-03-31', 'event-info', 'umum'),
(122, 'Tanggungan Liturgi Pesta Santa Angela', 'Pastoral', '2026-01-27', '2026-01-28', 'event-info', 'umum'),
(123, 'Penutupan semester Ganjil 2025/2026', 'Akademik', '2026-01-31', '2026-02-01', 'event-important', 'umum'),
(124, 'Pembukaan dan Pelaksaan Tournamen Ormawa CUP ke 25', 'Kemahasiswaan', '2026-01-31', '2026-03-06', 'event-success', 'umum'),
(125, 'Pembukaan Semester Genap 2025/2026, Dies Natalis', 'Akademik', '2026-02-02', '2026-02-03', 'event-success', 'umum'),
(126, 'Registrasi Akademik dan Administrasi 2025/2026, SKKE', 'Registrasi', '2026-02-02', '2026-02-10', 'event-warning', 'umum'),
(127, 'Pertemuan awal semester Dosen', 'Rapat', '2026-02-07', '2026-02-08', 'event-info', 'umum'),
(128, 'Sidang dan Monitoring/Evaluasi Penelitian dan PKM', 'LP2M', '2026-02-10', '2026-02-11', 'event-warning', 'umum'),
(129, 'Finalisasi Administrasi Pembelajaran (Upload RPS)', 'Akademik', '2026-02-10', '2026-02-14', 'event-important', 'umum'),
(130, 'Pelaksanaan Perkuliahan Genap 2025/2026', 'tes Perkuliahan', '2026-02-15', '2026-06-11', 'event-info', 'umum'),
(131, 'Masa Batal Tambah Program Matakuliah (Perbaikan KRS)', 'Akademik', '2026-02-19', '2026-03-01', 'event-warning', 'umum'),
(132, 'Pelatihan Manajemen dan Administrasi ORMAWA', 'Kemahasiswaan', '2026-02-20', '2026-02-22', 'event-info', 'umum'),
(133, 'Pertemuan Awal semester Mahasiswa', 'Mahasiswa', '2026-02-21', '2026-02-22', 'event-info', 'umum'),
(134, 'Registrasi akademik dan administrasi', 'Registrasi', '2026-02-28', '2026-03-01', 'event-warning', 'umum'),
(135, 'Klinik Proposal Kompetisi/Pengabdian', 'Workshop', '2026-03-06', '2026-03-07', 'event-info', 'umum'),
(136, 'Monitoring dan Evaluasi RPS', 'Evaluasi', '2026-03-07', '2026-03-08', 'event-warning', 'umum'),
(137, 'APP dan Beasiswa Ursulin', 'Beasiswa', '2026-03-09', '2026-03-15', 'event-success', 'umum'),
(138, 'Rekoleksi mahasiswa bersama DPA', 'Pastoral', '2026-03-13', '2026-03-14', 'event-info', 'umum'),
(139, 'Monitoring proses pembelajaran', 'Evaluasi', '2026-03-19', '2026-03-22', 'event-warning', 'umum'),
(140, 'Jalan Salib Tematik', 'Pastoral', '2026-03-20', '2026-03-21', 'event-info', 'umum'),
(141, 'Kegiatan Evaluasi Pelaksanaan Standar', 'SPMI', '2026-03-25', '2026-03-27', 'event-warning', 'umum'),
(142, 'Ibadat Tobat dan Sakramen Rekonsiliasi', 'Pastoral', '2026-03-27', '2026-03-28', 'event-info', 'umum'),
(143, 'Pendaftaran Calon Mahasiswa (Gel. II)', 'PMB', '2026-04-06', '2026-05-30', 'event-info', 'umum'),
(144, 'Audit Mutu Internal Masing-Masing Unit', 'SPMI', '2026-04-07', '2026-04-10', 'event-warning', 'umum'),
(145, 'Tes Calon Mahasiswa Baru Gelombang I 2026', 'PMB', '2026-04-09', '2026-04-10', 'event-important', 'umum'),
(146, 'Hasil Pengumuman Gelombang I 2026', 'PMB', '2026-04-10', '2026-04-11', 'event-success', 'umum'),
(147, 'Evaluasi Pembelajaran Tengah Semester', 'Evaluasi', '2026-04-10', '2026-04-11', 'event-warning', 'umum'),
(148, 'Sosialisasi Beasiswa Mahasiswa & Dosen', 'Beasiswa', '2026-04-11', '2026-04-12', 'event-info', 'umum'),
(149, 'Her-Registrasi / Daftar Ulang (Gel. I)', 'PMB', '2026-04-12', '2026-05-07', 'event-info', 'umum'),
(150, 'Ujian Tengah Semester (UTS)', 'Ujian', '2026-04-13', '2026-04-17', 'event-important', 'umum'),
(151, 'Mendukung Peningkatan Kualitas Institusi YNTB (Evaluasi)', 'Yayasan', '2026-04-18', '2026-04-19', 'event-info', 'umum'),
(152, 'Susksesi Pelaksanaan Pemilihan Ketua STPM', 'Organisasi', '2026-04-18', '2026-05-09', 'event-warning', 'umum'),
(153, 'Koor di gereja Wolotopo', 'Pastoral', '2026-04-19', '2026-04-20', 'event-info', 'umum'),
(154, 'Menghargai dan Mencintai Ekologi', 'Lingkungan', '2026-04-22', '2026-04-23', 'event-success', 'umum'),
(155, 'Raker Yayasan', 'Rapat', '2026-04-23', '2026-04-26', 'event-important', 'umum'),
(156, 'Penyuluhan dan Klinik Manajemen Stres', 'Kesehatan', '2026-04-24', '2026-04-25', 'event-info', 'umum'),
(157, 'Seminar HMPS', 'Kemahasiswaan', '2026-05-02', '2026-05-03', 'event-info', 'umum'),
(158, 'Survei Desa Abdimas Lembaga', 'Pengabdian', '2026-05-04', '2026-05-10', 'event-info', 'umum'),
(159, 'Workshop Modifikasi Program Berbasis Isu Bersama UKM', 'Workshop', '2026-05-07', '2026-05-08', 'event-info', 'umum'),
(160, 'Pembekalan Abdimas Lembaga', 'Pengabdian', '2026-05-11', '2026-05-16', 'event-info', 'umum'),
(161, 'Pelaksanaan Abdimas Lembaga', 'Pengabdian', '2026-05-17', '2026-05-23', 'event-success', 'umum'),
(162, 'Survei Kepuasan Pelaksanaan Abdimas', 'Evaluasi', '2026-05-18', '2026-05-24', 'event-warning', 'umum'),
(163, 'Temu Alumni Lintas Angkatan dan Inspirasi Karir', 'Alumni', '2026-05-29', '2026-05-30', 'event-success', 'umum'),
(164, 'Hari Pancasila (Parade Kebangsaan)', 'Nasional', '2026-06-01', '2026-06-02', 'event-important', 'umum'),
(165, 'Pendaftaran Calon Mahasiswa (Gel. III)', 'PMB', '2026-06-02', '2026-07-16', 'event-info', 'umum'),
(166, 'Tes Mahasiswa Baru Gelombang II 2026', 'PMB', '2026-06-04', '2026-06-05', 'event-important', 'umum'),
(167, 'Seminar Nasional dan Diseminasi Penelitian Dosen', 'Seminar', '2026-06-05', '2026-06-06', 'event-success', 'umum'),
(168, 'Pengumuman Hasil Tes Mahasiswa Baru Gelombang II', 'PMB', '2026-06-05', '2026-06-06', 'event-success', 'umum'),
(169, 'Monev pembelajaran akhir semester', 'Evaluasi', '2026-06-06', '2026-06-07', 'event-warning', 'umum'),
(170, 'Her-Registrasi / Daftar Ulang (Gel. II)', 'PMB', '2026-06-07', '2026-06-30', 'event-info', 'umum'),
(171, 'Konseling Mahasiswa Berisiko Studi', 'Konseling', '2026-06-08', '2026-06-15', 'event-warning', 'umum'),
(172, 'Survei Proses Pembelajaran dan Pelayanan Institusi', 'Evaluasi', '2026-06-08', '2026-06-21', 'event-info', 'umum'),
(173, 'Monev IKU', 'Evaluasi', '2026-06-10', '2026-06-11', 'event-warning', 'umum'),
(174, 'Test Masuk (Gel. II)', 'PMB', '2026-06-11', '2026-06-12', 'event-important', 'umum'),
(175, 'Ujian Akhir Semester (UAS)', 'Ujian', '2026-06-15', '2026-06-20', 'event-important', 'umum'),
(176, 'Survei KKN', 'KKN', '2026-06-17', '2026-06-21', 'event-info', 'umum'),
(177, 'Ujian Susulan UAS', 'Ujian', '2026-06-20', '2026-06-21', 'event-warning', 'umum'),
(178, 'Pendaftaran KKN', 'KKN', '2026-06-22', '2026-06-26', 'event-info', 'umum'),
(179, 'Raker STPM Santa Ursula', 'Rapat', '2026-06-23', '2026-06-26', 'event-important', 'umum'),
(180, 'Pembekalan KKN', 'KKN', '2026-06-26', '2026-07-01', 'event-info', 'umum'),
(181, 'Batas Akhir Pendaftaran Ujian Skripsi', 'Akademik', '2026-06-27', '2026-06-28', 'event-important', 'umum'),
(182, 'Batas penginputan Nilai UAS', 'Akademik', '2026-06-29', '2026-06-30', 'event-important', 'umum'),
(183, 'Peningkatan mutu laporan tugas akhir', 'Akademik', '2026-07-04', '2026-07-05', 'event-info', 'umum'),
(184, 'Monev pembelajaran akhir semester', 'Evaluasi', '2026-07-06', '2026-07-07', 'event-warning', 'umum'),
(185, 'Penguatan Akses Dunia Kerja', 'Karir', '2026-07-07', '2026-07-08', 'event-success', 'umum'),
(186, 'Batas Akhir Ujian Skripsi', 'Akademik', '2026-07-10', '2026-07-11', 'event-important', 'umum'),
(187, 'Pelepasan KKN', 'KKN', '2026-07-11', '2026-07-12', 'event-success', 'umum'),
(188, 'Pelaksanaan KKN', 'KKN', '2026-07-12', '2026-09-12', 'event-warning', 'umum'),
(189, 'Libur dosen', 'Libur', '2026-07-12', '2026-07-27', 'event-inverse', 'umum'),
(190, 'Pendaftaran Calon Mahasiswa (Gel. IV)', 'PMB', '2026-07-15', '2026-08-05', 'event-info', 'umum'),
(191, 'Test Masuk (Gel. III)', 'PMB', '2026-07-15', '2026-07-17', 'event-important', 'umum'),
(192, 'Pengumuman Hasil (Gel. III)', 'PMB', '2026-07-17', '2026-07-18', 'event-success', 'umum'),
(193, 'Her-Registrasi / Daftar Ulang (Gel. III)', 'PMB', '2026-07-19', '2026-07-31', 'event-info', 'umum'),
(194, 'Batas Akhir Ujian Skripsi', 'Akademik', '2026-07-22', '2026-07-23', 'event-important', 'umum'),
(195, 'Dokumentasi dan Ekspo Aktivitas Mahasiswa', 'Pameran', '2026-07-26', '2026-07-27', 'event-success', 'umum'),
(196, 'Penutupan semester Genap 2025/2026', 'Akademik', '2026-07-31', '2026-08-01', 'event-important', 'umum'),
(197, 'Yudisium Lulusan', 'Akademik', '2026-08-03', '2026-08-04', 'event-success', 'umum'),
(198, 'Test Masuk (Gel. IV)', 'PMB', '2026-08-05', '2026-08-07', 'event-important', 'umum'),
(199, 'Pengumuman Hasil (Gel. IV)', 'PMB', '2026-08-07', '2026-08-08', 'event-success', 'umum'),
(200, 'Her-Registrasi / Daftar Ulang (Gel. IV)', 'PMB', '2026-08-09', '2026-08-12', 'event-info', 'umum'),
(201, 'Monev KKN', 'KKN', '2026-08-14', '2026-08-16', 'event-warning', 'umum'),
(202, 'Survei Kepuasan KKN', 'Evaluasi', '2026-09-07', '2026-09-13', 'event-info', 'umum'),
(203, 'Penjemputan Peserta KKN', 'KKN', '2026-09-12', '2026-09-13', 'event-success', 'umum'),
(206, 'Rapat', 'Rapat Akreditas', '2025-12-14', '2025-12-15', 'event-info', 'umum'),
(207, 'Rapat Akreditasi', 'Pembahasan Sosiatri', '2025-12-12', '2025-12-12', 'event-info', 'umum');

-- --------------------------------------------------------

--
-- Table structure for table `kemahasiswaan_pusat_data`
--

CREATE TABLE `kemahasiswaan_pusat_data` (
  `id` int(11) NOT NULL,
  `kategori_data` varchar(50) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `file_lampiran` varchar(255) DEFAULT NULL,
  `tanggal` date NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kema_hmps`
--

CREATE TABLE `kema_hmps` (
  `id` int(11) NOT NULL,
  `prodi` varchar(50) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `fokus_program` longtext DEFAULT NULL,
  `file_struktur` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kema_kegiatan`
--

CREATE TABLE `kema_kegiatan` (
  `id` int(11) NOT NULL,
  `prodi` varchar(50) NOT NULL,
  `kategori_kegiatan` varchar(50) DEFAULT 'Kegiatan',
  `nama_kegiatan` varchar(200) NOT NULL,
  `tanggal` date NOT NULL,
  `tempat` varchar(150) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `file_gambar_webp` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kema_pengaduan`
--

CREATE TABLE `kema_pengaduan` (
  `id` int(11) NOT NULL,
  `nama_mahasiswa` varchar(150) NOT NULL,
  `nim` varchar(50) NOT NULL,
  `kategori_layanan` varchar(100) NOT NULL,
  `isi_pengaduan` text NOT NULL,
  `status` enum('Menunggu','Diproses','Selesai') DEFAULT 'Menunggu',
  `tanggapan_admin` text DEFAULT NULL,
  `tanggal_masuk` date NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kema_prestasi`
--

CREATE TABLE `kema_prestasi` (
  `id` int(11) NOT NULL,
  `prodi` varchar(50) NOT NULL,
  `nama_mahasiswa` varchar(150) NOT NULL,
  `nama_kegiatan` varchar(200) NOT NULL,
  `prestasi` varchar(100) NOT NULL,
  `tingkat` enum('Lokal','Nasional','Internasional') NOT NULL,
  `tahun` int(4) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `file_sertifikat` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kema_profil`
--

CREATE TABLE `kema_profil` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `konten_profil` text NOT NULL,
  `file_struktur` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kema_tracer`
--

CREATE TABLE `kema_tracer` (
  `id` int(11) NOT NULL,
  `prodi` varchar(50) NOT NULL,
  `link_kuesioner_alumni` varchar(255) DEFAULT '#',
  `link_laporan_statistik` varchar(255) DEFAULT '#',
  `link_forum_komunitas` varchar(255) DEFAULT '#',
  `link_kuesioner_user` varchar(255) DEFAULT '#'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kema_tracer_loker`
--

CREATE TABLE `kema_tracer_loker` (
  `id` int(11) NOT NULL,
  `prodi` varchar(50) NOT NULL,
  `posisi` varchar(150) NOT NULL,
  `perusahaan` varchar(150) NOT NULL,
  `deskripsi_pekerjaan` text DEFAULT NULL,
  `link_sumber` varchar(255) DEFAULT NULL,
  `file_brosur` varchar(255) DEFAULT NULL,
  `batas_waktu` date DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lp2m_dokumen`
--

CREATE TABLE `lp2m_dokumen` (
  `id` int(11) NOT NULL,
  `kategori_dokumen` varchar(50) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `file_dokumen` varchar(255) NOT NULL,
  `tanggal_upload` date NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lp2m_informasi`
--

CREATE TABLE `lp2m_informasi` (
  `id` int(11) NOT NULL,
  `kategori_info` varchar(50) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `konten` longtext DEFAULT NULL,
  `file_gambar` varchar(255) DEFAULT NULL,
  `link_eksternal` varchar(255) DEFAULT NULL,
  `tanggal` date NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lp2m_mitra`
--

CREATE TABLE `lp2m_mitra` (
  `id` int(11) NOT NULL,
  `kategori_mitra` enum('penelitian','abdimas','mou') NOT NULL,
  `nama_mitra` varchar(200) NOT NULL,
  `bentuk_kerjasama` varchar(255) NOT NULL,
  `file_mou` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lpm_dokumen`
--

CREATE TABLE `lpm_dokumen` (
  `id` int(11) NOT NULL,
  `kategori_dokumen` varchar(50) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `file_dokumen` varchar(255) NOT NULL,
  `tanggal_upload` date NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `perpus_dokumen`
--

CREATE TABLE `perpus_dokumen` (
  `id` int(11) NOT NULL,
  `kategori_dokumen` varchar(50) NOT NULL,
  `judul_dokumen` varchar(255) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `file_dokumen` varchar(255) NOT NULL,
  `tanggal_upload` date NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `perpus_koleksi`
--

CREATE TABLE `perpus_koleksi` (
  `id` int(11) NOT NULL,
  `kategori_koleksi` varchar(50) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `penulis` varchar(150) NOT NULL,
  `penerbit_kampus` varchar(150) DEFAULT NULL,
  `tahun_terbit` int(4) NOT NULL,
  `cover_gambar` varchar(255) DEFAULT NULL,
  `file_lampiran` varchar(255) DEFAULT NULL,
  `stok_fisik` int(5) DEFAULT 0,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prodi_akreditasi`
--

CREATE TABLE `prodi_akreditasi` (
  `id` int(11) NOT NULL,
  `prodi` enum('pemerintahan','sosiatri') NOT NULL,
  `nilai_akreditasi` varchar(10) NOT NULL,
  `no_sk` varchar(100) DEFAULT NULL,
  `tahun_sk` int(4) DEFAULT NULL,
  `masa_berlaku` date DEFAULT NULL,
  `file_sertifikat` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prodi_akreditasi`
--

INSERT INTO `prodi_akreditasi` (`id`, `prodi`, `nilai_akreditasi`, `no_sk`, `tahun_sk`, `masa_berlaku`, `file_sertifikat`, `updated_at`) VALUES
(1, 'sosiatri', 'Baik', '018/AK.03.05/2026 ', 2026, '2026-05-19', 'Sertifikat_Akreditasi_sosiatri_2026_1779168026.pdf', '2026-05-19 05:21:07');

-- --------------------------------------------------------

--
-- Table structure for table `prodi_berita`
--

CREATE TABLE `prodi_berita` (
  `id` int(11) NOT NULL,
  `prodi` varchar(50) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `konten` longtext NOT NULL,
  `unit_kategori` varchar(50) DEFAULT NULL,
  `penulis` varchar(100) NOT NULL,
  `tanggal_publikasi` date NOT NULL,
  `gambar_thumbnail` varchar(255) DEFAULT NULL,
  `status` enum('Publish','Draft') DEFAULT 'Publish',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prodi_berita`
--

INSERT INTO `prodi_berita` (`id`, `prodi`, `judul`, `konten`, `unit_kategori`, `penulis`, `tanggal_publikasi`, `gambar_thumbnail`, `status`, `updated_at`) VALUES
(4, 'prodi_pemerintahan', 'Calon Mahasiswa Baru STPM Santa Ursula Jalani Ujian Masuk Gelombang 4', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>', NULL, 'Agustinus Surya Novelos Bale Leda Veregrent', '2026-05-15', 'berita_prodi_pemerintahan_1778821038.jpg', 'Publish', '2026-05-15 04:57:18'),
(5, 'prodi_pemerintahan', 'Perkuliahan Tahun Akademik 2025/2026 Dimulai', '<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.&nbsp;<br><br>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p><p>&nbsp;</p>', NULL, 'Agustinus Surya Novelos Bale Leda Veregrent', '2026-05-15', 'berita_prodi_pemerintahan_1778821062.jpg', 'Publish', '2026-05-15 04:57:42'),
(6, 'prodi_pemerintahan', 'Menghidupi Semangat Kebangsaan, Mahasiswa STPM Santa Ursula Ikuti Parade Pancasila 2026', '<p>Mahasiswa Sekolah Tinggi Pembangunan Masyarakat (STPM) Santa Ursula Ende turut ambil bagian dalam rangkaian peringatan Hari Lahir Pancasila Tahun 2026 yang diselenggarakan di Kota Ende. Sebelum mengikuti Parade Pancasila, para mahasiswa berkesempatan melakukan kunjungan edukatif dan reflektif ke Rumah Pengasingan Bung Karno serta Situs Perenungan Pancasila, dua lokasi bersejarah yang memiliki keterkaitan erat dengan lahirnya dasar negara Indonesia.</p><p>Kunjungan tersebut menjadi bagian dari proses pembelajaran kontekstual bagi mahasiswa untuk mengenal lebih dekat sejarah perjuangan bangsa, khususnya perjalanan pemikiran Soekarno selama masa pengasingannya di Ende pada tahun 1934–1938. Di kota inilah Bung Karno melakukan berbagai perenungan mendalam mengenai kehidupan berbangsa dan bernegara yang kemudian menjadi inspirasi lahirnya nilai-nilai luhur Pancasila.</p><p>Dalam suasana penuh refleksi, mahasiswa diajak memahami bahwa Pancasila tidak lahir secara instan, melainkan melalui proses pemikiran yang panjang dan mendalam. Kunjungan ke situs-situs bersejarah tersebut memberikan pengalaman langsung kepada mahasiswa untuk melihat dan merasakan jejak sejarah yang menjadi bagian penting dalam perjalanan bangsa Indonesia.</p><p>Setelah mengikuti kegiatan reflektif tersebut, mahasiswa STPM Santa Ursula berpartisipasi dalam Parade Pancasila yang diselenggarakan pada 30 Mei 2026. Kegiatan yang berlangsung meriah itu diikuti oleh berbagai unsur masyarakat, mulai dari pemerintah daerah, lembaga pendidikan, organisasi kemasyarakatan, komunitas budaya, hingga berbagai elemen masyarakat dari Kabupaten Ende dan sekitarnya.</p><p>Dalam parade tersebut, mahasiswa STPM Santa Ursula tampil mengenakan beragam pakaian adat Nusantara sebagai simbol penghargaan terhadap keberagaman budaya Indonesia. Kehadiran para mahasiswa bersama ribuan peserta lainnya mencerminkan semangat persatuan dan kebhinekaan yang menjadi salah satu nilai fundamental dalam kehidupan berbangsa dan bernegara.</p><p>Partisipasi STPM Santa Ursula dalam Parade Pancasila merupakan bentuk dukungan terhadap upaya pelestarian nilai-nilai kebangsaan sekaligus penguatan wawasan kebhinekaan di kalangan generasi muda. Sebagai perguruan tinggi yang berfokus pada pembangunan masyarakat, STPM Santa Ursula memandang penting penguatan nilai-nilai Pancasila sebagai fondasi dalam membentuk warga negara yang bertanggung jawab, toleran, dan memiliki kepedulian terhadap kehidupan bermasyarakat.</p><p>Melalui keterlibatan dalam kegiatan ini, mahasiswa tidak hanya memperoleh pemahaman historis mengenai lahirnya Pancasila, tetapi juga diajak untuk menghayati makna persatuan, gotong royong, dan penghargaan terhadap keberagaman yang menjadi identitas bangsa Indonesia.</p><p>Kegiatan ini menjadi pengalaman berharga bagi mahasiswa STPM Santa Ursula dalam memperkuat wawasan kebangsaan sekaligus meneguhkan komitmen untuk turut berkontribusi dalam pembangunan masyarakat yang berlandaskan nilai-nilai Pancasila di tengah dinamika kehidupan bangsa yang terus berkembang.</p>', NULL, 'Agustinus Surya Novelos Bale Leda Veregrent', '2026-06-23', 'berita_prodi_pemerintahan_1782180814.jpeg', 'Publish', '2026-06-23 02:13:34'),
(7, 'prodi_pemerintahan', 'STPM Santa Ursula Ende dan RRI Ende Gelar Dialog Interaktif tentang Ketahanan Keluarga di Tengah Kerentanan Sosial Ekonomi', '<p>Sekolah Tinggi Pembangunan Masyarakat (STPM) Santa Ursula Ende kembali menunjukkan komitmennya sebagai kampus yang aktif merespons berbagai persoalan sosial kemasyarakatan melalui penyelenggaraan Dialog Interaktif Luar Studio bekerja sama dengan Radio Republik Indonesia (RRI) Ende. Kegiatan bertema <i>“Kerentanan Ekonomi dan Sosial terhadap Fondasi Keluarga”</i> tersebut dilaksanakan pada Senin, 25 Mei 2026, bertempat di Aula STPM Santa Ursula Ende.</p><p>Kegiatan ini diikuti ratusan mahasiswa dari berbagai program studi di lingkungan STPM Santa Ursula Ende yang antusias mengikuti jalannya dialog sejak awal hingga akhir kegiatan. Dialog interaktif tersebut menjadi bagian dari penguatan budaya akademik kampus dalam menghadirkan ruang diskusi ilmiah dan edukasi publik mengenai isu-isu sosial yang berkembang di masyarakat.</p><p>Sebagai institusi pendidikan tinggi yang berfokus pada pembangunan masyarakat, STPM Santa Ursula Ende terus mendorong mahasiswa untuk memiliki kepekaan sosial, kemampuan berpikir kritis, serta kepedulian terhadap berbagai persoalan kemasyarakatan yang terjadi di tengah kehidupan masyarakat saat ini.</p><p>Dialog menghadirkan tiga narasumber yang memiliki latar belakang akademik dan pengalaman sosial yang relevan, yakni dosen STPM Santa Ursula Ende sekaligus mahasiswa Program Doktoral Pembangunan Sosial dan Kesejahteraan Universitas Gadjah Mada, Domitius Pau; Anggota DPRD Kabupaten Nagekeo, Elias Cima; serta pegiat Migrant CARE, Maximus Deki.</p><p>Dalam dialog tersebut, para narasumber membahas berbagai tantangan sosial ekonomi yang dinilai mempengaruhi ketahanan keluarga di tengah perubahan sosial yang semakin kompleks. Isu kemiskinan, migrasi tenaga kerja, tekanan ekonomi rumah tangga, hingga perubahan pola relasi keluarga menjadi topik utama yang mendapat perhatian peserta.</p><p>Dosen STPM Santa Ursula Ende, Domitius Pau, dalam pemaparannya menegaskan bahwa keluarga merupakan fondasi utama dalam pembangunan masyarakat sehingga penguatan ketahanan keluarga menjadi tanggung jawab bersama, baik pemerintah, lembaga pendidikan, maupun masyarakat. Menurutnya, perguruan tinggi memiliki peran strategis dalam membangun kesadaran sosial generasi muda melalui pendidikan, penelitian, dan pengabdian kepada masyarakat.</p><p>Sementara itu, Elias Cima menyoroti pentingnya kebijakan pembangunan yang berpihak pada kesejahteraan masyarakat dan perlindungan keluarga. Sedangkan Maximus Deki membahas fenomena migrasi tenaga kerja dan dampaknya terhadap kondisi sosial keluarga di wilayah Flores dan Nusa Tenggara Timur.</p><p>Kegiatan berlangsung secara dinamis melalui sesi diskusi dan tanya jawab interaktif antara mahasiswa dan para narasumber. Berbagai pertanyaan kritis dan reflektif disampaikan mahasiswa terkait persoalan sosial ekonomi, ketahanan keluarga, serta tantangan pembangunan masyarakat di era modern.</p><p>Melalui kegiatan ini, STPM Santa Ursula Ende kembali menegaskan perannya sebagai kampus yang tidak hanya berfokus pada pengembangan akademik, tetapi juga aktif membangun ruang pembelajaran sosial yang kontekstual dan relevan dengan kebutuhan masyarakat. Dialog interaktif tersebut diharapkan mampu memperluas wawasan mahasiswa, memperkuat kepedulian sosial generasi muda, serta mendorong lahirnya pemikiran-pemikiran kritis dalam mendukung pembangunan masyarakat yang berkelanjutan.</p><p>Kerja sama antara STPM Santa Ursula Ende dan RRI Ende juga diharapkan dapat terus berlanjut melalui berbagai program edukasi publik lainnya sebagai bagian dari kontribusi bersama dalam meningkatkan literasi sosial dan kesadaran masyarakat terhadap isu-isu pembangunan sosial di daerah.</p>', NULL, 'Agustinus Surya Novelos Bale Leda Veregrent', '2026-06-23', 'berita_prodi_pemerintahan_1782180878.jpeg', 'Publish', '2026-06-23 02:14:38'),
(8, 'prodi_pemerintahan', 'STPM Santa Ursula Ende dan RRI Ende Gelar Dialog Interaktif tentang Ketahanan Keluarga di Tengah Kerentanan Sosial Ekonomi', '<p>Sekolah Tinggi Pembangunan Masyarakat (STPM) Santa Ursula Ende kembali menunjukkan komitmennya sebagai kampus yang aktif merespons berbagai persoalan sosial kemasyarakatan melalui penyelenggaraan Dialog Interaktif Luar Studio bekerja sama dengan Radio Republik Indonesia (RRI) Ende. Kegiatan bertema <i>“Kerentanan Ekonomi dan Sosial terhadap Fondasi Keluarga”</i> tersebut dilaksanakan pada Senin, 25 Mei 2026, bertempat di Aula STPM Santa Ursula Ende.</p><p>Kegiatan ini diikuti ratusan mahasiswa dari berbagai program studi di lingkungan STPM Santa Ursula Ende yang antusias mengikuti jalannya dialog sejak awal hingga akhir kegiatan. Dialog interaktif tersebut menjadi bagian dari penguatan budaya akademik kampus dalam menghadirkan ruang diskusi ilmiah dan edukasi publik mengenai isu-isu sosial yang berkembang di masyarakat.</p><p>Sebagai institusi pendidikan tinggi yang berfokus pada pembangunan masyarakat, STPM Santa Ursula Ende terus mendorong mahasiswa untuk memiliki kepekaan sosial, kemampuan berpikir kritis, serta kepedulian terhadap berbagai persoalan kemasyarakatan yang terjadi di tengah kehidupan masyarakat saat ini.</p><p>Dialog menghadirkan tiga narasumber yang memiliki latar belakang akademik dan pengalaman sosial yang relevan, yakni dosen STPM Santa Ursula Ende sekaligus mahasiswa Program Doktoral Pembangunan Sosial dan Kesejahteraan Universitas Gadjah Mada, Domitius Pau; Anggota DPRD Kabupaten Nagekeo, Elias Cima; serta pegiat Migrant CARE, Maximus Deki.</p><p>Dalam dialog tersebut, para narasumber membahas berbagai tantangan sosial ekonomi yang dinilai mempengaruhi ketahanan keluarga di tengah perubahan sosial yang semakin kompleks. Isu kemiskinan, migrasi tenaga kerja, tekanan ekonomi rumah tangga, hingga perubahan pola relasi keluarga menjadi topik utama yang mendapat perhatian peserta.</p><p>Dosen STPM Santa Ursula Ende, Domitius Pau, dalam pemaparannya menegaskan bahwa keluarga merupakan fondasi utama dalam pembangunan masyarakat sehingga penguatan ketahanan keluarga menjadi tanggung jawab bersama, baik pemerintah, lembaga pendidikan, maupun masyarakat. Menurutnya, perguruan tinggi memiliki peran strategis dalam membangun kesadaran sosial generasi muda melalui pendidikan, penelitian, dan pengabdian kepada masyarakat.</p><p>Sementara itu, Elias Cima menyoroti pentingnya kebijakan pembangunan yang berpihak pada kesejahteraan masyarakat dan perlindungan keluarga. Sedangkan Maximus Deki membahas fenomena migrasi tenaga kerja dan dampaknya terhadap kondisi sosial keluarga di wilayah Flores dan Nusa Tenggara Timur.</p><p>Kegiatan berlangsung secara dinamis melalui sesi diskusi dan tanya jawab interaktif antara mahasiswa dan para narasumber. Berbagai pertanyaan kritis dan reflektif disampaikan mahasiswa terkait persoalan sosial ekonomi, ketahanan keluarga, serta tantangan pembangunan masyarakat di era modern.</p><p>Melalui kegiatan ini, STPM Santa Ursula Ende kembali menegaskan perannya sebagai kampus yang tidak hanya berfokus pada pengembangan akademik, tetapi juga aktif membangun ruang pembelajaran sosial yang kontekstual dan relevan dengan kebutuhan masyarakat. Dialog interaktif tersebut diharapkan mampu memperluas wawasan mahasiswa, memperkuat kepedulian sosial generasi muda, serta mendorong lahirnya pemikiran-pemikiran kritis dalam mendukung pembangunan masyarakat yang berkelanjutan.</p><p>Kerja sama antara STPM Santa Ursula Ende dan RRI Ende juga diharapkan dapat terus berlanjut melalui berbagai program edukasi publik lainnya sebagai bagian dari kontribusi bersama dalam meningkatkan literasi sosial dan kesadaran masyarakat terhadap isu-isu pembangunan sosial di daerah.</p>', NULL, 'Agustinus Surya Novelos Bale Leda Veregrent', '2026-06-23', 'berita_prodi_pemerintahan_1782180978.jpeg', 'Publish', '2026-06-23 02:16:18'),
(9, 'prodi_pemerintahan', 'STPM Santa Ursula Terima Kunjungan Tim PKK Kabupaten Ende dalam Sosialisasi Program JUPITER', '<p>Sekolah Tinggi Pembangunan Masyarakat (STPM) Santa Ursula Ende menerima kunjungan Ketua Tim Penggerak PKK Kabupaten Ende, Cici M. Badeoda, bersama jajaran Polres Ende serta organisasi Bhayangkari Cabang Ende dalam rangka kegiatan sosialisasi bertajuk “JUDI DAN PINJAMAN ONLINE TERATASI (JUPITER)”. Kegiatan tersebut dilaksanakan di Aula kampus STPM Santa Ursula (13/03) sebagai bagian dari upaya bersama berbagai pihak dalam meningkatkan kesadaran masyarakat, khususnya generasi muda, terhadap bahaya praktik judi online dan pinjaman online ilegal.<br>Sosialisasi ini merupakan bentuk sinergi antara pemerintah daerah, aparat kepolisian, organisasi kemasyarakatan, serta lembaga pendidikan tinggi dalam mencegah dan menanggulangi dampak negatif dari praktik-praktik digital yang merugikan masyarakat. Dalam beberapa tahun terakhir, fenomena judi online dan pinjaman online ilegal menjadi persoalan sosial yang semakin mengkhawatirkan karena berpotensi menimbulkan masalah ekonomi, sosial, bahkan psikologis bagi masyarakat.</p><p>Dalam sambutannya, Ketua TP-PKK Kabupaten Ende menekankan pentingnya literasi digital dan kesadaran hukum di kalangan generasi muda. Ia menyampaikan bahwa mahasiswa sebagai kelompok intelektual memiliki peran strategis dalam menyebarluaskan informasi yang benar kepada masyarakat mengenai risiko dan konsekuensi dari keterlibatan dalam aktivitas judi online maupun penggunaan layanan pinjaman online yang tidak terdaftar secara resmi.</p><p>Pihak Polres Ende dalam kesempatan tersebut juga memberikan pemaparan terkait berbagai modus yang kerap digunakan dalam praktik judi online dan pinjaman online ilegal, termasuk dampak hukum yang dapat ditimbulkan. Selain itu, peserta diberikan pemahaman mengenai langkah-langkah preventif yang dapat dilakukan masyarakat untuk menghindari jeratan praktik-praktik tersebut.</p><p>Kegiatan sosialisasi ini dihadiri oleh mahasiswa dan sivitas akademika Sekolah Tinggi Pembangunan Masyarakat Santa Ursula yang mengikuti rangkaian acara dengan antusias. Diskusi interaktif antara narasumber dan peserta turut memperkaya pemahaman mahasiswa mengenai dinamika persoalan sosial yang muncul seiring dengan perkembangan teknologi digital.</p><p>Sebagai institusi pendidikan tinggi yang memiliki fokus pada pengembangan kapasitas masyarakat, STPM Santa Ursula memandang kegiatan sosialisasi ini sebagai bagian penting dari proses pembelajaran kontekstual bagi mahasiswa. Melalui kegiatan tersebut, mahasiswa tidak hanya memperoleh pemahaman teoritis, tetapi juga wawasan praktis mengenai berbagai persoalan sosial yang dihadapi masyarakat.</p><p>Melalui kolaborasi ini, STPM Santa Ursula Ende berharap mahasiswa dapat menjadi agen perubahan yang mampu berperan aktif dalam memberikan edukasi kepada masyarakat terkait bahaya judi online dan pinjaman online ilegal. Dengan demikian, upaya pencegahan dapat dilakukan secara lebih luas melalui pendekatan edukatif dan pemberdayaan masyarakat.</p>', NULL, 'Agustinus Surya Novelos Bale Leda Veregrent', '2026-06-23', 'berita_prodi_pemerintahan_1782181077.jpg', 'Publish', '2026-06-23 02:17:57'),
(10, 'prodi_pemerintahan', 'Dies Natalis ke-54, STPM Santa Ursula Umumkan Pemenang Lomba Esai Nasional Bertema Pembangunan Integratif dan Digital', '<p>Sekolah Tinggi Pembangunan Masyarakat (STPM) Santa Ursula mengumumkan secara resmi pemenang Lomba Menulis Esai Tingkat Nasional dalam rangka Dies Natalis ke-55. Kompetisi ini menjadi salah satu agenda akademik unggulan kampus yang mendorong lahirnya gagasan kritis generasi muda terkait pembangunan masyarakat di era demokrasi dan digitalisasi.</p><p>Mengusung tema <i>“Merajut Pembangunan Masyarakat yang Integratif, Solutif dan Ekologis Berbasis Demokrasi dan Digitalisasi”</i>, lomba ini diikuti oleh peserta dari berbagai daerah di Indonesia. Para peserta ditantang untuk merumuskan ide-ide konstruktif yang tidak hanya relevan secara teoritis, tetapi juga aplikatif dalam menjawab persoalan sosial di tengah dinamika perubahan global.</p><p>Setelah melalui proses seleksi dan penilaian oleh dewan juri, enam peserta ditetapkan sebagai pemenang dengan perolehan nilai tertinggi sebagai berikut:</p><p><strong>Peringkat 1:</strong> Martina Rianty Randa Ma</p><p><strong>Peringkat 2:</strong> Angelina Widia Putri</p><p><strong>Peringkat 3:</strong> Rauland Ismail</p><p><strong>Peringkat 4:</strong> Candra Winata Rangga</p><p><strong>Peringkat 5:</strong> Nadia Cahaya Lauren</p><p><strong>Peringkat 6:</strong> Wardania Putri Sarjan</p><p>Panitia menyampaikan bahwa pemenang peringkat 1 hingga 4 akan menerima uang pembinaan dan sertifikat penghargaan, sementara peringkat 5 dan 6 memperoleh sertifikat atau e-sertifikat. Seluruh sertifikat akan dikirimkan melalui email kepada masing-masing peserta.</p><p>Penyerahan penghargaan akan dilaksanakan pada acara puncak Dies Natalis ke-55 STPM Santa Ursula pada 4 Maret 2026. Bagi pemenang yang tidak dapat hadir secara langsung, panitia akan menyampaikan informasi lanjutan melalui email.</p><p>Selain itu, rekapan nilai serta catatan dewan juri akan dibagikan kepada peserta sebagai bentuk transparansi dan pembelajaran. Panitia juga menegaskan bahwa keputusan dewan juri bersifat final dan tidak dapat diganggu gugat.</p><p>Melalui penyelenggaraan lomba esai tingkat nasional ini, STPM Santa Ursula berharap dapat terus berkontribusi dalam membangun tradisi akademik yang kritis, reflektif, dan solutif. Kegiatan ini sekaligus menjadi bukti komitmen kampus dalam mendorong penguatan literasi, pengembangan pemikiran strategis, serta partisipasi aktif generasi muda dalam pembangunan masyarakat yang berkelanjutan.</p>', NULL, 'Agustinus Surya Novelos Bale Leda Veregrent', '2026-06-23', 'berita_prodi_pemerintahan_1782181225.png', 'Publish', '2026-06-23 02:20:25'),
(11, 'prodi_sosiatri', 'Mahasiswa Program Studi Pembangunan Sosial STPM Santa Ursula Gelar Pelatihan Pemasaran Digital bagi Kelompok Tenun Desa Nggela', '<p><strong>Ende, 15 Juni 2026</strong> – Mahasiswa Program Studi Pembangunan Sosial STPM Santa Ursula Ende melaksanakan kegiatan pelatihan pemasaran digital bagi Kelompok Tenun Desa Nggela sebagai bagian dari implementasi Tri Dharma Perguruan Tinggi, khususnya pengabdian kepada masyarakat.</p><p>Kegiatan yang berlangsung di Balai Desa Nggela tersebut diikuti oleh para penenun lokal, pelaku UMKM, serta pemuda desa yang memiliki minat dalam pengembangan usaha berbasis digital. Pelatihan ini bertujuan meningkatkan kapasitas masyarakat dalam memanfaatkan teknologi informasi untuk memperluas akses pasar produk tenun tradisional.</p><p>Dalam kegiatan tersebut, mahasiswa memberikan materi mengenai fotografi produk menggunakan telepon pintar, pembuatan konten promosi di media sosial, strategi pemasaran digital, serta pemanfaatan platform marketplace untuk meningkatkan penjualan produk lokal. Peserta juga mendapatkan kesempatan untuk mempraktikkan secara langsung pembuatan konten promosi dan pengelolaan akun media sosial usaha mereka.</p><p>Ketua Program Studi Pembangunan Sosial menjelaskan bahwa kegiatan ini merupakan salah satu bentuk kontribusi mahasiswa dalam mendukung pemberdayaan ekonomi masyarakat desa melalui pendekatan pembangunan sosial. Program Studi Pembangunan Sosial sendiri berfokus pada pengembangan masyarakat, kebijakan sosial, dan pemberdayaan komunitas dalam rangka meningkatkan kesejahteraan masyarakat.</p><p>Menurut salah satu peserta, pelatihan ini memberikan pengetahuan baru mengenai cara mempromosikan produk tenun secara lebih luas. Selama ini pemasaran produk masih dilakukan secara konvensional dan bergantung pada pembeli yang datang langsung ke desa.</p><p>\"Kami sangat terbantu dengan pelatihan ini. Sekarang kami mengetahui cara mengambil foto produk yang menarik dan memasarkan hasil tenun melalui media sosial,\" ungkap salah satu anggota kelompok tenun.</p><p>Melalui kegiatan ini, mahasiswa Program Studi Pembangunan Sosial berharap masyarakat mampu mengembangkan usaha secara mandiri, meningkatkan pendapatan keluarga, serta menjaga keberlanjutan warisan budaya tenun tradisional agar tetap dikenal oleh generasi muda dan masyarakat luas.</p><p>Kegiatan ditutup dengan sesi diskusi, pendampingan teknis, dan foto bersama antara mahasiswa, pemerintah desa, serta peserta pelatihan sebagai bentuk komitmen bersama dalam mendukung pengembangan ekonomi masyarakat berbasis potensi lokal.</p><p><strong>Penulis:</strong> Tim Humas Program Studi Pembangunan Sosial STPM Santa Ursula Ende.</p>', NULL, 'Yulita Eme', '2026-06-23', 'berita_prodi_sosiatri_1782198174.jpg', 'Publish', '2026-06-23 07:02:54');

-- --------------------------------------------------------

--
-- Table structure for table `prodi_dokumen_akademik`
--

CREATE TABLE `prodi_dokumen_akademik` (
  `id` int(11) NOT NULL,
  `prodi` enum('pemerintahan','sosiatri') NOT NULL,
  `kategori` enum('jadwal','buku','skripsi') NOT NULL,
  `judul_dokumen` varchar(200) NOT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `file_dokumen` varchar(255) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prodi_dokumen_resmi`
--

CREATE TABLE `prodi_dokumen_resmi` (
  `id` int(11) NOT NULL,
  `prodi` varchar(50) NOT NULL,
  `kategori` enum('pedoman','panduan','laporan','sop') NOT NULL,
  `judul_dokumen` varchar(200) NOT NULL,
  `keterangan` varchar(200) DEFAULT NULL,
  `file_dokumen` varchar(255) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prodi_dosen_tampil`
--

CREATE TABLE `prodi_dosen_tampil` (
  `id` int(11) NOT NULL,
  `prodi` enum('pemerintahan','sosiatri') NOT NULL,
  `dosen_id` int(11) NOT NULL,
  `jabatan_web` varchar(100) DEFAULT NULL,
  `keahlian_web` varchar(255) DEFAULT NULL,
  `foto_web` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prodi_dosen_tampil`
--

INSERT INTO `prodi_dosen_tampil` (`id`, `prodi`, `dosen_id`, `jabatan_web`, `keahlian_web`, `foto_web`) VALUES
(1, 'pemerintahan', 45, 'wakil ketua bidang akademik', 'Sebagai dosen Pembangunan Sosial', 'web_dosen_45_1779166668.jpeg'),
(2, 'sosiatri', 44, 'Ketua STPM Santa Ursula', 'Sosiologi pendesaan', 'web_dosen_44_1779166764.png');

-- --------------------------------------------------------

--
-- Table structure for table `prodi_info_agenda`
--

CREATE TABLE `prodi_info_agenda` (
  `id` int(11) NOT NULL,
  `prodi` varchar(50) NOT NULL,
  `kategori` enum('seminar','pengumuman','agenda') NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `lokasi` varchar(255) DEFAULT NULL,
  `file_lampiran` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prodi_kerjasama`
--

CREATE TABLE `prodi_kerjasama` (
  `id` int(11) NOT NULL,
  `prodi` varchar(50) NOT NULL,
  `kategori` enum('pemerintah','sosial','mbkm','penelitian') NOT NULL,
  `nama_mitra` varchar(200) NOT NULL,
  `judul_kerjasama` varchar(255) NOT NULL,
  `tanggal_mulai` date DEFAULT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `file_dokumen` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prodi_kurikulum`
--

CREATE TABLE `prodi_kurikulum` (
  `id` int(11) NOT NULL,
  `prodi` enum('pemerintahan','sosiatri') NOT NULL,
  `semester` int(2) NOT NULL,
  `kode_mk` varchar(20) NOT NULL,
  `nama_mk` varchar(150) NOT NULL,
  `sks` int(2) NOT NULL,
  `jenis_mk` enum('Wajib','Pilihan') NOT NULL DEFAULT 'Wajib',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prodi_kurikulum`
--

INSERT INTO `prodi_kurikulum` (`id`, `prodi`, `semester`, `kode_mk`, `nama_mk`, `sks`, `jenis_mk`, `updated_at`) VALUES
(1, 'pemerintahan', 1, 'UNI1001', 'Pembangunan Sosial', 3, 'Wajib', '2026-05-20 04:56:28');

-- --------------------------------------------------------

--
-- Table structure for table `prodi_mitra_informasi`
--

CREATE TABLE `prodi_mitra_informasi` (
  `id` int(11) NOT NULL,
  `prodi` varchar(50) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `konten_utama` text DEFAULT NULL,
  `konten_tambahan_1` text DEFAULT NULL,
  `konten_tambahan_2` text DEFAULT NULL,
  `file_lampiran_1` varchar(255) DEFAULT NULL,
  `file_lampiran_2` varchar(255) DEFAULT NULL,
  `link_tautan` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prodi_profil`
--

CREATE TABLE `prodi_profil` (
  `id` int(11) NOT NULL,
  `prodi` varchar(50) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `konten_1` text DEFAULT NULL,
  `konten_2` text DEFAULT NULL,
  `file_gambar` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prodi_profil`
--

INSERT INTO `prodi_profil` (`id`, `prodi`, `kategori`, `judul`, `konten_1`, `konten_2`, `file_gambar`, `updated_at`) VALUES
(1, 'pemerintahan', 'visi_misi', NULL, 'Menjadi Program Studi Ilmu Pemerintahan yang unggul, inovatif, dan berdaya saing dalam pengembangan ilmu pemerintahan berbasis tata kelola yang baik (good governance) serta berorientasi pada pelayanan publik ', '1. Menyelenggarakan pendidikan dan pengajaran di bidang ilmu pemerintahan yang berkualitas, adaptif terhadap perkembangan zaman, serta berbasis teknologi informasi.\r\n2. Mengembangkan penelitian di bidang pemerintahan, politik, kebijakan publik, dan administrasi pemerintahan yang berkontribusi pada pemecahan masalah masyarakat.\r\n3. Melaksanakan pengabdian kepada masyarakat sebagai bentuk implementasi keilmuan untuk mendukung pembangunan daerah dan peningkatan kesejahteraan masyarakat.\r\nMembangun kerja sama dengan instansi pemerintah, swasta, dan lembaga non-pemerintah dalam rangka penguatan kapasitas kelembagaan dan pengembangan keilmuan.\r\nMencetak lulusan yang profesional, berintegritas, memiliki jiwa kepemimpinan, serta mampu beradaptasi dalam dinamika pemerintahan dan politik.', NULL, '2026-05-19 03:26:15'),
(2, 'sosiatri', 'visi_misi', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of ', '3. Melaksanakan pengabdian kepada masyarakat sebagai bentuk implementasi keilmuan untuk mendukung pembangunan daerah dan peningkatan kesejahteraan masyarakat.\r\nMembangun kerja sama dengan instansi pemerintah, swasta, dan lembaga non-pemerintah dalam rangka penguatan kapasitas kelembagaan dan pengembangan keilmuan.\r\nMencetak lulusan yang profesional, berintegritas, memiliki jiwa kepemimpinan, serta mampu beradaptasi dalam dinamika pemerintahan dan politik.', NULL, '2026-05-19 03:28:02');

-- --------------------------------------------------------

--
-- Table structure for table `prodi_profil_dosen_desc`
--

CREATE TABLE `prodi_profil_dosen_desc` (
  `id` int(11) NOT NULL,
  `prodi` enum('pemerintahan','sosiatri') NOT NULL,
  `deskripsi_singkat` text DEFAULT NULL,
  `file_gambar_bersama` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prodi_publikasi_visual`
--

CREATE TABLE `prodi_publikasi_visual` (
  `id` int(11) NOT NULL,
  `prodi` varchar(50) NOT NULL,
  `kategori` enum('jurnal','galeri') NOT NULL,
  `judul` varchar(200) NOT NULL,
  `deskripsi_issn` text DEFAULT NULL,
  `tautan_link` varchar(255) DEFAULT NULL,
  `tanggal_kegiatan` date DEFAULT NULL,
  `file_gambar_webp` varchar(255) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prodi_publikasi_visual`
--

INSERT INTO `prodi_publikasi_visual` (`id`, `prodi`, `kategori`, `judul`, `deskripsi_issn`, `tautan_link`, `tanggal_kegiatan`, `file_gambar_webp`, `updated_at`) VALUES
(15, 'pemerintahan', 'galeri', 'footo PMB SPTM Sanur', 'foto kegiantan pmb stpm sanata ursula tahun akademik 2026/2027', '', '2026-05-20', 'pemerintahan_galeri_1779258058.webp', '2026-05-20 06:20:59');

-- --------------------------------------------------------

--
-- Table structure for table `prodi_riset_abdimas`
--

CREATE TABLE `prodi_riset_abdimas` (
  `id` int(11) NOT NULL,
  `prodi` varchar(50) NOT NULL,
  `kategori` enum('penelitian_dosen','riset_mahasiswa','abdimas') NOT NULL,
  `judul` varchar(255) NOT NULL,
  `personil_utama` varchar(150) NOT NULL,
  `personil_pendamping` varchar(150) DEFAULT NULL,
  `keterangan_lokasi` varchar(200) DEFAULT NULL,
  `tahun` int(4) NOT NULL,
  `file_dokumen` varchar(255) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prodi_sejarah`
--

CREATE TABLE `prodi_sejarah` (
  `id` int(11) NOT NULL,
  `prodi` enum('pemerintahan','sosiatri') NOT NULL,
  `konten_sejarah` longtext NOT NULL,
  `file_gambar` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prodi_sejarah`
--

INSERT INTO `prodi_sejarah` (`id`, `prodi`, `konten_sejarah`, `file_gambar`, `updated_at`) VALUES
(1, 'pemerintahan', '<p>orem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&nbsp; It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', 'pemerintahan_sejarah_1779168233.png', '2026-05-20 01:55:08');

-- --------------------------------------------------------

--
-- Table structure for table `prodi_sejarah_galeri`
--

CREATE TABLE `prodi_sejarah_galeri` (
  `id` int(11) NOT NULL,
  `sejarah_id` int(11) NOT NULL,
  `file_gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prodi_sejarah_galeri`
--

INSERT INTO `prodi_sejarah_galeri` (`id`, `sejarah_id`, `file_gambar`) VALUES
(2, 1, 'sejarah_pemerintahan_1779242108_0.png');

-- --------------------------------------------------------

--
-- Table structure for table `prodi_sejarah_timeline`
--

CREATE TABLE `prodi_sejarah_timeline` (
  `id` int(11) NOT NULL,
  `prodi` enum('pemerintahan','sosiatri') NOT NULL,
  `judul_periode` varchar(255) NOT NULL,
  `deskripsi_periode` text NOT NULL,
  `urutan` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prodi_struktur_organisasi`
--

CREATE TABLE `prodi_struktur_organisasi` (
  `id` int(11) NOT NULL,
  `prodi` enum('pemerintahan','sosiatri') NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `ketua_prodi_nama` varchar(150) DEFAULT NULL,
  `sekretaris_prodi_nama` varchar(150) DEFAULT NULL,
  `kepala_lab_nama` varchar(150) DEFAULT NULL,
  `kepala_lab_tugas` varchar(255) DEFAULT NULL,
  `staf_admin_nama` varchar(150) DEFAULT NULL,
  `staf_admin_tugas` varchar(255) DEFAULT NULL,
  `file_gambar` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prodi_struktur_organisasi`
--

INSERT INTO `prodi_struktur_organisasi` (`id`, `prodi`, `deskripsi`, `ketua_prodi_nama`, `sekretaris_prodi_nama`, `kepala_lab_nama`, `kepala_lab_tugas`, `staf_admin_nama`, `staf_admin_tugas`, `file_gambar`, `updated_at`) VALUES
(1, 'pemerintahan', NULL, 'Denns Sapura tes', 'Payong', '', '', '', '', NULL, '2026-05-19 08:33:08');

-- --------------------------------------------------------

--
-- Table structure for table `prodi_tujuan_cpl`
--

CREATE TABLE `prodi_tujuan_cpl` (
  `id` int(11) NOT NULL,
  `prodi` enum('pemerintahan','sosiatri') NOT NULL,
  `tujuan` text NOT NULL,
  `cpl` text NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prodi_tujuan_cpl`
--

INSERT INTO `prodi_tujuan_cpl` (`id`, `prodi`, `tujuan`, `cpl`, `updated_at`) VALUES
(1, 'pemerintahan', '<ul>\r\n	<li>Bertakwa kepada Tuhan Yang Maha Esa dan menjunjung tinggi nilai kemanusiaan dalam penyelenggaraan pemerintahan.</li>\r\n	<li>Memiliki integritas, etika, dan tanggung jawab dalam pelayanan publik.</li>\r\n	<li>Menunjukkan sikap demokratis, transparan, dan akuntabel dalam tata kelola pemerintahan.</li>\r\n	<li>Menghargai keberagaman sosial, budaya, dan politik dalam kehidupan berbangsa dan bernegara.</li>\r\n	<li>Memiliki semangat kepemimpinan, disiplin, dan profesionalisme dalam bidang pemerintahan</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Menguasai konsep dasar ilmu pemerintahan, politik, administrasi publik, dan kebijakan publik.</li>\r\n	<li>Memahami sistem pemerintahan pusat dan daerah serta tata kelola pemerintahan desa.</li>\r\n	<li>Memahami konsep otonomi daerah, desentralisasi, dan good governance.</li>\r\n	<li>Menguasai teori perencanaan pembangunan dan pelayanan publik.</li>\r\n	<li>Memahami metode penelitian dalam kajian pemerintahan dan kebijakan publik.</li>\r\n	<li>Mampu menganalisis dinamika politik lokal, birokrasi, dan hubungan antar lembaga pemerintahan.</li>\r\n</ul>\r\n', '2026-05-19 03:41:26'),
(2, 'sosiatri', '<ul>\r\n	<li>Bertakwa kepada Tuhan Yang Maha Esa dan memiliki kepedulian sosial terhadap masyarakat.</li>\r\n	<li>Menjunjung tinggi nilai keadilan sosial, kemanusiaan, dan solidaritas masyarakat.</li>\r\n	<li>Memiliki sikap empati, partisipatif, dan responsif terhadap persoalan sosial masyarakat.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Mampu berpikir analitis dan kritis terhadap persoalan sosial masyarakat.</li>\r\n	<li>Mampu menyusun laporan sosial, proposal program, dan karya ilmiah secara profesional.</li>\r\n	<li>Mampu berkomunikasi dan membangun relasi sosial dengan masyarakat dan lembaga sosial.</li>\r\n	<li>Mampu bekerja sama dalam tim pemberdayaan masyarakat dan pembangunan komunitas.</li>\r\n	<li>Mampu menggunakan teknologi informasi dalam pengelolaan data sosial dan pembangunan masyarakat.</li>\r\n</ul>\r\n', '2026-05-19 03:41:57');

-- --------------------------------------------------------

--
-- Table structure for table `profil_lembaga`
--

CREATE TABLE `profil_lembaga` (
  `id` int(11) NOT NULL,
  `kategori` enum('visi','misi','nilai_inti') NOT NULL,
  `konten` text NOT NULL,
  `urutan` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profil_lembaga`
--

INSERT INTO `profil_lembaga` (`id`, `kategori`, `konten`, `urutan`) VALUES
(1, 'visi', '\"Menjadi perguruan tinggi yang unggul dalam membangun daerah pada tahun 2026.\"\r\nBeriman dan bertakwa kepada Tuhan Yang Maha Esa.\r\nMengamalkan nilai-nilai universal (Core Values Pendidikan Ursulin).\r\nMenguasai ilmu pengetahuan di bidang pemerintahan dan pembangunan sosial.\r\nMenguasai teknologi tepat guna di bidang pertanian dan perikanan.\r\nMemiliki kemampuan melakukan penelitian dan publikasi di bidang pemerintahan dan pembangunan sosial.\r\nMampu berwirausaha.\r\nMengaplikasikan teknologi tepat guna.\r\nTerampil mengelola administrasi pemerintahan.\r\nTerampil dalam pengorganisasian masyarakat.', 1),
(2, 'misi', 'Menyelenggarakan pendidikan yang profesional dan terprogram di bidang pemerintahan dan pembangunan sosial sesuai dengan kebutuhan pembangunan daerah.', 1),
(3, 'misi', 'Melaksanakan penelitian dan publikasi di bidang pemerintahan dan pembangunan sosial yang mendukung pelaksanaan pembangunan daerah.', 1),
(4, 'misi', 'Melaksanakan pengabdian kepada masyarakat dengan menerapkan ilmu pengetahuan dan teknologi yang dibutuhkan dalam pembangunan daerah.', 1),
(5, 'misi', 'Mengembangkan pusat pembelajaran, penelitian, dan publikasi di bidang pemerintahan dan pembangunan sosial yang mendukung pembangunan daerah.', 1),
(6, 'misi', 'Menjalin kerja sama dengan berbagai pihak di dalam dan luar negeri.', 1),
(7, 'nilai_inti', 'Cinta dan Belas Kasih', 1),
(8, 'nilai_inti', 'Integritas', 1),
(9, 'nilai_inti', 'Keberanian dan Ketangguhan', 1),
(10, 'nilai_inti', 'Semangat Persatuan (Insieme)', 1),
(11, 'nilai_inti', 'Kesungguhan (Totalitas)', 1),
(12, 'nilai_inti', 'Semangat Pelayanan (Serviam)', 1);

-- --------------------------------------------------------

--
-- Table structure for table `profil_prodi`
--

CREATE TABLE `profil_prodi` (
  `id` int(11) NOT NULL,
  `kode_prodi` varchar(50) NOT NULL,
  `nama_prodi` varchar(150) NOT NULL,
  `sub_judul` text NOT NULL,
  `judul_tentang` varchar(150) NOT NULL,
  `deskripsi_tentang` text NOT NULL,
  `visi_keilmuan` text NOT NULL,
  `akreditasi` varchar(10) NOT NULL,
  `gelar` varchar(50) NOT NULL,
  `masa_studi` varchar(50) NOT NULL,
  `jenjang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profil_prodi`
--

INSERT INTO `profil_prodi` (`id`, `kode_prodi`, `nama_prodi`, `sub_judul`, `judul_tentang`, `deskripsi_tentang`, `visi_keilmuan`, `akreditasi`, `gelar`, `masa_studi`, `jenjang`) VALUES
(1, 'sosiatri', 'Program Studi Pembangunan Sosial', 'Mewujudkan masyarakat yang berdaya, inklusif, sejahtera, dan berkeadilan sosial.', 'Membangun Masyarakat Desa & Kota', 'Program Studi Pembangunan Sosial (dulu Ilmu Sosiatri) STPM Santa Ursula berfokus pada kajian pemberdayaan masyarakat, Corporate Social Responsibility (CSR), dan rekayasa sosial.\r\n\r\nKami mencetak lulusan yang mampu memetakan potensi sosial, memecahkan konflik, serta merancang program pendampingan untuk mengentaskan kemiskinan dan ketimpangan di masyarakat akar rumput.', '\"Menjadi pusat pendidikan unggulan dalam mencetak fasilitator sosial dan analis pembangunan yang berkarakter Serviam pada tahun 2030.\"', 'B', 'S.Sos', '8 Semester', 'Sarjana (S1)');

-- --------------------------------------------------------

--
-- Table structure for table `prospek_karir`
--

CREATE TABLE `prospek_karir` (
  `id` int(11) NOT NULL,
  `kode_prodi` varchar(50) NOT NULL,
  `nama_karir` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `ikon` varchar(50) DEFAULT 'briefcase',
  `warna_ikon` varchar(50) DEFAULT 'primary',
  `urutan` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prospek_karir`
--

INSERT INTO `prospek_karir` (`id`, `kode_prodi`, `nama_karir`, `deskripsi`, `ikon`, `warna_ikon`, `urutan`) VALUES
(1, 'sosiatri', 'Pekerja Sosial', 'Pendamping sosial di LSM lokal, nasional, maupun instansi pemerintah (Dinas Sosial).', 'heart', 'success', 1),
(2, 'sosiatri', 'Spesialis CSR', 'Corporate Social Responsibility (CSR) Officer di berbagai perusahaan BUMN & Swasta.', 'briefcase', 'primary', 2),
(3, 'sosiatri', 'Analis Pembangunan', 'Konsultan dan perencana program pembangunan di BAPPEDA atau Kementerian Desa.', 'trending-up', 'warning', 3),
(4, 'sosiatri', 'Peneliti Sosial', 'Periset lembaga survei, akademisi, atau jurnalis yang fokus pada isu sosial dan masyarakat.', 'edit-3', 'danger', 4);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role_name` varchar(100) NOT NULL,
  `keterangan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `keterangan`) VALUES
(1, 'dosen_pemerintahan', 'Dosen Ilmu Pemerintahan'),
(2, 'dosen_sosiatri', 'Dosen Pembangunan Sosial'),
(3, 'staf_lpm', 'Unit LPM (Penjaminan Mutu)'),
(4, 'staf_lp2m', 'Unit LP2M (Penelitian & Abdimas)'),
(5, 'staf_perpustakaan', 'Unit Perpustakaan'),
(6, 'staf_it_admin', 'Staf IT / Admin Kampus'),
(7, 'staf_kemahasiswaan', 'Biro Kemahasiswaan & Alumni'),
(8, 'staf_dosen', 'Staf / Dosen Umum'),
(9, 'operator_sistem', 'Operator Sistem'),
(10, 'admin', 'Super Administrator / IT'),
(11, 'staf_prodi_sosiatri', 'Staf / Admin Prodi Sosiatri'),
(12, 'staf_prodi_pemerintahan', 'Staf / Admin Prodi Pemerintahan'),
(13, 'staf_sekretariat', 'Sekretariat / Keuangan / Aset');

-- --------------------------------------------------------

--
-- Table structure for table `sejarah_lembaga`
--

CREATE TABLE `sejarah_lembaga` (
  `id` int(11) NOT NULL,
  `tahun` varchar(20) NOT NULL,
  `judul_peristiwa` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `urutan` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sejarah_lembaga`
--

INSERT INTO `sejarah_lembaga` (`id`, `tahun`, `judul_peristiwa`, `deskripsi`, `gambar`, `urutan`) VALUES
(4, '1 Februari 1972', 'Perintisan Kursus PTPM', 'Cikal bakal STPM Santa Ursula dimulai melalui Kursus Pembimbing Tenaga Pembangunan Masyarakat (PTPM) hasil kerja sama Pemerintah Kabupaten Ende dan Keuskupan Agung Ende untuk menyiapkan kader pembangunan masyarakat pedesaan di NTT', 'sejarah_1782192999.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sekretariat_arsip`
--

CREATE TABLE `sekretariat_arsip` (
  `id` int(11) NOT NULL,
  `kategori_arsip` varchar(50) NOT NULL,
  `judul_arsip` varchar(255) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `file_lampiran` varchar(255) DEFAULT NULL,
  `tanggal` date NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sekretariat_arsip`
--

INSERT INTO `sekretariat_arsip` (`id`, `kategori_arsip`, `judul_arsip`, `keterangan`, `file_lampiran`, `tanggal`, `updated_at`) VALUES
(1, 'pengumuman', 'Pendaftaran Beasiswa Ursulin', 'Penerimaa besiswa ursulin tahap 2', 'ARSIP_PENGUMUMAN_1782624748.pdf', '2026-06-28', '2026-06-28 05:32:28'),
(2, 'agenda_pimpinan', 'Rapat Koordinasi Pimpinan (Rapim) Terbatas', 'pertemuan strategis dan tertutup yang mempertemukan pimpinan inti suatu organisasi, instansi pemerintah, atau perusahaan. Rapat ini berfokus pada pengambilan keputusan cepat, evaluasi kebijakan, dan penyelesaian masalah mendesak yang membutuhkan koordinasi lintas', 'ARSIP_AGENDA_PIMPINAN_1782625034.pdf', '2026-06-28', '2026-06-28 05:37:14'),
(3, 'kalender_akademik', 'Pelatihan Bimtek', 'Pelatihan sekretariat kampus adalah program pembekalan keterampilan tata kelola administrasi dan manajemen organisasi yang ditujukan bagi pengurus organisasi', 'ARSIP_KALENDER_AKADEMIK_1782625162.pdf', '2026-06-28', '2026-06-28 05:39:22');

-- --------------------------------------------------------

--
-- Table structure for table `sekretariat_dokumen_akademik`
--

CREATE TABLE `sekretariat_dokumen_akademik` (
  `id` int(11) NOT NULL,
  `judul_dokumen` varchar(255) NOT NULL,
  `kategori_dokumen` varchar(100) NOT NULL,
  `file_dokumen` varchar(255) NOT NULL,
  `tanggal_upload` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sekretariat_dokumen_akademik`
--

INSERT INTO `sekretariat_dokumen_akademik` (`id`, `judul_dokumen`, `kategori_dokumen`, `file_dokumen`, `tanggal_upload`) VALUES
(1, 'Pedoman akademik', 'Buku Pedoman', 'DOK_AKD_1782363577.pdf', '2026-06-25 12:59:37');

-- --------------------------------------------------------

--
-- Table structure for table `sekretariat_info`
--

CREATE TABLE `sekretariat_info` (
  `id` int(11) NOT NULL,
  `tentang_kami` text NOT NULL,
  `fokus_utama` text NOT NULL,
  `jam_senin_kamis` varchar(100) NOT NULL,
  `jam_jumat` varchar(100) NOT NULL,
  `email_resmi` varchar(150) NOT NULL,
  `nomor_wa` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sekretariat_info`
--

INSERT INTO `sekretariat_info` (`id`, `tentang_kami`, `fokus_utama`, `jam_senin_kamis`, `jam_jumat`, `email_resmi`, `nomor_wa`) VALUES
(1, 'Bagian Sekretariat memiliki peran strategis dalam mendukung kelancaran kegiatan operasional kampus, baik dari segi pelayanan mahasiswa, dosen, maupun masyarakat umum.', 'Fokus utama kami adalah mengelola sistem persuratan resmi, pengarsipan dokumen institusi, layanan legalisir ijazah, hingga manajemen peminjaman fasilitas kampus. Kami berkomitmen memberikan pelayanan yang cepat, tepat, dan ramah dengan menjunjung tinggi nilai Serviam.', '08:00 - 15:00 WITA', '08:00 - 14:00 WITA', 'sekretariat@stpmsantaursula.ac.id', '6281234567890'),
(2, 'Bagian Sekretariat memiliki peran strategis dalam mendukung kelancaran kegiatan operasional kampus, baik dari segi pelayanan mahasiswa, dosen, maupun masyarakat umum.', 'Fokus utama kami adalah mengelola sistem persuratan resmi, pengarsipan dokumen institusi, layanan legalisir ijazah, hingga manajemen peminjaman fasilitas kampus. Kami berkomitmen memberikan pelayanan yang cepat, tepat, dan ramah dengan menjunjung tinggi nilai Serviam.', '08:00 - 15:00 WITA', '08:00 - 14:00 WITA', 'sekretariat@stpmsantaursula.ac.id', '6281234567890');

-- --------------------------------------------------------

--
-- Table structure for table `sekretariat_info_legalisir`
--

CREATE TABLE `sekretariat_info_legalisir` (
  `id` int(11) NOT NULL,
  `deskripsi_prosedur` text NOT NULL,
  `step1_judul` varchar(150) NOT NULL,
  `step1_deskripsi` text NOT NULL,
  `step2_judul` varchar(150) NOT NULL,
  `step2_deskripsi` text NOT NULL,
  `step3_judul` varchar(150) NOT NULL,
  `step3_deskripsi` text NOT NULL,
  `catatan_penting` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sekretariat_info_legalisir`
--

INSERT INTO `sekretariat_info_legalisir` (`id`, `deskripsi_prosedur`, `step1_judul`, `step1_deskripsi`, `step2_judul`, `step2_deskripsi`, `step3_judul`, `step3_deskripsi`, `catatan_penting`) VALUES
(1, 'Untuk menjaga keabsahan dokumen akademik, Sekretariat STPM menerapkan aturan ketat dalam proses legalisir. Alumni wajib menunjukkan dokumen asli sebelum salinan (fotokopi) dapat dicap dan ditandatangani oleh pejabat berwenang.', '1. Verifikasi Keaslian', 'Bawa Ijazah dan Transkrip Nilai ASLI ke loket Sekretariat untuk dilakukan verifikasi keabsahan dokumen.', '2. Serahkan Salinan', 'Serahkan lembar fotokopi yang jelas dan bersih. Batas maksimal legalisir adalah 10 lembar per permohonan.', '3. Pengambilan Dokumen', 'Dokumen yang telah dilegalisir dapat diambil dalam waktu 1x24 jam (hari kerja) dengan membawa bukti resi pendaftaran.', 'Bagi alumni yang berada di luar kota, pengajuan dapat diwakilkan kepada keluarga/kerabat dengan menyertakan Surat Kuasa Bermeterai.');

-- --------------------------------------------------------

--
-- Table structure for table `sekretariat_permohonan_surat`
--

CREATE TABLE `sekretariat_permohonan_surat` (
  `id` int(11) NOT NULL,
  `jenis_surat` varchar(150) NOT NULL,
  `nim` varchar(50) NOT NULL,
  `semester` varchar(10) DEFAULT NULL,
  `program_studi` varchar(100) DEFAULT NULL,
  `nama_lengkap` varchar(150) NOT NULL,
  `tempat_tanggal_lahir` varchar(255) DEFAULT NULL,
  `keperluan` text NOT NULL,
  `peserta` text DEFAULT NULL,
  `nama_dpa` varchar(255) DEFAULT NULL,
  `waktu_pelaksanaan` varchar(100) DEFAULT NULL,
  `lokasi_pelaksanaan` varchar(255) DEFAULT NULL,
  `judul_penelitian` text DEFAULT NULL,
  `tanggal_pengajuan` datetime DEFAULT current_timestamp(),
  `status` enum('Menunggu','Diproses','Selesai','Ditolak') DEFAULT 'Menunggu'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sekretariat_permohonan_surat`
--

INSERT INTO `sekretariat_permohonan_surat` (`id`, `jenis_surat`, `nim`, `semester`, `program_studi`, `nama_lengkap`, `tempat_tanggal_lahir`, `keperluan`, `peserta`, `nama_dpa`, `waktu_pelaksanaan`, `lokasi_pelaksanaan`, `judul_penelitian`, `tanggal_pengajuan`, `status`) VALUES
(1, 'Surat Keterangan Aktif Kuliah', '0098131', NULL, NULL, 'Maria Fransiska Dona, Sos', NULL, 'Untuk mendafra beasiswa diluar', NULL, NULL, NULL, NULL, NULL, '2026-06-25 09:58:25', 'Menunggu'),
(2, 'Surat Keterangan Berkelakuan Baik', '68201232566', NULL, NULL, 'Fidentus Didakus Darma Saputra', NULL, 'Untuk mendaftar SKCK', NULL, NULL, NULL, NULL, NULL, '2026-06-25 10:29:00', 'Menunggu'),
(3, 'Surat Pemberitahuan Pelaksanaan Abdimas', '68201251013', 'Semester 4', 'Pembangunan Sosial', 'Yohanes Noa', '', 'Melaksanakan Abdimas kelas di desa Were 2', 'Fidentus', 'Yulita Eme', '20-25 Juli 2026', 'Desa Were 2', '', '2026-06-25 11:59:13', 'Selesai');

-- --------------------------------------------------------

--
-- Table structure for table `sekretariat_profil`
--

CREATE TABLE `sekretariat_profil` (
  `id` int(11) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `konten` text NOT NULL,
  `file_gambar` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sekretariat_sla`
--

CREATE TABLE `sekretariat_sla` (
  `id` int(11) NOT NULL,
  `jenis_layanan` varchar(255) NOT NULL,
  `waktu_penyelesaian` varchar(100) NOT NULL,
  `urutan` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sekretariat_sla`
--

INSERT INTO `sekretariat_sla` (`id`, `jenis_layanan`, `waktu_penyelesaian`, `urutan`) VALUES
(1, 'Legalisir Ijazah & Transkrip', 'Maks. 1x24 Jam', 1),
(2, 'Surat Keterangan Aktif Kuliah', 'Maks. 1 Hari Kerja', 2),
(3, 'Surat Pengantar Izin Riset/Observasi', 'Maks. 1 Hari Kerja', 3),
(4, 'Penerimaan & Disposisi Surat Masuk', 'Real-time', 4);

-- --------------------------------------------------------

--
-- Table structure for table `sekretariat_tupoksi`
--

CREATE TABLE `sekretariat_tupoksi` (
  `id` int(11) NOT NULL,
  `teks_tupoksi` text NOT NULL,
  `ikon` varchar(100) DEFAULT 'fas fa-check-circle',
  `urutan` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sekretariat_tupoksi`
--

INSERT INTO `sekretariat_tupoksi` (`id`, `teks_tupoksi`, `ikon`, `urutan`) VALUES
(1, 'Pengelolaan Tata Persuratan (Surat Masuk & Keluar) Institusi.', 'fas fa-envelope-open-text', 1),
(2, 'Sentralisasi Kearsipan dan legalisasi dokumen pimpinan.', 'fas fa-archive', 2),
(3, 'Pengaturan jadwal audiensi, rapat dinas, dan agenda Ketua STPM.', 'fas fa-calendar-alt', 3),
(4, 'Pelayanan legalisir ijazah dan transkrip nilai alumni.', 'fas fa-stamp', 4),
(5, 'Pembuatan Surat Keterangan Aktif Kuliah dan pengantar instansi.', 'fas fa-id-card', 5);

-- --------------------------------------------------------

--
-- Table structure for table `setting_carousel`
--

CREATE TABLE `setting_carousel` (
  `id` int(11) NOT NULL,
  `badge_teks` varchar(100) NOT NULL,
  `badge_warna` varchar(50) DEFAULT 'primary',
  `judul` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar_landscape` varchar(255) NOT NULL,
  `gambar_portrait` varchar(255) NOT NULL,
  `urutan` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `setting_carousel`
--

INSERT INTO `setting_carousel` (`id`, `badge_teks`, `badge_warna`, `judul`, `deskripsi`, `gambar_landscape`, `gambar_portrait`, `urutan`) VALUES
(1, 'Penerimaan Mahasiswa Baru 2026/2027', 'success', 'Wujudkan Masa Depan Bersama STPM Santa Ursula Ende', 'Pendaftaran mahasiswa baru Tahun Akademik 2026/2027 telah dibuka. Bergabunglah dengan Program Studi Pembangunan Sosial dan Ilmu Pemerintahan untuk menjadi agen perubahan yang berintegritas, profesional, dan berjiwa pelayanan. Daftar sekarang dan raih kesempatan mendapatkan berbagai program beasiswa.', 'land_1782185174.png', 'port_1782185174.png', 0),
(2, 'KKN Tematik STPM Santa Ursula 2026', 'warning', 'KKN Tematik: Membangun Desa, Menguatkan Masyarakat', 'Mahasiswa STPM Santa Ursula Ende hadir bersama masyarakat melalui program KKN Tematik yang berfokus pada penguatan kelembagaan desa, pengembangan BUMDes, pemberdayaan UMKM, transformasi digital desa, dan pembangunan berkelanjutan menuju desa yang mandiri dan sejahtera.', 'land_1782186065.png', 'port_1782186065.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `setting_struktur`
--

CREATE TABLE `setting_struktur` (
  `id` int(11) NOT NULL,
  `gambar_bagan` varchar(255) NOT NULL,
  `diperbarui_pada` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `setting_struktur`
--

INSERT INTO `setting_struktur` (`id`, `gambar_bagan`, `diperbarui_pada`) VALUES
(1, 'bagan_1782195940.jpeg', '2026-06-23 14:25:40');

-- --------------------------------------------------------

--
-- Table structure for table `struktur_organisasi_item`
--

CREATE TABLE `struktur_organisasi_item` (
  `id` int(11) NOT NULL,
  `nama_jabatan` varchar(255) NOT NULL,
  `nama_pejabat` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `warna_ikon` varchar(50) DEFAULT 'primary',
  `urutan` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblbarangmusnah`
--

CREATE TABLE `tblbarangmusnah` (
  `id` int(11) NOT NULL,
  `id_master` int(11) NOT NULL,
  `kode_barang` varchar(50) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `lokasi_terakhir` varchar(100) DEFAULT NULL,
  `tanggal_musnah` date NOT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tendik`
--

CREATE TABLE `tendik` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `nip_nik` varchar(50) DEFAULT NULL,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `jenis_kelamin` varchar(10) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `jabatan_struktural` varchar(100) DEFAULT NULL,
  `unit_kerja` varchar(100) DEFAULT NULL,
  `status_kepegawaian` varchar(50) DEFAULT NULL,
  `tahun_masuk` int(11) DEFAULT NULL,
  `nomor_sk` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tendik`
--

INSERT INTO `tendik` (`id`, `user_id`, `nip_nik`, `nama_lengkap`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `no_hp`, `email`, `jabatan_struktural`, `unit_kerja`, `status_kepegawaian`, `tahun_masuk`, `nomor_sk`) VALUES
(8, 48, '1234567899874561', 'Agustinus Surya Novelos Bale Leda Veregrent, S.Kom', 'Laki-Laki', NULL, NULL, NULL, '0285292296801', NULL, 'Sekretariant', NULL, 'Aktif', NULL, NULL),
(18, 63, '7123599886144567', 'Andreas W. F. Weroh, S.Kom', 'Laki-Laki', '', '0000-00-00', '', '081246428701', 'andreasweroh@gmail.com', 'Kepala Bidang IT', '', 'Aktif', NULL, NULL),
(19, 64, '37849152498712', 'Maria Yenista Enga No, S.T', 'Perempuan', '', '0000-00-00', '', '081311222165', 'mariayenista@gmail.com', 'Sekretariant', '', 'Aktif', NULL, NULL),
(20, 65, '478497589653', 'Maximilianus Gabriel Janga, S.Sos', 'Laki-Laki', '', '0000-00-00', '', '082260821655', 'maximilianus.janga@gmail.com', 'Sekretariant', '', 'Aktif', NULL, NULL),
(21, 66, '1745026898936', 'Lusia Marcelina Mere, S.AP', 'Perempuan', '', NULL, '', '082235018042', 'inamere@gmail.com', 'Sekretariant', '', 'Aktif', NULL, NULL),
(22, 67, '1567345246187', 'Yohanes Noa, S.IP', 'Laki-Laki', '', '0000-00-00', '', '081236644024', 'yohanesnoa@gmail.com', 'Sekretariant', '', 'Aktif', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tendik_dokumen`
--

CREATE TABLE `tendik_dokumen` (
  `id` int(11) NOT NULL,
  `tendik_id` int(11) NOT NULL,
  `sk_kepegawaian` varchar(255) DEFAULT NULL,
  `sertifikat_diklat` varchar(255) DEFAULT NULL,
  `cv` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_kembali`
--

CREATE TABLE `transaksi_kembali` (
  `id` int(11) NOT NULL,
  `id_barang_detail` int(11) NOT NULL,
  `peminjam` varchar(100) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali_aktual` date NOT NULL,
  `kondisi_saat_kembali` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_peminjaman`
--

CREATE TABLE `transaksi_peminjaman` (
  `id` int(11) NOT NULL,
  `id_detail` int(11) NOT NULL,
  `unit_peminjam` varchar(100) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date DEFAULT NULL,
  `status_sebelumnya` varchar(50) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `group_id` varchar(50) DEFAULT NULL,
  `status_pinjam` enum('Dipinjam','Dikembalikan') DEFAULT 'Dipinjam',
  `tanggal_kembali_aktual` date DEFAULT NULL,
  `kondisi_saat_kembali` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi_peminjaman`
--

INSERT INTO `transaksi_peminjaman` (`id`, `id_detail`, `unit_peminjam`, `tanggal_pinjam`, `tanggal_kembali`, `status_sebelumnya`, `keterangan`, `group_id`, `status_pinjam`, `tanggal_kembali_aktual`, `kondisi_saat_kembali`) VALUES
(497, 14414, 'Mahasiswa', '2026-06-25', '2026-06-27', 'Baru', 'misa', 'PJM-M-1782393014', 'Dipinjam', NULL, NULL),
(498, 14415, 'Mahasiswa', '2026-06-25', '2026-06-27', 'Baru', 'misa', 'PJM-M-1782393014', 'Dipinjam', NULL, NULL),
(499, 14416, 'Mahasiswa', '2026-06-25', '2026-06-27', 'Baru', 'misa', 'PJM-M-1782393014', 'Dipinjam', NULL, NULL),
(500, 14417, 'Mahasiswa', '2026-06-25', '2026-06-27', 'Baru', 'misa', 'PJM-M-1782393014', 'Dipinjam', NULL, NULL),
(501, 14418, 'Mahasiswa', '2026-06-25', '2026-06-27', 'Baru', 'misa', 'PJM-M-1782393014', 'Dipinjam', NULL, NULL),
(502, 14419, 'Mahasiswa', '2026-06-25', '2026-06-27', 'Baru', 'misa', 'PJM-M-1782393014', 'Dipinjam', NULL, NULL),
(503, 14420, 'Mahasiswa', '2026-06-25', '2026-06-27', 'Baru', 'misa', 'PJM-M-1782393014', 'Dipinjam', NULL, NULL),
(504, 14421, 'Mahasiswa', '2026-06-25', '2026-06-27', 'Baru', 'misa', 'PJM-M-1782393014', 'Dipinjam', NULL, NULL),
(505, 14422, 'Mahasiswa', '2026-06-25', '2026-06-27', 'Baru', 'misa', 'PJM-M-1782393014', 'Dipinjam', NULL, NULL),
(506, 14423, 'Mahasiswa', '2026-06-25', '2026-06-27', 'Baru', 'misa', 'PJM-M-1782393014', 'Dipinjam', NULL, NULL),
(507, 14424, 'Mahasiswa', '2026-06-25', '2026-06-27', 'Baru', 'misa', 'PJM-M-1782393014', 'Dipinjam', NULL, NULL),
(508, 14425, 'Mahasiswa', '2026-06-25', '2026-06-27', 'Baru', 'misa', 'PJM-M-1782393014', 'Dipinjam', NULL, NULL),
(509, 14426, 'Mahasiswa', '2026-06-25', '2026-06-27', 'Baru', 'misa', 'PJM-M-1782393014', 'Dipinjam', NULL, NULL),
(510, 14427, 'Mahasiswa', '2026-06-25', '2026-06-27', 'Baru', 'misa', 'PJM-M-1782393014', 'Dipinjam', NULL, NULL),
(511, 14428, 'Mahasiswa', '2026-06-25', '2026-06-27', 'Baru', 'misa', 'PJM-M-1782393014', 'Dipinjam', NULL, NULL),
(512, 14429, 'Mahasiswa', '2026-06-25', '2026-06-27', 'Baru', 'misa', 'PJM-M-1782393014', 'Dipinjam', NULL, NULL),
(513, 14430, 'Mahasiswa', '2026-06-25', '2026-06-27', 'Baru', 'misa', 'PJM-M-1782393014', 'Dipinjam', NULL, NULL),
(514, 14431, 'Mahasiswa', '2026-06-25', '2026-06-27', 'Baru', 'misa', 'PJM-M-1782393014', 'Dipinjam', NULL, NULL),
(515, 14432, 'Mahasiswa', '2026-06-25', '2026-06-27', 'Baru', 'misa', 'PJM-M-1782393014', 'Dipinjam', NULL, NULL),
(516, 14433, 'Mahasiswa', '2026-06-25', '2026-06-27', 'Baru', 'misa', 'PJM-M-1782393014', 'Dipinjam', NULL, NULL),
(517, 14434, 'Mahasiswa', '2026-06-25', '2026-06-27', 'Baru', 'misa', 'PJM-M-1782393014', 'Dipinjam', NULL, NULL),
(518, 14435, 'Mahasiswa', '2026-06-25', '2026-06-27', 'Baru', 'misa', 'PJM-M-1782393014', 'Dipinjam', NULL, NULL),
(519, 14436, 'Mahasiswa', '2026-06-25', '2026-06-27', 'Baru', 'misa', 'PJM-M-1782393014', 'Dipinjam', NULL, NULL),
(520, 14437, 'Mahasiswa', '2026-06-25', '2026-06-27', 'Baru', 'misa', 'PJM-M-1782393014', 'Dipinjam', NULL, NULL),
(521, 14438, 'Mahasiswa', '2026-06-25', '2026-06-27', 'Baru', 'misa', 'PJM-M-1782393014', 'Dipinjam', NULL, NULL),
(522, 14439, 'Mahasiswa', '2026-06-25', '2026-06-27', 'Baru', 'misa', 'PJM-M-1782393014', 'Dipinjam', NULL, NULL),
(523, 14440, 'Mahasiswa', '2026-06-25', '2026-06-27', 'Baru', 'misa', 'PJM-M-1782393014', 'Dipinjam', NULL, NULL),
(524, 14441, 'Mahasiswa', '2026-06-25', '2026-06-27', 'Baru', 'misa', 'PJM-M-1782393014', 'Dipinjam', NULL, NULL),
(525, 14442, 'Mahasiswa', '2026-06-25', '2026-06-27', 'Baru', 'misa', 'PJM-M-1782393014', 'Dipinjam', NULL, NULL),
(526, 14443, 'Mahasiswa', '2026-06-25', '2026-06-27', 'Baru', 'misa', 'PJM-M-1782393014', 'Dipinjam', NULL, NULL),
(527, 14444, 'Mahasiswa', '2026-06-25', '2026-06-27', 'Baru', 'misa', 'PJM-M-1782393014', 'Dipinjam', NULL, NULL),
(528, 14445, 'Mahasiswa', '2026-06-25', '2026-06-27', 'Baru', 'misa', 'PJM-M-1782393014', 'Dipinjam', NULL, NULL),
(529, 14446, 'Mahasiswa', '2026-06-25', '2026-06-27', 'Baru', 'misa', 'PJM-M-1782393014', 'Dipinjam', NULL, NULL),
(530, 14447, 'Mahasiswa', '2026-06-25', '2026-06-27', 'Baru', 'misa', 'PJM-M-1782393014', 'Dipinjam', NULL, NULL),
(531, 14448, 'Mahasiswa', '2026-06-25', '2026-06-27', 'Baru', 'misa', 'PJM-M-1782393014', 'Dipinjam', NULL, NULL),
(532, 14449, 'Mahasiswa', '2026-06-25', '2026-06-27', 'Baru', 'misa', 'PJM-M-1782393014', 'Dipinjam', NULL, NULL),
(533, 14450, 'Mahasiswa', '2026-06-25', '2026-06-27', 'Baru', 'misa', 'PJM-M-1782393014', 'Dipinjam', NULL, NULL),
(534, 14451, 'Mahasiswa', '2026-06-25', '2026-06-27', 'Baru', 'misa', 'PJM-M-1782393014', 'Dipinjam', NULL, NULL),
(535, 14452, 'Mahasiswa', '2026-06-25', '2026-06-27', 'Baru', 'misa', 'PJM-M-1782393014', 'Dipinjam', NULL, NULL),
(536, 14453, 'Mahasiswa', '2026-06-25', '2026-06-27', 'Baru', 'misa', 'PJM-M-1782393014', 'Dipinjam', NULL, NULL),
(537, 14454, 'Mahasiswa', '2026-06-25', '2026-06-27', 'Baru', 'misa', 'PJM-M-1782393014', 'Dipinjam', NULL, NULL),
(538, 14455, 'Mahasiswa', '2026-06-25', '2026-06-27', 'Baru', 'misa', 'PJM-M-1782393014', 'Dipinjam', NULL, NULL),
(539, 14456, 'Mahasiswa', '2026-06-25', '2026-06-27', 'Baru', 'misa', 'PJM-M-1782393014', 'Dipinjam', NULL, NULL),
(540, 14457, 'Mahasiswa', '2026-06-25', '2026-06-27', 'Baru', 'misa', 'PJM-M-1782393014', 'Dipinjam', NULL, NULL),
(541, 14458, 'Mahasiswa', '2026-06-25', '2026-06-27', 'Baru', 'misa', 'PJM-M-1782393014', 'Dipinjam', NULL, NULL),
(542, 14459, 'Mahasiswa', '2026-06-25', '2026-06-27', 'Baru', 'misa', 'PJM-M-1782393014', 'Dipinjam', NULL, NULL),
(543, 14460, 'Mahasiswa', '2026-06-25', '2026-06-27', 'Baru', 'misa', 'PJM-M-1782393014', 'Dipinjam', NULL, NULL),
(544, 14461, 'Mahasiswa', '2026-06-25', '2026-06-27', 'Baru', 'misa', 'PJM-M-1782393014', 'Dipinjam', NULL, NULL),
(545, 14462, 'Mahasiswa', '2026-06-25', '2026-06-27', 'Baru', 'misa', 'PJM-M-1782393014', 'Dipinjam', NULL, NULL),
(546, 14463, 'Mahasiswa', '2026-06-25', '2026-06-27', 'Baru', 'misa', 'PJM-M-1782393014', 'Dipinjam', NULL, NULL),
(547, 13774, 'Mahasiswa', '2026-06-27', '2026-06-30', 'Baru', 'tes', 'PJM-M-1782558292', 'Dipinjam', NULL, NULL),
(548, 13775, 'Mahasiswa', '2026-06-27', '2026-06-30', 'Baru', 'tes', 'PJM-M-1782558292', 'Dipinjam', NULL, NULL),
(549, 13776, 'Mahasiswa', '2026-06-27', '2026-06-30', 'Baru', 'tes', 'PJM-M-1782558292', 'Dipinjam', NULL, NULL),
(550, 13777, 'Mahasiswa', '2026-06-27', '2026-06-30', 'Baru', 'tes', 'PJM-M-1782558292', 'Dipinjam', NULL, NULL),
(551, 13778, 'Mahasiswa', '2026-06-27', '2026-06-30', 'Baru', 'tes', 'PJM-M-1782558292', 'Dipinjam', NULL, NULL),
(552, 13859, 'Mahasiswa', '2026-06-27', '2026-06-30', 'Baru', 'Raker kelas', 'PJM-S-1782559569', 'Dipinjam', NULL, NULL),
(553, 13863, 'Mahasiswa', '2026-06-27', '2026-06-30', 'Baru', 'Raker kelas', 'PJM-S-1782559569', 'Dipinjam', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_lengkap` varchar(150) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `status_aktif` tinyint(1) DEFAULT 1,
  `jenis_pegawai` varchar(50) NOT NULL DEFAULT 'Dosen',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `nama_lengkap`, `email`, `status_aktif`, `jenis_pegawai`, `created_at`) VALUES
(48, 'Agustinus Surya Novelos Bale Leda Veregrent', '$2y$10$0i21hB3vqEi5b.90m.wPVOBB71Ucfq21uCYRVbIcxGAEVz6dCJcIe', 'Agustinus Surya Novelos Bale Leda Veregrent', 'agustinus.veregrent@gmail.com', 1, 'tendik', '2025-11-18 03:52:44'),
(61, 'Yulita Eme', '$2y$10$bcKp77rxM2Sv92cUclcisuDn5Vf98HdbMlAZIb5bUoWxi27XXdot2', 'Yulita Eme', 'yulitaeme@gmail.com', 1, 'Dosen', '2026-05-13 00:55:21'),
(62, 'Ngea Andreass', '$2y$10$.y4IYo95WHASWEpSRenc6uc8f7UTNE0gBmFizh6eNfvT0VYy/UuJy', 'Ngea Andreas', 'ngeaandreas@gmail.com', 1, 'Dosen', '2026-05-13 00:58:41'),
(63, 'Andreas W. F. Weroh', '$2y$10$JwayIjivzTj/z9dWVjW/Fur6mvfWgDc5qZ/qs0WcjGX.6jte1A3jS', 'Andreas W. F. Weroh, S.Kom', 'andreasweroh@gmail.com', 1, 'Tendik', '2026-05-13 01:02:55'),
(64, 'Maria Yenista', '$2y$10$Q4MRQrkXs0/a2HBc.w/wbOMvzL0z2lC9D0jtQ5dx.bwMZDo1YBcBK', 'Maria Yenista Enga No, S.T', 'mariayenista@gmail.com', 1, 'Tendik', '2026-05-13 01:05:27'),
(65, 'Maximilianus Gabriel Janga', '$2y$10$4MM5JvW0QpFuOuUxJBUBbOOSh4J6b3iJ6vRMvB2DNFLwMvwG1PDWW', 'Maximilianus Gabriel Janga, S.Sos', 'maximilianus.janga@gmail.com', 1, 'Tendik', '2026-05-13 01:08:45'),
(66, 'Lusia Marcelina Mere', '$2y$10$RKU1ztYydWsu1KBapPV/juVSPxS0ziO4nh4ZoNNuQmbeLFpdNjr3u', 'Lusia Marcelina Mere, S.AP', 'inamere@gmail.com', 1, 'Tendik', '2026-05-13 01:11:16'),
(67, 'Yohanes Noa', '$2y$10$kOWyW3Y8T6KYk7hvO7iJFeM.Ye8d/goMJ7chKqNaCVS6sTeWkv63a', 'Yohanes Noa, S.IP', 'yohanesnoa@gmail.com', 1, 'Tendik', '2026-05-13 01:15:21'),
(68, 'denssaputra@gmail.com', '$2y$10$HFt6E5hcX39r.PT8wHq.v.tX9b6F84wiyO1UfW9nX8.p8ofkEQQ26', 'Fidentus Didakus Darma Saputra', 'denssaputra@gmail.com', 1, 'Dosen', '2026-05-27 23:49:43'),
(69, 'susterkori@gmail.com', '$2y$10$He7n9tJVp15tuVB5dLUlUeTV6d9KX9b2maIKFNIpVJaFErsiS1oxW', 'Viktoria Dalima', 'susterkori@gmail.com', 1, 'Dosen', '2026-05-28 01:03:09'),
(70, 'pakrikar@gmail.com', '$2y$10$IQJDRAcja3PJ4w7Kre.rNewJN6Ex1wnsrDsBCqPjM60vUQwU2oI4i', 'Richardus Beda Toulwala', 'pakrikar@gmail.com', 1, 'Dosen', '2026-05-28 01:07:53'),
(71, 'pakaris@gmail.com', '$2y$10$dwiOHt6UbOXlkkPeKc8IpeCAezCAsFOFP8CJ.2GZuKSZ5lfl9bMBi', 'Patricius Marianus Botha', 'pakaris@gmail.com', 1, 'Dosen', '2026-05-28 01:18:13');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `user_id`, `role_id`) VALUES
(48, 48, 6),
(67, 61, 2),
(69, 63, 6),
(71, 64, 2),
(72, 64, 11),
(80, 65, 1),
(81, 65, 12),
(84, 66, 13),
(87, 68, 1),
(95, 62, 1),
(96, 69, 1),
(98, 70, 1),
(99, 70, 4),
(100, 71, 2),
(101, 67, 13);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang_detail`
--
ALTER TABLE `barang_detail`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_barang` (`kode_barang`),
  ADD KEY `id_master` (`id_master`);

--
-- Indexes for table `barang_master`
--
ALTER TABLE `barang_master`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_induk` (`kode_induk`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `dosen_dokumen`
--
ALTER TABLE `dosen_dokumen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dosen_id` (`dosen_id`);

--
-- Indexes for table `dosen_pendidikan`
--
ALTER TABLE `dosen_pendidikan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dosen_id` (`dosen_id`);

--
-- Indexes for table `dosen_penelitian`
--
ALTER TABLE `dosen_penelitian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dosen_id` (`dosen_id`);

--
-- Indexes for table `dosen_pengabdian`
--
ALTER TABLE `dosen_pengabdian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dosen_id` (`dosen_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kemahasiswaan_pusat_data`
--
ALTER TABLE `kemahasiswaan_pusat_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kema_hmps`
--
ALTER TABLE `kema_hmps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kema_kegiatan`
--
ALTER TABLE `kema_kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kema_pengaduan`
--
ALTER TABLE `kema_pengaduan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kema_prestasi`
--
ALTER TABLE `kema_prestasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kema_profil`
--
ALTER TABLE `kema_profil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kema_tracer`
--
ALTER TABLE `kema_tracer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kema_tracer_loker`
--
ALTER TABLE `kema_tracer_loker`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lp2m_dokumen`
--
ALTER TABLE `lp2m_dokumen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lp2m_informasi`
--
ALTER TABLE `lp2m_informasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lp2m_mitra`
--
ALTER TABLE `lp2m_mitra`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lpm_dokumen`
--
ALTER TABLE `lpm_dokumen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perpus_dokumen`
--
ALTER TABLE `perpus_dokumen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perpus_koleksi`
--
ALTER TABLE `perpus_koleksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prodi_akreditasi`
--
ALTER TABLE `prodi_akreditasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prodi_berita`
--
ALTER TABLE `prodi_berita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prodi_dokumen_akademik`
--
ALTER TABLE `prodi_dokumen_akademik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prodi_dokumen_resmi`
--
ALTER TABLE `prodi_dokumen_resmi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prodi_dosen_tampil`
--
ALTER TABLE `prodi_dosen_tampil`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dosen_id` (`dosen_id`);

--
-- Indexes for table `prodi_info_agenda`
--
ALTER TABLE `prodi_info_agenda`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prodi_kerjasama`
--
ALTER TABLE `prodi_kerjasama`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prodi_kurikulum`
--
ALTER TABLE `prodi_kurikulum`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prodi_mitra_informasi`
--
ALTER TABLE `prodi_mitra_informasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prodi_profil`
--
ALTER TABLE `prodi_profil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prodi_profil_dosen_desc`
--
ALTER TABLE `prodi_profil_dosen_desc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prodi_publikasi_visual`
--
ALTER TABLE `prodi_publikasi_visual`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prodi_riset_abdimas`
--
ALTER TABLE `prodi_riset_abdimas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prodi_sejarah`
--
ALTER TABLE `prodi_sejarah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prodi_sejarah_galeri`
--
ALTER TABLE `prodi_sejarah_galeri`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sejarah_id` (`sejarah_id`);

--
-- Indexes for table `prodi_sejarah_timeline`
--
ALTER TABLE `prodi_sejarah_timeline`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prodi_struktur_organisasi`
--
ALTER TABLE `prodi_struktur_organisasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prodi_tujuan_cpl`
--
ALTER TABLE `prodi_tujuan_cpl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profil_lembaga`
--
ALTER TABLE `profil_lembaga`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profil_prodi`
--
ALTER TABLE `profil_prodi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prospek_karir`
--
ALTER TABLE `prospek_karir`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `role_name` (`role_name`);

--
-- Indexes for table `sejarah_lembaga`
--
ALTER TABLE `sejarah_lembaga`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sekretariat_arsip`
--
ALTER TABLE `sekretariat_arsip`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sekretariat_dokumen_akademik`
--
ALTER TABLE `sekretariat_dokumen_akademik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sekretariat_info`
--
ALTER TABLE `sekretariat_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sekretariat_info_legalisir`
--
ALTER TABLE `sekretariat_info_legalisir`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sekretariat_permohonan_surat`
--
ALTER TABLE `sekretariat_permohonan_surat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sekretariat_profil`
--
ALTER TABLE `sekretariat_profil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sekretariat_sla`
--
ALTER TABLE `sekretariat_sla`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sekretariat_tupoksi`
--
ALTER TABLE `sekretariat_tupoksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting_carousel`
--
ALTER TABLE `setting_carousel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting_struktur`
--
ALTER TABLE `setting_struktur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `struktur_organisasi_item`
--
ALTER TABLE `struktur_organisasi_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblbarangmusnah`
--
ALTER TABLE `tblbarangmusnah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tendik`
--
ALTER TABLE `tendik`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `tendik_dokumen`
--
ALTER TABLE `tendik_dokumen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tendik_id` (`tendik_id`);

--
-- Indexes for table `transaksi_kembali`
--
ALTER TABLE `transaksi_kembali`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi_peminjaman`
--
ALTER TABLE `transaksi_peminjaman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang_detail`
--
ALTER TABLE `barang_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15403;

--
-- AUTO_INCREMENT for table `barang_master`
--
ALTER TABLE `barang_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=260;

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `dosen_dokumen`
--
ALTER TABLE `dosen_dokumen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dosen_pendidikan`
--
ALTER TABLE `dosen_pendidikan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dosen_penelitian`
--
ALTER TABLE `dosen_penelitian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dosen_pengabdian`
--
ALTER TABLE `dosen_pengabdian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=220;

--
-- AUTO_INCREMENT for table `kemahasiswaan_pusat_data`
--
ALTER TABLE `kemahasiswaan_pusat_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kema_hmps`
--
ALTER TABLE `kema_hmps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kema_kegiatan`
--
ALTER TABLE `kema_kegiatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kema_pengaduan`
--
ALTER TABLE `kema_pengaduan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kema_prestasi`
--
ALTER TABLE `kema_prestasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kema_profil`
--
ALTER TABLE `kema_profil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kema_tracer`
--
ALTER TABLE `kema_tracer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kema_tracer_loker`
--
ALTER TABLE `kema_tracer_loker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lp2m_dokumen`
--
ALTER TABLE `lp2m_dokumen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lp2m_informasi`
--
ALTER TABLE `lp2m_informasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lp2m_mitra`
--
ALTER TABLE `lp2m_mitra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lpm_dokumen`
--
ALTER TABLE `lpm_dokumen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `perpus_dokumen`
--
ALTER TABLE `perpus_dokumen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `perpus_koleksi`
--
ALTER TABLE `perpus_koleksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prodi_akreditasi`
--
ALTER TABLE `prodi_akreditasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `prodi_berita`
--
ALTER TABLE `prodi_berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `prodi_dokumen_akademik`
--
ALTER TABLE `prodi_dokumen_akademik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `prodi_dokumen_resmi`
--
ALTER TABLE `prodi_dokumen_resmi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prodi_dosen_tampil`
--
ALTER TABLE `prodi_dosen_tampil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `prodi_info_agenda`
--
ALTER TABLE `prodi_info_agenda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prodi_kerjasama`
--
ALTER TABLE `prodi_kerjasama`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prodi_kurikulum`
--
ALTER TABLE `prodi_kurikulum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `prodi_mitra_informasi`
--
ALTER TABLE `prodi_mitra_informasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prodi_profil`
--
ALTER TABLE `prodi_profil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `prodi_profil_dosen_desc`
--
ALTER TABLE `prodi_profil_dosen_desc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prodi_publikasi_visual`
--
ALTER TABLE `prodi_publikasi_visual`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `prodi_riset_abdimas`
--
ALTER TABLE `prodi_riset_abdimas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `prodi_sejarah`
--
ALTER TABLE `prodi_sejarah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `prodi_sejarah_galeri`
--
ALTER TABLE `prodi_sejarah_galeri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `prodi_sejarah_timeline`
--
ALTER TABLE `prodi_sejarah_timeline`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prodi_struktur_organisasi`
--
ALTER TABLE `prodi_struktur_organisasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `prodi_tujuan_cpl`
--
ALTER TABLE `prodi_tujuan_cpl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `profil_lembaga`
--
ALTER TABLE `profil_lembaga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `profil_prodi`
--
ALTER TABLE `profil_prodi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `prospek_karir`
--
ALTER TABLE `prospek_karir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `sejarah_lembaga`
--
ALTER TABLE `sejarah_lembaga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sekretariat_arsip`
--
ALTER TABLE `sekretariat_arsip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sekretariat_dokumen_akademik`
--
ALTER TABLE `sekretariat_dokumen_akademik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sekretariat_info`
--
ALTER TABLE `sekretariat_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sekretariat_info_legalisir`
--
ALTER TABLE `sekretariat_info_legalisir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sekretariat_permohonan_surat`
--
ALTER TABLE `sekretariat_permohonan_surat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sekretariat_profil`
--
ALTER TABLE `sekretariat_profil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sekretariat_sla`
--
ALTER TABLE `sekretariat_sla`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sekretariat_tupoksi`
--
ALTER TABLE `sekretariat_tupoksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `setting_carousel`
--
ALTER TABLE `setting_carousel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `setting_struktur`
--
ALTER TABLE `setting_struktur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `struktur_organisasi_item`
--
ALTER TABLE `struktur_organisasi_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblbarangmusnah`
--
ALTER TABLE `tblbarangmusnah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tendik`
--
ALTER TABLE `tendik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tendik_dokumen`
--
ALTER TABLE `tendik_dokumen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaksi_kembali`
--
ALTER TABLE `transaksi_kembali`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaksi_peminjaman`
--
ALTER TABLE `transaksi_peminjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=554;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang_detail`
--
ALTER TABLE `barang_detail`
  ADD CONSTRAINT `barang_detail_ibfk_1` FOREIGN KEY (`id_master`) REFERENCES `barang_master` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dosen`
--
ALTER TABLE `dosen`
  ADD CONSTRAINT `dosen_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `dosen_dokumen`
--
ALTER TABLE `dosen_dokumen`
  ADD CONSTRAINT `dosen_dokumen_ibfk_1` FOREIGN KEY (`dosen_id`) REFERENCES `dosen` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `dosen_pendidikan`
--
ALTER TABLE `dosen_pendidikan`
  ADD CONSTRAINT `dosen_pendidikan_ibfk_1` FOREIGN KEY (`dosen_id`) REFERENCES `dosen` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `dosen_penelitian`
--
ALTER TABLE `dosen_penelitian`
  ADD CONSTRAINT `dosen_penelitian_ibfk_1` FOREIGN KEY (`dosen_id`) REFERENCES `dosen` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `dosen_pengabdian`
--
ALTER TABLE `dosen_pengabdian`
  ADD CONSTRAINT `dosen_pengabdian_ibfk_1` FOREIGN KEY (`dosen_id`) REFERENCES `dosen` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `prodi_dosen_tampil`
--
ALTER TABLE `prodi_dosen_tampil`
  ADD CONSTRAINT `prodi_dosen_tampil_ibfk_1` FOREIGN KEY (`dosen_id`) REFERENCES `dosen` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `prodi_sejarah_galeri`
--
ALTER TABLE `prodi_sejarah_galeri`
  ADD CONSTRAINT `prodi_sejarah_galeri_ibfk_1` FOREIGN KEY (`sejarah_id`) REFERENCES `prodi_sejarah` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tendik`
--
ALTER TABLE `tendik`
  ADD CONSTRAINT `tendik_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tendik_dokumen`
--
ALTER TABLE `tendik_dokumen`
  ADD CONSTRAINT `tendik_dokumen_ibfk_1` FOREIGN KEY (`tendik_id`) REFERENCES `tendik` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD CONSTRAINT `user_roles_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_roles_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
