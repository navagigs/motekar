-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2017 at 07:12 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tokoonline`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(5) NOT NULL,
  `ukm_nama` varchar(100) NOT NULL,
  `admin_username` varchar(100) NOT NULL,
  `admin_password` varchar(100) NOT NULL,
  `admin_level` enum('admin','ukm') NOT NULL DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `ukm_nama`, `admin_username`, `admin_password`, `admin_level`) VALUES
(7, 'Admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(11, 'Barokah', 'barokah', '271873219018727c4d50a298fd9fc257', 'ukm'),
(13, 'abc', 'abc', '900150983cd24fb0d6963f7d28e17f72', 'ukm'),
(15, 'Himatif', '1', 'c4ca4238a0b923820dcc509a6f75849b', 'ukm'),
(24, 'motekar', 'motekar', '4bf51b4bf43196397e29ab721c06f4e1', 'ukm'),
(25, '123', '123', '202cb962ac59075b964b07152d234b70', 'ukm');

-- --------------------------------------------------------

--
-- Table structure for table `bukti`
--

CREATE TABLE `bukti` (
  `bukti_id` int(50) NOT NULL,
  `bukti_tanggal` date NOT NULL,
  `bukti_gambar` varchar(50) NOT NULL,
  `bukti_pendapatan` varchar(100) NOT NULL,
  `ukm_nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bukti`
--

INSERT INTO `bukti` (`bukti_id`, `bukti_tanggal`, `bukti_gambar`, `bukti_pendapatan`, `ukm_nama`) VALUES
(1, '2017-08-29', '1504023231-himatif.PNG', '200000', 'Himatif'),
(3, '2017-08-29', '1504023829-barokah.PNG', '200000', 'Barokah');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `invoices_id` int(10) NOT NULL,
  `invoices_date` date NOT NULL,
  `invoices_due_date` datetime NOT NULL,
  `invoices_subtotal` int(10) NOT NULL,
  `pelanggan_username` varchar(100) NOT NULL,
  `invoices_status` enum('paid','unpaid','canceled','expired') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`invoices_id`, `invoices_date`, `invoices_due_date`, `invoices_subtotal`, `pelanggan_username`, `invoices_status`) VALUES
(140, '2017-08-29', '2017-08-30 22:13:07', 97030, 'agus', 'unpaid'),
(141, '2017-08-30', '2017-08-31 00:09:00', 97030, 'agus', 'unpaid'),
(142, '2017-08-30', '2017-08-31 00:09:23', 485150, 'agus', 'paid');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` int(5) NOT NULL,
  `kategori_nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `kategori_nama`) VALUES
(1, 'Single'),
(2, 'Double'),
(3, 'Trible22');

-- --------------------------------------------------------

--
-- Table structure for table `konfirmasi`
--

CREATE TABLE `konfirmasi` (
  `konfirmasi_id` int(5) NOT NULL,
  `invoices_id` int(10) NOT NULL,
  `konfirmasi_jumlah` int(50) NOT NULL,
  `konfirmasi_bank` varchar(100) NOT NULL,
  `konfirmasi_bukti` varchar(100) NOT NULL,
  `konfirmasi_post` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konfirmasi`
--

INSERT INTO `konfirmasi` (`konfirmasi_id`, `invoices_id`, `konfirmasi_jumlah`, `konfirmasi_bank`, `konfirmasi_bukti`, `konfirmasi_post`) VALUES
(6, 55, 20000000, 'BRI', '1502875328-55.PNG', '2017-08-16 11:22:08'),
(7, 59, 290000, 'BNI', '1502875460-59.PNG', '2017-08-16 11:24:20'),
(8, 65, 200000, 'MANDIRI', '1502875643-65.PNG', '2017-08-16 11:27:23'),
(9, 60, 200000, 'bri', '1502887378-60.jpg', '2017-08-16 14:42:58'),
(10, 66, 2000, 'BRI', '1502887437-66.jpg', '2017-08-16 14:43:57'),
(11, 72, 900000, 'BRI', '1502893303-72.PNG', '2017-08-16 16:21:43'),
(12, 83, 99900, '12', '1503256043-83.PNG', '2017-08-20 21:07:23'),
(13, 83, 99900, 'BRI', '1503256071-83.PNG', '2017-08-20 21:07:51'),
(14, 83, 99900, 'bri', '1503256209-83.PNG', '2017-08-20 21:10:09'),
(15, 83, 99900, 'BRI', '1503256291-83.PNG', '2017-08-20 21:11:31'),
(16, 84, 27360, '3', '1503417309-84.jpg', '2017-08-22 17:55:09'),
(17, 142, 485150, 'sas', '1504026584-142.jpg', '2017-08-29 19:09:44');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `pelanggan_id` int(5) NOT NULL,
  `pelanggan_nama` varchar(100) NOT NULL,
  `pelanggan_username` varchar(100) NOT NULL,
  `pelanggan_password` varchar(100) NOT NULL,
  `pelanggan_alamat` text NOT NULL,
  `pelanggan_notlp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`pelanggan_id`, `pelanggan_nama`, `pelanggan_username`, `pelanggan_password`, `pelanggan_alamat`, `pelanggan_notlp`) VALUES
(13, 'andrey', 'andrey', 'baf22ddb7b1a317d860f48638254e2e9', 'bdg', '01882'),
(15, 'agus', 'agus', 'fdf169558242ee051cca1479770ebac3', 'nava', '019181819'),
(17, 'Alfi', 'alfi', 'b8aab85cb5b70a866972a694a27b7ed6', 'alfi', 'alfi');

-- --------------------------------------------------------

--
-- Table structure for table `pengiriman`
--

CREATE TABLE `pengiriman` (
  `pengiriman_id` int(5) NOT NULL,
  `invoices_id` int(5) NOT NULL,
  `pelanggan_nama` varchar(100) NOT NULL,
  `pengiriman_noresi` char(20) NOT NULL,
  `pengiriman_via` varchar(10) NOT NULL,
  `pengiriman_status` enum('Y','N') DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengiriman`
