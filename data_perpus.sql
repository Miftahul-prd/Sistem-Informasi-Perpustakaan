-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2024 at 07:36 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data_perpus`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `jurusan` varchar(15) NOT NULL,
  `role` varchar(5) NOT NULL,
  `mapel` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `pas_foto` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `nama`, `jenis_kelamin`, `kelas`, `jurusan`, `role`, `mapel`, `alamat`, `pas_foto`, `created_at`) VALUES
(53, 'Miftahul Jannah Parinduri', 'perempuan', 'X IPA 1', 'IPA', 'siswa', '', 'Jl. Hang Jebat', 'images75.png', '2024-08-02 14:20:24'),
(54, 'Faudziah Tri Hapsari', 'perempuan', 'XII IPS 2', 'IPS', 'siswa', '', 'Jl. 8 Blok f KPR 1', 'IMG_20221119_130837.jpg', '2024-08-02 14:20:24'),
(55, 'Dini Oktovia', 'perempuan', 'XII Ipa 3', 'Ipa', 'siswa', '', 'Jl. Sukaramai Ujung', 'PasFoto_MiftahulJannahParinduri1.png', '2024-08-02 14:20:24'),
(56, 'Aulia Bani', 'perempuan', 'Xi Ipa 3', 'Ipa', 'siswa', '', 'Jl. Balek Pipa', 'PasFoto_MiftahulJannahParinduri2.png', '2024-08-02 14:20:24'),
(57, 'Siti Aisyah', 'perempuan', 'X IPS 5', 'IPS', 'siswa', '', 'Jl. M.Ali', 'PasFoto_MiftahulJannahParinduri3.png', '2024-08-02 14:20:24'),
(58, 'Galih Rahmana', 'laki-laki', 'XI Ips 2', 'IPS', 'siswa', '', 'Jl. Balek Pipa', 'mif.jpg', '2024-08-02 14:20:24'),
(59, 'Wulandari', 'perempuan', '11 ips 3', 'IPS', 'siswa', '', 'jl sukarno', 'WhatsApp_Image_2024-06-20_at_12_31_05_d59aea841.jpg', '2024-08-02 14:20:24'),
(60, 'Ahmad Putra', 'laki-laki', 'XII IPA 1', 'IPA', 'siswa', '', 'Jl. M yamin', 'Ahmad_Putra.jpg', '2024-08-02 14:20:24'),
(61, 'Budi Santoso', 'laki-laki', 'XII IPA 1', 'IPA', 'siswa', '', 'Jl Hang Jebat No. 92', 'Budi_Santoso.jpg', '2024-08-02 14:20:24'),
(62, 'Cindy Wijaya', 'perempuan', 'XII IPA 2', 'IPA', 'siswa', '', 'Jl. Impres', 'Cindy_Wijaya.jpg', '2024-08-02 14:20:24'),
(63, 'Dian Pratiwi', 'perempuan', 'XII IPA 2', 'IPA', 'siswa', '', 'Jl. Sukaramai', 'Dian_Pratiwi.jpg', '2024-08-02 14:20:24'),
(64, 'Eko Saputra', 'laki-laki', 'XI IPA 1', 'IPA', 'siswa', '', 'Jl. Simpang Bunut', 'Eko_Saputra.jpg', '2024-08-02 14:20:24'),
(65, 'Fani Andriana', 'perempuan', 'XI IPA 1', 'IPA ', 'siswa', '', 'Jl. Indah Kasih Gg utama', 'Fani_Andriana.jpg', '2024-08-02 14:20:24'),
(66, 'Gita Amalia', 'perempuan', 'XI IPA 2', 'IPA', 'siswa', '', 'Jl. garuda', 'Gita_Amalia.jpg', '2024-08-02 14:20:24'),
(67, 'Heru Kurniawan', 'laki-laki', 'XI IPA 2', 'IPA', 'siswa', '', 'Jl. Kandis', 'Heru_Kurniawan.jpg', '2024-08-02 14:20:24'),
(68, 'Indra Setiawan', 'laki-laki', 'XII IPS 1', 'IPS', 'siswa', '', 'Jl. Kandis', 'Indra_Setiawan1.jpg', '2024-08-02 14:20:24'),
(69, 'Joko Susilo', 'laki-laki', 'XII IPS 1', 'IPA', 'siswa', '', 'Jl. Karet', 'Joko_Susilo.jpg', '2024-08-02 14:20:24'),
(70, 'Karina Sari', 'perempuan', 'XII IPS 2', 'IPS', 'siswa', '', 'Jl. Raja Kecik', 'Karina_Sari.jpg', '2024-08-02 14:20:24'),
(71, 'Lusi Anggraini', 'perempuan', 'XII IPS 2', 'IPS', 'siswa', '', 'Jl. M.Ali', 'images.png', '2024-08-02 14:20:24'),
(72, 'Maya Fitri', 'perempuan', 'XI IPS 1', 'IPS', 'siswa', '', 'Jl. Hang Jebat', 'images1.png', '2024-08-02 14:20:24'),
(73, 'Nanda Prasetyo', 'laki-laki', 'XI IPS 1', 'IPS', 'siswa', '', 'Jl. 1 Kpr 2', 'Nanda_Prasetyo.jpg', '2024-08-02 14:20:24'),
(74, 'Olivia Febranti', 'perempuan', 'XI IPS 2', 'IPS', 'siswa', '', 'Jl. Harapan ', 'images2.png', '2024-08-02 14:20:24'),
(75, 'Putra Wijaya', 'laki-laki', 'XI IPS 2', 'IPS', 'siswa', '', 'Jl. Harapan ', 'images3.png', '2024-08-02 14:20:24'),
(76, 'Ahmad Fadli', 'laki-laki', 'XI IPS 1', 'IPS', 'siswa', '', 'Btn. Kopkar', 'images8.png', '2024-08-02 14:20:24'),
(77, 'Siti Nurhaliza', 'perempuan', 'XI IPS 1', 'IPS', 'siswa', '', 'Jl. Karet Bunut', 'images7.png', '2024-08-02 14:20:24'),
(78, 'Dewi Sartika', 'perempuan', 'XII IPS 3', 'IPS', 'siswa', '', 'Jl. Pandan ', 'images6.png', '2024-08-02 14:20:24'),
(79, 'Hasan Basri', 'laki-laki', 'X IPA 2', 'IPA', 'siswa', '', 'Jl. Pertiwi', 'images9.png', '2024-08-02 14:20:24'),
(80, 'Ani Susilowati', 'perempuan', 'XI IPA 1', 'IPA', 'siswa', '', 'Jl. Pertiwi', 'images10.png', '2024-08-02 14:20:24'),
(81, 'Rina Kurniawati', 'perempuan', 'XII IPA 3', 'IPA', 'siswa', '', 'Jl. Inpres', 'images11.png', '2024-08-02 14:20:24'),
(82, 'Andi Pratama', 'laki-laki', 'X IPS 1', 'IPS', 'siswa', '', 'Jl. Inpres', 'images12.png', '2024-08-02 14:20:24'),
(83, 'Fitri Handayani', 'perempuan', 'X IPA 1', 'IPA', 'siswa', '', 'Jl. Kandis', 'images13.png', '2024-08-02 14:20:24'),
(84, 'Nur Aisyah', 'perempuan', 'X IPA 1', 'IPA', 'siswa', '', 'Jl. Hang Jebat', 'images14.png', '2024-08-02 14:20:24'),
(85, 'Rahayu Indah', 'perempuan', 'X IPA 1', 'IPA ', 'siswa', '', 'Jl. Harapan ', 'images15.png', '2024-08-02 14:20:24'),
(86, 'Bagus Prasetyo', 'laki-laki', 'X IPA 1', 'IPA', 'siswa', '', 'Jl. M.Ali', 'images16.png', '2024-08-02 14:20:24'),
(87, 'Lisa Permata Sari', 'perempuan', 'X IPA 1', 'IPA', 'siswa', '', 'Jl. Pandan ', 'images17.png', '2024-08-02 14:20:24'),
(88, 'Arif Hidayat', 'laki-laki', 'X IPA 1', 'IPA ', 'siswa', '', 'Jl. Pertiwi', 'images18.png', '2024-08-02 14:20:24'),
(89, 'Fitria Lestari', 'perempuan', 'X IPA 1', 'IPA', 'siswa', '', 'Jl. 1 Kpr 1', 'images19.png', '2024-08-02 14:20:24'),
(90, 'Dedi Supriyadi', 'laki-laki', 'X IPA 1', 'Ipa', 'siswa', '', 'Jl. Kandis', 'images20.png', '2024-08-02 14:20:24'),
(91, 'Maria Ulfa', 'perempuan', 'X IPA 1', 'IPA', 'siswa', '', 'Jl. Pandan ', 'images21.png', '2024-08-02 14:20:24'),
(92, 'Wahyu Setiawan', 'laki-laki', 'X IPA 1', 'IPA', 'siswa', '', 'Jl. Karet Bunut', 'images22.png', '2024-08-02 14:20:24'),
(93, 'Rizki Amalia', 'perempuan', 'X IPA 1', 'IPA', 'siswa', '', 'Jl. Indah Kasih Gg utama', 'images23.png', '2024-08-02 14:20:24'),
(94, 'Kevin Prabowo', 'laki-laki', 'X IPA 1', 'IPA', 'siswa', '', 'Jl. M. Yamin', 'images24.png', '2024-08-02 14:20:24'),
(95, 'Dwi Lestari Putri', 'perempuan', 'X IPA 1', 'IPA', 'siswa', '', 'Jl. Inpres', 'images25.png', '2024-08-02 14:20:24'),
(96, 'Rizky Adriansyah', 'laki-laki', 'X IPA 1', 'IPA', 'siswa', '', 'Btn. Kopkar', 'images26.png', '2024-08-02 14:20:24'),
(97, 'Sari Dewi Ramadhani', 'perempuan', 'X IPA 1', 'IPA', 'siswa', '', 'Jl. Pandan ', 'images27.png', '2024-08-02 14:20:24'),
(98, 'Fikri Maulana', 'laki-laki', 'X IPA 1', 'IPA', 'siswa', '', 'Jl. Durian', 'images28.png', '2024-08-02 14:20:24'),
(99, 'Nia Amelia Sabrina', 'perempuan', 'X IPA 1', 'IPA', 'siswa', '', 'Mess Supir', 'images29.png', '2024-08-02 14:20:24'),
(100, 'Hadi Nugroho', 'laki-laki', 'X IPA 1', 'IPA', 'siswa', '', 'Btn. Kopkar', 'images30.png', '2024-08-02 14:20:24'),
(101, 'Maya Nurlaila', 'perempuan', 'X IPA 1', 'IPA', 'siswa', '', 'Jl. Kandis', 'images31.png', '2024-08-02 14:20:24'),
(102, 'Anisa Zahra', 'perempuan', 'X IPA 1', 'IPA', 'siswa', '', 'Mess Supir', 'images32.png', '2024-08-02 14:20:24'),
(103, 'Rian Wijaya', 'laki-laki', 'X IPA 1', 'IPA', 'siswa', '', 'Jl. Durian', 'images33.png', '2024-08-02 14:20:24'),
(104, 'Indah Rahayu', 'perempuan', 'X IPA 1', 'IPA', 'siswa', '', 'Jl. Pandan ', 'images34.png', '2024-08-02 14:20:24'),
(105, 'Junaidi Arif', 'laki-laki', 'X IPA 1', 'IPA', 'siswa', '', 'Jl. Pertiwi', 'images35.png', '2024-08-02 14:20:24'),
(106, 'Dela Putri', 'perempuan', 'X IPA 1', 'IPA', 'siswa', '', 'Jl. Inpres', 'images36.png', '2024-08-02 14:20:24'),
(107, 'Rina Anjarwati', 'perempuan', 'X IPA 1', 'IPA', 'siswa', '', 'Jl. Karet Bunut', 'images37.png', '2024-08-02 14:20:24'),
(108, 'Wulan Sari', 'perempuan', 'X IPA 1', 'IPA', 'siswa', '', 'Jl. Hang Jebat', 'images38.png', '2024-08-02 14:20:24'),
(109, 'Ega Putra', 'laki-laki', 'X IPA 1', 'IPA', 'siswa', '', 'Jl. Karet', 'images39.png', '2024-08-02 14:20:24'),
(110, 'Vina Rosita', 'perempuan', 'X IPA 1', 'IPA', 'siswa', '', 'Jl. Inpres', 'images40.png', '2024-08-02 14:20:24'),
(111, 'Intan Permata', 'perempuan', 'X IPA 1', 'IPA', 'siswa', '', 'Btn. Kopkar', 'images41.png', '2024-08-02 14:20:24'),
(112, 'Ziad Adriansyah Fikri', 'laki-laki', 'X IPA 1', 'IPA', 'siswa', '', 'Jl. Pandan ', 'images42.png', '2024-08-02 14:20:24'),
(113, 'Laila Wulandari', 'perempuan', 'X IPA 1', 'IPA', 'siswa', '', 'Jl. Durian', 'images43.png', '2024-08-02 14:20:24'),
(114, 'Putri Amalia', 'perempuan', 'X IPA 1', 'IPA', 'siswa', '', 'Jl. Durian', 'images44.png', '2024-08-02 14:20:24'),
(115, 'Andi Arianto', 'laki-laki', 'X IPA 2', 'IPA', 'siswa', '', 'Jl. Inpres', 'images45.png', '2024-08-02 14:20:24'),
(116, 'Miftahul Jannah', 'perempuan', 'X IPA 2', 'IPA', 'siswa', '', 'Jl. Pertiwi', 'images46.png', '2024-08-02 14:20:24'),
(118, 'Cindy Pratiwi', 'perempuan', 'X IPA 2', 'IPA', 'siswa', '', 'Jl. Kandis', 'images47.png', '2024-08-02 14:20:24'),
(119, 'Ega Fadillah', 'perempuan', 'X IPA 2', 'IPA', 'siswa', '', 'Jl. Kandis', 'images48.png', '2024-08-02 14:20:24'),
(120, 'Fani Amalia', 'perempuan', 'X IPA 2', 'IPA', 'siswa', '', 'Jl. Pandan ', 'images49.png', '2024-08-02 14:20:24'),
(121, 'Gita Ramadhani', 'perempuan', 'X IPA 2', 'IPA', 'siswa', '', 'Jl. Pemda', 'images50.png', '2024-08-02 14:20:24'),
(122, 'Hadi Sutisna', 'laki-laki', 'X IPA 2', 'IPA', 'siswa', '', 'Jl. Hang Jebat', 'images53.png', '2024-08-02 14:20:24'),
(123, 'Indah Lestari', 'perempuan', 'X IPA 2', 'IPA', 'siswa', '', 'Jl. Pemda', 'images52.png', '2024-08-02 14:20:24'),
(124, 'Kiki Putri', 'perempuan', 'X IPA 2', 'IPA', 'siswa', '', 'Btn. Maredan', 'images54.png', '2024-08-02 14:20:24'),
(125, 'Laila Kurniawati', 'perempuan', 'X IPA 2', 'IPA', 'siswa', '', 'Btn. Maredan', 'images55.png', '2024-08-02 14:20:24'),
(126, 'Nadia Cahyani', 'perempuan', 'X IPA 2', 'IPA', 'siswa', '', 'Jl. 2 Kpr 1', 'images56.png', '2024-08-02 14:20:24'),
(127, 'Oki Saputra', 'laki-laki', 'X IPA 2', 'IPA', 'siswa', '', 'Jl. 3 Kpr 1', 'images57.png', '2024-08-02 14:20:24'),
(128, 'Putri Nabila', 'perempuan', 'X IPA 2', 'IPA', 'siswa', '', 'Jl. Indah Kasih Gg utama', 'images58.png', '2024-08-02 14:20:24'),
(129, 'Qiana Sari', 'perempuan', 'X IPA 2', 'IPA', 'siswa', '', 'Jl. Inpres', 'images59.png', '2024-08-02 14:20:24'),
(130, 'Rafiq Kurniawan', 'laki-laki', 'X IPA 2', 'IPA', 'siswa', '', 'Jl. Pandan ', 'images60.png', '2024-08-02 14:20:24'),
(131, 'Taufik Hidayat', 'laki-laki', 'X IPA 2', 'IPA', 'siswa', '', 'Jl. Impres', 'images61.png', '2024-08-02 14:20:24'),
(132, 'Umi Syafiqah', 'perempuan', 'X IPA 2', 'IPA', 'siswa', '', 'Jl. Pertiwi', 'images62.png', '2024-08-02 14:20:24'),
(133, 'Vina Permata', 'perempuan', 'X IPA 2', 'IPA', 'siswa', '', 'Jl. Durian', 'images63.png', '2024-08-02 14:20:24'),
(134, 'Zainal Abidin', 'laki-laki', 'X IPA 2', 'IPA', 'siswa', '', 'Jl. Pertiwi', 'images64.png', '2024-08-02 14:20:24'),
(135, 'Ari Pratama', 'laki-laki', 'X IPA 2', 'IPA', 'siswa', '', 'Jl. Sma', 'images65.png', '2024-08-02 14:20:24'),
(136, 'Alia Fadilah', 'perempuan', 'X IPA 2', 'IPA', 'siswa', '', 'Jl. SMA', 'images66.png', '2024-08-02 14:20:24'),
(137, 'Reza Santoso', 'laki-laki', 'X IPA 2', 'IPA', 'siswa', '', 'Jl. Pemda', 'images67.png', '2024-08-02 14:20:24'),
(138, 'Sinta Lestari', 'perempuan', 'X IPA 2', 'IPA', 'siswa', '', 'Jl. Maredan', 'images68.png', '2024-08-02 14:20:24'),
(139, 'Yudi Santosa', 'laki-laki', 'X IPA 2', 'IPA', 'siswa', '', 'Jl. Maredan', 'images69.png', '2024-08-02 14:20:24'),
(140, 'Xena Putri Amalia', 'perempuan', 'X IPA 2', 'IPA', 'siswa', '', 'Btn. Maredan', 'images70.png', '2024-08-02 14:20:24'),
(141, 'Nur Amaliah', 'perempuan', 'X IPA 2', 'IPA', 'siswa', '', 'Btn. Kopkar', 'images71.png', '2024-08-02 14:20:24'),
(142, 'Joko Handoyo', 'laki-laki', 'X IPA 2', 'IPA', 'siswa', '', 'Jl. Hang Jebat', 'images72.png', '2024-08-02 14:20:24'),
(143, 'Andika Dimas', 'laki-laki', 'X IPA 2', 'IPA', 'siswa', '', 'Btn. Cendrawasi', 'images73.png', '2024-08-02 14:20:24'),
(144, 'Nadif Hamzah', 'laki-laki', 'X IPA 2', 'IPA', 'siswa', '', 'Btn. Cendrawasi', 'images74.png', '2024-08-02 14:20:24'),
(145, 'Arif Budiman', 'Laki-laki', 'X IPA 3', 'IPA', 'siswa', '', 'Jl. Merpati 1', '', '2024-08-02 14:20:24'),
(146, 'Bella Lestari', 'Perempuan', 'X IPA 3', 'IPA', 'siswa', '', 'Jl. Anggrek 2', '', '2024-08-02 14:20:24'),
(147, 'Cahya Permata', 'Perempuan', 'X IPA 3', 'IPA', 'siswa', '', 'Jl. Melati 3', '', '2024-08-02 14:20:24'),
(148, 'Daniel Setiawan', 'Laki-laki', 'X IPA 3', 'IPA', 'siswa', '', 'Jl. Mawar 4', '', '2024-08-02 14:20:24'),
(149, 'Eliana Putri', 'Perempuan', 'X IPA 3', 'IPA', 'siswa', '', 'Jl. Kenanga 5', '', '2024-08-02 14:20:24'),
(150, 'Fajar Nugroho', 'Laki-laki', 'X IPA 3', 'IPA', 'siswa', '', 'Jl. Kamboja 6', '', '2024-08-02 14:20:24'),
(151, 'Guntur Saputra', 'Laki-laki', 'X IPA 3', 'IPA', 'siswa', '', 'Jl. Dahlia 7', '', '2024-08-02 14:20:24'),
(152, 'Hani Pratiwi', 'Perempuan', 'X IPA 3', 'IPA', 'siswa', '', 'Jl. Seruni 8', '', '2024-08-02 14:20:24'),
(153, 'Iwan Kurniawan', 'Laki-laki', 'X IPA 3', 'IPA', 'siswa', '', 'Jl. Teratai 9', '', '2024-08-02 14:20:24'),
(154, 'Jeni Rizkiani', 'Perempuan', 'X IPA 3', 'IPA', 'siswa', '', 'Jl. Karet 10', '', '2024-08-02 14:20:24'),
(155, 'Kurnia Sari', 'Perempuan', 'X IPA 3', 'IPA', 'siswa', '', 'Jl. Cemara 11', '', '2024-08-02 14:20:24'),
(156, 'Luthfi Ramadhan', 'Laki-laki', 'X IPA 3', 'IPA', 'siswa', '', 'Jl. Cendana 12', '', '2024-08-02 14:20:24'),
(157, 'Maya Kristina', 'Perempuan', 'X IPA 3', 'IPA', 'siswa', '', 'Jl. Pinus 13', '', '2024-08-02 14:20:24'),
(158, 'Nanda Permadi', 'Laki-laki', 'X IPA 3', 'IPA', 'siswa', '', 'Jl. Akasia 14', '', '2024-08-02 14:20:24'),
(159, 'Odelia Fransisca', 'Perempuan', 'X IPA 3', 'IPA', 'siswa', '', 'Jl. Flamboyan 15', '', '2024-08-02 14:20:24'),
(160, 'Putra Maulana', 'Laki-laki', 'X IPA 3', 'IPA', 'siswa', '', 'Jl. Sawo 16', '', '2024-08-02 14:20:24'),
(161, 'Qori Amalia', 'Perempuan', 'X IPA 3', 'IPA', 'siswa', '', 'Jl. Mangga 17', '', '2024-08-02 14:20:24'),
(162, 'Rendy Prasetyo', 'Laki-laki', 'X IPA 3', 'IPA', 'siswa', '', 'Jl. Rambutan 18', '', '2024-08-02 14:20:24'),
(163, 'Santi Dewi', 'Perempuan', 'X IPA 3', 'IPA', 'siswa', '', 'Jl. Durian 19', '', '2024-08-02 14:20:24'),
(164, 'Tommy Wijaya', 'Laki-laki', 'X IPA 3', 'IPA', 'siswa', '', 'Jl. Alpukat 20', '', '2024-08-02 14:20:24'),
(165, 'Ulfa Nurhasanah', 'Perempuan', 'X IPA 3', 'IPA', 'siswa', '', 'Jl. Jambu 21', '', '2024-08-02 14:20:24'),
(166, 'Vito Fernando', 'Laki-laki', 'X IPA 3', 'IPA', 'siswa', '', 'Jl. Ceri 22', '', '2024-08-02 14:20:24'),
(167, 'Wanda Febriani', 'Perempuan', 'X IPA 3', 'IPA', 'siswa', '', 'Jl. Duku 23', '', '2024-08-02 14:20:24'),
(168, 'Xavier Pratama', 'Laki-laki', 'X IPA 3', 'IPA', 'siswa', '', 'Jl. Pisang 24', '', '2024-08-02 14:20:24'),
(169, 'Yana Setiyani', 'Perempuan', 'X IPA 3', 'IPA', 'siswa', '', 'Jl. Nangka 25', '', '2024-08-02 14:20:24'),
(170, 'Zaki Ramadan', 'Laki-laki', 'X IPA 3', 'IPA', 'siswa', '', 'Jl. Sirsak 26', '', '2024-08-02 14:20:24'),
(171, 'Riana Saraswati', 'Perempuan', 'X IPA 3', 'IPA', 'siswa', '', 'Jl. Gandaria 27', '', '2024-08-02 14:20:24'),
(172, 'Galih Pratama', 'Laki-laki', 'X IPA 3', 'IPA', 'siswa', '', 'Jl. Menteng 28', '', '2024-08-02 14:20:24'),
(173, 'Mirza Aditya', 'Laki-laki', 'X IPA 3', 'IPA', 'siswa', '', 'Jl. Kapuk 29', '', '2024-08-02 14:20:24'),
(174, 'Aditya Permana', 'Laki-laki', 'X IPA 3', 'IPA', 'siswa', '', 'Jl. Pandan 30', '', '2024-08-02 14:20:24'),
(175, 'Risma Amalia', 'Perempuan', 'X IPA 3', 'IPA', 'siswa', '', 'Jl. Bambu 31', '', '2024-08-02 14:20:24'),
(176, 'Satria Nugraha', 'Laki-laki', 'X IPA 3', 'IPA', 'siswa', '', 'Jl. Coklat 32', '', '2024-08-02 14:20:24'),
(177, 'Aldo Pratama', 'Laki-laki', 'X IPA 4', 'IPA', 'siswa', '', 'Jl. Bunga 1', '', '2024-08-02 14:20:24'),
(178, 'Bening Ayu', 'Perempuan', 'X IPA 4', 'IPA', 'siswa', '', 'Jl. Mawar 2', '', '2024-08-02 14:20:24'),
(179, 'Citra Lestari', 'Perempuan', 'X IPA 4', 'IPA', 'siswa', '', 'Jl. Melati 3', '', '2024-08-02 14:20:24'),
(180, 'Doni Saputra', 'Laki-laki', 'X IPA 4', 'IPA', 'siswa', '', 'Jl. Kenanga 4', '', '2024-08-02 14:20:24'),
(181, 'Erlangga Putra', 'Laki-laki', 'X IPA 4', 'IPA', 'siswa', '', 'Jl. Kamboja 5', '', '2024-08-02 14:20:24'),
(182, 'Fanny Permana', 'Perempuan', 'X IPA 4', 'IPA', 'siswa', '', 'Jl. Dahlia 6', '', '2024-08-02 14:20:24'),
(183, 'Galuh Pratiwi', 'Perempuan', 'X IPA 4', 'IPA', 'siswa', '', 'Jl. Anggrek 7', '', '2024-08-02 14:20:24'),
(184, 'Hafiz Maulana', 'Laki-laki', 'X IPA 4', 'IPA', 'siswa', '', 'Jl. Mawar 8', '', '2024-08-02 14:20:24'),
(185, 'Ira Susanti', 'Perempuan', 'X IPA 4', 'IPA', 'siswa', '', 'Jl. Melati 9', '', '2024-08-02 14:20:24'),
(186, 'Joni Kurniawan', 'Laki-laki', 'X IPA 4', 'IPA', 'siswa', '', 'Jl. Kamboja 10', '', '2024-08-02 14:20:24'),
(187, 'Kartika Sari', 'Perempuan', 'X IPA 4', 'IPA', 'siswa', '', 'Jl. Dahlia 11', '', '2024-08-02 14:20:24'),
(188, 'Lukman Hakim', 'Laki-laki', 'X IPA 4', 'IPA', 'siswa', '', 'Jl. Kenanga 12', '', '2024-08-02 14:20:24'),
(189, 'Monica Sari', 'Perempuan', 'X IPA 4', 'IPA', 'siswa', '', 'Jl. Anggrek 13', '', '2024-08-02 14:20:24'),
(190, 'Nando Rizky', 'Laki-laki', 'X IPA 4', 'IPA', 'siswa', '', 'Jl. Mawar 14', '', '2024-08-02 14:20:24'),
(191, 'Oki Ramadhani', 'Laki-laki', 'X IPA 4', 'IPA', 'siswa', '', 'Jl. Melati 15', '', '2024-08-02 14:20:24'),
(192, 'Poppy Amalia', 'Perempuan', 'X IPA 4', 'IPA', 'siswa', '', 'Jl. Dahlia 16', '', '2024-08-02 14:20:24'),
(193, 'Qory Hasanah', 'Perempuan', 'X IPA 4', 'IPA', 'siswa', '', 'Jl. Kamboja 17', '', '2024-08-02 14:20:24'),
(194, 'Raka Nugraha', 'Laki-laki', 'X IPA 4', 'IPA', 'siswa', '', 'Jl. Anggrek 18', '', '2024-08-02 14:20:24'),
(195, 'Salsa Dewi', 'Perempuan', 'X IPA 4', 'IPA', 'siswa', '', 'Jl. Melati 19', '', '2024-08-02 14:20:24'),
(196, 'Tommy Wijaya', 'Laki-laki', 'X IPA 4', 'IPA', 'siswa', '', 'Jl. Dahlia 20', '', '2024-08-02 14:20:24'),
(197, 'Udin Santoso', 'Laki-laki', 'X IPA 4', 'IPA', 'siswa', '', 'Jl. Kenanga 21', '', '2024-08-02 14:20:24'),
(198, 'Vira Lestari', 'Perempuan', 'X IPA 4', 'IPA', 'siswa', '', 'Jl. Kamboja 22', '', '2024-08-02 14:20:24'),
(199, 'Wawan Setiawan', 'Laki-laki', 'X IPA 4', 'IPA', 'siswa', '', 'Jl. Anggrek 23', '', '2024-08-02 14:20:24'),
(200, 'Xena Permata', 'Perempuan', 'X IPA 4', 'IPA', 'siswa', '', 'Jl. Mawar 24', '', '2024-08-02 14:20:24'),
(201, 'Yuli Rahmawati', 'Perempuan', 'X IPA 4', 'IPA', 'siswa', '', 'Jl. Melati 25', '', '2024-08-02 14:20:24'),
(202, 'Zulfi Maulana', 'Laki-laki', 'X IPA 4', 'IPA', 'siswa', '', 'Jl. Kamboja 26', '', '2024-08-02 14:20:24'),
(203, 'Andre Pratama', 'Laki-laki', 'X IPA 4', 'IPA', 'siswa', '', 'Jl. Dahlia 27', '', '2024-08-02 14:20:24'),
(204, 'Bina Lestari', 'Perempuan', 'X IPA 4', 'IPA', 'siswa', '', 'Jl. Anggrek 28', '', '2024-08-02 14:20:24'),
(205, 'Candra Wijaya', 'Laki-laki', 'X IPA 4', 'IPA', 'siswa', '', 'Jl. Kenanga 29', '', '2024-08-02 14:20:24'),
(206, 'Dina Amalia', 'Perempuan', 'X IPA 4', 'IPA', 'siswa', '', 'Jl. Mawar 30', '', '2024-08-02 14:20:24'),
(207, 'Eko Putra', 'Laki-laki', 'X IPA 4', 'IPA', 'siswa', '', 'Jl. Melati 31', '', '2024-08-02 14:20:24'),
(208, 'Fika Ramadhani', 'Perempuan', 'X IPA 4', 'IPA', 'siswa', '', 'Jl. Kamboja 32', '', '2024-08-02 14:20:24'),
(209, 'Aris Setiawan', 'Laki-laki', 'X IPS 1', 'IPS', 'siswa', '', 'Jl. Nusa Indah 1', '', '2024-08-02 14:20:24'),
(210, 'Bunga Wulandari', 'Perempuan', 'X IPS 1', 'IPS', 'siswa', '', 'Jl. Teratai 2', '', '2024-08-02 14:20:24'),
(211, 'Cahyo Aditya', 'Laki-laki', 'X IPS 1', 'IPS', 'siswa', '', 'Jl. Melati 3', '', '2024-08-02 14:20:24'),
(212, 'Dewi Lestari', 'Perempuan', 'X IPS 1', 'IPS', 'siswa', '', 'Jl. Anggrek 4', '', '2024-08-02 14:20:24'),
(213, 'Eko Saputra', 'Laki-laki', 'X IPS 1', 'IPS', 'siswa', '', 'Jl. Kenanga 5', '', '2024-08-02 14:20:24'),
(214, 'Farah Amalia', 'Perempuan', 'X IPS 1', 'IPS', 'siswa', '', 'Jl. Kamboja 6', '', '2024-08-02 14:20:24'),
(215, 'Gilang Permana', 'Laki-laki', 'X IPS 1', 'IPS', 'siswa', '', 'Jl. Dahlia 7', '', '2024-08-02 14:20:24'),
(216, 'Hana Pratiwi', 'Perempuan', 'X IPS 1', 'IPS', 'siswa', '', 'Jl. Seruni 8', '', '2024-08-02 14:20:24'),
(217, 'Irfan Maulana', 'Laki-laki', 'X IPS 1', 'IPS', 'siswa', '', 'Jl. Mawar 9', '', '2024-08-02 14:20:24'),
(218, 'Jeni Rahmawati', 'Perempuan', 'X IPS 1', 'IPS', 'siswa', '', 'Jl. Cempaka 10', '', '2024-08-02 14:20:24'),
(219, 'Kiki Nurhasanah', 'Perempuan', 'X IPS 1', 'IPS', 'siswa', '', 'Jl. Karet 11', '', '2024-08-02 14:20:24'),
(220, 'Lutfi Ramadhan', 'Laki-laki', 'X IPS 1', 'IPS', 'siswa', '', 'Jl. Cendana 12', '', '2024-08-02 14:20:24'),
(221, 'Mega Putri', 'Perempuan', 'X IPS 1', 'IPS', 'siswa', '', 'Jl. Pinus 13', '', '2024-08-02 14:20:24'),
(222, 'Nanda Permadi', 'Laki-laki', 'X IPS 1', 'IPS', 'siswa', '', 'Jl. Akasia 14', '', '2024-08-02 14:20:24'),
(223, 'Olivia Amalia', 'Perempuan', 'X IPS 1', 'IPS', 'siswa', '', 'Jl. Flamboyan 15', '', '2024-08-02 14:20:24'),
(224, 'Pandu Maulana', 'Laki-laki', 'X IPS 1', 'IPS', 'siswa', '', 'Jl. Sawo 16', '', '2024-08-02 14:20:24'),
(225, 'Qisya Ramadhani', 'Perempuan', 'X IPS 1', 'IPS', 'siswa', '', 'Jl. Mangga 17', '', '2024-08-02 14:20:24'),
(226, 'Rian Prasetyo', 'Laki-laki', 'X IPS 1', 'IPS', 'siswa', '', 'Jl. Rambutan 18', '', '2024-08-02 14:20:24'),
(227, 'Santi Dewi', 'Perempuan', 'X IPS 1', 'IPS', 'siswa', '', 'Jl. Durian 19', '', '2024-08-02 14:20:24'),
(228, 'Taufik Hidayat', 'Laki-laki', 'X IPS 1', 'IPS', 'siswa', '', 'Jl. Alpukat 20', '', '2024-08-02 14:20:24'),
(229, 'Umar Syahputra', 'Laki-laki', 'X IPS 1', 'IPS', 'siswa', '', 'Jl. Jambu 21', '', '2024-08-02 14:20:24'),
(230, 'Vina Lestari', 'Perempuan', 'X IPS 1', 'IPS', 'siswa', '', 'Jl. Ceri 22', '', '2024-08-02 14:20:24'),
(231, 'Wawan Setiawan', 'Laki-laki', 'X IPS 1', 'IPS', 'siswa', '', 'Jl. Duku 23', '', '2024-08-02 14:20:24'),
(232, 'Xenia Amalia', 'Perempuan', 'X IPS 1', 'IPS', 'siswa', '', 'Jl. Pisang 24', '', '2024-08-02 14:20:24'),
(233, 'Yuni Rahmawati', 'Perempuan', 'X IPS 1', 'IPS', 'siswa', '', 'Jl. Nangka 25', '', '2024-08-02 14:20:24'),
(234, 'Zulfikar Maulana', 'Laki-laki', 'X IPS 1', 'IPS', 'siswa', '', 'Jl. Sirsak 26', '', '2024-08-02 14:20:24'),
(235, 'Ardi Pratama', 'Laki-laki', 'X IPS 1', 'IPS', 'siswa', '', 'Jl. Gandaria 27', '', '2024-08-02 14:20:24'),
(236, 'Bella Lestari', 'Perempuan', 'X IPS 1', 'IPS', 'siswa', '', 'Jl. Menteng 28', '', '2024-08-02 14:20:24'),
(237, 'Candra Wijaya', 'Laki-laki', 'X IPS 1', 'IPS', 'siswa', '', 'Jl. Kapuk 29', '', '2024-08-02 14:20:24'),
(238, 'Dina Amalia', 'Perempuan', 'X IPS 1', 'IPS', 'siswa', '', 'Jl. Pandan 30', '', '2024-08-02 14:20:24'),
(239, 'Eko Permana', 'Laki-laki', 'X IPS 1', 'IPS', 'siswa', '', 'Jl. Bambu 31', '', '2024-08-02 14:20:24'),
(240, 'Fika Ramadhani', 'Perempuan', 'X IPS 1', 'IPS', 'siswa', '', 'Jl. Coklat 32', '', '2024-08-02 14:20:24'),
(241, 'Adi Santoso', 'Laki-laki', 'X IPS 2', 'IPS', 'siswa', '', 'Jl. Merpati 1', '', '2024-08-02 14:20:24'),
(242, 'Budi Pratama', 'Laki-laki', 'X IPS 2', 'IPS', 'siswa', '', 'Jl. Anggrek 2', '', '2024-08-02 14:20:24'),
(243, 'Citra Dewi', 'Perempuan', 'X IPS 2', 'IPS', 'siswa', '', 'Jl. Melati 3', '', '2024-08-02 14:20:24'),
(244, 'Dewi Lestari', 'Perempuan', 'X IPS 2', 'IPS', 'siswa', '', 'Jl. Mawar 4', '', '2024-08-02 14:20:24'),
(245, 'Eka Putri', 'Perempuan', 'X IPS 2', 'IPS', 'siswa', '', 'Jl. Kenanga 5', '', '2024-08-02 14:20:24'),
(246, 'Fajar Nugroho', 'Laki-laki', 'X IPS 2', 'IPS', 'siswa', '', 'Jl. Kamboja 6', '', '2024-08-02 14:20:24'),
(247, 'Gita Pratiwi', 'Perempuan', 'X IPS 2', 'IPS', 'siswa', '', 'Jl. Dahlia 7', '', '2024-08-02 14:20:24'),
(248, 'Hana Amalia', 'Perempuan', 'X IPS 2', 'IPS', 'siswa', '', 'Jl. Seruni 8', '', '2024-08-02 14:20:24'),
(249, 'Iwan Setiawan', 'Laki-laki', 'X IPS 2', 'IPS', 'siswa', '', 'Jl. Teratai 9', '', '2024-08-02 14:20:24'),
(250, 'Joko Susanto', 'Laki-laki', 'X IPS 2', 'IPS', 'siswa', '', 'Jl. Karet 10', '', '2024-08-02 14:20:24'),
(251, 'Kiki Permana', 'Perempuan', 'X IPS 2', 'IPS', 'siswa', '', 'Jl. Cemara 11', '', '2024-08-02 14:20:24'),
(252, 'Lina Ramadhani', 'Perempuan', 'X IPS 2', 'IPS', 'siswa', '', 'Jl. Cendana 12', '', '2024-08-02 14:20:24'),
(253, 'Mira Putri', 'Perempuan', 'X IPS 2', 'IPS', 'siswa', '', 'Jl. Pinus 13', '', '2024-08-02 14:20:24'),
(254, 'Nanda Permadi', 'Laki-laki', 'X IPS 2', 'IPS', 'siswa', '', 'Jl. Akasia 14', '', '2024-08-02 14:20:24'),
(255, 'Olivia Amalia', 'Perempuan', 'X IPS 2', 'IPS', 'siswa', '', 'Jl. Flamboyan 15', '', '2024-08-02 14:20:24'),
(256, 'Pandu Maulana', 'Laki-laki', 'X IPS 2', 'IPS', 'siswa', '', 'Jl. Sawo 16', '', '2024-08-02 14:20:24'),
(257, 'Qisya Ramadhani', 'Perempuan', 'X IPS 2', 'IPS', 'siswa', '', 'Jl. Mangga 17', '', '2024-08-02 14:20:24'),
(258, 'Rian Prasetyo', 'Laki-laki', 'X IPS 2', 'IPS', 'siswa', '', 'Jl. Rambutan 18', '', '2024-08-02 14:20:24'),
(259, 'Santi Dewi', 'Perempuan', 'X IPS 2', 'IPS', 'siswa', '', 'Jl. Durian 19', '', '2024-08-02 14:20:24'),
(260, 'Tommy Wijaya', 'Laki-laki', 'X IPS 2', 'IPS', 'siswa', '', 'Jl. Alpukat 20', '', '2024-08-02 14:20:24'),
(261, 'Umar Syahputra', 'Laki-laki', 'X IPS 2', 'IPS', 'siswa', '', 'Jl. Jambu 21', '', '2024-08-02 14:20:24'),
(262, 'Vina Lestari', 'Perempuan', 'X IPS 2', 'IPS', 'siswa', '', 'Jl. Ceri 22', '', '2024-08-02 14:20:24'),
(263, 'Wawan Setiawan', 'Laki-laki', 'X IPS 2', 'IPS', 'siswa', '', 'Jl. Duku 23', '', '2024-08-02 14:20:24'),
(264, 'Xenia Amalia', 'Perempuan', 'X IPS 2', 'IPS', 'siswa', '', 'Jl. Pisang 24', '', '2024-08-02 14:20:24'),
(265, 'Yuni Rahmawati', 'Perempuan', 'X IPS 2', 'IPS', 'siswa', '', 'Jl. Nangka 25', '', '2024-08-02 14:20:24'),
(266, 'Zulfikar Maulana', 'Laki-laki', 'X IPS 2', 'IPS', 'siswa', '', 'Jl. Sirsak 26', '', '2024-08-02 14:20:24'),
(267, 'Ardi Pratama', 'Laki-laki', 'X IPS 2', 'IPS', 'siswa', '', 'Jl. Gandaria 27', '', '2024-08-02 14:20:24'),
(268, 'Bella Lestari', 'Perempuan', 'X IPS 2', 'IPS', 'siswa', '', 'Jl. Menteng 28', '', '2024-08-02 14:20:24'),
(269, 'Candra Wijaya', 'Laki-laki', 'X IPS 2', 'IPS', 'siswa', '', 'Jl. Kapuk 29', '', '2024-08-02 14:20:24'),
(270, 'Dina Amalia', 'Perempuan', 'X IPS 2', 'IPS', 'siswa', '', 'Jl. Pandan 30', '', '2024-08-02 14:20:24'),
(271, 'Eko Permana', 'Laki-laki', 'X IPS 2', 'IPS', 'siswa', '', 'Jl. Bambu 31', '', '2024-08-02 14:20:24'),
(272, 'Fika Ramadhani', 'Perempuan', 'X IPS 2', 'IPS', 'siswa', '', 'Jl. Coklat 32', '', '2024-08-02 14:20:24'),
(273, 'Ahmad Ramadhan', 'Laki-laki', 'X IPS 3', 'IPS', 'siswa', '', 'Jl. Merpati 1', '', '2024-08-02 14:20:24'),
(274, 'Bintang Nuraini', 'Perempuan', 'X IPS 3', 'IPS', 'siswa', '', 'Jl. Anggrek 2', '', '2024-08-02 14:20:24'),
(275, 'Cinta Lestari', 'Perempuan', 'X IPS 3', 'IPS', 'siswa', '', 'Jl. Melati 3', '', '2024-08-02 14:20:24'),
(276, 'Dani Saputra', 'Laki-laki', 'X IPS 3', 'IPS', 'siswa', '', 'Jl. Mawar 4', '', '2024-08-02 14:20:24'),
(277, 'Elina Putri', 'Perempuan', 'X IPS 3', 'IPS', 'siswa', '', 'Jl. Kenanga 5', '', '2024-08-02 14:20:24'),
(278, 'Fikri Nugroho', 'Laki-laki', 'X IPS 3', 'IPS', 'siswa', '', 'Jl. Kamboja 6', '', '2024-08-02 14:20:24'),
(279, 'Gina Pratiwi', 'Perempuan', 'X IPS 3', 'IPS', 'siswa', '', 'Jl. Dahlia 7', '', '2024-08-02 14:20:24'),
(280, 'Hasan Maulana', 'Laki-laki', 'X IPS 3', 'IPS', 'siswa', '', 'Jl. Seruni 8', '', '2024-08-02 14:20:24'),
(281, 'Indra Kurniawan', 'Laki-laki', 'X IPS 3', 'IPS', 'siswa', '', 'Jl. Teratai 9', '', '2024-08-02 14:20:24'),
(282, 'Jeni Rismawati', 'Perempuan', 'X IPS 3', 'IPS', 'siswa', '', 'Jl. Karet 10', '', '2024-08-02 14:20:24'),
(283, 'Karisma Amalia', 'Perempuan', 'X IPS 3', 'IPS', 'siswa', '', 'Jl. Cemara 11', '', '2024-08-02 14:20:24'),
(284, 'Luthfi Ramadhan', 'Laki-laki', 'X IPS 3', 'IPS', 'siswa', '', 'Jl. Cendana 12', '', '2024-08-02 14:20:24'),
(285, 'Maya Kristina', 'Perempuan', 'X IPS 3', 'IPS', 'siswa', '', 'Jl. Pinus 13', '', '2024-08-02 14:20:24'),
(286, 'Nanda Permadi', 'Laki-laki', 'X IPS 3', 'IPS', 'siswa', '', 'Jl. Akasia 14', '', '2024-08-02 14:20:24'),
(287, 'Olivia Fransisca', 'Perempuan', 'X IPS 3', 'IPS', 'siswa', '', 'Jl. Flamboyan 15', '', '2024-08-02 14:20:24'),
(288, 'Pandu Maulana', 'Laki-laki', 'X IPS 3', 'IPS', 'siswa', '', 'Jl. Sawo 16', '', '2024-08-02 14:20:24'),
(289, 'Qori Amalia', 'Perempuan', 'X IPS 3', 'IPS', 'siswa', '', 'Jl. Mangga 17', '', '2024-08-02 14:20:24'),
(290, 'Rendy Prasetyo', 'Laki-laki', 'X IPS 3', 'IPS', 'siswa', '', 'Jl. Rambutan 18', '', '2024-08-02 14:20:24'),
(291, 'Santi Dewi', 'Perempuan', 'X IPS 3', 'IPS', 'siswa', '', 'Jl. Durian 19', '', '2024-08-02 14:20:24'),
(292, 'Tomi Wijaya', 'Laki-laki', 'X IPS 3', 'IPS', 'siswa', '', 'Jl. Alpukat 20', '', '2024-08-02 14:20:24'),
(293, 'Umar Syahputra', 'Laki-laki', 'X IPS 3', 'IPS', 'siswa', '', 'Jl. Jambu 21', '', '2024-08-02 14:20:24'),
(294, 'Vina Lestari', 'Perempuan', 'X IPS 3', 'IPS', 'siswa', '', 'Jl. Ceri 22', '', '2024-08-02 14:20:24'),
(295, 'Wawan Setiawan', 'Laki-laki', 'X IPS 3', 'IPS', 'siswa', '', 'Jl. Duku 23', '', '2024-08-02 14:20:24'),
(296, 'Xena Permata', 'Perempuan', 'X IPS 3', 'IPS', 'siswa', '', 'Jl. Pisang 24', '', '2024-08-02 14:20:24'),
(297, 'Yulia Rahmawati', 'Perempuan', 'X IPS 3', 'IPS', 'siswa', '', 'Jl. Nangka 25', '', '2024-08-02 14:20:24'),
(298, 'Zulfikar Maulana', 'Laki-laki', 'X IPS 3', 'IPS', 'siswa', '', 'Jl. Sirsak 26', '', '2024-08-02 14:20:24'),
(299, 'Ardi Pratama', 'Laki-laki', 'X IPS 3', 'IPS', 'siswa', '', 'Jl. Gandaria 27', '', '2024-08-02 14:20:24'),
(300, 'Bella Lestari', 'Perempuan', 'X IPS 3', 'IPS', 'siswa', '', 'Jl. Menteng 28', '', '2024-08-02 14:20:24'),
(301, 'Candra Wijaya', 'Laki-laki', 'X IPS 3', 'IPS', 'siswa', '', 'Jl. Kapuk 29', '', '2024-08-02 14:20:24'),
(302, 'Dina Amalia', 'Perempuan', 'X IPS 3', 'IPS', 'siswa', '', 'Jl. Pandan 30', '', '2024-08-02 14:20:24'),
(303, 'Eko Permana', 'Laki-laki', 'X IPS 3', 'IPS', 'siswa', '', 'Jl. Bambu 31', '', '2024-08-02 14:20:24'),
(304, 'Fika Ramadhani', 'Perempuan', 'X IPS 3', 'IPS', 'siswa', '', 'Jl. Coklat 32', '', '2024-08-02 14:20:24'),
(305, 'Ahmad Fauzi', 'Laki-laki', 'X IPS 4', 'IPS', 'siswa', '', 'Jl. Merpati 1', '', '2024-08-02 14:20:24'),
(306, 'Bunga Wulandari', 'Perempuan', 'X IPS 4', 'IPS', 'siswa', '', 'Jl. Anggrek 2', '', '2024-08-02 14:20:24'),
(307, 'Citra Lestari', 'Perempuan', 'X IPS 4', 'IPS', 'siswa', '', 'Jl. Melati 3', '', '2024-08-02 14:20:24'),
(308, 'Doni Saputra', 'Laki-laki', 'X IPS 4', 'IPS', 'siswa', '', 'Jl. Mawar 4', '', '2024-08-02 14:20:24'),
(309, 'Erlangga Putra', 'Laki-laki', 'X IPS 4', 'IPS', 'siswa', '', 'Jl. Kenanga 5', '', '2024-08-02 14:20:24'),
(310, 'Farah Amalia', 'Perempuan', 'X IPS 4', 'IPS', 'siswa', '', 'Jl. Kamboja 6', '', '2024-08-02 14:20:24'),
(311, 'Gilang Permana', 'Laki-laki', 'X IPS 4', 'IPS', 'siswa', '', 'Jl. Dahlia 7', '', '2024-08-02 14:20:24'),
(312, 'Hana Pratiwi', 'Perempuan', 'X IPS 4', 'IPS', 'siswa', '', 'Jl. Seruni 8', '', '2024-08-02 14:20:24'),
(313, 'Irfan Maulana', 'Laki-laki', 'X IPS 4', 'IPS', 'siswa', '', 'Jl. Teratai 9', '', '2024-08-02 14:20:24'),
(314, 'Jeni Rahmawati', 'Perempuan', 'X IPS 4', 'IPS', 'siswa', '', 'Jl. Karet 10', '', '2024-08-02 14:20:24'),
(315, 'Kiki Nurhasanah', 'Perempuan', 'X IPS 4', 'IPS', 'siswa', '', 'Jl. Cemara 11', '', '2024-08-02 14:20:24'),
(316, 'Lutfi Ramadhan', 'Laki-laki', 'X IPS 4', 'IPS', 'siswa', '', 'Jl. Cendana 12', '', '2024-08-02 14:20:24'),
(317, 'Mega Putri', 'Perempuan', 'X IPS 4', 'IPS', 'siswa', '', 'Jl. Pinus 13', '', '2024-08-02 14:20:24'),
(318, 'Nanda Permadi', 'Laki-laki', 'X IPS 4', 'IPS', 'siswa', '', 'Jl. Akasia 14', '', '2024-08-02 14:20:24'),
(319, 'Olivia Amalia', 'Perempuan', 'X IPS 4', 'IPS', 'siswa', '', 'Jl. Flamboyan 15', '', '2024-08-02 14:20:24'),
(320, 'Pandu Maulana', 'Laki-laki', 'X IPS 4', 'IPS', 'siswa', '', 'Jl. Sawo 16', '', '2024-08-02 14:20:24'),
(321, 'Qory Hasanah', 'Perempuan', 'X IPS 4', 'IPS', 'siswa', '', 'Jl. Mangga 17', '', '2024-08-02 14:20:24'),
(322, 'Raka Nugraha', 'Laki-laki', 'X IPS 4', 'IPS', 'siswa', '', 'Jl. Rambutan 18', '', '2024-08-02 14:20:24'),
(323, 'Salsa Dewi', 'Perempuan', 'X IPS 4', 'IPS', 'siswa', '', 'Jl. Durian 19', '', '2024-08-02 14:20:24'),
(324, 'Tommy Wijaya', 'Laki-laki', 'X IPS 4', 'IPS', 'siswa', '', 'Jl. Alpukat 20', '', '2024-08-02 14:20:24'),
(325, 'Udin Santoso', 'Laki-laki', 'X IPS 4', 'IPS', 'siswa', '', 'Jl. Jambu 21', '', '2024-08-02 14:20:24'),
(326, 'Vira Lestari', 'Perempuan', 'X IPS 4', 'IPS', 'siswa', '', 'Jl. Ceri 22', '', '2024-08-02 14:20:24'),
(327, 'Wawan Setiawan', 'Laki-laki', 'X IPS 4', 'IPS', 'siswa', '', 'Jl. Duku 23', '', '2024-08-02 14:20:24'),
(328, 'Xenia Permata', 'Perempuan', 'X IPS 4', 'IPS', 'siswa', '', 'Jl. Pisang 24', '', '2024-08-02 14:20:24'),
(329, 'Yuli Rahmawati', 'Perempuan', 'X IPS 4', 'IPS', 'siswa', '', 'Jl. Nangka 25', '', '2024-08-02 14:20:24'),
(330, 'Zulfi Maulana', 'Laki-laki', 'X IPS 4', 'IPS', 'siswa', '', 'Jl. Sirsak 26', '', '2024-08-02 14:20:24'),
(331, 'Ardi Pratama', 'Laki-laki', 'X IPS 4', 'IPS', 'siswa', '', 'Jl. Gandaria 27', '', '2024-08-02 14:20:24'),
(332, 'Bella Lestari', 'Perempuan', 'X IPS 4', 'IPS', 'siswa', '', 'Jl. Menteng 28', '', '2024-08-02 14:20:24'),
(333, 'Candra Wijaya', 'Laki-laki', 'X IPS 4', 'IPS', 'siswa', '', 'Jl. Kapuk 29', '', '2024-08-02 14:20:24'),
(334, 'Dina Amalia', 'Perempuan', 'X IPS 4', 'IPS', 'siswa', '', 'Jl. Pandan 30', '', '2024-08-02 14:20:24'),
(335, 'Eko Permana', 'Laki-laki', 'X IPS 4', 'IPS', 'siswa', '', 'Jl. Bambu 31', '', '2024-08-02 14:20:24'),
(336, 'Fika Ramadhani', 'Perempuan', 'X IPS 4', 'IPS', 'siswa', '', 'Jl. Coklat 32', '', '2024-08-02 14:20:24'),
(337, 'Alya Nurani', 'Perempuan', 'XI IPA 1', 'IPA', 'siswa', '', 'Jl. Merpati 1', '', '2024-08-02 14:20:24'),
(338, 'Bima Santoso', 'Laki-laki', 'XI IPA 1', 'IPA', 'siswa', '', 'Jl. Anggrek 2', '', '2024-08-02 14:20:24'),
(339, 'Cindy Lestari', 'Perempuan', 'XI IPA 1', 'IPA', 'siswa', '', 'Jl. Melati 3', '', '2024-08-02 14:20:24'),
(340, 'Damar Nugraha', 'Laki-laki', 'XI IPA 1', 'IPA', 'siswa', '', 'Jl. Mawar 4', '', '2024-08-02 14:20:24'),
(341, 'Eka Putri', 'Perempuan', 'XI IPA 1', 'IPA', 'siswa', '', 'Jl. Kenanga 5', '', '2024-08-02 14:20:24'),
(342, 'Farhan Nugroho', 'Laki-laki', 'XI IPA 1', 'IPA', 'siswa', '', 'Jl. Kamboja 6', '', '2024-08-02 14:20:24'),
(343, 'Gina Pratiwi', 'Perempuan', 'XI IPA 1', 'IPA', 'siswa', '', 'Jl. Dahlia 7', '', '2024-08-02 14:20:24'),
(344, 'Hadi Pratama', 'Laki-laki', 'XI IPA 1', 'IPA', 'siswa', '', 'Jl. Seruni 8', '', '2024-08-02 14:20:24'),
(345, 'Indah Maulani', 'Perempuan', 'XI IPA 1', 'IPA', 'siswa', '', 'Jl. Teratai 9', '', '2024-08-02 14:20:24'),
(346, 'Joko Susanto', 'Laki-laki', 'XI IPA 1', 'IPA', 'siswa', '', 'Jl. Karet 10', '', '2024-08-02 14:20:24'),
(347, 'Karisma Amalia', 'Perempuan', 'XI IPA 1', 'IPA', 'siswa', '', 'Jl. Cemara 11', '', '2024-08-02 14:20:24'),
(348, 'Luthfi Ramadhan', 'Laki-laki', 'XI IPA 1', 'IPA', 'siswa', '', 'Jl. Cendana 12', '', '2024-08-02 14:20:24'),
(349, 'Maya Kristina', 'Perempuan', 'XI IPA 1', 'IPA', 'siswa', '', 'Jl. Pinus 13', '', '2024-08-02 14:20:24'),
(350, 'Nanda Permadi', 'Laki-laki', 'XI IPA 1', 'IPA', 'siswa', '', 'Jl. Akasia 14', '', '2024-08-02 14:20:24'),
(351, 'Olivia Fransisca', 'Perempuan', 'XI IPA 1', 'IPA', 'siswa', '', 'Jl. Flamboyan 15', '', '2024-08-02 14:20:24'),
(352, 'Pandu Maulana', 'Laki-laki', 'XI IPA 1', 'IPA', 'siswa', '', 'Jl. Sawo 16', '', '2024-08-02 14:20:24'),
(353, 'Qori Amalia', 'Perempuan', 'XI IPA 1', 'IPA', 'siswa', '', 'Jl. Mangga 17', '', '2024-08-02 14:20:24'),
(354, 'Rendy Prasetyo', 'Laki-laki', 'XI IPA 1', 'IPA', 'siswa', '', 'Jl. Rambutan 18', '', '2024-08-02 14:20:24'),
(355, 'Santi Dewi', 'Perempuan', 'XI IPA 1', 'IPA', 'siswa', '', 'Jl. Durian 19', '', '2024-08-02 14:20:24'),
(356, 'Tomi Wijaya', 'Laki-laki', 'XI IPA 1', 'IPA', 'siswa', '', 'Jl. Alpukat 20', '', '2024-08-02 14:20:24'),
(357, 'Umar Syahputra', 'Laki-laki', 'XI IPA 1', 'IPA', 'siswa', '', 'Jl. Jambu 21', '', '2024-08-02 14:20:24'),
(358, 'Vina Lestari', 'Perempuan', 'XI IPA 1', 'IPA', 'siswa', '', 'Jl. Ceri 22', '', '2024-08-02 14:20:24'),
(359, 'Wawan Setiawan', 'Laki-laki', 'XI IPA 1', 'IPA', 'siswa', '', 'Jl. Duku 23', '', '2024-08-02 14:20:24'),
(360, 'Xena Permata', 'Perempuan', 'XI IPA 1', 'IPA', 'siswa', '', 'Jl. Pisang 24', '', '2024-08-02 14:20:24'),
(361, 'Yulia Rahmawati', 'Perempuan', 'XI IPA 1', 'IPA', 'siswa', '', 'Jl. Nangka 25', '', '2024-08-02 14:20:24'),
(362, 'Zulfikar Maulana', 'Laki-laki', 'XI IPA 1', 'IPA', 'siswa', '', 'Jl. Sirsak 26', '', '2024-08-02 14:20:24'),
(363, 'Ardi Pratama', 'Laki-laki', 'XI IPA 1', 'IPA', 'siswa', '', 'Jl. Gandaria 27', '', '2024-08-02 14:20:24'),
(364, 'Bella Lestari', 'Perempuan', 'XI IPA 1', 'IPA', 'siswa', '', 'Jl. Menteng 28', '', '2024-08-02 14:20:24'),
(365, 'Candra Wijaya', 'Laki-laki', 'XI IPA 1', 'IPA', 'siswa', '', 'Jl. Kapuk 29', '', '2024-08-02 14:20:24'),
(366, 'Dina Amalia', 'Perempuan', 'XI IPA 1', 'IPA', 'siswa', '', 'Jl. Pandan 30', '', '2024-08-02 14:20:24'),
(367, 'Eko Permana', 'Laki-laki', 'XI IPA 1', 'IPA', 'siswa', '', 'Jl. Bambu 31', '', '2024-08-02 14:20:24'),
(368, 'Fika Ramadhani', 'Perempuan', 'XI IPA 1', 'IPA', 'siswa', '', 'Jl. Coklat 32', '', '2024-08-02 14:20:24'),
(369, 'Aldo Ramadhan', 'Laki-laki', 'XI IPA 2', 'IPA', 'siswa', '', 'Jl. Kenari 1', '', '2024-08-02 14:20:24'),
(370, 'Bella Andini', 'Perempuan', 'XI IPA 2', 'IPA', 'siswa', '', 'Jl. Anggrek 2', '', '2024-08-02 14:20:24'),
(371, 'Cindy Pratiwi', 'Perempuan', 'XI IPA 2', 'IPA', 'siswa', '', 'Jl. Melati 3', '', '2024-08-02 14:20:24'),
(372, 'Doni Nugraha', 'Laki-laki', 'XI IPA 2', 'IPA', 'siswa', '', 'Jl. Mawar 4', '', '2024-08-02 14:20:24'),
(373, 'Eka Susanti', 'Perempuan', 'XI IPA 2', 'IPA', 'siswa', '', 'Jl. Kenanga 5', '', '2024-08-02 14:20:24'),
(374, 'Fajar Pratama', 'Laki-laki', 'XI IPA 2', 'IPA', 'siswa', '', 'Jl. Kamboja 6', '', '2024-08-02 14:20:24'),
(375, 'Gina Lestari', 'Perempuan', 'XI IPA 2', 'IPA', 'siswa', '', 'Jl. Dahlia 7', '', '2024-08-02 14:20:24'),
(376, 'Hana Pratiwi', 'Perempuan', 'XI IPA 2', 'IPA', 'siswa', '', 'Jl. Seruni 8', '', '2024-08-02 14:20:24'),
(377, 'Irfan Maulana', 'Laki-laki', 'XI IPA 2', 'IPA', 'siswa', '', 'Jl. Teratai 9', '', '2024-08-02 14:20:24'),
(378, 'Joko Santoso', 'Laki-laki', 'XI IPA 2', 'IPA', 'siswa', '', 'Jl. Karet 10', '', '2024-08-02 14:20:24'),
(379, 'Karina Amalia', 'Perempuan', 'XI IPA 2', 'IPA', 'siswa', '', 'Jl. Cemara 11', '', '2024-08-02 14:20:24'),
(380, 'Lutfi Rahman', 'Laki-laki', 'XI IPA 2', 'IPA', 'siswa', '', 'Jl. Cendana 12', '', '2024-08-02 14:20:24'),
(381, 'Maya Andini', 'Perempuan', 'XI IPA 2', 'IPA', 'siswa', '', 'Jl. Pinus 13', '', '2024-08-02 14:20:24'),
(382, 'Nanda Permadi', 'Laki-laki', 'XI IPA 2', 'IPA', 'siswa', '', 'Jl. Akasia 14', '', '2024-08-02 14:20:24'),
(383, 'Olivia Fransisca', 'Perempuan', 'XI IPA 2', 'IPA', 'siswa', '', 'Jl. Flamboyan 15', '', '2024-08-02 14:20:24'),
(384, 'Pandu Nugroho', 'Laki-laki', 'XI IPA 2', 'IPA', 'siswa', '', 'Jl. Sawo 16', '', '2024-08-02 14:20:24'),
(385, 'Qory Hasanah', 'Perempuan', 'XI IPA 2', 'IPA', 'siswa', '', 'Jl. Mangga 17', '', '2024-08-02 14:20:24'),
(386, 'Rendy Prasetya', 'Laki-laki', 'XI IPA 2', 'IPA', 'siswa', '', 'Jl. Rambutan 18', '', '2024-08-02 14:20:24'),
(387, 'Santi Dewi', 'Perempuan', 'XI IPA 2', 'IPA', 'siswa', '', 'Jl. Durian 19', '', '2024-08-02 14:20:24'),
(388, 'Tommy Wijaya', 'Laki-laki', 'XI IPA 2', 'IPA', 'siswa', '', 'Jl. Alpukat 20', '', '2024-08-02 14:20:24'),
(389, 'Umar Syahputra', 'Laki-laki', 'XI IPA 2', 'IPA', 'siswa', '', 'Jl. Jambu 21', '', '2024-08-02 14:20:24'),
(390, 'Vina Lestari', 'Perempuan', 'XI IPA 2', 'IPA', 'siswa', '', 'Jl. Ceri 22', '', '2024-08-02 14:20:24'),
(391, 'Wawan Setiawan', 'Laki-laki', 'XI IPA 2', 'IPA', 'siswa', '', 'Jl. Duku 23', '', '2024-08-02 14:20:24'),
(392, 'Xena Permata', 'Perempuan', 'XI IPA 2', 'IPA', 'siswa', '', 'Jl. Pisang 24', '', '2024-08-02 14:20:24'),
(393, 'Yuli Rahmawati', 'Perempuan', 'XI IPA 2', 'IPA', 'siswa', '', 'Jl. Nangka 25', '', '2024-08-02 14:20:24'),
(394, 'Zulfi Maulana', 'Laki-laki', 'XI IPA 2', 'IPA', 'siswa', '', 'Jl. Sirsak 26', '', '2024-08-02 14:20:24'),
(395, 'Ardi Pratama', 'Laki-laki', 'XI IPA 2', 'IPA', 'siswa', '', 'Jl. Gandaria 27', '', '2024-08-02 14:20:24'),
(396, 'Bella Lestari', 'Perempuan', 'XI IPA 2', 'IPA', 'siswa', '', 'Jl. Menteng 28', '', '2024-08-02 14:20:24'),
(397, 'Candra Wijaya', 'Laki-laki', 'XI IPA 2', 'IPA', 'siswa', '', 'Jl. Kapuk 29', '', '2024-08-02 14:20:24'),
(398, 'Dina Amalia', 'Perempuan', 'XI IPA 2', 'IPA', 'siswa', '', 'Jl. Pandan 30', '', '2024-08-02 14:20:24'),
(399, 'Eko Permana', 'Laki-laki', 'XI IPA 2', 'IPA', 'siswa', '', 'Jl. Bambu 31', '', '2024-08-02 14:20:24'),
(400, 'Fika Ramadhani', 'Perempuan', 'XI IPA 2', 'IPA', 'siswa', '', 'Jl. Coklat 32', '', '2024-08-02 14:20:24'),
(401, 'Aditya Nugroho', 'Laki-laki', 'XI IPS 1', 'IPS', 'siswa', '', 'Jl. Kenari 1', '', '2024-08-02 14:20:24'),
(402, 'Bintang Permata', 'Perempuan', 'XI IPS 1', 'IPS', 'siswa', '', 'Jl. Anggrek 2', '', '2024-08-02 14:20:24'),
(403, 'Cindy Pratiwi', 'Perempuan', 'XI IPS 1', 'IPS', 'siswa', '', 'Jl. Melati 3', '', '2024-08-02 14:20:24'),
(404, 'Doni Saputra', 'Laki-laki', 'XI IPS 1', 'IPS', 'siswa', '', 'Jl. Mawar 4', '', '2024-08-02 14:20:24'),
(405, 'Eka Susanti', 'Perempuan', 'XI IPS 1', 'IPS', 'siswa', '', 'Jl. Kenanga 5', '', '2024-08-02 14:20:24'),
(406, 'Fajar Pratama', 'Laki-laki', 'XI IPS 1', 'IPS', 'siswa', '', 'Jl. Kamboja 6', '', '2024-08-02 14:20:24'),
(407, 'Gina Lestari', 'Perempuan', 'XI IPS 1', 'IPS', 'siswa', '', 'Jl. Dahlia 7', '', '2024-08-02 14:20:24'),
(408, 'Hana Pratiwi', 'Perempuan', 'XI IPS 1', 'IPS', 'siswa', '', 'Jl. Seruni 8', '', '2024-08-02 14:20:24'),
(409, 'Irfan Maulana', 'Laki-laki', 'XI IPS 1', 'IPS', 'siswa', '', 'Jl. Teratai 9', '', '2024-08-02 14:20:24'),
(410, 'Joko Santoso', 'Laki-laki', 'XI IPS 1', 'IPS', 'siswa', '', 'Jl. Karet 10', '', '2024-08-02 14:20:24'),
(411, 'Karina Amalia', 'Perempuan', 'XI IPS 1', 'IPS', 'siswa', '', 'Jl. Cemara 11', '', '2024-08-02 14:20:24'),
(412, 'Lutfi Rahman', 'Laki-laki', 'XI IPS 1', 'IPS', 'siswa', '', 'Jl. Cendana 12', '', '2024-08-02 14:20:24'),
(413, 'Maya Andini', 'Perempuan', 'XI IPS 1', 'IPS', 'siswa', '', 'Jl. Pinus 13', '', '2024-08-02 14:20:24'),
(414, 'Nanda Permadi', 'Laki-laki', 'XI IPS 1', 'IPS', 'siswa', '', 'Jl. Akasia 14', '', '2024-08-02 14:20:24'),
(415, 'Olivia Fransisca', 'Perempuan', 'XI IPS 1', 'IPS', 'siswa', '', 'Jl. Flamboyan 15', '', '2024-08-02 14:20:24'),
(416, 'Pandu Nugroho', 'Laki-laki', 'XI IPS 1', 'IPS', 'siswa', '', 'Jl. Sawo 16', '', '2024-08-02 14:20:24'),
(417, 'Qory Hasanah', 'Perempuan', 'XI IPS 1', 'IPS', 'siswa', '', 'Jl. Mangga 17', '', '2024-08-02 14:20:24'),
(418, 'Rendy Prasetya', 'Laki-laki', 'XI IPS 1', 'IPS', 'siswa', '', 'Jl. Rambutan 18', '', '2024-08-02 14:20:24'),
(419, 'Santi Dewi', 'Perempuan', 'XI IPS 1', 'IPS', 'siswa', '', 'Jl. Durian 19', '', '2024-08-02 14:20:24'),
(420, 'Tommy Wijaya', 'Laki-laki', 'XI IPS 1', 'IPS', 'siswa', '', 'Jl. Alpukat 20', '', '2024-08-02 14:20:24'),
(421, 'Umar Syahputra', 'Laki-laki', 'XI IPS 1', 'IPS', 'siswa', '', 'Jl. Jambu 21', '', '2024-08-02 14:20:24'),
(422, 'Vina Lestari', 'Perempuan', 'XI IPS 1', 'IPS', 'siswa', '', 'Jl. Ceri 22', '', '2024-08-02 14:20:24'),
(423, 'Wawan Setiawan', 'Laki-laki', 'XI IPS 1', 'IPS', 'siswa', '', 'Jl. Duku 23', '', '2024-08-02 14:20:24'),
(424, 'Xena Permata', 'Perempuan', 'XI IPS 1', 'IPS', 'siswa', '', 'Jl. Pisang 24', '', '2024-08-02 14:20:24'),
(425, 'Yuli Rahmawati', 'Perempuan', 'XI IPS 1', 'IPS', 'siswa', '', 'Jl. Nangka 25', '', '2024-08-02 14:20:24'),
(426, 'Zulfi Maulana', 'Laki-laki', 'XI IPS 1', 'IPS', 'siswa', '', 'Jl. Sirsak 26', '', '2024-08-02 14:20:24'),
(427, 'Ardi Pratama', 'Laki-laki', 'XI IPS 1', 'IPS', 'siswa', '', 'Jl. Gandaria 27', '', '2024-08-02 14:20:24'),
(428, 'Bella Lestari', 'Perempuan', 'XI IPS 1', 'IPS', 'siswa', '', 'Jl. Menteng 28', '', '2024-08-02 14:20:24'),
(429, 'Candra Wijaya', 'Laki-laki', 'XI IPS 1', 'IPS', 'siswa', '', 'Jl. Kapuk 29', '', '2024-08-02 14:20:24'),
(430, 'Dina Amalia', 'Perempuan', 'XI IPS 1', 'IPS', 'siswa', '', 'Jl. Pandan 30', '', '2024-08-02 14:20:24'),
(431, 'Eko Permana', 'Laki-laki', 'XI IPS 1', 'IPS', 'siswa', '', 'Jl. Bambu 31', '', '2024-08-02 14:20:24'),
(432, 'Fika Ramadhani', 'Perempuan', 'XI IPS 1', 'IPS', 'siswa', '', 'Jl. Coklat 32', '', '2024-08-02 14:20:24'),
(433, 'Aldo Ramadhan', 'Laki-laki', 'XI IPS 2', 'IPS', 'siswa', '', 'Jl. Kenari 1', '', '2024-08-02 14:20:24'),
(434, 'Bintang Permata', 'Perempuan', 'XI IPS 2', 'IPS', 'siswa', '', 'Jl. Anggrek 2', '', '2024-08-02 14:20:24'),
(435, 'Cindy Pratiwi', 'Perempuan', 'XI IPS 2', 'IPS', 'siswa', '', 'Jl. Melati 3', '', '2024-08-02 14:20:24'),
(436, 'Doni Saputra', 'Laki-laki', 'XI IPS 2', 'IPS', 'siswa', '', 'Jl. Mawar 4', '', '2024-08-02 14:20:24'),
(437, 'Eka Susanti', 'Perempuan', 'XI IPS 2', 'IPS', 'siswa', '', 'Jl. Kenanga 5', '', '2024-08-02 14:20:24'),
(438, 'Fajar Pratama', 'Laki-laki', 'XI IPS 2', 'IPS', 'siswa', '', 'Jl. Kamboja 6', '', '2024-08-02 14:20:24'),
(439, 'Gina Lestari', 'Perempuan', 'XI IPS 2', 'IPS', 'siswa', '', 'Jl. Dahlia 7', '', '2024-08-02 14:20:24'),
(440, 'Hana Pratiwi', 'Perempuan', 'XI IPS 2', 'IPS', 'siswa', '', 'Jl. Seruni 8', '', '2024-08-02 14:20:24'),
(441, 'Irfan Maulana', 'Laki-laki', 'XI IPS 2', 'IPS', 'siswa', '', 'Jl. Teratai 9', '', '2024-08-02 14:20:24'),
(442, 'Joko Santoso', 'Laki-laki', 'XI IPS 2', 'IPS', 'siswa', '', 'Jl. Karet 10', '', '2024-08-02 14:20:24'),
(443, 'Karina Amalia', 'Perempuan', 'XI IPS 2', 'IPS', 'siswa', '', 'Jl. Cemara 11', '', '2024-08-02 14:20:24'),
(444, 'Lutfi Rahman', 'Laki-laki', 'XI IPS 2', 'IPS', 'siswa', '', 'Jl. Cendana 12', '', '2024-08-02 14:20:24'),
(445, 'Maya Andini', 'Perempuan', 'XI IPS 2', 'IPS', 'siswa', '', 'Jl. Pinus 13', '', '2024-08-02 14:20:24'),
(446, 'Nanda Permadi', 'Laki-laki', 'XI IPS 2', 'IPS', 'siswa', '', 'Jl. Akasia 14', '', '2024-08-02 14:20:24'),
(447, 'Olivia Fransisca', 'Perempuan', 'XI IPS 2', 'IPS', 'siswa', '', 'Jl. Flamboyan 15', '', '2024-08-02 14:20:24'),
(448, 'Pandu Nugroho', 'Laki-laki', 'XI IPS 2', 'IPS', 'siswa', '', 'Jl. Sawo 16', '', '2024-08-02 14:20:24'),
(449, 'Qory Hasanah', 'Perempuan', 'XI IPS 2', 'IPS', 'siswa', '', 'Jl. Mangga 17', '', '2024-08-02 14:20:24'),
(450, 'Rendy Prasetya', 'Laki-laki', 'XI IPS 2', 'IPS', 'siswa', '', 'Jl. Rambutan 18', '', '2024-08-02 14:20:24'),
(451, 'Santi Dewi', 'Perempuan', 'XI IPS 2', 'IPS', 'siswa', '', 'Jl. Durian 19', '', '2024-08-02 14:20:24'),
(452, 'Tommy Wijaya', 'Laki-laki', 'XI IPS 2', 'IPS', 'siswa', '', 'Jl. Alpukat 20', '', '2024-08-02 14:20:24'),
(453, 'Umar Syahputra', 'Laki-laki', 'XI IPS 2', 'IPS', 'siswa', '', 'Jl. Jambu 21', '', '2024-08-02 14:20:24'),
(454, 'Vina Lestari', 'Perempuan', 'XI IPS 2', 'IPS', 'siswa', '', 'Jl. Ceri 22', '', '2024-08-02 14:20:24'),
(455, 'Wawan Setiawan', 'Laki-laki', 'XI IPS 2', 'IPS', 'siswa', '', 'Jl. Duku 23', '', '2024-08-02 14:20:24'),
(456, 'Xena Permata', 'Perempuan', 'XI IPS 2', 'IPS', 'siswa', '', 'Jl. Pisang 24', '', '2024-08-02 14:20:24'),
(457, 'Yuli Rahmawati', 'Perempuan', 'XI IPS 2', 'IPS', 'siswa', '', 'Jl. Nangka 25', '', '2024-08-02 14:20:24'),
(458, 'Zulfi Maulana', 'Laki-laki', 'XI IPS 2', 'IPS', 'siswa', '', 'Jl. Sirsak 26', '', '2024-08-02 14:20:24'),
(459, 'Ardi Pratama', 'Laki-laki', 'XI IPS 2', 'IPS', 'siswa', '', 'Jl. Gandaria 27', '', '2024-08-02 14:20:24'),
(460, 'Bella Lestari', 'Perempuan', 'XI IPS 2', 'IPS', 'siswa', '', 'Jl. Menteng 28', '', '2024-08-02 14:20:24'),
(461, 'Candra Wijaya', 'Laki-laki', 'XI IPS 2', 'IPS', 'siswa', '', 'Jl. Kapuk 29', '', '2024-08-02 14:20:24'),
(462, 'Dina Amalia', 'Perempuan', 'XI IPS 2', 'IPS', 'siswa', '', 'Jl. Pandan 30', '', '2024-08-02 14:20:24'),
(463, 'Eko Permana', 'Laki-laki', 'XI IPS 2', 'IPS', 'siswa', '', 'Jl. Bambu 31', '', '2024-08-02 14:20:24'),
(464, 'Fika Ramadhani', 'Perempuan', 'XI IPS 2', 'IPS', 'siswa', '', 'Jl. Coklat 32', '', '2024-08-02 14:20:24'),
(465, 'Aditya Ramadhan', 'Laki-laki', 'XII IPA 1', 'IPA', 'siswa', '', 'Jl. Kenari 1', '', '2024-08-02 14:20:24'),
(466, 'Bintang Permata', 'Perempuan', 'XII IPA 1', 'IPA', 'siswa', '', 'Jl. Anggrek 2', '', '2024-08-02 14:20:24'),
(467, 'Cindy Pratiwi', 'Perempuan', 'XII IPA 1', 'IPA', 'siswa', '', 'Jl. Melati 3', '', '2024-08-02 14:20:24'),
(468, 'Doni Saputra', 'Laki-laki', 'XII IPA 1', 'IPA', 'siswa', '', 'Jl. Mawar 4', '', '2024-08-02 14:20:24'),
(469, 'Eka Susanti', 'Perempuan', 'XII IPA 1', 'IPA', 'siswa', '', 'Jl. Kenanga 5', '', '2024-08-02 14:20:24'),
(470, 'Fajar Pratama', 'Laki-laki', 'XII IPA 1', 'IPA', 'siswa', '', 'Jl. Kamboja 6', '', '2024-08-02 14:20:24'),
(471, 'Gina Lestari', 'Perempuan', 'XII IPA 1', 'IPA', 'siswa', '', 'Jl. Dahlia 7', '', '2024-08-02 14:20:24'),
(472, 'Hana Pratiwi', 'Perempuan', 'XII IPA 1', 'IPA', 'siswa', '', 'Jl. Seruni 8', '', '2024-08-02 14:20:24'),
(473, 'Irfan Maulana', 'Laki-laki', 'XII IPA 1', 'IPA', 'siswa', '', 'Jl. Teratai 9', '', '2024-08-02 14:20:24'),
(474, 'Joko Santoso', 'Laki-laki', 'XII IPA 1', 'IPA', 'siswa', '', 'Jl. Karet 10', '', '2024-08-02 14:20:24'),
(475, 'Karina Amalia', 'Perempuan', 'XII IPA 1', 'IPA', 'siswa', '', 'Jl. Cemara 11', '', '2024-08-02 14:20:24'),
(476, 'Lutfi Rahman', 'Laki-laki', 'XII IPA 1', 'IPA', 'siswa', '', 'Jl. Cendana 12', '', '2024-08-02 14:20:24'),
(477, 'Maya Andini', 'Perempuan', 'XII IPA 1', 'IPA', 'siswa', '', 'Jl. Pinus 13', '', '2024-08-02 14:20:24'),
(478, 'Nanda Permadi', 'Laki-laki', 'XII IPA 1', 'IPA', 'siswa', '', 'Jl. Akasia 14', '', '2024-08-02 14:20:24'),
(479, 'Olivia Fransisca', 'Perempuan', 'XII IPA 1', 'IPA', 'siswa', '', 'Jl. Flamboyan 15', '', '2024-08-02 14:20:24'),
(480, 'Pandu Nugroho', 'Laki-laki', 'XII IPA 1', 'IPA', 'siswa', '', 'Jl. Sawo 16', '', '2024-08-02 14:20:24'),
(481, 'Qory Hasanah', 'Perempuan', 'XII IPA 1', 'IPA', 'siswa', '', 'Jl. Mangga 17', '', '2024-08-02 14:20:24'),
(482, 'Rendy Prasetya', 'Laki-laki', 'XII IPA 1', 'IPA', 'siswa', '', 'Jl. Rambutan 18', '', '2024-08-02 14:20:24'),
(483, 'Santi Dewi', 'Perempuan', 'XII IPA 1', 'IPA', 'siswa', '', 'Jl. Durian 19', '', '2024-08-02 14:20:24'),
(484, 'Tommy Wijaya', 'Laki-laki', 'XII IPA 1', 'IPA', 'siswa', '', 'Jl. Alpukat 20', '', '2024-08-02 14:20:24'),
(485, 'Umar Syahputra', 'Laki-laki', 'XII IPA 1', 'IPA', 'siswa', '', 'Jl. Jambu 21', '', '2024-08-02 14:20:24'),
(486, 'Vina Lestari', 'Perempuan', 'XII IPA 1', 'IPA', 'siswa', '', 'Jl. Ceri 22', '', '2024-08-02 14:20:24'),
(487, 'Wawan Setiawan', 'Laki-laki', 'XII IPA 1', 'IPA', 'siswa', '', 'Jl. Duku 23', '', '2024-08-02 14:20:24'),
(488, 'Xena Permata', 'Perempuan', 'XII IPA 1', 'IPA', 'siswa', '', 'Jl. Pisang 24', '', '2024-08-02 14:20:24'),
(489, 'Yuli Rahmawati', 'Perempuan', 'XII IPA 1', 'IPA', 'siswa', '', 'Jl. Nangka 25', '', '2024-08-02 14:20:24'),
(490, 'Zulfi Maulana', 'Laki-laki', 'XII IPA 1', 'IPA', 'siswa', '', 'Jl. Sirsak 26', '', '2024-08-02 14:20:24'),
(491, 'Ardi Pratama', 'Laki-laki', 'XII IPA 1', 'IPA', 'siswa', '', 'Jl. Gandaria 27', '', '2024-08-02 14:20:24'),
(492, 'Bella Lestari', 'Perempuan', 'XII IPA 1', 'IPA', 'siswa', '', 'Jl. Menteng 28', '', '2024-08-02 14:20:24'),
(493, 'Candra Wijaya', 'Laki-laki', 'XII IPA 1', 'IPA', 'siswa', '', 'Jl. Kapuk 29', '', '2024-08-02 14:20:24'),
(494, 'Dina Amalia', 'Perempuan', 'XII IPA 1', 'IPA', 'siswa', '', 'Jl. Pandan 30', '', '2024-08-02 14:20:24'),
(495, 'Eko Permana', 'Laki-laki', 'XII IPA 1', 'IPA', 'siswa', '', 'Jl. Bambu 31', '', '2024-08-02 14:20:24');
INSERT INTO `anggota` (`id_anggota`, `nama`, `jenis_kelamin`, `kelas`, `jurusan`, `role`, `mapel`, `alamat`, `pas_foto`, `created_at`) VALUES
(496, 'Fika Ramadhani', 'Perempuan', 'XII IPA 1', 'IPA', 'siswa', '', 'Jl. Coklat 32', '', '2024-08-02 14:20:24'),
(497, 'Ani Susilowati', 'perempuan', '', '-Pilih Jurusan-', 'guru', 'Matematika', '', 'images76.png', '2024-08-02 14:20:24'),
(498, 's', 'laki-laki', 'x', 'IPA', 'siswa', '', 'Jl. Kandis', 'images77.png', '2024-08-02 14:20:24'),
(499, 'Sumiyati', 'perempuan', 'XII IPA 2', 'IPA', 'siswa', '', 'Jl. Pandan ', 'images78.png', '2024-08-02 14:24:45'),
(500, 'Asna Tarawan', 'perempuan', '', '-Pilih Jurusan-', 'guru', 'Bahasa Jepang', '', 'images79.png', '2024-08-02 14:25:45'),
(501, 'Supriyani', 'perempuan', '', '-Pilih Jurusan-', 'guru', 'Matematika', '', 'WhatsApp_Image_2023-05-31_at_11_34_111.jpeg', '2024-08-07 16:16:51'),
(502, 'Mely Susanti', 'perempuan', '', '-Pilih Jurusan-', 'guru', 'Kimia', 'Jl. Inpres', 'mif1.jpg', '2024-08-07 16:25:32');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `judul_buku` varchar(255) NOT NULL,
  `eksemplar` int(11) NOT NULL,
  `penulis` varchar(255) NOT NULL,
  `penerbit` varchar(255) NOT NULL,
  `tempat_terbit` varchar(255) NOT NULL,
  `edisi` varchar(255) NOT NULL,
  `tahun_terbit` year(4) NOT NULL,
  `asal` varchar(255) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `jenis_buku` varchar(255) NOT NULL,
  `kategori` int(11) NOT NULL,
  `rak` int(11) NOT NULL,
  `klasifikasi` varchar(255) NOT NULL,
  `no_panggil` varchar(255) NOT NULL,
  `stok` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `cover` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `judul_buku`, `eksemplar`, `penulis`, `penerbit`, `tempat_terbit`, `edisi`, `tahun_terbit`, `asal`, `harga`, `jenis_buku`, `kategori`, `rak`, `klasifikasi`, `no_panggil`, `stok`, `status`, `cover`, `created_at`) VALUES
(7, 'Buku Guru Pendidikan Agama Islam dan Budi Pekerti XII', 3, 'HA.Sholeh Dimyathi', 'PT.Intan Pariwara', 'Jakarta', 'Revisi', 2018, 'BOS', '', 'Non Fiksi', 3, 3, '297.77', '297.77/SHO/B/C1-3', 83, 'Tersedia', 'Buku_Guru_Pendidikan_Agama_Islam_dan_Budi_Pekerti_XII1.jpeg', '2024-08-02 14:47:08'),
(8, 'Buku Guru Pendidikan Agama Islam dan Budi Pekerti XI', 1, 'Mustakim', 'PT.Intan Pariwara', 'Jakarta', 'Revisi', 2017, 'BOS', '', 'Non Fiksi', 3, 3, '297.77', '297.77/MUS/B/C1', 231, 'Tersedia', 'Buku_Guru_Pendidikan_Agama_Islam_dan_Budi_Pekerti_XI.jpeg', '2024-08-02 14:47:08'),
(9, 'Bahasa Indonesia Kelas X', 4, 'Siti Rahmah', 'Erlangga', 'Jakarta', 'Revisi', 2020, 'BOS', '', 'Non Fiksi', 3, 3, '297.77', '297.77/MUS/B/C1', 100, 'Tersedia', 'bindo_kelas_xi.png', '2024-08-02 14:47:08'),
(11, 'Biologi Kelas XI', 3, 'Siti Rahmah', 'PT.Intan Pariwara', 'Jakarta', 'Revisi', 2020, 'BOS', '', 'Non Fiksi', 4, 5, '297.77', '297.77/MUS/B/C1', 250, 'Tersedia', 'biologi_kelas_xi.png', '2024-08-02 14:47:08'),
(12, 'Buku Guru EKONOMI untuk SMA/MA kelas XII', 2, 'Anik Widiastuti', 'PT.Intan Pariwara', 'Jakarta', 'Revisi', 2016, 'BOSDA', '', 'Non Fiksi', 6, 6, '330', '330/ANI/B/C1-3', 100, 'Tersedia', 'ekonomi_12.jpeg', '2024-08-02 14:47:08'),
(13, 'Buku Guru EKONOMI untuk SMA/MA kelas XI', 4, 'Anik Widia', 'PT.Intan Pariwara', 'Jakarta', 'Revisi', 2018, 'BOSDA', '', 'Non Fiksi', 6, 6, '330', '330/ANI/B/C1-3', 250, 'Tersedia', 'SMA_KL_XI_BUKU_GURU_EKONOMI_21.jpg', '2024-08-02 14:47:08'),
(14, 'Buku Guru Geografi', 2, 'Anik Widiastuti', 'PT.Intan Pariwara', 'Jakarta', 'Revisi', 2020, 'BOS', '', 'Non Fiksi', 8, 1, '297.77', '297.77/MUS/B/C1', 200, 'Tersedia', 'WhatsApp_Image_2024-06-20_at_12_31_05_d59aea84.jpg', '2024-08-02 14:47:08'),
(15, 'Buku Guru Pendidikan Agama Islam dan Budi Pekerti X', 3, 'Nelty Khairiyah', 'PT.Intan Pariwara', 'Jakarta', 'Revisi', 2017, 'BOS', '', 'Non Fiksi', 3, 3, '297.77', '297.77/NEL/B/C1-3', 100, 'Tersedia', 'Buku_Guru_Pendidikan_Agama_Islam_dan_Budi_Pekerti_X.png', '2024-08-02 14:47:08'),
(16, 'Buku Guru EKONOMI untuk SMA/MA kelas X', 3, 'Anik Widiastuti', 'PT.Intan Pariwara', 'Jakarta', 'Revisi', 2013, 'BOSDA', '', 'Non Fiksi', 6, 6, '330', '330/ANI/B/C1-3', 200, 'Tersedia', 'Buku_Guru_EKONOMI_kelas_X.jpeg', '2024-08-02 14:47:08'),
(17, 'Buku Guru Pendidikan Jasmani, Olahraga dan Kesehatan XII', 3, 'Soemaryoto', 'PT.Intan Pariwara', 'Jakarta', 'Revisi', 2018, 'BOSDA', '', 'Non Fiksi', 10, 12, '323.6', '323.6/SOE/B/C1-3', 200, 'Tersedia', 'Buku_Guru_Pendidikan_Jasmani,_Olahraga_dan_Kesehatan_XII.jpeg', '2024-08-02 14:47:08'),
(19, 'Buku Guru Pendidikan Jasmani, Olahraga dan Kesehatan XI', 3, 'Sumaryoto', 'PT.Intan Pariwara', 'Jakarta', 'Revisi', 2017, 'BOSDA', '', 'Non Fiksi', 10, 12, '323.7', '323.6/SUM/B/C1-2', 199, 'Tersedia', 'Buku_Guru_Pendidikan_Jasmani,_Olahraga_dan_Kesehatan_XI.jpeg', '2024-08-02 14:47:08'),
(20, 'Buku Siswa Pendidikan Jasmani, Olahraga dan Kesehatan XI', 3, 'Soemaryoto', 'PT.Intan Pariwara', 'Jakarta', 'Revisi', 2017, 'BOSDA', '', 'Non Fiksi', 10, 12, '323.7', '323.6/SUM/B/C1-2', 249, 'Tesedia', 'Buku_siswa_Pendidikan_Jasmani,_Olahraga_dan_Kesehatan_XI.jpeg', '2024-08-02 14:47:08'),
(21, 'Buku Guru Pendidikan Pancasila dan Kewarganegaraan X', 1, 'Tolib', 'PT.Intan Pariwara', 'Jakarta', 'Revisi', 2017, 'BOSDA', '', 'Non Fiksi', 11, 13, '320.07', '320.07/TOL/B/C1', 20, 'Tersedia', 'Buku_Guru_Pendidikan_Pancasila_dan_Kewarganegaraan_X1.jpeg', '2024-08-02 14:47:08'),
(22, 'Buku Siswa Pendidikan Pancasila dan Kewarganegaraan X', 1, 'Tolib', 'PT.Intan Pariwara', 'Jakarta', 'Revisi', 2017, 'BOSDA', '', 'Non Fiksi', 11, 13, '320.07', '320.07/TOL/B/C1', 250, 'Tersedia', 'Buku_siswa_Pendidikan_Pancasila_dan_Kewarganegaraan_X.jpeg', '2024-08-02 14:47:08'),
(23, 'Buku Guru Pendidikan Pancasila dan Kewarganegaraan XI', 2, 'Yusnawan', 'PT.Intan Pariwara', 'Jakarta', 'Revisi', 2017, 'BOSDA', '', 'Non Fiksi', 11, 13, '320.07', '320.07/YUS/B/C1-2', 50, 'Tersedia', 'Buku_Guru_Pendidikan_Pancasila_dan_Kewarganegaraan_XI.jpeg', '2024-08-02 14:47:08'),
(24, 'Buku Siswa Pendidikan Pancasila dan Kewarganegaraan XI', 2, 'Yusnawan', 'PT.Intan Pariwara', 'Jakarta', 'Revisi', 2017, 'BOSDA', '', 'Non Fiksi', 11, 13, '320.07', '320.07/YUS/B/C1-2', 250, 'Tersedia', 'Buku_sisw_Pendidikan_Pancasila_dan_Kewarganegaraan_XI.jpeg', '2024-08-02 14:47:08'),
(25, 'Buku Guru BIOLOGI untuk SMA/MA kelas XI', 2, 'Endah Sulistyowati', 'PT.Intan Pariwara', 'Jakarta', 'Revisi', 2016, 'BOS', '', 'Non Fiksi', 4, 5, '570', '570/END/B/C1-2', 250, 'Tersedia', 'Buku_Guru_BIOLOGI.jpeg', '2024-08-02 14:47:08'),
(26, 'Buku Siswa BIOLOGI untuk SMA/MA kelas XI', 1, 'Endah Sulistyowati', 'PT.Intan Pariwara', 'Jakarta', 'Revisi', 2016, 'BOS', '', 'Non Fiksi', 4, 5, '570', '570/END/B/C1-2', 250, 'Tersedia', 'Buku_siswa_BIOLOGI_kelas_XI.jpeg', '2024-08-02 14:47:08'),
(27, 'Buku Guru MATEMATIKA untuk SMA/MA kelas XII', 7, 'Tasari', 'PT.Intan Pariwara', 'Jakarta', 'Revisi', 2016, 'BOS', '', 'Non Fiksi', 12, 14, '510', '510/TAS/B/C1-7', 20, 'Tersedia', 'Buku_Guru_MATEMATIKA_kelas_XII1.jpeg', '2024-08-02 14:47:08'),
(28, 'Buku Siswa MATEMATIKA untuk SMA/MA kelas XII', 3, 'Tasari', 'PT.Intan Pariwara', 'Jakarta', 'Revisi', 2016, 'BOS', '', 'Non Fiksi', 12, 14, '510', '510/TAS/B/C1-7', 200, 'Tersedia', 'Buku_siswa_MATEMATIKA_kelas_XII.jpeg', '2024-08-02 14:47:08'),
(29, 'Buku Guru KIMIA untuk SMA/MA kelas XI', 4, 'Erfan Priyambodo', 'PT.Intan Pariwara', 'Jakarta', 'Revisi', 2016, 'BOS', '', 'Non Fiksi', 13, 15, '540', '540/ERF/B/C1-4', 10, 'Tersedia', 'Buku_Guru_KIMIA_kelas_XI.jpeg', '2024-08-02 14:47:08'),
(30, 'Buku Siswa KIMIA untuk SMA/MA kelas XI', 3, 'Erfan Priyambodo', 'PT.Intan Pariwara', 'Jakarta', 'Revisi', 2016, 'BOS', '', 'Non Fiksi', 13, 15, '540', '540/ERF/B/C1-4', 200, 'Tersedia', 'Buku_Siswa_KIMIA_kelas_XI.jpeg', '2024-08-02 14:47:08'),
(31, 'Buku Guru KIMIA untuk SMA/MA kelas XII', 5, 'Erfan Priyambodo', 'PT.Intan Pariwara', 'Jakarta', 'Revisi', 2016, 'BOS', '', 'Non Fiksi', 13, 15, '540', '540/ERF/B/C1-4', 20, 'Tersedia', 'Buku_Guru_KIMIA_kelas_XII.jpeg', '2024-08-02 14:47:08'),
(32, 'Buku Siswa KIMIA untuk SMA/MA kelas XII', 1, 'Erfan Priyambodo', 'PT.Intan Pariwara', 'Jakarta', 'Revisi', 2016, 'BOS', '', 'Non Fiksi', 13, 15, '540', '540/ERF/B/C1-4', 200, 'Tersedia', 'Buku_Siswa_KIMIA_kelas_XII.jpeg', '2024-08-02 14:47:08'),
(33, 'Buku Guru MATEMATIKA untuk SMA/MA kelas XI', 1, 'Sudianto Manullang', 'PT.Intan Pariwara', 'Jakarta', 'Revisi', 2017, 'BOS', '', 'Non Fiksi', 12, 14, '510', '510/SUD/B/C1', 20, 'Tersedia', 'Buku_Guru_MATEMATIKA_kelas_XI.jpeg', '2024-08-02 14:47:08'),
(34, 'Buku Siswa MATEMATIKA untuk SMA/MA kelas XI', 1, 'Sudianto Manullang', 'PT.Intan Pariwara', 'Jakarta', 'Revisi', 2017, 'BOS', '', 'Non Fiksi', 12, 14, '510', '510/SUD/B/C1', 250, 'Tersedia', 'Buku_Siswa_MATEMATIKA_kelas_XI.jpeg', '2024-08-02 14:47:08'),
(35, 'Buku Guru MATEMATIKA untuk SMA/MA kelas X', 1, 'Bornok Sinaga', 'PT.Intan Pariwara', 'Jakarta', 'Revisi', 2017, 'BOS', '', 'Non Fiksi', 12, 14, '510', '510/BOR/B/C1', 20, 'Tersedia', 'Buku_Guru_MATEMATIKAkelas_X.jpeg', '2024-08-02 14:47:08'),
(36, 'Buku Siswa MATEMATIKA untuk SMA/MA kelas X', 1, 'Bornok Sinaga', 'PT.Intan Pariwara', 'Jakarta', 'Revisi', 2017, 'BOS', '', 'Non Fiksi', 12, 14, '510', '510/BOR/B/C1', 250, 'Tersedia', 'Buku_Siswa_MATEMATIKA_kelas_X.jpeg', '2024-08-02 14:47:08'),
(37, 'Buku Guru FISIKA untuk SMA/MA kelas X', 2, 'Pujianto', 'PT.Intan Pariwara', 'Jakarta', 'Revisi', 2016, 'BOS', '', 'Non Fiksi', 7, 7, '530', '530/PUJ/B/C1-2', 10, 'Tersedia', 'Buku_Guru_FISIKA_kelas_X.jpeg', '2024-08-02 14:47:08'),
(38, 'Buku SiswaFISIKA untuk SMA/MA kelas X', 1, 'Pujianto', 'PT.Intan Pariwara', 'Jakarta', 'Revisi', 2016, 'BOS', '', 'Non Fiksi', 7, 7, '530', '530/PUJ/B/C1-2', 250, 'Tersedia', 'Buku_Siswa_FISIKA_kelas_X.jpeg', '2024-08-02 14:47:08'),
(39, 'Buku Guru SENI BUDAYA untuk SMA/MA kelas X', 4, 'Zackaria Soetedja', 'PT.Intan Pariwara', 'Jakarta', 'Revisi', 2017, 'BOS', '', 'Non Fiksi', 14, 16, '700', '700/ZAC/B/C1-4', 20, 'Tersedia', 'Buku_Guru_SENI_BUDAYA_kelas_X.jpeg', '2024-08-02 14:47:08'),
(40, 'Buku Siswa SENI BUDAYA untuk SMA/MA kelas X', 2, 'Zackaria Soetedja', 'PT.Intan Pariwara', 'Jakarta', 'Revisi', 2017, 'BOS', '', 'Non Fiksi', 14, 16, '700', '700/ZAC/B/C1-4', 250, 'Tersedia', 'Buku_Guru_SENI_BUDAYA_kelas_X1.jpeg', '2024-08-02 14:47:08'),
(41, 'Buku Guru SENI BUDAYA untuk SMA/MA kelas XI', 1, 'Sem Cornelyoes Bangun', 'PT.Intan Pariwara', 'Jakarta', 'Revisi', 2017, 'BOS', '', 'Non Fiksi', 14, 16, '700', '700/SEM/B/C1', 250, 'Tersedia', 'Buku_Guru_SENI_BUDAYAkelas_XI.jpeg', '2024-08-02 14:47:08'),
(42, 'Buku Siswa SENI BUDAYA untuk SMA/MA kelas X', 1, 'Sem Cornelyoes Bangun', 'PT.Intan Pariwara', 'Jakarta', 'Revisi', 2017, 'BOS', '', 'Non Fiksi', 14, 16, '700', '700/SEM/B/C1', 250, 'Tersedia', 'Buku_Siswa_SENI_BUDAYA_kelas_X.jpeg', '2024-08-02 14:47:08'),
(43, 'Buku Guru SENI BUDAYA untuk SMA/MA kelas XII', 2, 'Zackaria Soetedja', 'PT.Intan Pariwara', 'Jakarta', 'Revisi', 2018, 'BOS', '', 'Non Fiksi', 14, 16, '700', '700/ZAC/B/C1-2', 20, 'Tersedia', 'Buku_Guru_SENI_BUDAYAkelas_XII.jpeg', '2024-08-02 14:47:08'),
(44, 'Buku Siswa SENI BUDAYA untuk SMA/MA kelas XII', 1, 'Zackaria Soetedja', 'PT.Intan Pariwara', 'Jakarta', 'Revisi', 2018, 'BOS', '', 'Non Fiksi', 14, 16, '700', '700/ZAC/B/C1-2', 250, 'Tersedia', 'Buku_siswa_SENI_BUDAYA_kelas_XII.jpeg', '2024-08-02 14:47:08'),
(45, 'Buku Guru SEJARAH untuk SMA/MA kelas X', 4, 'Ririn Darini', 'Cempaka Putih', 'Jakarta', 'Revisi', 2016, 'BOS', '', 'Non Fiksi', 15, 17, '900', '900/RIR/B/C1-4', 20, 'Tersedia', 'Buku_Guru_SEJARAH_kelas_X.jpeg', '2024-08-02 14:47:08'),
(46, 'Buku Siswa SEJARAH untuk SMA/MA kelas X', 1, 'Ririn Darini', 'Cempaka Putih', 'Jakarta', 'Revisi', 2016, 'Pilih Asal Buku', '', 'Pilih Jenis Buku', 15, 17, '900', '900/RIR/B/C1-4', 250, 'Tersedia', 'Buku_siswa_SEJARAH_kelas_X.jpeg', '2024-08-02 14:47:08'),
(47, 'Buku Guru SEJARAH untuk SMA/MA kelas Xi', 2, 'Ririn Darini', 'Cempaka Putih', 'Jakarta', 'Revisi', 2016, 'BOS', '', 'Non Fiksi', 15, 17, '900', '900/RIR/B/C1-2', 20, 'Tersedia', 'Buku_Guru_SEJARAH_kelas_XI.jpeg', '2024-08-02 14:47:08'),
(48, 'Buku Siswa SEJARAH untuk SMA/MA kelas X', 2, 'Ririn Darini', 'Cempaka Putih', 'Jakarta', 'Revisi', 2016, 'BOS', '', 'Non Fiksi', 15, 17, '900', '900/RIR/B/C1-2', 250, 'Tersedia', 'Buku_siswa_SEJARAH_kelas_Xi.jpeg', '2024-08-02 14:47:08'),
(49, 'Buku Guru SEJARAH INDONESIA untuk SMA/MA kelas XII', 2, 'Abdurakhman', 'PT.Intan Pariwara', 'Jakarta', 'Revisi', 2018, 'BOS', '', 'Non Fiksi', 15, 17, '900', '900/ABD/B/C1-2', 20, 'Tersedia', 'Buku_Guru_SEJARAH_INDONESIA_kelas_XII.jpeg', '2024-08-02 14:47:08'),
(50, 'Buku Siswa SEJARAH INDONESIA untuk SMA/MA kelas XII', 2, 'Abdurakhman', 'PT.Intan Pariwara', 'Jakarta', 'Revisi', 2018, 'BOS', '', 'Non Fiksi', 15, 17, '900', '900/ABD/B/C1-2', 250, 'Tersedia', 'Buku_Guru_SEJARAH_INDONESIA_kelas_XII1.jpeg', '2024-08-02 14:47:08'),
(51, 'Buku Guru SEJARAH INDONESIA untuk SMA/MA kelas X', 2, 'Restu Gunawan', 'PT.Intan Pariwara', 'Jakarta', 'Revisi', 2017, 'BOS', '', 'Non Fiksi', 15, 17, '900', '900/RES/B/C1-2', 20, 'Tersedia', 'Buku_Guru_SEJARAH_INDONESIA_kelas_X.jpeg', '2024-08-02 14:47:08'),
(52, 'Buku Siswa SEJARAH INDONESIA untuk SMA/MA kelas X', 2, 'Restu Gunawan', 'PT.Intan Pariwara', 'Jakarta', 'Revisi', 2017, 'BOS', '', 'Non Fiksi', 15, 17, '900', '900/RES/B/C1-2', 250, 'Tersedia', 'Buku_Guru_SEJARAH_INDONESIA_kelas_X1.jpeg', '2024-08-02 14:47:08'),
(53, 'Buku Geografi', 1, 'Anik Widiastuti', 'PT.Intan Pariwara', 'Jakarta', 'Revisi', 2018, 'BOS', '', 'Non Fiksi', 8, 18, '900', '900/RIR/B/C1-2', 20, 'Tersedia', 'Buku_siswa_SENI_BUDAYA_kelas_XII1.jpeg', '2024-08-02 14:47:08');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `created_at`) VALUES
(1, 'Novel 1', '2024-08-02 14:46:42'),
(3, 'Agama', '2024-08-02 14:46:42'),
(4, 'Biologi', '2024-08-02 14:46:42'),
(6, 'Ekonomi', '2024-08-02 14:46:42'),
(7, 'Fisika', '2024-08-02 14:46:42'),
(8, 'Geografi', '2024-08-02 14:46:42'),
(9, 'Sosiologi', '2024-08-02 14:46:42'),
(10, 'Penjaskes', '2024-08-02 14:46:42'),
(11, 'PKN', '2024-08-02 14:46:42'),
(12, 'Matematika', '2024-08-02 14:46:42'),
(13, 'Kimia', '2024-08-02 14:46:42'),
(14, 'Seni Budaya', '2024-08-02 14:46:42'),
(15, 'Sejarah', '2024-08-02 14:46:42');

-- --------------------------------------------------------

--
-- Table structure for table `log_pinjam`
--

CREATE TABLE `log_pinjam` (
  `id_log` int(11) NOT NULL,
  `id_buku` varchar(10) NOT NULL,
  `id_anggota` varchar(10) NOT NULL,
  `tgl_pinjam` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `log_pinjam`
--

INSERT INTO `log_pinjam` (`id_log`, `id_buku`, `id_anggota`, `tgl_pinjam`) VALUES
(1, 'B001', 'A001', '2020-06-23'),
(2, 'B002', 'A001', '2020-06-25'),
(3, 'B003', 'A002', '2020-06-01'),
(4, 'B002', 'A005', '2020-06-23');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nim` int(11) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `prodi` varchar(10) NOT NULL,
  `asal_sekolah` varchar(100) NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nama`, `nim`, `jenis_kelamin`, `email`, `prodi`, `asal_sekolah`, `no_hp`, `alamat`) VALUES
(2, 'jannah', 1234567890, 'pr', 'bcb', 'SI', 'jaa', 'a', 'dd'),
(3, 'Miftahul', 2057301062, 'Perempuan', 'jannah20si@mahasiswa.pcr.ac.id', 'SI', 'SMAN 3 Tualang', '081276454655', 'jl budisari\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `ruangan` varchar(20) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `akreditasi` varchar(15) NOT NULL,
  `nama_kaprodi` varchar(255) NOT NULL,
  `tahun_berdiri` int(10) NOT NULL,
  `output_lulusan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`id`, `nama`, `ruangan`, `jurusan`, `akreditasi`, `nama_kaprodi`, `tahun_berdiri`, `output_lulusan`) VALUES