--

INSERT INTO `pengiriman` (`pengiriman_id`, `invoices_id`, `pelanggan_nama`, `pengiriman_noresi`, `pengiriman_via`, `pengiriman_status`) VALUES
(4, 140, 'agus', '123455', 'BRI', 'N'),
(5, 141, 'agus', '-', '-', 'N'),
(6, 142, 'agus', '12131313131', 'JNE', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `pesanan_id` int(10) NOT NULL,
  `invoices_id` int(10) NOT NULL,
  `produk_id` int(5) NOT NULL,
  `produk_nama` varchar(100) NOT NULL,
  `ukm_nama` varchar(100) NOT NULL,
  `pesanan_qty` int(5) NOT NULL,
  `pesanan_price` int(10) NOT NULL,
  `pesanan_subtotal` int(50) NOT NULL,
  `pesanan_tanggal` date NOT NULL,
  `pelanggan_username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`pesanan_id`, `invoices_id`, `produk_id`, `produk_nama`, `ukm_nama`, `pesanan_qty`, `pesanan_price`, `pesanan_subtotal`, `pesanan_tanggal`, `pelanggan_username`) VALUES
(17, 140, 18, '1', 'Admin', 1, 97030, 97030, '2017-08-29', 'agus'),
(18, 141, 18, '1', 'Admin', 1, 97030, 97030, '2017-08-30', 'agus'),
(19, 142, 18, '1', 'Admin', 5, 97030, 485150, '2017-08-30', 'agus');

--
-- Triggers `pesanan`
--
DELIMITER $$
CREATE TRIGGER `kurang_stok` BEFORE INSERT ON `pesanan` FOR EACH ROW update produk set produk_stok=produk_stok-NEW.pesanan_qty
where produk_id = NEW.produk_id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `produk_id` int(5) NOT NULL,
  `produk_nama` varchar(100) NOT NULL,
  `produk_harga` int(50) NOT NULL,
  `produk_diskon` int(5) NOT NULL,
  `produk_gambar` varchar(200) NOT NULL,
  `produk_deskripsi` text NOT NULL,
  `produk_hits` int(5) NOT NULL,
  `produk_stok` int(5) NOT NULL,
  `kategori_id` int(5) NOT NULL,
  `ukm_nama` varchar(100) NOT NULL,
  `produk_waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`produk_id`, `produk_nama`, `produk_harga`, `produk_diskon`, `produk_gambar`, `produk_deskripsi`, `produk_hits`, `produk_stok`, `kategori_id`, `ukm_nama`, `produk_waktu`) VALUES
(18, '1', 97030, 1, '1503859662-1.PNG', 'dd', 4, 86, 1, 'Admin', '2017-08-28 01:47:42'),
(19, 'K', 200000, 0, '1503859680-2.jpg', 'a', 1, 134, 2, 'Admin', '2017-08-28 01:48:00');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `user_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('3a13f83733e71bd8a4501c11cc8be3a3', '0.0.0.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.113 Safari/537.36', 1504026681, 'a:12:{s:9:\"user_data\";s:0:\"\";s:14:\"admin_password\";s:32:\"21232f297a57a5a743894a0e4a801fc3\";s:8:\"ukm_nama\";s:5:\"Admin\";s:12:\"pelanggan_id\";s:2:\"15\";s:18:\"pelanggan_username\";s:4:\"agus\";s:14:\"pelanggan_nama\";s:4:\"agus\";s:16:\"pelanggan_alamat\";s:4:\"nava\";s:15:\"pelanggan_notlp\";N;s:10:\"logged_in2\";b:1;s:14:\"admin_username\";s:5:\"admin\";s:11:\"admin_level\";s:5:\"admin\";s:9:\"logged_in\";b:1;}');

-- --------------------------------------------------------

--
-- Table structure for table `ukm`
--

CREATE TABLE `ukm` (
  `ukm_id` int(5) NOT NULL,
  `ukm_nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ukm`
--

INSERT INTO `ukm` (`ukm_id`, `ukm_nama`) VALUES
(1, 'Himatif'),
(2, 'Programming'),
(3, 'abc'),
(4, 'Barokah'),
(6, 'Nava Gia Ginasta');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `bukti`
--
ALTER TABLE `bukti`
  ADD PRIMARY KEY (`bukti_id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`invoices_id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  ADD PRIMARY KEY (`konfirmasi_id`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`pelanggan_id`);

--
-- Indexes for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD PRIMARY KEY (`pengiriman_id`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`pesanan_id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`produk_id`);

--
-- Indexes for table `ukm`
--
ALTER TABLE `ukm`
  ADD PRIMARY KEY (`ukm_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `bukti`
--
ALTER TABLE `bukti`
  MODIFY `bukti_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `invoices_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  MODIFY `konfirmasi_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `pelanggan_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `pengiriman`
--
ALTER TABLE `pengiriman`
  MODIFY `pengiriman_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `pesanan_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `produk_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `ukm`
--
ALTER TABLE `ukm`
  MODIFY `ukm_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