(1, 'Sistem Informasi', '310', 'JTI', 'A', 'Indah Lestari', 2013, 'Data Analyst');

-- --------------------------------------------------------

--
-- Table structure for table `rak`
--

CREATE TABLE `rak` (
  `id_rak` int(11) NOT NULL,
  `rak_buku` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rak`
--

INSERT INTO `rak` (`id_rak`, `rak_buku`, `created_at`) VALUES
(1, 'A Ipa 1', '2024-08-02 14:45:27'),
(3, 'Agama 1', '2024-08-02 14:45:27'),
(5, 'Biologi 2', '2024-08-02 14:45:27'),
(6, 'Ekonomi ', '2024-08-02 14:45:27'),
(7, 'Fisika', '2024-08-02 14:45:27'),
(9, 'Sosiologi', '2024-08-02 14:45:27'),
(10, 'Geografi', '2024-08-02 14:45:27'),
(12, 'Penjaskes', '2024-08-02 14:45:27'),
(13, 'PKN', '2024-08-02 14:45:27'),
(14, 'Matematika', '2024-08-02 14:45:27'),
(15, 'Kimia', '2024-08-02 14:45:27'),
(16, 'Seni Budaya', '2024-08-02 14:45:27'),
(17, 'Sejarah', '2024-08-02 14:45:27'),
(18, 'Geografi', '2024-08-02 14:45:27');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pinjam`
--

CREATE TABLE `tbl_pinjam` (
  `id_pinjam` int(11) NOT NULL,
  `pinjam_id` varchar(255) NOT NULL,
  `anggota_id` varchar(255) NOT NULL,
  `buku_id` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `tgl_pinjam` varchar(255) NOT NULL,
  `lama_pinjam` int(11) NOT NULL,
  `tgl_balik` varchar(255) NOT NULL,
  `tgl_kembali` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_pinjam`
--

INSERT INTO `tbl_pinjam` (`id_pinjam`, `pinjam_id`, `anggota_id`, `buku_id`, `status`, `tgl_pinjam`, `lama_pinjam`, `tgl_balik`, `tgl_kembali`) VALUES
(8, 'PJ001', 'AG002', 'BK008', 'Di Kembalikan', '2020-05-19', 1, '2020-05-20', '2020-05-20'),
(10, 'PJ009', 'AG002', 'BK008', 'Di Kembalikan', '2020-05-20', 1, '2020-05-21', '2020-05-20'),
(11, 'PJ0011', 'AG002', 'BK008', 'Di Kembalikan', '2024-05-01', 5, '2024-05-06', '2024-05-20');

-- --------------------------------------------------------

--
-- Table structure for table `tb_anggota`
--

CREATE TABLE `tb_anggota` (
  `id_anggota` varchar(10) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `jekel` enum('Laki-laki','Perempuan') NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `no_hp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_anggota`
--

INSERT INTO `tb_anggota` (`id_anggota`, `nama`, `jekel`, `kelas`, `no_hp`) VALUES
('A001', 'Ana', 'Perempuan', 'juwana', '089987789000'),
('A002', 'Bagus', 'Laki-laki', 'demak', '089987789098'),
('A003', 'Citra', 'Perempuan', 'demak', '085878526048'),
('A004', 'Didik', 'Laki-laki', 'pati', '087789987654'),
('A005', 'Edi', 'Laki-laki', 'demak', '089987789098');

-- --------------------------------------------------------

--
-- Table structure for table `tb_buku`
--

CREATE TABLE `tb_buku` (
  `id_buku` varchar(10) NOT NULL,
  `judul_buku` varchar(30) NOT NULL,
  `pengarang` varchar(30) NOT NULL,
  `penerbit` varchar(30) NOT NULL,
  `th_terbit` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_buku`
--

INSERT INTO `tb_buku` (`id_buku`, `judul_buku`, `pengarang`, `penerbit`, `th_terbit`) VALUES
('B001', 'Matematika', 'anastasya', 'armi print', 2010),
('B002', 'RPL 2', 'Eko', 'UMK', 2020),
('B003', 'C++', 'Anton', 'Toni Perc', 2010),
('B004', 'CI 4', 'anastasya', 'armi print', 2009),
('B005', 'Data Mining', 'Anton', 'Toni Perc', 2020);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama_pengguna` varchar(255) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(15) NOT NULL,
  `level` enum('Administrator','Petugas','','') NOT NULL,
  `foto` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id_pengguna`, `nama_pengguna`, `username`, `password`, `level`, `foto`, `created_at`) VALUES
(1, 'Miftahul Jannah Parinduri', 'admin1', '123admin', 'Administrator', 'Miftahul_Jannah_Parinduri.jpg', '2024-08-02 14:27:35'),
(3, 'Jannah', 'Pengguna', 'pengguna123', 'Petugas', '', '2024-08-02 14:27:35'),
(14, 'Asna Tarawan', 'asna', '123asna', 'Administrator', '', '2024-08-02 14:27:35'),
(15, 'Supriyani', 'yani', '123yani', 'Petugas', '', '2024-08-02 14:27:35'),
(16, 'M Ivan Sutrisna', 'miftahul_jp31', '12345', 'Petugas', 'Ahmad_Putra.jpg', '2024-08-02 14:27:35');

-- --------------------------------------------------------

--
-- Table structure for table `tb_sirkulasi`
--

CREATE TABLE `tb_sirkulasi` (
  `id_sk` varchar(20) NOT NULL,
  `id_buku` varchar(10) NOT NULL,
  `id_anggota` varchar(10) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `status` enum('PIN','KEM') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_sirkulasi`
--

INSERT INTO `tb_sirkulasi` (`id_sk`, `id_buku`, `id_anggota`, `tgl_pinjam`, `tgl_kembali`, `status`) VALUES
('S001', 'B001', 'A001', '2020-06-23', '2020-06-30', 'KEM'),
('S002', 'B002', 'A001', '2020-06-13', '2020-06-20', 'PIN'),
('S003', 'B003', 'A002', '2020-06-22', '2020-06-29', 'PIN'),
('S004', 'B002', 'A005', '2020-06-23', '2020-06-30', 'PIN');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `no_peminjaman` varchar(255) NOT NULL,
  `nama_anggota` int(11) NOT NULL,
  `tanggal_peminjaman` date NOT NULL,
  `tanggal_jatuhtempo` date NOT NULL,
  `buku` int(11) NOT NULL,
  `kode_buku` varchar(10) NOT NULL,
  `tanggal_pengembalian` date NOT NULL,
  `denda` decimal(10,2) NOT NULL,
  `status_denda` varchar(50) NOT NULL,
  `status_buku` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `no_peminjaman`, `nama_anggota`, `tanggal_peminjaman`, `tanggal_jatuhtempo`, `buku`, `kode_buku`, `tanggal_pengembalian`, `denda`, `status_denda`, `status_buku`, `created_at`) VALUES
(1, 'PJ001', 54, '2024-04-01', '2024-04-08', 8, '', '2024-05-28', '50000.00', 'Lunas', 'Dikembalikan', '2024-08-02 14:51:32'),
(19, '', 53, '2024-05-01', '2024-05-15', 7, '', '2024-05-28', '13000.00', 'Lunas', 'Dikembalikan', '2024-08-02 14:51:32'),
(20, '', 53, '2024-05-01', '2024-05-15', 8, '', '2024-05-28', '13000.00', 'Lunas', 'Dikembalikan', '2024-08-02 14:51:32'),
(21, '', 54, '2024-05-01', '2024-05-15', 8, '', '2024-05-28', '13000.00', 'Lunas', 'Dikembalikan', '2024-08-02 14:51:32'),
(22, '', 53, '2024-05-01', '2024-05-15', 7, '', '2024-05-28', '13000.00', 'Lunas', 'Dikembalikan', '2024-08-02 14:51:32'),
(23, '', 53, '2024-05-01', '2024-05-15', 8, '', '2024-05-28', '13000.00', 'Lunas', 'Dikembalikan', '2024-08-02 14:51:32'),
(24, '', 53, '2024-05-01', '2024-05-15', 9, '', '2024-05-28', '13000.00', 'Lunas', 'Dikembalikan', '2024-08-02 14:51:32'),
(25, '', 53, '2024-05-01', '2024-05-15', 7, '', '2024-05-28', '13000.00', 'Lunas', 'Dikembalikan', '2024-08-02 14:51:32'),
(26, '', 53, '2024-05-01', '2024-05-15', 8, '', '2024-05-28', '13000.00', 'Lunas', 'Dikembalikan', '2024-08-02 14:51:32'),
(27, '', 53, '2024-05-01', '2024-05-15', 9, '', '2024-05-28', '13000.00', 'Lunas', 'Dikembalikan', '2024-08-02 14:51:32'),
(28, '', 53, '2024-05-01', '2024-05-15', 9, '', '2024-05-28', '13000.00', 'Lunas', 'Dikembalikan', '2024-08-02 14:51:32'),
(29, '', 53, '2024-05-01', '2024-05-15', 7, '', '2024-05-28', '13000.00', 'Lunas', 'Dikembalikan', '2024-08-02 14:51:32'),
(30, '', 53, '2024-05-01', '2024-05-15', 8, '', '2024-05-28', '13000.00', 'Lunas', 'Dikembalikan', '2024-08-02 14:51:32'),
(31, '', 53, '2024-05-01', '2024-05-15', 9, '', '2024-05-28', '13000.00', 'Lunas', 'Dikembalikan', '2024-08-02 14:51:32'),
(32, '', 53, '2024-05-01', '2024-05-15', 7, '', '2024-05-28', '13000.00', 'Lunas', 'Dikembalikan', '2024-08-02 14:51:32'),
(33, '', 53, '2024-05-01', '2024-05-15', 8, '', '2024-05-28', '13000.00', 'Lunas', 'Dikembalikan', '2024-08-02 14:51:32'),
(34, '', 54, '2024-05-01', '2024-05-15', 7, '', '2024-05-28', '13000.00', 'Lunas', 'Dikembalikan', '2024-08-02 14:51:32'),
(35, '', 54, '2024-05-01', '2024-05-15', 8, '', '2024-05-28', '13000.00', 'Lunas', 'Dikembalikan', '2024-08-02 14:51:32'),
(36, '', 53, '2024-05-01', '2024-05-15', 7, '', '2024-05-28', '13000.00', 'Lunas', 'Dikembalikan', '2024-08-02 14:51:32'),
(37, '', 53, '2024-05-01', '2024-05-15', 8, '', '2024-05-28', '13000.00', 'Lunas', 'Dikembalikan', '2024-08-02 14:51:32'),
(38, '', 53, '2024-05-08', '2024-05-22', 7, '', '2024-05-28', '6000.00', 'Lunas', 'Dikembalikan', '2024-08-02 14:51:32'),
(39, '', 53, '2024-05-08', '2024-05-22', 8, '', '2024-05-28', '6000.00', 'Lunas', 'Dikembalikan', '2024-08-02 14:51:32'),
(40, '', 53, '2024-05-08', '2024-05-22', 9, '', '2024-05-28', '6000.00', 'Lunas', 'Dikembalikan', '2024-08-02 14:51:32'),
(41, '', 54, '2024-05-08', '2024-05-22', 7, '', '2024-05-28', '6000.00', 'Lunas', 'Dikembalikan', '2024-08-02 14:51:32'),
(42, '', 54, '2024-05-08', '2024-05-22', 8, '', '2024-05-28', '6000.00', 'Lunas', 'Dikembalikan', '2024-08-02 14:51:32'),
(43, '', 54, '2024-05-08', '2024-05-22', 9, '', '2024-05-28', '6000.00', 'Lunas', 'Dikembalikan', '2024-08-02 14:51:32'),
(44, '', 53, '2024-05-27', '2024-06-10', 7, '', '2024-05-28', '0.00', 'Lunas', 'Dikembalikan', '2024-08-02 14:51:32'),
(45, '', 53, '2024-05-27', '2024-06-10', 8, '', '2024-05-28', '0.00', 'Lunas', 'Dikembalikan', '2024-08-02 14:51:32'),
(46, '', 53, '2024-05-28', '2024-06-11', 7, '', '0000-00-00', '0.00', '', 'Dipinjam', '2024-08-02 14:51:32'),
(47, '', 53, '2024-05-28', '2024-06-11', 8, '', '0000-00-00', '0.00', '', 'Dipinjam', '2024-08-02 14:51:32'),
(48, '', 53, '2024-05-12', '2024-05-26', 7, 'C12', '2024-06-06', '0.00', 'Lunas', 'Dikembalikan', '2024-08-02 14:51:32'),
(49, '', 53, '2024-05-12', '2024-05-26', 8, 'C12', '2024-06-06', '0.00', 'Lunas', 'Dikembalikan', '2024-08-02 14:51:32'),
(50, '', 53, '2024-05-12', '2024-05-26', 7, 'C12', '2024-06-06', '0.00', 'Lunas', 'Dikembalikan', '2024-08-02 14:51:32'),
(51, '', 53, '2024-05-12', '2024-05-26', 8, 'C12', '2024-06-06', '0.00', 'Lunas', 'Dikembalikan', '2024-08-02 14:51:32'),
(52, '', 54, '2024-05-28', '2024-06-11', 7, 'C12', '0000-00-00', '0.00', '', 'Dipinjam', '2024-08-02 14:51:32'),
(53, '', 54, '2024-05-28', '2024-06-11', 8, 'C12', '0000-00-00', '0.00', '', 'Dipinjam', '2024-08-02 14:51:32'),
(54, '', 53, '2024-05-26', '2024-06-09', 7, 'C12', '0000-00-00', '0.00', '', 'Dipinjam', '2024-08-02 14:51:32'),
(55, '', 53, '2024-05-26', '2024-06-09', 8, 'C20', '0000-00-00', '0.00', '', 'Dipinjam', '2024-08-02 14:51:32'),
(56, '', 53, '2024-05-29', '2024-06-12', 7, 'C12', '0000-00-00', '0.00', '', 'Dipinjam', '2024-08-02 14:51:32'),
(57, '', 53, '2024-05-29', '2024-06-12', 8, 'C18', '0000-00-00', '0.00', '', 'Dipinjam', '2024-08-02 14:51:32'),
(58, '', 55, '2024-05-30', '2024-06-13', 7, 'C12', '2024-05-30', '0.00', 'Lunas', 'Dikembalikan', '2024-08-02 14:51:32'),
(59, '', 55, '2024-05-30', '2024-06-13', 11, 'C53', '2024-05-30', '0.00', 'Lunas', 'Dikembalikan', '2024-08-02 14:51:32'),
(60, '', 55, '2024-05-30', '2024-06-13', 9, 'C73', '2024-05-30', '0.00', 'Lunas', 'Dikembalikan', '2024-08-02 14:51:32'),
(61, '', 55, '2024-06-05', '2024-06-19', 7, 'C12', '2024-06-06', '0.00', 'Lunas', 'Dikembalikan', '2024-08-02 14:51:32'),
(62, '', 55, '2024-06-05', '2024-06-19', 12, 'C53', '2024-06-06', '0.00', 'Lunas', 'Dikembalikan', '2024-08-02 14:51:32'),
(63, '', 55, '2024-06-05', '2024-06-19', 11, 'C90', '2024-06-06', '0.00', 'Lunas', 'Dikembalikan', '2024-08-02 14:51:32'),
(64, '', 57, '2024-05-19', '2024-06-02', 7, 'C12', '2024-08-07', '0.00', 'Lunas', 'Dikembalikan', '2024-08-02 14:51:32'),
(65, '', 57, '2024-05-19', '2024-06-02', 12, 'C10', '2024-06-14', '0.00', 'Lunas', 'Dipinjam', '2024-08-02 14:51:32'),
(66, '', 57, '2024-05-19', '2024-06-02', 9, 'C67', '2024-06-14', '0.00', 'Lunas', 'Dipinjam', '2024-08-02 14:51:32'),
(67, '', 57, '2024-05-19', '2024-06-02', 11, 'C43', '2024-06-14', '0.00', 'Lunas', 'Dipinjam', '2024-08-02 14:51:32'),
(68, '', 57, '2024-05-19', '2024-06-02', 13, 'C99', '2024-06-14', '0.00', 'Lunas', 'Dipinjam', '2024-08-02 14:51:32'),
(69, '', 59, '2024-06-21', '2024-07-05', 7, 'C12', '2024-06-27', '0.00', 'Lunas', 'Dikembalikan', '2024-08-02 14:51:32'),
(70, '', 59, '2024-06-21', '2024-07-05', 14, 'C31', '2024-06-27', '0.00', 'Lunas', 'Dikembalikan', '2024-08-02 14:51:32'),
(71, '', 58, '2024-07-01', '2024-07-15', 11, 'C12', '2024-07-28', '0.00', 'Lunas', 'Dikembalikan', '2024-08-02 14:51:32'),
(72, '', 58, '2024-07-01', '2024-07-15', 9, 'C43', '2024-07-28', '0.00', 'Lunas', 'Dikembalikan', '2024-08-02 14:51:32'),
(73, '', 59, '2024-07-28', '2024-08-11', 17, 'C51', '2024-08-06', '0.00', 'Lunas', 'Dikembalikan', '2024-08-02 14:51:32'),
(74, '', 59, '2024-07-28', '2024-08-11', 11, 'C19', '2024-08-06', '0.00', 'Lunas', 'Dikembalikan', '2024-08-02 14:51:32'),
(75, '', 59, '2024-07-28', '2024-08-11', 14, 'C122', '2024-08-06', '0.00', 'Lunas', 'Dikembalikan', '2024-08-02 14:51:32'),
(76, '', 55, '2024-07-29', '2024-08-12', 38, 'C12', '2024-08-15', '0.00', 'Lunas', 'Dikembalikan', '2024-08-02 14:51:32'),
(77, '', 55, '2024-07-29', '2024-08-12', 38, 'C51', '2024-08-15', '0.00', 'Lunas', 'Dikembalikan', '2024-08-02 14:51:32'),
(78, '', 256, '2024-08-01', '2024-08-15', 7, 'C12', '0000-00-00', '0.00', '', 'Dipinjam', '2024-08-02 15:35:35'),
(79, '', 256, '2024-08-01', '2024-08-15', 8, 'C51', '0000-00-00', '0.00', '', 'Dipinjam', '2024-08-02 15:35:35'),
(80, '', 500, '2024-08-01', '2024-08-15', 8, 'C12', '0000-00-00', '0.00', '', 'Dipinjam', '2024-08-02 15:57:26'),
(81, '', 500, '2024-08-01', '2024-08-15', 7, 'C12', '0000-00-00', '0.00', '', 'Dipinjam', '2024-08-02 15:57:26'),
(82, '', 500, '2024-08-02', '2024-08-16', 7, 'C12', '2024-08-06', '0.00', 'Lunas', 'Dikembalikan', '2024-08-02 16:07:21'),
(83, '', 499, '2024-08-01', '2024-08-15', 7, 'C12', '2024-08-06', '0.00', 'Lunas', 'Dikembalikan', '2024-08-02 16:08:53'),
(84, '', 499, '2024-08-06', '2024-08-20', 7, 'C12', '2024-08-06', '0.00', 'Lunas', 'Dikembalikan', '2024-08-05 18:46:18'),
(85, '', 499, '2024-08-06', '2024-08-20', 9, 'C42', '2024-08-06', '0.00', 'Lunas', 'Dikembalikan', '2024-08-05 18:46:18'),
(86, '', 499, '2024-08-06', '2024-08-20', 20, 'C21', '0000-00-00', '0.00', '', 'Dipinjam', '2024-08-05 18:46:18'),
(87, '', 499, '2024-08-06', '2024-08-20', 19, 'C12', '0000-00-00', '0.00', '', 'Dipinjam', '2024-08-05 18:46:18'),
(88, '', 500, '2024-07-07', '2024-07-21', 7, 'C12', '0000-00-00', '0.00', '', 'Dipinjam', '2024-08-07 15:26:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`),
  ADD KEY `kategori` (`kategori`),
  ADD KEY `rak` (`rak`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `log_pinjam`
--
ALTER TABLE `log_pinjam`
  ADD PRIMARY KEY (`id_log`),
  ADD KEY `id_anggota` (`id_anggota`),
  ADD KEY `id_buku` (`id_buku`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rak`
--
ALTER TABLE `rak`
  ADD PRIMARY KEY (`id_rak`);

--
-- Indexes for table `tbl_pinjam`
--
ALTER TABLE `tbl_pinjam`
  ADD PRIMARY KEY (`id_pinjam`);

--
-- Indexes for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `tb_sirkulasi`
--
ALTER TABLE `tb_sirkulasi`
  ADD PRIMARY KEY (`id_sk`),
  ADD KEY `id_buku` (`id_buku`),
  ADD KEY `id_anggota` (`id_anggota`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `nama_anggota` (`nama_anggota`),
  ADD KEY `buku` (`buku`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=503;

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `log_pinjam`
--
ALTER TABLE `log_pinjam`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rak`
--
ALTER TABLE `rak`
  MODIFY `id_rak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_pinjam`
--
ALTER TABLE `tbl_pinjam`
  MODIFY `id_pinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `kategori` FOREIGN KEY (`kategori`) REFERENCES `kategori` (`id_kategori`),
  ADD CONSTRAINT `rak` FOREIGN KEY (`rak`) REFERENCES `rak` (`id_rak`);

--
-- Constraints for table `log_pinjam`
--
ALTER TABLE `log_pinjam`
  ADD CONSTRAINT `log_pinjam_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `tb_anggota` (`id_anggota`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `log_pinjam_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `tb_buku` (`id_buku`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_sirkulasi`
--
ALTER TABLE `tb_sirkulasi`
  ADD CONSTRAINT `tb_sirkulasi_ibfk_1` FOREIGN KEY (`id_buku`) REFERENCES `tb_buku` (`id_buku`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_sirkulasi_ibfk_2` FOREIGN KEY (`id_anggota`) REFERENCES `tb_anggota` (`id_anggota`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `buku` FOREIGN KEY (`buku`) REFERENCES `buku` (`id_buku`),
  ADD CONSTRAINT `nama_anggota` FOREIGN KEY (`nama_anggota`) REFERENCES `anggota` (`id_anggota`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
